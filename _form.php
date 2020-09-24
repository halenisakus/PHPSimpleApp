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