<?php
    include 'ModelMhs.php';
    class controllerMhs {
        public function index() {
            session_start();
            $model = new ModelMhs();
            $data = $model->tampilData();
            $_SESSION['dataMhs'];
            include_once'viewMhs.php';
        }

        public function create() {

        }
    
        public function update() {

        }

        public function delete() {

        }

    }

?>