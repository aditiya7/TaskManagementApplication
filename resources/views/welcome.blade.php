<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to the URL Shortener App</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f3f4f6;
            color: #374151;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            max-width: 600px;
            padding: 2rem;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            margin-top: 0;
            margin-bottom: 1rem;
            color: #1f2933;
        }
        .cta-btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #6366f1;
            color: #fff;
            text-decoration: none;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }
        .cta-btn:hover {
            background-color: #4f46e5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Task Management App</h1>
        <p>Please login to continue to the application</p>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="cta-btn">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="cta-btn">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="cta-btn">Register</a>
                @endif
            @endauth
        @endif
    </div>
</body>
</html>
