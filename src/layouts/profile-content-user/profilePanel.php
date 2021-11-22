<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<div class="col-lg-10 col-md-12 col-xs-12 main-column" id="myProfilePanel">
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
                    <select class="form-select" aria-label="Default select example" name="dropdownDepartment">
                        <option value="Basic Education" selected>Basic Education</option>
                        <option value="Senior High School">Senior High School</option>
                        <option value="Arts and Sciences">Arts and Sciences</option>
                        <option value="Business and Accountancy">Business and Accountancy</option>
                        <option value="Computer Studies">Computer Studies</option>
                        <option value="Criminology">Criminology</option>
                        <option value="Education">Education</option>
                        <option value="Engineering, Architecture and Aviation">Engineering, Architecture and Aviation</option>
                        <option value="Law">Law</option>
                        <option value="Maritime Education">Maritime Education</option>
                        <option value="International Hospitality Management">International Hospitality Management</option>
                        <option value="Graduate School">Graduate School</option>
                        <option value="Support Services">Support Services</option>
                    </select>
                </div>
            </div>
            <h1 class="my-4">Account Parameters</h1>
            <hr class="my-4">
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
                    <p class="text-secondary mt-2">Please note: if you change your password, you will have to log in again using the new password.
                    </p>
                </div>
            </div>
            <hr class="my-2">
            <div class="row my-3">
                <div class="text-start">
                    <input type="submit" class="btn fw-bold btn-primary button-update rounded-0" value="Update" id="buttonUpdate">
                </div>
            </div>
        </form>
    </div>
</div>