<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('user_email')) {
            return redirect()->to('/login');
        }
        return view('Dashboard');
    }
    public function profileDetails()
    {
        if (!session()->get('user_email')) {
            return redirect()->to('/login');
        }
        return view('Profile');
    }
    public function userAccess()
    {
        if (!session()->get('user_email')) {
            return redirect()->to('/login');
        }else if(session()->get('user_type') != 'admin'){
            return redirect()->to('/dashboard');
        }
        return view('UserAccess');
    }
}
