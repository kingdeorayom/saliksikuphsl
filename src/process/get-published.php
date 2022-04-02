<?php
session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};
if (isset($_SESSION['userType'])) {
        $statement = $connection->prepare("SELECT `file_id`,`file_type`,`file_name`,`file_dir`,`file_uploader`,`status`,`research_id`,`resource_type`,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_month`,`publication_day`,`publication_year`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, `infographic_research_unit`, `infographic_researcher_category`,`infographic_publication_month`, `infographic_publication_year`, `infographic_title`, `infographic_description`, ii.author_first_name, ii.author_middle_initial, ii.author_surname, ii.author_ext, ii.author_email, ii.editor_first_name, ii.editor_middle_initial, ii.editor_surname, ii.editor_ext, ii.editor_email, ji.journal_title, ji.journal_subtitle, ji.department, ji.volume_number, ji.serial_issue_number, ji.ISSN, ji.journal_description, ji.chief_editor_first_name, ji.chief_editor_middle_initial, ji.chief_editor_last_name, ji.chief_editor_name_ext, ji.chief_editor_email FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id WHERE fi.status = 'published'ORDER BY fi.file_id ASC");
        $statement->execute();
        $result = $statement->get_result();
        $published = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();

        $results = array("published"=>$published);
        header('Content-Type: application/json');
        echo json_encode($results);
}