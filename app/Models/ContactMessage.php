<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'subject',
        'message',
        'is_read',
        'email_sent',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'email_sent' => 'boolean',
    ];
}
