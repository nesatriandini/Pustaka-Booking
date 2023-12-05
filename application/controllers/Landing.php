<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }

    public function index()
    {
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $this->load->view('index',$data);
    }

    public function detailBuku()
    {
        
        $this->load->view('detailbuku');
    }


}
