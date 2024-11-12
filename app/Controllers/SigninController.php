<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('usuario', $email)->first();

        if ($data) {
            $pass = $data['senha'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'idusers' => $data['idusers'],
                    'idcongregacao' => $data['idcongregacao'],
                    'usuario' => $data['usuario'],
                    'senha' => $data['senha'],
                    'nivel' => $data['nivel'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Senha incorreta, tente novamente.');
                return redirect()->to('/signin');
            }
        } else {
            $session->setFlashdata('msg', 'Email inexistente, tente novamente.');
            return redirect()->to('/signin');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
