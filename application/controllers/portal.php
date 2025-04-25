<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {
	public function index()
	{
		$data['title'] = "Project Sekolah";
		$this->load->view('templates/header', $data);
		$this->load->view('main/index');
    $this->load->view('templates/footer');
	}
}
