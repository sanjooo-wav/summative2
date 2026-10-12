<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
    <header>
        <a class="brand" href="<?= site_url('/') ?>">Tasks for Today</a>
        <nav aria-label="Main navigation">
            <a href="<?= site_url('/') ?>">Welcome</a>
            <a href="<?= site_url('tasks') ?>">Task List</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a href="<?= site_url('about') ?>">About</a>
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= site_url('logout') ?>">Logout</a>
            <?php else: ?>
                <a href="<?= site_url('login') ?>">Login</a>
            <?php endif ?>
        </nav>
    </header>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    <footer>Tasks for Today Management System</footer>
</body>
</html>