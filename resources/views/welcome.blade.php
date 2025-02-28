<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoneyMind - Smart Financial Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700|plus-jakarta-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Animation Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #FF6F3C;
            /* Burnt Orange */
            --secondary: #6E7C7C;
            /* Slate Gray */
            --accent: #FFD369;
            /* Warm Yellow */
            --dark: #2E2E2E;
            /* Dark Gray */
            --background: #F9E4C8;
            /* Light Ivory */
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #FF6F3C;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .stats-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
            border-color: #FF6F3C;
        }

        .stats-card:hover .stats-number {
            transform: scale(1.1);
            color: #FF6F3C;
        }

        .stats-number {
            transition: all 0.3s ease;
        }

        .gradient-text {
            background: linear-gradient(135deg, #FF6F3C 0%, #FFD369 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .cta-button {
            position: relative;
            overflow: hidden;
        }

        .cta-button::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .cta-button:hover::after {
            transform: translateX(0);
        }
    </style>
</head>

<body class="antialiased">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-md z-50 border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="text-xl font-bold text-[#2E2E2E] flex items-center space-x-2 group">
                    <svg class="w-8 h-8 text-[#FF6F3C] transform group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>MoneyMind</span>
                </a>

                <!-- Center Navigation -->
                <div class="hidden md:flex items-center justify-center flex-1 px-16">
                    <div class="flex space-x-8">
                        <a href="#features" class="nav-link text-[#6E7C7C] hover:text-[#2E2E2E] transition-colors text-sm font-medium relative">Features</a>
                        <a href="#how-it-works" class="nav-link text-[#6E7C7C] hover:text-[#2E2E2E] transition-colors text-sm font-medium relative">How it Works</a>
                        <a href="#pricing" class="nav-link text-[#6E7C7C] hover:text-[#2E2E2E] transition-colors text-sm font-medium relative">Pricing</a>
                    </div>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/board') }}"
                        class="cta-button px-5 py-2 rounded-lg bg-[#FF6F3C] text-white hover:bg-[#ff5a24] transition-all transform hover:scale-105 text-sm font-semibold shadow-lg shadow-orange-500/20">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 rounded-lg border border-[#6E7C7C] text-[#2E2E2E] hover:border-[#FF6F3C] hover:text-[#FF6F3C] transition-colors text-sm font-semibold">
                        Sign In
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="cta-button px-5 py-2 rounded-lg bg-[#FF6F3C] text-white hover:bg-[#ff5a24] transition-all transform hover:scale-105 text-sm font-semibold shadow-lg shadow-orange-500/20">
                        Sign Up
                    </a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

   <!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center bg-[#2E2E2E]">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://media.lesechos.com/api/v1/images/view/660546b76e00b9508a290c0c/1280x720/011062933864-web-tete.jpg" 
             alt="Background" 
             class="w-full h-full object-cover opacity-0.9">
        <div class="absolute inset-0 bg-gradient-to-br from-[#2E2E2E]/95 via-[#2E2E2E]/80 to-[#2E2E2E]/70"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 w-full mt-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
            <!-- Top Badge -->
            <div class="inline-flex items-center space-x-2 mb-6 bg-white/10 px-6 py-3 rounded-full backdrop-blur-sm border border-white/5" data-aos="fade-down">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#FF6F3C] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#FF6F3C]"></span>
                </span>
                <span class="text-white/90 text-sm font-medium">New: AI-Powered Financial Insights</span>
            </div>

            <!-- Main Content -->
            <div class="max-w-4xl mx-auto space-y-8">
                <!-- Heading -->
                <h1 class="text-5xl md:text-7xl font-bold leading-tight text-white" data-aos="fade-up" data-aos-delay="100">
                    Master Your <span class="gradient-text">Money</span><br>
                    Shape Your <span class="gradient-text">Future</span>
                </h1>
                
                <p class="text-xl text-gray-300 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Experience the future of financial management with AI-driven insights, 
                    real-time tracking, and personalized wealth strategies.
                </p>

                <!-- Rating Stars -->
                <div class="flex items-center justify-center space-x-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex text-[#FFD369] space-x-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <span class="text-white/90 text-sm font-medium">Trusted by 10,000+ users worldwide</span>
                    <span class="text-white/30">•</span>
                    <span class="text-white/90 text-sm font-medium">4.9/5 on Trustpilot</span>
                </div>

                <!-- Features List -->


                <!-- CTA Buttons -->
                <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="500">
                    <a href="{{ route('register') }}" 
                       class="group px-8 py-4 rounded-lg bg-[#FF6F3C] text-white font-semibold hover:bg-[#ff5a24] transition-all transform hover:scale-105 shadow-lg shadow-orange-500/20">
                        Start Free Trial
                        <svg class="inline-block w-5 h-5 ml-2 -mr-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#demo" 
                       class="group px-8 py-4 rounded-lg bg-white/10 backdrop-blur-sm text-white font-semibold hover:bg-white/20 transition-all border border-white/20">
                        Watch Demo
                        <svg class="inline-block w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="600">
                    <div class="bg-white/10 rounded-xl px-6 py-8 backdrop-blur-sm">
                        <div class="text-4xl font-bold text-[#FFD369] mb-2">$2.5B+</div>
                        <div class="text-white/80 text-sm">Assets Managed</div>
                    </div>
                    <div class="bg-white/10 rounded-xl px-6 py-8 backdrop-blur-sm">
                        <div class="text-4xl font-bold text-[#FFD369] mb-2">150K+</div>
                        <div class="text-white/80 text-sm">Active Users</div>
                    </div>
                    <div class="bg-white/10 rounded-xl px-6 py-8 backdrop-blur-sm">
                        <div class="text-4xl font-bold text-[#FFD369] mb-2">98%</div>
                        <div class="text-white/80 text-sm">Success Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features Section -->
<section class="py-24 bg-white" id="features">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="text-[#FF6F3C] font-semibold text-sm tracking-wider uppercase mb-2 block">Features</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Experience Smart Finance</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover how our AI-powered platform transforms your financial management</p>
        </div>

        <!-- Features Grid -->
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Feature 1 - Large Card -->
            <div class="group relative overflow-hidden rounded-3xl bg-[#2E2E2E]" data-aos="fade-up">
                <div class="aspect-w-16 aspect-h-9">
                    <img src="https://images.unsplash.com/photo-1518186285589-2f7649de83e0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                         alt="AI Analytics" 
                         class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#2E2E2E] via-[#2E2E2E]/80 to-transparent">
                    <div class="absolute bottom-0 p-8">
                        <h3 class="text-2xl font-bold text-white mb-3">AI-Powered Analytics</h3>
                        <p class="text-gray-300 mb-4">Advanced algorithms analyze your spending patterns and provide personalized insights.</p>
                        <a href="#" class="inline-flex items-center text-[#FF6F3C] font-semibold group-hover:text-white transition-colors">
                            Explore Analytics
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Feature 2 - Large Card -->
            <div class="group relative overflow-hidden rounded-3xl bg-[#2E2E2E]" data-aos="fade-up" data-aos-delay="100">
                <div class="aspect-w-16 aspect-h-9">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                         alt="Real-time Tracking" 
                         class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#2E2E2E] via-[#2E2E2E]/80 to-transparent">
                    <div class="absolute bottom-0 p-8">
                        <h3 class="text-2xl font-bold text-white mb-3">Real-Time Tracking</h3>
                        <p class="text-gray-300 mb-4">Monitor your finances with instant updates and live transaction tracking.</p>
                        <a href="#" class="inline-flex items-center text-[#FF6F3C] font-semibold group-hover:text-white transition-colors">
                            Learn More
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Feature 3 - Small Card -->
            <div class="relative overflow-hidden rounded-3xl bg-[#2E2E2E] group" data-aos="fade-up" data-aos-delay="200">
                <div class="aspect-w-16 aspect-h-7">
                    <img src="https://images.unsplash.com/photo-1434626881859-194d67b2b86f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                         alt="Smart Budgeting" 
                         class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#2E2E2E] via-[#2E2E2E]/80 to-transparent">
                    <div class="absolute bottom-0 p-8">
                        <h3 class="text-2xl font-bold text-white mb-3">Smart Budgeting</h3>
                        <p class="text-gray-300 mb-4">Create intelligent budgets that adapt to your spending habits.</p>
                        <a href="#" class="inline-flex items-center text-[#FF6F3C] font-semibold group-hover:text-white transition-colors">
                            Discover More
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Feature 4 - Small Card -->
            <div class="relative overflow-hidden rounded-3xl bg-[#2E2E2E] group" data-aos="fade-up" data-aos-delay="300">
                <div class="aspect-w-16 aspect-h-7">
                    <img src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                         alt="Investment Tracking" 
                         class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#2E2E2E] via-[#2E2E2E]/80 to-transparent">
                    <div class="absolute bottom-0 p-8">
                        <h3 class="text-2xl font-bold text-white mb-3">Investment Tracking</h3>
                        <p class="text-gray-300 mb-4">Track and optimize your investment portfolio with AI insights.</p>
                        <a href="#" class="inline-flex items-center text-[#FF6F3C] font-semibold group-hover:text-white transition-colors">
                            Start Investing
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- How it Works Section -->
<section class="py-24 bg-gray-50" id="how-it-works">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="text-[#FF6F3C] font-semibold text-sm tracking-wider uppercase mb-2 block">Get Started</span>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Start your financial journey in three simple steps</p>
        </div>

        <div class="relative">
            <!-- Connection Lines (Desktop) -->
            <div class="hidden lg:block absolute top-1/2 left-0 w-full h-0.5 bg-gray-200 -translate-y-1/2"></div>

            <div class="grid md:grid-cols-3 gap-12 relative">
                <!-- Step 1 -->
                <div class="relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-[#FF6F3C] rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 mx-auto">01</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Create Account</h3>
                        <p class="text-gray-600 text-center">Sign up in minutes with your email. No credit card required for the trial period.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-[#FF6F3C] rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 mx-auto">02</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Connect Accounts</h3>
                        <p class="text-gray-600 text-center">Securely link your bank accounts and credit cards for comprehensive tracking.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="w-16 h-16 bg-[#FF6F3C] rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 mx-auto">03</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Get Insights</h3>
                        <p class="text-gray-600 text-center">Receive personalized financial insights and start optimizing your money.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer (Dark Theme) -->
<footer class="bg-[#2E2E2E]">
    <!-- ... (footer content remains the same) ... -->
</footer>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-out',
            once: true
        });
    </script>
</body>

</html>