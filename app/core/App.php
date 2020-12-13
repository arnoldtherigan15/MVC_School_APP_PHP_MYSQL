<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        // var_dump(($url));
        // echo "masuk";
        // pengecekan controller ada atau tidak
        if(isset($url[0]) && file_exists('../app/controllers/'. $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../app/controllers/'. $this->controller . '.php';
        // biar bisa pake methodnya, makanya di buat instance baru
        $this->controller = new $this->controller;
        // pengecekan method di controller itu ada atau tidak
        if(isset($url[1])) {
            if(method_exists($this->controller,$url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // pengecekan kalau ada params atau tidak
        if(!empty($url)) {
            // index dari url yg di unset itu masih yg lama, makanya harus
            // di set dari 0 lagi pake array_values
            $this->params = array_values(($url));
        }

        // jalankan controller dengan method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method],$this->params);
    }
    public function parseURL() {
        if(isset($_GET["url"])) {
            $url = rtrim($_GET["url"],"/");
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}
?>