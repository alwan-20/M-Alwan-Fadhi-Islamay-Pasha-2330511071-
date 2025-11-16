<?= $this->include('layout/header') ?>

<!-- Page Header -->
<section class="gradient-bg text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                <i class="fas fa-briefcase mr-3"></i>
                Riwayat Pengalaman
            </h1>
            <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                Pengalaman magang, proyek, dan organisasi yang telah saya jalani
            </p>
        </div>
    </div>
</section>

<!-- Filter Tabs -->
<section class="py-8 bg-white shadow-sm sticky top-16 z-40">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button onclick="filterExperience('all')" class="filter-btn active px-6 py-2 rounded-full font-semibold transition-all bg-purple-600 text-white">
                <i class="fas fa-th mr-2"></i>Semua
            </button>
            <button onclick="filterExperience('magang')" class="filter-btn px-6 py-2 rounded-full font-semibold transition-all bg-gray-200 text-gray-700 hover:bg-gray-300">
                <i class="fas fa-user-tie mr-2"></i>Magang
            </button>
            <button onclick="filterExperience('proyek')" class="filter-btn px-6 py-2 rounded-full font-semibold transition-all bg-gray-200 text-gray-700 hover:bg-gray-300">
                <i class="fas fa-project-diagram mr-2"></i>Proyek
            </button>
            <button onclick="filterExperience('organisasi')" class="filter-btn px-6 py-2 rounded-full font-semibold transition-all bg-gray-200 text-gray-700 hover:bg-gray-300">
                <i class="fas fa-users mr-2"></i>Organisasi
            </button>
            <button onclick="filterExperience('volunteer')" class="filter-btn px-6 py-2 rounded-full font-semibold transition-all bg-gray-200 text-gray-700 hover:bg-gray-300">
                <i class="fas fa-hands-helping mr-2"></i>Volunteer
            </button>
        </div>
    </div>
</section>

<!-- Experience Cards -->
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (!empty($pengalaman)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto" id="experience-container">
                <?php foreach ($pengalaman as $index => $item): ?>
                    <div class="experience-card bg-white rounded-xl shadow-lg p-6 card-shadow fade-in-up" data-type="<?= esc($item['jenis']) ?>" style="animation-delay: <?= $index * 0.1 ?>s">
                        <!-- Badge -->
                        <div class="flex items-center justify-between mb-4">
                            <span class="inline-block px-4 py-1 rounded-full text-sm font-semibold
                                <?php 
                                    switch($item['jenis']) {
                                        case 'magang':
                                            echo 'bg-blue-100 text-blue-800';
                                            break;
                                        case 'proyek':
                                            echo 'bg-green-100 text-green-800';
                                            break;
                                        case 'organisasi':
                                            echo 'bg-purple-100 text-purple-800';
                                            break;
                                        case 'volunteer':
                                            echo 'bg-orange-100 text-orange-800';
                                            break;
                                        default:
                                            echo 'bg-gray-100 text-gray-800';
                                    }
                                ?>">
                                <i class="fas 
                                    <?php 
                                        switch($item['jenis']) {
                                            case 'magang':
                                                echo 'fa-user-tie';
                                                break;
                                            case 'proyek':
                                                echo 'fa-project-diagram';
                                                break;
                                            case 'organisasi':
                                                echo 'fa-users';
                                                break;
                                            case 'volunteer':
                                                echo 'fa-hands-helping';
                                                break;
                                            default:
                                                echo 'fa-briefcase';
                                        }
                                    ?> mr-2"></i>
                                <?= ucfirst(esc($item['jenis'])) ?>
                            </span>
                            <span class="text-gray-500 text-sm">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                <?= esc($item['tahun_mulai']) ?> - <?= $item['tahun_selesai'] ? esc($item['tahun_selesai']) : 'Sekarang' ?>
                            </span>
                        </div>
                        
                        <!-- Content -->
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            <?= esc($item['posisi']) ?>
                        </h3>
                        <p class="text-purple-600 font-semibold mb-4">
                            <i class="fas fa-building mr-2"></i>
                            <?= esc($item['organisasi']) ?>
                        </p>
                        
                        <?php if (!empty($item['deskripsi'])): ?>
                            <p class="text-gray-600 leading-relaxed">
                                <?= nl2br(esc($item['deskripsi'])) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
                <p class="text-gray-500 text-xl">Belum ada data pengalaman yang ditambahkan</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
                Statistik Pengalaman
            </h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php
                $stats = [
                    'magang' => 0,
                    'proyek' => 0,
                    'organisasi' => 0,
                    'volunteer' => 0
                ];
                
                foreach ($pengalaman as $item) {
                    $stats[$item['jenis']]++;
                }
                
                $icons = [
                    'magang' => 'fa-user-tie',
                    'proyek' => 'fa-project-diagram',
                    'organisasi' => 'fa-users',
                    'volunteer' => 'fa-hands-helping'
                ];
                
                $colors = [
                    'magang' => 'blue',
                    'proyek' => 'green',
                    'organisasi' => 'purple',
                    'volunteer' => 'orange'
                ];
                ?>
                
                <?php foreach ($stats as $type => $count): ?>
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center card-shadow">
                        <div class="bg-<?= $colors[$type] ?>-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas <?= $icons[$type] ?> text-<?= $colors[$type] ?>-600 text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2"><?= $count ?></h3>
                        <p class="text-gray-600 capitalize"><?= $type ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Tertarik dengan Profil Saya?
            </h2>
            <p class="text-gray-600 text-lg mb-8">
                Lihat keahlian teknis dan soft skills yang saya miliki
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?= base_url('cv/keahlian') ?>" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                    <i class="fas fa-code mr-2"></i>
                    Lihat Keahlian
                </a>
                <a href="<?= base_url() ?>" class="bg-white hover:bg-gray-50 text-purple-600 border-2 border-purple-600 px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                    <i class="fas fa-home mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

<script>
function filterExperience(type) {
    const cards = document.querySelectorAll('.experience-card');
    const buttons = document.querySelectorAll('.filter-btn');
    
    // Update button styles
    buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-purple-600', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });
    
    event.target.classList.add('active', 'bg-purple-600', 'text-white');
    event.target.classList.remove('bg-gray-200', 'text-gray-700');
    
    // Filter cards
    cards.forEach(card => {
        if (type === 'all' || card.dataset.type === type) {
            card.style.display = 'block';
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 10);
        } else {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.display = 'none';
            }, 300);
        }
    });
}

// Add transition styles
document.querySelectorAll('.experience-card').forEach(card => {
    card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
});
</script>

<?= $this->include('layout/footer') ?>