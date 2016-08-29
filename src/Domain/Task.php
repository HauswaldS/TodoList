<?php

namespace TodoList\Domain;

class Task {

    /**
     * Task id 
     *
     * @var integer
     */
     private $id;
     
     /**
      * Task content
      *
      * @var string
      */
      private $content;

      /**
       * Task folder id 
       *
       * @var integer 
       */
       private $folderId;
       
       public function setId($id){
           $this->id = $id;
       }

       public function getId(){
           return $this->id;
       }

       public function setContent($content){
           $this->content = $content;
       }

       public function getContent(){
           return $this->content;
       }

       public function setFolderId($folderId){
           $this->folderId = $folderId;
       }

       public function getFolderId(){
           return $this->folderId;
       }
}