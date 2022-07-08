<?php
    class Actor {
        private $id;
        private $name;
        private $surnames;
        private $date;
        private $nationality;

        public function __construct($idActor, $nameActor,$surnamesActor,$dateActor,$nationalityActor)
        {
            $this->id = $idActor;
            $this->name = $nameActor;
            $this->surnames = $surnamesActor;
            $this->date = $dateActor;
            $this->nationality = $nationalityActor;
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

        public function getSurnames(){

            return $this->surnames;
        }

        public function setSurnames($surnames){

            $this->surnames = $surnames;
        }

        public function getDate(){

            return $this->date;
        }

        public function setDate($date){

            $this->date = $date;
        }

        public function getNationality(){

            return $this->nationality;
        }

        public function setNationality($nationality){

            $this->nationality = $nationality;
        }

    }
?>

