<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $errors = session('errors') ?? []; ?>
<h1>Login</h1>
<?php if ($errors !== []): ?>
    <ul class="errors"><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul>
<?php endif ?>
<form method="post" action="<?= site_url('login') ?>">
    <?= csrf_field() ?>
    <p><label for="username">Username</label><br><input id="username" name="username" type="text" value="<?= esc(old('username')) ?>" required></p>
    <p><label for="password">Password</label><br><input id="password" name="password" type="password" required></p>
    <p><button type="submit">Login</button></p>
</form>
<?= $this->endSection() ?>