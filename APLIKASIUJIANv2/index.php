<?php 
require_once "core/init.php";

if (!$user->ckuser()) {
  header('location:login.php');
}

$taaktif = $user->get_taaktif('Aktif');

// print_r($_SESSION);
// die();
// if (input::get('us')) {
//   $pecah = $user->get_data(input::get('us'));
// }else{
// }

require_once "view/header.php";
require_once "view/sidenav.php";
require_once "fungsi/fungsiview.php";

 ?>

<?php 

  if (session::get('level')!=='dosen') {
    if (session::get('level')!=='mahasiswa') {
      echo "<script>alert('Anda tidak mempunyai akses ke halaman ini')</script>";
      session_destroy();
      echo "<script>location='login.php';</script>";
    }
  }
  
 ?>

 <?php 
if (isset($_GET['halaman'])) 
                {
                    if ($_GET['halaman']=="pdos")
                    {
                    	require_once 'dosen/profile.php';
                    } 
                    elseif ($_GET['halaman']=="pmhs") 
                    {
                      require_once 'mahasiswa/profilemahasiswa.php';
                    }
                    elseif ($_GET['halaman']=="du")
                    {
                      require_once 'mahasiswa/ujian.php';
                    }
                    elseif ($_GET['halaman']=="fdu")
                    {
                      require_once 'dosen/daftarujian.php';
                    }
                    elseif ($_GET['halaman']=="tn")
                    {
                      require_once 'dosen/transkripnilai.php';
                    }
                    elseif ($_GET['halaman']=="dju")
                    {
                      require_once 'dosen/detailjadwalujian.php';
                    }
                    elseif ($_GET['halaman']=="editprofiledosen") 
                    {
                      require_once 'dosen/editprofile.php';
                    }
                    elseif ($_GET['halaman']=="uh") 
                    {
                      require_once 'dosen/ujianharian.php';
                    }
                    elseif ($_GET['halaman']=="uss") 
                    {
                      require_once 'mahasiswa/ujiansusulan.php';
                    }
                    elseif ($_GET['halaman']=="ef") 
                    {
                      require_once 'mahasiswa/editprofilemhs.php';
                    }
                    elseif ($_GET['halaman']=="tsuh") 
                    {
                      require_once 'dosen/tambahsoalujianharian.php';
                    }
                    elseif ($_GET['halaman']=="hdt") 
                    {
                      require_once 'hapusdata.php';
                    }
                    elseif ($_GET['halaman']=="puj") 
                    {
                      require_once 'mahasiswa/pelaksanaanujian.php';
                    }
                    elseif ($_GET['halaman']=="pujs") 
                    {
                      require_once 'mahasiswa/pelaksanaanujiansusulan.php';
                    }
                    elseif ($_GET['halaman']=="pujh") 
                    {
                      require_once 'mahasiswa/pelaksanaanujianharian.php';
                    }
                    elseif ($_GET['halaman']=="ujh") 
                    {
                      require_once 'mahasiswa/ujianharian.php';
                    }
                    elseif ($_GET['halaman']=="try") 
                    {
                      require_once 'dosen/try.php';
                    }
                    elseif ($_GET['halaman']=="tryy") 
                    {
                      require_once 'mahasiswa/tryy.php';
                    }
                                    
                }else
                {
                    require_once 'beranda.php';
                }
?>


<?php 
	require_once "view/footer.php";
 ?>
