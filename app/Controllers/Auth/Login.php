<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;

class Login extends BaseController
{
    public function index()
    {
        if($this->session->get('user')){
            return redirect()->back();
        }

        $data = [
            'tittle' => 'Login Page',
            'session' => $this->session,
        ];
        return view('auth/login', $data);
    }

    public function authenticate()
    {

        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        if(!$this->validate($rules)){
            $errors = [
                'email' => $this->validation->getError('email'),
                'password' => $this->validation->getError('password'),
            ];

            return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);

        }else{
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
        
            $userModel = new User();
            $user = $userModel->findUserActiveByEmail($email);
            
            if(!$user){
                $errors = [
                    'email' => 'Email not found',
                ];

                return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
            }
            if(!password_verify($password, $user['password'])){
                $errors = [
                    'password' => 'Wrong password',
                ];

                return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
            }

            $this->session->set('user', [
                'isLoggedIn' => true,
                'nama' => $user['nama'],
                'email' => $user['email'],
            ]);
            $this->session->setFlashdata('login-success', 'Login success, welcome back' . $user['nama']);
            return $this->response->setJSON([
                'status' => TRUE,
                'redirectUrl' => '/dashboard'
            ]);

            
        }  
    }

//     public function authenticate()
// {
//     $rules = [
//         'email' => 'required',
//         'password' => 'required',
//     ];

//     if (!$this->validate($rules)) {
//         $errors = [
//             'email' => $this->validation->getError('email'),
//             'password' => $this->validation->getError('password'),
//         ];

//         return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
//     } else {
//         $email = $this->request->getPost('email');
//         $password = $this->request->getPost('password');

//         $userModel = new User();
//         $user = $userModel->findUserActiveByEmail($email);

//         if (!$user) {
//             $errors = [
//                 'email' => 'Email not found',
//             ];

//             return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
//         }

//         if (!password_verify($password, $user['password'])) {
//             $errors = [
//                 'password' => 'Wrong password',
//             ];

//             return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
//         }

//         $this->session->set('user', [
//             'isLoggedIn' => true,
//             'nama' => $user['nama'],
//             'email' => $user['email'],
//             'user_level' => $user['user_level'], // Anda perlu memastikan bahwa kolom user_level ada dalam tabel pengguna
//         ]);

//         $this->session->setFlashdata('login-success', 'Login success, welcome back ' . $user['nama']);

//         $redirectUrl = ($user['user_level'] == 2) ? '/admin/dashboard' : '/';

//         return $this->response->setJSON([
//             'status' => TRUE,
//             'redirectUrl' => $redirectUrl
//         ]);
//     }
// }


    
}
