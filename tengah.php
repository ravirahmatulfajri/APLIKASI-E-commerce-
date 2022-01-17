<script language="javascript">
function validasi(form){
  if (form.nama.value == ""){
    alert("Anda belum mengisikan Nama.");
    form.nama.focus();
    return (false);
  }    
  if (form.alamat.value == ""){
    alert("Anda belum mengisikan Alamat.");
    form.alamat.focus();
    return (false);
  }
  if (form.telpon.value == ""){
    alert("Anda belum mengisikan Telpon.");
    form.telpon.focus();
    return (false);
  }
  if (form.email.value == ""){
    alert("Anda belum mengisikan Email.");
    form.email.focus();
    return (false);
  }
  if (form.kota.value == 0){
    alert("Anda belum mengisikan Kota.");
    form.kota.focus();
    return (false);
  }
  return (true);
}

function validasi2(form2){
  if (form2.email.value == ""){
    alert("Anda belum mengisikan Email.");
    form2.email.focus();
    return (false);
  }
  if (form2.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form2.password.focus();
    return (false);
  }
  return (true);
}

function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
    return false;
  return true;
}
</script>

<?php
// Halaman utama (Home)
if ($_GET['module']=='home'){
  echo "";
  $sql=mysqli_query($connect,"SELECT * FROM produk ORDER BY id_produk DESC LIMIT 6");
  while ($r=mysqli_fetch_array($sql)){
    
    include "diskon_stok.php";

    echo "
    
    <section class='featured spad'>
    <div class='container'>
    

            <div class='col-12 mix oranges fresh-meat'>
                <div class='featured__item'>
                    <div class='featured__item__pic set-bg' style='background-size: auto; cursor: pointer;' data-setbg='foto_produk/$r[gambar]'>
       
                        <ul class='featured__item__pic__hover'>
                            <li><a href='produk-$r[id_produk]-$r[produk_seo].html'><i class='fa fa-retweet'></i></a></li>
                            <li><a href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\"><i class='fa fa-shopping-cart'></i></a></li>
                        </ul>
                    </div>
                <div class='featured__item__text'>
                        <h6><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></a></h6>
                        <h5>$divharga</h5>
            </div>
      </div>
      </section>

   
               
    
    ";
  }
}


// Modul detail produk
elseif ($_GET['module']=='detailproduk'){
  // Tampilkan detail produk berdasarkan produk yang dipilih
	$detail=mysqli_query($connect,"SELECT * FROM produk,kategori    
                      WHERE kategori.id_kategori=produk.id_kategori 
                      AND id_produk='$_GET[id]'");
	$r = mysqli_fetch_array($detail);
  
  include "diskon_stok.php";
  
  echo " 
  <section class='featured spad'>
  <div class='container'>
  <div class='col-12 mix oranges fresh-meat'>
  <div class='featured__item'>
  <div class='section-title product__discount__title'>
                            <h2><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>$r[nama_kategori]</a></h2>
                        </div>
 
    	             
        <div class='featured__item__pic set-bg' style='background-size: auto; cursor: pointer;' data-setbg='foto_produk/$r[gambar]'>
       
        <ul class='featured__item__pic__hover'>
            <li><a href='produk-$r[id_produk]-$r[produk_seo].html'><i class='fa fa-retweet'></i></a></li>
            <li><a href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\"><i class='fa fa-shopping-cart'></i></a></li>
        </ul>
    </div>
    <div class='featured__item__text'>
                        <h6><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></a></h6>
                        <h5>$divharga</h5>(stok: $r[stok])</p>
            </div>
            <div>$r[deskripsi]</div>
      </div>
      </section>
           
           
           </div>
          </div>";
          
// Produk Lainnya (random)          
  $sql=mysqli_query($connect,"SELECT * FROM produk ORDER BY rand() LIMIT 3");
      
  echo "  <br><br><br><div class='hero__text'><span>Produk Lainnya :</div>";
      
  while ($r=mysqli_fetch_array($sql)){

  include "diskon_stok.php";

    echo "<br>

    <section class='featured spad'>
  <div class='container'>
  <div class='col-12 mix oranges fresh-meat'>
  <div class='featured__item'>
  <div class='section-title product__discount__title'>
                            <h2><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>$r[nama_kategori]</a></h2>
                        </div>
 
    	             
        <div class='featured__item__pic set-bg' style='background-size: auto; cursor: pointer;' data-setbg='foto_produk/$r[gambar]'>
       
        <ul class='featured__item__pic__hover'>
            <li><a href='produk-$r[id_produk]-$r[produk_seo].html'><i class='fa fa-retweet'></i></a></li>
            <li><a href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\"><i class='fa fa-shopping-cart'></i></a></li>
        </ul>
    </div>
    <div class='featured__item__text'>
                        <h6><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></a></h6>
                        <h5>$divharga</h5>(stok: $r[stok])</p>
            </div>
            <div>$r[deskripsi]</div>
      </div>
      </section>
           
        
          ";
  }                                      
}


// Modul produk per kategori
elseif ($_GET['module']=='detailkategori'){
  // Tampilkan nama kategori
  $sq = mysqli_query($connect,"SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysqli_fetch_array($sq);

  echo "<div class='container'>
  <div class='row'>
  <div class='col-lg-12'>
  <div class='hero__text' align='center'><h2>Kategori:<h2> $n[nama_kategori]<br><br></div></div> ";

  // Tentukan berapa data yang akan ditampilkan per halaman (paging)
  $p      = new Paging3;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);

  // Tampilkan daftar produk yang sesuai dengan kategori yang dipilih
 	$sql = mysqli_query($connect,"SELECT * FROM produk WHERE id_kategori='$_GET[id]' 
            ORDER BY id_produk DESC LIMIT $posisi,$batas");		 
	$jumlah = mysqli_num_rows($sql);

	// Apabila ditemukan produk dalam kategori
	if ($jumlah > 0){
  while ($r=mysqli_fetch_array($sql)){

  include "diskon_stok.php";

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
             <div class='product_img'>
               <a href='produk-$r[id_produk]-$r[produk_seo].html'>
               <img src='foto_produk/small_$r[gambar]' border='0' height='110'></a>
             </div>
            <div class='prod_price'>$divharga</div>
          </div>
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>selengkapnya</a>            
          </div> 
          </div>";
  }  
  
  $jmldata     = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM produk WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET['halkategori'], $jmlhalaman);

  echo "<div class='center_title_bar'>Halaman : $linkHalaman </div>";
  }
  else{
    echo "<p align=center>Belum ada produk pada kategori ini.</p>";
  }
}

// Menu utama di header

// Modul profil
elseif ($_GET['module']=='profilkami'){
  // Data profil mengacu pada id_modul=43
	$profil = mysqli_query($connect,"SELECT * FROM modul WHERE id_modul='43'");
	$r      = mysqli_fetch_array($profil);

  echo "
  <div class='col-12'>
                    <div class='product__discount'>
                        <div class='section-title product__discount__title'>
                            <h2>Profil</h2>
                        </div>
      
    	  <div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
                 <div class='product_img_big' align='center'>
                 <img src='foto_banner/$r[gambar]' width='700' height='300' border='0' />
            </div><br>
          <div class='details_big_box'>
            <div class='hero__text'><span>Profil Toko Lokomedia :</span>
            </div><br>
              <div>$r[static_content]</div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>
        </section>";                              
}


// Modul cara pembelian
elseif ($_GET['module']=='carabeli'){
  // Data cara pembelian mengacu pada id_modul=45
	$profil = mysqli_query($connect,"SELECT * FROM modul WHERE id_modul='45'");
	$r      = mysqli_fetch_array($profil);

  echo " <div class='col-12'>
          <div class='product__discount'>
              <div class='section-title product__discount__title'>
                  <h2>Cara Pembelian</h2>
              </div>
       
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
                 <div class='product_img_big' align='center'>
                 <img src='foto_banner/$r[gambar]'  width='700' height='300' border='0' />
            </div><br>
          <div class='details_big_box'>
            <div class='hero__text'><span>Prosedur Pembelian di Toko Lokomedia :</span>
            </div><br><br>
              <div>$r[static_content]</div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>
          </div>
          </div>
      </div>
  </section>";                              
}


// Modul semua produk
elseif ($_GET['module']=='semuaproduk'){

  echo "
  <div class='col-12'>
  <div class='product__discount'>
      <div class='section-title product__discount__title'>
          <h2>Semua Produk</h2>
      </div>
  </div>
  </div>
";
  // Tentukan berapa data yang akan ditampilkan per halaman (paging)
  $p      = new Paging2;
  $batas  = 12;
  $posisi = $p->cariPosisi($batas);

  // Tampilkan semua produk
  $sql=mysqli_query($connect,"SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");

  while ($r=mysqli_fetch_array($sql)){
  
    include "diskon_stok.php";

    echo "
    <section class='featured spad'>
    <div class='container'>
    

            <div class='col-12 mix oranges fresh-meat'>
                <div class='featured__item'>
                    <div class='featured__item__pic set-bg' style='background-size: auto; cursor: pointer;' data-setbg='foto_produk/$r[gambar]'>
       
                        <ul class='featured__item__pic__hover'>
                            <li><a href='produk-$r[id_produk]-$r[produk_seo].html'><i class='fa fa-retweet'></i></a></li>
                            <li><a href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\"><i class='fa fa-shopping-cart'></i></a></li>
                        </ul>
                    </div>
                <div class='featured__item__text'>
                        <h6><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></a></h6>
                        <h5>$divharga</h5>
            </div>
      </div>
      </section>";
  }  
    
  $jmldata     = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM produk"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET['halproduk'], $jmlhalaman);

  echo "";
}


// Modul keranjang belanja
elseif ($_GET['module']=='keranjangbelanja'){
  // Tampilkan produk-produk yang telah dimasukkan ke keranjang belanja
	$sid = session_id();
	$sql = mysqli_query($connect,"SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  $ketemu=mysqli_num_rows($sql);
  if($ketemu < 1){
    echo "<script>window.alert('Keranjang Belanjanya Masih Kosong');
        window.location=('index.php')</script>";
    }
  else{  
    echo "
  <div class='col-12'>
  <div class='product__discount'>
      <div class='section-title product__discount__title'>
          <h2>Keranjang Belanja</h2>
      </div>
        	
          <form method=post action=aksi.php?module=keranjang&act=update>
         
         
              <div class='row'>
                  <div class='col-lg-12'>
                      <div class='shoping__cart__table'>
                          <table>
                              <thead>
                             
                              
                                  <tr>
                                      
                                      <th class='shoping__product'>Products</th>
                                      <th>Berat(Kg)</th>
                                      <th>Quantity</th>
                                      <th></th>
                                  </tr>
                              </thead></div></div>
                            ";  
  
  $no=1;
  while($r=mysqli_fetch_array($sql)){
    $disc        = ($r['diskon']/100)*$r['harga'];
    $hargadisc   = number_format(($r['harga']-$disc),0,",",".");

    $subtotal    = ($r['harga']-$disc) * $r['jumlah'];
    $total       = $total + $subtotal;  
    $subtotal_rp = format_rupiah($subtotal);
    $total_rp    = format_rupiah($total);
    $harga       = format_rupiah($r['harga']);
    
  

    echo "
     
                                  

                                    <td class='shoping__cart__item'>
                                    <input type=hidden name=id[$no] value=$r[id_orders_temp]>
                                    <img src=foto_produk/small_$r[gambar]> $r[nama_produk]
                                       
                                    </td>
                                    <td class='shoping__cart__price'>
                                    $r[berat]
                                    </td>
                                    
                                    <td class='shoping__cart__quantity'>
                                    <div class='quantity'>
                                    <select name='jml[$no]' value=$r[jumlah] onChange='this.form.submit()'>";
                                            for ($j=1;$j <= $r['stok'];$j++){
                                                if($j == $r['jumlah']){
                                                 echo "<option selected>$j</option>";
                                                }else{
                                                 echo "<option>$j</option>";
                                                }
                                            }
                                            
                                      echo "
                                      <td class='shoping__cart__item__close'>
                                       
                                    </td>
                                            <td align=center><a href='aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]'>
                                            <span class='icon_close'></span></a></td>
                                        </tr>";
                                  $no++; 
                                } 
                                echo "
                                <td colspan=5 align=right><a href='javascript:history.go(-1)' class='primary-btn cart-btn'> <span class='icon_loading'></span>Lanjutkan Belanja</a><br /></td>
                                      
                                      </tbody></table></form><br />
                                      *) Total harga diatas belum termasuk ongkos kirim yang akan dihitung saat <b>Selesai Belanja</b>.
                                      </div>
                                      <div class='row'>
                                      <div class='col-lg-6'>
                                      <div class='shoping__continue'>
                                          <div class='shoping__discount'>
                                              <h5>Discount Codes</h5>
                                              <form action='#'>
                                                  <input type='text' placeholder='Enter your coupon code'>
                                                  <br><br><button type='submit' class='site-btn'>APPLY COUPON</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                                  <div class='col-lg-6'>
                                      <div class='shoping__checkout'>
                                          <h5>Cart Total</h5>
                                          <ul>
                                              <li>Harga <span>$hargadisc</span></li>
                                              <li>Total <span>$total_rp</span></li>
                                          </ul>
                                          <a href='selesai-belanja.html' class='primary-btn'>PROCEED TO CHECKOUT</a>
                                      </div>
                                  </div></td>
                                      
                                   
                                        ";
                                }
                              
                              }
  

// Modul hubungi kami
elseif ($_GET['module']=='hubungikami'){
  echo " 
        
  <div class='col-12'>
  <div class='product__discount'>
      <div class='section-title product__discount__title'>
          <h2>Hubungi Kami</h2>
      </div>
        <div class='center_prod_box_big'>            
                 <div class='product_img_big' align='center'>
                 <img src='foto_banner/gedung.jpg' width='700' height='300' border='0' />
            </div><br>
            <div class='details_big_box'>
            <div class='hero__text'><span>Hubungi Kami Secara Online:</span></div><br>
              <div>

              <!-- Contact Form Begin -->
    
              <div class='contact-form spad'>
                  <div class='container'>
                      <div class='row'>
                          
                      </div>
                      <form action='hubungi-aksi.html method=POST'>
                          <div class='row'>
                          
                          <table>
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='nama' placeholder='Your Name'>
                              </div>
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='password' placeholder='Your Email'>
                              </div>
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='password' placeholder='Subjek'>
                              </div>
                              <div class='col-lg-12 text-center'>
                              
                                  <textarea placeholder='Pesan' type=text></textarea>
                                  <input type='submit' name='submit' class='site-btn' value='Kirim'>
                                  
                              </div>
                              
                          </div>
                      </form>
                  </div>
              </div>
              <!-- Contact Form End -->

       
        </form></table>
          </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>
          </div>
          </div>
      </div>
  </section>";                              
}

// Modul hubungi aksi
elseif ($_GET['module']=='hubungiaksi'){
$nama=trim($_POST['nama']);
$email=trim($_POST['email']);
$subjek=trim($_POST['subjek']);
$pesan=trim($_POST['pesan']);

if (empty($nama)){
  echo "Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($email)){
  echo "Anda belum mengisikan EMAIL<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($subjek)){
  echo "Anda belum mengisikan SUBJEK<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($pesan)){
  echo "Anda belum mengisikan PESAN<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}

}


// Modul hasil pencarian produk 
elseif ($_GET['module']=='hasilcari'){
  // menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST['kata']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM produk WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "deskripsi LIKE '%$pisah_kata[$i]%' OR nama_produk LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
  $cari .= " ORDER BY id_produk DESC LIMIT 7";
  $hasil  = mysqli_query($connect,$cari);
  $ketemu = mysqli_num_rows($hasil);

  echo "<div class='center_title_bar'>Hasil Pencarian</div>";

  if ($ketemu > 0){
  echo "<div class='prod_details_cari'>Ditemukan <b>$ketemu</b> produk dengan kata <font style='background-color:#00FFFF'><b>$kata</b></font> : </div>";
    while($t=mysqli_fetch_array($hasil)){
      // Tampilkan hanya sebagian isi produk
      $isi_produk = htmlentities(strip_tags($t['deskripsi'])); // mengabaikan tag html
      $isi = substr($isi_produk,0,250); // ambil sebanyak 250 karakter
      $isi = substr($isi_produk,0,strrpos($isi," ")); // potong per spasi kalimat
    	  echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
          <div class='details_big_cari'>
            <div class='product_title_big'><a href=produk-$t[id_produk]-$t[produk_seo].html>$t[nama_produk]</a></div>
              <div>
              <br />$isi ... <a href=produk-$t[id_produk]-$t[produk_seo].html>selengkapnya</a>
              </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>";                      
      }        
    }                                                          
  else{
    echo "<p>Tidak ditemukan produk dengan kata <b>$kata</b></p>";
  }
}


// Modul download katalog
elseif ($_GET['module']=='downloadkatalog'){
  echo "
  <div class='col-12'>
          <div class='product__discount'>
              <div class='section-title product__discount__title'>
                  <h2>Download Katalog</h2>
              </div>";
  // Tampilkan daftar katalog download
 	$sql = mysqli_query($connect,"SELECT * FROM download ORDER BY id_download DESC");		 

  echo "";   
   while($d=mysqli_fetch_array($sql)){
      echo "
      <div class='hero__text'>
      <span>
      <li><a href='downlot.php?file=$d[nama_file]'>$d[judul]</a></li>
      </span>
      </div>";
	 }
  echo "";	
}


// Modul selesai belanja
elseif ($_GET['module']=='selesaibelanja'){
  $sid = session_id();
  $sql = mysqli_query($connect,"SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  $ketemu=mysqli_num_rows($sql);
  if($ketemu < 1){
   echo "<script> alert('Keranjang belanja masih kosong');window.location='index.php'</script>\n";
   	 exit(0);
	}
	else{
  echo "<section class='featured spad'>
  <div class='container'>
  <div class='row'>
  <div class='col-lg-12'>
  ";
    	  echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
          <div class='details_big_cari'>
              <div>

              <!-- Contact Form Begin -->
    
              <div class='contact-form spad'>
                  <div class='container'>
                      <div class='row'>
                          <div class='col-lg-12'>
                              <div class='contact__form__title'>
                                  <h2>Kustomer Lama</h2>
                              </div>
                          </div>
                      </div>
                      <form action='#'>
                          <div class='row'>
                          <form name=form2 action=simpan-transaksi-member.html method=POST onSubmit=\"return validasi2(this)\">
                          <table>
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='email' placeholder='Your Email'>
                              </div>
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='password' placeholder='Your Password'>
                              </div>
                             
                            
                              <div class='col-lg-12 text-center'>
                              
                                  <input type='submit'  class='site-btn' value='Login'>
                                  <a href='lupa-password.html' button class='site-btn'>LUPA PASSWORD?</a>
                              </div>
                              
                          </div>
                      </form>
                  </div>
              </div>
              <!-- Contact Form End -->


      
     
      </form>
              
  </section><br><br>";                      

  echo "<section class='featured spad'>
  <div class='container'>
  <div class='row'>
  <div class='col-lg-12'>
  ";
    	  echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
          <div class='details_big_cari'>
              <div>


              <!-- Contact Form Begin -->
              <div class='contact-form spad'>
                  <div class='container'>
                      <div class='row'>
                          <div class='col-lg-12'>
                              <div class='contact__form__title'>
                                  <h2>Kustomer Baru</h2>
                              </div>
                          </div>
                      </div>
                      <form action='#'>
                          <div class='row'>
                          <form name=form action=simpan-transaksi.html method=POST onSubmit=\"return validasi(this)\">
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='nama' placeholder='Nama Lengkap'>
                              </div>
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='password' placeholder='Password'>
                              </div>
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='email' placeholder='Email'>
                              </div>
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='telpon' placeholder='Telepon/HP'>
                              </div>
                              <div class='col-lg-12 text-center'>
                                  <textarea placeholder='Alamat Pengiriman' type=text></textarea>
                              <span>Alamat pengiriman harus di isi lengkap, termasuk kota/kabupaten dan kode posnya.</span>
                              <div class='col-lg-12 col-md-6'>
                              
                              <br>KOTA TUJUAN</br>
                              <<select name='kota'>
                              <option value=0 selected>- Pilih Kota -</option>";
                              $tampil=mysqli_query($connect,"SELECT * FROM kota ORDER BY nama_kota");
                              while($r=mysqli_fetch_array($tampil)){
                                 echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
                              }
                          echo "</select> <br /><br />*)  Apabila tidak terdapat nama kota tujuan Anda, pilih <b>Lainnya</b>
                                          <br />**) Ongkos kirim dihitung berdasarkan kota tujuan</td></tr>
                                       
                              </div>
                              
     
                  <input type='submit'  class='site-btn' value='Daftar'></td>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <!-- Contact Form End -->
                

      
      <table>
     
      </table>
      </form>
              </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>
          </div>
          </div>
      </div>
  </section>";
  }
}      


// Modul lupa password
elseif ($_GET['module']=='lupapassword'){
  echo "<div class='col-12'>
  <div class='product__discount'>
      <div class='section-title product__discount__title'>
          <h2>Lupa Password</h2>
      </div>";
    	  echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
          <div class='details_big_cari'>
              <div>
     

     <!-- Contact Form Begin -->
    
              <div class='contact-form spad'>
                  <div class='container'>
                     
                      <form action='#'>
                          <div class='row'>
                          <form name=form3 action=kirim-password.html method=POST>
                          <table>
                              <div class='col-lg-6 col-md-6'>
                                  <input type='text' name='email' placeholder='Masukkan Email Anda'>
                              </div>
                              
                             
                            
                              <div class='col-lg-12 text-center'>
                              
                                  <input type='submit' class='site-btn' value='Kirim'>
                                  
                              </div>
                              
                          </div>
                      </form>
                  </div>
              </div>
              <!-- Contact Form End -->


     
              </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>";                      
}


// Modul kirim password
elseif ($_GET['module']=='kirimpassword'){

// Cek email kustomer di database
$cek_email=mysqli_num_rows(mysqli_query($connect,"SELECT email FROM kustomer WHERE email='$_POST[email]'"));
// Kalau email tidak ditemukan
if ($cek_email == 0){
  echo "Email <b>$_POST[email]</b> tidak terdaftar di database kami.<br />
        <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{

$password_baru = substr(md5(uniqid(rand(),1)),3,10);

// ganti password kustomer dengan password yang baru (reset password)
$query=mysqli_query($connect,"update kustomer set password=md5('$password_baru') where email='$_POST[email]'");

// dapatkan email_pengelola dari database
$sql2 = mysqli_query($connect,"select email_pengelola from modul where id_modul='43'");
$j2   = mysqli_fetch_array($sql2);

$subjek="Password Baru";
$pesan="Password Anda yang baru adalah <b>$password_baru</b>";
// Kirim email dalam format HTML
$dari = "From: $j2[email_pengelola]\r\n";
$dari .= "Content-type: text/html\r\n";

// Kirim password ke email kustomer
mail($_POST['email'],$subjek,$pesan,$dari);

  echo "<div class='center_title_bar'>Kirim Password</div>
    	  <div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
                 <div class='product_img_big'>
                 <img src='foto_banner/gedung.jpg' border='0' />
            </div>
          <div class='details_big_box'>
            <div class='product_title_big'>Password Sudah Terkirim</div>
              <div>
              <br />Silahkan cek email Anda.
              </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>";
}                              
}


// Modul simpan transaksi
elseif ($_GET['module']=='simpantransaksi'){
$kar1=strstr($_POST['email'], "@");
$kar2=strstr($_POST['email'], ".");

// Cek email kustomer di database
$cek_email=mysqli_num_rows(mysqli_query($connect,"SELECT email FROM kustomer WHERE email='$_POST[email]'"));
// Kalau email sudah ada yang pakai
if ($cek_email > 0){
  echo "Email <b>$_POST[email]</b> sudah ada yang pakai.<br />
        <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
elseif (empty($_POST['nama']) || empty($_POST['password']) || empty($_POST['alamat']) || empty($_POST['telpon']) || empty($_POST['email']) || empty($_POST['kota'])){
  echo "Data yang Anda isikan belum lengkap<br />
  	    <a href='selesai-belanja.html'><b>Ulangi Lagi</b>";
}
// elseif (!ereg("^[a-z|A-Z]","$_POST[nama]")){
//   echo "Nama tidak boleh diisi dengan angka atau simbol.<br />
//  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
// }
elseif (preg_match("^[a-z|A-Z]","$_POST[nama]")){
  echo "Nama tidak boleh diisi dengan angka atau simbol.<br />
 	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
elseif (strlen($kar1)==0 OR strlen($kar2)==0){
  echo "Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.<br />
 	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{

// fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysqli_query($isikeranjang,"SELECT * FROM orders_temp WHERE id_session='$sid'");
	
	while ($r=mysqli_fetch_array($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}

$tgl_skrg = date("Ymd");
$jam_skrg = date("H:i:s");

if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$nama   = antiinjection($_POST['nama']);
$alamat = antiinjection($_POST['alamat']);
$telpon = antiinjection($_POST['telpon']);
$email = antiinjection($_POST['email']);
$password=md5($_POST['password']);

// simpan data kustomer 
mysqli_query($connect,"INSERT INTO kustomer(nama_lengkap, password, alamat, telpon, email, id_kota) 
             VALUES('$nama','$password','$alamat','$telpon','$email','$_POST[kota]')");

// mendapatkan nomor kustomer
$id_kustomer=mysqli_insert_id($connect);

// simpan data pemesanan 
mysqli_query($connect,"INSERT INTO orders(tgl_order,jam_order,id_kustomer) VALUES('$tgl_skrg','$jam_skrg','$id_kustomer')");
  
// mendapatkan nomor orders
$id_orders=mysqli_insert_id($connect);

// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
$isikeranjang = isi_keranjang();
$jml          = count($isikeranjang);

// simpan data detail pemesanan  
for ($i = 0; $i < $jml; $i++){
  mysqli_query($connect,"INSERT INTO orders_detail(id_orders, id_produk, jumlah) 
               VALUES('$id_orders',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");
}
  
// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
for ($i = 0; $i < $jml; $i++) {
  mysqli_query($connect,"DELETE FROM orders_temp
	  	         WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
}

  echo "<div class='center_title_bar'>Proses Transaksi Selesai</div>";

    	  echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
          <div class='details_big_cari'>
              <div>
      Data pemesan beserta ordernya adalah sebagai berikut: <br />
      <table>
      <tr><td>Nama           </td><td> : <b>$nama</b> </td></tr>
      <tr><td>Alamat Lengkap </td><td> : $alamat </td></tr>
      <tr><td>Telpon         </td><td> : $telpon </td></tr>
      <tr><td>E-mail         </td><td> : $email </td></tr>
      </table><hr /><br />
      
      Nomor Order: <b>$id_orders</b><br /><br />";

      $daftarproduk=mysqli_query($connect,"SELECT * FROM orders_detail,produk 
                                 WHERE orders_detail.id_produk=produk.id_produk 
                                 AND id_orders='$id_orders'");

echo "<table cellpadding=10>
      <tr bgcolor=#6da6b1><th>No</th><th>Nama Produk</th><th>Berat(Kg)</th><th>Qty</th><th>Harga Satuan</th><th>Sub Total</th></tr>";
      
$pesan="Terimakasih telah melakukan pemesanan online di toko online kami <br /><br />  
        Nama: $nama <br />
        Password: $_POST[password]<br />
        Alamat: $alamat <br/>
        Telpon: $telpon <br /><hr />
        
        Nomor Order: $id_orders <br />
        Data order Anda adalah sebagai berikut: <br /><br />";
        
$no=1;
while ($d=mysqli_fetch_array($daftarproduk)){
   $disc        = ($d['diskon']/100)*$d['harga'];
   $hargadisc   = number_format(($d['harga']-$disc),0,",","."); 
   $subtotal    = ($d['harga']-$disc) * $d['jumlah'];

   $subtotalberat = $d['berat'] * $d['jumlah']; // total berat per item produk 
   $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli

   $total       = $total + $subtotal;
   $subtotal_rp = format_rupiah($subtotal);    
   $total_rp    = format_rupiah($total);    
   $harga       = format_rupiah($d['harga']);

   echo "<tr bgcolor=#dad0d0><td>$no</td><td>$d[nama_produk]</td><td align=center>$d[berat]</td><td align=center>$d[jumlah]</td>
                             <td align=right>$harga</td><td align=right>$subtotal_rp</td></tr>";

   $pesan.="$d[jumlah] $d[nama_produk] -> Rp. $harga -> Subtotal: Rp. $subtotal_rp <br />";
   $no++;
}

$ongkos=mysqli_fetch_array(mysqli_query($connect,"SELECT ongkos_kirim FROM kota WHERE id_kota='$_POST[kota]'"));
$ongkoskirim1=$ongkos['ongkos_kirim'];
$ongkoskirim = $ongkoskirim1 * $totalberat;

$grandtotal    = $total + $ongkoskirim; 

$ongkoskirim_rp = format_rupiah($ongkoskirim);
$ongkoskirim1_rp = format_rupiah($ongkoskirim1); 
$grandtotal_rp  = format_rupiah($grandtotal);  

// dapatkan email_pengelola dan nomor rekening dari database
$sql2 = mysqli_query($connect,"select email_pengelola,nomor_rekening,nomor_hp from modul where id_modul='43'");
$j2   = mysqli_fetch_array($sql2);

$pesan.="<br /><br />Total : Rp. $total_rp 
         <br />Ongkos Kirim untuk Tujuan Kota Anda : Rp. $ongkoskirim1_rp/Kg 
         <br />Total Berat : $totalberat Kg
         <br />Total Ongkos Kirim  : Rp. $ongkoskirim_rp		 
         <br />Grand Total : Rp. $grandtotal_rp 
         <br /><br />Silahkan lakukan pembayaran sebanyak Grand Total yang tercantum, rekeningnya: $j2[nomor_rekening]
         <br />Apabila sudah transfer, konfirmasi ke nomor: $j2[nomor_hp]";

$subjek="Pemesanan Online";

// Kirim email dalam format HTML
$dari = "From: $j2[email_pengelola]\r\n";
$dari .= "Content-type: text/html\r\n";

// Kirim email ke kustomer
mail($email,$subjek,$pesan,$dari);

// Kirim email ke pengelola toko online
mail("$j2[email_pengelola]",$subjek,$pesan,$dari);

echo "<tr><td colspan=5 align=right>Total : Rp. </td><td align=right><b>$total_rp</b></td></tr>
      <tr><td colspan=5 align=right>Ongkos Kirim untuk Tujuan Kota Anda: Rp. </td><td align=right><b>$ongkoskirim1_rp</b>/Kg</td></tr>      
	    <tr><td colspan=5 align=right>Total Berat : </td><td align=right><b>$totalberat Kg</b></td></tr>
      <tr><td colspan=5 align=right>Total Ongkos Kirim : Rp. </td><td align=right><b>$ongkoskirim_rp</b></td></tr>      
      <tr><td colspan=5 align=right>Grand Total : Rp. </td><td align=right><b>$grandtotal_rp</b></td></tr>
      </table>";
echo "<hr /><p>Data order dan nomor rekening transfer sudah terkirim ke email Anda. <br />
               Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka transaksi dianggap batal.</p><br />      
              </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>";                      
}

}else{
echo "Anda belum memasukkan kode YEYEYE<br />
<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
}
}


// Modul simpan transaksi member
elseif ($_GET['module']=='simpantransaksimember'){
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM	kustomer WHERE email='$email' AND password='$password'";
$hasil = mysqli_query($connect,$sql);
$r = mysqli_fetch_array($hasil);

if(mysqli_num_rows($hasil) == 0){
			 echo "Email atau Password Anda tidak benar<br />";
			 echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{
// fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysqli_query($isikeranjang,"SELECT * FROM orders_temp WHERE id_session='$sid'");
	
	while ($r=mysqli_fetch_array($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}

$tgl_skrg = date("Ymd");
$jam_skrg = date("H:i:s");

$id = mysqli_fetch_array(mysqli_query($connect,"SELECT id_kustomer FROM kustomer WHERE email='$email' AND password='$password'"));

// mendapatkan nomor kustomer
$id_kustomer=$id['id_kustomer'];

// simpan data pemesanan 
mysqli_query($connect,"INSERT INTO orders(tgl_order,jam_order,id_kustomer) VALUES('$tgl_skrg','$jam_skrg','$id_kustomer')");

  
// mendapatkan nomor orders
$id_orders=mysqli_insert_id($connect);

// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
$isikeranjang = isi_keranjang();
$jml          = count($isikeranjang);

// simpan data detail pemesanan  
for ($i = 0; $i < $jml; $i++){
  mysqli_query($connect,"INSERT INTO orders_detail(id_orders, id_produk, jumlah) 
               VALUES('$id_orders',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");
}
  
// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
for ($i = 0; $i < $jml; $i++) {
  mysqli_query($connect,"DELETE FROM orders_temp
	  	         WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
}

  echo "<div class='center_title_bar'>Proses Transaksi Selesai</div>";
    	  echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
          <div class='details_big_cari'>
              <div>
      Data pemesan beserta ordernya adalah sebagai berikut: <br />
      <table>
      <tr><td>Nama Lengkap   </td><td> : <b>$r[nama_lengkap]</b> </td></tr>
      <tr><td>Alamat Lengkap </td><td> : $r[alamat] </td></tr>
      <tr><td>Telpon         </td><td> : $r[telpon] </td></tr>
      <tr><td>E-mail         </td><td> : $r[email] </td></tr></table><hr /><br />
      
      Nomor Order: <b>$id_orders</b><br /><br />";

      $daftarproduk=mysqli_query($connect,"SELECT * FROM orders_detail,produk 
                                 WHERE orders_detail.id_produk=produk.id_produk 
                                 AND id_orders='$id_orders'");

echo "<table cellpadding=10>
      <tr bgcolor=#6da6b1><th>No</th><th>Nama Produk</th><th>Berat(Kg)</th><th>Qty</th><th>Harga Satuan</th><th>Sub Total</th></tr>";
      
$pesan="Terimakasih telah melakukan pemesanan online di toko online kami <br /><br />  
        Nama: $r[nama_lengkap] <br />
        Alamat: $r[alamat] <br/>
        Telpon: $r[telpon] <br /><hr />
        
        Nomor Order: $id_orders <br />
        Data order Anda adalah sebagai berikut: <br /><br />";
        
$no=1;
while ($d=mysqli_fetch_array($daftarproduk)){
   $disc        = ($d['diskon']/100)*$d['harga'];
   $hargadisc   = number_format(($d['harga']-$disc),0,",","."); 
   $subtotal    = ($d['harga']-$disc) * $d['jumlah'];

   $subtotalberat = $d['berat'] * $d['jumlah']; // total berat per item produk 
   $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli

   $total       = $total + $subtotal;
   $subtotal_rp = format_rupiah($subtotal);    
   $total_rp    = format_rupiah($total);    
   $harga       = format_rupiah($d['harga']);

   echo "<tr bgcolor=#dad0d0><td>$no</td><td>$d[nama_produk]</td><td align=center>$d[berat]</td><td align=center>$d[jumlah]</td>
                             <td align=right>$harga</td><td align=right>$subtotal_rp</td></tr>";

   $pesan.="$d[jumlah] $d[nama_produk] -> Rp. $harga -> Subtotal: Rp. $subtotal_rp <br />";
   $no++;
}

$kota=$r['id_kota'];

$ongkos=mysqli_fetch_array(mysqli_query($connect,"SELECT ongkos_kirim FROM kota WHERE id_kota='$kota'"));
$ongkoskirim1=$ongkos['ongkos_kirim'];
$ongkoskirim = $ongkoskirim1 * $totalberat;

$grandtotal    = $total + $ongkoskirim; 

$ongkoskirim_rp = format_rupiah($ongkoskirim);
$ongkoskirim1_rp = format_rupiah($ongkoskirim1); 
$grandtotal_rp  = format_rupiah($grandtotal);  

// dapatkan email_pengelola dan nomor rekening dari database
$sql2 = mysqli_query($connect,"select email_pengelola,nomor_rekening,nomor_hp from modul where id_modul='43'");
$j2   = mysqli_fetch_array($sql2);

$pesan.="<br /><br />Total : Rp. $total_rp 
         <br />Ongkos Kirim untuk Tujuan Kota Anda : Rp. $ongkoskirim1_rp/Kg 
         <br />Total Berat : $totalberat Kg
         <br />Total Ongkos Kirim  : Rp. $ongkoskirim_rp		 
         <br />Grand Total : Rp. $grandtotal_rp 
         <br /><br />Silahkan lakukan pembayaran sebanyak Grand Total yang tercantum, rekeningnya: $j2[nomor_rekening]
         <br />Apabila sudah transfer, konfirmasi ke nomor: $j2[nomor_hp]";

$subjek="Pemesanan Online";

// Kirim email dalam format HTML
$dari = "From: $j2[email_pengelola]\r\n";
$dari .= "Content-type: text/html\r\n";

// Kirim email ke kustomer
mail($email,$subjek,$pesan,$dari);

// Kirim email ke pengelola toko online
mail("$j2[email_pengelola]",$subjek,$pesan,$dari);

echo "<tr><td colspan=5 align=right>Total : Rp. </td><td align=right><b>$total_rp</b></td></tr>
      <tr><td colspan=5 align=right>Ongkos Kirim untuk Tujuan Kota Anda: Rp. </td><td align=right><b>$ongkoskirim1_rp</b>/Kg</td></tr>      
	    <tr><td colspan=5 align=right>Total Berat : </td><td align=right><b>$totalberat Kg</b></td></tr>
      <tr><td colspan=5 align=right>Total Ongkos Kirim : Rp. </td><td align=right><b>$ongkoskirim_rp</b></td></tr>      
      <tr><td colspan=5 align=right>Grand Total : Rp. </td><td align=right><b>$grandtotal_rp</b></td></tr>
      </table>";
echo "<hr /><p>Data order dan nomor rekening transfer sudah terkirim ke email Anda. <br />
               Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka transaksi dianggap batal.</p><br />      
              </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>";  
}                    
}
?>
