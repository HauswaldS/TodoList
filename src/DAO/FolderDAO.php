<?php 

namespace TodoList\DAO;

use TodoList\DAO\DAO;
use TodoList\Domain\Folder;

class FolderDAO extends DAO {


    /**
     * Insert/Update a folder in the database
     *
     *@param TodoList\Domain\Folder $folder The folder to save
     */
    public function save($folder){
        $folderData = array(
            'folder_title' => $folder->getTitle(),
            'folder_type'  => $folder->getType(),
            'user_id'      => $folder->getUserId() 
        );
        if($folder->getId()){
            //Folder already in the db : Update it 
            $this->getDb()->update('t_folder', $folderData, array(
                'folder_id' => $folder-getId()
            ));
        } else {
            // Folder isn't in the db : Insert it 
            $this->getDb()->update('t_folder', $folderData);
            $folderId = $this->getDb()->lastInsertId();
            $folder->setId($folderId);
        }
    }

    public function buildDomainObject($row){
        $folder = new Folder();
        $folder->setId($row['folder_id']);
        $folder->setTitle($row['folder_title']);
        $folder->setUserId($row['user_id']);
        return $folder;
    }    
}