<?php

namespace TodoList\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserNameNotFoundException;
use Symfony\Component\Security\Core\User\UnsupportUserException;
use TodoList\DAO\DAO;
use TodoList\Domain\User;

class UserDAO extends DAO implements UserProviderInterface {


    

    /**
     * Saves a user into the database
     *
     * @param TodoList\Domain\User $user The user to save
     */
    public function save($user) {
        $userData = array(
            'user_name'     => $user->getUsername(),
            'user_email'    => $user->getEmail(),
            'user_password' => $user->getPassword(),
            'user_salt'     => $user->getSalt(),
            'user_role'     => $user->getRole()
        );
        if($user->getId()){
            //User already in the db : Update it 
            $this->getDb()->update('t_user', $userData, array(
                'user_id' => $user->getId()
            ));
        } else {
            //User not in the db : Insert it 
            $this->getDb()->insert('t_user', $userData);
            $userId = $this->getDb()->lastInsertId();
            $user->setId($userId);
        }
    }

    /**
     * @inheritDoc
     */ 
    public function loadUserByUsername($username){
         $sql = "SELECT * FROM t_user WHERE user_name = ?";
         $row = $this->getDb()->fetchAssoc($sql, array($username));
         
         if($row){
            return $this->buildDomainObject($row);
         } else {
             throw new \Exception('No user matching name : '.$username);
         }
     }

    /**
     * @inehritDoc
     */ 
    public function refreshUser(UserInterface $user){
        $class = get_class($user);
        if(!$this->supportsClass($class)){
            throw new UnsupportedUserException(sprintf('Instance of "%s" are not supported', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * @inheritDoc
     */
    public function supportsClass($class){
        return "TodoList\Domain\User" === $class;
    } 


    protected function buildDomainObject(array $row){
        $user = new User();
        $user->setId($row['user_id']);
        $user->setUsername($row['user_name']);
        $user->setEmail($row['user_email']);
        $user->setSalt($row['user_salt']);
        $user->setPassword($row['user_password']);
        $user->setRole($row['user_role']);
        return $user;
    }
}