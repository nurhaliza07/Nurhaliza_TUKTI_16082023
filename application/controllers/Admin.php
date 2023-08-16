<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('m_admin');
			$this->login_kah();	//Memastikan hanya yang sudah login dapat akses fungsi ini
	    }


	public function login_kah()
	{
		if ( $this->session->has_userdata('username') && $this->session->userdata('id_level')==1 )
			return TRUE; 
		else
		  	redirect(base_url('logout'));    
	}


	public function index()
	{
		$data['judul']	='Selamat Datang Admin';
		$data['page']	='home';
		$data['jml_santri']	=$this->m_umum->jumlah_record_tabel('mhs_nurhaliza');
		$data['jml_guru']	=$this->m_umum->jumlah_record_tabel('ukm_nurhaliza');
		$this->tampil($data);
	}

//============================== MAHASISWA ==============================
	public function mahasiswa()
	{
		$data['judul']='Data Mahasiswa';
		$data['page']='mahasiswa';
		$data['mahasiswa']=$this->m_admin->dt_mahasiswa();
		$this->tampil($data);
	}
	public function mahasiswa_detil($id)
	{
		$data['judul']='Detil Data Mahasiswa';
		$data['page']='mahasiswa_detil';
		$data['d']=$this->m_admin->dt_mahasiswa_detil($id);
		$this->tampil($data);
	}

	public function mahasiswa_tambah()
	{
		$data['judul'] = 'Tambah Data Mahasiswa';
		$data['page'] = 'mahasiswa_tambah';

		$this->form_validation->set_rules(
			'nama',
			'Nama',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('nim', 'Isikan NIM', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Isikan Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Isikan Alamat', 'required');
		

	
		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_mahasiswa_tambah();
			redirect(base_url('admin/mahasiswa'));
		}
	}
	public function mahasiswa_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Data Mahasiswa';
		$data['page'] = 'mahasiswa_edit';
		$this->form_validation->set_rules(
			'nama',
			'Nama',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
	    $this->form_validation->set_rules('nim', 'Isikan NIM', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Isikan Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Isikan Alamat', 'required');
		$data['d'] = $this->m_umum->cari_data('mhs_nurhaliza', 'id_mhs', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_mahasiswa_edit($id);
			redirect(base_url('admin/mahasiswa'));
		}
	}

	public function mahasiswa_hapus($id)
	{
		$this->m_umum->hapus_data('mhs_nurhaliza', 'id_mhs', $id);
		redirect(base_url('admin/mahasiswa'));
	}


//============================== UKM ==============================
	public function ukm()
	{
		$data['judul']='Data UKM';
		$data['page']='ukm';
		$data['ukm']=$this->m_admin->dt_ukm();
		$this->tampil($data);
	}



	public function ukm_tambah()
	{
		$data['judul']='Tambah Data UKM';
		$data['page']='ukm_tambah';

	    $this->form_validation->set_rules('nama_ukm', 'Isikan Nama UKM', 'required');
	    $this->form_validation->set_rules('deskripsi', 'Isikan Deskripsi', 'required');
	  

	    if ($this->form_validation->run() === FALSE)
	    {
			$this->tampil($data);
	    }
	    else
	    {
	        $this->m_admin->ukm_tambah();
	        redirect(base_url('admin/ukm'));
	    }		
	}

	public function ukm_edit($id = FALSE)
	{
		$data['judul'] = 'EDIT data UKM';
		$data['page'] = 'ukm_edit';

		 $this->form_validation->set_rules('nama_ukm', 'Isikan Nama UKM', 'required');
	     $this->form_validation->set_rules('deskripsi', 'Isikan Deskripsi', 'required');
	    $data['d'] = $this->m_umum->cari_data('ukm_nurhaliza', 'id_ukm', $id);
		

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_ukm_edit($id);
			redirect(base_url('admin/ukm'));
		}


	}

	public function ukm_hapus($id)
	{
		$this->m_umum->hapus_data('ukm_nurhaliza','id_ukm',$id);
		redirect(base_url('admin/ukm'));
	}


//==========================Pedaftaran UKM=========================
	public function daftar()
	{
		$data['judul']='Data Anggota';
		$data['page']='daftar';
		$data['daftar']=$this->m_admin->dt_daftar();
		$this->tampil($data);
	}
	public function daftar_detil($id)
	{
		$data['judul']='Detil Data Mahasiswa';
		$data['page']='daftar_detil';
		$data['d']=$this->m_admin->dt_daftar_detil($id);
		$this->tampil($data);
	}

	public function daftar_tambah()
	{
		$data['judul'] = 'Tambah Data Anggota';
		$data['page'] = 'daftar_tambah';

	    $this->form_validation->set_rules('id_mhs', 'Pilih NIM', 'callback_dd_cek');
	
		$this->form_validation->set_rules('id_ukm', 'Pilih UKM', 'callback_dd_cek');
		

		$data['ddmhs'] = $this->m_admin->dropdown_mhs();
		$data['ddukm'] = $this->m_admin->dropdown_ukm();
		

	
		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_daftar_tambah();
			redirect(base_url('admin/daftar'));
		}
	}

	public function daftar_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Data Anggota';
		$data['page'] = 'daftar_edit';
		 $this->form_validation->set_rules('id_mhs', 'Pilih NIM', 'callback_dd_cek');
	
		$this->form_validation->set_rules('id_ukm', 'Pilih UKM', 'callback_dd_cek');
		

		$data['ddmhs'] = $this->m_admin->dropdown_mhs();
		$data['ddukm'] = $this->m_admin->dropdown_ukm();
		$data['d'] = $this->m_umum->cari_data('daftar_nurhaliza', 'id_daftar', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_daftar_edit($id);
			redirect(base_url('admin/daftar'));
		}
	}

	public function daftar_hapus($id)
	{
		$this->m_umum->hapus_data('daftar_nurhaliza', 'id_daftar', $id);
		redirect(base_url('admin/daftar'));
	}



	//============ Tools ===============
	function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
	{
	    if ($str == '-Pilih-') {
	      $this->form_validation->set_message('dd_cek', 'Harus dipilih');
	      return FALSE;
	    } else
	      return TRUE;
	}

	function tampil($data)
	{
		$this->load->view('admin/header',$data);
		$this->load->view('admin/isi');
		$this->load->view('admin/footer');
	}
}



