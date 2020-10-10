
<?php


token::generatedata(input::get('t'));

if (!empty(input::get('id'))) {

	if (token::checkdata(input::get('t'))) {	

			if (input::get('d')=='sl') 
			{	
				$id = input::get('id');
				$user->deletedatasoal("'".$id."'");
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=dju&t=$_GET[t]&id=$_GET[id]';</script>";
			}
			elseif (input::get('d')=='sluh') 
			{
				$id = input::get('id');
				$user->deletedatasoalujianharian("'".$id."'");
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=tsuh&t=$_GET[t]';</script>";
			}
			elseif (input::get('d')=='ta') 
			{
				$user->deletedatata(input::get('id'));
				echo "<script>alert('Data Telah Terhapus')</script>";
				echo "<script>location='index.php?halaman=ta';</script>";
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

