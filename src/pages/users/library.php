<?php

session_start();


if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/profile-style.css');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/profile-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <section class="submit-research profile">
        <div class="container p-5">


            <div class="row">
                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column">
                    <h1 class="my-2 p-2">Library</h1>
                    <hr class="my-3">
                    <div class="col-sm-12 col-md-3 mt-4">
                        <select class="form-select" aria-label="Default select example" id="submission-type-dropdown">
                            <option value="All Items" selected>All Items</option>
                            <option value="Thesis">Thesis</option>
                            <option value="Capstone">Capstone</option>
                            <option value="Dissertation">Dissertation</option>
                            <option value="Journal">Journal</option>
                            <option value="Infographic">Infographic</option>
                            <option value="Research Catalog">Research Catalog</option>
                            <option value="Annual Report">Annual Report</option>
                            <option value="Research Agenda">Research Agenda</option>
                            <option value="RCDP">RCDP</option>
                        </select>
                    </div>

                    <div class="library my-3">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(getBookmarks)
        $("#submission-type-dropdown").on("change",getBookmarks)
        $(".library").on("click", ".add-bookmark", function () {
  var id = $(this).data("id");
  var container = $(this);
  $.ajax({
    method: "GET",
    url: "../../process/add-bookmark.php?id=" + id,
  }).done(function (data) {
    console.log(id, data);
    // TODO add notification when bookmark is added
    container.html("<i class='fas fa-bookmark me-2'></i> Added to Bookmarks");
    container.removeClass("add-bookmark");
    container.addClass("del-bookmark");
  });
});

$(".library").on("click", ".del-bookmark", function () {
  var id = $(this).data("id");
  var container = $(this);
  $.ajax({
    method: "GET",
    url: "../../process/delete-bookmark.php?id=" + id,
  }).done(function (data) {
    console.log(id, data);
    // TODO add notification when bookmark is deleted
    container.html("<i class='far fa-bookmark me-2'></i> Add to Bookmarks");
    container.removeClass("del-bookmark");
    container.addClass("add-bookmark");
  });
});

function getBookmarks(){
    var str = $("#submission-type-dropdown").val();
    $.ajax({
            method:"GET",
            url:"../../process/get-bookmarks.php?type=" +str
        }).done(function(data){
            $(".library").html(data)
        })
    }
    </script>
</body>

</html>