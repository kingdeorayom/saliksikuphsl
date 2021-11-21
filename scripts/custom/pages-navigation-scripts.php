<script>
    function aboutRepositoryClicked() {
        document.getElementById("aboutRepositoryPanel").style.display = "block";
        document.getElementById("copyrightPoliciesPanel").style.display = "none";

        document.getElementById("aboutRepositoryText").style.borderBottom = "thick solid #012265";
        document.getElementById("copyrightPoliciesText").style.borderBottom = "thick none #012265";
    }

    function copyrightPoliciesClicked() {
        document.getElementById("copyrightPoliciesPanel").style.display = "block";
        document.getElementById("aboutRepositoryPanel").style.display = "none";

        document.getElementById("aboutRepositoryText").style.borderBottom = "thick none #012265";
        document.getElementById("copyrightPoliciesText").style.borderBottom = "thick solid #012265";
    }

    //////////////////////////////////////////////////////////////////////////////

    function researchDevelopmentCenterClicked() {
        document.getElementById("researchDevelopmentCenterPanel").style.display = "block";
        document.getElementById("universityLibraryPanel").style.display = "none";

        document.getElementById("researchDevelopmentCenterText").style.borderBottom = "thick solid #012265";
        document.getElementById("universityLibraryText").style.borderBottom = "thick none #012265";
    }

    function universityLibraryClicked() {
        document.getElementById("universityLibraryPanel").style.display = "block";
        document.getElementById("researchDevelopmentCenterPanel").style.display = "none";

        document.getElementById("researchDevelopmentCenterText").style.borderBottom = "thick none #012265";
        document.getElementById("universityLibraryText").style.borderBottom = "thick solid #012265";
    }

    //////////////////////////////////////////////////////////////////////////////

    function submitPanelClicked() {
        document.getElementById("submitPanel").style.display = "block";
        document.getElementById("submissionGuidelinesPanel").style.display = "none";

        document.getElementById("submitText").style.borderBottom = "thick solid #012265";
        document.getElementById("submissionGuidelinesText").style.borderBottom = "thick none #012265";
    }

    function submissionGuidelinesClicked() {
        document.getElementById("submissionGuidelinesPanel").style.display = "block";
        document.getElementById("submitPanel").style.display = "none";

        document.getElementById("submitText").style.borderBottom = "thick none #012265";
        document.getElementById("submissionGuidelinesText").style.borderBottom = "thick solid #012265";
    }

    //////////////////////////////////////////////////////////////////////////////

    function thesisDissertationPanelClicked() {
        document.getElementById("thesisDissertationPanel").style.display = "block";
        document.getElementById("researchJournalPanel").style.display = "none";
        document.getElementById("infographicsPanel").style.display = "none";

        document.getElementById("thesisDissertationText").style.borderBottom = "thick solid #012265";
        document.getElementById("researchJournalText").style.borderBottom = "thick none #012265";
        document.getElementById("infographicsText").style.borderBottom = "thick none #012265";


    }

    function researchJournalPanelClicked() {
        document.getElementById("researchJournalPanel").style.display = "block";
        document.getElementById("thesisDissertationPanel").style.display = "none";
        document.getElementById("infographicsPanel").style.display = "none";

        document.getElementById("thesisDissertationText").style.borderBottom = "thick none #012265";
        document.getElementById("infographicsText").style.borderBottom = "thick none #012265";
        document.getElementById("researchJournalText").style.borderBottom = "thick solid #012265";

    }

    function infographicsPanelClicked() {
        document.getElementById("infographicsPanel").style.display = "block";
        document.getElementById("researchJournalPanel").style.display = "none";
        document.getElementById("thesisDissertationPanel").style.display = "none";

        document.getElementById("thesisDissertationText").style.borderBottom = "thick none #012265";
        document.getElementById("researchJournalText").style.borderBottom = "thick none #012265";
        document.getElementById("infographicsText").style.borderBottom = "thick solid #012265";
    }

    //////////////////////////////////////////////////////////////////////////////

    function showThesisDissertationCoAuthorsField() {
        var x = document.getElementById("dropdownThesisDissertationCoAuthors").value;

        if (x == 1) {
            document.getElementById("co-author-1-td-panel").style.display = "flex";
            document.getElementById("co-author-2-td-panel").style.display = "none";
            document.getElementById("co-author-3-td-panel").style.display = "none";
            document.getElementById("co-author-4-td-panel").style.display = "none";
        } else if (x == 2) {
            document.getElementById("co-author-1-td-panel").style.display = "flex";
            document.getElementById("co-author-2-td-panel").style.display = "flex";
            document.getElementById("co-author-3-td-panel").style.display = "none";
            document.getElementById("co-author-4-td-panel").style.display = "none";
        } else if (x == 3) {
            document.getElementById("co-author-1-td-panel").style.display = "flex";
            document.getElementById("co-author-2-td-panel").style.display = "flex";
            document.getElementById("co-author-3-td-panel").style.display = "flex";
            document.getElementById("co-author-4-td-panel").style.display = "none";
        } else if (x == 4) {
            document.getElementById("co-author-1-td-panel").style.display = "flex";
            document.getElementById("co-author-2-td-panel").style.display = "flex";
            document.getElementById("co-author-3-td-panel").style.display = "flex";
            document.getElementById("co-author-4-td-panel").style.display = "flex";
        } else if (x == 0) {
            document.getElementById("co-author-1-td-panel").style.display = "none";
            document.getElementById("co-author-2-td-panel").style.display = "none";
            document.getElementById("co-author-3-td-panel").style.display = "none";
            document.getElementById("co-author-4-td-panel").style.display = "none";
        }
    }

    function showInfographicsCoAuthorsField() {
        var y = document.getElementById("dropdownInfographicsCoAuthors").value;

        if (y == 1) {
            document.getElementById("co-author-1-info-panel").style.display = "flex";
            document.getElementById("co-author-2-info-panel").style.display = "none";
            document.getElementById("co-author-3-info-panel").style.display = "none";
            document.getElementById("co-author-4-info-panel").style.display = "none";
        } else if (y == 2) {
            document.getElementById("co-author-1-info-panel").style.display = "flex";
            document.getElementById("co-author-2-info-panel").style.display = "flex";
            document.getElementById("co-author-3-info-panel").style.display = "none";
            document.getElementById("co-author-4-info-panel").style.display = "none";
        } else if (y == 3) {
            document.getElementById("co-author-1-info-panel").style.display = "flex";
            document.getElementById("co-author-2-info-panel").style.display = "flex";
            document.getElementById("co-author-3-info-panel").style.display = "flex";
            document.getElementById("co-author-4-info-panel").style.display = "none";
        } else if (y == 4) {
            document.getElementById("co-author-1-info-panel").style.display = "flex";
            document.getElementById("co-author-2-info-panel").style.display = "flex";
            document.getElementById("co-author-3-info-panel").style.display = "flex";
            document.getElementById("co-author-4-info-panel").style.display = "flex";
        } else if (y == 0) {
            document.getElementById("co-author-1-info-panel").style.display = "none";
            document.getElementById("co-author-2-info-panel").style.display = "none";
            document.getElementById("co-author-3-info-panel").style.display = "none";
            document.getElementById("co-author-4-info-panel").style.display = "none";
        }
    }

    //////////////////////////////////////////////////////////////////////////////


    function enableDisableSubmitButton1(checkBoxStatus) {
        if (checkBoxStatus.checked) {
            document.getElementById("submitResearchDissertationButton").disabled = false;
        } else {
            document.getElementById("submitResearchDissertationButton").disabled = true;
        }
    }

    function enableDisableSubmitButton2(checkBoxStatus) {
        if (checkBoxStatus.checked) {
            document.getElementById("submitJournalButton").disabled = false;
        } else {
            document.getElementById("submitJournalButton").disabled = true;
        }
    }

    function enableDisableSubmitButton3(checkBoxStatus) {
        if (checkBoxStatus.checked) {
            document.getElementById("submitInfographicsButton").disabled = false;
        } else {
            document.getElementById("submitInfographicsButton").disabled = true;
        }
    }


    //////////////////////////////////////////////////////////////////////////////

    function myProfileClicked() {
        document.getElementById("myProfilePanel").style.display = "block";
        document.getElementById("myLibraryPanel").style.display = "none";
        document.getElementById("mySubmissionsPanel").style.display = "none";

        document.getElementById("myProfileText").style.borderBottom = "thick solid #012265";
        document.getElementById("mySubmissionsText").style.borderBottom = "thick none #012265";
        document.getElementById("myLibraryText").style.borderBottom = "thick none #012265";
    }

    function myLibraryClicked() {
        document.getElementById("myProfilePanel").style.display = "none";
        document.getElementById("myLibraryPanel").style.display = "block";
        document.getElementById("mySubmissionsPanel").style.display = "none";

        document.getElementById("myLibraryText").style.borderBottom = "thick solid #012265";
        document.getElementById("myProfileText").style.borderBottom = "thick none #012265";
        document.getElementById("mySubmissionsText").style.borderBottom = "thick none #012265";
    }

    function mySubmissionsClicked() {
        document.getElementById("myProfilePanel").style.display = "none";
        document.getElementById("myLibraryPanel").style.display = "none";
        document.getElementById("mySubmissionsPanel").style.display = "block";

        document.getElementById("mySubmissionsText").style.borderBottom = "thick solid #012265";
        document.getElementById("myLibraryText").style.borderBottom = "thick none #012265";
        document.getElementById("myProfileText").style.borderBottom = "thick none #012265";
    }
</script>

<script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
<script src="../../../scripts/bootstrap/bootstrap.js"></script>