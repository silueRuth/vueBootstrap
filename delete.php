<?php
include "requestApi.php";
$id = $_GET['id'];
$data = array("id" => $id); 

$response = delete($data, 'http://127.0.0.1:8000/poste/deletepost/'.$id); 
print_r ($response); 

?>
	 