<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Task List</h1>
<?php if (session()->get('isLoggedIn')): ?>
    <p><a href="<?= site_url('tasks/new') ?>">Add New Task</a></p>
<?php endif ?>
<section class="table-wrap" aria-label="All active tasks">
    <table>
        <thead><tr><th scope="col">Title</th><th scope="col">Status</th><th scope="col">Task date</th><?php if (session()->get('isLoggedIn')): ?><th scope="col">Action</th><?php endif ?></tr></thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr><td><?= esc($task['title']) ?></td><td><?= esc($task['status']) ?></td><td><?= esc($task['task_date']) ?></td><?php if (session()->get('isLoggedIn')): ?><td><a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">Edit</a> <form class="inline-form" method="post" action="<?= site_url('tasks/' . $task['id'] . '/delete') ?>"><?= csrf_field() ?><button type="submit">Delete</button></form></td><?php endif ?></tr>
        <?php endforeach ?>
        </tbody>
    </table>
</section>
<?= $this->endSection() ?>