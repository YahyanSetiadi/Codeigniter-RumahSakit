<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Edit Doctor Information</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assetsAdmin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <style>
        #wrapper {
            background-color: #00bca9;
            margin-top: 2rem;
        }
    </style>

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assetsAdmin/css/sb-admin-2.min.css'); ?>" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <!-- ... Sidebar Code ... -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <!-- ... Topbar Code ... -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update Doctor Information</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Form for Editing Information -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <form action="<?php echo site_url('Admin/update_dokter/'.$dokter->id); ?>" method="post">
                                        <div class="form-group">
                                            <label for="information">Information</label>
                                            <textarea class="form-control" id="information" name="information"><?php echo $dokter->ket; ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="<?php echo site_url('Admin/dokter'); ?>" class="btn btn-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
    </div>
</body>
</html>
