<!--Header Section-->

<section class="header navbar navbar-dark bg-dark static-top" style="font-family: 'Roboto';">
    <div class="container p-2">
        <div class="d-flex align-items-center">
            <a href="../navigation/home.php"><img src="../../../assets/images/core/saliksik-logo.png" id="header-logo" alt="Saliksik Logo" class="img-fluid"></a>
            <!-- <h1 class="text-white" id="header-text">UNIVERSITY OF<br>PERPETUAL<br>HELP SYSTEM LAGUNA</h1> -->
        </div>

        <div class="navbar navbar-expand-md">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 p-1 d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link" href="../navigation/home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../navigation/repository.php">REPOSITORY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../navigation/statistics.php">STATISTICS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../navigation/submit.php">SUBMIT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../navigation/researchers.php">RESEARCHERS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../navigation/contact.php">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../navigation/about.php">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../navigation/faqs.php">FAQs</a>
                </li>
            </ul>
            <div class="dropdown d-none d-lg-block">
                <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle fa-2x me-2 my-2" style="color: white;"></i></button>
                <?php
                if ($_SESSION['userType'] === "admin") {
                    echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item my-1 d-flex align-items-center" href="../users/admin-profile.php"><i class="far fa-user me-2"></i>Account</a></li>
                    <li><a class="dropdown-item my-1 d-flex align-items-center" href="../users/admin-submissions.php"><i class="far fa-file-pdf me-2"></i>Submissions</a></li>
                    <li><a class="dropdown-item my-1 d-flex align-items-center" href="../users/admin-library.php"><i class="far fa-file-alt me-2"></i>Library</a></li>
                    <li><a class="dropdown-item my-1 d-flex align-items-center" href="../users/admin-system-logs.php"><i class="far fa-clipboard me-2"></i>System Logs</a></li>
                    <li><a class="dropdown-item my-1 d-flex align-items-center text-danger" href="../../process/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Sign out</a></li>
                </ul>';
                } else {
                    echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item my-1 d-flex align-items-center" href="../users/user-profile.php"><i class="far fa-user me-2"></i>My Profile</a></li>
                    <li><a class="dropdown-item my-1 d-flex align-items-center" href="../users/user-library.php"><i class="far fa-bookmark me-2"></i>My Library</a></li>
                    <li><a class="dropdown-item my-1 d-flex align-items-center" href="../users/user-submissions.php"><i class="far fa-file-alt me-2"></i>My Submissions</a></li>
                    <li><a class="dropdown-item my-1 d-flex align-items-center text-danger" href="../../process/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Sign out</a></li>
                    </ul>';
                }
                ?>

            </div>
            <button class="btn d-sm-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span class="navbar-toggler-icon"></span></button>
        </div>
    </div>
</section>
<div style="background-color: rgba(255, 222, 0, 1);">
    <br>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <div class="d-flex align-items-center">
            <a href="../navigation/home.php"><img src="../../../assets/images/core/saliksik-logo.png" id="header-logo" alt="Saliksik Logo" class="img-fluid"></a>
        </div>
        <!-- <h5 id="offcanvasRightLabel" style="color: white;">SALIKSIK:<br>UPHSL Research Repository</h5> -->
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div style="background-color: rgba(255, 222, 0, 1);">
        <br>
    </div>
    <div class="offcanvas-body">


        <?php
        if ($_SESSION['userType'] === "admin") {
            echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0 p-1">';
            echo '<li class="nav-item"><h4> ' . $_SESSION["fullName"] . '</strong></h4> </li>';
            echo '
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center offcanvas-link-color" href="../users/admin-profile.php"><i class="far fa-user me-2"></i>Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center offcanvas-link-color" href="../users/admin-submissions.php"><i class="far fa-file-pdf me-2"></i>Submissions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center offcanvas-link-color" href="../users/admin-library.php"><i class="far fa-file-alt me-2"></i>Library</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center offcanvas-link-color" href="../users/admin-system-logs.php"><i class="far fa-clipboard me-2"></i>System Logs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center offcanvas-signout-link-color" href="../../process/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Sign out</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/home.php">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/repository.php">REPOSITORY</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/statistics.php">STATISTICS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/submit.php">SUBMIT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/researchers.php">RESEARCHERS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/contact.php">CONTACT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/about.php">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/faqs.php">FAQs</a>
            </li>

        </ul>';
        } else {
            echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0 p-1">';
            echo '<li class="nav-item"><h4> ' . $_SESSION["fullName"] . '</strong></h4> </li>';
            echo '<li class="nav-item">
                <a class="nav-link d-flex align-items-center offcanvas-link-color" href="../users/user-profile.php"><i class="far fa-user me-2"></i>My Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center offcanvas-link-color" href="../users/user-library.php"><i class="far fa-bookmark me-2"></i>My Library</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center offcanvas-link-color" href="../users/user-submissions.php"><i class="far fa-file-alt me-2"></i>My Submissions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center offcanvas-signout-link-color" href="../../process/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Sign out</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/home.php">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/repository.php">REPOSITORY</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/statistics.php">STATISTICS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/submit.php">SUBMIT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/researchers.php">RESEARCHERS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/contact.php">CONTACT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/about.php">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link offcanvas-link-color" href="../navigation/faqs.php">FAQs</a>
            </li>

        </ul>';
        }
        ?>
        <hr>
    </div>
</div>