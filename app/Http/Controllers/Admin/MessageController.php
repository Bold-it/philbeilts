<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::orderBy('created_at', 'desc');

        if ($request->has('unread')) {
            $query->where('is_read', false);
        }

        $messages = $query->paginate(15);
        $unreadCount = ContactMessage::where('is_read', false)->count();

        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    public function show(ContactMessage $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        return view('admin.messages.show', compact('message'));
    }

    public function toggleRead(ContactMessage $message)
    {
        $message->update(['is_read' => !$message->is_read]);
        return back()->with('success', 'Message status updated.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    }
}
