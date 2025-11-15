<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chap Gallery - Professional Photography Services</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-dark: #0f172a;
            --primary-medium: #1e293b;
            --accent-blue: #3b82f6;
            --accent-emerald: #10b981;
            --neutral-50: #f8fafc;
            --neutral-100: #f1f5f9;
            --neutral-200: #e2e8f0;
            --neutral-300: #cbd5e1;
            --neutral-400: #94a3b8;
            --neutral-600: #475569;
            --neutral-700: #334155;
            --font-primary: 'Inter', sans-serif;
            --font-display: 'Playfair Display', serif;
            --section-padding: 120px;
            --border-radius: 12px;
            --border-radius-lg: 20px;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-primary);
            line-height: 1.6;
            color: var(--neutral-700);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 1.5rem 0;
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--neutral-200);
            box-shadow: var(--shadow-sm);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            letter-spacing: -0.025em;
        }

        .navbar.scrolled .navbar-brand {
            color: var(--primary-dark);
        }

        .navbar-nav {
            gap: 2rem;
        }

        .nav-link {
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9) !important;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar.scrolled .nav-link {
            color: var(--neutral-600) !important;
        }

        .nav-link:hover {
            color: white !important;
        }

        .navbar.scrolled .nav-link:hover {
            color: var(--accent-blue) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: currentColor;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero-section {
            height: 100vh;
            background: linear-gradient(135deg,
                rgba(15, 23, 42, 0.8) 0%,
                rgba(30, 41, 59, 0.6) 100%),
                url('{{ asset("images/picutama.jfif") }}') center/cover no-repeat;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            color: white;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--accent-emerald);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 1.5rem;
        }

        .hero-title {
            font-family: var(--font-display);
            font-size: clamp(3rem, 8vw, 5.5rem);
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin-bottom: 2rem;
        }

        .hero-description {
            font-size: 1.25rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.85);
            max-width: 600px;
            margin-bottom: 3rem;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--accent-blue);
            color: white;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-lg);
        }

        .cta-button:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            color: white;
        }

        /* Services Section */
        .services-section {
            padding: var(--section-padding) 0;
            background: var(--neutral-50);
        }

        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 5rem;
        }

        .section-subtitle {
            color: var(--accent-blue);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 700;
            color: var(--primary-dark);
            line-height: 1.2;
            letter-spacing: -0.02em;
            margin-bottom: 1.5rem;
        }

        .section-description {
            font-size: 1.125rem;
            color: var(--neutral-600);
            line-height: 1.7;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .service-card {
            background: white;
            padding: 2.5rem;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--neutral-200);
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .service-icon {
            width: 4rem;
            height: 4rem;
            background: linear-gradient(135deg, var(--accent-blue), var(--accent-emerald));
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .service-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .service-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }

        .service-description {
            color: var(--neutral-600);
            line-height: 1.6;
        }

        /* Gallery Section */
        .gallery-section {
            padding: var(--section-padding) 0;
            background: white;
        }

        .gallery-wrapper {
            position: relative;
            width: 100%;
            overflow: hidden;
            margin-top: 4rem;
        }

        .gallery-track {
            display: flex;
            gap: 1.5rem;
            animation: scrollLeft 30s linear infinite;
            width: fit-content;
        }

        .gallery-wrapper:hover .gallery-track {
            animation-play-state: paused;
        }

        @keyframes scrollLeft {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .gallery-item {
            position: relative;
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            width: 350px;
            height: 250px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            flex-shrink: 0;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-xl);
            z-index: 10;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(59, 130, 246, 0.6));
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 2rem;
            text-align: center;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay h4 {
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .gallery-overlay p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.875rem;
        }

        .gallery-wrapper::before,
        .gallery-wrapper::after {
            content: '';
            position: absolute;
            top: 0;
            width: 100px;
            height: 100%;
            z-index: 5;
            pointer-events: none;
        }

        .gallery-wrapper::before {
            left: 0;
            background: linear-gradient(to right, white, transparent);
        }

        .gallery-wrapper::after {
            right: 0;
            background: linear-gradient(to left, white, transparent);
        }

        .gallery-controls {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 3rem;
        }

        .control-btn {
            background: var(--accent-blue);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.25rem;
        }

        .control-btn:hover {
            background: #2563eb;
            transform: scale(1.1);
        }

        /* Calendar Section - CLEAN & BEAUTIFUL */
        .calendar-section {
            padding: var(--section-padding) 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .calendar-container {
            background: white;
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0, 0, 0, 0.05);
            max-width: 1100px;
            margin: 0 auto;
        }

        .calendar-legend {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--neutral-700);
        }

        .legend-indicator {
            width: 16px;
            height: 16px;
            border-radius: 4px;
        }

        .legend-available {
            background: #3b82f6;
        }

        .legend-booked {
            background: #ef4444;
        }

        .legend-today {
            background: var(--accent-emerald);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }

        /* Clean FullCalendar Styles */
        #calendar {
            background: white;
            border-radius: 16px;
        }

        .fc {
            font-family: var(--font-primary);
            border: none;
        }

        .fc .fc-toolbar {
            margin-bottom: 2.5rem;
            padding: 0;
            gap: 1rem;
        }

        .fc .fc-toolbar-title {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 600;
            color: var(--primary-dark);
            letter-spacing: -0.02em;
        }

        .fc .fc-button {
            background: white;
            border: 1px solid var(--neutral-300);
            color: var(--neutral-700);
            padding: 0.65rem 1.25rem;
            border-radius: 10px;
            font-weight: 500;
            text-transform: capitalize;
            transition: all 0.2s ease;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .fc .fc-button:hover {
            background: var(--neutral-50);
            border-color: var(--neutral-400);
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        }

        .fc .fc-button-active {
            background: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
            color: white !important;
        }

        .fc .fc-button:disabled {
            opacity: 0.4;
        }

        .fc-theme-standard .fc-scrollgrid {
            border: none;
        }

        .fc .fc-col-header {
            border: none;
        }

        .fc .fc-col-header-cell {
            padding: 1.25rem 0.5rem;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--neutral-500);
            background: transparent;
            border: none;
        }

        .fc .fc-daygrid-body {
            border: none;
        }

        .fc .fc-scrollgrid-section-body > td {
            border: none;
        }

        .fc .fc-daygrid-day {
            border: none;
            background: var(--neutral-50);
            margin: 3px;
            border-radius: 12px;
            transition: all 0.2s ease;
            position: relative;
            min-height: 90px;
        }

        .fc .fc-daygrid-day-frame {
            min-height: 90px;
            display: flex;
            flex-direction: column;
            padding: 0.75rem;
        }

        .fc .fc-daygrid-day-top {
            flex-direction: column;
        }

        .fc .fc-daygrid-day-number {
            padding: 0;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--neutral-700);
            width: 100%;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        /* Available dates - Clean Blue */
        .fc .fc-day-available {
            background: white !important;
            border: 2px solid #3b82f6 !important;
            cursor: pointer;
            margin: 2px;
        }

        .fc .fc-day-available:hover {
            background: #eff6ff !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.15);
        }

        .fc .fc-day-available .fc-daygrid-day-number {
            color: #3b82f6;
            font-weight: 700;
        }

        /* Booked dates - Clean Red */
        .fc .fc-day-disabled {
            background: white !important;
            border: 2px solid #ef4444 !important;
            cursor: not-allowed;
            position: relative;
            margin: 2px;
            opacity: 0.7;
        }

        .fc .fc-day-disabled:hover {
            background: #fef2f2 !important;
        }

        .fc .fc-day-disabled .fc-daygrid-day-number {
            color: #ef4444;
            font-weight: 700;
        }

        /* Today - Clean Green */
        .fc .fc-day-today {
            background: white !important;
            border: 2px solid var(--accent-emerald) !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .fc .fc-day-today .fc-daygrid-day-number {
            color: var(--accent-emerald);
            font-weight: 700;
        }

        /* Past dates */
        .fc .fc-day-past {
            opacity: 0.35;
            pointer-events: none;
        }

        /* Clean status badge */
        .date-status-badge {
            position: absolute;
            bottom: 0.5rem;
            left: 50%;
            transform: translateX(-50%);
            padding: 0.25rem 0.65rem;
            border-radius: 6px;
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            white-space: nowrap;
        }

        .badge-available {
            background: #3b82f6;
            color: white;
        }

        .badge-booked {
            background: #ef4444;
            color: white;
        }

        .badge-today {
            background: var(--accent-emerald);
            color: white;
        }

        /* Remove the pulsing dot animation - cleaner look */
        .booking-dot {
            display: none;
        }

        /* WhatsApp CTA Section */
        .whatsapp-cta-section {
            background: linear-gradient(135deg, var(--accent-emerald), #059669);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }

        .whatsapp-title {
            font-family: var(--font-display);
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            background: white;
            color: var(--accent-emerald);
            padding: 1.25rem 2.5rem;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.25rem;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
        }

        .whatsapp-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            color: #059669;
        }

        .whatsapp-btn i {
            font-size: 1.75rem;
        }

        /* Footer */
        .footer {
            background: var(--primary-dark);
            color: var(--neutral-300);
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 600;
            color: white;
            margin-bottom: 1rem;
        }

        .footer-description {
            color: var(--neutral-400);
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .contact-item i {
            color: var(--accent-emerald);
            width: 20px;
        }

        .contact-item a {
            color: var(--neutral-300);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-item a:hover {
            color: var(--accent-emerald);
        }

        .footer-bottom {
            border-top: 1px solid var(--neutral-700);
            padding-top: 2rem;
            text-align: center;
            color: var(--neutral-500);
        }

        /* WhatsApp Float */
        .whatsapp-float {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            background: #25d366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-xl);
            z-index: 999;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .whatsapp-float i {
            font-size: 1.75rem;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            :root {
                --section-padding: 80px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .navbar-nav {
                gap: 1rem;
            }

            .calendar-container {
                padding: 1.5rem;
            }

            .calendar-legend {
                gap: 1rem;
                padding: 1rem;
            }

            .gallery-item {
                width: 280px;
                height: 200px;
            }

            .fc .fc-toolbar {
                flex-direction: column;
                gap: 1rem;
            }

            .fc .fc-toolbar-title {
                font-size: 1.5rem;
            }

            .date-status-badge {
                font-size: 0.6rem;
                padding: 0.2rem 0.5rem;
            }

            .booking-dot {
                width: 8px;
                height: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Chap Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#calendar">Availability</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content" data-aos="fade-up" data-aos-duration="800">
            <div class="hero-subtitle">Professional Photography</div>
            <h1 class="hero-title">Capturing Life's Most Precious Moments</h1>
            <p class="hero-description">
                We specialize in creating timeless visual stories through professional photography services.
                From intimate weddings to corporate events, we deliver exceptional results that exceed expectations.
            </p>
            <a href="#calendar" class="cta-button">
                <span>Check Availability</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-subtitle">Our Expertise</div>
                <h2 class="section-title">Professional Photography Services</h2>
                <p class="section-description">
                    We offer comprehensive photography solutions tailored to capture your unique moments
                    with artistic excellence and technical precision.
                </p>
            </div>

            <div class="services-grid">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="service-title">Wedding Photography</h3>
                    <p class="service-description">
                        Comprehensive wedding coverage from engagement to reception, capturing every
                        emotional moment of your special day with artistic storytelling.
                    </p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-icon">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    <h3 class="service-title">Event Photography</h3>
                    <p class="service-description">
                        Professional event documentation for birthdays, anniversaries, and celebrations
                        that preserves memories for generations to come.
                    </p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="service-title">Graduation Sessions</h3>
                    <p class="service-description">
                        Academic milestone photography that celebrates achievements with dignity
                        and captures the pride of educational accomplishments.
                    </p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="service-title">Portrait Sessions</h3>
                    <p class="service-description">
                        Family portraits, couple sessions, and individual headshots crafted with
                        attention to lighting, composition, and authentic emotion.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section" id="gallery">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-subtitle">Our Work</div>
                <h2 class="section-title">Portfolio Showcase</h2>
                <p class="section-description">
                    Explore a curated selection of our finest work, showcasing our commitment
                    to excellence in visual storytelling and artistic composition.
                </p>
            </div>

            <div class="gallery-wrapper">
                <div class="gallery-track" id="galleryTrack">
                    <!-- First set of images -->
                    <div class="gallery-item">
                        <img src="{{ asset('images/pic1.jfif') }}" alt="Wedding Photography">
                        <div class="gallery-overlay">
                            <h4>Wedding Photography</h4>
                            <p>Romantic moments captured forever</p>
                        </div>
                    </div>

                    <div class="gallery-item">
                        <img src="{{ asset('images/pic2.jfif') }}" alt="Event Photography">
                        <div class="gallery-overlay">
                            <h4>Event Photography</h4>
                            <p>Special celebrations and gatherings</p>
                        </div>
                    </div>

                    <div class="gallery-item">
                        <img src="{{ asset('images/pic4.jfif') }}" alt="Graduation Photography">
                        <div class="gallery-overlay">
                            <h4>Graduation Photography</h4>
                            <p>Academic achievements celebrated</p>
                        </div>
                    </div>

                    <div class="gallery-item">
                        <img src="{{ asset('images/pic3.jfif') }}" alt="Portrait Photography">
                        <div class="gallery-overlay">
                            <h4>Portrait Photography</h4>
                            <p>Professional headshots and portraits</p>
                        </div>
                    </div>

                    <!-- Duplicate set for seamless loop -->
                    <div class="gallery-item">
                        <img src="{{ asset('images/pic1.jfif') }}" alt="Wedding Photography">
                        <div class="gallery-overlay">
                            <h4>Wedding Photography</h4>
                            <p>Romantic moments captured forever</p>
                        </div>
                    </div>

                    <div class="gallery-item">
                        <img src="{{ asset('images/pic2.jfif') }}" alt="Event Photography">
                        <div class="gallery-overlay">
                            <h4>Event Photography</h4>
                            <p>Special celebrations and gatherings</p>
                        </div>
                    </div>

                    <div class="gallery-item">
                        <img src="{{ asset('images/pic4.jfif') }}" alt="Graduation Photography">
                        <div class="gallery-overlay">
                            <h4>Graduation Photography</h4>
                            <p>Academic achievements celebrated</p>
                        </div>
                    </div>

                    <div class="gallery-item">
                        <img src="{{ asset('images/pic3.jfif') }}" alt="Portrait Photography">
                        <div class="gallery-overlay">
                            <h4>Portrait Photography</h4>
                            <p>Professional headshots and portraits</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-controls">
                <button class="control-btn" id="pauseBtn" title="Pause/Play Animation">
                    <i class="fas fa-pause"></i>
                </button>
                <button class="control-btn" id="speedBtn" title="Change Speed">
                    <i class="fas fa-tachometer-alt"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Calendar Section -->
    <section class="calendar-section" id="calendar">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-subtitle">Check Availability</div>
                <h2 class="section-title">Our Booking Calendar</h2>
                <p class="section-description">
                    View our availability below. Dates are color-coded for easy identification.
                    <strong>To make a booking, please WhatsApp us directly!</strong>
                </p>
            </div>

            <div class="calendar-container" data-aos="fade-up" data-aos-delay="200">
                <div class="calendar-legend">
                    <div class="legend-item">
                        <div class="legend-indicator legend-available"></div>
                        <span>Available Dates</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-indicator legend-booked"></div>
                        <span>Booked Dates</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-indicator legend-today"></div>
                        <span>Today</span>
                    </div>
                </div>

                <div id="calendar"></div>
            </div>
        </div>
    </section>

    <!-- WhatsApp CTA Section -->
    <section class="whatsapp-cta-section">
        <div class="container" data-aos="fade-up">
            <h2 class="whatsapp-title">Ready to Book Your Session?</h2>
            <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9;">
                Contact us on WhatsApp to discuss your requirements and confirm your booking!
            </p>
            <a href="https://wa.me/60126509707?text=Hi! I would like to book a photography session with Chap Gallery."
               class="whatsapp-btn" target="_blank">
                <i class="fab fa-whatsapp"></i>
                <span>WhatsApp Us Now</span>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="container">
            <div class="footer-content">
                <div>
                    <div class="footer-brand">Chap Gallery</div>
                    <p class="footer-description">
                        Professional photography services specializing in capturing life's most precious moments
                        with artistic excellence and technical precision.
                    </p>
                    <div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Based in Kuantan & Pekan</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-user-circle"></i>
                            <span>Freelance Female Photographer</span>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 style="color: white; margin-bottom: 1.5rem; font-weight: 600;">Get In Touch</h4>
                    <div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:chapgallery11@gmail.com">chapgallery11@gmail.com</a>
                        </div>
                        <div class="contact-item">
                            <i class="fab fa-instagram"></i>
                            <a href="https://www.instagram.com/nsi_visual" target="_blank">@nsi_visual</a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <a href="tel:+60126509707">+60 12-650 9707</a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-quote-left"></i>
                            <span>Direct PM for quotation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 Chap Gallery. All rights reserved. | Professional Photography Services</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/60126509707" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 600,
            once: true,
            offset: 50
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for navigation links
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    const hash = this.getAttribute('href');
                    if (hash.startsWith('#')) {
                        e.preventDefault();
                        const target = document.querySelector(hash);
                        if (target) {
                            const offsetTop = target.offsetTop - 80;
                            window.scrollTo({
                                top: offsetTop,
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            });
        });

        // Gallery controls
        document.addEventListener('DOMContentLoaded', function() {
            const galleryTrack = document.getElementById('galleryTrack');
            const pauseBtn = document.getElementById('pauseBtn');
            const speedBtn = document.getElementById('speedBtn');

            if (galleryTrack && pauseBtn && speedBtn) {
                let isPaused = false;
                let currentSpeed = 30;
                const speeds = [15, 30, 45];
                let speedIndex = 1;

                // Pause/Play functionality
                pauseBtn.addEventListener('click', () => {
                    if (isPaused) {
                        galleryTrack.style.animationPlayState = 'running';
                        pauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
                        isPaused = false;
                    } else {
                        galleryTrack.style.animationPlayState = 'paused';
                        pauseBtn.innerHTML = '<i class="fas fa-play"></i>';
                        isPaused = true;
                    }
                });

                // Speed control functionality
                speedBtn.addEventListener('click', () => {
                    speedIndex = (speedIndex + 1) % speeds.length;
                    currentSpeed = speeds[speedIndex];
                    galleryTrack.style.animationDuration = `${currentSpeed}s`;

                    const icons = ['fa-forward', 'fa-tachometer-alt', 'fa-backward'];
                    speedBtn.innerHTML = `<i class="fas ${icons[speedIndex]}"></i>`;
                });
            }
        });

        // Enhanced Calendar Management
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            let bookedDates = [];

            // Fetch booked dates from backend
            fetch('/booked-dates')
                .then(response => response.json())
                .then(data => {
                    bookedDates = data.booked_dates;
                    initializeCalendar();
                })
                .catch(error => {
                    console.error('Error fetching booked dates:', error);
                    initializeCalendar();
                });

            function initializeCalendar() {
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    height: 'auto',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth'
                    },
                    validRange: {
                        start: new Date()
                    },
                    events: bookedDates.map(date => ({
                        start: date,
                        display: 'background',
                        color: 'transparent'
                    })),
                    dateClick: function(info) {
                        // Get the date in local timezone, not UTC
                        const year = info.date.getFullYear();
                        const month = String(info.date.getMonth() + 1).padStart(2, '0');
                        const day = String(info.date.getDate()).padStart(2, '0');
                        const clickedDate = `${year}-${month}-${day}`;

                        const today = new Date();
                        today.setHours(0, 0, 0, 0);
                        const selectedDate = new Date(info.date);
                        selectedDate.setHours(0, 0, 0, 0);

                        if (selectedDate < today) {
                            return;
                        }

                        const formattedDate = selectedDate.toLocaleDateString('en-US', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });

                        if (bookedDates.includes(clickedDate)) {
                            alert('❌ Sorry, ' + formattedDate + ' is already booked.\n\nPlease choose another date and contact us via WhatsApp!');
                        } else {
                            if (confirm('✅ ' + formattedDate + ' is available!\n\nWould you like to contact us via WhatsApp to book this date?')) {
                                window.open('https://wa.me/60126509707?text=Hi! I would like to book a photography session on ' + formattedDate, '_blank');
                            }
                        }
                    },
                    dayCellDidMount: function(info) {
                        // Get the date in local timezone, not UTC
                        const year = info.date.getFullYear();
                        const month = String(info.date.getMonth() + 1).padStart(2, '0');
                        const day = String(info.date.getDate()).padStart(2, '0');
                        const dateString = `${year}-${month}-${day}`;

                        const today = new Date();
                        today.setHours(0, 0, 0, 0);
                        const cellDate = new Date(info.date);
                        cellDate.setHours(0, 0, 0, 0);
                        const isToday = cellDate.getTime() === today.getTime();

                        if (cellDate < today) {
                            info.el.classList.add('fc-day-past');
                            return;
                        }

                        // Create status badge
                        const badge = document.createElement('div');
                        badge.className = 'date-status-badge';

                        if (bookedDates.includes(dateString)) {
                            info.el.classList.add('fc-day-disabled');
                            badge.className += ' badge-booked';
                            badge.innerHTML = 'Booked';
                        } else {
                            info.el.classList.add('fc-day-available');
                            badge.className += ' badge-available';
                            badge.innerHTML = 'Available';
                        }

                        if (isToday) {
                            // Override with today badge
                            badge.className = 'date-status-badge badge-today';
                            badge.innerHTML = 'Today';
                        }

                        info.el.appendChild(badge);
                    }
                });

                calendar.render();
            }
        });
    </script>
</body>
</html>
