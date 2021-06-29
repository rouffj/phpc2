<h2>List of users</h2>

<table>
    <thead>
    <tr>
        <th>first name</th>
        <th>last name</th>
        <th>email</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['firstName'] ?></td>
            <td><?php echo $user['lastName'] ?></td>
            <td><?php echo $user['email'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

