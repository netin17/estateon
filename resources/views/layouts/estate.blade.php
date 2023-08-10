<!DOCTYPE html>
<html>

<head>
    @include('partials.webhead')
    <!-- Add the Laravel PWA service worker script -->
    @laravelPWA
     <!-- Add the service worker registration script here -->
     <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/serviceworker.js')
                    .then(function(registration) {
                        console.log('Service Worker registered with scope:', registration.scope);
                    }, function(error) {
                        console.log('Service Worker registration failed:', error);
                    });
            });
        }
    </script>
</head>

<body id="home" class="home-page d-flex flex-column min-vh-100">
        <header class="header">
            @include('partials.webheader')
        </header>
        <main>
        <div id="main">
            @yield('content')
        </div>
        </main>
        <div class="wrapper flex-grow-1"></div>
        <footer class="site-footer">
            @include('partials.webfooter')
        </footer>
        
</body>
@yield('scripts')
</html>