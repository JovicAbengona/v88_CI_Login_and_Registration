<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>static/index.css">
    <title>PHP | Students</title>
</head>
<body>
    <section>
        <h3>Login</h3>
        <form action="login" method="POST">
            <label>Email Address: <input type="text" name="email"></label>
<?php if($this->session->userdata("login_error_email") != NULL){ echo $this->session->userdata("login_error_email"); $this->session->unset_userdata("login_error_email");}?>
            <label>Password: <input type="password" name="password"></label>
<?php if($this->session->userdata("login_error_password") != NULL){ echo $this->session->userdata("login_error_password"); $this->session->unset_userdata("login_error_password");}?>
            <input type="submit" value="Login">
        </form>
<?php if($this->session->userdata("login_message") != NULL){ echo "<p class='error'>".$this->session->userdata("login_message")."</p>"; $this->session->unset_userdata("login_message");}?>
        <h3>Register</h3>
        <form action="register" method="POST">
            <label>First Name: <input type="text" name="first_name" value="<?= $this->session->userdata("first_name_value"); ?>"></label>
<?php if($this->session->userdata("register_error_first_name") != NULL){ echo $this->session->userdata("register_error_first_name"); $this->session->unset_userdata("register_error_first_name");}?>
            <label>Last Name: <input type="text" name="last_name" value="<?= $this->session->userdata("last_name_value"); ?>"></label>
<?php if($this->session->userdata("register_error_last_name") != NULL){ echo $this->session->userdata("register_error_last_name"); $this->session->unset_userdata("register_error_last_name");}?>
            <label>Email Address: <input type="text" name="email" value="<?= $this->session->userdata("email_value"); ?>"></label>
<?php if($this->session->userdata("register_error_email") != NULL){ echo $this->session->userdata("register_error_email"); $this->session->unset_userdata("register_error_email");}?>
            <label>Password: <input type="password" name="password"></label>
<?php if($this->session->userdata("register_error_password") != NULL){ echo $this->session->userdata("register_error_password"); $this->session->unset_userdata("register_error_password");}?>
            <label>Confirm Password: <input type="password" name="confirm_password"></label>
<?php if($this->session->userdata("register_error_confirm_password") != NULL){ echo $this->session->userdata("register_error_confirm_password"); $this->session->unset_userdata("register_error_confirm_password");}?>
            <input type="submit" value="Register">
        </form>
<?php if($this->session->userdata("register_message") != NULL){ echo "<p class='success'>".$this->session->userdata("register_message")."</p>"; $this->session->unset_userdata("register_message");}?>
    </section>
</body>
</html>