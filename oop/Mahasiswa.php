<?php
    namespace OOP;
    use kegiatan;

    class Mahasiswa extends orang implements kegiatan{
        private string $nim;

        public function setNim($nim){
            $this->nim = $nim;
        }

        public function getNim(){
            return $this->nim;
        }

        public function tampilData(){
            return "ini data mahasiswa dengan nim". $this->getNim();
        }

        public function tambahData(){

        }

        public function hapusData(){

        }
    }
?>