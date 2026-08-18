<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Website Inquiry</title>
    <style>
        body { font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f5f0e8; color: #111827; margin: 0; padding: 24px; }
        .wrapper { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e5e0d5; }
        .header { background: #0d0f1a; color: #ffffff; padding: 28px; text-align: center; }
        .header h1 { margin: 0; font-size: 20px; letter-spacing: 0.05em; }
        .header span { color: #dc2626; }
        .content { padding: 32px 28px; }
        .badge { display: inline-block; background: #fee2e2; color: #b91c1c; padding: 4px 10px; border-radius: 99px; font-size: 12px; font-weight: bold; margin-bottom: 16px; }
        .field { margin-bottom: 18px; }
        .label { font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em; color: #6b7280; font-weight: bold; margin-bottom: 4px; }
        .value { font-size: 15px; color: #111827; font-weight: 500; }
        .message-box { background: #faf8f4; border: 1px solid #e5e0d5; padding: 18px; border-radius: 8px; font-size: 14px; line-height: 1.6; color: #374151; white-space: pre-line; }
        .footer { background: #f0ece2; padding: 16px; text-align: center; font-size: 12px; color: #6b7280; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>Philbeilts<span>Group</span></h1>
        <div style="font-size: 10px; color: #9ca3af; letter-spacing: 0.1em; margin-top: 4px;">INDUSTRIAL CO. LTD — WEBSITE INQUIRY</div>
    </div>
    <div class="content">
        <div class="badge">NEW SUBMISSION</div>
        <div class="field">
            <div class="label">Sender Name</div>
            <div class="value">{{ $contactMessage->name }}</div>
        </div>
        <div class="field">
            <div class="label">Email Address</div>
            <div class="value"><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></div>
        </div>
        @if($contactMessage->company)
        <div class="field">
            <div class="label">Company / Organisation</div>
            <div class="value">{{ $contactMessage->company }}</div>
        </div>
        @endif
        @if($contactMessage->phone)
        <div class="field">
            <div class="label">Phone Number</div>
            <div class="value">{{ $contactMessage->phone }}</div>
        </div>
        @endif
        <div class="field">
            <div class="label">Subject</div>
            <div class="value">{{ $contactMessage->subject }}</div>
        </div>
        <div class="field">
            <div class="label">Message</div>
            <div class="message-box">{{ $contactMessage->message }}</div>
        </div>
    </div>
    <div class="footer">
        Received via Philbeilts Group Website Form &middot; {{ now()->format('F j, Y, g:i a') }}
    </div>
</div>
</body>
</html>
