<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Chap Gallery</title>

    <!-- Modern Professional Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            /* Professional Color System */
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

            /* Layout */
            --border-radius: 12px;
            --border-radius-lg: 20px;

            /* Shadows & Effects */
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
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-medium) 50%, var(--primary-light) 100%);
            position: relative;
            overflow: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Background Elements */
        .bg-decoration {
            position: absolute;
            inset: 0;
            overflow: hidden;
            z-index: 0;
        }

        .bg-decoration::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }

        .bg-decoration::after {
            content: '';
            position: absolute;
            bottom: -50%;
            left: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
            animation: float 25s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        /* Grid Pattern */
        .grid-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.05;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 30s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        /* Login Container */
        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 420px;
            padding: 2rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            padding: 3rem;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            animation: slideUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Header Section */
        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .brand-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--accent-blue), var(--accent-emerald));
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .brand-icon::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shimmer 2s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .brand-icon i {
            font-size: 1.75rem;
            color: white;
            z-index: 1;
            position: relative;
        }

        .login-title {
            font-family: var(--font-display);
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        .login-subtitle {
            color: var(--neutral-600);
            font-size: 1rem;
            font-weight: 500;
        }

        /* Form Elements */
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-input-wrapper {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid var(--neutral-200);
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 500;
            background: var(--neutral-50);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: var(--primary-dark);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-blue);
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }

        .form-control::placeholder {
            color: var(--neutral-400);
            font-weight: 400;
        }

        .form-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--neutral-400);
            font-size: 1.125rem;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .form-control:focus + .form-icon {
            color: var(--accent-blue);
        }

        /* Submit Button */
        .btn-login {
            width: 100%;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--accent-blue), var(--accent-emerald));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            box-shadow: var(--shadow-md);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: var(--shadow-md);
        }

        .btn-login.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-login.loading .btn-text {
            opacity: 0;
        }

        .btn-login.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Alert Styles */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: var(--border-radius);
            margin-bottom: 2rem;
            border: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: slideInDown 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .alert-danger i {
            color: #ef4444;
        }

        /* Security Notice */
        .security-notice {
            text-align: center;
            margin-top: 2rem;
            padding: 1rem;
            background: rgba(59, 130, 246, 0.05);
            border-radius: var(--border-radius);
            border: 1px solid rgba(59, 130, 246, 0.1);
        }

        .security-notice i {
            color: var(--accent-blue);
            margin-right: 0.5rem;
            font-size: 0.875rem;
        }

        .security-notice-text {
            color: var(--neutral-600);
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Back Link */
        .back-link {
            position: absolute;
            top: 2rem;
            left: 2rem;
            z-index: 20;
        }

        .back-link a {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .back-link a:hover {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        /* Password Strength Indicator */
        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--neutral-400);
            cursor: pointer;
            padding: 0;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--neutral-600);
        }

        /* Footer */
        .login-footer {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            z-index: 10;
        }

        .login-footer p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.875rem;
            margin: 0;
        }

        .login-footer a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .login-footer a:hover {
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .login-container {
                padding: 1rem;
            }

            .login-card {
                padding: 2rem 1.5rem;
            }

            .login-title {
                font-size: 1.5rem;
            }

            .back-link {
                top: 1rem;
                left: 1rem;
            }

            .login-footer {
                bottom: 1rem;
            }
        }

        /* Focus management */
        .form-control:focus {
            outline: none;
        }

        /* Accessibility improvements */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            .form-control {
                border-color: var(--primary-dark);
            }

            .form-control:focus {
                border-color: var(--accent-blue);
                box-shadow: 0 0 0 4px var(--accent-blue);
            }
        }
    </style>
</head>
<body>
    <!-- Background Elements -->
    <div class="bg-decoration"></div>
    <div class="grid-pattern"></div>

    <!-- Back Link -->
    <div class="back-link">
        <a href="/">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Website</span>
        </a>
    </div>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="brand-icon">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <h1 class="login-title">Admin Access</h1>
                <p class="login-subtitle">Secure Dashboard Login</p>
            </div>

            <!-- Error Alert -->
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="/login" id="loginForm" novalidate>
                @csrf
                <div class="form-group">
                    <label for="password" class="form-label">Admin Password</label>
                    <div class="form-input-wrapper password-wrapper">
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control"
                               placeholder="Enter your secure password"
                               required
                               autocomplete="current-password"
                               aria-describedby="password-help">
                        <i class="fas fa-lock form-icon"></i>
                        <button type="button" class="password-toggle" onclick="togglePassword()" aria-label="Toggle password visibility">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login" id="loginBtn">
                    <span class="btn-text">Access Dashboard</span>
                </button>
            </form>

            <!-- Security Notice -->
            <div class="security-notice">
                <p class="security-notice-text">
                    <i class="fas fa-info-circle"></i>
                    This is a secure administrative area. All access attempts are logged.
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="login-footer">
        <p>&copy; {{ date('Y') }} Chap Gallery. All rights reserved.</p>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto-focus password field
        document.addEventListener('DOMContentLoaded', function() {
            const passwordField = document.getElementById('password');
            if (passwordField) {
                // Small delay to ensure page is fully loaded
                setTimeout(() => {
                    passwordField.focus();
                }, 100);
            }
        });

        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('loginBtn');
            const passwordField = document.getElementById('password');

            // Basic validation
            if (!passwordField.value.trim()) {
                e.preventDefault();
                passwordField.focus();
                return;
            }

            // Add loading state
            btn.classList.add('loading');
            btn.disabled = true;

            // Reset loading state if form submission fails (after timeout)
            setTimeout(function() {
                if (document.querySelector('.alert-danger')) {
                    btn.classList.remove('loading');
                    btn.disabled = false;
                    passwordField.focus();
                }
            }, 2000);
        });

        // Enhanced keyboard navigation
        document.addEventListener('keydown', function(e) {
            // Enter key on password field
            if (e.key === 'Enter' && document.activeElement === document.getElementById('password')) {
                e.preventDefault();
                document.getElementById('loginForm').dispatchEvent(new Event('submit'));
            }

            // Escape key to go back
            if (e.key === 'Escape') {
                window.location.href = '/';
            }
        });

        // Auto-hide error messages
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert-danger');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 500);
            });
        }, 5000);

        // Prevent form resubmission on page refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        // Add subtle animations on input focus
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentNode.style.transform = 'translateY(-1px)';
            });

            input.addEventListener('blur', function() {
                this.parentNode.style.transform = 'translateY(0)';
            });
        });

        // Security: Clear password field on page unload
        window.addEventListener('beforeunload', function() {
            const passwordField = document.getElementById('password');
            if (passwordField) {
                passwordField.value = '';
            }
        });

        // Add ripple effect to login button
        document.getElementById('loginBtn').addEventListener('click', function(e) {
            if (this.classList.contains('loading')) return;

            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
                z-index: 0;
            `;

            this.appendChild(ripple);

            setTimeout(() => {
                if (ripple.parentNode) {
                    ripple.remove();
                }
            }, 600);
        });

        // Add ripple animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Accessibility: Announce login errors to screen readers
        if (document.querySelector('.alert-danger')) {
            const announcement = document.createElement('div');
            announcement.setAttribute('aria-live', 'polite');
            announcement.setAttribute('aria-atomic', 'true');
            announcement.style.position = 'absolute';
            announcement.style.left = '-9999px';
            announcement.textContent = 'Login failed. Please check your password and try again.';
            document.body.appendChild(announcement);

            setTimeout(() => {
                if (announcement.parentNode) {
                    announcement.remove();
                }
            }, 3000);
        }
    </script>
</body>
</html>
