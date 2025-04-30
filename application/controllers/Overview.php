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

  public function dataTeacher() {
      $data['title'] = "Data Guru";
      $json_path = FCPATH . 'assets/json/data_guru.json';
      $json_content = file_get_contents($json_path);
      $data['dataGuru'] = json_decode($json_content, true);

		  $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('templates/topbar');
		  $this->load->view('main/profile/guru', $data);
      $this->load->view('templates/footer');
  }

  public function detailGuru() {
    $id = $this->input->get('id');
    if ($id) {
        $json_path = FCPATH . 'assets/json/data_guru.json';
        $json_content = file_get_contents($json_path);
        $dataGuru = json_decode($json_content, true);
        $detailGuru = null;

        foreach ($dataGuru as $guru) {
            if ($guru['Id'] == $id) {
                $detailGuru = $guru;
                break;
            }
        }

        if ($detailGuru) {
            $data['title'] = "Detail Data Guru";
            $data['guru'] = $detailGuru; // *** KUNCI: Pastikan Anda mengirimkan $detailGuru dengan key 'guru' ***
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/topbar');
            $this->load->view('main/profile/detailGuru', $data);
            $this->load->view('templates/footer');
        } else {
            // Handle jika ID tidak ditemukan
            $data['title'] = "Data Guru Tidak Ditemukan";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/topbar');
            $this->load->view('errors/html/error_404', $data);
            $this->load->view('templates/footer');
        }
    } else {
        redirect('overview/dataTeacher');
    }
}
}