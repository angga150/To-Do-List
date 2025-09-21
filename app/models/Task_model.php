<?php 

class Task_model {
    private $table = 'tasks';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllTask(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getTaskById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id' );
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahTask($data) {
        $query = "INSERT INTO tasks (title, description, priority) VALUES
            (:title, :description, :priority)";

            $this->db->query($query);
            $this->db->bind('title', $data['title']);
            $this->db->bind('description', $data['description']);
            $this->db->bind('priority', $data['priority']);

            $this->db->execute();

            return $this->db->rowCount();

    }

    public function hapusTask($id) {
        $query = "DELETE FROM tasks WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateTask($data) {
        $query = "UPDATE tasks 
                  SET title = :title, description = :description, priority = :priority 
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('priority', $data['priority']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

}