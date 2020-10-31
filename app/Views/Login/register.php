<h3><?= $title ?></h3>
<form action="/login/registeration">    
    <div class="col-12">
        <?=\Config\Services::validation()->listErrors(); ?>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input class="form-control" name="username" placeholder="Enter username" maxlength="30">
    </div>
    <div class="form-group">
        <label>First name</label>
        <input class="form-control" name="firstname" placeholder="Enter first name" maxlength="30">
    </div>
    <div class="form-group">
        <label>Last name</label>
        <input class="form-control" name="lastname" placeholder="Enter last name" maxlength="30">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" name="password" type="password" placeholder="Enter password" maxlength="30">
    </div>
    <div class="form-group">
        <label>Confirm password</label>
        <input class="form-control" name="confirmpassword" type="password" placeholder="Confirm password" maxlength="30">
    </div>
    <button class="btn btn-primary">Register</button>
</form>