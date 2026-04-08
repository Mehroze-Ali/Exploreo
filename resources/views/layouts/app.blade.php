<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exploreo - @yield('title', 'Home')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark navbar-transparent" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="{{ route('admin.login') }}">
           <!-- using logo.png as seen in destinations.html. index.html used download.jpeg? verify. -->
            <img src="{{ asset('assets/logo.png') }}" alt="Exploreo Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link @if(Request::is('/')) active @endif" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link @if(Request::is('destinations')) active @endif" href="{{ route('destinations') }}">Destinations</a></li>
            <li class="nav-item"><a class="nav-link @if(Request::is('packages')) active @endif" href="{{ route('packages') }}">Packages</a></li>
            <li class="nav-item"><a class="nav-link @if(Request::is('about')) active @endif" href="{{ route('about') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link @if(Request::is('contact')) active @endif" href="{{ route('contact') }}">Contact</a></li>
            <li class="nav-item"><a class="nav-link @if(Request::is('blog')) active @endif" href="{{ route('blog') }}">Blog</a></li>
          </ul>
          <a href="{{ route('packages') }}" class="btn btn-light ms-lg-3 d-none d-lg-block">Book Now</a>
          <div class="d-flex align-items-center ms-lg-3 gap-2">
            <div id="authButtons" style="display: block">
              <a href="{{ route('login') }}" class="btn btn-light">Sign In / Up</a>
            </div>
            <div id="userProfile" class="profile-avatar" title="View Profile / Logout" onclick="handleLogout()" style="display: none">
              <span id="userInitial">U</span>
            </div>
          </div>
        </div>
      </div>
    </nav>

    @yield('content')

    <footer class="text-white pt-5 pb-4 mt-5 footer-bg">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <h5 class="text-white mb-3 fw-bold">
              <i class="fas fa-globe me-2"></i>Wanderlust Adventures
            </h5>
            <p class="small text-light-slate">
              The world is a book, and those who do not travel read only a page.
              Let us help you write your next chapter with amazing and seamless
              journeys.
            </p>
            <p class="mb-1 small">
              <i class="fas fa-map-marker-alt me-2 text-primary-custom"></i>123
              Travel Road, Explorer City, Earth
            </p>
            <p class="mb-1 small">
              <i class="fas fa-envelope me-2 text-primary-custom"></i
              >info@wanderlust.com
            </p>
          </div>

          <div class="col-lg-3 col-md-6">
            <h5 class="text-white mb-3 fw-bold">Quick Links</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
              <li class="mb-2"><a href="{{ route('packages') }}">Packages</a></li>
              <li class="mb-2"><a href="{{ route('destinations') }}">Destinations</a></li>
              <li class="mb-2"><a href="{{ route('about') }}">About Us</a></li>
              <li class="mb-2"><a href="{{ route('blog') }}">Blog</a></li>
            </ul>
          </div>

          <div class="col-lg-5 col-md-12">
            <h5 class="text-white mb-3 fw-bold">Stay Connected</h5>
            <p class="small text-light-slate">
              Subscribe to our newsletter for the latest deals!
            </p>
            <form class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Your Email" aria-label="Your Email" />
              <button class="btn btn-primary-custom" type="submit">
                Subscribe
              </button>
            </form>

            <div class="mt-4">
              <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>

        <hr class="mt-4 mb-3" />
        <div class="text-center small text-light-slate">
          &copy; 2025 Wanderlust Adventures. All Rights Reserved.
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
