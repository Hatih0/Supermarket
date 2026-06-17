<?php 

namespace App\Controllers;

class AccueilController extends BaseController
{ 

    public function index()
    {
        $current_user = session('user');
        if (!$current_user) {
            return view('login/login');
        }
        return view('accueil/accueil');
    }

}