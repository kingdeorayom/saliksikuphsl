<?php
    session_start();

include 'connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        echo "you do not have access to this!";
    }
    else{
        $statement = $connection->prepare("SELECT status, COUNT(status) AS count FROM file_information GROUP BY status");
        $statement->execute();
        $result_count = $statement->get_result();
        $result_count = $result_count->fetch_all(MYSQLI_ASSOC);
        $statement->close();

        $query = "SELECT `file_id`,`file_type`,`file_name`,`file_dir`,`file_dir2`,`file_uploader`,`status`,`research_id`,`resource_type`,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_month`,`publication_day`,`publication_year`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email,`infographic_publication_month`, `infographic_publication_year`, `infographic_title`, `infographic_description`, ii.author_first_name, ii.author_middle_initial, ii.author_surname, ii.author_ext, ii.author_email, ii.editor_first_name, ii.editor_middle_initial, ii.editor_surname, ii.editor_ext, ii.editor_email, ji.journal_title, ji.journal_subtitle, ji.department, ji.volume_number, ji.serial_issue_number, ji.ISSN, ji.journal_description, ji.chief_editor_first_name, ji.chief_editor_middle_initial, ji.chief_editor_last_name, ji.chief_editor_name_ext, ji.chief_editor_email, ci.coauthor1_first_name, ci.coauthor1_middle_initial, ci.coauthor1_surname, ci.coauthor1_name_ext, ci.coauthor1_email, ci.coauthor2_first_name, ci.coauthor2_middle_initial, ci.coauthor2_surname, ci.coauthor2_name_ext, ci.coauthor2_email, ci.coauthor3_first_name, ci.coauthor3_middle_initial, ci.coauthor3_surname, ci.coauthor3_name_ext, ci.coauthor3_email, ci.coauthor4_first_name, ci.coauthor4_middle_initial, ci.coauthor4_surname, ci.coauthor4_name_ext, ci.coauthor4_email FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id LEFT JOIN coauthors_information AS ci on ci.group_id = fi.coauthor_group_id";
        if(isset($_POST['status_view']) && $_POST['status_view'] !="submissions"){
            $status = " WHERE fi.status = '{$_POST["status_view"]}'";;
            $query .= $status;
        }
        if(isset($_POST['title_query']) && !empty($_POST['title_query'])){
            $search = " AND (ri.research_title LIKE '%{$_POST["title_query"]}%' OR ji.journal_title LIKE '%{$_POST["title_query"]}%' OR ii.infographic_title LIKE '%{$_POST["title_query"]}%')";
            $query .= $search;
        }
        if(isset($_POST['sort_by']) && $_POST['sort_by']!='All Category'){
            $sort = " ORDER BY";
            if($_POST['sort_by']=="Resource Type"){
                $sort .= " ri.resource_type";
            }
            else if($_POST['sort_by']=="Research Unit"){
                $sort .= " ri.research_unit, ji.department";
            }
            else if($_POST['sort_by']=="Researcher's Category"){
                $sort .= " ri.researchers_category";
            }
            $sort .= " DESC";
            $query .= $sort;
        }
        $connection->begin_transaction();
        try{
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->get_result();
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $statement->close();
            
            $connection->commit();
            
            
            header("Content-Type: application/json");
            $array['result']= $result;
            $array['result_count']= $result_count;

            echo json_encode($array);

        }catch(mysqli_sql_exception $exception){
            $connection->rollback();

            echo $exception;
        }
        
    }
}