<?php
    session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$statement = $connection->prepare("SELECT YEAR(fi.published_on) AS year, COUNT(fi.file_id) AS count FROM file_information AS fi GROUP BY YEAR(fi.submitted_on)");
$statement->execute();
$result = $statement->get_result();
$published_by_year = $result->fetch_all(MYSQLI_ASSOC);

$statement->close();
header("Content-type: application/json");
echo json_encode($published_by_year);

?>