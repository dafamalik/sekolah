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

    public function educaPersonalData() {
        $data['title'] = "Data Tenaga Kependidikan";
        $json_path = FCPATH . 'assets/json/data_pegawai.json';
        $json_content = file_get_contents($json_path);
        $data['dataPegawai'] = json_decode($json_content, true);

		$this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/topbar');
		$this->load->view('main/profile/pegawai', $data);
        $this->load->view('templates/footer');
    }

    public function detailPegawai() {
        $id = $this->input->get('id');
        if ($id) {
        $json_path = FCPATH . 'assets/json/data_pegawai.json';
        $json_content = file_get_contents($json_path);
        $dataPegawai = json_decode($json_content, true);
        $detailPegawai = null;

        foreach ($dataPegawai as $pegawai) {
            if ($pegawai['Id'] == $id) {
                $detailPegawai = $pegawai;
                break;
            }
        }

        if ($detailPegawai) {
            $data['title'] = "Detail Data Tenaga Kependidikan";
            $data['pegawai'] = $detailPegawai; // *** KUNCI: Pastikan Anda mengirimkan $detailPegawai dengan key 'pegawai' ***
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/topbar');
            $this->load->view('main/profile/detailPegawai', $data);
            $this->load->view('templates/footer');
        } else {
            // Handle jika ID tidak ditemukan
            $data['title'] = "Data Pegawai Tidak Ditemukan";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/topbar');
            $this->load->view('errors/html/error_404', $data);
            $this->load->view('templates/footer');
        }
        } else {
            redirect('overview/dataPegawai');
        }
    }

    public function organizationStructur() {
        $data['title'] = "Struktur Organisasi";
		$this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/topbar');
		$this->load->view('main/profile/organizationStructur');
        $this->load->view('templates/footer');
    }

    public function studentData() {
        $data['title'] = "Data Siswa";
        $json_path = FCPATH . 'assets/json/data_siswa.json';
        $json_content = file_get_contents($json_path);
        $data['dataSiswa'] = json_decode($json_content, true);

		$this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/topbar');
		$this->load->view('main/profile/studentData', $data);
        $this->load->view('templates/footer');
    }

    public function detailSiswa() {
        $id = $this->input->get('id');
        if ($id) {
            $json_path = FCPATH . 'assets/json/data_siswa.json';
            $json_content = file_get_contents($json_path);
            $dataSiswa = json_decode($json_content, true);
            $detailSiswa = null;

            foreach ($dataSiswa as $siswa) {
                if ($siswa['Id'] == $id) {
                    $detailSiswa = $siswa;
                    break;
                }
            }

            if ($detailSiswa) {
                $data['title'] = "Detail Siswa";
                $data['siswa'] = $detailSiswa;
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar');
                $this->load->view('templates/topbar');
                $this->load->view('main/profile/detailStudent', $data); // GANTI di sini
                $this->load->view('templates/footer');
            } else {
                $data['title'] = "Data Siswa Tidak Ditemukan";
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar');
                $this->load->view('templates/topbar');
                $this->load->view('errors/html/error_404', $data);
                $this->load->view('templates/footer');
            }
        } else {
            redirect('overview/studentData');
        }
    }

    public function classData() {
        $data['title'] = "Data Kelas";
        $json_path = FCPATH . 'assets/json/data_kelas.json';
        $json_content = file_get_contents($json_path);
        $data['dataKelas'] = json_decode($json_content, true);

		$this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/topbar');
		$this->load->view('main/profile/dataKelas', $data);
        $this->load->view('templates/footer');
    }

    public function FinancialAssStudent() {
        $data['title'] = "Bantuan Dana Untuk Siswa";
		$this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/topbar');
		$this->load->view('main/information/financialAssStudent');
        $this->load->view('templates/footer');
    }

    public function rules() {
        $data['title'] = "Tata Tertib Sekolah";
		$this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/topbar');
		$this->load->view('main/studentship/schoolRules');
        $this->load->view('templates/footer');
    }
}