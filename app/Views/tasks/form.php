<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $errors = session('errors') ?? []; ?>
<h1><?= $mode === 'edit' ? 'Edit Task' : 'New Task' ?></h1>
<?php if ($errors !== []): ?>
    <ul class="errors"><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul>
<?php endif ?>
<form method="post" action="<?= $mode === 'edit' ? site_url('tasks/' . $task['id'] . '/edit') : site_url('tasks/new') ?>">
    <?= csrf_field() ?>
    <p><label for="title">Title</label><br><input id="title" name="title" type="text" value="<?= esc(old('title', $task['title'] ?? '')) ?>" required></p>
    <p><label for="status">Status</label><br><select id="status" name="status"><option value="pending" <?= old('status', $task['status'] ?? 'pending') === 'pending' ? 'selected' : '' ?>>Pending</option><option value="completed" <?= old('status', $task['status'] ?? '') === 'completed' ? 'selected' : '' ?>>Completed</option></select></p>
    <p><label for="task_date">Task date</label><br><input id="task_date" name="task_date" type="date" value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>" required></p>
    <p><button type="submit">Save Task</button> <a href="<?= site_url('tasks') ?>">Cancel</a></p>
</form>
<?= $this->endSection() ?>