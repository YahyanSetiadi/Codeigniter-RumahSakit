<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Input Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo base_url('assetsAdmin/CSS/input.css') ?>" />
</head>
<body style="background-color: #eee">
<section>
    <div class="card" style="height: 37.5rem; margin-left: 485px;">
        <a href="<?php echo base_url('Admin/dataRecord') ?>" class="btn-close" aria-label="Close" style="margin: 10px 0 0 525px"></a>
        <div class="card-body">
            <h3 class="card-title mt-2 text-center">Record <span style="color: #00cba9">Patient</span></h3>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
            <form class="mx-1 mx-md-4" action="<?php echo base_url('Admin/proses_inputR'); ?>" method="post">
                <div class="mb-4">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <input type="text" id="NIK" name="NIK" class="form-control" placeholder="NIK" required
                                   oninvalid="this.setCustomValidity('NIK cannot be empty')"
                                   oninput="setCustomValidity('')"/>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Name" required/>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <input type="text" id="tanggal" name="tanggal" class="form-control" placeholder="Reservation Date"
                                   onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label for="" class="mb-1">Diagnosis</label>
                            <textarea id="diagnosis" name="diagnosis" rows="4" cols="60" class="form-control" placeholder="Diagnosis" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lock fa-lg me-1 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <select name="obat" id="obat" class="form-control w-100 text-start" required>
                                <option value="" class="text-start">Medicine</option>
                                <option value="norvask">Norvask (Poli Jantung)</option>
                                <option value="cardio aspirin">Cardio Aspirin (Poli Jantung)</option>
                                <option value="tensicap">Tensicap (Poli Jantung)</option>
                                <option value="kortikosteroid">Kortikosteroid (Poli THT)</option>
                                <option value="cevadroxil">Cevadroxil (Poli THT)</option>
                                <option value="sanmol forte">Sanmol Forte (Poli THT)</option>
                                <option value="naphazoline">Naphazoline (Poli Mata)</option>
                                <option value="tetrahydrozoline">Tetrahydrozoline (Poli Mata)</option>
                                <option value="chloramphenicol opthalmic">Chloramphenicol Opthalmic (Poli Mata)</option>
                                <option value="antidepresan">Antidepresan (Poli Psikiatri)</option>
                                <option value="anxioltic">Anxioltic (Poli Psikiatri)</option>
                                <option value="stimulan">Stimulan (Poli Psikiatri)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" class="btn" style="background-color: #00cba9">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
