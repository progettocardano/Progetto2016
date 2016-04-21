<?php
    class User {
        public static $guest = 0;
        public static $studente = 1;
        public static $docente = 2;
        
        private $state;
        
        function __construct() {
            $this->state = self::$guest;
        }
        
        function isGuest() {
            return $this->state == self::$guest;
        }
        
        function isStudente() {
            return $this->state == self::$studente;
        }
        
        function isDocente() {
            return $this->state == self::$docente;
        }
        
        function is($state) {
            return $this->state == self::$state;
        }
        
        function setState($state) {
            $this->state = $state;
        }
    }
?>