<?php 
require_once "core/init.php";
require_once "fungsi/script.php";
// require_once "fungsi/fungsiview.php";


if (session::get('username') == '') {
  echo "<script>location='login.php';</script>";
}

// print_r($_SESSION);
// die();
// if (input::get('us')) {
//   $pecah = $user->get_data(input::get('us'));
// }else{
  $pecah = $user->get_dataadmin(session::get('username'));
  if ($pecah['level'] !==  'admin') {
    echo "<script>alert('Anda tidak mempunyai akses ke halaman admin')</script>";
    session_destroy();
    echo "<script>location='login.php';</script>";
  }
// }

  $taaktif = $user->get_datataaktif();
  session::set('taaktif', $taaktif['nama']);

require_once "view/header.php";
require_once "view/sidenav.php";


 ?>




 <?php 
if (isset($_GET['halaman'])) 
                {
                    if ($_GET['halaman']=="ujian") 
                    {
                      require_once 'ujian.php';
                    }
                    elseif ($_GET['halaman']=="tmtk")
                    {
                      require_once 'matakuliah.php';
                    }
                    elseif ($_GET['halaman']=="udos")
                    {
                      require_once 'userdosen.php';
                    }
                    elseif ($_GET['halaman']=="ta")
                    {
                      require_once 'tahunajaran.php';
                    }
                    elseif ($_GET['halaman']=="trans")
                    {
                      require_once 'transkrip.php';
                    }
                    elseif ($_GET['halaman']=="mhs")
                    {
                      require_once 'mahasiswa.php';
                    }
                    elseif ($_GET['halaman']=="akt")
                    {
                      require_once 'angkatan.php';
                    }
                    elseif ($_GET['halaman']=="u")
                    {
                      require_once 'ujian.php';
                    }
                    elseif ($_GET['halaman']=="usus")
                    {
                      require_once 'ujiansusulan.php';
                    }
                    elseif ($_GET['halaman']=="jumtk")
                    {
                      require_once 'jadwalujian.php';
                    }
                    elseif ($_GET['halaman']=="sk")
                    {
                      require_once 'skajar.php';
                    }
                    elseif ($_GET['halaman']=="sl")
                    {
                      require_once 'soalujian.php';
                    }
                    elseif ($_GET['halaman']=="hdt")
                    {
                      require_once 'hapusdata.php';
                    }
                    elseif ($_GET['halaman']=="jdwl")
                    {
                      require_once 'jadwalujianmatakuliah.php';
                    }
                    elseif ($_GET['halaman']=="pembuatan")
                    {
                      require_once 'buatujian.php';
                    }
                    elseif ($_GET['halaman']=="try")
                    {
                      require_once 'try.php';
                    }
                    
                                    
                }else
                {
                    require_once 'homeadmin.php';
                }
?>


<?php 
	require_once "view/footer.php";
 ?>