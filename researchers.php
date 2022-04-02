<?php

session_start();

include 'includes/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$statement = $connection->prepare("SELECT * FROM researcher_profile");
$statement->execute();
$result = $statement->get_result();
$researchers = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

$maincssVersion = filemtime('styles/custom/main-style.css');
$pagecssVersion = filemtime('styles/custom/pages/researchers-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Researchers</title>
    <?php include_once 'assets/fonts/google-fonts.php' ?>

    <script src="scripts/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/pages/researchers-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <?php include_once 'includes/header.php' ?>


    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Our Researchers</h1>
        </div>
    </section>

    <section class="researchers">
        <div class="container p-5">
            <div class="row my-3 d-lg-none">

                <h3>On this page</h3>
                <hr>

                <select class="form-select" aria-label="Default select example" id="dropdownShowResearchersOption">
                    <option value="sr" selected>Senior Researchers</option>
                    <option value="jr">Junior Researchers</option>
                    <option value="jra">Junior Associate Researchers</option>
                    <option value="nr">Novice Researchers</option>
                    <?php if ($_SESSION['userType'] === "admin") {
                        echo '<option value="add">Add New Profile</option>';
                    } ?>
                </select>
            </div>

            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text px-3" id="seniorResearchersText">Senior Researchers</p>
                    <hr>
                    <p class="side-menu-text px-3" id="juniorResearchersText">Junior Researchers</p>
                    <hr>
                    <p class="side-menu-text px-3" id="juniorAssociateText">Junior Associate Researchers</p>
                    <hr>
                    <p class="side-menu-text px-3" id="noviceText">Novice Researchers</p>
                    <hr>

                    <?php

                    if ($_SESSION['userType'] === "admin") {
                        echo '
                        <!-- <button class="btn rounded-0 button-add-profile w-100" id="buttonAddProfile"><i class="fas fa-plus"></i> Add Profile</button> -->
                        <button class="btn rounded-0 button-add-profile w-100" id="buttonAddProfile">+ Add Profile</button>
                        ';
                    }

                    ?>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="seniorResearchersPanel">
                    <h1 class="my-2">Senior Researchers</h1>
                    <hr>

                    <div class="row mx-auto">

                        <?php foreach ($researchers as $key => $researcher) {
                            if ($researcher['type'] == "Senior Researcher") {
                                echo "<div class='col-sm-12 col-md-6'><a href='researchers/view.php?id={$researcher['researcher_id']}' class='researchers-link'>
                                            <div class='box my-2'>
                                                <div class='row py-3 researcher'>
                                                    <div class='col-3 avatar'><img src='src/{$researcher['researcher_image']}' alt='' width='58px'></div><div class='col-9 d-flex align-items-center'>
                                                        <p class='h5 researcher-name'>{$researcher['name']}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a></div>";
                            }
                        }
                        ?>

                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="juniorResearchersPanel" hidden>
                    <h1 class="my-2">Junior Researchers</h1>
                    <hr>

                    <div class="row mx-auto">
                        <?php foreach ($researchers as $key => $researcher) {
                            if ($researcher['type'] == "Junior Researcher") {
                                echo "<div class='col-sm-12 col-md-6'><a href='researchers/view.php?id={$researcher['researcher_id']}' class='researchers-link'>
                                            <div class='box my-2'>
                                                <div class='row py-3 researcher'>
                                                    <div class='col-3 avatar'><img src='../src/{$researcher['researcher_image']}' alt='' width='58px'></div><div class='col-9 d-flex align-items-center'>
                                                        <p class='h5 researcher-name'>{$researcher['name']}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a></div>";
                            }
                        }
                        ?>
                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="juniorAssociatePanel" hidden>
                    <h1 class="my-2">Junior Associate Researchers</h1>
                    <hr>

                    <div class="row mx-auto">
                        <?php foreach ($researchers as $key => $researcher) {
                            if ($researcher['type'] == "Junior Associate Researcher") {
                                echo "<div class='col-sm-12 col-md-6'><a href='researchers/view.php?id={$researcher['researcher_id']}' class='researchers-link'>
                                            <div class='box my-2'>
                                                <div class='row py-3 researcher'>
                                                    <div class='col-3 avatar'><img src='../src/{$researcher['researcher_image']}' alt='' width='58px'></div><div class='col-9 d-flex align-items-center'>
                                                        <p class='h5 researcher-name'>{$researcher['name']}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a></div>";
                            }
                        }
                        ?>
                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="novicePanel" hidden>
                    <h1 class="my-2">Novice Researchers</h1>
                    <hr>

                    <div class="row mx-auto">
                        <?php foreach ($researchers as $key => $researcher) {
                            if ($researcher['type'] == "Novice Researcher") {
                                echo "<div class='col-sm-12 col-md-6'><a href='researchers/view.php?id={$researcher['researcher_id']}' class='researchers-link'>
                                            <div class='box my-2'>
                                                <div class='row py-3 researcher'>
                                                    <div class='col-3 avatar'><img src='../src/{$researcher['researcher_image']}' alt='' width='58px'></div><div class='col-9 d-flex align-items-center'>
                                                        <p class='h5 researcher-name'>{$researcher['name']}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a></div>";
                            }
                        }
                        ?>
                    </div>

                </div>


                <?php

                if ($_SESSION['userType'] === "admin") {
                    echo '<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="addNewResearcherPanel" hidden>
                    <h1 class="my-2">Add New Profile</h1>
                    <hr>

                    <div class="row mx-auto">
                        <div class="col-sm-12">

                            <form name="add-researcher-form">
                                <div class="row my-3">
                                    <div class="col-sm-12">
                                        <div class="text-start my-2">
                                            <label class="fw-bold">Select Profile Photo</label>
                                        </div>
                                        <div class="d-flex justify-content-start">
                                            <div id="display_image" class="my-2">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start">
                                            <input class="my-3" type="file" id="image_input" accept=".png, .jpg, .jpeg, .svg" name="researcherImage" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-12 col-md-6">
                                        <label class="py-2 fw-bold">Researcher Type<span class="text-danger"> *</span></label>
                                        <select class="form-select my-2" aria-label="Default select example" id="dropdownResearcherType" name="researcherType">
                                            <option value="Senior Researcher" selected>Senior Researcher</option>
                                            <option value="Junior Researcher">Junior Researcher</option>
                                            <option value="Junior Associate Researcher">Junior Associate Researcher</option>
                                            <option value="Novice Researcher">Novice Researcher</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                        <label class="py-2 fw-bold">College/Department<span class="text-danger"> *</span></label>
                                        <select class="form-select" aria-label="Default select example" id="dropdownResearcherDepartment" name="researcherDepartment">
                                            <option value="Basic Education Department" selected>Basic Education Department</option>
                                            <option value="Senior High School Department">Senior High School Department</option>
                                            <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                                            <option value="College of Business and Accountancy">College of Business and Accountancy</option>
                                            <option value="College of Computer Studies">College of Computer Studies</option>
                                            <option value="College of Criminology">College of Criminology</option>
                                            <option value="College of Education">College of Education</option>
                                            <option value="College of Engineering, Architecture, and Aviation">College of Engineering, Architecture, and Aviation</option>
                                            <option value="College of International Hospitality Management">College of International Hospitality Management</option>
                                            <option value="College of Maritime Education">College of Maritime Education</option>
                                            <option value="Graduate School">Graduate School</option>
                                            <option value="Community Outreach Department">Community Outreach Department</option>
                                            <option value="Human Resource Department">Human Resource Department</option>
                                            <option value="Information Technology Services">Information Technology Services</option>
                                            <option value="International and External Affairs">International and External Affairs</option>
                                            <option value="Library">Library</option>
                                            <option value="Marketing Department">Marketing Department</option>
                                            <option value="Quality Assurance Office">Quality Assurance Office</option>
                                            <option value="Research and Development Center">Research and Development Center</option>
                                            <option value="Student Personnel Services">Student Personnel Services</option>
                                            <option value="University Registrar">University Registrar</option>
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
                                    <div class="col" id="published-works-container">
                                        <label class="py-2 my-2 fw-bold">Published Works</label>
                                        <div class="publishedWork border p-3 mt-0 mb-3">
                                            <label class="fw-bold">Title</label>
                                            <input type="text" class="form-control" name="researchTitle[]" required>
                                            <label class="py-2 fw-bold">Link</label>
                                            <input type="url" class="form-control" placeholder="http://example.com" name="researchLink[]" required>
                                            <div class="text-end remove">
                                                <button type= "button" class="btn btn-link my-2 remove-button" onclick=removeWork(event)><i class="fas fa-trash-alt"></i>
                                                Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <!-- <button class="btn rounded-0 button-add-work w-100" id="buttonAddWork"><i class="fas fa-plus"></i> Add Work</button> -->
                                        
                                        <div class="text-end">
                                            <button type = "button" class="btn btn-link rounded-0 button-add-work" id="buttonAddWork" onclick="addWork()">Add a Published Work</button>
                                            <button class="btn rounded-0 button-save" id="buttonSave"><i class="fas fa-save me-2"></i> Save Record</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>';
                }

                ?>

            </div>
        </div>
    </section>

    <?php include_once 'includes/footer.php' ?>


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

    <script>
        $(document).ready(function() {
            /* on load */
            $("#seniorResearchersText").css({
                "border-left": "thick solid #012265",
            });
            /* on load */
            $("#seniorResearchersText").click(function() {
                $("#seniorResearchersPanel").prop('hidden', false);
                $("#juniorResearchersPanel, #juniorAssociatePanel, #novicePanel, #addNewResearcherPanel").prop('hidden', true);
                $("#seniorResearchersText").css({
                    "border-left": "thick solid #012265",
                });
                $("#juniorResearchersText, #juniorAssociateText, #noviceText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#juniorResearchersText").click(function() {
                $("#juniorResearchersPanel").prop('hidden', false);
                $("#seniorResearchersPanel, #juniorAssociatePanel, #novicePanel, #addNewResearcherPanel").prop('hidden', true);
                $("#juniorResearchersText").css({
                    "border-left": "thick solid #012265",
                });
                $("#seniorResearchersText, #juniorAssociateText, #noviceText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#juniorAssociateText").click(function() {
                $("#juniorAssociatePanel").prop('hidden', false);
                $("#seniorResearchersPanel, #juniorResearchersPanel, #novicePanel, #addNewResearcherPanel").prop('hidden', true);
                $("#juniorAssociateText").css({
                    "border-left": "thick solid #012265",
                });
                $("#seniorResearchersText, #juniorResearchersText, #noviceText").css({
                    "border-left": "thick none #012265",
                });
            });
            $("#noviceText").click(function() {
                $("#novicePanel").prop('hidden', false);
                $("#seniorResearchersPanel, #juniorResearchersPanel, #juniorAssociatePanel, #addNewResearcherPanel").prop('hidden', true);
                $("#noviceText").css({
                    "border-left": "thick solid #012265",
                });
                $("#seniorResearchersText, #juniorResearchersText, #juniorAssociateText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#buttonAddProfile").click(function() {
                $("#addNewResearcherPanel").prop('hidden', false);
                $("#seniorResearchersPanel, #juniorResearchersPanel, #juniorAssociatePanel, #novicePanel").prop('hidden', true);
                $("#seniorResearchersText, #juniorResearchersText, #juniorAssociateText, #noviceText").css({
                    "border-left": "thick none #012265",
                });
            });

            $('#dropdownShowResearchersOption').on('change', function() {
                if (this.value == 'sr') {
                    $("#seniorResearchersPanel").prop('hidden', false);
                    $("#juniorResearchersPanel, #juniorAssociatePanel, #novicePanel, #addNewResearcherPanel").prop('hidden', true);
                    $("#seniorResearchersText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#juniorResearchersText, #juniorAssociateText, #noviceText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'jr') {
                    $("#juniorResearchersPanel").prop('hidden', false);
                    $("#seniorResearchersPanel, #juniorAssociatePanel, #novicePanel, #addNewResearcherPanel").prop('hidden', true);
                    $("#juniorResearchersText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#seniorResearchersText, #juniorAssociateText, #noviceText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'jra') {
                    $("#juniorAssociatePanel").prop('hidden', false);
                    $("#seniorResearchersPanel, #juniorResearchersPanel, #novicePanel, #addNewResearcherPanel").prop('hidden', true);
                    $("#juniorAssociateText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#seniorResearchersText, #juniorResearchersText, #noviceText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'nr') {
                    $("#novicePanel").prop('hidden', false);
                    $("#seniorResearchersPanel, #juniorResearchersPanel, #juniorAssociatePanel, #addNewResearcherPanel").prop('hidden', true);
                    $("#noviceText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#seniorResearchersText, #juniorResearchersText, #juniorAssociateText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'add') {
                    $("#addNewResearcherPanel").prop('hidden', false);
                    $("#seniorResearchersPanel, #juniorResearchersPanel, #juniorAssociatePanel, #novicePanel").prop('hidden', true);
                    $("#seniorResearchersText, #juniorResearchersText, #juniorAssociateText, #noviceText").css({
                        "border-left": "thick none #012265",
                    });
                }
            });

        });
    </script>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="scripts/bootstrap/bootstrap.js"></script>
    <script type="text/javascript">
        $("form[name='add-researcher-form']").on("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                    method: "POST",
                    url: "src/process/add-researcher.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                })
                .done(function(data) {
                    if(data.response==='success'){
                        window.location.reload();
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
                                            <input type="url" class="form-control" placeholder="http://example.com" name="researchLink[]" required>
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