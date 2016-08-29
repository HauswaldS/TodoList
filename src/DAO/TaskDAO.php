<?php

namespace TodoList\DAO;

use TodoList\DAO\DAO;
use TodoList\Domain\Task;

class TaskDAO extends DAO{

    public function buildDomainObject($row){
        $task = new Task();
        $task->setId($row['task_id']);
        $task->setContent($row['task_content']);
        $task->setFolderId($row['folder_id']);
        return $task;
    }
}