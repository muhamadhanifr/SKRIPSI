
<?php


token::generatedata(input::get('t'));

if (!empty(input::get('id'))) {

	if (token::checkdata(input::get('t'))) {	

			if (input::get('d')=='d') 
			{	
				$id = input::get('id');
				$user->deletedatadosen("'".$id."'");
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=udos';</script>";
			}
			elseif (input::get('d')=='ta') 
			{
				$user->deletedatata(input::get('id'));
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=ta';</script>";
			}
			elseif (input::get('d')=='mtk') 
			{	
				$id = input::get('id');
				$user->deletedatamtk("'".$id."'");
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=tmtk';</script>";
			}
			elseif (input::get('d')=='mhs') 
			{
				$user->deletedatamhs(input::get('id'));
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=mhs';</script>";
			}
			elseif (input::get('d')=='akt') 
			{
				$user->deletedataakt(input::get('id'));
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=akt';</script>";
			}
			elseif (input::get('d')=='u') 
			{
				$user->deletedataujian(input::get('id'));
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=u';</script>";
			}
			elseif (input::get('d')=='hjumtk') 
			{
				$user->deletedataujianmatakuliah(input::get('id'));
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=jumtk&t=$_GET[t]&id=$_GET[iduj]';</script>";
			}
			elseif (input::get('d')=='hjwl') 
			{
				$user->deletedataujianmatakuliah(input::get('id'));
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=jdwl';</script>";
			}
			elseif (input::get('d')=='sk') 
			{
				$user->deletedataskajarwhereid(input::get('id'));
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=sk';</script>";
			}




			else{
			echo "Data Gagal Dihapus";
			}
	}else{
		echo "string";
	}
	
}else{
	echo '<script>alert("Anda Tidak Dapat Menghapus Data")</script>';
}

 ?>

