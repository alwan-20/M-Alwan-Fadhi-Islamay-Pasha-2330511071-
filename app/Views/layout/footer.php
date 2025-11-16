    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About Section -->
                <div class="fade-in-up">
                    <h3 class="text-xl font-bold mb-4">Tentang CV</h3>
                    <p class="text-gray-300 leading-relaxed">
                        CV online ini dibuat untuk memudahkan dalam menampilkan informasi profesional secara digital dan responsif.
                    </p>
                </div>
                
                <!-- Quick Links -->
                <div class="fade-in-up">
                    <h3 class="text-xl font-bold mb-4">Menu Cepat</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="<?= base_url() ?>" class="text-gray-300 hover:text-purple-400 transition-colors">
                                <i class="fas fa-chevron-right mr-2 text-xs"></i>Beranda
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('cv/pendidikan') ?>" class="text-gray-300 hover:text-purple-400 transition-colors">
                                <i class="fas fa-chevron-right mr-2 text-xs"></i>Pendidikan
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('cv/pengalaman') ?>" class="text-gray-300 hover:text-purple-400 transition-colors">
                                <i class="fas fa-chevron-right mr-2 text-xs"></i>Pengalaman
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('cv/keahlian') ?>" class="text-gray-300 hover:text-purple-400 transition-colors">
                                <i class="fas fa-chevron-right mr-2 text-xs"></i>Keahlian
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="fade-in-up">
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-purple-400"></i>
                            <span><?= esc($biodata['email'] ?? 'email@example.com') ?></span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-purple-400"></i>
                            <span><?= esc($biodata['telepon'] ?? '-') ?></span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3 text-purple-400"></i>
                            <span><?= esc($biodata['alamat'] ?? '-') ?></span>
                        </li>
                    </ul>
                    
                    <!-- Social Media -->
                    <div class="flex space-x-4 mt-6">
                        <?php if (!empty($biodata['linkedin'])): ?>
                        <a href="<?= esc($biodata['linkedin']) ?>" target="_blank" class="bg-purple-600 hover:bg-purple-700 text-white w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($biodata['github'])): ?>
                        <a href="<?= esc($biodata['github']) ?>" target="_blank" class="bg-purple-600 hover:bg-purple-700 text-white w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-github"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; <?= date('Y') ?> <?= esc($biodata['nama'] ?? 'CV Online') ?>. All rights reserved.</p>
                <p class="text-sm mt-2">Built with CodeIgniter 4 & Tailwind CSS</p>
            </div>
        </div>
    </footer>
    
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Fade in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.card-shadow, .fade-in-up').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>