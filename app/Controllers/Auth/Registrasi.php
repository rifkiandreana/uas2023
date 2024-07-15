<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use App\Controllers\Auth\EmailVerivication;

class Registrasi extends BaseController
{
    public function index()
    {
        if($this->session->get('user')){
            return redirect()->back();
        }

        return view('auth/register',[
            'tittle' => 'Registrasi Page',
            'validation' => $this->validation,
            'session' => $this->session
        ]);
    }

    public function store()
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Email is not valid',
                    'is_unique' => 'Email has been registered',
                ]
            ],
            'password' => 'required|min_length[5]',
            'repeatpassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password confirmation is required',
                    'matches' => 'Passwordnya confirmation does not match'
                ]
            ],
        ];

        if(!$this->validate($rules)){
            $errors = [
                'nama' => $this->validation->getError('nama'),
                'email' => $this->validation->getError('email'),
                'password' => $this->validation->getError('password'),
                'repeatpassword' => $this->validation->getError('repeatpassword'),
            ];

            echo json_encode(['status' => FALSE, 'errors' => $errors]);

            // $this->session->setFlashdata('registration-failed', 'Registration failed, please try again');
            // echo json_encode(['status' => 'error', 'redirectUrl' => '/registrasi']);

        }else{

            try{
            $model = new User();
            $model-> transBegin();

            $password = $this->request->getPost('password');
            $encrytedPassword = password_hash($password, PASSWORD_DEFAULT);
            $email = $this->request->getPost('email');

            $data = [
                'nama' => $this->request->getPost('nama'),
                'email' => $email,
                'password' => $encrytedPassword,
                'user_level' => 1,
                'is_active' => 0,

            ];

            $model->insert($data);

            $user_id = $model->getInsertID();

            $user_id = $model->getInsertID($user_id, $email);

            // $model->insert($data);
            $emailVerification = new EmailVerivication();
            $emailVerification->sendEmail($user_id, $email, 'registration'); 

            $model->transCommit();
            
            $this->session->setFlashdata('success', 'Registration Success, please verify your email');
            echo json_encode(['status' => TRUE, 'redirectUrl' => '/login']);

            // return redirect()->to('/login'); 
            
            }  catch(\Throwable $th){
                //throw $th;
                $model->transRollback();

            // echo json_encode(['status' => TRUE,'message' => "Registrasi Sukses"]);
             
            $this->session->setFlashdata('failed', 'Registration failed, please try again');
            echo json_encode(['status' => 'error', 'redirectUrl' => '/registrasi']);

           
            }
        }
    
    }
}
