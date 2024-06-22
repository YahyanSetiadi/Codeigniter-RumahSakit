<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Practice Schedule</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .header-container img {
            margin-right: 20px;
            width: 50px; /* Ukuran gambar diper kecil */
            height: auto;
        }
        h2 {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <div class="header-container">
                <!-- <img src="<?php echo base_url('assets/img/title.png') ?>" alt="Hospital Logo" class="mb-3" /> -->
                <div>
                    <h2>DOCTOR'S PRACTICE SCHEDULE</h2>
                    <h4>ZenCare HOSPITAL</h4>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead class="table" style="background-color: #00bca9;">
                <tr>
                    <th>ID</th>
                    <th>Doctor's Name</th>
                    <th>Poly Clinic</th>
                    <th>Practice Schedule</th>
                    <th>Time</th>
                    <th>Information</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jadwal)): ?>
                    <?php foreach ($jadwal as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_dokter']; ?></td>
                        <td><?php echo $row['poli']; ?></td>
                        <td><?php echo $row['jadwal']; ?></td>
                        <td><?php echo $row['waktu']; ?></td>
                        <td><?php echo $row['ket']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No data available</td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td></td>
                    <td><a class="btn" href="<?php echo base_url('RumahSakit/index') ?>"><i class="bi bi-arrow-left-circle-fill"></i> Back</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
