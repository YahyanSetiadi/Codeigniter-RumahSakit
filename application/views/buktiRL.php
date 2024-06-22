<?php
  // Make sure the $pasien array contains the necessary data
  $no_bukti = isset($pasien['id']) ? $pasien['id'] : 'N/A';
  $nama_pasien = isset($pasien['nama_pasien']) ? $pasien['nama_pasien'] : 'N/A';
  $email = isset($pasien['email']) ? $pasien['email'] : 'N/A';
  $alamat = isset($pasien['alamat']) ? $pasien['alamat'] : 'N/A';
  $tanggal = isset($pasien['tanggal']) ? $pasien['tanggal'] : 'N/A';
  $poli = isset($pasien['poli']) ? $pasien['poli'] : 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>" />
  <title>Bukti Pendaftaran Online - Rumah Sakit Zona Care</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    @page {
      size: A4;
      margin: 20mm;
    }
    body {
      font-family: "Times New Roman", Times, serif;
    }
    .container {
      max-width: 200mm;
      margin-top: 30px;
    }
    .header, .footer {
      text-align: center;
    }
    .content {
      margin-top: 10mm;
    }
    .signature {
      text-align: right;
      margin-top: 50mm;
    }
    hr.thick {
      border: 0;
      height: 4px;
      background: #000;
    }
    .header .col-auto {
      display: flex;
      align-items: center;
    }
    .header img {
      height: 115px;
      margin-left: 60px;
      margin-right: -150px; 
    }
    .header h2 {
      margin: 0; 
    }
    .header p {
      margin-top: 5px; 
    }
    .print-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
    }
    h2 {
        font-weight: bold;
    }
    .table {
      margin-left: 90px;
    }
    .table th, .table td {
      padding: 5px;
    }
    .table th {
      width: 150px; 
    }
    .table td:nth-child(2) {
      text-align: center; 
      width: 10px; 
      white-space: nowrap; 
    }
    .table td:nth-child(3) {
      width: auto; 
    }
  </style>
  <script>
    function printPage() {
      window.print();
    }
  </script>
</head>
<body>
<div class="container">
    <div class="row header align-items-center">
      <div class="col-auto">
        <img src="<?php echo base_url('assets/img/t.png') ?>" alt="Logo" class="mb-3" />
      </div>
      <div class="col text-center">
        <h2>ZenCare</h2>
        <h2>Hospital</h2>
        <p>Alamat: Jl. kp Smlangnauk, NO: 111 222 58</p>
      </div>
    </div>
    <hr class="thick">
    <hr class="thick">
    <div class="content">
      <h4 class="text-center">Bukti Pendaftaran Online</h4>
      <table class="table table-borderless mt-3">
        <tbody>
          <tr>
            <th scope="row">No Bukti</th>
            <td>:</td>
            <td><?php echo $no_bukti; ?></td>
          </tr>
          <!-- <tr>
            <th scope="row">NIK</th>
            <td>:</td>
            <td><?php echo $nik; ?></td>
          </tr> -->
          <tr>
            <th scope="row">Nama Pasien</th>
            <td>:</td>
            <td><?php echo $nama_pasien; ?></td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td>:</td>
            <td><?php echo $email; ?></td>
          </tr>
          <tr>
            <th scope="row">Alamat</th>
            <td>:</td>
            <td><?php echo $alamat; ?></td>
          </tr>
          <tr>
            <th scope="row">Tanggal</th>
            <td>:</td>
            <td><?php echo $tanggal; ?></td>
          </tr>
          <tr>
            <th scope="row">Poli</th>
            <td>:</td>
            <td><?php echo $poli; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <button class="btn btn-primary print-button" onclick="printPage()">Print</button>
</body>
</html>
