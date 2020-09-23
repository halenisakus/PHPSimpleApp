<?php

require __DIR__ . '/users.php';

$userId = $_GET['id'];


$user = getUserById($userId);


include 'partials/header.php';

?>





<table class="table">
    <tbody>
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
            <td><?php echo $user['website'] ?></td>
        </tr>
    </tbody>

</table>

<?php include 'partials/footer.php' ?>