<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Admin - Edit Record Pasien</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: 1px solid #00bca9;
        }
        .card-header {
            background-color: #00bca9;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-header h2 {
            margin: 0;
        }
        .btn-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
        }
        .btn {
            background-color: #00bca9;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Update Medical Record</h2>
            <a href="<?php echo site_url('Admin/dataRecord'); ?>" class="btn-close">&times;</a>
        </div>
        <div class="card-body">
            <?php echo form_open('Admin/edit_record/' . $record['NIK']); ?>
                <input type="hidden" name="nik" value="<?php echo $record['NIK']; ?>">

                <div class="form-group mt-2">
                    <label for="nama_pasien">Patient name:</label>
                    <input type="text" class="form-control" name="nama_pasien" value="<?php echo $record['nama']; ?>">
                </div>

                <div class="form-group">
                    <label for="tanggal">Date Reservation:</label>
                    <input type="date" class="form-control" name="tanggal" value="<?php echo $record['tanggal']; ?>">
                </div>

                <div class="form-group">
                    <label for="diagnosis">Diagnosis:</label>
                    <input type="text" class="form-control" name="diagnosis" value="<?php echo $record['diagnosis']; ?>">
                </div>

                <div class="form-group">
                    <label for="obat">Drug:</label>
                    <input type="text" class="form-control" name="obat" value="<?php echo $record['obat']; ?>">
                </div>

                <button type="submit" class="btn">Save Changes</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS dan Popper.js (diperlukan untuk komponen Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
