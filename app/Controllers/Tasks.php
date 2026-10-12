<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $tasks = (new TaskModel())->where('is_archived', 0)->orderBy('task_date', 'ASC')->orderBy('id', 'ASC')->findAll();

        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function new(): string
    {
        return view('tasks/form', ['task' => [], 'mode' => 'new']);
    }

    public function create()
    {
        $rules = ['title' => 'required|max_length[150]', 'task_date' => 'required|valid_date[Y-m-d]', 'status' => 'required|in_list[pending,completed]'];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->insert([
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
            'is_archived' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('tasks'));
    }

    public function edit(int $id): string
    {
        $task = (new TaskModel())->where('is_archived', 0)->find($id);
        if ($task === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('tasks/form', ['task' => $task, 'mode' => 'edit']);
    }

    public function update(int $id)
    {
        $taskModel = new TaskModel();
        if ($taskModel->where('is_archived', 0)->find($id) === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = ['title' => 'required|max_length[150]', 'task_date' => 'required|valid_date[Y-m-d]', 'status' => 'required|in_list[pending,completed]'];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel->update($id, ['title' => $this->request->getPost('title'), 'status' => $this->request->getPost('status'), 'task_date' => $this->request->getPost('task_date')]);

        return redirect()->to(site_url('tasks'));
    }

    public function archive(int $id)
    {
        $taskModel = new TaskModel();
        if ($taskModel->find($id) === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $taskModel->update($id, ['is_archived' => 1]);

        return redirect()->to(site_url('tasks'));
    }
}