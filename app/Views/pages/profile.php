<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Profile</h1>
<?php if ($user !== null): ?>
    <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
    <p><strong>Full name:</strong> <?= esc($user['full_name']) ?></p>
    <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
<?php else: ?>
    <p>No demo user record was found.</p>
<?php endif ?>
<?= $this->endSection() ?>