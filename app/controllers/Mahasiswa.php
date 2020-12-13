<?php 
class Mahasiswa extends Controller {
    public function index() {
        $data["title"] = "Mahasiswa Page";
        $data["mahasiswa"] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view("/template/header", $data);
        $this->view("/mahasiswa/index", $data);
        $this->view("/template/footer");
    }

    public function detail($id) {
        $data["title"] = "Mahasiswa Detail";
        $data["mahasiswa"] = $this->model('Mahasiswa_model')->getOneMahasiswa($id);
        $this->view("/template/header", $data);
        $this->view("/mahasiswa/detail", $data);
        $this->view("/template/footer");
    }

    public function add() {
        if($this->model("Mahasiswa_model")->addMahasiswa($_POST) > 0) {
            Flasher::setFlash("Successfuly", "Added", "success");
            header('Location: '. BASEURL .'/Mahasiswa');
            exit;
        } else {
            Flasher::setFlash("Failed", "to be added", "danger");
            header('Location: '. BASEURL .'/Mahasiswa');
            exit;
        }
    }

    public function delete($id) {
        if($this->model("Mahasiswa_model")->deleteMahasiswa($id) > 0) {
            Flasher::setFlash("Successfuly", "Deleted", "success");
            header('Location: '. BASEURL .'/Mahasiswa');
            exit;
        } else {
            Flasher::setFlash("Failed", "to be deleted", "danger");
            header('Location: '. BASEURL .'/Mahasiswa');
            exit;
        }
    }

    public function getDetail() {
        echo json_encode($this->model("Mahasiswa_model")->getOneMahasiswa($_POST["id"]));
    }

    public function edit() {
        if($this->model("Mahasiswa_model")->edit($_POST) > 0) {
            Flasher::setFlash("Successfuly", "Edited", "success");
            header('Location: '. BASEURL .'/Mahasiswa');
            exit;
        } else {
            Flasher::setFlash("Failed", "to be edit", "danger");
            header('Location: '. BASEURL .'/Mahasiswa');
            exit;
        }
    }

    public function search() {
        $data["title"] = "Mahasiswa Page";
        $data["mahasiswa"] = $this->model('Mahasiswa_model')->searchMahasiswa();
        $this->view("/template/header", $data);
        $this->view("/mahasiswa/index", $data);
        $this->view("/template/footer");
    }
}