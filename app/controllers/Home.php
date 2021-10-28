<?php

class Home extends Controller
{
    public function index()
    {
        $data = [
            "judul" => "Home",
            "nama" => $this->model("UserModel")->getUser(),
        ];

        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer");
    }
}
