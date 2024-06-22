<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Patient Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .confirmation-container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .confirmation-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .confirmation-details {
            margin-bottom: 20px;
        }

        .confirmation-details p {
            margin: 10px 0;
        }

        .confirmation-footer {
            text-align: center;
            margin-top: 20px;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 12px;
            background-color: #00cba9;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="confirmation-container">
    <div class="confirmation-header">
        <h2>Record <span style="color: #00cba9">Patient</span></h2>
    </div>
    <div class="confirmation-details">
        <p>NIK: <?php echo $record['NIK']; ?></p>
        <p>Name: <?php echo $record['nama']; ?></p>
        <p>Reversation Date: <?php echo $record['tanggal']; ?></p>
        <p>Diagnosis: <?php echo $record['diagnosis']; ?></p>
        <p>Medicine: <?php echo $record['obat']; ?></p>
    </div>
    <div class="confirmation-footer">
        <p>This is the patient's medical record data</p>
    </div>
    <a href="<?php echo base_url('RumahSakit/index') ?>" class="back-button">Close</a>
</div>

</body>
</html>
