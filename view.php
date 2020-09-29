<?php
include 'partials/header.php';
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include 'partials/not_found.php';
    exit;
}

$userId = $_GET['id'];
$user = getUserById($userId);

if (!$user) {
    include 'partials/not_found.php';
    exit;
}

?>

<div class="container">
    <div class="card">
        <div class="card-header p-3 mb-2 bg-dark text-white">
            <h3>
                View User: <b><?php echo $user['name'] ?></b>
            </h3>
        </div>
        <div class="card-body text-white-50 bg-dark ">
            <a class="btn btn-info btn-me" href="update.php?id=<?php echo $user['id'] ?>">Update</a>
            <form style="display: inline-block;" method="POST" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                <button class="btn btn-danger btn-me">Delete</button>
            </form>
        </div>
        <table class="table text-white-50 bg-dark">
            <tbody>
                <tr>
                    <th><?php if (isset($user['extension'])) : ?>
                        <img style="width: 60px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>"
                            alt="">
                    <td></td>
                    <?php endif; ?>
                    </th>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $user['name'] ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><?php echo $user['username'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $user['email'] ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo $user['phone'] ?></td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td>
                        <!-- değiştirildi -->
                        <?php if (isset($user['website'])) : ?>
                        <a target="blank" href="http://<?php echo $user['website'] ?>">
                            <?php echo $user['website'] ?>
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php include 'partials/footer.php' ?>
