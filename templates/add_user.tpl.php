
<h1>
    <?php if ($is_edit) : ?>
    Edit user <?php echo $user->getFirstName() ?>
    <?php else : ?>
    Add new user
    <?php endif ?>
</h1>

<form method="POST">
    <div>
        <label>First name</label>
        <input name="first_name" type="text" value="<?php echo $user->getFirstName() ?>" />
    </div>
    <div>
        <label>Last name</label>
        <input name="last_name" type="text" value="<?php echo $user->getLastName() ?>" />
    </div>
    <div>
        <label>Email</label>
        <input name="email" type="email" value="<?php echo $user->getEmail() ?>" />
    </div>

    <p><input type="submit" value="<?php echo $is_edit ? 'Update' : 'Add new user' ?>"> Or <a href="/?action=listUsers">Cancel</a></p>
</form>