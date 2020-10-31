<?php

namespace App\Controllers;

use App\Models\TodoModel;

class Todo extends BaseController
{
    public function index()
    {
        $data['title'] = 'Todo';
        echo view('templates/header');
        echo view('todo/list', $data);
        echo view('templates/footer');

    }
}
?>