<?php
    class Director {
        private $id;
        private $name;
        private $surnames;
        private $date;
        private $nationality;

        public function __construct($idActor, $nameActor,$surnamesActor,$datehActor,$nationalityActor)
        {
            $this->id = $idActor;
            $this->name = $nameActor;
            $this->surname = $surnamesActor;
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

        public function setSurname($surnames){

            $this->surnames = $surnames;
        }

        public function getDate(){

            return $this->date;
        }

        public function setDate($date){

            $this->date = $date;
        }

        public function getFrom(){

            return $this->nationality;
        }

        public function setFrom($nationality){

            $this->nationality = $nationality;
        }

    }
?>

