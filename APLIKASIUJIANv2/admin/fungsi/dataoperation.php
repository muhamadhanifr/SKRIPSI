<?php 
require_once "database.php";
$database = new database();


if (isset($_GET['aksi'])) {
	$aksi = $_GET['aksi'];
}
if (isset($_GET['tab'])) {
	$tabel = $_GET['tab'];
}

	
	if ($aksi === 'insertmtk') {
		if ($_GET['idmatakuliah'] != '') {
			$value = array(
			'idmatakuliah' => $_GET['idmtk'],
			'namamatakuliah' => $_GET['namamtk'],
			'usernamedosen' => $_GET['dosen'],
			);
			// print_r($value);
			return $database->insert($tabel, $value);
		}
	}

	if ($aksi === 'insertdosen') {
		// print_r($_GET);
		if ($_GET['username']!='') {
			$value = array(
			'username' => $_GET['username'],
			'password' => password_hash($_GET['password'],PASSWORD_DEFAULT),
			'namadosen' => $_GET['namadosen'],
			'NIDN' => $_GET['NIDN'],
			'email' => $_GET['email'],
			'nohp' => $_GET['nohp'],
			'norek' => $_GET['norek'],
			);
			// print_r($value);
			return $database->insert($tabel, $value);	
			}	
	}

	if ($aksi === 'editdatadosen') {
		// print_r($_GET);
		if ($_GET['username']!='') {
			$username = $_GET['username'];
			$value = array(
			'username' => $_GET['username'],
			'namadosen' => $_GET['namadosen'],
			'NIDN' => $_GET['NIDN'],
			'email' => $_GET['email'],
			'nohp' => $_GET['nohp'],
			'norek' => $_GET['norek'],
			);
			// print_r($value);
			return $database->update($tabel, $value , $username);	
			}	
	}

	if ($aksi === 'insertadmin') {
		// print_r($_GET);
		if ($_GET['username']!='') {
			$value = array(
			'username' => $_GET['username'],
			'password' => password_hash($_GET['password'],PASSWORD_DEFAULT),
			);
			// print_r($value);
			return $database->insert($tabel, $value);	
			}	
	}

	if ($aksi === 'get') {
		return $database->get_info($tabel);
	}

	if ($aksi === 'getdata') {
		$username = ($_GET['value']);
		return $database->get_info($tabel,'username',$username);
	}
 ?>