<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class ChangePassword extends BaseController
{
    public function index()
    {
        if($this->session->get('user')){
            return redirect()->back();
        }

        if(!$this->session->get('email')){
            return redirect()->to('/login');
        }

        return view('auth/change-password', [
            'tittle' => 'Change Password',
            'session' => $this->session
        ]);
    }

    public function updateForgotPassword()
    {
        $rules = [
            'password' => 'required|min_length[5]',
            'repeatpassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password confirmation is required',
                    'matches' => 'Password confirmation does not match'
                ] 
            ]
        ];

        if(!$this->validate($rules)) {
            $errors = [
                'password' => $this->validation->getError('password'),
                'repeatpassword' => $this->validation->getError('repeatpassword')
            ];

            return $this->response->setJSON(['status'=> FALSE, 'errors' => $errors]);
        }else {
            $password = $this->request->getPost('password');
            $encrytedPassword = password_hash($password, PASSWORD_DEFAULT);
            $email = $this->session->get('email');

            $userModel = new User();
            $userModel->updatePassword($email, $encrytedPassword);

            $this->session->remove('email');

            $this->session->setFlashdata('success', 'Password has been change');
            return $this->response->setJSON(['status' => TRUE, 'redirectUrl' => '/login']);

        }
    }
}
