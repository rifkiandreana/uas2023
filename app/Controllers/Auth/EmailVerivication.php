<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserToken;
use App\Models\User;

class EmailVerivication extends BaseController
{
    protected $UserTokenModel;
    protected $UserModel;

    public function __construct()
    {
        $this->UserTokenModel = new UserToken();
        $this->UserModel = new User();
    }
    public function sendEmail($user_id, $userEmail, $type)
    {
        $email = \Config\Services::email();

        $VerificationToken = bin2hex(random_bytes(32));
        $tokenExpiration = date('y-m-d h:i:s', strtotime('+30 Minutes'));
        
        $email->setTo($userEmail);

        if($type === 'registration') {
            $verificationLink = base_url("email-verification??email={$userEmail}&&token={$VerificationToken}");
            $email->setSubject('Account Verification');
            $email->setMessage("Click this link to verify your akun :  . <a href='$verificationLink'>Click Here </a>");

        } else if($type === 'forgot-password'){
            $verificationLink = base_url("reset-password?email={$userEmail}&&token={$VerificationToken}");
            $email->setSubject('Reset Password');
            $email->setMessage("Click this link to reset your password :  . <a href='$verificationLink'>Click Here </a>");


        }


        $data = [
            'user_id' => $user_id,
            'token' => $VerificationToken,
            'expired_at' => $tokenExpiration
        ];

        $this->UserTokenModel->insert($data);

        $email->send();
    }

    private function _verifyEmail($email, $token, $type)
    {

        if($type === 'registration'){
            $user = $this->UserModel
                ->select('email')
                ->where('email', $email)
                ->first();
        } else if ($type === 'forgot-password'){
            $user = $this->UserModel->findUserActiveByEmail($email);
            
        }

        if($user){
            $userToken = $this->UserTokenModel->findValidToken($token);
            
            if($userToken){
                if($type === 'registration'){
                    $this->UserModel->markAsActive(($userToken['user_id']));
                }else if($type === 'forgot-password'){
                    $this->session->set('email', $email);
                }

                $this->UserTokenModel->where('user_id', $userToken['user_id'])->delete();
                return true;
            }else{
                return false;
            }

            return false;
        
        }

        $token = $this->request->getVar('token');
        $userToken = $this->UserTokenModel->findValidToken($token);

        if($userToken){
            //set user active
            $this->UserModel->markAsActive($userToken['user_id']);
            //delete all token based on user_id
            $this->UserTokenModel->where('user_id', $userToken['user_id'])->delete();

            $this->session->setFlashdata('success', 'Your account has been verify');
            return redirect()->to('/login');
        }else{
            $this->session->setFlashdata('failed', 'invalid token or token has been expired.');
            return redirect()->to('/registrasi');
        }
    }

    public function verifyEmailRegistration(){
        $token = $this->request->getVar('token');
        $email = $this->request->getVar('email');

        if($this->_verifyEmail($email , $token, 'forgot-password')){
            $this->session->setFlashdata('success', 'Your account has been verified.');
            return redirect()->to('/login');
        }
        $this->session->setFlashdata('failed', 'invalid token or token has been expired');
        return redirect()->to('/registrasi');
    }

    public function verifyEmailForgotPassword(){
        $token = $this->request->getVar('token');
        $email = $this->request->getVar('email');

        if($this->_verifyEmail($email , $token, 'forgot-password')){
            $this->session->setFlashdata('success', 'Change your password');
            return redirect()->to('/change-password');
        }
        $this->session->setFlashdata('failed', 'invalid token or token has been expired');
        return redirect()->to('/forgot-password');
    }

    public function viewResendEmailVerification(){
        return view('auth/resend-email-verification',[
            'tittle' => 'Resend Email Verification',
            'session' => $this->session,
        ]);
    }

    public function resendEmailVerification()
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
            $user = $this->UserModel
            ->select('user_id, email, is_active')
            ->where('email', $email)
            ->first();
            
            if(!$user ||$user['is_active'] == 1 ){
                $errors = [
                    'email' => 'Email is not registered or has been verified',
                ];

                return $this->response->setJSON(['status' => FALSE, 'errors' => $errors]);
            } else{
                $this->sendEmail($user['user_id'], $email, 'registration');

                $this->session->setFlashdata('success', 'Email verification has been sent');
           
                return $this->response->setJSON(['status' => TRUE, 'redirectUrl' => '/email-verification/resend' ]);
             }
        }
    }
}
