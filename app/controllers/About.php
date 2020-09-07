<?php
require_once('../app/core/Controller.php');

class About extends Controller
{
    public function index($nama = "Urffan", $pekerjaan = "Programmer", $umur = 18)
    {
        $data["nama"]       = $nama;
        $data["pekerjaan"]  = $pekerjaan;
        $data["umur"]       = $umur;
        $data['judul']      = 'About';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['judul']  = 'Pages';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}