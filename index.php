<?php include('header.php');?>
<div class="container">
    <form id="RegisterForm" class="pad-top-100" >
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <div class="mandatory alert alert-danger" id="mandatory_register_general_errors" role="alert"></div>
        <div class="alert alert-success mandatory-success" role="alert" id="mandatory_register_success">
            User Registered
        </div>
        <div class="form-group">
            <label for="username"><b>Username</b></label>
            <input type="text" class="form-control mar-bottom-30" placeholder="Enter Username" name="username" id="register_username" required>
            <div class="mandatory alert alert-danger" id="mandatory_register_username" role="alert"></div>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password"><b>Password</b></label>
            <input type="password" class="form-control mar-bottom-30" placeholder="Enter Password" name="password" id="register_password" required>
            <div class="mandatory alert alert-danger" id="mandatory_register_password" role="alert"></div>
        </div>
        <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
    </form>
</div>
<?php include('footer.php'); ?>

