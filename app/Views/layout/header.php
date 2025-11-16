<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Curriculum Vitae') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }
        
        .card-shadow:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: translateY(-2px);
        }
        
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #667eea;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        .skill-bar {
            transition: width 1s ease-in-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Name -->
                <div class="flex-shrink-0">
                    <a href="<?= base_url() ?>" class="text-2xl font-bold text-gray-800">
                        <span class="text-purple-600">CV</span> 
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="<?= base_url() ?>" class="nav-link <?= (uri_string() == '' || uri_string() == 'cv') ? 'active text-purple-600' : 'text-gray-600' ?> hover:text-purple-600 px-3 py-2 text-sm font-medium">
                            <i class="fas fa-home mr-2"></i>Beranda
                        </a>
                        <a href="<?= base_url('cv/pendidikan') ?>" class="nav-link <?= (uri_string() == 'cv/pendidikan') ? 'active text-purple-600' : 'text-gray-600' ?> hover:text-purple-600 px-3 py-2 text-sm font-medium">
                            <i class="fas fa-graduation-cap mr-2"></i>Pendidikan
                        </a>
                        <a href="<?= base_url('cv/pengalaman') ?>" class="nav-link <?= (uri_string() == 'cv/pengalaman') ? 'active text-purple-600' : 'text-gray-600' ?> hover:text-purple-600 px-3 py-2 text-sm font-medium">
                            <i class="fas fa-briefcase mr-2"></i>Pengalaman
                        </a>
                        <a href="<?= base_url('cv/keahlian') ?>" class="nav-link <?= (uri_string() == 'cv/keahlian') ? 'active text-purple-600' : 'text-gray-600' ?> hover:text-purple-600 px-3 py-2 text-sm font-medium">
                            <i class="fas fa-code mr-2"></i>Keahlian
                        </a>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 hover:text-purple-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="<?= base_url() ?>" class="<?= (uri_string() == '' || uri_string() == 'cv') ? 'bg-purple-50 text-purple-600' : 'text-gray-600' ?> hover:bg-purple-50 hover:text-purple-600 block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fas fa-home mr-2"></i>Beranda
                </a>
                <a href="<?= base_url('cv/pendidikan') ?>" class="<?= (uri_string() == 'cv/pendidikan') ? 'bg-purple-50 text-purple-600' : 'text-gray-600' ?> hover:bg-purple-50 hover:text-purple-600 block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fas fa-graduation-cap mr-2"></i>Pendidikan
                </a>
                <a href="<?= base_url('cv/pengalaman') ?>" class="<?= (uri_string() == 'cv/pengalaman') ? 'bg-purple-50 text-purple-600' : 'text-gray-600' ?> hover:bg-purple-50 hover:text-purple-600 block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fas fa-briefcase mr-2"></i>Pengalaman
                </a>
                <a href="<?= base_url('cv/keahlian') ?>" class="<?= (uri_string() == 'cv/keahlian') ? 'bg-purple-50 text-purple-600' : 'text-gray-600' ?> hover:bg-purple-50 hover:text-purple-600 block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fas fa-code mr-2"></i>Keahlian
                </a>
            </div>
        </div>
    </nav>
    
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>