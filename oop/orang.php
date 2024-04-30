<?php
    namespace OOP;
    class orang {
        private string $nama;
        
        public function setNama($nm): void { //method
            $this->nama = $nm;
        }

        public function getNama(): string {
            return $this->nama; 
        }
    }

?>