<?php
    class Language {
        private $id;
        private $name;
        private $ISOcode;

        public function __construct($idLanguage, $nameLanguage,$ISOcodeLanguage)
        {
            $this->id = $idLanguage;
            $this->name = $nameLanguage;
            $this->ISOcode = $ISOcodeLanguage;
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

            return $this->ISOcode;
        }

        public function setIso($ISOcode){

            $this->ISOcode = $ISOcode;
        }


    }
?>

