<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function index(): string
    {
        $today = date('Y-m-d');
        $tasks = (new TaskModel())->where('task_date', $today)->where('is_archived', 0)->orderBy('id', 'ASC')->findAll();

        return view('pages/welcome', ['tasks' => $tasks, 'today' => $today]);
    }

    public function profile(): string
    {
        return view('pages/profile', ['user' => (new UserModel())->first()]);
    }

    public function about(): string
    {
        return view('pages/about');
    }
}