<?php
    class Serie {
        private $id;
        private $title;
        private $platform;
        private $director;

        public function __construct($idSerie,$titleSerie,$platformSerie,$directorSerie)
        {
            $this->id = $idSerie;
            $this->title  = $titleSerie;
            $this->platform  = $platformSerie;
            $this->director  = $directorSerie;

            
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
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $name
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function getPlatform(){

            return $this->platform;
        }

        public function setPlatform($platform){

            $this->platform = $platform;
        }

        public function getDirector(){

            return $this->director;
        }

        public function setDirector($director){

            $this->director = $director;
        }

    }
?>

