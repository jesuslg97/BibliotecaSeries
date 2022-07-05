<?php
    class Actor {
        private $id;
        private $name;
        private $surname;
        private $birth_date;
        private $from;

        public function __construct($idActor, $nameActor,$surnameActor,$birthActor,$fromActor)
        {
            $this->id = $idActor;
            $this->name = $nameActor;
            $this->surname = $surnameActor;
            $this->birth_date = $birthActor;
            $this->from = $fromActor;
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

        public function getSurname(){

            return $this->surname;
        }

        public function setSurname($surname){

            $this->surname = $surname;
        }

        public function getBirthDate(){

            return $this->birth_date;
        }

        public function setBirthDate($birth_date){

            $this->birth_date = $birth_date;
        }

        public function getFrom(){

            return $this->from;
        }

        public function setFrom($from){

            $this->from = $from;
        }

    }
?>

