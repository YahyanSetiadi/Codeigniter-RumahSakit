<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>" />
  <title>Bukti Pendaftaran Online - Rumah Sakit Zona Care</title>
  <link
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <style>
    @page {
      size: A4;
      margin: 20mm;
    }
    body {
      font-family: "Times New Roman", Times, serif;
    }
    .container {
      max-width: 800px;
      margin-top: 30px;
    }
    .header, .footer {
      text-align: center;
    }
    .content {
      margin-top: 20px;
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
      height: 100px;
      margin-right: 20px; 
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
    h2, h4 {
      font-weight: bold;
    }
    .table {
      margin-left: 50px;
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
        <p>Alamat: Jl. Kp Smlangnauk, No: 111 222 58</p>
      </div>
    </div>
    <hr class="thick">
    <div class="content">
      <h4 class="text-center">Proof of Online Registration</h4>
      <table class="table table-borderless mt-3">
        <tbody>
          <tr>
            <th scope="row">No</th>
            <td>:</td>
            <td><?php echo $pasien['id']; ?></td>
          </tr>
          <tr>
            <th scope="row">NIK</th>
            <td>:</td>
            <td><?php echo $pasien['NIK']; ?></td>
          </tr>
          <tr>
            <th scope="row">Patient Date</th>
            <td>:</td>
            <td><?php echo $pasien['nama_pasien']; ?></td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td>:</td>
            <td><?php echo $pasien['email']; ?></td>
          </tr>
          <tr>
            <th scope="row">Address</th>
            <td>:</td>
            <td><?php echo $pasien['alamat']; ?></td>
          </tr>
          <tr>
            <th scope="row">Time</th>
            <td>:</td>
            <td><?php echo $pasien['jam']; ?></td>
          </tr>
          <tr>
            <th scope="row">Date Reservation</th>
            <td>:</td>
            <td><?php echo $pasien['tanggal']; ?></td>
          </tr>
          <tr>
            <th scope="row">Poly Clinic</th>
            <td>:</td>
            <td><?php echo $pasien['poli']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <button class="btn btn-primary print-button" onclick="printPage()">Print</button>
</body>
</html>
