<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/navigation.php'; ?>

<h1>Login</h1>
<?php echo validation_errors(); ?>
<form method="POST" action="<?= base_url('auth/login') ?>" class="form">
    <div class="form-group">
        <label for="username" class="required">Username</label>
        <input type="text" id="username" name="username" class="form-control" />
        <label for="password" class="required">Password</label>
        <input type="password" id="password" name="password" class="form-control" />
    </div>
    <input type="submit" value="Login" class="btn btn-default" />
</form>

<?php include_once 'includes/footer.php'; ?>