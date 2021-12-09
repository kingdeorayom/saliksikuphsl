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
        $statement = $connection->prepare("SELECT * FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id");
        $statement->execute();
        $result = $statement->get_result();
        $submissions = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();

        $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN research_information as ri ON ri.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON ri.coauthor_group_id=ci.group_id");
        $statement->execute();
        $result = $statement->get_result();
        $thesis = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();

        $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN journal_information as ji ON ji.file_ref_id=fi.file_id");
        $statement->execute();
        $result = $statement->get_result();
        $journal = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();

        $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN infographic_information as ii ON ii.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON ii.coauthor_group_id=ci.group_id");
        $statement->execute();
        $result = $statement->get_result();
        $infographic = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();

        $statement = $connection->prepare("SELECT * FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id WHERE fi.status = 'pending'");
        $statement->execute();
        $result = $statement->get_result();
        $pending = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();

        $statement = $connection->prepare("SELECT * FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id WHERE fi.status = 'for revision'");
        $statement->execute();
        $result = $statement->get_result();
        $forRevision = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();

        $statement = $connection->prepare("SELECT * FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id WHERE fi.status = 'revised'");
        $statement->execute();
        $result = $statement->get_result();
        $revised = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();
        
        $statement = $connection->prepare("SELECT * FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id WHERE fi.status = 'published'");
        $statement->execute();
        $result = $statement->get_result();
        $published = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();


        $final = array("submissions"=>$submissions,"thesis"=>$thesis,"journal"=>$journal,
        "infographic"=>$infographic,"pending"=>$pending,"forRevision"=>$forRevision,
        "revised"=>$revised,"published"=>$published);
            header('Content-Type: application/json');
            echo json_encode($final);

    }
}