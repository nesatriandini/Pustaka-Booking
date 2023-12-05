<?php
class Blocked extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		cek_login();
	}

	// List all your items
	public function index()
	{
        $this->load->view('blok');
	}
}