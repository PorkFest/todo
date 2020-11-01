<?php

namespace App\Controllers;

const REGISTER_TITLE = 'Todo - Register';

use App\Models\LoginModel;

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
            'user' => 'required|min_length[8]|max_length[30]',
            'password' => 'required|min_length[8]|max_length[30]',
            'confirmpassword' => 'required|min_length[8]|max_length[30]|matches[password]',
        ])){
            echo view('templates/header', ['title' => REGISTER_TITLE]);
            echo view('login/register');
            echo view('templates/footer');        
        }
        else {
            $model->save([
            'username' => $this->request->getVar('user'),
            'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
            'firstname' => $this->request->getVar('fname'),
            'lastname' => $this->request->getVar('lname'),
        ]);
        return redirect('login');
        }
    }    
}