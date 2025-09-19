<?php

class Home extends Controller {
    public function index(){
        $data['judul'] = 'To-Do-List';
        $data['task'] = $this->model('Task_model')->getAllTask();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

     public function tambah() {
        if( $this->model('Task_model')->tambahTask($_POST) > 0  ) {
            header('Location: ' . BASEURL . 'home');
            exit;
        } else {
            header('Location: ' . BASEURL . 'home');
            exit;
        }
    }

}