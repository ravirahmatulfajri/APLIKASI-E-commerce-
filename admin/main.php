<?php
include "../lib/config.php";
include "../lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    include "index.php";
} else {
    if ($_SESSION['level'] == 'admin') {
        include "template/header.php";
        include "template/sidebar.php";

        if (empty($_GET)) {
            include "pages/home/home.php";
        } else if ($_GET['pages'] == 'home') {
            include "pages/home/home.php";

        } else if ($_GET['pages'] == 'messages') {
            include "pages/messages/messages.php";

        } else if ($_GET['pages'] == 'laporan_nama_barang') {
            include "pages/guest/nama_barang.php";
        } else if ($_GET['pages'] == 'nama_barang_custom') {
            include "pages/guest/nama_barang_custom.php";
        } else if ($_GET['pages'] == 'laporan_order') {
            include "pages/guest/order.php";
        } else if ($_GET['pages'] == 'order_custom') {
            include "pages/guest/order_custom.php";

        } else if ($_GET['pages'] == 'profil') {
            include "pages/profil/form_edit.php";
        } else if ($_GET['pages'] == 'cara_beli') {
            include "pages/cara_beli/form_edit.php";
        } else if ($_GET['pages'] == 'aksi_cara_beli') {
            include "pages/cara_beli/aksi_edit.php";

        } else if ($_GET['pages'] == 'user') {
            include "pages/user/user.php";
        } else if ($_GET['pages'] == 'tambah_user') {
            include "pages/user/form_tambah.php";
        } else if ($_GET['pages'] == 'edit_user') {
            include "pages/user/form_edit.php";

        } else if ($_GET['pages'] == 'order') {
            include "pages/order/order.php";
        } else if ($_GET['pages'] == 'tambah_order') {
            include "pages/order/form_tambah.php";
        } else if ($_GET['pages'] == 'edit_order') {
            include "pages/order/form_edit.php";

        } else if ($_GET['pages'] == 'kategori_barang') {
            include "pages/kategori_barang/kategori_barang.php";
        } else if ($_GET['pages'] == 'tambah_kategori_barang') {
            include "pages/kategori_barang/form_tambah.php";
        } else if ($_GET['pages'] == 'edit_kategori_barang') {
            include "pages/kategori_barang/form_edit.php";
            
        } else if ($_GET['pages'] == 'nama_barang') {
            include "pages/nama_barang/nama_barang.php";
        } else if ($_GET['pages'] == 'tambah_nama_barang') {
            include "pages/nama_barang/form_tambah.php";
        } else if ($_GET['pages'] == 'edit_nama_barang') {
            include "pages/nama_barang/form_edit.php";

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

        } else if ($_GET['pages'] == 'messages') {
            include "pages/messages/messages.php";

        } else if ($_GET['pages'] == 'laporan_nama_barang') {
            include "pages/guest/nama_barang.php";
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
            include "pages/check_in/daftar_nama_barang.php";
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