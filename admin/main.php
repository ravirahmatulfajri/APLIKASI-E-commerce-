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
        include "template/header.php";
        include "template/sidebar_operator.php";

        if (empty($_GET)) {
            include "pages/home/home.php";
        } else if ($_GET['pages'] == 'home') {
            include "pages/home/home.php";

        } else if ($_GET['pages'] == 'testi') {
            include "pages/testi/testi.php";

        } else if ($_GET['pages'] == 'laporan_produk') {
            include "pages/guest/produk.php";
        } else if ($_GET['pages'] == 'laporan_order') {
            include "pages/guest/order.php";

        } else if ($_GET['pages'] == 'account') {
            include "pages/account/account_page.php";
        } else if ($_GET['pages'] == 'detail_account') {
            include "pages/account/detail.php";
        } else if ($_GET['pages'] == 'cetak') {
            include "pages/account/index.php";
        } else if ($_GET['pages'] == 'account_custom') {
            include "pages/account/account_page_custom.php";

        } else if ($_GET['pages'] == 'check_in') {
            include "pages/check_in/daftar_produk.php";
        } else if ($_GET['pages'] == 'form_booking') {
            include "pages/check_in/form_booking.php";
        } else if ($_GET['pages'] == 'form_checkin') {
            include "pages/check_in/form_checkin.php";

        } else if ($_GET['pages'] == 'booking') {
            include "pages/booking/booking.php";
        } else if ($_GET['pages'] == 'booking_detail') {
            include "pages/booking/booking_detail.php";

        } else if ($_GET['pages'] == 'test') {
            include "pages/booking/test.php";

        } else if ($_GET['pages'] == 'reservasi') {
            include "pages/reservasi/reservasi.php";        
        } else if ($_GET['pages'] == 'order_tamu') {
            include "pages/reservasi/shop.php";        
        } else if ($_GET['pages'] == 'tambah_order_tamu') {
            include "pages/reservasi/form_order_tamu.php";        
        } else if ($_GET['pages'] == 'check_out') {
            include "pages/reservasi/check_out.php";
            
        }  else {
            include "pages/error/403.php";
        }

        include "template/footer.php";
    }    
    
}