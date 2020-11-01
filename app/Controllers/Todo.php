<?php

namespace App\Controllers;

use App\Models\TodoModel;

class Todo extends BaseController
{
    public function __construct()
    {
      $session = \Config\Services::session();
      $session->start();
    }

    public function index()
    {
      if (!isset($_SESSION['user'])) {
        return redirect('login');
      }
        $model = new TodoModel();
        $data['title'] = 'Todo';
        $data['todos'] = $model->getTodos();
        echo view('templates/header');
        echo view('todo/list', $data);
        echo view('templates/footer');

    }

    public function create() {
      if (!isset($_SESSION['user'])) {
        return redirect('login');
      }
      $model = new TodoModel();

      if (!$this->validate([
        'title' => 'required|max_length[255]', // title required
      ])) {
          echo view('templates/header', ['title' => 'Add new task']);
          echo view('todo/create');
          echo view('templates/footer');
          }
          else {
            $user = $_SESSION['user'];
            $model->save([ // call model to save data, read inputs from view
              'title' => $this->request->getVar('title'),
              'description' => $this->request->getVar('description'),
              'user_id' => $user->id
            ]);
            return redirect('todo'); // redirect to todo route
          }
    }

    public function delete($id) {
      // check if provided id is numeric
      if (!is_numeric($id)) {
        throw new \Exception('Provided id is not numeric.');
      }

      // check if user is logged in
      if (!isset($_SESSION['user'])) {
        return redirect('login');
      }

      $model = new TodoModel(); // create object to TodoModel
      $model->remove($id);
      return redirect('todo');
    }

}
?>