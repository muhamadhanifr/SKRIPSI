<?php 

	class user{

		private $koneksi;

		public function __construct()
		{
			$this->koneksi = database::getInstance();
		}

		public function cek_user($username)
		{
			$data = $this->koneksi->get_info('mahasiswa','NIM', $username);
			if (empty($data)) {
				$data = $this->koneksi->get_info('dosen','username', $username);
				return $data;
				// print_r($data);
				// die();
			}
			else return true;
		}

		public function cek_userdosen($username)
		{
			$data = $this->koneksi->get_info('dosen','username', $username);
			if (empty($data)) 
				return false; 
			else return true;
		}

		public function ckuser()
		{
			if (session::exists('username')) return true;
			else return false;
		}


		public function loginuser ($username, $password)
		{
			$data =$this->koneksi->get_info('mahasiswa', 'NIM', $username);
			if (empty($data)) {
				$data = $this->koneksi->get_info('dosen','username', $username);
			}
			if ($data['level'] == 'mahasiswa') {
				password_verify($password, $data['password']);
					session::set('username', $data['NIM']);
					session::set('namamahasiswa', $data['namamahasiswa']);
					session::set('angkatan', $data['angkatan']);
					session::set('email', $data['email']);
					session::set('nohp', $data['nohp']);
					session::set('level', $data['level']);
					session::set('programstudi', $data['programstudi']);
					echo "<script>location='index.php';</script>";
			}elseif ($data['level']=='dosen') {
				password_verify($password, $data['password']);
					session::set('username', $data['username']);
					session::set('namadosen', $data['namadosen']);
					session::set('NIDN', $data['NIDN']);
					session::set('email', $data['email']);
					session::set('nohp', $data['nohp']);
					session::set('norek', $data['norek']);
					session::set('level', $data['level']);
					echo "<script>location='index.php';</script>";
			}

		}

		public function get_datamhs($username)
		{
			return $this->koneksi->get_info('mahasiswa', 'NIM', $username);
		}


		public function get_datadosen($username)
		{	
			return $this->koneksi->get_info('dosen', 'username', $username);
		
		}


		public function get_jenisujian()
		{	
			return $this->koneksi->get_info('jenisujian');
		}

		public function get_dtangkatan()
		{	
			return $this->koneksi->get_info('angkatan');
		}

		public function get_datamatakuliah($id)
		{	
			$data = $this->koneksi->get_info('matakuliah','idmatakuliah', $id);
			return $data;
		}

		public function get_datajenisujian($id)
		{	
			return $this->koneksi->get_info('jenisujian','id',$id);
		}

		public function get_datajadwalujian($angkatan)
		{	
			return $this->koneksi->ambil_data('jadwalujianmatakuliah','angkatan', $angkatan);
		}

		public function getjadwalbyprodi($prodi,$angkatan)
		{	
			return $this->koneksi->ambil_data('jadwalujianmatakuliah','progamstudi', $prodi, 'angkatan', $angkatan);
		}

		public function get_datajadwalujianwhereand($angkatan,$id)
		{	
			return $this->koneksi->ambil_data('jadwalujianmatakuliah','angkatan',$angkatan, 'idjenisujian', $id);
		}

		public function getinfo_datajadwalujianid($id)
		{	
			return $this->koneksi->get_info('jadwalujianmatakuliah','id', $id);
		}

		public function data_jadwalujian($id)
		{	
			return $this->koneksi->ambil_data('jadwalujianmatakuliah','idjenisujian', $id);
		}

		public function getinfo_dataujianid($id)
		{	
			return $this->koneksi->get_info('jenisujian','id', $id);
		}

		public function getdata_soalid($id)
		{	
			return $this->koneksi->ambil_data('soal','idjadwalujian', $id);
		}

		public function getdata_soalsoal($soal)
		{	
			return $this->koneksi->get_info('soal','idsoal', $soal);
		}

		public function getdata_soalujianharian($soal)
		{	
			return $this->koneksi->get_info('soalujianharian','idsoal', $soal);
		}

		public function get_jenisujiansusulan($tahunajaran)
		{	
			return $this->koneksi->ambil_data('ujiansusulan','tahunajaran', $tahunajaran);
		}

		public function get_jenisujiansusulanid($id)
		{	
			return $this->koneksi->get_info('ujiansusulan','id', $id);
		}

		public function getjmlujiansusulan($NIM='', $status='')
		{	
			return $this->koneksi->ambil_data('ujiansusulan','NIM', $NIM, 'status', $status);
		}

		public function getdata_pilihanid($id)
		{	
			return $this->koneksi->ambil_data('pilihanganda','soal', $id);
		}
		
		public function get_datamahasiswa($NIM)
		{	
			return $this->koneksi->get_info('mahasiswa','NIM', $NIM);
		}

		public function tambah_datanilaiujianmhs($fields = array())
		{
			return $this->koneksi->insert('nilaipermtk', $fields);

		}

		public function tambah_datanilaiujiansusulan($fields = array())
		{
			return $this->koneksi->insert('nilaiujiansusulan', $fields);

		}		

		public function tambah_datanilaiujianharian($fields = array())
		{
			return $this->koneksi->insert('nilaiujianharian', $fields);

		}

		public function tambah_datajawabanmhs($fields = array())
		{
			return $this->koneksi->insert('jawabanujianmhs', $fields);

		}

		public function tambah_datajawabanujianharian($fields = array())
		{
			return $this->koneksi->insert('jawabanujianharianmhs', $fields);

		}

		public function simpan_datajawabanmhs($fields = array(),$id)
			{
				// echo "<pre>";
				// print_r($fields);
				// print_r($id);

				if ($this->koneksi->update('jawabanujianmhs', $fields,'id',$id)) return true;
				else return false;
			}

			public function simpan_datajawabanuhmhs($fields = array(),$id)
			{

				if ($this->koneksi->update('jawabanujianharianmhs', $fields,'id',$id)) return true;
				else return false;
			}

		public function getdata_nilaipermtk($id)
		{	
			return $this->koneksi->ambil_data('nilaipermtk','id', $id);
		}

		public function ck_dbnilaipermtk($NIM,$id){

			return $this->koneksi->get_info('nilaipermtk','NIM', $NIM, 'idjadwalujian', $id);
		
		}

		public function ck_dbnilaiperus($NIM,$id){

			return $this->koneksi->get_info('nilaiujiansusulan','NIM', $NIM, 'idjadwalujiansusulan', $id);
		
		}

		public function ck_dbnilaiujianharian($NIM,$id){

			return $this->koneksi->get_info('nilaiujianharian','NIM', $NIM, 'idjadwalujianharian', $id);
		
		}

		public function get_dataskajarwherenamadosen($namadosen,$tahunajaran)
		{	
			$data = $this->koneksi->ambil_data('skajar','namadosen',$namadosen,'tahunajaran',$tahunajaran);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datajenisujianwheretaaktif($tahunajaran)
		{	

			$data = $this->koneksi->ambil_data('jenisujian','tahunajaran',$tahunajaran);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datajenisujianharianwheretaaktif($taaktif)
		{	

			$data = $this->koneksi->ambil_data('ujianharian','tahunajaran',$taaktif);
			if (!empty($data)) {
				return $data;
			}
		}

		public function getjmlujianharian($status='')
		{	
			$data = $this->koneksi->ambil_data('ujianharian','status',$status);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datajenisujianharianwhereid($id)
		{	

			$data = $this->koneksi->get_info('ujianharian','id',$id);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_dataujianharianwhidmtk($id,$tahunajaran)
		{	
			$data = $this->koneksi->ambil_data('ujianharian','idmatakuliah',$id,'tahunajaran',$tahunajaran);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_taaktif($status)
		{	
			$data = $this->koneksi->get_info('tahunajaran','status',$status);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datajadwalujianmatakuliah($id)
		{	
			$data = $this->koneksi->get_info('jadwalujianmatakuliah','idmatakuliah',$id);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datajadwalujianmatakuliahid($id)
		{	
			$data = $this->koneksi->get_info('jadwalujianmatakuliah','id',$id);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datajadwalujiansemester($id)
		{	
			$data = $this->koneksi->get_info('jadwalujianmatakuliah','id',$id);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datajadwalujianharian($kodeujianharian)
		{	
			$data = $this->koneksi->get_info('ujianharian','kodeujianharian',$kodeujianharian);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datajadwalujianharianwhereand($angkatan,$kodeujianharian)
		{	
			$data = $this->koneksi->ambil_data('ujianharian','angkatan',$angkatan,'kodeujianharian',$kodeujianharian);
			if (!empty($data)) {
				return $data;
			}
		}		

		public function get_datajadwalujianmatakuliahwhereid($id)
		{	
			$data = $this->koneksi->get_info('jadwalujianmatakuliah','id',$id);
			if (!empty($data)) {
				return $data;
			}
		}

		public function ambil_datasoalujianmatakuliahwhereidjadwalujian($id)
		{	
			$data = $this->koneksi->ambil_data('soal','idjadwalujian',$id);
			if (!empty($data)) {
				return $data;
			}
		}

		public function ambil_datasoalujianharianwherekodeujianharian($kodeujianharian)
		{	
			$data = $this->koneksi->ambil_data('soalujianharian','kodeujianharian',$kodeujianharian);
			if (!empty($data)) {
				return $data;
			}
		}

		public function tambahsoaljadwalujian($fields = array())
		{
			return $this->koneksi->insert('soal', $fields);
		}

		public function tambahsoaljadwalujianharian($fields = array())
		{
			return $this->koneksi->insert('soalujianharian', $fields);
		}

		public function tambahketentuanjadwalujian($fields = array(),$id)
		{
			// echo "<pre>";
			// print_r($fields);
			if ($this->koneksi->update('jadwalujianmatakuliah', $fields,'id',$id)) return true;
			else return false;
		}

		public function tambahketentuanjadwalujianharian($fields = array(),$id)
		{
			// echo "<pre>";
			// print_r($fields);
			if ($this->koneksi->update('ujianharian', $fields,'kodeujianharian',$id)) return true;
			else return false;
		}

		public function tambahujianharian($fields = array())
		{
			return $this->koneksi->insert('ujianharian', $fields);
		}

		public function deletedatasoal($id)
		{

			if ($this->koneksi->delete('soal','idsoal', $id)) return true;
			else return false;
		}

		public function deletedatasoalujianharian($id)
		{
			if ($this->koneksi->delete('soalujianharian','idsoal', $id)) return true;
			else return false;
		}

		public function editprofiledosen($fields = array(),$id)
			{

				if ($this->koneksi->update('dosen', $fields,'id',$id)) return true;
				else return false;
			}

		public function editprofilemhs($fields = array(),$id)
			{

				if ($this->koneksi->update('mahasiswa', $fields,'id',$id)) return true;
				else return false;
			}	
		public function tryarray($id){
			$data = $this->koneksi->ambil_data('soal','idjadwalujian', $id);
			if (!empty($data)) {
				return $data;
			}
		}













		public function pengujianwhitebox($aksi,$id){
			if ($aksi === 'ujianharian') {
				// jika variabel aksi = 'ujianharian' maka lakukan query pada tabel soalujianharian
				// untuk mengambil soal ujian harian yang sudah dimasukan untuk ujian yang akan dilakukan
				$datasoal = $this->koneksi->ambil_data('soalujianharian','kodeujianharian', $id);
			}elseif($aksi === 'ujiansemester'){
				// jika variabel aksi = 'ujiansemester' maka lakukan query pada tabel soal
				// untuk mengambil soal ujian yang sudah dimasukan untuk ujian yang akan dilakukan
				$datasoal = $this->koneksi->ambil_data('soal','idjadwalujian', $id);
				echo "<pre>";
				echo "Isi Var Datasoal = <>";
				print_r($datasoal);
			}
			// hitung jumlah data yang ada pada variabel datasoal dan inisialisasikan ke variabel count
			$count = count($datasoal);
			echo "Jumlah Array Datasoal : ".$count."<br>";
			echo "// Tampungkan jumlah array datasoal kedalam variabel count<br>";
			// jika variabel count lebih besar dari 0
			// if ($count>0) {

				while ($count > 0) {
					echo "-------------------------------------------------------------------------------------------------------------------<br>";
					echo "while(".$count." > 0) ? Ya<br>";
					$dataacak = $count-1;
					echo "var dataacak = var count - 1 <br>";
					echo "var dataacak =".$count."- 1<br>";
					echo "var dataacak =".$dataacak."<br><br>";
					// dapatkan hasil acak angka dimana hasil acak harus diantara 0 dan nilai variabel dataacak
					$hasilacak = rand(0,$dataacak);
					echo "// Dapatkan Angka acak, dimana harus diantara 0 dan ".$dataacak."<br>";
					echo "var hasilacak = ".$hasilacak."<br><br>";
					// setelah mendapatkan angka pengacakan			// lakukan pertukaran antara 
					$penyimpanansementara = $datasoal[$hasilacak];  // isi array datasoal[hasilacak] dengan
					echo "// Masukan Data isi array datasoal[hasilacak] kedalam variabel penyimpanansementara <br>";
					echo "// var penyimpanansementara = datasoal[".$hasilacak."]<br>";
					echo "isi var penyimpanansementara = ".print_r($penyimpanansementara)."<br><br>";
					$datasoal[$hasilacak]=$datasoal[$dataacak];		// isi array datasoal[dataacak]
					echo "// Masukan isi array datasoal[dataacak] kedalam array datasoal[hasilacak]<br>";
					echo "// datasoal[".$hasilacak."] = datasoal[".$dataacak."] <br><br>";
					print_r($datasoal);

					$datasoal[$dataacak] = $penyimpanansementara;	// menggunakan bantuan variabel baru
					echo "// Masukan isi array penyimpanansementara kedalam array datasoal[dataacak]<br>";
					echo "// datasoal[".$dataacak."] = var penyimpanansementara <br>";
					print_r($datasoal);
					echo "<br><br>";

					$count--;
					echo "// var count kurangi 1 ";
					echo "// var count--; <br><br>";

					echo "<br><br>----------------------------------------------------------------------------------------------------";									
				}
				// variabel datasoal setelah dilakukan pengacakan
				echo "<br><br><br>";
				echo '<h2 class="text-center"> HASIL AKHIR ARRAY DATASOAL SETELAH DILAKUKAN PENGACAKAN </h2>';
				print_r($datasoal);
				return $datasoal;
			// }else{
			// }
		}





		public function acaksoal($aksi,$id){
			if ($aksi === 'ujianharian') {
				// jika variabel aksi = 'ujianharian' maka lakukan query pada tabel soalujianharian
				// untuk mengambil soal ujian harian yang sudah dimasukan untuk ujian yang akan dilakukan
				$datasoal = $this->koneksi->ambil_data('soalujianharian','kodeujianharian', $id);
			}elseif($aksi === 'ujiansemester'){
				// jika variabel aksi = 'ujiansemester' maka lakukan query pada tabel soal
				// untuk mengambil soal ujian yang sudah dimasukan untuk ujian yang akan dilakukan
				$datasoal = $this->koneksi->ambil_data('soal','idjadwalujian', $id);
			}
			// hitung jumlah data yang ada pada variabel datasoal dan inisialisasikan ke variabel count
			$count = count($datasoal);
			// jika variabel count lebih besar dari 0
			if ($count>0) {
				while ($count > 0) {
					$dataacak = $count-1;
					// dapatkan hasil acak angka dimana hasil acak harus diantara 0 dan nilai variabel dataacak
					$hasilacak = rand(0,$dataacak);
					// setelah mendapatkan angka pengacakan			// lakukan pertukaran antara 
					$penyimpanansementara = $datasoal[$hasilacak];  // isi array datasoal[hasilacak] dengan
					$datasoal[$hasilacak]=$datasoal[$dataacak];		// isi array datasoal[dataacak]
					$datasoal[$dataacak] = $penyimpanansementara;	// menggunakan bantuan variabel baru
					$count--;										
				}
				// variabel datasoal setelah dilakukan pengacakan
				return $datasoal;
			}else{
			}
		}

		public function acaksoalada($aksi,$id){
			if ($aksi === 'ujianharian') {
				// jika variabel aksi = 'ujianharian' maka lakukan query pada tabel jawabanujianharianmhs
				// untuk mengambil soal ujian harian yang sudah ditentukan khusus untuk user mahasiswa tersebut
				$datasoal = $this->koneksi->ambil_data('jawabanujianharianmhs','kodeujianharian', $id);
			}elseif($aksi === 'ujiansemester'){
				// jika variabel aksi = 'ujiansemester' maka lakukan query pada tabel jawabanujianmhs
				// untuk mengambil soal ujian semester yang sudah ditentukan khusus untuk user mahasiswa tersebut
				$datasoal = $this->koneksi->ambil_data('jawabanujianmhs','idnilaimtk', $id);
			}
			// hitung jumlah data yang ada pada variabel datasoal dan inisialisasikan ke variabel count
			$count = count($datasoal);
			// jika variabel count lebih besar dari 0
			while ($count > 0) {
				$dataacak = $count-1;
				// dapatkan hasil acak angka dimana hasil acak harus diantara 0 dan nilai variabel dataacak
				$hasilacak = rand(0,$dataacak);
				// setelah mendapatkan angka pengacakan
				$penyimpanansementara = $datasoal[$hasilacak]; 	// lakukan pertukaran antara isi array datasoal[hasilacak]
				$datasoal[$hasilacak]=$datasoal[$dataacak];		// dengan isi array datasoal[dataacak]
				$datasoal[$dataacak] = $penyimpanansementara;	// menggunakan bantuan variabel baru
				$count--;
			}
			return $datasoal;			
		}



		public function acakpg($pilihanganda){
			// split string berdasarkan simbol "`"
			$datapg = explode("`", $pilihanganda);
			// hitung jumlah array var datapg
			$countpg = count($datapg);
			$acakpg = $countpg-1;
			// jika jumlah array var datapg lebih besar dari 0
			while ($countpg > 0) {
				// dapatkan nilai var hasilacakpg dimana harus diantara atau samadengan 0 dan nilai var acakpg
				$hasilacakpg = rand(0,$acakpg);	
				// Setelah mendapatkan angka pengacakan		// lakukan pertukaran
				$simpansementara = $datapg[$hasilacakpg];	// antara isi array datapg[hasilacakpg]
				$datapg[$hasilacakpg] = $datapg[$acakpg];	// dengan isi array datapg[acakpg]
				$datapg[$acakpg] = $simpansementara;		// menggunakan bantuan variabel baru
				$countpg--;
			}
			return $datapg;
		}

		public function hitungnilaimhs($aksi, $id){
			if ($aksi === 'ujianharian') {
				$dtjwb = $this->koneksi->ambil_data('jawabanujianharianmhs','kodeujianharian',$id);
				if (!empty($dtjwb)) {
					$countdtjwb = count($dtjwb);
					foreach ($dtjwb as $datajawaban) {
						$dtsoal = $this->koneksi->get_info('soalujianharian', 'idsoal', $datajawaban['soal']);
						if ($dtsoal['jawabansoal'] === $datajawaban['pilihanjawaban']) {
							$fields = array(
								'status' => 'BENAR',
								);
							$this->koneksi->update('jawabanujianharianmhs', $fields,'soal',$datajawaban['soal']);
						}else{
							$fields = array(
								'status' => 'SALAH',
								);
							$this->koneksi->update('jawabanujianharianmhs', $fields,'soal',$datajawaban['soal']);
						}
					}
					$jumlahbenar = $this->koneksi->ambil_data('jawabanujianharianmhs','kodeujianharian',$id,'status', 'BENAR');
					$countjumlahbenar = count($jumlahbenar);
				// return $data;
					$nilai = ($countjumlahbenar*100)/$countdtjwb;
					$nilai = number_format($nilai,2);
					if ($nilai === 0) {
						$nilai = 'nol';
					}
					$nilai = array(
						'nilai'		=> $nilai,
						'status'	=> 'Selesai',
						);
					$this->koneksi->update('nilaiujianharian', $nilai,'id',$id);
				}
			}elseif($aksi === 'ujiansemester'){
				$dtjwb = $this->koneksi->ambil_data('jawabanujianmhs','idnilaimtk',$id);
				if (!empty($dtjwb)) {
					$countdtjwb = count($dtjwb);
					foreach ($dtjwb as $datajawaban) {
						$dtsoal = $this->koneksi->get_info('soal', 'idsoal', $datajawaban['soal']);
						if ($dtsoal['jawabansoal'] === $datajawaban['pilihanjawaban']) {
							$fields = array(
								'status' => 'BENAR',
								);
							$this->koneksi->update('jawabanujianmhs', $fields,'soal',$datajawaban['soal']);
						}else{
							$fields = array(
								'status' => 'SALAH',
								);
							$this->koneksi->update('jawabanujianmhs', $fields,'soal',$datajawaban['soal']);
						}
					}
					$jumlahbenar = $this->koneksi->ambil_data('jawabanujianmhs','idnilaimtk',$id,'status', 'BENAR');
					$countjumlahbenar = count($jumlahbenar);
				// return $data;
					$nilai = ($countjumlahbenar*100)/$countdtjwb;
					$nilai = number_format($nilai,2);
					if ($nilai === 0) {
						$nilai = 'nol';
					}
					$nilai = array(
						'nilai'	=> $nilai,
						);
					$this->koneksi->update('nilaipermtk', $nilai,'id',$id);
				}
			}
			elseif($aksi === 'ujiansusulan'){
				$dtjwb = $this->koneksi->ambil_data('jawabanujianmhs','idnilaimtk',$id);
				if (!empty($dtjwb)) {
					$countdtjwb = count($dtjwb);
					foreach ($dtjwb as $datajawaban) {
						$dtsoal = $this->koneksi->get_info('soal', 'idsoal', $datajawaban['soal']);
						if ($dtsoal['jawabansoal'] === $datajawaban['pilihanjawaban']) {
							$fields = array(
								'status' => 'BENAR',
								);
							$this->koneksi->update('jawabanujianmhs', $fields,'soal',$datajawaban['soal']);
						}else{
							$fields = array(
								'status' => 'SALAH',
								);
							$this->koneksi->update('jawabanujianmhs', $fields,'soal',$datajawaban['soal']);
						}
					}
					$jumlahbenar = $this->koneksi->ambil_data('jawabanujianmhs','idnilaimtk',$id,'status', 'BENAR');
					$countjumlahbenar = count($jumlahbenar);
				// return $data;
					$nilai = ($countjumlahbenar*100)/$countdtjwb;
					$nilai = number_format($nilai,2);
					if ($nilai === 0) {
						$nilai = 'nol';
					}
					$nilai = array(
						'nilai'		=> $nilai,
						'status'	=> 'Selesai',
						);
					$this->koneksi->update('nilaiujiansusulan', $nilai,'id',$id);
				}
			}
		}


	}
 ?>