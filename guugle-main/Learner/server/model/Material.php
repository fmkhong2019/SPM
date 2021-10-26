<?php
    class material{
        private $materialId;
        private $classId;
        private $sectionId;
        private $name;
        private $fileSize;
        private $fileType;
        private $filePath;
        private $link;
        private $completed;

        public function __construct($materialId, $classId, $sectionId, $name, $fileSize, $fileType, $filePath, $link, $completed){
            $this->materialId = $materialId;
            $this->classId = $classId;
            $this->sectionId = $sectionId;
            $this->name = $name;
            $this->fileSize = $fileSize;
            $this->fileType = $fileType;
            $this->filePath = $filePath;
            $this->link = $link;
            $this->completed = $completed;
        }

        public function getMaterialId() {
            return $this->materialId;
        }

        public function getClassId() {
            return $this->classId;
        }

        public function getSectionId() {
            return $this->sectionId;
        }

        public function getName() {
            return $this->name;
        }

        public function getFileSize() {
            return $this->fileSize;
        }

        public function getFileType() {
            return $this->fileType;
        }

        public function getFilePath() {
            return $this->filePath;
        }

        public function getLink() {
            return $this->link;
        }

        public function getCompleted() {
            return $this->completed;
        }


    }
?>