<?php if ($this->length($validationErrors) > 0) { ?>
    <?php foreach ($validationErrors as $error) { ?>
    <?php echo $error; ?> <br />
    <?php } ?>
<?php } ?>
<?php echo $this->flash->output(); ?>