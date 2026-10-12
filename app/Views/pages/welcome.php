<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Tasks for Today</h1>
<p>Tasks due on <?= esc($today) ?>.</p>
<section class="table-wrap" aria-label="Tasks for today">
    <table>
        <thead><tr><th scope="col">Title</th><th scope="col">Status</th><th scope="col">Task date</th></tr></thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr><td><?= esc($task['title']) ?></td><td><?= esc($task['status']) ?></td><td><?= esc($task['task_date']) ?></td></tr>
        <?php endforeach ?>
        </tbody>
    </table>
</section>
<?= $this->endSection() ?>