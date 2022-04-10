<?php
session_start();

include '../../includes/connection.php';

$logout_time = date('h:i:s A');
$logout_date = date('D, M j, Y');

$sql = "SELECT * FROM login_history ORDER BY login_id DESC";
$result = $connection->query($sql);
$result = mysqli_fetch_assoc($result);
$login_id = $result['login_id'];

$statement = $connection->prepare('UPDATE login_history SET logout_time = ?, logout_date = ? WHERE login_id = ?');
$statement->bind_param('sss', $logout_time, $logout_date, $login_id);
$statement->execute();

session_destroy();
header('Location: ../../index.php');
