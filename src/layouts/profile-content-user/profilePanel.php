<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page, or to the homepage if already logged in.');
}

$sql = "SELECT department FROM users WHERE user_id = " . $_SESSION['userid'];
$result = $connection->query($sql);

$connection->close();

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="myProfilePanel">
    <h1 class="my-2">About you</h1>
    <hr class="my-4">
    <div class="row">
        <form action="../../process/update-user-profile.php" method="POST">
            <div class="row">
                <div>
                    <label class="fw-bold mb-2">Email Address</label>
                    <input type="text" class="form-control" name="textFieldEmailAddress" value="<?php echo $_SESSION['email']; ?>" required>
                </div>
            </div>
            <div class="row my-2">
                <div>
                    <label class="fw-bold mb-2">First Name</label>
                    <input type="text" class="form-control" id="textFieldFirstName" value="<?php echo $_SESSION['firstName']; ?>" required>
                </div>
            </div>
            <div class="row my-2">
                <div>
                    <label class="fw-bold mb-2">Last Name</label>
                    <input type="text" class="form-control" id="textFieldLastName" value="<?php echo $_SESSION['lastName']; ?>" required>
                </div>
            </div>
            <div class="row my-2">
                <div>
                    <label class="fw-bold mb-2">College/Department</label>
                    <?php

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <select class="form-select" aria-label="Default select example" name="dropdownDepartment">
                                <option value="Basic Education" <?= $row['department'] == "Basic Education" ? 'selected=selected' : '' ?>>Basic Education</option>
                                <option value="Senior High School" <?= $row['department'] == "Senior High School" ? 'selected=selected' : '' ?>>Senior High School</option>
                                <option value="Arts and Sciences" <?= $row['department'] == "Arts and Sciences" ? 'selected=selected' : '' ?>>Arts and Sciences</option>
                                <option value="Business and Accountancy" <?= $row['department'] == "Business and Accountancy" ? 'selected=selected' : '' ?>>Business and Accountancy</option>
                                <option value="Computer Studies" <?= $row['department'] == "Computer Studies" ? 'selected=selected' : '' ?>>Computer Studies</option>
                                <option value="Criminology" <?= $row['department'] == "Criminology" ? 'selected=selected' : '' ?>>Criminology</option>
                                <option value="Education" <?= $row['department'] == "Education" ? 'selected=selected' : '' ?>>Education</option>
                                <option value="Engineering, Architecture and Aviation" <?= $row['department'] == "Engineering, Architecture and Aviation" ? 'selected=selected' : '' ?>>Engineering, Architecture and Aviation</option>
                                <option value="Law" <?= $row['department'] == "Law" ? 'selected=selected' : '' ?>>Law</option>
                                <option value="Maritime Education" <?= $row['department'] == "Maritime Education" ? 'selected=selected' : '' ?>>Maritime Education</option>
                                <option value="International Hospitality Management" <?= $row['department'] == "International Hospitality Management" ? 'selected=selected' : '' ?>>International Hospitality Management</option>
                                <option value="Graduate School" <?= $row['department'] == "Graduate School" ? 'selected=selected' : '' ?>>Graduate School</option>
                                <option value="Support Services" <?= $row['department'] == "Support Services" ? 'selected=selected' : '' ?>>Support Services</option>
                            </select>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="row my-3">
                <div class="text-end">
                    <input type="submit" class="btn btn-primary button-update rounded-0" value="Update information" id="buttonUpdate">
                </div>
            </div>
        </form>
        <h1 class="my-1">Account Parameters</h1>
        <hr class="my-4">
        <form action="../../process/update-user-profile.php" method="POST">
            <div class="row">
                <div>
                    <label class="fw-bold mb-2">Current Password</label>
                    <input type="text" class="form-control" name="textFieldCurrentPassword" required>
                </div>
            </div>
            <div class="row my-2">
                <div>
                    <label class="fw-bold mb-2">New Password</label>
                    <input type="text" class="form-control" id="textFieldNewPassword" required>
                    <p class="text-secondary my-3"><span class="fw-bold text-danger">IMPORTANT:</span> If you change your password, you will have to log in again using the new password.</p>
                </div>
            </div>
            <hr class="my-2">
            <div class="row my-3">
                <div class="text-end">
                    <input type="submit" class="btn btn-primary button-update rounded-0" value="Change password" id="buttonUpdate">
                </div>
            </div>
        </form>
    </div>
</div>