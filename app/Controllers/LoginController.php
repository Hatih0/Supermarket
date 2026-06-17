<?php 

namespace App\Controllers;

use App\Controllers\AccueilController ;

class LoginController extends BaseController
{

    public function index()
    {
        return view('login/login');
    }

    public function checkLogin () {
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        $correct_login = 'defaultlogin' ;
        $correct_password = 'defaultpasswd' ;

        if ($login == $correct_login && $correct_password === $password) {
            session()->set('user',"user");

            return view('accueil/accueil');
        } else {
            return view('login/login');
        }

    }
}