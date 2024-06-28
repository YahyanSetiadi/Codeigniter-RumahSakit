<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/CSS/profil.css')?>">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        .profile-label {
            width: 150px;
            font-weight: 600;
        }
        .profile-value {
            color: #6c757d;
        }
        .profile-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .colon {
            width: 10px;
            text-align: center;
        }
        .padding {
            padding: 4rem !important; 
            margin-top: 3rem;
        }
        .card {
            border-radius: 10px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 3px 20px 0 rgba(69, 90, 100, 0.08);
            border: 2px solid #00cba9; 
            margin-bottom: 40px;
            padding: 1rem;
        }
    </style>
</head>
<body>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-8 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <a href="<?php echo base_url('RumahSakit/index') ?>" class="btn-close" aria-label="Close"></a>
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                <form id="uploadForm" enctype="multipart/form-data">
                                    <input type="file" id="profile-image-input" name="profile_image" accept="image/*" style="display: none;" onchange="previewImage(event)">
                                    <div style="position: relative; display: inline-block; cursor: pointer;" onclick="document.getElementById('profile-image-input').click();">
                                        <img id="profile-image" src="<?php echo $profile_image; ?>" alt="User Profile Image" style="width: 100px; height: 100px; border-radius: 50%;">
                                        <div style="position: absolute; bottom: 0; right: 0; background: rgba(0, 0, 0, 0.5); border-radius: 50%; padding: 5px;">
                                            <i data-feather="camera" style="color: white;"></i>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <h6 class="f-w-600"><?php echo $nama; ?></h6>
                                <br>
                                <a href="<?php echo base_url('RumahSakit/profil_edit') ?>" style="color: #fff; text-decoration: none;"><i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16">Update</i></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <h4 style="margin-top: 0.5rem"><i>My Profile</i></h4>
                            <div class="card-block mt-2">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="profile-row">
                                    <div class="profile-label">Full Name</div>
                                    <div class="colon">:</div>
                                    <div class="profile-value"><?php echo $nama; ?></div>
                                </div>
                                <div class="profile-row">
                                    <div class="profile-label">Email</div>
                                    <div class="colon">:</div>
                                    <div class="profile-value"><?php echo $email; ?></div>
                                </div>
                                <div class="profile-row">
                                    <div class="profile-label">Phone Number</div>
                                    <div class="colon">:</div>
                                    <div class="profile-value"><?php echo $phone; ?></div>
                                </div>
                                <div class="profile-row">
                                    <div class="profile-label">Gender</div>
                                    <div class="colon">:</div>
                                    <div class="profile-value"><?php echo $gender; ?></div>
                                </div>
                                <div class="profile-row">
                                    <div class="profile-label">Address</div>
                                    <div class="colon">:</div>
                                    <div class="profile-value"><?php echo $address; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="message" class="text-center mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profile-image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);

        // Auto-submit the form using AJAX
        var formData = new FormData();
        formData.append('profile_image', event.target.files[0]);

        $.ajax({
            url: "<?php echo base_url('RumahSakit/upload'); ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var jsonResponse = JSON.parse(response);
                $('#message').html(jsonResponse.message);
                if (jsonResponse.status === 'success') {
                    $('#profile-image').attr('src', jsonResponse.image_url);
                }
            },
            error: function(xhr, status, error) {
                $('#message').html("An error occurred: " + error);
            }
        });
    }
</script>

<script>
    feather.replace();  
</script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
</html>
