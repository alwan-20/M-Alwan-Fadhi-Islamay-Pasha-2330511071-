<?= $this->include('layout/header') ?>

<!-- Hero Section -->
<section class="gradient-bg text-white py-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <!-- Profile Info -->
            <div class="md:w-2/3 mb-8 md:mb-0 fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    <?= esc($biodata['nama']) ?>
                </h1>
                <p class="text-xl md:text-2xl mb-6 text-purple-100">
                    <?= esc($biodata['program_studi']) ?> | <?= esc($biodata['universitas']) ?>
                </p>
                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        <span>Semester <?= esc($biodata['semester']) ?></span>
                    </div>
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full">
                        <i class="fas fa-star mr-2"></i>
                        <span>IPK: <?= number_format($biodata['ipk'], 2) ?></span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-4">
                    <?php if (!empty($biodata['email'])): ?>
                    <a href="mailto:<?= esc($biodata['email']) ?>" class="bg-white text-purple-600 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                        <i class="fas fa-envelope mr-2"></i>
                        Email Saya
                    </a>
                    <?php endif; ?>
                    
                    <?php if (!empty($biodata['linkedin'])): ?>
                    <a href="<?= esc($biodata['linkedin']) ?>" target="_blank" class="bg-white/10 backdrop-blur-sm hover:bg-white/20 px-6 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                        <i class="fab fa-linkedin mr-2"></i>
                        LinkedIn
                    </a>
                    <?php endif; ?>
                    
                    <?php if (!empty($biodata['github'])): ?>
                    <a href="<?= esc($biodata['github']) ?>" target="_blank" class="bg-white/10 backdrop-blur-sm hover:bg-white/20 px-6 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                        <i class="fab fa-github mr-2"></i>
                        GitHub
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Profile Photo -->
            <div class="md:w-1/3 flex justify-center fade-in-up">
                <div class="relative">
                    <div class="w-64 h-64 rounded-full overflow-hidden border-8 border-white shadow-2xl">
                        <?php if (!empty($biodata['foto'])): ?>
                            <img src="<?= base_url('cv/foto/' . esc($biodata['foto'])) ?>" alt="Profile photo of <?= esc($biodata['nama']) ?> showing professional appearance" class="w-full h-full object-cover">
                        <?php else: ?>
                            <img src="https://placehold.co/400x400" alt="Professional placeholder photo of university student in formal attire with neutral background" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="absolute -bottom-4 -right-4 bg-white text-purple-600 p-4 rounded-full shadow-lg">
                        <i class="fas fa-user-graduate text-3xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg p-8 card-shadow">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-user-circle text-purple-600 mr-3"></i>
                    Tentang Saya
                </h2>
                <p class="text-gray-600 leading-relaxed text-lg">
                    <?= nl2br(esc($biodata['tentang_saya'])) ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Quick Info Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
            Ringkasan Profil
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Education Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 card-shadow">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-graduation-cap text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Pendidikan</h3>
                <p class="text-gray-600 mb-4">
                    <?= count($pendidikan) ?> riwayat pendidikan formal
                </p>
                <a href="<?= base_url('cv/pendidikan') ?>" class="text-purple-600 hover:text-purple-700 font-semibold inline-flex items-center">
                    Lihat Detail
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <!-- Experience Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 card-shadow">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-briefcase text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Pengalaman</h3>
                <p class="text-gray-600 mb-4">
                    <?= count($pengalaman) ?> pengalaman magang, proyek, dan organisasi
                </p>
                <a href="<?= base_url('cv/pengalaman') ?>" class="text-purple-600 hover:text-purple-700 font-semibold inline-flex items-center">
                    Lihat Detail
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <!-- Skills Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 card-shadow">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-code text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Keahlian</h3>
                <p class="text-gray-600 mb-4">
                    <?php 
                    $totalSkills = 0;
                    foreach ($keahlian as $kategori => $skills) {
                        $totalSkills += count($skills);
                    }
                    echo $totalSkills;
                    ?> keahlian dalam berbagai kategori
                </p>
                <a href="<?= base_url('cv/keahlian') ?>" class="text-purple-600 hover:text-purple-700 font-semibold inline-flex items-center">
                    Lihat Detail
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl shadow-2xl p-8 md:p-12 text-white">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Tertarik Berkolaborasi?
                </h2>
                <p class="text-xl mb-8 text-purple-100">
                    Saya terbuka untuk diskusi mengenai proyek, magang, atau kesempatan belajar lainnya
                </p>
                <a href="mailto:<?= esc($biodata['email']) ?>" class="bg-white text-purple-600 hover:bg-gray-100 px-8 py-4 rounded-lg font-bold text-lg transition-colors inline-flex items-center shadow-lg">
                    <i class="fas fa-paper-plane mr-3"></i>
                    Hubungi Saya
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->include('layout/footer') ?>