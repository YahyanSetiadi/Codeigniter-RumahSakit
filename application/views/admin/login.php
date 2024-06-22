<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="<?php echo base_url('assetsAdmin/css/login.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="<?php echo base_url('assetsAdmin/img/login.jpg') ?>" alt="">
        </div>
        
        <div class="text-center mt-4 name">
            Admin
        </div>
        <form class="p-3 mt-3" action="<?php echo site_url('admin/proses_login'); ?>" method="post">
            <!-- Display error messages -->
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userName" id="userName" placeholder="Username" required
                oninvalid="this.setCustomValidity('Please fill in your username')"
                oninput="setCustomValidity('')">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required
                oninvalid="this.setCustomValidity('Please fill in your Password')"
                oninput="setCustomValidity('')">
            </div>
            <button type="submit" class="btn mt-3" style="background-color: #00bca9">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
