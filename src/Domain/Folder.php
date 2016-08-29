<?php

namespace TodoList\Domain;

class Folder {

    /**
     * Folder id 
     *
     * @var integer
     */
     private $id;
     
     /**
      * Folder title
      *
      * @var string
      */
      private $title;

      /**
       * Folder type
       * Values : PRIVATE, WORK
       *
       * @var string 
       */
       private $type;

      /**
       * Folder user id 
       *
       * @var integer 
       */
       private $userId;
       
       public function setId($id){
           $this->id = $id;
       }

       public function getId(){
           return $this->id;
       }

       public function setTitle($title){
           $this->title = $title;
       }

       public function getTitle(){
           return $this->title;
       }

       public function getType(){
           return $this->type;
       }

       public function setType($type){
           $this->type = $type;
       }

       public function setUserId($userId){
           $this->userId = $userId;
       }

       public function getUserId(){
           return $this->userId;
       }
}