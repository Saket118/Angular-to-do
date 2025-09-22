<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\usermodel;
class Home extends Controller
{

    public function index(){
        return view ("welcome_message");
    }

      public function user()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        // return JSON response
        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $users
        ]);
    }


}
