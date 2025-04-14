<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('', 'Personal Savings App') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }
        .feature-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        .feature-icon i {
            font-size: 24px;
            color: #667eea;
        }
        .cta-section {
            background-color: #f8f9fa;
        }
        .testimonial-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            color: white;
            margin: 0 1rem;
            transition: opacity 0.3s;
        }
        .nav-link:hover {
            opacity: 0.8;
        }
        .auth-buttons .btn {
            padding: 0.5rem 2rem;
            font-weight: 600;
        }
        .auth-buttons .btn-register {
            background-color: white;
            color: #667eea;
        }
        .auth-buttons .btn-login {
            border: 2px solid white;
            color: white;
        }
        .auth-buttons .btn-login:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: #667eea;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                {{ config('', 'Personal Savings App') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto auth-buttons">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link btn btn-light">Go to Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item me-2">
                                <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Your Path to Financial Success Starts Here</h1>
                    <p class="lead mb-4">Join our community of successful savers. Track your progress, set meaningful goals, and achieve your financial dreams.</p>
                    <div class="d-flex gap-3">
                        @guest
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5">Create Account</a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4">Sign In</a>
                        @else
                            <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg px-5">Go to Dashboard</a>
                        @endguest
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="images/saving.jpg">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5" id="features">
        <div class="container">
            <h2 class="text-center mb-5">Why Choose Our Platform?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Track Progress</h3>
                        <p>Monitor your savings goals with intuitive visualizations and real-time progress tracking.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Set Goals</h3>
                        <p>Create personalized savings goals with deadlines and track your journey to achieving them.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h3>Manage Transactions</h3>
                        <p>Keep track of your income and expenses with detailed categorization and reporting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <!-- Testimonials -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">What Our Users Say</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="mb-3">"This app has completely transformed how I manage my savings. The goal tracking feature is incredible!"</p>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <h5 class="mb-0">John Kalimu</h5>
                                <small class="text-muted">Freelancer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="mb-3">"The best savings app I've ever used. Simple, intuitive, and really helps me stay on track."</p>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <h5 class="mb-0">MAHORO Docille</h5>
                                <small class="text-muted">Student</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="mb-3">"Finally achieved my savings goals thanks to this platform. The visual tracking makes all the difference!"</p>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <h5 class="mb-0">NDAYISHIMIYE Pascal</h5>
                                <small class="text-muted">Professional</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Start Your Savings Journey?</h2>
            <p class="lead mb-4">Join thousands of users who are already achieving their financial goals.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">Get Started Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} {{ config('', 'Personal Savings App') }}. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white me-3"></a>
                    <a href="#" class="text-white me-3">about us</a>
                    <a href="#" class="text-white">Contact Us</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
