<?php
// session_start();

// Periksa apakah pengguna sudah login
$isLoggedIn = isset($_SESSION['user_email']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo base_url('assets/img/title.png') ?>">
    <title>Rumah Sakit</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css">

    <!-- Feather Icon-->
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/favicon.ico') ?>" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/CSS/style.css') ?>" />
    <!-- alert -->
    <?php
    // Periksa apakah ada pesan dari session
    if (isset($_SESSION['success_message'])) {
        $message = $_SESSION['success_message'];
        // Hapus pesan dari session agar tidak muncul lagi
        unset($_SESSION['success_message']);
        // Tampilkan alert 
        echo "<script>alert('$message');</script>";
    }
    ?>
    

  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top navbar-color">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="letter-spacing: 1px">
          <div class="zen">
            <label for="" style="margin-bottom: 0; color: #00cba9;"><b>ZenCare</b></label>
            <span style="font-size: 10px; padding-left: 20px; margin-top: -5px; display: block">HOSPITAL</span>
          </div>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav" >
          <ul class="navbar-nav" style="margin-right: 30px;">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#service">Service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#doktor">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
          </ul>
          <?php
            if ($isLoggedIn) {
                // jika udh login muncul profil
                echo '
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="' . base_url('RumahSakit/profil') . '">Profil</a></li>
                        <li><a class="dropdown-item" href="' . base_url('RumahSakit/logout') . '">Logout</a></li>
                    </ul>
                </div>';
            } else {
                // If the user is not logged in, display the login button
                echo '<a class="btn" href="' . base_url('RumahSakit/login') . '" style="background-color: #00cba9; margin-right: 50px;">LogIn</a>';
            }
          ?>

      </div>
    </nav>
    <!-- hero start -->
    <section class="hero" id="home" >
      <div class="hero-container">
        <div class="row g-0">
          <div class="col-md-7">
            <div class="card-body">
              <h1 class="text fw-bold" style="padding-top: 4rem; padding-left: 10rem">
                Get Better Care For Your <span style="color: #00cba9;">Health</span>
              </h1>
              <p class="card-text" style="padding-left: 10rem">
                Prioritize your health! Welcome to the official 
                website of ZenCare Hospital, the best healthcare 
                facility for you and your family
              </p>
              <p class="card-text" style="padding-left: 10rem; margin-top: 1.5rem">
            <?php
              // Periksa apakah pengguna sudah login
              $isLoggedIn = isset($_SESSION['user_email']);

              if ($isLoggedIn) {
                // Jika pengguna sudah login, tampilkan modal pasien baru dan pasien lama
                echo '<a type="button" class="btn" href="#" style="background-color: #00cba9;" data-bs-toggle="modal" data-bs-target="#registerModal">Register &nbsp; <i class="bi bi-journal-text"></i></a>';
              } else {
                // Jika pengguna belum login, tampilkan alert dan arahkan ke halaman login
                echo '<button type="button" class="btn" style="background-color: #00cba9;" onclick="showLoginAlert()">Register &nbsp; <i class="bi bi-journal-text"></i></button>';
              }
            ?>
          </p>            
            </div>
          </div>
          <div class="col-md-5">
            <img src="<?php echo base_url('assets/img/bg-removebg.png') ?>" class="img-fluid rounded-start" alt="..." />
          </div>
        </div>
        
      </div>
    </section>
    <!-- hero end -->
    <!-- Modal hero-->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Select Patient Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <div class="row justify-content-center">
          <div class="col-md-2 col-4 p-1">
            <a href="<?php echo base_url('RumahSakit/register_old') ?>" class="btn d-block">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-clipboard-heart" viewBox="0 0 16 16" style="color: #00cba9;">
                <path fill-rule="evenodd" d="M5 1.5A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5zm5 0a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5z"/>
                <path d="M3 1.5h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2"/>
                <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.31 8 6.982"/>
              </svg><br>Old <span style="color: #00cba9;"> Patient</span>
            </a>
          </div>
          <div class="col-md-2 col-4 p-1">
            <a href="<?php echo base_url('RumahSakit/register_process') ?>" class="btn d-block">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16" style="color: #60b5f2;">
                <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
              </svg><br> New <span style="color: #60b5f2;"> Patient</span>
            </a>
          </div>
          <div class="col-md-2 col-4 p-1">
            <a href="<?php echo base_url('RumahSakit/record_pasien') ?>" class="btn d-block">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16" style="color: red;">
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
              </svg> <br> Medical  <span style="color: red;">Records</span>
            </a>
          </div>
          <div class="col-md-2 col-4 p-1">
            <a href="<?php echo base_url('RumahSakit/jadwal') ?>" class="btn d-block">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16" style="color: #718093;">
              <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
              <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
              <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
            </svg> <br> Doctor's  <span style="color: #718093;">Schedule</span>
            </a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #00cba9;">Close</button>
      </div>
    </div>
  </div>
</div>


      
<section class="page-section mt-5" id="service">
  <div class="container px-4 px-lg-5"><br><br><br><br>
      <h1 class="text-center fw-bold mt-0">At Your <span style="color: #00cba9;">Service</span></h1><br>
      <hr class="divider" />
      <div class="row gx-4 gx-lg-5">
          <div class="col-lg-3 col-md-6 text-center">
              <div class="mt-5">
                  <div class="mb-2"><i class="bi bi-heart-pulse fs-1" style="color: #00cba9;"></i></div>
                  <h3 class="h4 mb-2">Cardiology <br> Clinic </h3>
                  <p class="text-muted mb-3">Description</p>
                  <a href="#" class="decryption" data-toggle="modal" data-target="#serviceUsModal1">Read <i class="bi bi-arrow-right" style="color: #00cba9;"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
              <div class="mt-5">
                  <div class="mb-2"><i class="bi bi-ear fs-1" style="color: #00cba9;"></i></div>
                  <h3 class="h4 mb-2">Otolaryngology Clinic</h3>
                  <p class="text-muted mb-3">Description</p>
                  <a href="#" class="decryption" data-toggle="modal" data-target="#serviceUsModal2">Read <i class="bi bi-arrow-right" style="color: #00cba9;"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
              <div class="mt-5">
                  <div class="mb-2"><i class="bi bi-eye fs-1" style="color: #00cba9;"></i></div>
                  <h3 class="h4 mb-2">Ophthalmology Clinic</h3>
                  <p class="text-muted mb-3">Description</p>
                  <a href="#" class="decryption" data-toggle="modal" data-target="#serviceUsModal3">Read <i class="bi bi-arrow-right" style="color: #00cba9;"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
              <div class="mt-5">
                  <div class="mb-2"><i class="bi bi-balloon-heart fs-1" style="color: #00cba9;"></i></div>
                  <h3 class="h4 mb-2">Psychiatry <br> Clinic</h3>
                  <p class="text-muted mb-3">Description</p>
                  <a href="#" class="decryption" data-toggle="modal" data-target="#serviceUsModal4">Read <i class="bi bi-arrow-right" style="color: #00cba9;"></i></a>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- service end -->
<!-- Service Modal 1 start-->
 <div class="modal fade" id="serviceUsModal1" tabindex="-1" role="dialog" aria-labelledby="serviceUsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aboutUsModalLabel">Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <img src="assets/img/18.jpeg" class="img-fluid rounded-start" alt="satu" />
        <img class="shadow" src="img/Calender.png" alt="" style="position: absolute; top: 1rem; left: 13rem; width: 50%;" /> -->
        <h1 class="text-center fw-bold" style="margin-bottom: 1rem;">
          Cardiology <span style="color: #00cba9;">Clinic</span>
        </h1>
        <p style="text-align: justify; text-indent: 2rem;">
          A Cardiology Clinic is a medical facility or healthcare service specifically focused on addressing heart and vascular health issues. At a Cardiology Clinic, patients can consult with a cardiologist or a medical team specialized in the diagnosis, treatment, and management of cardiovascular conditions.
        </p>
        <p style="text-align: justify; text-indent: 2rem;">
          Services provided by a Cardiology Clinic involve various aspects of heart care, including cardiac examinations, blood pressure monitoring, blood tests to measure lipid levels and heart enzymes, as well as the management of cardiovascular diseases such as coronary heart disease, heart failure, arrhythmias, and others.
         </p>
         <p style="text-align: justify; text-indent: 2rem;">
          Cardiologists at the Cardiology Clinic may also offer advice on healthy lifestyles, the management of cardiovascular risk factors, and provide long-term care to help patients maintain heart health. Typically, Cardiology Clinics work in collaboration with general practitioners or family doctors to provide holistic and integrated care.
          </p>
          <p style="text-align: justify; text-indent: 2rem;">
            When someone experiences symptoms or has risk factors related to heart disease, the Cardiology Clinic can be the appropriate place to receive evaluation and specific treatment for cardiovascular conditions.
        </p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #00cba9;">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Service Modal 1 end-->
<!-- Service Modal 2 start-->
 <div class="modal fade" id="serviceUsModal2" tabindex="-1" role="dialog" aria-labelledby="serviceUsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aboutUsModalLabel">Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <img src="assets/img/18.jpeg" class="img-fluid rounded-start" alt="satu" />
        <img class="shadow" src="img/Calender.png" alt="" style="position: absolute; top: 1rem; left: 13rem; width: 50%;" /> -->
        <h1 class="text-center fw-bold" style="margin-bottom: 1rem;">
          Otolaryngology <span style="color: #00cba9;">Clinic</span>
        </h1>
        <p style="text-align: justify; text-indent: 2rem;">
          An Otolaryngology Clinic is a medical facility or healthcare center that specializes in addressing health issues related to the ears, nose, throat, and other structures of the head and neck. The medical field that focuses on this specialization is known as otolaryngology.
        </p>
        <p style="text-align: justify; text-indent: 2rem;">
          In an Otolaryngology Clinic, patients can consult with an otolaryngologist or a medical team with expertise in the diagnosis, treatment, and management of various health conditions, such as:
         </p>
         <p style="text-align: justify;">
          1. Ear Disorders: Ear infections, hearing impairments, tinnitus (ringing in the ears), and other issues.
<br>
          2. Nose and Sinus Disorders: Nasal infections, allergies, nasal polyps, sinusitis, and other disorders.
<br>
          3. Throat and Upper Respiratory Tract Disorders: Throat infections, voice disorders, tonsils, adenoids, and other respiratory issues.
<br>
          4. Head and Neck Conditions: Head and neck tumors, salivary gland disorders, and other structural problems.
          </p>
          <p style="text-align: justify; text-indent: 2rem;">
            The Otolaryngology Clinic provides various services, including physical examinations, image-based diagnoses (such as endoscopy), medical procedures, and therapies. Otolaryngologists may also offer advice on postoperative care, speech therapy, and the management of chronic symptoms.
        </p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #00cba9;">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Service Modal 2 end-->
<!-- Service Modal 3 start-->
 <div class="modal fade" id="serviceUsModal3" tabindex="-1" role="dialog" aria-labelledby="serviceUsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aboutUsModalLabel">Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <img src="assets/img/18.jpeg" class="img-fluid rounded-start" alt="satu" />
        <img class="shadow" src="img/Calender.png" alt="" style="position: absolute; top: 1rem; left: 13rem; width: 50%;" /> -->
        <h1 class="text-center fw-bold" style="margin-bottom: 1rem;">
          Ophthalmology <span style="color: #00cba9;">Clinic</span>
        </h1>
        <p style="text-align: justify; text-indent: 2rem;">
          An Ophthalmology Clinic is a medical facility or healthcare center that specializes in addressing eye health issues. In an Ophthalmology Clinic, patients can consult with an eye specialist or a medical team with specific knowledge and skills in the diagnosis, treatment, and management of various eye conditions.
        </p>
        <p style="text-align: justify; text-indent: 2rem;">
          Some common eye conditions addressed in an Ophthalmology Clinic include:
         </p>
         <p style="text-align: justify;">
          1. Refractive Errors: Such as myopia (nearsightedness), hyperopia (farsightedness), and astigmatism. <br>
          2. Chronic Eye Diseases: Such as glaucoma, diabetic retinopathy, and macular degeneration. <br>
          3. Eye Infections: Conjunctivitis (pink eye), keratitis, and other infections. <br>
          4. Eyelid and Under-Eye Issues: Such as blepharitis or conditions related to eyelid inflammation. <br>
          5. Eye Surgery: Ophthalmology Clinics also provide surgical services for conditions such as cataracts or pterygium.
          </p>
          <p style="text-align: justify; text-indent: 2rem;">
            Services at an Ophthalmology Clinic include comprehensive eye examinations, intraocular pressure measurements, vision tests, and various other diagnostic procedures. Additionally, eye doctors in an Ophthalmology Clinic can prescribe eyeglasses or contact lenses and provide advice on proper eye care.
        </p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #00cba9;">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Service Modal 3 end-->
<!-- Service Modal 4 start-->
 <div class="modal fade" id="serviceUsModal4" tabindex="-1" role="dialog" aria-labelledby="serviceUsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aboutUsModalLabel">Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <img src="assets/img/18.jpeg" class="img-fluid rounded-start" alt="satu" />
        <img class="shadow" src="img/Calender.png" alt="" style="position: absolute; top: 1rem; left: 13rem; width: 50%;" /> -->
        <h1 class="text-center fw-bold" style="margin-bottom: 1rem;">
          Psychiatry <span style="color: #00cba9;">Clinic</span>
        </h1>
        <p style="text-align: justify; text-indent: 2rem;">     
        A Psychiatry Clinic is a medical facility or healthcare center specifically dedicated to addressing mental health issues and psychiatric disorders. In a Psychiatry Clinic, patients can consult with a psychiatrist or a medical team specializing in the diagnosis, treatment, and management of various mental and emotional conditions.
        </p>
        <p style="text-align: justify; text-indent: 2rem;">
          Some common mental health issues addressed in a Psychiatry Clinic include:
         </p>
         <p style="text-align: justify;">
          1. Anxiety Disorders: Such as generalized anxiety disorder, panic disorders, and phobias <br>
          2. Mood Disorders: Such as depression, bipolar disorders, and other mood disorders. <br>
          3. Psychotic Disorders: Such as schizophrenia <br>
          4. Eating Disorders: Such as anorexia nervosa, bulimia nervosa, and compulsive eating disorders. <br>
          5. Behavioral Disorders: Such as attention-deficit/hyperactivity disorder (ADHD) in children.
          </p>
          <p style="text-align: justify; text-indent: 2rem;">
            Services at a Psychiatry Clinic include mental evaluations, counseling, medication therapy, and cognitive-behavioral therapy. The medical team in a Psychiatry Clinic may also provide support and advice related to stress management, conflict resolution, and coping strategies.
        </p>
          <p style="text-align: justify; text-indent: 2rem;">
            Psychiatry Clinics often collaborate with psychologists, social workers, and other mental health professionals to provide integrated care and support patients in their mental health recovery. This holistic approach may involve both short-term and long-term treatments, depending on the individual needs of the patient.
        </p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #00cba9;">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Service Modal 3 end-->


    
    <!-- about us star -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card mb-3 mt-5" style="width: 100%"> <br><br>
              <div class="row g-0">
                <div class="col-md-5" style="position: relative;">
                  <img src="<?php echo base_url('assets/img/18.jpeg') ?>" class="img-fluid rounded-start" alt="satu" />
                  <img class="shadow" src="img/Calender.png" alt="" style="position: absolute; top: 1rem; left: 13rem; width: 50%;" />
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                    <h1 class="text fw-bold" style="padding-top: 4rem; padding-left: 7rem">
                      About <span style="color: #00cba9;">Us</span>
                    </h1>
                    <p class="card-text" style="padding-left: 7rem; text-align: justify;">
                      Welcome to ZenCare Hospital, where we unite dedication 
                      to health and innovation with sustainability values. Our 
                      facilities create an environment that is sophisticated and 
                      aesthetically comfortable, combining modern technology with 
                      holistic care for each patient. With a comprehensive approach,
                       we empower patients to actively engage in their care through 
                       digital support and easy access to medical information.

                    </p>
                    <p class="card-text" style="padding-left: 7rem; margin-top: 2rem">
                      <a href="#" class="btn" style="background-color: #00cba9;" data-toggle="modal" data-target="#aboutUsModal">Read more</a>
                    </p>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- about us end -->
    <!-- Modal -->
<div class="modal fade" id="aboutUsModal" tabindex="-1" role="dialog" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aboutUsModalLabel">About Hospital</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <img src="assets/img/18.jpeg" class="img-fluid rounded-start" alt="satu" />
        <img class="shadow" src="img/Calender.png" alt="" style="position: absolute; top: 1rem; left: 13rem; width: 50%;" /> -->
        <h1 class="text-center fw-bold" style="margin-bottom: 1rem;">
          About <span style="color: #00cba9;">Us</span>
        </h1>
        <p style="text-align: justify; text-indent: 2rem;">
            Welcome to ZenCare Hospital, where we unite dedication to health and innovation with sustainability values. 
          Our facilities create an environment that is sophisticated and aesthetically comfortable, combining modern 
          technology with holistic care for each patient. With a comprehensive approach, we empower patients to actively 
          engage in their care through digital support and easy access to medical information.
        </p>
        <p style="text-align: justify; text-indent: 2rem;">
            Behind the technology, Our Hospital is known for profound human values. Our medical team is not only clinically 
          skilled but also warm in providing attention and empathy to each patient. We recognize that behind every medical 
          case, there is a unique story that requires special attention.
         </p>
         <p style="text-align: justify; text-indent: 2rem;">
            As part of the community, we hold social responsibility with community health programs and collaborations with 
          charities. We are committed to giving back and ensuring access to quality healthcare for all.
          </p>
          <p style="text-align: justify; text-indent: 2rem;">
            Our Hospital is not just a place for medical care but a partner in your health journey. Grateful for your trust,
          we continue to evolve to meet the health needs of the community with the highest standards and sincere service spirit.
        </p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #00cba9;">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- Card Start -->
<section id="doktor" class="justify-content-center text-center">
  <div class="container mt-5">
    <br><br><br>
    <h1 class="text" style="margin-bottom: 30px;">The <span style="color: #00cba9;">Doctors</span></h1>
    <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="d-flex justify-content-center">
            <div class="card mb-4 shadow" style="width: 18rem;">
              <img src="<?php echo base_url('assets/img/dokter/piduy.jpg') ?>" class="card-img-top rounded" alt="..." style="width: 100%; aspect-ratio: 1/1;">
              <div class="card-body">
                <p class="card-text">Dr. Fadia Izni Adani<br>(17210739)</p>
              </div>
            </div>
            <div class="card mb-4 ms-3 shadow" style="width: 18rem;">
              <img src="<?php echo base_url('assets/img/dokter/yan.jpg') ?>" class="card-img-top rounded" alt="..." style="width: 100%; aspect-ratio: 1/1;">
              <div class="card-body">
                <p class="card-text">Dr. Yahyan Setiadi<br>(17210678)</p>
              </div>
            </div>
            <div class="card mb-4 ms-3 shadow" style="width: 18rem;">
              <img src="<?php echo base_url('assets/img/dokter/yadi.jpg') ?>" class="card-img-top rounded" alt="..." style="width: 100%; aspect-ratio: 1/1;">
              <div class="card-body">
                <p class="card-text">Dr. Ziyad Rifqi Permana<br>(17210746)</p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="d-flex justify-content-center">
            <div class="card mb-4 shadow" style="width: 18rem;">
              <img src="<?php echo base_url('assets/img/dokter/jeng.jpeg') ?>" class="card-img-top rounded" alt="..." style="width: 100%; aspect-ratio: 1/1;">
              <div class="card-body">
                <p class="card-text">Dr. Ajeng Saputri<br>(17210715)</p>
              </div>
            </div>
            <div class="card mb-4 ms-3 shadow" style="width: 18rem;">
              <img src="<?php echo base_url('assets/img/dokter/oca.jpg') ?>" class="card-img-top rounded" alt="..." style="width: 100%; aspect-ratio: 1/1;">
              <div class="card-body">
                <p class="card-text">Dr. Lailatul Qodariyah<br>(17210640)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>

  <!-- Card end -->

      
    <!-- Contact Section Start-->
    <section id="contact" class="contact">
      <h2>Contact<span style="margin-bottom: 3rem;">Us</span> </h2>
      <p>You can send messages in this section</p>

      <div class="row">
        <div class="map-container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126881.52584774737!2d106.81779749999998!3d-6.387848549999987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e95620a297d3%3A0x1cfd4042316fb217!2sKota%20Depok%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1675821286870!5m2!1sid!2sid"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="map"
          ></iframe>
        </div>
        <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo base_url('RumahSakit/pesan') ?>" class="contact-form" method="post">
          <div class="input-group">
              <i data-feather="user"></i>
              <input type="text" placeholder="Name" name="nama" required
              oninvalid="this.setCustomValidity('Please input Your name')"
                oninput="setCustomValidity('')">
          </div>

          <div class="input-group">
              <i data-feather="mail"></i>
              <input type="email" placeholder="E-mail" name="email" required
              oninvalid="this.setCustomValidity('Please input Your Email')"
                oninput="setCustomValidity('')">
          </div>

          <div class="input-group">
              <i data-feather="phone"></i>
              <input type="number" placeholder="Phone Number" name="no" required
              oninvalid="this.setCustomValidity('Please input your phone number')"
              oninput="setCustomValidity('')">
          </div>

          <div class="input-group">
              <i class="bi bi-chat-right"></i>
              <input type="text" placeholder="Message" name="pesan" required
              oninvalid="this.setCustomValidity('Please input your massage')"
              oninput="setCustomValidity('')">
          </div>

          <button type="submit" class="btn">Send</button>
      </form>

      </div>
      
    </section>
    

      <!-- Footer Star-->
      <footer>
        <div class="socials">
          <!-- <a href="#"><i class="bi bi-whatsapp"></i></a> -->
          <a href="#"><i data-feather="instagram"></i></a>
          <a href="#"><i class="bi bi-twitter-x"></i></i></a>
          <a href="#"><i data-feather="facebook"></i></a>
          <a href="#"><i class="bi bi-whatsapp"></i></a>
        </div>
 
        <div class="links">
          <a href="#home">Home</a>
          <a href="#about">About Us</a>
          <a href="#service">Service</a>
          <a href="#contact">Contact Us</a>
        </div>
  
        <div class="credit">
          <p>Created by <a href="">Kelompok-1</a>. | &copy; 2024.</p>
        </div>
      </footer>

      <style>

        footer .socials a:hover .feather-instagram {
            color: #E4405F; /* Instagram color */
        }

        footer .socials a:hover .bi-twitter {
            color: #1DA1F2; /* Twitter color */
        }

        footer .socials a:hover .feather-facebook {
            color: #1877F2; /* Facebook color */
        }

        footer .socials a:hover .bi-whatsapp {
            color: #25D366; /* WhatsApp color */
        }
      </style>
  
      <!-- Footer End-->

      <!-- botton untul scroll top UP -->
      <button onclick="topFunction()" id="myBtn" title="Go to top">
      <i class="bi bi-chevron-double-up">
      </button>

      <style>
        #myBtn {
          display: none; 
          position: fixed; 
          bottom: 20px; 
          right: 30px; 
          z-index: 99; 
          border: none;
          outline: none; 
          background-color: #00cba9;
          color: white; 
          cursor: pointer; 
          padding: 15px; 
          border-radius: 10px; 
          font-size: 15px; 
        }

        #myBtn:hover {
          background-color: #555; 
        }

        .fa-arrow-up {
          font-size: 18px; 
        }
  </style>

  <script>
      // Get the button:
      let mybutton = document.getElementById("myBtn");

      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
      }
    </script>
  

    <!-- ------------------------------------------------------------------------------ -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <!-- Feather Icons-->
    <script>
      feather.replace();
        </script>
    <script src="<?php echo base_url('assets/js/script.js') ?>"></script>
    <!-- Bootstrap JS (Popper.js dan Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      // Fungsi untuk menampilkan alert dan mengarahkan ke halaman login jika belum login
      function showLoginAlert() {
        alert("Please log in first to register.");
        // masuk ke login
        window.location.href = "<?php echo base_url('RumahSakit/login'); ?>";
      }
    </script>
  </body>
</html>
