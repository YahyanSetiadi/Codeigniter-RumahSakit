<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Admin - Patient Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assetsAdmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="<?= base_url('assetsAdmin/css/sb-admin-2.min.css') ?>" rel="stylesheet" />
    <style>
        #wrapper {
            background-color: #00bca9;
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #00bca9;">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ZenCare Hospital</div>
            </a>
            <hr class="sidebar-divider my-0" />
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('Admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider" />
            <div class="sidebar-heading">Interface</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('Admin/pasien') ?>">
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

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('Admin/dataRecord') ?>">
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
                <a class="nav-link collapsed" href="<?= base_url('Admin/pesan') ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Massage</span>
                </a>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form class="form-inline" method="post" action="<?= base_url('Admin/logout') ?>">
                                <button class="btn btn-danger" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Patient Data</h1>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addPatientModal">Add Data</button>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Patient Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th>Phone Number</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($patients)) : ?>
                                                    <?php foreach ($patients as $patient) : ?>
                                                        <tr>
                                                            <td><?= $patient['NIK'] ?></td>
                                                            <td><?= $patient['nama_pasien'] ?></td>
                                                            <td><?= $patient['tanggal_lahir'] ?></td>
                                                            <td><?= $patient['jenis_kelamin'] ?></td>
                                                            <td><?= $patient['no_hp'] ?></td>
                                                            <td><?= $patient['alamat'] ?></td>
                                                            <td>
                                                                <a href="<?= base_url('Admin/edit_pasien/' . $patient['NIK']) ?>" class="btn btn-primary">Edit</a> |
                                                                <a href="<?= base_url('Admin/delete/' . $patient['NIK']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?');">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="7">No records found</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <?php if($this->session->flashdata('success')): ?>
                                            <div class="alert alert-success">
                                                <?= $this->session->flashdata('success'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPatientModalLabel">Add Patient Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Admin/add_pasien') ?>" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_pasien" class="form-label">Patient's name</label>
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Date of birth</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Gender</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="L">Male</option>
                                    <option value="P">Famale</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Address</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Data</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('assetsAdmin/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assetsAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assetsAdmin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('assetsAdmin/js/sb-admin-2.min.js') ?>"></script>
<script src="<?= base_url('assetsAdmin/vendor/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('assetsAdmin/js/demo/chart-area-demo.js') ?>"></script>
<script src="<?= base_url('assetsAdmin/js/demo/chart-pie-demo.js') ?>"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
</body>
</html>
