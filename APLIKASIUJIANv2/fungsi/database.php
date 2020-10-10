<?php 

class database{

	private static $INSTANCE = null;
	private $mysqli,
			$HOST = 'localhost',
			$USER = 'root',
			$PASS = '',
			$DBNAME = 'ujianonline';

	public function __construct()
	{

		$this->mysqli = new mysqli( $this->HOST, $this->USER, $this->PASS, $this->DBNAME);
		if (mysqli_connect_error()) {
		
		die('Gagal Koneksi');
		}
	}

	/*
		Menguji koneksi agar tidak double
	*/

	public static function getInstance(){
		if (!isset( self::$INSTANCE)) 
		{
			self::$INSTANCE = new database();
		}
		return self::$INSTANCE;
	}


	public function get_info($table, $kolom ='', $isi='', $kolom2='', $isi2='')
	{
		if ( !is_int($isi)) 
			$isi = "'". $isi ."'"; 

		if ($isi2 != '') {
			if ( !is_int($isi2)) 
			$isi2 = "'". $isi2 ."'"; 
		}

		if ($kolom2 != '') {
			$query="SELECT * FROM $table WHERE $kolom = $isi AND $kolom2 = $isi2";
			$result=$this->mysqli->query($query);	
			while ($row =$result->fetch_assoc())
			{
				return $row;
			}			
		}
		elseif ($kolom != '') 
		{

			$query="SELECT * FROM $table WHERE $kolom = $isi";

			$result=$this->mysqli->query($query);	
			while ($row =$result->fetch_assoc())
			{
				return $row;
			}

		}else{
			$query="SELECT * FROM $table";
			$result=$this->mysqli->query($query);	
			while ($row =$result->fetch_assoc())
			{
				$results[] = $row;
			}
			return $results;
		}
		
	}

	public function ambil_data($table, $kolom ='', $isi='', $kolom2='', $isi2='')
	{

		if ( !is_int($isi)) 
			$isi = "'". $isi ."'"; 

		if ($isi2 != '') {
			if ( !is_int($isi2)) 
			$isi2 = "'". $isi2 ."'"; 
		}

		if ($kolom2 != '') {
			$query="SELECT * FROM $table WHERE $kolom = $isi AND $kolom2 = $isi2";
			// print_r($query);
			// die();
			$result=$this->mysqli->query($query);
			while ($row =$result->fetch_assoc())
			{
				$brow[] = $row;
			}
			if (!empty($brow)) {
				return $brow;
			}			
		}
		elseif ($kolom != '') 
		{

			$query="SELECT * FROM $table WHERE $kolom = $isi";
			$result=$this->mysqli->query($query);	
			while ($row =$result->fetch_assoc())
			{
				$brow[] = $row;
			}
			if (!empty($brow)) {
				return $brow;
			}
		}else{
			$query="SELECT * FROM $table";
			$result=$this->mysqli->query($query);	
			while ($row =$result->fetch_assoc())
			{
				$results[] = $row;
			}
			return $results;
		}
		
	}
	
	public function insert($tabel,$isi){
			$kolom = implode(', ', array_keys($isi));
			
			$value = array();
			$i = 0;

			foreach ($isi as $key => $val) {
				if (is_int($val)) {
					$value[$i] = $val;
				}else{
					$value[$i] = "'".$val."'";
				}
				$i++;
			}
			$isi = implode(',', $value);


			$sql = "INSERT INTO $tabel ($kolom) VALUES ($isi)";
			$query = $this->mysqli->query($sql);
			if ($query === true) {
				// $this->get($tabel);
				// echo json_encode($query);
				// echo "user has been added";
			}else{
				echo "gagal Tambah Data";
			}
	}
	
	public function update($table, $fields,$keyid, $id)
	{
		$isiarray = array();
		$i = 0;
		foreach ($fields as $key => $isi) {
			if ( is_int($isi)) 
			{
				$isiarray[$i] =$key."=".$isi;
			}else{
				$isiarray[$i] = $key."='".$isi."'";
			}
			$i++;
		}
		$isi = implode(', ', $isiarray);

		if (is_int($id)) {
			$id = $id;
		}else{
			$id = "'".$id."'";
		}

		$sql = "UPDATE $table SET $isi WHERE $keyid=$id";
		// echo "<pre>";
		// print_r($sql);
		// die();
		$query = $this->mysqli->query($sql);
		if ($query === true) {
				// $this->get_info($tabel);
				// echo json_encode($query);
				// echo "<script>location='index.php?halaman=udos';</script>";
			}else{
				// echo '<script>alert("Gagal Edit Data")</script>';
				$hasil = 'Gagal';
				return $hasil;
			}
	}

	public function delete($table,$keyid, $id)
	{

		$sql = "DELETE FROM $table WHERE $keyid=$id ";
		// print_r($sql);
		// die();
		$query = $this->mysqli->query($sql);

	}

}


 ?>