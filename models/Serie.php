<?php
    class Serie {
        private $id;
        private $title;
        private $platform;
        private $director;
        private $actor;
        private $audio;
        private $subtitle;

        public function __construct($idSerie,$titleSerie,$platformSerie,$directorSerie,$actorSerie,$audioSerie,$subtitleSerie)
        {
            $this->id = $idSerie;
            $this->title  = $titleSerie;
            $this->platform  = $platformSerie;
            $this->director  = $directorSerie;
            $this->actor  = $actorSerie;
            $this->audio  = $audioSerie;
            $this->subtitle  = $subtitleSerie;
            
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

        public function getActor(){

            return $this->actor;
        }

        public function setActor($actor){

            $this->actor = $actor;
        }

        public function getAudio(){

            return $this->audio;
        }

        public function setAudio($audio){

            $this->audio = $audio;
        }

        public function getSubtitle(){

            return $this->subtitle;
        }

        public function setSubtitle($subtitle){

            $this->subtitle = $subtitle;
        }

    }
?>

