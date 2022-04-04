<?php
    session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (isset($_SESSION['userType'])) {
        $query = "SELECT
        fi.*,fl.*,`research_id`,ri.resource_type AS research_type,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_date`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, ii.*, ji.*, ci.* FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id LEFT JOIN reports_information AS rp ON rp.file_ref_id=fi.file_id LEFT JOIN coauthors_information AS ci on ci.group_id = fi.coauthor_group_id LEFT JOIN (SELECT ref_id, feedback, returned_on FROM feedback_log WHERE log_id IN (SELECT MAX(log_id) FROM feedback_log GROUP BY ref_id)) AS fl ON fi.file_id = fl.ref_id WHERE fi.user_id = ?";        
        $connection->begin_transaction();
        try{
            $statement = $connection->prepare($query);
            $statement->bind_param("i",$_SESSION["userid"]);
            $statement->execute();
            $result = $statement->get_result();
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $statement->close();
            
            $connection->commit();
            
            
            header("Content-Type: application/json");
            echo json_encode($result);

        }catch(mysqli_sql_exception $exception){
            $connection->rollback();

            echo $exception;
        }
        
    }
    else{
        echo 'You must be logged in to view';
        die();
    }
