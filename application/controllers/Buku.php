<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Buku extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Data Buku';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['buku'] = $this->ModelBuku->getBuku()->result_array();
		$data['kategori'] = $this->ModelBuku->getKategori()->result_array();

		$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', ['required' => 'Judul Buku harus diisi','min_length' => 'Judul buku terlalu pendek']);
		$this->form_validation->set_rules('id_kategori', 'Kategori','required', ['required' => 'Nama pengarang harus diisi',]);
		$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required|min_length[3]', ['required' => 'Nama pengarang harus diisi','min_length' => 'Nama pengarang terlalu pendek']);
		$this->form_validation->set_rules('penerbit', 'NamaPenerbit', 'required|min_length[3]', ['required' => 'Nama penerbit harus diisi','min_length' => 'Nama penerbit terlalu pendek']);
		$this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit','required|min_length[3]|max_length[4]|numeric', ['required' => 'Tahun terbit harus diisi','min_length' => 'Tahun terbit terlalu pendek','max_length' => 'Tahun terbit terlalu panjang','numeric' => 'Hanya boleh diisi angka']);
		$this->form_validation->set_rules('isbn', 'Nomor ISBN','required|min_length[3]|numeric', ['required' => 'Nama ISBN harus diisi','min_length' => 'Nama ISBN terlalu pendek','numeric' => 'Yang anda masukan bukan angka']);
		$this->form_validation->set_rules('stok', 'Stok','required|numeric', ['required' => 'Stok harus diisi','numeric' => 'Yang anda masukan bukan angka']);

		//konfigurasi sebelum gambar diupload
		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size'] = 3000;
		//$config['max_width'] = '1024';
		//$config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();

		$this->load->library('upload', $config);
		if ($this->form_validation->run() == false) {
			$this->load->view('_part/tmp_head',$data);
			$this->load->view('_part/tmp_sidebar',$data);
			$this->load->view('_part/tmp_topbar',$data);
			$this->load->view('buku/buku',$data);
			$this->load->view('_part/tmp_footer_v');
			$this->load->view('_part/tmp_footer');
		} else {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				$gambar = $image['file_name'];
			} else {
				$gambar = '';
			}

			$data = [
				'judul_buku' => $this->input->post('judul_buku',true),
				'id_kategori' => $this->input->post('id_kategori',true),
				'pengarang' => $this->input->post('pengarang',true),
				'penerbit' => $this->input->post('penerbit', true),
				'tahun_terbit' => $this->input->post('tahun_terbit', true),
				'isbn' => $this->input->post('isbn', true),
				'stok' => $this->input->post('stok', true),
				'dipinjam' => 0,
				'dibooking' => 0,
				'image' => $gambar
			];

			$this->ModelBuku->simpanBuku($data);
				redirect('buku');
		}
	}

	public function ubahBuku($id)
	{
		// ID Petugas
		$id_buku = htmlspecialchars($id);

		$cek_data = $this->db->get_where('buku', ['id' => $id_buku])->row_array();

		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

		if (!empty($cek_data)) :

			$data['judul'] = 'Ubah Data Buku';
			$data['buku'] = $cek_data;

			$kategori = $this->ModelBuku->joinKategoriBuku(['buku.id' => $this->uri->segment(3)])->result_array();

			$data['kategori'] = $this->ModelBuku->getKategori()->result_array();

			$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', ['required' => 'Judul Buku harus diisi','min_length' => 'Judul buku terlalu pendek']);
			$this->form_validation->set_rules('kategori', 'Kategori Buku', 'required', ['required' => 'Kategori Buku harus diisi']);
		 	$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required|min_length[3]', ['required' => 'Nama pengarang harus diisi','min_length' => 'Nama pengarang terlalu pendek']);
		 	$this->form_validation->set_rules('penerbit', 'NamaPenerbit', 'required|min_length[3]', ['required' => 'Nama penerbit harus diisi','min_length' => 'Nama penerbit terlalu pendek']);
		 	$this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit','required|min_length[3]|max_length[4]|numeric', ['required' => 'Tahun terbit harus diisi','min_length' => 'Tahun terbit terlalu pendek','max_length' => 'Tahun terbit terlalu panjang','numeric' => 'Hanya boleh diisi angka']);
		 	$this->form_validation->set_rules('isbn', 'Nomor ISBN','required|min_length[3]|numeric', ['required' => 'Nama ISBN harus diisi','min_length' => 'Nama ISBN terlalu pendek','numeric' => 'Yang anda masukan bukan angka']);
		 	$this->form_validation->set_rules('stok', 'Stok','required|numeric', ['required' => 'Stok harus diisi','numeric' => 'Yang anda masukan bukan angka']);

		 	//konfigurasi sebelum gambar diupload
		 	$config['upload_path'] = './assets/img/upload/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = 3000;
			//$config['max_width'] = '1024';
			//$config['max_height'] = '1000';
			$config['file_name'] = 'img' . time();

		 	//memuat atau memanggil library upload
		 	$this->load->library('upload', $config);

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('_part/tmp_head',$data);
		 		$this->load->view('_part/tmp_sidebar',$data);
		 		$this->load->view('_part/tmp_topbar',$data);
		 		$this->load->view('buku/ubah_buku',$data);
		 		$this->load->view('_part/tmp_footer_v');
		 		$this->load->view('_part/tmp_footer');
			else :

				if ($this->upload->do_upload('image')) {
					$image = $this->upload->data();
					unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
					$gambar = $image['file_name'];
				} else {
					$gambar = $this->input->post('old_pict', TRUE);
				}

					$params = [
						'judul_buku'			=> htmlspecialchars($this->input->post('judul_buku', TRUE)),
						'pengarang'			=> htmlspecialchars($this->input->post('pengarang', TRUE)),
						'id_kategori'			=> htmlspecialchars($this->input->post('kategori', TRUE)),
						'penerbit'			=> htmlspecialchars($this->input->post('penerbit', TRUE)),
						'tahun_terbit'			=> htmlspecialchars($this->input->post('tahun_terbit', TRUE)),
						'isbn'			=> htmlspecialchars($this->input->post('isbn', TRUE)),
						'stok'			=> htmlspecialchars($this->input->post('stok', TRUE)),
						'image'			=> $gambar
					];

					$resp = $this->db->update('buku', $params, ['id' => $id_buku]);

					if ($resp) :
						$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
					Berhasil diubah
					</div>');

						redirect('Buku');
					else :
						$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Gagal diubah
					</div>');

						redirect('Buku/ubahBuku');
					endif;

				endif;

		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Data tidak ada
				</div>');

			redirect('buku');
		endif;
	}

	// public function ubahBuku()
	// {
	// 	$data['judul'] = 'Ubah Data Buku';
    //     $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    //     $data['buku'] = $this->ModelBuku->bukuWhere(['id' => $this->uri->segment(3)])->row_array();
    //     $kategori = $this->ModelBuku->joinKategoriBuku(['buku.id' => $this->uri->segment(3)])->result_array();
        
    //     foreach ($kategori as $k) 
    //     {
    //         $data['id'] = $k['id_kategori'];
    //         $data['k'] = $k['kategori'];
    //     }
        
    //     $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
		

	// 	$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', ['required' => 'Judul Buku harus diisi','min_length' => 'Judul buku terlalu pendek']);
	// 	$this->form_validation->set_rules('id_kategori', 'Kategori','required', ['required' => 'Nama pengarang harus diisi',]);
	// 	$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required|min_length[3]', ['required' => 'Nama pengarang harus diisi','min_length' => 'Nama pengarang terlalu pendek']);
	// 	$this->form_validation->set_rules('penerbit', 'NamaPenerbit', 'required|min_length[3]', ['required' => 'Nama penerbit harus diisi','min_length' => 'Nama penerbit terlalu pendek']);
	// 	$this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit','required|min_length[3]|max_length[4]|numeric', ['required' => 'Tahun terbit harus diisi','min_length' => 'Tahun terbit terlalu pendek','max_length' => 'Tahun terbit terlalu panjang','numeric' => 'Hanya boleh diisi angka']);
	// 	$this->form_validation->set_rules('isbn', 'Nomor ISBN','required|min_length[3]|numeric', ['required' => 'Nama ISBN harus diisi','min_length' => 'Nama ISBN terlalu pendek','numeric' => 'Yang anda masukan bukan angka']);
	// 	$this->form_validation->set_rules('stok', 'Stok','required|numeric', ['required' => 'Stok harus diisi','numeric' => 'Yang anda masukan bukan angka']);

		
	// 	if ($this->form_validation->run() == false) {
	// 		$this->load->view('_part/tmp_head',$data);
	// 		$this->load->view('_part/tmp_sidebar',$data);
	// 		$this->load->view('_part/tmp_topbar',$data);
	// 		$this->load->view('buku/ubah_buku',$data);
	// 		$this->load->view('_part/tmp_footer_v');
	// 		$this->load->view('_part/tmp_footer');
	// 	} else {
			
	// 		$data = [
	// 			'judul_buku' => $this->input->post('judul_buku',true),
	// 			'id_kategori' => $this->input->post('id_kategori',true),
	// 			'pengarang' => $this->input->post('pengarang',true),
	// 			'penerbit' => $this->input->post('penerbit', true),
	// 			'tahun_terbit' => $this->input->post('tahun_terbit', true),
	// 			'isbn' => $this->input->post('isbn', true),
	// 			'stok' => $this->input->post('stok', true)
	// 		];

	// 		$this->ModelBuku->updateBuku($data, ['id' => $this->input->post('id')]);
	// 			redirect('buku');
            
	// 	}
	// }

	// public function ubahBuku()
	// {

	// 	$data['judul'] = 'Ubah Data Buku';
	// 	$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
	// 	$where = ['id' =>  $this->uri->segment(3)];
    //     $data['buku'] = $this->ModelBuku->bukuWhere($where)->row_array();

    //     $wherekat = ['buku.id_kategori' =>  $this->uri->segment(3)];
	// 	$kategori = $this->ModelBuku->joinKategoriBuku($wherekat)->result_array();

	// 	foreach ($kategori as $k) {
	// 		$data['id'] = $k['id_kategori'];
	// 		$data['k'] = $k['kategori'];
	// 	}
		

	// 	$data['kategori'] = $this->ModelBuku->getKategori()->result_array();

	// 	$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', ['required' => 'Judul Buku harus diisi','min_length' => 'Judul buku terlalu pendek']);
	// 	$this->form_validation->set_rules('id_kategori', 'Kategori','required', ['required' => 'Nama pengarang harus diisi']);
	// 	$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required|min_length[3]', ['required' => 'Nama pengarang harus diisi','min_length' => 'Nama pengarang terlalu pendek']);
	// 	$this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required|min_length[3]', ['required' => 'Nama penerbit harus diisi','min_length' => 'Nama penerbit terlalu pendek']);
	// 	$this->form_validation->set_rules('tahun', 'Tahun Terbit','required|min_length[3]|max_length[4]|numeric', ['required' => 'Tahun terbit harus diisi','min_length' => 'Tahun terbit terlalu pendek','max_length' => 'Tahun terbit terlalu panjang','numeric' => 'Hanya boleh diisi angka']);
	// 	$this->form_validation->set_rules('isbn', 'Nomor ISBN','required|min_length[3]|numeric', ['required' => 'Nama ISBN harus diisi','min_length' => 'Nama ISBN terlalu pendek','numeric' => 'Yang anda masukan bukan angka']);
	// 	$this->form_validation->set_rules('stok', 'Stok','required|numeric', ['required' => 'Stok harus diisi','numeric' => 'Yang anda masukan bukan angka']);

	// 	//konfigurasi sebelum gambar diupload
	// 	$config['upload_path'] = './assets/img/upload/';
	// 	$config['allowed_types'] = 'jpg|png|jpeg';
	// 	$config['max_size'] = '3000';
	// 	$config['max_width'] = '1024';
	// 	$config['max_height'] = '1000';
	// 	$config['file_name'] = 'img' . time();

	// 	//memuat atau memanggil library upload
	// 	$this->load->library('upload', $config);

	// 	if ($this->form_validation->run() == false) {
	// 		$this->load->view('_part/tmp_head',$data);
	// 		$this->load->view('_part/tmp_sidebar',$data);
	// 		$this->load->view('_part/tmp_topbar',$data);
	// 		$this->load->view('buku/ubah_buku',$data);
	// 		$this->load->view('_part/tmp_footer_v');
	// 		$this->load->view('_part/tmp_footer');
	// 	} else {
	// 		if ($this->upload->do_upload('image')) {
	// 			$image = $this->upload->data();
	// 			unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
	// 			$gambar = $image['file_name'];
	// 		} else {
	// 			$gambar = $this->input->post('old_pict', TRUE);
	// 		}

	// 		$data = [
	// 			'judul_buku' => $this->input->post('judul_buku',true),
	// 			'id_kategori' => $this->input->post('id_kategori',true),
	// 			'pengarang' => $this->input->post('pengarang',true),
	// 			'penerbit' => $this->input->post('penerbit',true),
	// 			'tahun_terbit' => $this->input->post('tahun_terbit',true),
	// 			'isbn' => $this->input->post('isbn',true),
	// 			'stok' => $this->input->post('stok',true),
	// 			'image' => $gambar
	// 		];

	// 		$this->ModelBuku->updateBuku(['id' => $this->input->post('id')],$data);
 	// 		redirect('buku');
 	// 	}
	// }


	public function hapusBuku($id)
	{
		$where = ['id' => $this->uri->segment(3)];
		$this->ModelBuku->hapusBuku($where);
		redirect('buku');
	}

	public function kategori()
	{
		$data['judul'] = 'Kategori Buku';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->ModelBuku->getKategori()->result_array();

		$this->form_validation->set_rules('kategori', 'Kategori','required', ['required' => 'Judul Buku harus diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('_part/tmp_head',$data);
			$this->load->view('_part/tmp_sidebar',$data);
			$this->load->view('_part/tmp_topbar',$data);
			$this->load->view('buku/kategori',$data);
			$this->load->view('_part/tmp_footer_v');
			$this->load->view('_part/tmp_footer');
		} else {
			$data = [
				'kategori' => $this->input->post('kategori')
			];

			$this->ModelBuku->simpanKategori($data);
			redirect('buku/kategori');
		}
	}

	public function hapusKategori($id)
	{
		$where = ['id' => $this->uri->segment(3)];
		$this->ModelBuku->hapusKategori($where);
		redirect('buku/kategori');
	}

	public function ubahKategori()
    {
        $data['judul'] = 'Ubah Kategori Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $where = ['id' =>  $this->uri->segment(3)];
        $data['kategori'] = $this->ModelBuku->kategoriWhere($where)->row_array();
        
        
        $this->form_validation->set_rules(
            'kategori', 
            'Kategori',
            'required', [
                'required' => 'Judul Buku harus diisi'
        ]);

        if ($this->form_validation->run() == false) 
        {
            $this->load->view('_part/tmp_head',$data);
			$this->load->view('_part/tmp_sidebar',$data);
			$this->load->view('_part/tmp_topbar',$data);
			$this->load->view('buku/ubah_kategori',$data);
			$this->load->view('_part/tmp_footer_v');
			$this->load->view('_part/tmp_footer');
        } else {
            $data = ['kategori' => $this->input->post('kategori')];
            $this->ModelBuku->updateKategori(['id' => $this->input->post('id')], $data);
            redirect('buku/kategori');
        }
    }
}