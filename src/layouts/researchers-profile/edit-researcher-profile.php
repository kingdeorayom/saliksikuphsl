<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/researchers-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!--To be changed with the researcher's name-->
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/researchers-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <!-- <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Edit Researcher's Profile</h1>
        </div>
    </section> -->

    <section class="researchers">
        <div class="container p-5">
            <div class="row my-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item prev-dir-breadcrumb">
                            <a href="../../pages/navigation/researchers.php" style="color: #012265; text-decoration:none">
                                Our Researchers
                            </a>
                        </li>
                        <li class="breadcrumb-item prev-dir-breadcrumb" aria-current="page">
                            <a href="#" style="color: #012265; text-decoration:none">
                                <!--Need ata dito ng id or parameter sa link para pag click is babalik sa previous page na may info ng current na ineedit na profile-->
                                <!-- Maybe researcher type and researcher id ? -->
                                Senior Researcher Profile
                            </a>
                        </li>
                        <li class="breadcrumb-item active active-dir-breadcrumb" aria-current="page">
                            Edit Profile
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <h1 class="my-2">Edit Profile</h1>
                <hr class="my-2">
                <div class="row mx-auto">
                    <div class="col-sm-12">

                        <form action="">

                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <label class="py-2 fw-bold">Researcher Type<span class="text-danger"> *</span></label>
                                    <select class="form-select my-2" aria-label="Default select example" id="dropdownResearcherType">
                                        <option value="" selected>Senior Researcher</option>
                                        <option value="">Junior Researcher</option>
                                        <option value="">Junior Associate Researcher</option>
                                        <option value="">Novice Researcher</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-6 my-2">
                                    <label class="py-2 fw-bold">College/Department<span class="text-danger"> *</span></label>
                                    <select class="form-select" aria-label="Default select example" id="dropdownResearcherDepartment">
                                        <option value="" selected>Basic Education Department</option>
                                        <option value="">Senior High School Department</option>
                                        <option value="">College of Arts and Sciences</option>
                                        <option value="">College of Business and Accountancy</option>
                                        <option value="">College of Computer Studies</option>
                                        <option value="">College of Criminology</option>
                                        <option value="">College of Education</option>
                                        <option value="">College of Engineering, Architecture, and Aviation</option>
                                        <option value="">College of International Hospitality Management</option>
                                        <option value="">College of Maritime Education</option>
                                        <option value="">Graduate School</option>
                                        <option value="">Community Outreach Department</option>
                                        <option value="">Human Resource Department</option>
                                        <option value="">Information Technology Services</option>
                                        <option value="">International and External Affairs</option>
                                        <option value="">Library</option>
                                        <option value="">Marketing Department</option>
                                        <option value="">Quality Assurance Office</option>
                                        <option value="">Research and Development Center</option>
                                        <option value="">Student Personnel Services</option>
                                        <option value="">University Registrar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="py-2 fw-bold">Name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="textFieldResearcherName" id="textFieldResearcherName" required>
                                    <label class="py-2 fw-bold">Highest Educational Attainment<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="textFieldEducationalAttainment" id="textFieldEducationalAttainment" required>
                                    <label class="py-2 fw-bold">Research Interest<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="textFieldResearchInterest" id="textFieldResearchInterest" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-secondary rounded-0 button-update mt-3" id="buttonUpdate"><i class="fas fa-save me-2"></i> Update Record</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Footer section-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>