<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>static/profile.css">
    <title>PHP | Students</title>
</head>
<body>
    <header>
        <h1>Welcome, <?= $this->session->userdata("first_name") ?>!</h1>
        <a href="logout">Log out</a>
    </header>
    <section>
        <div>
            <p>First Name: <?= $this->session->userdata("first_name") ?></p>
            <p>Last Name: <?= $this->session->userdata("last_name") ?></p>
            <p>Email Address: <?= $this->session->userdata("email") ?></p>
        </div>
    </section>
</body>
</html>