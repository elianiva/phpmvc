<?php

class About extends Controller
{
    public function index(string $nama = "Manusia Bernapas",
                          string $pekerjaan = "Manusia",
                          int    $umur = 20)
    {
        $data = [
            "judul" => "About Me",
            "nama" => $nama,
            "pekerjaan" => $pekerjaan,
            "umur" => $umur,
        ];

        $this->view("templates/header", $data);
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }

    public function page()
    {
        $data = [
            "judul" => "Page",
        ];

        $this->view("templates/header", $data);
        $this->view("about/page", $data);
        $this->view("templates/footer");
    }
}
