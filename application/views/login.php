<!-- login.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <!-- Feather Icon-->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<link rel="stylesheet" href="<?php echo base_url('assets/CSS/login.css'); ?>" />
<body>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-20 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <a href="<?php echo base_url('RumahSakit/index'); ?>" class="btn-close" aria-label="Close"></a>
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3" style="color: #fff;">Log In</h4>

                                            <!-- Display error messages -->
                                            <?php if (isset($error)): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo $error; ?>
                                                </div>
                                            <?php endif; ?>

                                            <!-- login Form -->
                                            <form action="<?php echo site_url('RumahSakit/login'); ?>" method="post">
                                                <div class="container mt-5">
                                                    <div class="row">
                                                        <div class="col mx-auto">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">
                                                                    <iconify-icon icon="entypo:email"></iconify-icon>
                                                                </span>
                                                                <input
                                                                    type="email"
                                                                    name="logemailS"
                                                                    class="form-control"
                                                                    placeholder="Your Email"
                                                                    id="logemail"
                                                                    autocomplete="off"
                                                                    required
                                                                    oninvalid="this.setCustomValidity('Email cannot be empty')"
                                                                    oninput="setCustomValidity('')"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container mt-2">
                                                    <div class="row">
                                                        <div class="col mx-auto">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">
                                                                    <iconify-icon icon="uil:lock-alt"></iconify-icon>
                                                                </span>
                                                                <input
                                                                    type="password"
                                                                    name="password"
                                                                    class="form-control"
                                                                    placeholder="Password"
                                                                    id="password"
                                                                    autocomplete="off"
                                                                    required
                                                                    oninvalid="this.setCustomValidity('Password cannot be empty')"
                                                                    oninput="setCustomValidity('')"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn mt-4">Submit</button>
                                            </form>
                                            <!-- <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p> -->
                                        </div>
                                    </div>
                                </div>
                                <?php if ($this->session->flashdata('success_message')): ?>
                                    <p><?php echo $this->session->flashdata('success_message'); ?></p>
                                <?php endif; ?>

                                <?php if (isset($error)): ?>
                                    <p><?php echo $error; ?></p>
                                <?php endif; ?>
                                <div class="card-back">
                                    <a href="<?php echo base_url('RumahSakit/index'); ?>" class="btn-close" aria-label="Close"></a>
                                    <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-3 pb-2" style="color: #fff;">Sign Up</h4>

                                        <!-- Sign Up form -->
                                        <form action="<?php echo base_url('RumahSakit/register'); ?>" method="post">
                                        <div class="container mt-2">
                                            <div class="row">
                                            <div class="col mx-auto">
                                                <div class="input-group mb-3">
                                                <span class="input-group-text">
                                                    <iconify-icon icon="uil:user"></iconify-icon>
                                                </span>
                                                <input
                                                    type="text"
                                                    name="nama"
                                                    class="form-control"
                                                    placeholder="Your Name"
                                                    id="logemail"
                                                    autocomplete="off"
                                                    required
                                                    oninvalid="this.setCustomValidity('Input Your Name')"
                                                    oninput="setCustomValidity('')"
                                                />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="container mt-2">
                                            <div class="row">
                                            <div class="col mx-auto">
                                                <div class="input-group mb-3">
                                                <span class="input-group-text">
                                                    <iconify-icon icon="entypo:email"></iconify-icon>
                                                </span>
                                                <input
                                                    type="email"
                                                    name="email"
                                                    class="form-control"
                                                    placeholder="Your Email"
                                                    id="logemail"
                                                    autocomplete="off"
                                                    required
                                                    oninvalid="this.setCustomValidity('Input Your Email')"
                                                    oninput="setCustomValidity('')"
                                                />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="container mt-2">
                                            <div class="row">
                                            <div class="col mx-auto">
                                                <div class="input-group mb-3">
                                                <span class="input-group-text">
                                                    <iconify-icon icon="uil:lock-alt"></iconify-icon>
                                                </span>
                                                <input
                                                    type="password"
                                                    name="password"
                                                    class="form-control"
                                                    placeholder="Password"
                                                    id="password"
                                                    autocomplete="off"
                                                    required
                                                    oninvalid="this.setCustomValidity('Input Your Password')"
                                                    oninput="setCustomValidity('')"
                                                />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- <div class="container mt-2">
                                            <div class="row">
                                            <div class="col mx-auto">
                                                <div class="input-group mb-3">
                                                <span class="input-group-text">
                                                    <iconify-icon icon="uil:lock-alt"></iconify-icon>
                                                </span>
                                                <input
                                                    type="password"
                                                    name="password"
                                                    class="form-control"
                                                    placeholder="confirm password"
                                                    id="password"
                                                    autocomplete="off"
                                                    required
                                                    oninvalid="this.setCustomValidity('confirm your password')"
                                                    oninput="setCustomValidity('')"
                                                />
                                                </div>
                                            </div>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn mt-3">Submit</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
</html>
