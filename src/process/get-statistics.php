<?php
    session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$statement = $connection->prepare("SELECT Year, SUM(t.count) FROM (SELECT YEAR(ri.publication_date) AS Year, COUNT(fi.file_id) AS count 
FROM file_information AS fi LEFT JOIN research_information AS ri ON ri.file_ref_id = fi.file_id GROUP BY Year

UNION ALL 

SELECT YEAR(ii.infographic_publication_date) AS Year, COUNT(fi.file_id) AS count
FROM file_information AS fi LEFT JOIN infographic_information AS ii ON ii.file_ref_id = fi.file_id GROUP BY Year
           
UNION ALL 

SELECT YEAR(fi.published_on) AS Year, COUNT(fi.file_id) AS count
FROM file_information AS fi WHERE fi.file_type = 'journal' GROUP BY Year
                            
UNION ALL 

SELECT YEAR(rp.report_year) AS Year, COUNT(fi.file_id) AS count
FROM file_information AS fi LEFT JOIN reports_information AS rp ON rp.file_ref_id = fi.file_id GROUP BY Year) as t GROUP BY t.Year");
$statement->execute();
$result = $statement->get_result();
$published_by_year = $result->fetch_all(MYSQLI_ASSOC);

$statement->close();
header("Content-type: application/json");
echo json_encode($published_by_year);

?>