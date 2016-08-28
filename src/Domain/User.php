<?php

namespace TodoList\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface {

    /**
     * User id
     *
     * @var integer
     */
     private $id;

     /**
      * User name
      *
      * @var string
      */
      private $username;

      /**
       * User email 
       *
       * @var string
       */
       private $email;
        
      /**
       * User password
       *
       * @var string 
       */
       private $password;

      /**
       * Salt originaly used to encode the password 
       *
       * @var string 
       */
       private $salt;

      /**
       * User role
       * Values : ROLE_USER 
       *
       * @var string
       */
       private $role;

       public function setId($id){
           $this->id = $id;
       }

       public function getId(){
           return $this->id;
       }

       /**
        * @inheritDoc
        */
       public function setUsername($username){
           $this->username = $username;
       } 

       public function getUsername(){
           return $this->username;
       }

       public function setEmail($email){
           $this->email = $email;
       }

       public function getEmail(){
           return $this->email;
       }

       /**
        * @inheritDoc
        */
        public function setPassword($password){
            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }

        /**
         * @inheritDoc
         */
         public function setSalt($salt){
             $this->salt = $salt;
         }

         public function getSalt(){
             return $this->salt;
         }

         /**
          * @inheritDoc
          */
          public function setRole($role){
              $this->role = $role;
          }

          public function getRole(){
              return $this->role;
          }

          public function getRoles(){
              return array($this->getRole());
          }

          /**
           * @inheritDoc
           */
           public function eraseCredentials(){
               
           }
}