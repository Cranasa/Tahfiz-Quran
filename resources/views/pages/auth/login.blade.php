<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Motor Injection Diagnosis System</title>
    
    <link rel="shortcut icon" href="/mazer/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/mazer/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/mazer/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="/mazer/assets/extensions/toastify-js/src/toastify.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .logo i {
            color: white;
            font-size: 24px;
        }

        .login-title {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #718096;
            font-size: 15px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
            color: #2d3748;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: #a0aec0;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
        }

        .checkbox-wrapper input[type="checkbox"] {
            margin-right: 8px;
            transform: scale(1.1);
        }

        .checkbox-wrapper label {
            color: #4a5568;
            font-size: 14px;
            cursor: pointer;
        }

        .forgot-link {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #5a67d8;
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .login-button:hover::before {
            left: 100%;
        }

        .footer-text {
            text-align: center;
            margin-top: 32px;
            color: #718096;
            font-size: 14px;
        }

        .footer-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #5a67d8;
        }

        .feature-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background: linear-gradient(45deg, #ff6b6b, #ffd93d);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 25px;
                margin: 10px;
            }
            
            .login-title {
                font-size: 24px;
            }
        }

        /* Loading animation */
        .loading {
            position: relative;
        }

        .loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }

        /* Toast notification styling */
        .toastify {
            border-radius: 12px !important;
            font-family: inherit !important;
            font-weight: 500 !important;
        }
    </style>
</head>

<body>
    <script src="/mazer/assets/static/js/initTheme.js"></script>
    
    <div class="login-container">
        {{-- <div class="feature-badge">AI Expert</div> --}}
        
        <div class="logo-section">
            <div class="logo">
                <i class="bi bi-gear-wide-connected"></i>
            </div>
            <h1 class="login-title">Login Page</h1>
            <p class="login-subtitle">Sign in to access Motor Injection<br>Diagnosis Expert System</p>
        </div>

        <form action="{{ route('login.store') }}" method="POST" id="loginForm">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input 
                    type="email" 
                    id="email"
                    name="email" 
                    class="form-input"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    id="password"
                    name="password" 
                    class="form-input"
                    placeholder="Enter your password"
                    value="{{ old('password') }}"
                    required
                >
            </div>

            <div class="form-options">
                <div class="checkbox-wrapper">
                    <input type="checkbox" id="rememberMe" name="remember">
                    <label for="rememberMe">Remember me</label>
                </div>
                <a href="#" class="forgot-link">Forgot password?</a>
            </div>

            <button type="submit" class="login-button" id="loginBtn">
                <i class="bi bi-box-arrow-in-right" style="margin-right: 8px;"></i>
                Sign In
            </button>
        </form>

    </div>

    <script src="/mazer/assets/extensions/toastify-js/src/toastify.js"></script>
    
    <script>
        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function() {
            const button = document.getElementById('loginBtn');
            button.classList.add('loading');
            button.disabled = true;
            button.innerHTML = '<i class="bi bi-hourglass-split" style="margin-right: 8px;"></i>Signing In...';
        });

        // Input focus animations
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>

    @if (session()->has('warning'))
    <script>
        Toastify({
            text: "{{ session('warning') }}",
            duration: 4000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(45deg, #ffc107, #ff8c00)",
            className: "warning-toast"
        }).showToast();
    </script>
    @endif
</body>
</html>