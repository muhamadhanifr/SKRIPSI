<?php 
	require_once "database.php";
	$koneksi = new database();

	if (isset($_GET['aksi'])) {
		$aksi = $_GET['aksi'];
	}

	if (isset($_GET['val'])) {
		$val = $_GET['val'];
	}

	if (isset($_GET['tabel'])) {
		$tabel = $_GET['tabel'];
	}

	if ($aksi === 'getdatadosen') {
		$data = $koneksi->get_info('dosen', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'hapusdatadosen') 
	{
		$data = $koneksi->delete('dosen', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdatata') 
	{
		$data = $koneksi->get_info('tahunajaran', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdatatahunajaran') 
	{
		$data = $koneksi->get_info('tahunajaran', 'nama', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdatamatakuliah') 
	{
		$data = $koneksi->get_info('matakuliah', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'hapusdatamatakuliah') 
	{
		$data = $koneksi->delete('matakuliah', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdatamhs') 
	{
		$data = $koneksi->get_info('mahasiswa', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'hapusdatamhs') 
	{
		$data = $koneksi->delete('mahasiswa', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdataangkatan') 
	{
		$data = $koneksi->get_info('angkatan', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'hapusdataangkatan') 
	{
		$data = $koneksi->delete('angkatan', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdataujian') 
	{
		$data = $koneksi->get_info('jenisujian', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdataangkatan') 
	{
		$data = $koneksi->get_info('angkatan');
		echo json_encode($data);
	}
	elseif ($aksi === 'getdatajadwalujianmtk') 
	{
		$data = $koneksi->get_info('jadwalujianmatakuliah', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdatask') 
	{
		$data = $koneksi->get_info('skajar', 'id', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdataskta') 
	{
		$data = $koneksi->ambil_data('skajar', 'tahunajaran', $val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdtskajar') 
	{
		$data = $koneksi->ambil_data($tabel,'ganjilgenap',$val);
		echo json_encode($data);
	}
	elseif ($aksi === 'skajarperthajaran') 
	{
		$data = $koneksi->ambil_data($tabel,'tahunajaran',$val);
		echo json_encode($data);
	}
	elseif ($aksi === 'getdataujiansusulan') 
	{
		$data = $koneksi->ambil_data($tabel);
		echo json_encode($data);
	}
	elseif ($aksi === 'getnilaimtk') {
		$data = $koneksi->ambil_data('nilaipermtk', 'idmatakuliah', $val);
		$datamhs = $koneksi->ambil_data('mahasiswa');
		$count = count($data);
		$cmhs = count($datamhs);
		for ($k=0; $k < $cmhs; $k++) { 
			
			for ($i=0; $i < $count; $i++) { 
				if ($data[$i]['NIM'] === $datamhs[$k]['NIM']) {
					$datatranskrip[$k] = array(
					'NIM'			=> $datamhs[$k]['NIM'],
					'namamahasiswa'	=> $datamhs[$k]['namamahasiswa'],
					'nilai'			=> $data[$i]['nilai'],
					);
					break;
				}elseif ($data[$i]['NIM'] !== $datamhs[$k]['NIM']) {
					$datatranskrip[$k] = array(
					'NIM'			=> $datamhs[$k]['NIM'],
					'namamahasiswa'	=> $datamhs[$k]['namamahasiswa'],
					'nilai'			=> '0',
					);
				}
			}
		}
		echo json_encode($datatranskrip);
	}
	elseif ($aksi === 'get') 
	{
		$data = $koneksi->ambil_data($tabel);
		echo json_encode($data);
	}
	elseif ($aksi === 'getshort') 
	{
		$data = $koneksi->ambil_datashort($tabel,'','','ORDER',$val);
		echo json_encode($data);
	}



 ?>