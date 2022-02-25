<?php 
 function delete($id,$url){

    $id = $_GET['id'];

    if(isset($id)) {
        $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
          $response = curl_exec($ch); curl_close($ch); 
          $data = json_decode($response,true); 
          print_r($data); 
          if($data['status'] == 200) {
               echo 'supprime' ; 
          }else{
                echo 'error : '.json_decode($response); 
               } 
           } 
    
 }


?>