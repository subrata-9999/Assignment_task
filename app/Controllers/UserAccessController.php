<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserAccessController extends BaseController
{
    protected UserModel $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        if(session()->get('user_type') != 'admin'){
            return redirect()->to('/dashboard');
        }
        $allEmployees = $this->userModel->getEmployees();
        $allAdmins = $this->userModel->getAdmins(session()->get('user_id'));
        $data = [
            'allEmployees' => $allEmployees,
            'allAdmins' => $allAdmins,
        ];

        return view('AllUsers_page', $data);
    }
    public function statusUpdate($user_id){
        $user = $this->userModel->find($user_id);
        if($user['status'] == 'active'){
            $this->userModel->update($user_id, ['status' => 'inactive']);
        }else{
            $this->userModel->update($user_id, ['status' => 'active']);
        }
        return redirect()->to('/useraccess');
    }
    public function changeUserType($user_id){
        $user = $this->userModel->find($user_id);
        if($user['userType'] == 'admin'){
            $this->userModel->update($user_id, ['userType' => 'employee']);
        }else{
            $this->userModel->update($user_id, ['userType' => 'admin']);
        }
        return redirect()->to('/useraccess');


    }
}
