<h1>Users</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
    </tr>
    <?php foreach ($this->allUsers as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user[0]) ?></td>
            <td><?= htmlspecialchars($user[1]) ?></td>
            <td>
                <form action="users/setUserRole/<?= htmlspecialchars($user[0]) ?>" method="post" class="user-role-form">
                    <input type="number" name="isAdmin" placeholder="Set admin" />
                    <input type="number" name="isEditor" placeholder="Set editor" />
                    <input type="submit" name="submit" value="Set role" />
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>