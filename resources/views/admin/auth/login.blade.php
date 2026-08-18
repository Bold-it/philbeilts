<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Philbeilts Group</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body style="display: block;">

<div class="login-screen">
    <div class="login-card">
        <div style="text-align: center; margin-bottom: 28px;">
            <div style="font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 700; color: #0d0f1a;">
                Philbeilts<span style="color: #b91c1c;">Group</span>
            </div>
            <div style="font-size: 0.72rem; letter-spacing: 0.15em; color: #64748b; text-transform: uppercase; margin-top: 4px;">
                Secure Executive Portal
            </div>
        </div>

        @if($errors->any())
            <div class="adm-alert adm-alert-error" style="margin-bottom: 20px;">
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        @if(session('success'))
            <div class="adm-alert adm-alert-success" style="margin-bottom: 20px;">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="form-group-adm">
                <label for="email">Admin Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', 'admin@philbeiltsgroup.com') }}" required autofocus>
            </div>

            <div class="form-group-adm">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; font-size: 0.82rem;">
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: #475569;">
                    <input type="checkbox" name="remember" style="accent-color: #b91c1c;"> Remember this device
                </label>
            </div>

            <button type="submit" class="btn-adm btn-adm-primary" style="width: 100%; justify-content: center; padding: 12px; font-size: 0.95rem;">
                Sign In to Console &rarr;
            </button>
        </form>

        <div style="margin-top: 28px; text-align: center; font-size: 0.78rem; color: #94a3b8; border-top: 1px solid #e2e8f0; padding-top: 16px;">
            Default Credentials: <code>admin@philbeiltsgroup.com</code> &middot; <code>Philbeilts@2026!</code>
        </div>
    </div>
</div>

</body>
</html>
