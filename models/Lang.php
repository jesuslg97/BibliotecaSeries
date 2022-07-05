<?php
    class Lang {
        private $id;
        private $name;
        private $iso;

        public function __construct($idLang, $nameLang,$isoLang)
        {
            $this->id = $idLang;
            $this->name = $nameLang;
            $this->iso = $isoLang;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        public function getIso(){

            return $this->iso;
        }

        public function setIso($iso){

            $this->iso = $iso;
        }


    }
?>

