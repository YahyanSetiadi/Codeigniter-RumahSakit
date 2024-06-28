<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/title.png">
    <title>Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/CSS/data_old.css') ?>" />
</head>
<body style="background-color: #eee">

<section>
<div class="card" style="height: 33rem; ">
    <a href="<?php echo base_url('RumahSakit/index') ?>" class="btn-close" aria-label="Close" style="margin: 10px 0 0 525px"></a>
    <div class="card-body">
        <h3 class="card-title mt-1 text-center"><span class="tex fw-bold" style="color: #00bca0">ZenCare </span>Hospital</h3>
        <form class="mx-1 mx-md-4" id="searchForm" method="post" action="<?php echo base_url('RumahSakit/proses_old'); ?>">
        <div class="mb-1">
            <div class="d-flex flex-row align-items-center">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <p id="patientData">This is the data of registered patients at this hospital:</p>
                </div>
            </div>
        </div>
        <div class="mb-1">
            <?php if (!empty($dataPasien)): ?>
                <?php foreach ($dataPasien as $pasien): ?>
                    <div class='mb-4'>
                        <div class='d-flex flex-row align-items-center'>
                            <i class='fas fa-envelope fa-lg me-3 fa-fw'></i>
                            <div class='form-outline'>
                                <p class='label-text'>Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp<?php echo $pasien['nama_pasien']; ?></p>
                                <p class='label-text'>NIK &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp<?php echo $pasien['NIK']; ?></p>
                                <p class='label-text'>Date of Birth &nbsp&nbsp&nbsp&nbsp: &nbsp<?php echo $pasien['tanggal_lahir']; ?></p>
                                <p class='label-text'>Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp<?php echo $pasien['jenis_kelamin']; ?></p>
                                <p class='label-text'>Phone Number : &nbsp<?php echo $pasien['no_hp']; ?></p>
                                <p class='label-text'>E-mail &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp<?php echo $pasien['email']; ?></p>
                                <p class='label-text'>Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp<?php echo $pasien['alamat']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Data tidak ditemukan.</p>
            <?php endif; ?>
        </div>
        <div class="button-container">
            <a id="backBtn" href="<?php echo base_url('RumahSakit/register_old') ?>" type="button" class="btn" style="background-color: #00cba9">Back</a>
            <a id="nextBtn" href="#" type="button" class="decryption btn" data-toggle="modal" data-target="#serviceUsModal1" style="background-color: #00cba9">Next</a>
        </div>
    </form>
    </div>
</div>
</section>

<div class="modal fade" id="serviceUsModal1" tabindex="-1" role="dialog" aria-labelledby="serviceUsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutUsModalLabel">Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="card-title mt-2 mb-4 text-center">Register <span style="color: #00cba9">Patient</span></h3>
                <form id="registerForm" action="<?php echo base_url('RumahSakit/register_lama'); ?>" method="post">
                    <div class="mb-4">
                        <div class="d-flex flex-row align-items-center">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="hidden" id="nik" name="nik" value="<?php echo $dataPasien[0]['NIK']; ?>" />
                                <input type="hidden" id="nama_pasien" name="nama_pasien" value="<?php echo $dataPasien[0]['nama_pasien']; ?>" />
                                <input type="hidden" id="email" name="email" value="<?php echo $dataPasien[0]['email']; ?>" />
                                <input type="hidden" id="alamat" name="alamat" value="<?php echo $dataPasien[0]['alamat']; ?>" />
                                <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Reservation Date" required />
                            </div>
                        </div>
                    </div>

                    <!-- jam -->
                    <div class="mb-4">
                    <div class="d-flex flex-row align-items-center"> 
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <select name="jam" id="jam" class="form-control w-100 text-start" required>
                            <option value="0" class="text-start">Select Time</option>
                            <option value="08.00 WIB - Finish">08.00 WIB - Finish</option>
                            <option value="14.00 WIB - Finish">14.00 WIB - Finish</option>
                            <option value="15.00 WIB - Finish">15.00 WIB - Finish</option>
                            <option value="19.00 WIB - Finish">19.00 WIB - Finish</option>
                            <option value="16.00 WIB - Finish">16.00 WIB - Finish</option>
                        </select>
                        </div>
                    </div>
                    </div>

                    <!-- poli -->
                    <div class="mb-4">
                        <div class="d-flex flex-row align-items-center"> 
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <select name="poli" id="poli" class="form-control w-100 text-start" required>
                                    <option value="0" class="text-start">Select Poly</option>
                                    <option value="Cardiology Clinic">Cardiology Clinic (Poli Jantung)</option>
                                    <option value="Otolaryngology Clinic">Otolaryngology Clinic (Poli THT)</option>
                                    <option value="Ophthalmology Clinic">Ophthalmology Clinic (Poli Mata)</option>
                                    <option value="Psychiatry Clinic">Psychiatry Clinic (Poli Psikiatri)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="button-container">
                        <button id="registerBtn" type="button" class="btn" style="background-color: #00cba9">Register</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<!-- alert -->
<script>
    document.getElementById('registerBtn').addEventListener('click', function() {
        var form = document.getElementById('registerForm');
        
        if (form.checkValidity()) {
            // Kirim form
            form.submit();
            
            // Tampilkan alert
            var confirmation = confirm("Click OK to display proof of reservation");
            if (confirmation) {
                window.open("<?php echo base_url('RumahSakit/index'); ?>", "_blank");
            }
        } else {
            form.reportValidity();
        }
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    feather.replace();
</script>
<script src="<?php echo base_url('assets/js/script.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
