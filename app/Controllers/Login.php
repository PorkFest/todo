<?php

namespace App\Controllers;

use App\Models\LoginModel;

const REGISTER_TITLE = 'Todo - Register';

class Login extends BaseController
{
    public function index()
    {
        $data['title'] = 'Todo - login';
        echo view('templates/header');
        echo view('login/login', $data);
        echo view('templates/footer');

    }

    public function register()
    {
        $data['title'] = REGISTER_TITLE;
        echo view('templates/header');
        echo view('login/register', $data);
        echo view('templates/footer');
    }

    public function registeration() {
        $model = new LoginModel();

        if (!$this->validate([
            'username' => 'required|min_length[8]|max_length[30]',
            'password' => 'required|min_length[8]|max_length[30]',
            'confirmpassword' => 'required|min_length[8]|max_length[30]|matches[password]',
        ])) {
            echo view('templates/header',['title' => REGISTER_TITLE]);
            echo view('login/register');
            echo view('templates/footer');
        }
        else {
            $model->save([
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname')
            ]);
            return redirect('login');
        }
    }

    public function check() {
        $model = new LoginModel();

        if (!$this->validate([
            'username' => 'required|min_length[8]|max_length[30]',
            'password' => 'required|min_length[8]|max_length[30]',
        ])) {
            echo view('templates/header',['title' => REGISTER_TITLE]);
            echo view('login/register');
            echo view('templates/footer');
        }
        else {
            $user = $model->check(
                $this->request->getVar('username'),
                $this->request->getVar('password')
            );
            if ($user) {
                $_SESSION['user'] = $user;
                return redirect('todo');
            }
            else {
                return redirect('login');
            }
        }
    }

}
?>