<?php

session_start();

include '../includes/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

if ($_SESSION['userType']!=='admin') {
    // header("location: ../../layouts/general/error.php");
    die();
}

if(!isset($_GET['id'])){
    die();
}

$statement = $connection->prepare("SELECT * FROM researcher_profile WHERE researcher_id = ?");
$statement->bind_param("i",$_GET['id']);
$statement->execute();
$result = $statement->get_result();
$researcher = $result->fetch_assoc();
$statement->close();

$statement = $connection->prepare("SELECT * FROM researcher_works WHERE researcher_ref_id = ?");
$statement->bind_param("i",$_GET['id']);
$statement->execute();
$result = $statement->get_result();
$published_works = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/researchers-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!--To be changed with the researcher's name-->
    <?php include_once '../assets/fonts/google-fonts.php' ?>
    <script src="../scripts/jquery/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/researchers-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once '../includes/header.php' ?>

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
                            <a href="../researchers.php" style="color: #012265; text-decoration:none">
                                Our Researchers
                            </a>
                        </li>
                        <li class="breadcrumb-item prev-dir-breadcrumb" aria-current="page">
                            <a href="view.php?id=<?php echo $researcher['researcher_id'] ?>" style="color: #012265; text-decoration:none">
                            <?php echo htmlspecialchars($researcher['type']) ?> Profile
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
                        <form name="edit-researcher-form" data-id="<?php echo $researcher['researcher_id'] ?>">
                            <div class="row">
                                <div class="text-start my-2">
                                            <label class="fw-bold">Select Profile Photo</label>
                                        </div>
                                        <div class="d-flex justify-content-start">
                                            <div id="display_image" class="my-2" style="background-image: url('../src/<?php echo $researcher['researcher_image']?>'">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start">
                                            <input class="my-3" type="file" id="image_input" accept=".png, .jpg, .jpeg, .svg" name="researcherImage">
                                        </div>
                                <div class="col-sm-12 col-md-6">
                                    
                                    <label class="py-2 fw-bold">Researcher Type<span class="text-danger"> *</span></label>
                                    <select class="form-select my-2" aria-label="Default select example" id="dropdownResearcherType" name="researcherType">
                                        <option value="Senior Researcher" <?php if($researcher['type']=="Senior Researcher"){echo "selected";}?>>Senior Researcher</option>
                                        <option value="Junior Researcher" <?php if($researcher['type']=="Junior Researcher"){echo "selected";}?>>Junior Researcher</option>
                                        <option value="Junior Associate Researcher" <?php if($researcher['type']=="Junior Associate Researcher"){echo "selected";}?>>Junior Associate Researcher</option>
                                        <option value="Novice Researcher" <?php if($researcher['type']=="Novice Researcher"){echo "selected";}?>>Novice Researcher</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-6 my-2">
                                    <label class="py-2 fw-bold">College/Department<span class="text-danger"> *</span></label>
                                    <select class="form-select" aria-label="Default select example" id="dropdownResearcherDepartment" name="researcherDepartment">
                                        <option value="Basic Education Department" <?php if($researcher['department']=="Basic Education Department"){echo "selected";}?>>Basic Education Department</option>
                                        <option value="Senior High School Department" <?php if($researcher['department']=="Senior High School Department"){echo "selected";}?>>Senior High School Department</option>
                                        <option value="College of Arts and Sciences" <?php if($researcher['department']=="College of Arts and Sciences"){echo "selected";}?>>College of Arts and Sciences</option>
                                        <option value="College of Business and Accountancy" <?php if($researcher['department']=="College of Business and Accountancy"){echo "selected";}?>>College of Business and Accountancy</option>
                                        <option value="College of Computer Studies" <?php if($researcher['department']=="College of Computer Studies"){echo "selected";}?>>College of Computer Studies</option>
                                        <option value="College of Criminology" <?php if($researcher['department']=="College of Criminology"){echo "selected";}?>>College of Criminology</option>
                                        <option value="College of Education" <?php if($researcher['department']=="College of Education"){echo "selected";}?>>College of Education</option>
                                        <option value="College of Engineering, Architecture, and Aviation" <?php if($researcher['department']=="College of Engineering, Architecture, and Aviation"){echo "selected";}?>>College of Engineering, Architecture, and Aviation</option>
                                        <option value="College of International Hospitality Management" <?php if($researcher['department']=="College of International Hospitality Management"){echo "selected";}?>>College of International Hospitality Management</option>
                                        <option value="College of Maritime Education" <?php if($researcher['department']=="College of Maritime Education"){echo "selected";}?>>College of Maritime Education</option>
                                        <option value="Graduate School" <?php if($researcher['department']=="Graduate School"){echo "selected";}?>>Graduate School</option>
                                        <option value="Community Outreach Department" <?php if($researcher['department']=="Community Outreach Department"){echo "selected";}?>>Community Outreach Department</option>
                                        <option value="Human Resource Department" <?php if($researcher['department']=="Human Resource Department"){echo "selected";}?>>Human Resource Department</option>
                                        <option value="Information Technology Services" <?php if($researcher['department']=="Information Technology Services"){echo "selected";}?>>Information Technology Services</option>
                                        <option value="International and External Affairs" <?php if($researcher['department']=="International and External Affairs"){echo "selected";}?>>International and External Affairs</option>
                                        <option value="Library" <?php if($researcher['department']=="Library"){echo "selected";}?>>Library</option>
                                        <option value="Marketing Department" <?php if($researcher['department']=="Marketing Department"){echo "selected";}?>>Marketing Department</option>
                                        <option value="Quality Assurance Office" <?php if($researcher['department']=="Quality Assurance Office"){echo "selected";}?>>Quality Assurance Office</option>
                                        <option value="Research and Development Center" <?php if($researcher['department']=="Research and Development Center"){echo "selected";}?>>Research and Development Center</option>
                                        <option value="Student Personnel Services" <?php if($researcher['department']=="Student Personnel Services"){echo "selected";}?>>Student Personnel Services</option>
                                        <option value="University Registrar" <?php if($researcher['department']=="University Registrar"){echo "selected";}?>>University Registrar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="py-2 fw-bold">Name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="textFieldResearcherName" id="textFieldResearcherName" value="<?php echo htmlspecialchars($researcher['name']);?>" required>
                                    <label class="py-2 fw-bold">Highest Educational Attainment<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="textFieldEducationalAttainment" id="textFieldEducationalAttainment" value="<?php echo htmlspecialchars($researcher['highest_edu_attainment']);?>" required>
                                    <label class="py-2 fw-bold">Research Interest<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="textFieldResearchInterest" id="textFieldResearchInterest" value="<?php echo htmlspecialchars($researcher['research_interest']);?>" required>
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

                        <form name="published-worked-form" data-id="<?php echo $researcher['researcher_id'] ?>">
                            
                        <div class="row">
                            <div class="col" id="published-works-container">
                                <label class="py-2 my-2 fw-bold">Published Works</label>
                                <?php foreach($published_works as $key => $work):?>
                                <div class="publishedWork border p-3 mt-0 mb-3">
                                    <label class="fw-bold">Title</label>
                                    <input type="text" class="form-control" name="researchTitle[]" value="<?php echo htmlspecialchars($work['research_title']);?>" required>
                                    <label class="py-2 fw-bold">Link</label>
                                    <input type="url" class="form-control" name="researchLink[]" placeholder="http://example.com" value="<?php echo htmlspecialchars($work['research_link']);?>" required>
                                    <div class="text-end remove">
                                        <button type= "button" class="btn btn-link my-2 remove-button" onclick=removeWork(event)><i class="fas fa-trash-alt"></i>
                                        Remove
                                        </button>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="row">
                                    <div class="col">
                                        <!-- <button class="btn rounded-0 button-add-work w-100" id="buttonAddWork"><i class="fas fa-plus"></i> Add Work</button> -->
                                        
                                        <div class="text-end">
                                            <button type = "button" class="btn btn-link rounded-0 button-add-work" id="buttonAddWork" onclick="addWork()">Add a Published Work</button>
                                            <button class="btn rounded-0 button-save" id="buttonSave"><i class="fas fa-save me-2"></i> Save Published Works</button>
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

    <?php include_once '../includes/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>
    <script>
        const image_input = document.querySelector("#image_input");
        image_input.addEventListener("change", function() {
            const reader = new FileReader();
            reader.addEventListener("load", () => {
                const uploaded_image = reader.result;
                document.querySelector("#display_image").style.backgroundImage = `url(${uploaded_image})`;
            });
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    <script type="text/javascript">
        $("form[name='edit-researcher-form']").on("submit", function(event) {
            event.preventDefault();
            var id = $(this).data("id");
            var formData = new FormData(this);
            for(var pair of formData){
                console.log(pair)
            }
            $.ajax({
                    method: "POST",
                    url: "../src/process/edit-researcher.php?id="+id,
                    data: formData,
                    contentType: false,
                    processData: false,
                })
                .done(function(data) {
                    if(data.response=='success'){
                        window.location.href = 'view.php?id='+id;
                    }
                })
        })
        $("form[name='published-worked-form']").on("submit", function(event) {
            event.preventDefault();
            var id = $(this).data("id");
            var formData = new FormData(this);
            $.ajax({
                    method: "POST",
                    url: "../src/process/edit-researcher-works.php?id="+id,
                    data: formData,
                    contentType: false,
                    processData: false,
                })
                .done(function(data) {
                    if(data.response=='success'){
                        window.location.href = 'view.php?id='+id;
                    }
                })
        })

        function removeWork(event) {
            event.target.parentElement.parentElement.remove();
        }

        function addWork(event) {
            $("#published-works-container").append(`<div class="publishedWork border p-3 mt-0 mb-3">
                                            <label class="fw-bold">Title</label>
                                            <input type="text" class="form-control" name="researchTitle[]" required>
                                            <label class="py-2 fw-bold">Link</label>
                                            <input type="url" class="form-control" name="researchLink[]" placeholder="http://example.com" required>
                                            <div class="text-end remove">
                                                <button type= "button" class="btn btn-link my-2 remove-button" onclick=removeWork(event)><i class="fas fa-trash-alt"></i>
                                                Remove
                                                </button>
                                            </div>
                                        </div>`)
        }
        </script>
</body>

</html>