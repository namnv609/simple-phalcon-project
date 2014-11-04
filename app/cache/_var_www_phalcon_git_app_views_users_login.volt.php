<?php echo $this->partial('elements/errors'); ?>
<h2>Login</h2>
<?php echo $this->tag->form(array('users/login')); ?>
<p>
    <label for="email">Email</label>
    <?php echo $this->tag->textField(array('email')); ?>
</p>
<p>
    <label for="password">Password</label>
    <?php echo $this->tag->passwordField(array('password')); ?>
</p>
<p>
    <?php echo $this->tag->submitButton(array('Login')); ?>
    <?php echo $this->tag->linkTo(array('users/register', 'Don\'t have an account? Register here')); ?>
</p>