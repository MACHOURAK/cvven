<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $session  = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Identifiants de test (à adapter ou relier à ta BDD plus tard)
        if ($username === 'admin' && $password === 'admin123') {
            $session->set([
                'isLoggedIn' => true,
                'username'   => $username,
            ]);
            return redirect()->to('/admin');
        }

        return redirect()->back()->with('error', 'Identifiants incorrects.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}