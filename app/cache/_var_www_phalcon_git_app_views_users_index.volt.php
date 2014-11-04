<h1>List users</h1>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    <?php if ($this->length($users->items) > 0) { ?>
        <?php foreach ($users->items as $user) { ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->name; ?></td>
            <td><?php echo $user->email; ?></td>
        </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="3">No user(s) :/</td>
        </tr>
    </tbody>
    <?php } ?>
    <tr>
        <td colspan="3">
            <?php echo $this->tag->linkTo(array('users/', 'First')); ?>
            <?php echo $this->tag->linkTo(array('users/?page=' . $users->before, 'Previous')); ?>
            <?php echo $this->tag->linkTo(array('users/?page=' . $users->next, 'Next')); ?>
            <?php echo $this->tag->linkTo(array('users/?page=' . $users->last, 'Last')); ?>
            You are in page <?php echo $users->current; ?> of <?php echo $users->total_pages; ?>
        </td>
    </tr>
</table>
