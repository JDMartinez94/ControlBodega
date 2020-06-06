<?php

    class status_uso
    {
        private $id_status_uso;
        private $status_uso; 
        
        public function __construct() {
            ;
        }
        
        function getId_status_uso() {
            return $this->id_status_uso;
        }

        function getStatus_uso() {
            return $this->status_uso;
        }

        function setId_status_uso($id_status_uso) {
            $this->id_status_uso = $id_status_uso;
        }

        function setStatus_uso($status_uso) {
            $this->status_uso = $status_uso;
        }


    }

?>
