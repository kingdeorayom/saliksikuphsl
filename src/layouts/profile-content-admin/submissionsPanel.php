<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page, or to the homepage if already logged in.');
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="submissionsPanel">
    <h1 class="my-2 p-2" style="background-color: gainsboro;">Submissions</h1>
    <hr class="my-4">
    <div class="row fw-bold p-3 text-light text-center d-flex justify-content-center">
        <div class="col py-3 mx-1 my-1 adminPageCountColumn">
            <p>FOR APPROVAL</p>
            <h1 class="display-4">10</h1>
        </div>
        <div class="col py-3 mx-1 my-1 adminPageCountColumn">
            <p>FOR REVISION</p>
            <h1 class="display-4">2</h1>
        </div>
        <div class="col py-3 mx-1 my-1 adminPageCountColumn">
            <p>REVISED</p>
            <h1 class="display-4">1</h1>
        </div>
        <div class="col py-3 mx-1 my-1 adminPageCountColumn">
            <p>PUBLISHED</p>
            <h1 class="display-4">149</h1>
        </div>
        <div class="col py-3 mx-1 my-1 adminPageCountColumn">
            <p>ALL SUBMISSIONS</p>
            <h1 class="display-4">162</h1>
        </div>
    </div>

    <div class="row">
        <div class="col my-1 mx-1">
            <form action="">
                <div class="input-group">
                    <input type="search" class="form-control form-search rounded-0" aria-label="Search the repository" aria-describedby="button-addon2" placeholder="Search submissions">
                    <button class="btn text-light search-button btn-lg rounded-0" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-sm-12 col-md-4">
            <label class="fw-bold">View:</label>
            <select class="form-select rounded-0 my-2" aria-label="Default select example">
                <option selected>For Approval</option>
                <option>For Revision</option>
                <option>Revised</option>
                <option>Published</option>
            </select>
        </div>
        <div class="col-sm-12 col-md-4">
            <label class="fw-bold">Sort by:</label>
            <select class="form-select rounded-0 my-2" aria-label="Default select example">
                <option selected>All category</option>
                <option>Resource Type</option>
                <option>Research Unit</option>
                <option>Researcher's Category</option>
            </select>
        </div>
    </div>
    <div class="row my-4">

        <!--For Approval-->

        <div class="forApproval my-3">
            <h5>For Approval</h5>
            <hr class="mb-4">
            <div class="box p-3" style="background-color: #f5f5f5;">
                <div class="row">
                    <div class="col">
                        <div class="text-start">
                            <p class="fw-bold" style="color: #012265;">Thesis | Undergraduate | Computer Studies</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-3">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                </div>
                <div class="row">
                    <p><span class="fw-bold">Submitted on:</span> 2021-11-17 08:52:03</p>
                </div>
                <hr class="my-1">
                <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
            </div>
        </div>

        <!--For Revision-->

        <div class="forRevision my-3">
            <h5>For Revision</h5>
            <hr class="mb-4">
            <div class="box p-3" style="background-color: #f5f5f5;">
                <div class="row">
                    <div class="col">
                        <div class="text-start">
                            <p class="fw-bold" style="color: #012265;">Thesis | Undergraduate | Computer Studies</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-3">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                </div>
                <div class="row">
                    <p><span class="fw-bold">Returned on:</span> 2021-11-17 08:52:03</p>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="feedback border bg-white p-1">
                            <p class="fw-bold">Feedback:</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur quaerat natus, fugiat corporis aperiam cupiditate, expedita repudiandae optio iste repellat laudantium deserunt dignissimos ut magni commodi eveniet culpa totam accusamus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente provident, reprehenderit iure dignissimos cupiditate exercitationem ex, nemo sunt, vero omnis laborum modi repellat quasi officia totam aut voluptatum nesciunt cumque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum deserunt nostrum tempora vitae? Numquam a quaerat sed reiciendis deleniti excepturi atque, deserunt sapiente vitae quidem? Repudiandae dicta recusandae laboriosam placeat!</p>
                        </div>
                    </div>
                </div>
                <hr class="my-1">
                <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
            </div>
        </div>

        <!--Revised-->

        <div class="revised my-3">
            <h5>Revised</h5>
            <hr class="mb-4">
            <div class="box p-3" style="background-color: #f5f5f5;">
                <div class="row">
                    <div class="col">
                        <div class="text-start">
                            <p class="fw-bold" style="color: #012265;">Thesis | Undergraduate | Computer Studies</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-3">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                </div>
                <div class="row">
                    <p><span class="fw-bold">Revised on:</span> 2021-11-17 08:52:03</p>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="feedback border bg-white p-1">
                            <p class="fw-bold">Feedback:</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur quaerat natus, fugiat corporis aperiam cupiditate, expedita repudiandae optio iste repellat laudantium deserunt dignissimos ut magni commodi eveniet culpa totam accusamus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente provident, reprehenderit iure dignissimos cupiditate exercitationem ex, nemo sunt, vero omnis laborum modi repellat quasi officia totam aut voluptatum nesciunt cumque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum deserunt nostrum tempora vitae? Numquam a quaerat sed reiciendis deleniti excepturi atque, deserunt sapiente vitae quidem? Repudiandae dicta recusandae laboriosam placeat!</p>
                        </div>
                    </div>
                </div>
                <hr class="my-1">
                <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
            </div>
        </div>

        <!--Published-->

        <div class="published my-3">
            <h5>Published</h5>
            <hr class="mb-4">
            <div class="box p-3" style="background-color: #f5f5f5;">
                <div class="row">
                    <div class="col">
                        <div class="text-start">
                            <p class="fw-bold" style="color: #012265;">Thesis | Undergraduate | Computer Studies</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-3">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                </div>
                <div class="row">
                    <p><span class="fw-bold">Published on:</span> 2021-11-17 08:52:03</p>
                </div>
                <hr class="my-1">
                <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
            </div>
        </div>

    </div>
</div>