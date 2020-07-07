<?php
    //vista comun para todos los servicios, encargada de mostrar json y manejar codigo de respuestas
    class APIview{
        public function response($data, $status) {
            header("Content-Type: application/json"); //avisa que devuelve json
            header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
            echo json_encode($data);
        }
        //segun el codigo, esta funcion devuelve un mensaje asociado a ese codigo de respuesta
        private function _requestStatus($code){
            $status = array(
            200 => "OK",
            404 => "Not found",
            500 => "Internal Server Error"
            );
            return (isset($status[$code]))? $status[$code] : $status[500];
        }
}

