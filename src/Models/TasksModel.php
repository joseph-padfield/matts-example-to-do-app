<?php

namespace App\Models;

use PDO;

class TasksModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getUncompletedTasks()
    {
        $query = $this->db->prepare('SELECT * FROM `tasks` WHERE `done` = 0 ORDER BY `created` DESC');
        $query->execute();
        return $query->fetchAll();
    }

    public function getCompletedTasks()
    {
        $query = $this->db->prepare('SELECT * FROM `tasks` WHERE `done` = 1 ORDER BY `created` DESC');
        $query->execute();
        return $query->fetchAll();
    }

    public function addTask(string $message)
    {
       $query = $this->db->prepare('INSERT INTO `tasks` (`message`) VALUES (:message)') ;
       $query->execute(['message'=>$message]);
    }

    public function markAsDone($id)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `done` = 1 WHERE `id` = :id');
        $query->execute(['id'=>$id]);
    }

    public function deleteTask($id)
    {
        $query = $this->db->prepare('DELETE FROM `tasks` WHERE `id` = :id');
        $query->execute(['id'=>$id]);
    }

    public function getTaskById($id)
    {
        $query = $this->db->prepare('SELECT * FROM `tasks` WHERE `id` = :id');
        $query->execute(['id'=>$id]);
        return $query->fetch();
    }

    public function updateTask($id, $message)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `message` = :message WHERE `id` = :id');
        $query->execute(['id'=>$id, 'message'=>$message]);
    }
}