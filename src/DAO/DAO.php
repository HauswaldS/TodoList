<?php

namespace TodoList\DAO;

use Doctrine\DBAL\Connection;

abstract class DAO {
    private $db;

    public function __construct(Connection $db){
        $this->db = $db;
    }

    public function getDb(){
        return $this->db;
    }

    protected abstract function buildDomainObject(array $row);
}