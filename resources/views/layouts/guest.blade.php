<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Login | SmartPOS AI</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        // Logika Inisialisasi Dark Mode
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: linear-gradient(135deg, #eff6ff 0%, #ffffff 100%);
            overflow: hidden;
        }

        body.dark {
            background: linear-gradient(135deg, #000000 0%, #0f172a 100%);
        }

        .login-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }

        .dark .login-card {
            background: rgba(15, 23, 42, 0.9);
        }

        /* Animasi Elemen Background */
        .float-slow {
            animation: float 8s ease-in-out infinite;
        }

        .float-delayed {
            animation: float 10s ease-in-out infinite;
            animation-delay: 2s;
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            50% { transform: translate(-20px, 30px); }
            100% { transform: translate(0, 0); }
        }

        .loader {
            display: none;
            width: 18px;
            height: 18px;
            border: 2px solid #ffffff;
            border-bottom-color: transparent;
            border-radius: 50%;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative bg-white dark:bg-black transition-colors duration-300">
    
    <div class="float-slow absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 sm:w-96 sm:h-96 bg-blue-100 dark:bg-green-500/10 rounded-full blur-3xl opacity-60 dark:opacity-30 pointer-events-none transition-colors duration-300"></div>
    <div class="float-delayed absolute bottom-0 left-0 -ml-20 -mb-20 w-56 h-56 sm:w-80 sm:h-80 bg-yellow-100 dark:bg-yellow-500/10 rounded-full blur-3xl opacity-60 dark:opacity-30 pointer-events-none transition-colors duration-300"></div>

    {{ $slot }}

    @stack('scripts')
</body>
</html>