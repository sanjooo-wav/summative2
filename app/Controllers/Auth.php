<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        if (! $this->validate(['username' => 'required', 'password' => 'required'])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = (new UserModel())->where('username', $this->request->getPost('username'))->first();
        if ($user === null || ! password_verify((string) $this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('errors', ['login' => 'Invalid username or password.']);
        }

        session()->set(['user_id' => $user['id'], 'username' => $user['username'], 'isLoggedIn' => true]);

        return redirect()->to(site_url('tasks'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'));
    }
}