<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use App\Controllers\Auth\EmailVerivication;

class ForgotPassword extends BaseController
{
    public function index()
    {
        if($this->session->get('user')){
            return redirect()->back();
        }

        return view('auth/forgot-password', [
            'tittle' => 'Forgot Password',
            'session' => $this->session
        ]);
    }

    public function resetPassword()
    {
        $rules = [
            'email' => 'required|valid_email'
        ];

        if(!$this->validate($rules)){
            $errors = [
                'email' => $this->validation->getError('email'),
            ];
            return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
        }else{
            $email = $this->request->getPost('email');
            $userModel = new User();

            $user = $userModel
                    ->select('user_id, email, is_active')
                    ->where('email', $email)
                    ->where('is_active', 1)
                    ->first();
            
            if(!$user){
                $errors = [
                    'email' => 'Email is not registered or not activated yet!',
                ];

                return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
            } else{
                $emailVerification = new EmailVerivication();
                $emailVerification->sendEmail($user['user_id'], $email, 'forgot-password');

                $this->session->setFlashdata('success', 'Reset password has been sent to your email');
           
                return $this->response->setJSON(['status' => TRUE, 'redirectUrl' => '/forgot-password' ]);
             }
        }
    }
}
