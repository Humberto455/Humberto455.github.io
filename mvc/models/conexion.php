<?php
    class Conexion
    {
        public static function conectar(){
            $link = new PDO("mysql:host=fdb32.awardspace.net;dbname=4136088_phpsqlcourse", "4136088_phpsqlcourse", "Humberto_19228");
            return $link;
        }
    }
