<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assetsAdmin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <style>
        #wrapper {
            background-color: #00bca9;
        }
    </style>

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assetsAdmin/css/sb-admin-2.min.css'); ?>" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #00bca9;">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('Admin/dashboard'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ZenCare Hospital</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('Admin/dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo site_url('Admin/pasien'); ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tabel Pasien</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo site_url('Admin/registerPatient'); ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Table Register</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo site_url('Admin/dataRecord'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Record</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo site_url('admin/dokter'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Doctor</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo site_url('Admin/pesan'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Message</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Tombol Logout -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form class="form-inline">
                                <button class="btn btn-danger" type="submit" formaction="<?php echo site_url('Admin/logout'); ?>">Logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Docter's</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Table for Message Data -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Doctor's Name</th>
                                                    <th>Poly Clinic</th>
                                                    <th>Practice Schedule</th>
                                                    <th>Time</th>
                                                    <th>Information</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dokter as $row): ?>
                                                <tr>
                                                    <td><?php echo $row->id; ?></td>
                                                    <td><?php echo $row->nama_dokter; ?></td>
                                                    <td><?php echo $row->poli; ?></td>
                                                    <td><?php echo $row->jadwal; ?></td>
                                                    <td><?php echo $row->waktu; ?></td>
                                                    <td><?php echo $row->ket; ?></td>
                                                    <td><a class="btn btn-primary" href="<?php echo site_url('Admin/edit_dokter/'.$row->id); ?>">Update</a></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
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

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?php echo site_url('Admin/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url('assetsAdmin/vendor/jquery/jquery.min.js'); ?>"></script>
            <script src="<?php echo base_url('assetsAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url('assetsAdmin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url('assetsAdmin/js/sb-admin-2.min.js'); ?>"></script>

            <!-- Page level plugins -->
            <script src="<?php echo base_url('assetsAdmin/vendor/chart.js/Chart.min.js'); ?>"></script>

            <!-- Page level custom scripts -->
            <script src="<?php echo base_url('assetsAdmin/js/demo/chart-area-demo.js'); ?>"></script>
            <script src="<?php echo base_url('assetsAdmin/js/demo/chart-pie-demo.js'); ?>"></script>
        </div>
    </div>
</body>
</html>
