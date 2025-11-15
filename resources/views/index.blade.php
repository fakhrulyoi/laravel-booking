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
            /* Professional Color Palette */
            --primary-dark: #0f172a;
            --primary-medium: #1e293b;
            --primary-light: #334155;
            --accent-blue: #3b82f6;
            --accent-emerald: #10b981;
            --neutral-50: #f8fafc;
            --neutral-100: #f1f5f9;
            --neutral-200: #e2e8f0;
            --neutral-300: #cbd5e1;
            --neutral-400: #94a3b8;
            --neutral-500: #64748b;
            --neutral-600: #475569;
            --neutral-700: #334155;
            --neutral-800: #1e293b;
            --neutral-900: #0f172a;

            /* Typography */
            --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: 'Playfair Display', serif;

            /* Spacing & Layout */
            --section-padding: 120px;
            --container-max-width: 1200px;
            --border-radius: 12px;
            --border-radius-lg: 20px;

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
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
            font-weight: 400;
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
                url('https://images.unsplash.com/photo-1606216794074-735e91aa2c92?ixlib=rb-4.0.3&auto=format&fit=crop&w=2400&q=80') center/cover no-repeat;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero-content {
            max-width: var(--container-max-width);
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
/* Add this to your existing CSS */

/* Animated Gallery Container */
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

/* Pause animation on hover */
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

/* Gradient fade edges */
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

/* Controls */
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

/* Enhanced overlay */
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
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 4rem;
        }

        .gallery-item {
            position: relative;
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            aspect-ratio: 4/3;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-item:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-xl);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
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
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay i {
            font-size: 2rem;
            color: white;
        }

        /* Booking Section */
        .booking-section {
            padding: var(--section-padding) 0;
            background: var(--neutral-50);
        }

        .booking-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            margin-top: 4rem;
        }
        /* Add this to your CSS */
        .booked-date {
            background-color: #fee2e2 !important;
        }

        .fc-day.fc-day-disabled {
            background-color: #fee2e2 !important;
            color: #dc2626 !important;
            cursor: not-allowed !important;
        }

        .fc-day.fc-day-disabled .fc-daygrid-day-number {
            color: #dc2626 !important;
        }
        .booking-form {
            background: white;
            padding: 3rem;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--neutral-200);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--neutral-200);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .time-slots {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 0.75rem;
            margin-top: 0.5rem;
            max-height: 200px;
            overflow-y: auto;
        }

        .time-slot {
            padding: 0.75rem;
            border: 2px solid var(--neutral-200);
            border-radius: var(--border-radius);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .time-slot:hover {
            border-color: var(--accent-blue);
            background: rgba(59, 130, 246, 0.05);
        }

        .time-slot.selected {
            background: var(--accent-blue);
            border-color: var(--accent-blue);
            color: white;
        }

        .time-slot.disabled {
            background: var(--neutral-100);
            color: var(--neutral-400);
            cursor: not-allowed;
            border-color: var(--neutral-200);
        }

        .btn-primary {
            background: var(--accent-blue);
            border: none;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .calendar-container {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--neutral-200);
        }

        /* Date unavailable styling */
        .fc-day.fc-day-disabled {
            background-color: #fee2e2 !important;
            color: #dc2626 !important;
            cursor: not-allowed !important;
        }

        .fc-day.fc-day-disabled .fc-daygrid-day-number {
            color: #dc2626 !important;
        }

        .unavailable-date-info {
            background: #fee2e2;
            border: 1px solid #fecaca;
            border-radius: var(--border-radius);
            padding: 1rem;
            margin-top: 1rem;
            color: #dc2626;
            font-size: 0.875rem;
            display: none;
        }

        .unavailable-date-info.show {
            display: block;
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

        .contact-info {
            space-y: 1rem;
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

            .booking-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .navbar-nav {
                gap: 1rem;
            }

            .booking-form,
            .calendar-container {
                padding: 2rem;
            }

            .time-slots {
                grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
            }
        }

        /* Alert Styles */
        .alert {
            border-radius: var(--border-radius);
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid var(--accent-emerald);
            color: #047857;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid #ef4444;
            color: #dc2626;
        }
    </style>
</head>
<body>
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
                        <a class="nav-link" href="#booking">Book Now</a>
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

    <section class="hero-section">
        <div class="hero-content" data-aos="fade-up" data-aos-duration="800">
            <div class="hero-subtitle">Professional Photography</div>
            <h1 class="hero-title">Capturing Life's Most Precious Moments</h1>
            <p class="hero-description">
                We specialize in creating timeless visual stories through professional photography services.
                From intimate weddings to corporate events, we deliver exceptional results that exceed expectations.
            </p>
            <a href="#booking" class="cta-button">
                <span>Book Your Session</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

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

<!-- Replace your existing gallery section with this -->
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
                        <i class="fas fa-search-plus"></i>
                        <h4>Wedding Photography</h4>
                        <p>Romantic moments captured forever</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('images/pic2.jfif') }}" alt="Event Photography">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Event Photography</h4>
                        <p>Special celebrations and gatherings</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('images/pic4.jfif') }}" alt="Graduation Photography">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Graduation Photography</h4>
                        <p>Academic achievements celebrated</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('images/pic3.jfif') }}" alt="Portrait Photography">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Portrait Photography</h4>
                        <p>Professional headshots and portraits</p>
                    </div>
                </div>

                <!-- Duplicate set for seamless loop -->
                <div class="gallery-item">
                    <img src="{{ asset('images/pic1.jfif') }}" alt="Wedding Photography">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Wedding Photography</h4>
                        <p>Romantic moments captured forever</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('images/pic2.jfif') }}" alt="Event Photography">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Event Photography</h4>
                        <p>Special celebrations and gatherings</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('images/pic4.jfif') }}" alt="Graduation Photography">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                        <h4>Graduation Photography</h4>
                        <p>Academic achievements celebrated</p>
                    </div>
                </div>

                <div class="gallery-item">
                    <img src="{{ asset('images/pic3.jfif') }}" alt="Portrait Photography">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
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

    <section class="booking-section" id="booking">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-subtitle">Get Started</div>
                <h2 class="section-title">Book Your Photography Session</h2>
                <p class="section-description">
                    Schedule your consultation and let us create beautiful memories together.
                    <strong>Please note: Only one booking is available per day.</strong>
                </p>
            </div>

            <div id="alert-container"></div>

            <div class="booking-container">
                <div class="booking-form" data-aos="fade-right">
                    <h3 style="margin-bottom: 2rem; color: var(--primary-dark); font-family: var(--font-display);">Booking Details</h3>

<form action="{{ route('book.store') }}" method="POST" id="bookingForm">
    @csrf   {{-- This prevents 419 errors --}}

    <div class="form-group">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Preferred Date</label>
        <input type="date" id="booking-date" name="date" class="form-control" required min="">
        <div class="unavailable-date-info" id="unavailable-info">
            <i class="fas fa-exclamation-triangle me-2"></i>
            This date is already booked. Please select another available date.
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Available Time Slots (8:00 AM - 11:00 PM)</label>
        <div class="time-slots" id="time-slots"></div>
        <input type="hidden" name="time" id="selected-time" required>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Photography Type</label>
                <select name="type" class="form-control" required>
                    <option value="">Select Service</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Birthday">Birthday</option>
                    <option value="Convocation">Convocation</option>
                    <option value="Couple">Couple</option>
                    <option value="Family">Family</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" required placeholder="Studio, Outdoor, or Client venue">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Special Requirements (Optional)</label>
        <textarea name="message" class="form-control" rows="4" placeholder="Tell us about any special requirements or preferences..."></textarea>
    </div>

    <button type="submit" class="btn-primary" id="submitBtn">
        <span>Submit Booking Request</span>
    </button>
</form>

                </div>

                <div class="calendar-container" data-aos="fade-left">
                    <h3 style="margin-bottom: 2rem; color: var(--primary-dark); font-family: var(--font-display);">Available Dates</h3>
                    <div id="calendar"></div>
                    <div style="margin-top: 1rem; font-size: 0.875rem; color: var(--neutral-600);">
                        <div><span style="display: inline-block; width: 12px; height: 12px; background: #fee2e2; border-radius: 2px; margin-right: 8px;"></span>Unavailable (Already Booked)</div>
                        <div style="margin-top: 0.5rem;"><span style="display: inline-block; width: 12px; height: 12px; background: #f0f9ff; border-radius: 2px; margin-right: 8px;"></span>Available for Booking</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="container">
            <div class="footer-content">
                <div>
                    <div class="footer-brand">Chap Gallery</div>
                    <p class="footer-description">
                        Professional photography services specializing in capturing life's most precious moments
                        with artistic excellence and technical precision.
                    </p>
                    <div class="contact-info">
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
                    <div class="contact-info">
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

    <a href="https://wa.me/+60126509707" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Add this to your existing JavaScript
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
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
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

// Calendar and Time Slot Management
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const bookingDateInput = document.getElementById('booking-date');
    const timeSlotsContainer = document.getElementById('time-slots');
    const selectedTimeInput = document.getElementById('selected-time');
    const unavailableInfo = document.getElementById('unavailable-info');

    let bookedDates = [];
    let allBookings = []; // Store all booking data

    // Extended time slots from 8 AM to 11 PM
    const availableTimes = [
        '08:00', '09:00', '10:00', '11:00', '12:00', '13:00',
        '14:00', '15:00', '16:00', '17:00', '18:00', '19:00',
        '20:00', '21:00', '22:00', '23:00'
    ];

    // Fetch booked dates from the backend
    async function fetchBookedDates() {
        try {
            const response = await fetch('/booked-dates');
            const data = await response.json();
            bookedDates = data.booked_dates;

            // Fetch all bookings to get details
            const bookingsResponse = await fetch('/all-bookings'); // Need to create this endpoint
            const bookingsData = await bookingsResponse.json();
            allBookings = bookingsData.bookings;

            // Now, initialize the calendar with the fetched data
            initializeCalendar();

        } catch (error) {
            console.error("Error fetching data:", error);
            // Initialize calendar even if fetch fails to avoid breaking the page
            initializeCalendar();
        }
    }

    // Initialize calendar function
    function initializeCalendar() {
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 'auto',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            // Create events for booked dates with details
            events: allBookings.map(booking => ({
                start: booking.date,
                display: 'background',
                color: '#fee2e2',
                title: `${booking.name} - ${booking.time}`, // Show name and time on hover
                className: 'booked-date'
            })),
            dateClick: function(info) {
                const clickedDate = new Date(info.dateStr);
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                if (clickedDate < today) {
                    return;
                }

                // Check if date is already booked using the fetched data
                if (bookedDates.includes(info.dateStr)) {
                    // Find the booking for this date
                    const booking = allBookings.find(b => b.date === info.dateStr);
                    if (booking) {
                        showAlert(`This date is already booked by ${booking.name} at ${formatTime(booking.time)}. Please select another available date.`, 'danger');
                    } else {
                        showAlert('This date is already booked. Please select another available date.', 'danger');
                    }
                    return;
                }

                bookingDateInput.value = info.dateStr;
                generateTimeSlots(clickedDate);

                timeSlotsContainer.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            },
            dayCellDidMount: function(info) {
                const dateString = info.date.toISOString().split('T')[0];
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                if (info.date < today) {
                    info.el.classList.add('fc-day-disabled');
                    info.el.style.pointerEvents = 'none';
                } else if (bookedDates.includes(dateString)) {
                    info.el.classList.add('fc-day-disabled');
                    info.el.style.cursor = 'not-allowed';

                    // Add a dot indicator for booked dates
                    const dot = document.createElement('div');
                    dot.style.position = 'absolute';
                    dot.style.top = '5px';
                    dot.style.right = '5px';
                    dot.style.width = '8px';
                    dot.style.height = '8px';
                    dot.style.backgroundColor = '#dc2626';
                    dot.style.borderRadius = '50%';
                    info.el.appendChild(dot);
                }
            }
        });

        calendar.render();

        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        bookingDateInput.min = tomorrow.toISOString().split('T')[0];
        generateTimeSlots(tomorrow);
    }

            // Generate time slot buttons
            function generateTimeSlots(selectedDate) {
                timeSlotsContainer.innerHTML = '';
                const dateString = selectedDate.toISOString().split('T')[0];

                // Check if date is already booked
                const isDateBooked = bookedDates.includes(dateString);

                if (isDateBooked) {
                    unavailableInfo.classList.add('show');
                    timeSlotsContainer.innerHTML = '<div style="text-align: center; color: #dc2626; padding: 2rem;"><i class="fas fa-calendar-times" style="font-size: 2rem; margin-bottom: 1rem;"></i><br>This date is fully booked</div>';
                    return;
                } else {
                    unavailableInfo.classList.remove('show');
                }

                // Generate all time slots since date is available
                availableTimes.forEach(time => {
                    const button = document.createElement('div');
                    button.textContent = formatTime(time);
                    button.classList.add('time-slot');
                    button.setAttribute('data-time', time);

                    button.addEventListener('click', () => {
                        document.querySelectorAll('.time-slot').forEach(btn => {
                            btn.classList.remove('selected');
                        });
                        button.classList.add('selected');
                        selectedTimeInput.value = time;
                    });

                    timeSlotsContainer.appendChild(button);
                });
            }

            // Format time for display
            function formatTime(time) {
                const [hours, minutes] = time.split(':');
                const hour = parseInt(hours);
                const ampm = hour >= 12 ? 'PM' : 'AM';
                const formattedHour = hour % 12 === 0 ? 12 : hour % 12;
                return `${formattedHour}:${minutes} ${ampm}`;
            }

            // Show alert function
            function showAlert(message, type) {
                const alertContainer = document.getElementById('alert-container');
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type}`;
                alertDiv.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>${message}`;

                // Remove existing alerts
                alertContainer.innerHTML = '';
                alertContainer.appendChild(alertDiv);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    alertDiv.style.transition = 'opacity 0.5s ease';
                    alertDiv.style.opacity = '0';
                    setTimeout(() => alertDiv.remove(), 500);
                }, 5000);
            }

            // Date input change handler
            bookingDateInput.addEventListener('change', (event) => {
                const selectedDate = new Date(event.target.value);
                const dateString = event.target.value;

                // Clear previous time selection
                selectedTimeInput.value = '';

                // Check if date is already booked
                if (bookedDates.includes(dateString)) {
                    showAlert('This date is already booked. Please select another available date.', 'danger');
                    event.target.value = '';
                    return;
                }

                generateTimeSlots(selectedDate);
            });

            // Form submission handling with enhanced validation
            document.getElementById('bookingForm').addEventListener('submit', function(e) {
                const submitBtn = document.getElementById('submitBtn');
                const selectedTime = document.getElementById('selected-time').value;
                const selectedDate = document.getElementById('booking-date').value;

                if (!selectedTime) {
                    e.preventDefault();
                    showAlert('Please select a time slot for your booking session.', 'danger');
                    document.getElementById('time-slots').scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    return;
                }

                // Check if date is already booked (client-side validation)
                if (selectedDate) {
                    if (bookedDates.includes(selectedDate)) {
                        e.preventDefault();
                        showAlert('This date is already booked. Please select another available date.', 'danger');
                        return;
                    }
                }

                submitBtn.innerHTML = '<span>Processing Your Booking...</span>';
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.7';
            });

            // Enhanced mobile menu toggle
            document.addEventListener('DOMContentLoaded', function() {
                const navbarToggler = document.querySelector('.navbar-toggler');
                const navbarCollapse = document.querySelector('.navbar-collapse');

                if (navbarToggler) {
                    navbarToggler.addEventListener('click', function() {
                        navbarCollapse.classList.toggle('show');
                    });
                }
            });

            // Call the async function to start the process
            fetchBookedDates();
        });
    </script>
</body>
</html>
