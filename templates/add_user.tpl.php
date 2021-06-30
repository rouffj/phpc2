<h1>Add new user</h1>

<form method="POST">
    <div>
        <label>First name</label>
        <input name="first_name" type="text" />
    </div>
    <div>
        <label>Last name</label>
        <input name="last_name" type="text" />
    </div>
    <div>
        <label>Email</label>
        <input name="email" type="email" />
    </div>

    <p><input type="submit" value="Add new user"> Or <a href="/?action=listUsers">Cancel</a></p>
</form>