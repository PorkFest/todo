<?php

namespace App\Models;

use CodeIgniter\Model;

class TodoModel extends Model {

    protected $table = 'task'; // table that model uses

    protected $allowedFields = ['title', 'description', 'user_id'];

    public function getTodos() {
        $this->table('task');
        $this->select('title, description, firstname, lastname, task.id AS id');
        $this->join('user','user.id = task.user_id');
        $query = $this->get();

        return $query->getResultArray();
        // $this->findAll(); returns all rows
    }

    public function remove($id) {
        $this->where('id',$id);
        $this->delete();
    }
}
?>