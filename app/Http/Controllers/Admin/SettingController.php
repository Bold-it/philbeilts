<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class SettingController extends Controller
{
    public function index()
    {
        $info = [
            'app_url' => config('app.url'),
            'app_env' => config('app.env'),
            'mail_mailer' => config('mail.default'),
            'mail_host' => config('mail.mailers.smtp.host'),
            'mail_port' => config('mail.mailers.smtp.port'),
            'mail_from' => config('mail.from.address'),
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
        ];

        return view('admin.settings.index', compact('info'));
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        return back()->with('success', 'Application cache, compiled views, and config cache successfully cleared!');
    }

    public function sendTestMail(Request $request)
    {
        $request->validate(['test_email' => 'required|email']);

        try {
            Mail::raw('This is a test email from the Philbeilts Industrial Group Admin Panel. Your SMTP configuration is functioning properly.', function ($message) use ($request) {
                $message->to($request->test_email)
                    ->subject('Philbeilts SMTP Delivery Test');
            });
            return back()->with('success', 'Test email dispatched successfully to ' . $request->test_email);
        } catch (\Throwable $e) {
            return back()->with('error', 'SMTP Test Failed: ' . $e->getMessage());
        }
    }
}
