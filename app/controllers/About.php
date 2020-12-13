<?php 
class About extends Controller {
    public function index($name = "default name") {
        $data["name"] = $name;
        $data["title"] = "About Page";
        $this->view("/template/header", $data);
        $this->view("about/index", $data);
        $this->view("/template/footer");
    }

    public function page() {
        $data["title"] = "My Page";
        $this->view("/template/header", $data);
        $this->view("about/page");
        $this->view("/template/footer");
    }
}