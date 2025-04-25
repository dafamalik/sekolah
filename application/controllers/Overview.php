<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller
{
  public function index()
	{
		$data['title'] = "Project Sekolah";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/topbar');
		$this->load->view('main/index');
    $this->load->view('templates/footer');
	}

  public function schoolVideo() {
		$data['title'] = "Kumpulan Video";
		$this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/topbar');
		$this->load->view('main/gallery/videoPages');
    $this->load->view('templates/footer');
	}

  public function studentActivities() {
		$data['title'] = "Kumpulan Video";
		$this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/topbar');
		$this->load->view('main/gallery/gallery');
    $this->load->view('templates/footer');
	}
}