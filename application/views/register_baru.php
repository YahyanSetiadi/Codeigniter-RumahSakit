<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Register</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- my css  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/CSS/register.css'); ?>" />
  </head>
  <body>
    <section class="vh-100" style="background-color: #eee">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <a href="<?php echo base_url('RumahSakit/index') ?>" class="btn-close" aria-label="Close"></a>
                    <p class="text-center h2 fw-bold mb-4 mx-1 mx-md-4 mt-4">
                      Record <br /><span style="color: #60b5f2">Data Patient</span>
                    </p>
                    <?php if($this->session->flashdata('error_message')): ?>
                        <p><?php echo $this->session->flashdata('error_message'); ?></p>
                    <?php endif; ?>
                    <form class="mx-1 mx-md-4" action="<?php echo base_url('RumahSakit/register_process'); ?>" method="post">
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="bi fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" name="nik" id="form3Example1c" class="form-control" placeholder="NIK" 
                          required
                          oninvalid="this.setCustomValidity('Input your NIK')"
                          oninput="setCustomValidity('')"/>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" name="nama" id="form3Example3c" class="form-control" placeholder="Name" 
                          required
                          oninvalid="this.setCustomValidity('Input your Name')"
                          oninput="setCustomValidity('')"/>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="text"
                            name="date"
                            id="form3Example4c"
                            class="form-control"
                            placeholder="Date of Birth"
                            onfocus="(this.type='date')"
                            onblur="(this.type='text')"
                            required
                          oninvalid="this.setCustomValidity('Input your Date of Birth')"
                          oninput="setCustomValidity('')"/>
                          
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-control flex-fill mb-0">
                            <label for="">Gender : </label>
                            <label for="radioOption1" style="padding-left: 1rem">
                                <input
                                    type="radio"
                                    id="radioOption1"
                                    name="gender"
                                    value="Male"
                                    style="accent-color: #60b5f2"
                                    required
                                    oninvalid="this.setCustomValidity('Choose Gender')"
                                    oninput="setCustomValidity('')"/>
                                Male
                            </label>
                            <label for="radioOption2" style="padding-left: 1rem">
                                <input
                                    type="radio"
                                    id="radioOption2"
                                    name="gender"
                                    value="Female"
                                    style="accent-color: #60b5f2"
                                    required
                                    oninvalid="this.setCustomValidity('Choose Gender')"
                                    oninput="setCustomValidity('')"/>
                                Female
                            </label>
                        </div>
                    </div>


                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="number" name="no_hp" id="form3Example3c" class="form-control" placeholder="Phone number" 
                          required
                          oninvalid="this.setCustomValidity('Input your Phone Number')"
                          oninput="setCustomValidity('')"/>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="email" name="email" id="form3Example3c" class="form-control" placeholder="E-mail" 
                          required
                          oninvalid="this.setCustomValidity('Input your E-mail')"
                          oninput="setCustomValidity('')"/>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" name="alamat" id="form3Example3c" class="form-control" placeholder="Address" 
                          required
                          oninvalid="this.setCustomValidity('Input your Address')"
                          oninput="setCustomValidity('')"/>
                        </div>
                      </div>
                     <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-lg" style="background-color: #60b5f2">Register</button>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img src="<?php echo base_url('assets/img/bg-baru.jpg') ?>" class="img-fluid" alt="Sample image" width="450px" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
