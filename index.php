<?php
require 'users/users.php';
$users = getUsers();
include 'partials/header.php';
?>


<div class="container">
    <link rel="stylesheet" href="/styles/styles.css">
    <p>
        <a class="btn btn-success" href="create.php">Create new User</a>
    </p>
    <table class="table">
        <thead class="p-3 mb-2 bg-dark text-white">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="text-white-50 bg-dark">
            <?php if (is_array($users) || is_object($users)) foreach ($users as $i) : ?>
                <tr>
                    <td>
                        <?php if (isset($i['extension'])) : ?>
                            <img style="width: 60px" src="<?php echo "users/images/${i['id']}.${i['extension']}" ?>" alt="">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $i['name'] ?></td>
                    <td><?php echo $i['username'] ?></td>
                    <td><?php echo $i['email'] ?></td>
                    <td><?php echo $i['phone'] ?></td>
                    <td>
                        <a target="_blank" href="http://<?php echo $i['website'] ?>">
                            <?php echo $i['website'] ?>
                        </a>
                    </td>
                    <td>
                        <a href="view.php?id=<?php echo $i['id'] ?>" class="btn btn-secondary btn-sm btn-block ">View </a>
                        <a href="update.php?id=<?php echo $i['id'] ?>" class="btn btn-info btn-sm btn-block">Update</a>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $i['id'] ?>">
                            <button class="btn btn-danger btn-sm btn-block">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include 'partials/footer.php' ?>