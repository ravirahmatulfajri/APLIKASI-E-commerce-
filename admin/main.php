<?php
include "../lib/config.php";
include "../lib/koneksi.php";
include "../lib/fungsi_seo.php";
include "../lib/fungsi_thumb.php";
include "../lib/fungsi_combobox.php";
include "../lib/fungsi_indotgl.php";
include "../lib/library.php";
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    include "index.php";
} else {
    if ($_SESSION['level'] == 'admin') {
        include "template/header.php";

        if (empty($_GET)) {
            include "pages/home/home.php";
        } else if ($_GET['pages'] == 'home') {
            include "pages/home/home.php";

        } else if ($_GET['pages'] == 'testi') {
            include "pages/testi/testi.php";
        } else if ($_GET['pages'] == 'aksi_testi') {
            include "pages/testi/aksi.php";

        } else if ($_GET['pages'] == 'laporan') {
            include "pages/laporan/laporan.php";

        } else if ($_GET['pages'] == 'kirim') {
            include "pages/kirim/laporan.php";

        } else if ($_GET['pages'] == 'batal') {
            include "pages/batal/laporan.php";

        } else if ($_GET['pages'] == 'masuk') {
            include "pages/masuk/laporan.php";

        } else if ($_GET['pages'] == 'profil') {
            include "pages/profil/form_edit.php";
        } else if ($_GET['pages'] == 'aksi_profil') {
            include "pages/profil/aksi_edit.php";
            
        } else if ($_GET['pages'] == 'cara_beli') {
            include "pages/cara_beli/form_edit.php";
        } else if ($_GET['pages'] == 'aksi_cara_beli') {
            include "pages/cara_beli/aksi_edit.php";

        } else if ($_GET['pages'] == 'user') {
            include "pages/user/user.php";
        } else if ($_GET['pages'] == 'aksi_user') {
            include "pages/user/aksi.php";

        } else if ($_GET['pages'] == 'order') {
            include "pages/order/order.php";
        } else if ($_GET['pages'] == 'aksi_order') {
            include "pages/order/aksi.php";

        } else if ($_GET['pages'] == 'kategori_barang') {
            include "pages/kategori_barang/kategori_barang.php";
        } else if ($_GET['pages'] == 'aksi_kategori') {
            include "pages/kategori_barang/aksi.php";
            
        } else if ($_GET['pages'] == 'produk') {
            include "pages/produk/produk.php";
        } else if ($_GET['pages'] == 'aksi_produk') {
            include "pages/produk/aksi.php";

        } else if ($_GET['pages'] == 'artikel') {
            include "pages/artikel/artikel.php";
        } else if ($_GET['pages'] == 'aksi_artikel') {
            include "pages/artikel/aksi.php";

        } else if ($_GET['pages'] == 'pass') {
            include "pages/password/password.php";
        } else if ($_GET['pages'] == 'aksi_pass') {
            include "pages/password/aksi.php";

        } else if ($_GET['pages'] == 'banner') {
            include "pages/banner/banner.php";
        } else if ($_GET['pages'] == 'aksi_banner') {
            include "pages/banner/aksi.php";

        } else if ($_GET['pages'] == 'test') {
            include "pages/home/home2.php";
            
        }  else {
            include "pages/home/home.php";
        }

        include "template/footer.php";

    } elseif ($_SESSION['level'] == 'operator') {
        include "template/header_op.php";

        if (empty($_GET)) {
            include "pages/home/home.php";
        } else if ($_GET['pages'] == 'home') {
            include "pages/home/home.php";

        } else if ($_GET['pages'] == 'testi') {
            include "pages/testi/testi.php";
        } else if ($_GET['pages'] == 'aksi_testi') {
            include "pages/testi/aksi.php";

        } else if ($_GET['pages'] == 'laporan') {
            include "pages/laporan/laporan.php";

        } else if ($_GET['pages'] == 'kirim') {
            include "pages/kirim/laporan.php";

        } else if ($_GET['pages'] == 'batal') {
            include "pages/batal/laporan.php";

        } else if ($_GET['pages'] == 'masuk') {
            include "pages/masuk/laporan.php";

        } else if ($_GET['pages'] == 'pass') {
            include "pages/password/password.php";
        } else if ($_GET['pages'] == 'aksi_pass') {
            include "pages/password/aksi.php";
            
        }  else {
            include "pages/error/403.php";
        }

        include "template/footer.php";
    }    
    
}