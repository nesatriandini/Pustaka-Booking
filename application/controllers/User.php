<?php
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Profil Saya';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('_part/tmp_head',$data);
		$this->load->view('_part/tmp_sidebar',$data);
		$this->load->view('_part/tmp_topbar',$data);
		$this->load->view('user/dashboard',$data);
		$this->load->view('_part/tmp_footer_v');
		$this->load->view('_part/tmp_footer');
	}

	public function profil()
	{
		$data['judul'] = 'Profil Saya';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('_part/tmp_head',$data);
		$this->load->view('_part/tmp_sidebar',$data);
		$this->load->view('_part/tmp_topbar',$data);
		$this->load->view('user/profile',$data);
		$this->load->view('_part/tmp_footer_v');
		$this->load->view('_part/tmp_footer');
	}

	public function anggota()
	{
		$data['judul'] = 'Data Anggota';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['anggota'] = $this->db->get('user')->result_array();

		$this->load->view('_part/tmp_head',$data);
		$this->load->view('_part/tmp_sidebar',$data);
		$this->load->view('_part/tmp_topbar',$data);
		$this->load->view('user/anggota',$data);
		$this->load->view('_part/tmp_footer_v');
		$this->load->view('_part/tmp_footer');
	}

	public function ubahProfil()
	{
		$data['judul'] = 'Ubah Profil';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Lengkap','required|trim', [
			'required' => 'Nama tidak Boleh Kosong'
		]);

		if ($this->form_validation->run() == false) {
		$this->load->view('_part/tmp_head',$data);
		$this->load->view('_part/tmp_sidebar',$data);
		$this->load->view('_part/tmp_topbar',$data);
		$this->load->view('user/ubah_profile',$data);
		$this->load->view('_part/tmp_footer_v');
		$this->load->view('_part/tmp_footer');
		} else {
			$nama = $this->input->post('nama', true);
			$email = $this->input->post('email', true);
			//jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['max_size'] = 3000;
				//$config['max_width'] = '1024';
				//$config['max_height'] = '1000';
				$config['file_name'] = 'pro' . time();

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$gambar_lama = $data['user']['image'];
					if ($gambar_lama != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
					}

					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('image', $gambar_baru);
				} else { }
			}

			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
			redirect('user');
		}
	}

	public function hapusUser($id)
	{
		$where = ['id' => $this->uri->segment(3)];
		$this->ModelUser->hapusUser($where);
		redirect('user/anggota');
	}
}