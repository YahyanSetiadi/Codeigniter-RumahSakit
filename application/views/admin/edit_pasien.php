<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Edit Data Pasien</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            width: 30rem; 
            margin: 4rem 0 0 0;
            position: relative;
        }
        .centered-container {
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
        }
        h2 {
            text-align: center;
            margin-top: 1.5rem;
            margin-bottom: 2rem;
        }
        span {
            color: #00bca9;
        }
        .close-button {
            position: absolute;
            top: 2px;
            right: 10px;
            color: #000;
            text-decoration: none;
            font-size: 2rem;
        }
    </style>
</head>
<body>

<div class="container centered-container">
    <div class="card shadow-lg">
        <a href="<?php echo site_url('Admin/pasien'); ?>" class="close-button">&times;</a>
        <div class="card-body">
            <h2>Edit <span>Patient Data</span> </h2>
            
            <form method="post" action="<?php echo base_url('Admin/edit_pasien'); ?>">
                <input type="hidden" name="nik" value="<?php echo $patient['NIK']; ?>">
                
                <div class="form-group">
                    <label for="nama_pasien">Patient Name:</label>
                    <input type="text" class="form-control" name="nama_pasien" value="<?php echo $patient['nama_pasien']; ?>">
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Date of Birth:</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $patient['tanggal_lahir']; ?>">
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Gender:</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="Laki-laki" <?php if ($patient['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($patient['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_hp">Phone Number:</label>
                    <input type="tel" class="form-control" name="no_hp" value="<?php echo $patient['no_hp']; ?>">
                </div>

                <div class="form-group">
                    <label for="alamat">Address:</label>
                    <textarea class="form-control" name="alamat"><?php echo $patient['alamat']; ?></textarea>
                </div>

                <button type="submit" class="btn btn" style="background-color: #00bca9">Update</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
