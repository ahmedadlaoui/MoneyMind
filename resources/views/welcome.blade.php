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
    <section class="relative min-h-screen bg-gradient-to-b from-gray-50 to-white overflow-hidden">
        <div id="particles-js"></div>

        <div class="relative z-10 flex items-center justify-center min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <!-- Top Section -->
                <div class="text-center mb-20">
                    <!-- Professional Badge -->
                    <div class="inline-flex items-center space-x-2 mb-6 bg-gray-50 px-4 py-2 rounded-full shadow-sm border border-gray-100" data-aos="fade-down">
                        <span class="flex h-1.5 w-1.5 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#FF6F3C] opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-[#FF6F3C]"></span>
                        </span>
                        <span class="text-gray-600 text-sm">Intelligent Financial Management Platform</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-4xl md:text-5xl font-semibold text-gray-900 mb-6 leading-tight" data-aos="fade-up">
                        Transform Your Financial Management<br>
                        <span class="text-[#FF6F3C]">with Smart Solutions</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                        Experience the power of AI-driven insights and automated tracking to optimize your financial decisions.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex justify-center gap-3 mb-16" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('register') }}"
                            class="px-6 py-3 rounded-lg bg-[#FF6F3C] text-white text-sm font-medium hover:bg-[#ff5a24] transition-all shadow-sm">
                            Start Free Trial
                        </a>
                        <a href="#features"
                            class="px-6 py-3 rounded-lg bg-white text-gray-700 text-sm font-medium hover:bg-gray-50 transition-all border border-gray-200 shadow-sm">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    <!-- Feature 1: AI Analytics -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:border-[#FF6F3C]/20 transition-all" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-[#FF6F3C]/10 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">AI-Powered Analytics</h3>
                        <p class="text-gray-600">Advanced algorithms analyze your spending patterns and provide personalized insights.</p>
                    </div>

                    <!-- Feature 2: Smart Budgeting -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:border-[#FF6F3C]/20 transition-all" data-aos="fade-up" data-aos-delay="200">
                        <div class="bg-[#FF6F3C]/10 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Smart Budgeting</h3>
                        <p class="text-gray-600">Create and manage intelligent budgets that adapt to your spending habits.</p>
                    </div>

                    <!-- Feature 3: Real-time Tracking -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:border-[#FF6F3C]/20 transition-all" data-aos="fade-up" data-aos-delay="300">
                        <div class="bg-[#FF6F3C]/10 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Real-time Tracking</h3>
                        <p class="text-gray-600">Monitor your finances in real-time with automated expense categorization.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section - Completely Redesigned -->
    <section class="py-24 bg-white" id="features">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-[#FF6F3C] font-semibold text-sm tracking-wider uppercase mb-2 block">Powerful Features</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Take Control of Your Finances</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">MoneyMind provides all the tools you need to manage, track, and grow your wealth with confidence.</p>
            </div>

            <!-- Feature Showcase - Large Cards -->
            <div class="grid lg:grid-cols-2 gap-12 mb-20">
                <!-- Feature 1 - Expense Tracking -->
                <div class="group relative overflow-hidden rounded-3xl shadow-xl" data-aos="fade-up">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                            alt="Expense Tracking"
                            class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2E2E2E] via-[#2E2E2E]/80 to-transparent p-8 flex flex-col justify-end">
                        <div class="mb-4">
                            <span class="px-4 py-1 bg-[#FF6F3C]/20 text-[#FF6F3C] rounded-full text-sm font-medium">Most Popular</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Intelligent Expense Tracking</h3>
                        <p class="text-gray-300 mb-4">Automatically categorize and track every expense with smart recognition technology. Never miss a transaction again.</p>
                        <ul class="text-gray-300 mb-4 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-[#FF6F3C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Automatic categorization
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-[#FF6F3C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Real-time notifications
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-[#FF6F3C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Custom spending categories
                            </li>
                        </ul>
                        <a href="#" class="inline-flex items-center text-[#FF6F3C] font-semibold group-hover:text-white transition-colors">
                            Learn More
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Feature 2 - Budget Planning -->
                <div class="group relative overflow-hidden rounded-3xl shadow-xl" data-aos="fade-up" data-aos-delay="100">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                            alt="Budget Planning"
                            class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2E2E2E] via-[#2E2E2E]/80 to-transparent p-8 flex flex-col justify-end">
                        <div class="mb-4">
                            <span class="px-4 py-1 bg-[#FFD369]/20 text-[#FFD369] rounded-full text-sm font-medium">Essential</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Smart Budget Planning</h3>
                        <p class="text-gray-300 mb-4">Create personalized budgets that adapt to your lifestyle and help you reach your financial goals faster.</p>
                        <ul class="text-gray-300 mb-4 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-[#FF6F3C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Customizable budget templates
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-[#FF6F3C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Spending limit alerts
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-[#FF6F3C] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Goal-based saving plans
                            </li>
                        </ul>
                        <a href="#" class="inline-flex items-center text-[#FF6F3C] font-semibold group-hover:text-white transition-colors">
                            Explore Budgeting
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Secondary Features Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-20">
                <!-- Feature Card 1 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow" data-aos="fade-up">
                    <div class="w-14 h-14 bg-[#FF6F3C]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Investment Portfolio</h3>
                    <p class="text-gray-600 mb-4">Track all your investments in one place with real-time market data and performance analytics.</p>
                    <a href="#" class="text-[#FF6F3C] font-medium inline-flex items-center">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 bg-[#FF6F3C]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Secure Banking</h3>
                    <p class="text-gray-600 mb-4">Bank-level encryption and security protocols keep your financial data safe and protected.</p>
                    <a href="#" class="text-[#FF6F3C] font-medium inline-flex items-center">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 bg-[#FF6F3C]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Financial Reports</h3>
                    <p class="text-gray-600 mb-4">Generate detailed financial reports and visualize your progress with interactive charts.</p>
                    <a href="#" class="text-[#FF6F3C] font-medium inline-flex items-center">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: Testimonials -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#FF6F3C] font-semibold text-sm tracking-wider uppercase mb-2 block">Testimonials</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">What Our Users Say</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Join thousands of satisfied users who have transformed their financial lives with MoneyMind.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 rounded-xl p-8 shadow-sm" data-aos="fade-up">
                    <div class="flex text-[#FFD369] mb-4">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <p class="text-gray-600 mb-6">"MoneyMind has completely transformed how I manage my finances. The insights are incredibly helpful, and I've saved over $3,000 in just six months!"</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="User" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                            <p class="text-sm text-gray-500">Marketing Director</p>
                        </div>
                    </div>
                </div>

                <!-- Add more testimonials -->
            </div>
        </div>
    </section>

    <!-- NEW SECTION: Pricing -->
    <section class="py-24 bg-gray-50" id="pricing">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-[#FF6F3C] font-semibold text-sm tracking-wider uppercase mb-2 block">Pricing</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Simple, Transparent Pricing</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Choose the plan that works best for your financial needs. No hidden fees, no surprises.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Basic Plan -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up">
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Basic</h3>
                        <div class="flex items-baseline mb-6">
                            <span class="text-4xl font-bold text-gray-900">$0</span>
                            <span class="text-gray-500 ml-2">/month</span>
                        </div>
                        <p class="text-gray-600 mb-6">Perfect for individuals just starting their financial journey.</p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Basic expense tracking
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Monthly budget planning
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Up to 2 financial accounts
                            </li>
                        </ul>
                    </div>
                    <div class="px-8 pb-8">
                        <a href="#" class="block w-full py-3 px-4 bg-gray-100 hover:bg-gray-200 text-center rounded-xl text-gray-800 font-medium transition-colors">
                            Get Started Free
                        </a>
                    </div>
                </div>

                <!-- Pro Plan -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform scale-105 relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 inset-x-0">
                        <div class="bg-[#FF6F3C] text-white text-xs font-semibold py-1 text-center">
                            MOST POPULAR
                        </div>
                    </div>
                    <div class="p-8 pt-10">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Pro</h3>
                        <div class="flex items-baseline mb-6">
                            <span class="text-4xl font-bold text-gray-900">$9.99</span>
                            <span class="text-gray-500 ml-2">/month</span>
                        </div>
                        <p class="text-gray-600 mb-6">For individuals serious about financial growth.</p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Everything in Basic
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Advanced analytics
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Spending limit alerts
                            </li>
                        </ul>
                        <a href="#" class="inline-flex items-center text-[#FF6F3C] font-semibold group-hover:text-white transition-colors">
                            Learn More
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (Dark Theme) -->
    <footer class="bg-[#2E2E2E] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Top Section with Logo and Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
                <!-- Logo and Description -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <svg class="w-10 h-10 text-[#FF6F3C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-2xl font-bold">MoneyMind</span>
                    </div>
                    <p class="text-gray-400 mb-6 pr-8">
                        MoneyMind helps you take control of your finances with intelligent insights, real-time tracking, and personalized recommendations.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-[#FF6F3C] transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-2.165 1.54-3.594 1.118-2.724-.957-2.165-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-[#FF6F3C] transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-[#FF6F3C] transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-6">Quick Links</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">Features</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">Testimonials</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h3 class="text-lg font-semibold mb-6">Resources</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">Guides</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">API Documentation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FF6F3C] transition-colors">Community</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-6">Contact</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#FF6F3C] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-400">123 Finance Street, Money City, MC 12345</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#FF6F3C] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-400">support@moneymind.com</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#FF6F3C] mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-400">+1 (555) 123-4567</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="border-t border-gray-800 pt-8 pb-12">
                <div class="max-w-md mx-auto">
                    <h3 class="text-lg font-semibold mb-4 text-center">Subscribe to Our Newsletter</h3>
                    <p class="text-gray-400 text-center mb-6">Get the latest updates, tips and special offers delivered directly to your inbox.</p>
                    <form class="flex">
                        <input type="email" placeholder="Your email address" class="flex-1 py-3 px-4 bg-gray-800 border border-gray-700 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-[#FF6F3C] text-gray-300">
                        <button type="submit" class="bg-[#FF6F3C] hover:bg-[#ff5a24] text-white font-medium py-3 px-6 rounded-r-lg transition-colors duration-300">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bottom Section with Copyright -->
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">
                        © 2023 MoneyMind. All rights reserved.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-[#FF6F3C] text-sm transition-colors">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-[#FF6F3C] text-sm transition-colors">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-[#FF6F3C] text-sm transition-colors">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-out',
            once: true
        });
    </script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 30,
                    density: {
                        enable: true,
                        value_area: 900
                    }
                },
                color: {
                    value: '#FF6F3C'
                },
                shape: {
                    type: 'circle'
                },
                opacity: {
                    value: 0.15,
                    random: false
                },
                size: {
                    value: 2,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#FF6F3C',
                    opacity: 0.1,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'grab'
                    },
                    onclick: {
                        enable: false
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 0.2
                        }
                    }
                }
            },
            retina_detect: true
        });
    </script>
</body>

</html>