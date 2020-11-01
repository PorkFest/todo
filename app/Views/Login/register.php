<h3><?= $title ?></h3>
<form action="/login/registeration">
    <div class="col-12">
        <?= Config\Services::validation()->listErrors(); ?>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input class="form-control" name="user" placeholder="Enter username" maxlength="30">
    </div>
    <div class="form-group">
        <label>Firstname</label>
        <input class="form-control" name="fname" placeholder="Enter firstname" maxlength="30">
    </div>
    <div class="form-group">
        <label>Lastname</label>
        <input class="form-control" name="lname" placeholder="Enter lastname" maxlength="30">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" name="password" placeholder="Enter password" maxlength="30">
    </div>
    <div class="form-group">
        <label>Confirm password</label>
        <input class="form-control" name="confirmpassword" placeholder="Confirm password" maxlength="30">
    </div>
    <button class="btn btn-primary">Register</button>
</form>