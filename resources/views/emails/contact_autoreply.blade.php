<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank You for Contacting Philbeilts Industrial Group</title>
    <style>
        body { font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f5f0e8; color: #111827; margin: 0; padding: 24px; }
        .wrapper { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e5e0d5; }
        .header { background: #0d0f1a; color: #ffffff; padding: 32px 28px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; font-family: Georgia, serif; }
        .header span { color: #dc2626; }
        .content { padding: 36px 28px; font-size: 15px; line-height: 1.7; color: #374151; }
        .content h2 { font-family: Georgia, serif; font-size: 18px; color: #111827; margin-top: 0; }
        .info-card { background: #faf8f4; border: 1px solid #e5e0d5; border-radius: 8px; padding: 20px; margin: 24px 0; }
        .info-item { margin-bottom: 8px; font-size: 13px; }
        .info-item:last-child { margin-bottom: 0; }
        .footer { background: #f0ece2; padding: 20px; text-align: center; font-size: 12px; color: #6b7280; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>Philbeilts<span>Group</span></h1>
        <div style="font-size: 11px; color: #9ca3af; letter-spacing: 0.15em; margin-top: 6px;">BUILDING THE INDUSTRIAL BACKBONE OF AFRICA</div>
    </div>
    <div class="content">
        <h2>Dear {{ $contactMessage->name }},</h2>
        <p>Thank you for reaching out to <strong>Philbeilts Industrial Group of Companies Ltd</strong>. We have received your inquiry regarding <em>"{{ $contactMessage->subject }}"</em>.</p>
        <p>Our executive team reviews all submissions diligently. A relevant representative from our Group will review your request and get in touch within <strong>1–2 business days</strong>.</p>
        
        <div class="info-card">
            <div style="font-size: 11px; text-transform: uppercase; font-weight: bold; color: #b91c1c; margin-bottom: 12px;">Summary of your message</div>
            <div class="info-item"><strong>Subject:</strong> {{ $contactMessage->subject }}</div>
            <div class="info-item"><strong>Reference:</strong> #MSG-{{ str_pad($contactMessage->id, 5, '0', STR_PAD_LEFT) }}</div>
            <div class="info-item"><strong>Submitted:</strong> {{ $contactMessage->created_at->format('F j, Y') }}</div>
        </div>

        <p>For urgent matters or immediate corporate inquiries, you may also reach our head office directly at <strong>+233 303 982 238</strong> / <strong>+233 208 576 980</strong>.</p>
        
        <p style="margin-top: 32px;">Warm regards,<br><strong>Corporate Communications & Partnerships</strong><br>Philbeilts Industrial Group Co. Ltd<br>Tema Ashaiman, Ghana</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Philbeilts Industrial Group of Companies Ltd. All rights reserved.
    </div>
</div>
</body>
</html>
