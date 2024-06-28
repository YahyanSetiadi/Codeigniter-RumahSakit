<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Admin - Patient Register Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assetsAdmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="<?= base_url('assetsAdmin/css/sb-admin-2.min.css') ?>" rel="stylesheet" />
    <style>
        #wrapper {
            background-color: #f8f9fc;
        }

        .print-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .back-button {
            position: fixed;
            bottom: 20px;
            right: 100px;
            z-index: 1000;
            background-color: #00bca9;
        }

        .table thead th {
            background-color: #007bff;
            color: #ffffff;
        }

        .table tfoot th {
            background-color: #e9ecef;
        }

        .header {
            margin-bottom: 30px;
            text-align: center;
        }

        .header img {
            width: 100px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 0;
        }

        .header p {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .report-title {
            text-align: center;
            font-weight: bold;
            font-size: 22px;
            margin-top: 20px;
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>

<body id="page-top">
    <div class="container-fluid">
        <div class="header">
            <img src="<?php echo base_url('assets/img/t.png') ?>" alt="Hospital Logo" style="margin-bottom: 0.5px;">
            <h1>ZenCare Hospital</h1>
            <p>Depok, West Java, 09092</p>
            <p>Phone: (123) 456-7890 | Email: ZenCare@hospital.com</p>
        </div>
        <div class="report-title">
            Patient Register Report
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4 mt-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Name Patient</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Date of Reservation</th>
                                        <th>Poly</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_patients = 0; ?>
                                    <?php if (!empty($dataRegister)) : ?>
                                        <?php foreach ($dataRegister as $register) : ?>
                                            <tr>
                                                <td><?= $register['NIK'] ?></td>
                                                <td><?= $register['nama_pasien'] ?></td>
                                                <td><?= $register['email'] ?></td>
                                                <td><?= $register['alamat'] ?></td>
                                                <td><?= $register['tanggal'] ?></td>
                                                <td><?= $register['poli'] ?></td>
                                            </tr>
                                            <?php $total_patients++; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="6">No records found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">Total Patients</th>
                                        <th><?= $total_patients ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php if ($this->session->flashdata('success')) : ?>
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
    <a href="<?php echo base_url('Admin/dashboard') ?>" type="btn" class="btn btn-primary back-button">Back</a>
    <button class="btn btn-primary print-button" onclick="printPage()">Print</button>

    <!-- JavaScript -->
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
</body>

</html>
