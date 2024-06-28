<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Edit Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css" rel="stylesheet">
    <style>
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            background: transparent;
            border: none;
            font-size: 20px;
            color: #6c757d;
        }
        .form-container {
            width: 600px; 
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .form-label {
            color: #495057;
        }
        .form-title {
            color: #343a40;
        }
        .bg-custom {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="bg-custom d-flex align-items-center justify-content-center min-vh-100">
    <div class="form-container p-4 position-relative">
        <button class="close-btn" onclick="window.location.href='<?php echo base_url('RumahSakit/profil') ?>'">
            <i class="mdi mdi-close"></i>
        </button>
        <h2 class="text-center font-weight-bold mb-4 form-title">Edit Profile</h2>
        <form method="post" action="<?php echo base_url('RumahSakit/update_profile'); ?>">
            <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <input
                    class="form-control"
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Enter your name"
                    value="<?php echo isset($nama) ? $nama : ''; ?>"
                />
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input
                    class="form-control"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Enter your email"
                    value="<?php echo isset($email) ? $email : ''; ?>"
                />
            </div>
            <div class="form-group">
                <label class="form-label" for="phone">Phone Number</label>
                <input
                    class="form-control"
                    id="phone"
                    name="phone"
                    type="tel"
                    placeholder="Enter your phone number"
                    value="<?php echo isset($phone) ? $phone : ''; ?>"
                />
            </div>
            <div class="form-group">
                <label class="form-label" for="gender">Gender</label>
                <select
                    class="form-control"
                    id="gender"
                    name="gender"
                > 
                    
                   
                    <option value="male" <?php echo isset($gender) && $gender == 'male' ? 'selected' : ''; ?>>Male</option>
                    <option value="female" <?php echo isset($gender) && $gender == 'female' ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="address">Address</label>
                <textarea
                    class="form-control"
                    id="address"
                    name="address"
                    placeholder="Enter your address"
                ><?php echo isset($address) ? $address : ''; ?></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button
                    class="btn"
                    type="submit"
                    style="background-color: #00cba9; color: #fff;"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
