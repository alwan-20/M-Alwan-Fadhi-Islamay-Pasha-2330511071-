<?= $this->include('layout/header') ?>

<!-- Page Header -->
<section class="gradient-bg text-white py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                <i class="fas fa-graduation-cap mr-3"></i>
                Riwayat Pendidikan
            </h1>
            <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                Perjalanan pendidikan formal yang telah saya tempuh
            </p>
        </div>
    </div>
</section>

<!-- Education Timeline -->
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <?php if (!empty($pendidikan)): ?>
                <div class="relative">
                    <!-- Timeline Line -->
                    <div class="absolute left-8 top-0 bottom-0 w-1 bg-purple-200 hidden md:block"></div>
                    
                    <?php foreach ($pendidikan as $index => $item): ?>
                        <div class="mb-8 fade-in-up" style="animation-delay: <?= $index * 0.1 ?>s">
                            <div class="flex items-start">
                                <!-- Timeline Dot -->
                                <div class="hidden md:flex flex-shrink-0 w-16 h-16 bg-purple-600 rounded-full items-center justify-center text-white shadow-lg z-10">
                                    <i class="fas fa-graduation-cap text-2xl"></i>
                                </div>
                                
                                <!-- Content Card -->
                                <div class="flex-grow md:ml-8 bg-white rounded-xl shadow-lg p-6 card-shadow">
                                    <!-- Header -->
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-800">
                                                <?= esc($item['jenjang']) ?>
                                            </h3>
                                            <p class="text-purple-600 font-semibold text-lg">
                                                <?= esc($item['nama_institusi']) ?>
                                            </p>
                                        </div>
                                        <div class="mt-2 md:mt-0">
                                            <span class="inline-block bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold">
                                                <i class="fas fa-calendar-alt mr-2"></i>
                                                <?= esc($item['tahun_mulai']) ?> - <?= $item['tahun_selesai'] ? esc($item['tahun_selesai']) : 'Sekarang' ?>
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- Details -->
                                    <div class="space-y-3">
                                        <?php if (!empty($item['jurusan'])): ?>
                                            <div class="flex items-start">
                                                <i class="fas fa-book text-purple-600 mr-3 mt-1"></i>
                                                <div>
                                                    <p class="text-sm text-gray-500 font-semibold">Jurusan/Program Studi</p>
                                                    <p class="text-gray-700"><?= esc($item['jurusan']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($item['nilai'])): ?>
                                            <div class="flex items-start">
                                                <i class="fas fa-star text-yellow-500 mr-3 mt-1"></i>
                                                <div>
                                                    <p class="text-sm text-gray-500 font-semibold">Nilai/IPK</p>
                                                    <p class="text-gray-700 font-bold"><?= esc($item['nilai']) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($item['keterangan'])): ?>
                                            <div class="flex items-start">
                                                <i class="fas fa-info-circle text-blue-600 mr-3 mt-1"></i>
                                                <div>
                                                    <p class="text-sm text-gray-500 font-semibold">Keterangan</p>
                                                    <p class="text-gray-700 leading-relaxed"><?= nl2br(esc($item['keterangan'])) ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
                    <p class="text-gray-500 text-xl">Belum ada data pendidikan yang ditambahkan</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Ingin Tahu Lebih Lanjut?
            </h2>
            <p class="text-gray-600 text-lg mb-8">
                Lihat pengalaman dan keahlian saya untuk mendapatkan gambaran yang lebih lengkap
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?= base_url('cv/pengalaman') ?>" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                    <i class="fas fa-briefcase mr-2"></i>
                    Lihat Pengalaman
                </a>
                <a href="<?= base_url('cv/keahlian') ?>" class="bg-white hover:bg-gray-50 text-purple-600 border-2 border-purple-600 px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                    <i class="fas fa-code mr-2"></i>
                    Lihat Keahlian
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->include('layout/footer') ?>