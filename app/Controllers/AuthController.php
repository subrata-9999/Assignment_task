<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\PermissionModel;


class AuthController extends BaseController
{
    protected UserModel $userModel;
    protected PermissionModel $permissionModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->permissionModel = new PermissionModel();
    }

    public function go_to_register()
    {
        if (session()->get('user_email')) {
            return redirect()->to('/dashboard');
        }
        return view('Auth/register');
    }
    public function go_to_login()
    {
        if (session()->get('user_email')) {
            return redirect()->to('/dashboard');
        }
        return view('Auth/login');
    }

    public function register()
    {
        // Validate user input
        $validation = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required',
        ]);

        // If validation fails, prepare errors
        if (!$validation) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // If validation passes, save user data
        $this->userModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        // Redirect to login page after successful registration
        return redirect()->to('/login');
    }


    public function login()
    {
        // Validate input
        $validation = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        // If validation fails, prepare errors
        if (!$validation) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Retrieve user from database
        $user = $this->userModel->where('email', $this->request->getPost('email'))->first();
        if (!$user) {
            // Set email error
            $errors['email'] = 'Email not found';
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Verify password
        if (!password_verify($this->request->getPost('password'), $user['password'])) {
            // Set password error
            $errors['password'] = 'Password is incorrect';
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        if ($user['status'] == 'inactive') {
            $errors['status'] = 'Your account is inactive';
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Set user session
        session()->set([
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'user_email' => $user['email'],
            'user_type' => $user['userType'],
            'user_status' => $user['status'],
            'user_scope' => $this->permissionModel->getPermission($user['userType']),
        ]);

        return redirect()->to('/dashboard');
    }


    public function forgotPassword()
    {
        return view('Auth/forgotPassword');
    }
    public function sendResetLink()
    {
        // Validate email input
        $validation = $this->validate([
            'email' => 'required|valid_email',
        ]);

        if (!$validation) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Get email from POST data
        $email = $this->request->getPost('email');
        $user = $this->userModel->where('email', $email)->first();

        // Check if user exists
        if (!$user) {
            $errors['email'] = 'Email not found';
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // // Generate a secure token (use user ID for example, but hash it for security)
        // $token = bin2hex(random_bytes(32));
        // // Save token to database (you may want to save it hashed)
        // $this->userModel->update($user['id'], ['reset_token' => $token]);



        $email = \Codeigniter\Config\Services::email();
        $emailConfig = new \Config\Email();
        $email->initialize($emailConfig);
        echo $emailConfig->fromEmail.'<br>';
        echo $emailConfig->fromName.'<br>';
        $email->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
        echo $user['email'].'<br>';
        $email->setTo($user['email']);
        $email->setSubject('Password Reset Link');
        $email->setMessage('hello check');
        $result = $email->send();
        echo $email->printDebugger(['headers']);
        exit;
        if (!$result) {
            $errors['email'] = 'Email not sent';
            echo 'Email not sent';
            exit;
            return redirect()->back()->withInput()->with('errors', $errors);
        }



        session()->setFlashdata('success', 'Email sent successfully');
        return redirect()->to('/register');
    }

    public function resetPassword($token)
    {
        $validation = $this->validate([
            'password' => 'required',
            'confirm_password' => 'required|matches[password]',
        ]);

        if (!$validation) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $user = $this->userModel->find($token);
        if (!$user) {
            $errors['token'] = 'Invalid token';
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $this->userModel->update($token, ['password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)]);
        return redirect()->to('/login');
    }





    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
