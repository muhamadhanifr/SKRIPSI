<?php 

	class user{

		private $koneksi;

		public function __construct()
		{
			$this->koneksi = database::getInstance();
		}

		public function cek_useradmin($username)
		{
			$data = $this->koneksi->get_info('admin','username', $username);
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
			$data =$this->koneksi->get_info('admin', 'username', $username);
			if (password_verify($password, $data['password'])) 
				return true; 
				else return false;			
		}

		public function get_dataadmin($username)
		{
			if ($this->cek_useradmin($username))
				return $this->koneksi->get_info('admin', 'username', $username);
			else return false;
		}

		public function get_dosen()
		{	
			$data = $this->koneksi->get_info('dosen');
			if (!empty($data)) {
				return $data;
			}
		}

			public function tambah_datadosen($fields = array())
			{
				if ($this->koneksi->insert('dosen', $fields)) return true;
				else return false;

			}

			public function edit_datadosen($fields = array(),$id)
			{

				if ($this->koneksi->update('dosen', $fields,'id',$id)) return true;
				else return false;

			}

			public function deletedatadosen($id)
			{

				if ($this->koneksi->delete('dosen','id', $id)) return true;
				else return false;
			}



		public function get_ta()
		{	
			$data = $this->koneksi->ambil_data('tahunajaran');
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datataaktif()
		{	
			$data = $this->koneksi->get_info('tahunajaran', 'status', 'Aktif');
			if (!empty($data)) {
				return $data;
			}
		}

			public function tambah_datata($fields = array())
			{
				if ($this->koneksi->insert('tahunajaran', $fields)) return true;
				else return false;

			}

			public function edit_datata($fields = array(),$id)
			{

				if ($this->koneksi->update('tahunajaran', $fields,'id',$id)) return true;
				else return false;

			}

			public function deletedatata($id)
			{

				if ($this->koneksi->delete('tahunajaran','id', $id)) return true;
				else return false;
			}



		public function get_matakuliah()
		{	
			$data = $this->koneksi->ambil_data('matakuliah');
			if (!empty($data)) {
				return $data;
			}
		}

			public function get_datamtk($id)
			{	
				$data = $this->koneksi->get_info('matakuliah', 'idmatakuliah', $id);
				if (!empty($data)) {
					return $data;
				}
			}

			public function tambah_datamtk($fields = array())
			{
				if ($this->koneksi->insert('matakuliah', $fields)) return true;
				else return false;

			}

			public function edit_datamtk($fields = array(),$id)
			{
				if ($this->koneksi->update('matakuliah', $fields,'id',$id)) return true;
				else return false;

			}

			public function deletedatamtk($id)
			{

				if ($this->koneksi->delete('matakuliah','id', $id)) return true;
				else return false;
			}



		public function get_angkatan()
		{	
			$data = $this->koneksi->get_info('angkatan');
			if (!empty($data)) {
				return $data;
			}
		}

		public function tambah_dataakt($fields = array())
		{
			if ($this->koneksi->insert('angkatan', $fields)) return true;
			else return false;

		}

		public function edit_dataakt($fields = array(),$id)
		{
			if ($this->koneksi->update('angkatan', $fields,'id',$id)) return true;
			else return false;

		}

		public function deletedataakt($id)
		{
			if ($this->koneksi->delete('angkatan','id', $id)) return true;
			else return false;
		}

		public function get_mhs()
		{	
			$data = $this->koneksi->ambil_data('mahasiswa');
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_datamhs($username)
		{
			return $this->koneksi->get_info('mahasiswa', 'NIM', $username);
		}

		public function tambah_datamhs($fields = array())
		{
			if ($this->koneksi->insert('mahasiswa', $fields)) return true;
			else return false;

		}

		public function edit_datamhs($fields = array(),$id)
		{
			if ($this->koneksi->update('mahasiswa', $fields,'id',$id)) return true;
			else return false;

		}
		
		public function deletedatamhs($id)
		{
			if ($this->koneksi->delete('mahasiswa','id', $id)) return true;
			else return false;
		}

		public function get_jenisujian()
		{	
			$data = $this->koneksi->ambil_data('jenisujian');
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_ujiansusulan()
		{	
			$data = $this->koneksi->ambil_data('ujiansusulan');
			if (!empty($data)) {
				return $data;
			}
		}
		
		public function tambahujiansusulan($fields = array())
		{
			if ($this->koneksi->insert('ujiansusulan', $fields)) return true;
			else return false;

		}

		public function get_datajenisujian($id)
		{	
			$data = $this->koneksi->get_info('jenisujian','id',$id);
			if (!empty($data)) {
				return $data;
			}
		}

		public function tambah_dataujian($fields = array())
		{
			if ($this->koneksi->insert('jenisujian', $fields)) return $return;
			else return false;

		}

		public function edit_dataujian($fields = array(),$id)
		{
			if ($this->koneksi->update('jenisujian', $fields,'id',$id)) return true;
			else return false;

		}
		
		public function deletedataujian($id)
		{
			if ($this->koneksi->delete('jenisujian','id', $id)) return true;
			else return false;
		}

		

		public function get_datajadwalujian($angkatan)
		{	
			$data = $this->koneksi->ambil_data('jadwalujian', 'angkatan', $angkatan);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_dataskajar($ta)
		{	
			$data = $this->koneksi->ambil_data('skajar','tahunajaran',$ta);
			if (!empty($data)) {
				return $data;
			}
		}

		public function deletedataskajarwhereid($id)
		{
			if ($this->koneksi->delete('skajar','id', $id)) return true;
			else return false;
		}

		public function tambahjadwalujian($fields = array())
		{

			if ($this->koneksi->insert('jadwalujian', $fields)) return true;
			else return false;

		}

		public function tambahjadwalujianmtk($fields = array())
		{
			// print_r($fields);
			if ($this->koneksi->insert('jadwalujianmatakuliah', $fields)) return true;
			else return false;

		}

		public function edit_datajadwalmatakuliah($fields = array(),$id)
		{

			if ($this->koneksi->update('jadwalujianmatakuliah', $fields,'id',$id)) return true;
			else return false;

		}

		public function getdatajadwalujianmtk($id)
		{	
			// print_r($id);
			// die();
			$data = $this->koneksi->ambil_datashort('jadwalujianmatakuliah', 'idjenisujian', $id, 'ORDER', 'id');
			if (!empty($data)) {
				return $data;
			}
		}

		public function getdatajadwalujianmtkwhereidjadwal($id)
		{	
			// print_r($id);
			// die();
			$data = $this->koneksi->get_info('jadwalujianmatakuliah', 'id', $id);
			if (!empty($data)) {
				return $data;
			}
		}

		public function getjadwalujianmtk()
		{	
			$data = $this->koneksi->ambil_data('jadwalujianmatakuliah');
			if (!empty($data)) {
				return $data;
			}
		}

		public function getjadwalujianmtkwhereidjenisujian($id)
		{	
			// print_r($id);
			// die();
			$data = $this->koneksi->ambil_data('jadwalujianmatakuliah','idjenisujian',$id);
			if (!empty($data)) {
				return $data;
			}
		}

		public function deletedataujianmatakuliah($id)
		{
			if ($this->koneksi->delete('jadwalujianmatakuliah','id', $id)) return true;
			else return false;
		}

		public function get_dataskajarincrud($ta)
		{	
			$data = $this->koneksi->ambil_datashort('skajar','','','GROUP',$ta);
			if (!empty($data)) {
				return $data;
			}
		}

		public function get_dataskajarwhid($ta)
		{	
			$data = $this->koneksi->ambil_datashort('skajar','tahunajaran',$ta,'ORDER','tahunajaran');
			if (!empty($data)) {
				return $data;
			}
		}

		public function skajarthajaran($ta)
		{	
			$data = $this->koneksi->ambil_data('skajar','tahunajaran',$ta);
			if (!empty($data)) {
				return $data;
			}
		}

		public function tambah_dataskajar($fields = array())
		{
			// echo "<pre>";
			// print_r($fields);
			// die();
			if ($this->koneksi->insert('skajar', $fields)) return true;
			else return false;

		}

		public function edit_datadosensk($fields = array(),$id)
		{
			// echo "<pre>";
			// print_r($fields);
			if ($this->koneksi->update('skajar', $fields,'id',$id)) return true;
			else return false;

		}


	}
 ?>