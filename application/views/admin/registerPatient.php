<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Admin-RegisterPatient</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assetsAdmin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <style>
      #wrapper {
        background-color: #00bca9;
      }
    </style>

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assetsAdmin/css/sb-admin-2.min.css'); ?>" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #00bca9;">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin/dashboard'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ZenCare Hospital</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('admin/dashboard'); ?>">
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
                <a class="nav-link collapsed" href="<?php echo site_url('admin/dataRecord'); ?>">
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
                <a class="nav-link collapsed" href="<?php echo site_url('admin/pesan'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Massage</span>
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
                                <button class="btn btn-danger" type="submit" formaction="<?= site_url('Admin/logout'); ?>">Logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Register Patient</h1>
                    </div>
                    <!-- tombol resigter pasien -->
                    <div style="margin-bottom: 1rem;">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Register Patient</button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Table for Patient Data -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Name Patient</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Date of Reservation</th>
                                                    <th>Poly</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dataRegister as $register): ?>
                                                    <tr>
                                                        <td><?php echo $register['NIK']; ?></td>
                                                        <td><?php echo $register['nama_pasien']; ?></td>
                                                        <td><?php echo $register['email']; ?></td>
                                                        <td><?php echo $register['alamat']; ?></td>
                                                        <td><?php echo $register['tanggal']; ?></td>
                                                        <td><?php echo $register['poli']; ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="setEditModal(<?php echo htmlspecialchars(json_encode($register), ENT_QUOTES, 'UTF-8'); ?>)">Edit</a> |
                                                            <a href="<?= site_url('Admin/deleteRegister/' . $register['NIK']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                                        </td>
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
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- add modal pasien -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Patient</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Admin/addRegister'); ?>" method="post">
                <div class="form-group">
                    <label for="addNIK">NIK</label>
                    <input type="text" class="form-control" id="addNIK" name="NIK" required>
                </div>
                <div class="form-group">
                    <label for="addNamaPasien">Name Patient</label>
                    <input type="text" class="form-control" id="addNamaPasien" name="nama_pasien" required>
                </div>
                <div class="form-group">
                    <label for="addEmail">Email</label>
                    <input type="email" class="form-control" id="addEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="addAlamat">Address</label>
                    <input type="text" class="form-control" id="addAlamat" name="alamat" required>
                </div>
                <div class="form-group">
                    <label for="addTanggal">Date of Reservation</label>
                    <input type="date" class="form-control" id="addTanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="addPoli">Poly</label>
                    <select name="poli" id="addPoli" class="form-control w-100 text-start">
                    <option value="Cardiology Clinic">Cardiology Clinic (Poli Jantung)</option>
                    <option value="Otolaryngology Clinic">Otolaryngology Clinic (Poli THT)</option>
                    <option value="Ophthalmology Clinic">Ophthalmology Clinic (Poli Mata)</option>
                    <option value="Psychiatry Clinic">Psychiatry Clinic (Poli Psikiatri)</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Patient</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>

    <!-- Edit Modal pasien-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Patient</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= site_url('Admin/editRegister'); ?>" method="post">
              <input type="hidden" name="NIK" id="editNIK">
              <div class="form-group">
                <label for="editNamaPasien">Name Patient</label>
                <input type="text" class="form-control" id="editNamaPasien" name="nama_pasien" required>
              </div>
              <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="email" class="form-control" id="editEmail" name="email" required>
              </div>
              <div class="form-group">
                <label for="editAlamat">Address</label>
                <input type="text" class="form-control" id="editAlamat" name="alamat" required>
              </div>
              <div class="form-group">
                <label for="editTanggal">Date of Reservation</label>
                <input type="date" class="form-control" id="editTanggal" name="tanggal" required>
              </div>
              <div class="form-group">
              <select name="poli" id="poli" class="form-control w-100 text-start">
                    <option value="0" class="text-start"><?php echo $register['poli']; ?></option>
                    <option value="Cardiology Clinic">Cardiology Clinic (Poli Jantung)</option>
                    <option value="Otolaryngology Clinic">Otolaryngology Clinic (Poli THT)</option>
                    <option value="Ophthalmology Clinic">Ophthalmology Clinic (Poli Mata)</option>
                    <option value="Psychiatry Clinic">Psychiatry Clinic (Poli Psikiatri)</option>
                  </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assetsAdmin/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assetsAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assetsAdmin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assetsAdmin/js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assetsAdmin/vendor/chart.js/Chart.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assetsAdmin/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?= base_url('assetsAdmin/js/demo/chart-pie-demo.js'); ?>"></script>

    <script>
      function setEditModal(data) {
        document.getElementById('editNIK').value = data.NIK;
        document.getElementById('editNamaPasien').value = data.nama_pasien;
        document.getElementById('editEmail').value = data.email;
        document.getElementById('editAlamat').value = data.alamat;
        document.getElementById('editTanggal').value = data.tanggal;
        document.getElementById('editPoli').value = data.poli;
      }
    </script>
  </body>
</html>
