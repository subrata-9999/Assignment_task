<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    protected UserModel $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        return view('Profile');
    }

    public function updateProfile()
    {
        // Retrieve user data from the form
        $userData = [
            'id' => session()->get('user_id'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        // Validate inputs
        $validationRules = [
            'name' => 'required',
            'email' => 'required|valid_email'
        ];

        // Check if email is changed to validate uniqueness
        $currentEmail = session()->get('user_email');
        $newEmail = $userData['email'];

        if ($currentEmail !== $newEmail) {
            $validationRules['email'] .= '|is_unique[users.email,email,' . session()->get('user_id') . ']';
        }

        // Perform validation
        $validation = $this->validate($validationRules);

        // If validation fails, return with errors
        if (!$validation) {
            $errors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Save updated user data to the database
        $this->userModel->save($userData);

        // Update session variables with new data
        session()->set('user_name', $userData['name']);
        session()->set('user_email', $userData['email']);

        // Redirect to the profile update page
        return redirect()->to('/profileupdate');
    }

}
