<?php

use hscstudio\mimin\components\Mimin;

$username = \Yii::$app->user->identity->username;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?= $username ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                ['label' => 'Manajemen Anggota', 'options' => ['class' => 'header']],
                ['visible' => Mimin::checkRoute('/mimin/*', true), 'label' => 'Sedang Diproses', 'icon' => 'file-code-o', 'url' => ['/penjual/index-proses']],
                ['label' => 'Menu', 'options' => ['class' => 'header']],
                [
                    'label' => 'Profil',
                    'icon' => 'share',
                    'url' => '#',
//                    'visible' => Mimin::checkRoute('/mimin/*', true),
                    'items' => [
                        ['visible' => Mimin::checkRoute('/slider/*', true), 'label' => 'Slider', 'icon' => 'file-code-o', 'url' => ['/slider/index']],
                        ['visible' => Mimin::checkRoute('/visi/*', true), 'label' => 'Visi', 'icon' => 'file-code-o', 'url' => ['/visi/index']],
                        ['visible' => Mimin::checkRoute('/misi/*', true), 'label' => 'Misi', 'icon' => 'file-code-o', 'url' => ['/misi/index']],
                        ['visible' => Mimin::checkRoute('/tentang/*', true), 'label' => 'Tentang', 'icon' => 'file-code-o', 'url' => ['/tentang/index']],
                        ['visible' => Mimin::checkRoute('/program-kerja/*', true), 'label' => 'Program Kerja', 'icon' => 'file-code-o', 'url' => ['/program-kerja/index']],
                        ['visible' => Mimin::checkRoute('/struktur-organisasi/*', true), 'label' => 'Struktur Organisasi', 'icon' => 'file-code-o', 'url' => ['/struktur-organisasi/index']],
                        ['visible' => Mimin::checkRoute('/sejarah-ketua/*', true), 'label' => 'Sejarah Ketua', 'icon' => 'file-code-o', 'url' => ['/sejarah-ketua/index']],
                        ['visible' => Mimin::checkRoute('/arti-lambang/*', true), 'label' => 'Arti Lambang', 'icon' => 'file-code-o', 'url' => ['/arti-lambang/index']],
                        ['visible' => Mimin::checkRoute('/tujuan-sasaran/*', true), 'label' => 'Tujuan Sasaran', 'icon' => 'file-code-o', 'url' => ['/tujuan-sasaran/index']],
                        ['visible' => Mimin::checkRoute('/mars/*', true), 'label' => 'Mars', 'icon' => 'file-code-o', 'url' => ['/mars/index']],
                    ],
                ],
                [
                    'label' => 'Info Publik',
                    'icon' => 'share',
                    'url' => '#',
//                    'visible' => Mimin::checkRoute('/mimin/*', true),
                    'items' => [
                        ['visible' => Mimin::checkRoute('/berita/*', true), 'label' => 'Berita', 'icon' => 'file-code-o', 'url' => ['/berita/index']],
                        ['visible' => Mimin::checkRoute('/kegiatan/*', true), 'label' => 'Kegiatan', 'icon' => 'file-code-o', 'url' => ['/kegiatan/index']],
                        ['visible' => Mimin::checkRoute('/galeri/*', true), 'label' => 'Galeri', 'icon' => 'file-code-o', 'url' => ['/galeri/index']],
                        ['visible' => Mimin::checkRoute('/video/*', true), 'label' => 'Video', 'icon' => 'file-code-o', 'url' => ['/video/index']],
                        ['visible' => Mimin::checkRoute('/file-download/*', true), 'label' => 'File Download', 'icon' => 'file-code-o', 'url' => ['/file-download/index']],
                    ],
                ],
                [
                    'label' => 'Perajin',
                    'icon' => 'share',
                    'url' => '#',
//                    'visible' => Mimin::checkRoute('/mimin/*', true),
                    'items' => [
                        ['visible' => Mimin::checkRoute('/penjual/*', true), 'label' => 'Anggota', 'icon' => 'file-code-o', 'url' => ['/penjual/index']],
                        ['visible' => Mimin::checkRoute('/master-kategori-produk/*', true), 'label' => 'Kategori Produk', 'icon' => 'file-code-o', 'url' => ['/master-kategori-produk/index']],
                        ['visible' => Mimin::checkRoute('/produk/*', true), 'label' => 'Produk', 'icon' => 'file-code-o', 'url' => ['/produk/index']],
                    ],
                ],
                [
                    'label' => 'Kontak',
                    'icon' => 'share',
                    'url' => '#',
//                    'visible' => Mimin::checkRoute('/mimin/*', true),
                    'items' => [
                        ['visible' => Mimin::checkRoute('/kontak/*', true), 'label' => 'Kontak', 'icon' => 'file-code-o', 'url' => ['/kontak/index']],
                        ['visible' => Mimin::checkRoute('/hubungi-kami/*', true), 'label' => 'Hubungi Kami', 'icon' => 'file-code-o', 'url' => ['/hubungi-kami/index']],
                    ],
                ],
                [
                    'label' => 'Super Admin',
                    'icon' => 'share',
                    'url' => '#',
                    'visible' => Mimin::checkRoute('/mimin/', true),
//                    'visible' => Mimin::checkRoute('/mimin/*', true),
                    'items' => [
                            ['label' => 'Route', 'icon' => 'file-code-o', 'url' => ['/mimin/route']],
                            ['label' => 'Role', 'icon' => 'file-code-o', 'url' => ['/mimin/role']],
                            ['label' => 'User', 'icon' => 'file-code-o', 'url' => ['/mimin/user']],
                        ['visible' => Mimin::checkRoute('/gii/*', true), 'label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        ['visible' => Mimin::checkRoute('/debug/*', true), 'label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ],
                ],
            ],
            ]
        ) ?>

    </section>

</aside>
