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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = updateUser($_POST, $userId);

    if (isset($_FILES['picture'])) {
        if (!is_dir(__DIR__ . "/users/images")) {
            mkdir(__DIR__ . "/users/images");
        }

        $fileName = $_FILES['picture']['name'];
        $dotPosition = strpos($fileName, '.');
        $extension = substr($fileName, $dotPosition + 1);


        move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__ . "/users/images/$userId.$extension");
        $user['extension'] = $extension;
        updateUser($user, $userId);
    }


    header("Location: index.php");
}




?>


<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update User: <b><?php echo $user['name'] ?></b></h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="">
                <!--    Hidden field for saving id and submitting it to determine if we need to create user or updated it-->

                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="<?php echo $user['name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" value="<?php echo $user['username'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="<?php echo $user['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input name="website" value="<?php echo $user['website'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>