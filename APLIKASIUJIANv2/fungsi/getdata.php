<?php 
session_start();

	require_once "database.php";
	require_once "fungsiview.php";

	$koneksi = new database();
	$fungsiview = new fungsiview();

	if (isset($_GET['aksi'])) {
		$aksi = $_GET['aksi'];
	}

	if (isset($_GET['val'])) {
		$val = $_GET['val'];
	}

	if ($aksi === 'getdatadosen') {
		$data = $koneksi->get_info('dosen', 'username', $val);
		echo json_encode($data);
	}

	if ($aksi === 'getnilaimtk') {
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


	if ($aksi === 'getjadwalujianbyidujian') {
		$data = $koneksi->ambil_data('jadwalujianmatakuliah', 'idjenisujian', $val);
			$dt = count($data);
			for ($m=0; $m < $dt; $m++) { 
				$waktumulai = date_create($data[$m]['waktupelaksanaan']);
				date_add($waktumulai, date_interval_create_from_date_string('+'.$data[$m]['durasiujian'].' minutes'));
				$waktuselesai = date_format($waktumulai, 'Y-m-d H:i:s');

				$tanggalpelaksanaan = $fungsiview->tanggal($data[$m]['waktupelaksanaan']);
				$waktustart = $fungsiview->jam($data[$m]['waktupelaksanaan']);
				$waktufinish = $fungsiview->jam($waktuselesai);

				$soal = $koneksi->ambil_data('soal', 'idjadwalujian', $data[$m]['id']);
				$csoal = count($soal);

				$mtk = $koneksi->get_info('matakuliah', 'idmatakuliah', $data[$m]['idmatakuliah']);
				$data[$m] = array(
						'idjadwalujian'			=> $data[$m]['id'],
						'idmatakuliah'			=> $data[$m]['idmatakuliah'],
						'namamatakuliah'		=> $mtk['namamatakuliah'],
						'tanggalpelaksanaan'	=> $tanggalpelaksanaan,
						'waktustart'			=> $waktustart,
						'waktufinish'			=> $waktufinish,
						'jumlahsoal'			=> $csoal,
					);
			}
		echo json_encode($data);
	}


	if ($aksi === 'getjadwalujianbyidujianfordosen') {
		$taaktif = $koneksi->get_info('tahunajaran', 'status', 'aktif');
		// $data = $koneksi->ambil_data('jadwalujianmatakuliah', 'idjenisujian', $val);
		$datask = $koneksi->ambil_data('skajar', 'namadosen', $_SESSION['namadosen'], 'tahunajaran', $taaktif['nama']);
		$csk = count($datask);
		for ($l=0; $l < $csk; $l++) { 
			$jadwal = $koneksi->get_info('jadwalujianmatakuliah','idmatakuliah',$datask[$l]['idmatakuliah'], 'idjenisujian', $val);
			$mtk = $koneksi->get_info('matakuliah', 'idmatakuliah', $datask[$l]['idmatakuliah']);

			$waktumulai = date_create($jadwal['waktupelaksanaan']);
			date_add($waktumulai, date_interval_create_from_date_string('+'.$jadwal['durasiujian'].' minutes'));
			$waktuselesai = date_format($waktumulai, 'Y-m-d H:i:s');

			$cjadwal = count($jadwal);

			if ($cjadwal !== 0) {
				$tanggalpelaksanaan = $fungsiview->tanggal($jadwal['waktupelaksanaan']);
				$waktustart = $fungsiview->jam($jadwal['waktupelaksanaan']);
				$waktufinish = $fungsiview->jam($waktuselesai);

				$soal = $koneksi->ambil_data('soal', 'idjadwalujian', $jadwal['id']);
				$csoal = count($soal);

				$data[$l] = array(
						'idjadwalujian'			=> $jadwal['id'],
						'idmatakuliah'			=> $datask[$l]['idmatakuliah'],
						'namamatakuliah'		=> $mtk['namamatakuliah'],
						'tanggalpelaksanaan'	=> $tanggalpelaksanaan,
						'tanggalpelaksanaan'	=> $tanggalpelaksanaan,
						'waktustart'			=> $waktustart,
						'waktufinish'			=> $waktufinish,
						'jumlahsoal'			=> $csoal,

					);
			}
		}			
		echo json_encode($data);
	}

 ?>