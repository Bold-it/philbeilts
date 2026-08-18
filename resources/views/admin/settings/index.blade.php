@extends('admin.layout')

@section('title', 'System Settings & Diagnostics')
@section('page_title', 'System Settings')
@section('page_subtitle', 'Server diagnostics, email delivery testing, and performance cache tools.')

@section('content')

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    <!-- System Environment -->
    <div class="form-card" style="max-width: 100%;">
        <h3 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 20px; border-bottom: 1px solid var(--adm-border); padding-bottom: 12px;">Environment & Domain</h3>
        
        <div style="display: flex; flex-direction: column; gap: 14px; font-size: 0.9rem;">
            <div style="display: flex; justify-content: space-between; border-bottom: 1px dashed var(--adm-border); padding-bottom: 8px;">
                <span style="color: var(--adm-text-muted);">Target Domain:</span>
                <strong style="font-family: monospace; color: var(--adm-crimson);">philbeiltsgroup.com</strong>
            </div>
            <div style="display: flex; justify-content: space-between; border-bottom: 1px dashed var(--adm-border); padding-bottom: 8px;">
                <span style="color: var(--adm-text-muted);">Configured APP_URL:</span>
                <span style="font-family: monospace;">{{ $info['app_url'] }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; border-bottom: 1px dashed var(--adm-border); padding-bottom: 8px;">
                <span style="color: var(--adm-text-muted);">Environment Mode:</span>
                <span class="status-pill status-active">{{ strtoupper($info['app_env']) }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; border-bottom: 1px dashed var(--adm-border); padding-bottom: 8px;">
                <span style="color: var(--adm-text-muted);">PHP Runtime:</span>
                <span>{{ $info['php_version'] }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; border-bottom: 1px dashed var(--adm-border); padding-bottom: 8px;">
                <span style="color: var(--adm-text-muted);">Laravel Version:</span>
                <span>{{ $info['laravel_version'] }}</span>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <span style="color: var(--adm-text-muted);">Company Email Address:</span>
                <span>{{ $info['mail_from'] }}</span>
            </div>
        </div>

        <div style="margin-top: 28px; padding-top: 20px; border-top: 1px solid var(--adm-border);">
            <h4 style="font-size: 0.9rem; font-weight: 700; margin-bottom: 10px;">Cache & Optimization</h4>
            <p style="font-size: 0.8rem; color: var(--adm-text-muted); margin-bottom: 16px;">Clear application configuration, compiled templates, and route tables after updates.</p>
            <form method="POST" action="{{ route('admin.settings.clear-cache') }}">
                @csrf
                <button type="submit" class="btn-adm btn-adm-outline">⚡ Clear System Caches</button>
            </form>
        </div>
    </div>

    <!-- SMTP Delivery Test -->
    <div class="form-card" style="max-width: 100%;">
        <h3 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 20px; border-bottom: 1px solid var(--adm-border); padding-bottom: 12px;">Live SMTP Mail Dispatcher</h3>
        <p style="font-size: 0.85rem; color: var(--adm-text-muted); line-height: 1.6; margin-bottom: 20px;">
            Test your domain host SMTP configuration (cPanel/Namecheap/Zoho) by sending a test dispatch.
        </p>

        <form method="POST" action="{{ route('admin.settings.test-mail') }}">
            @csrf
            <div class="form-group-adm">
                <label for="test_email">Recipient Email Address</label>
                <input type="email" id="test_email" name="test_email" value="{{ old('test_email', 'Philbeiltsindustrialgroup@gmail.com') }}" required>
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="btn-adm btn-adm-primary">Dispatch Test Email &rarr;</button>
            </div>
        </form>

        <div style="margin-top: 28px; padding: 18px; background: #f8fafc; border-radius: 8px; border: 1px solid var(--adm-border); font-size: 0.8rem;">
            <div style="font-weight: 700; color: var(--adm-text); margin-bottom: 8px;">SMTP Setup in .env:</div>
            <code>
                MAIL_MAILER=smtp<br>
                MAIL_HOST=mail.philbeiltsgroup.com<br>
                MAIL_PORT=465<br>
                MAIL_USERNAME=info@philbeiltsgroup.com<br>
                MAIL_PASSWORD=your-smtp-password<br>
                MAIL_ENCRYPTION=ssl<br>
                MAIL_FROM_ADDRESS="Philbeiltsindustrialgroup@gmail.com"
            </code>
        </div>
    </div>
</div>

@endsection
