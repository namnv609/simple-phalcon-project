<?php echo $this->partial('elements/errors'); ?>
<h2>Register</h2>
<?php echo $this->tag->form(array('users/register')); ?>
<p>
    <label for="name">Name</label>
    <?php echo $this->tag->textField(array('name')); ?>
</p>
<p>
    <label for="name">Email</label>
    <?php echo $this->tag->emailField(array('email')); ?>
</p>
<p>
    <label for="password">Name</label>
    <?php echo $this->tag->passwordField(array('password')); ?>
</p>
<?php echo $this->tag->submitButton(array('Register')); ?>
<?php echo $this->tag->linkTo(array('users/login', 'Have an account? Login here')); ?>