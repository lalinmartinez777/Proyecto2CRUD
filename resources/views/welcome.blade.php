<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="container text-center mt-5">
        <header class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <svg width="62" height="65" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- SVG content here -->
                </svg>
            </div>

            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary ms-2">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="mt-5">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="https://laravel.com/assets/img/welcome/docs-light.svg" class="card-img-top" alt="Laravel documentation screenshot">
                        <div class="card-body">
                            <h5 class="card-title">Documentation</h5>
                            <p class="card-text">Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience, we recommend reading our documentation.</p>
                            <a href="https://laravel.com/docs" class="btn btn-primary">Read Docs</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="https://laravel.com/assets/img/welcome/docs-light.svg" class="card-img-top" alt="Laracasts">
                        <div class="card-body">
                            <h5 class="card-title">Laracasts</h5>
                            <p class="card-text">Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out and level up your development skills.</p>
                            <a href="https://laracasts.com" class="btn btn-primary">Visit Laracasts</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="https://laravel.com/assets/img/welcome/docs-light.svg" class="card-img-top" alt="Laravel News">
                        <div class="card-body">
                            <h5 class="card-title">Laravel News</h5>
                            <p class="card-text">Laravel News is a community-driven portal aggregating all the latest and most important news in the Laravel ecosystem.</p>
                            <a href="https://laravel-news.com" class="btn btn-primary">Read News</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="https://laravel.com/assets/img/welcome/docs-light.svg" class="card-img-top" alt="Vibrant Ecosystem">
                        <div class="card-body">
                            <h5 class="card-title">Vibrant Ecosystem</h5>
                            <p class="card-text">Laravel's robust library of first-party tools and libraries helps you take your projects to the next level.</p>
                            <a href="#" class="btn btn-primary">Explore Ecosystem</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="mt-5">
            <p class="text-muted">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </footer>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
