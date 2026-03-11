<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        body { font-family: sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; color: #333; }
        a { color: #2563eb; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .meta { color: #888; font-size: 0.85rem; margin-bottom: 8px; }
        .card { border-bottom: 1px solid #eee; padding: 20px 0; }
        .btn { display: inline-block; padding: 6px 14px; background: #2563eb; color: #fff; border: none; cursor: pointer; border-radius: 4px; text-decoration: none; font-size: 0.9rem; }
        .btn-danger { background: #dc2626; }
        .btn-secondary { background: #6b7280; }
        .btn-sm { padding: 4px 10px; font-size: 0.8rem; }
        input[type=text], textarea { width: 100%; padding: 8px; box-sizing: border-box; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 4px; }
        label { font-weight: bold; display: block; margin-bottom: 4px; }
        .error { color: red; font-size: 0.85rem; margin-top: -8px; margin-bottom: 8px; }
        .comment { border-left: 3px solid #e5e7eb; padding-left: 16px; margin-top: 12px; }
        nav { margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 12px; }
        nav a { margin-right: 16px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid #eee; }
        th { background: #f3f4f6; }
        .flash-success { padding: 10px 16px; background: #d1fae5; border: 1px solid #6ee7b7; margin-bottom: 16px; border-radius: 4px; color: #065f46; }
        .flash-error { padding: 10px 16px; background: #fee2e2; border: 1px solid #fca5a5; margin-bottom: 16px; border-radius: 4px; color: #991b1b; }
        .char-count { font-size: 0.8rem; color: #888; margin-top: -10px; margin-bottom: 8px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('admin.articles.index') }}">Admin Panel</a>
    </nav>

    <!-- @if(session('success'))
        <div class="flash-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="flash-error">{{ session('error') }}</div>
    @endif -->

    @if(session('success'))
        <div class="flash-success" id="flash-message">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="flash-error" id="flash-message">{{ session('error') }}</div>
    @endif

    <script>
        const flash = document.getElementById('flash-message');
        if (flash) {
            setTimeout(() => {
                flash.style.transition = 'opacity 0.5s ease';
                flash.style.opacity = '0';
                setTimeout(() => flash.remove(), 500);
            }, 3000);
        }
    </script>

    @yield('content')
</body>
</html>