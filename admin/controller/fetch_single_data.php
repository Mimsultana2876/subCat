<?php  include_once '../Model/db_confige.php'; ?>
<?php 
        if(isset($_POST['id'])){
         $edit_id = $_POST['id'];
         //echo ($edit_id);
          $ciphering = "AES-128-CTR";
         $iv_length = openssl_cipher_iv_length($ciphering);
         $options = 0;
         $decryption_key = "1234";
         $decryption_iv = "1234567891011121";
         $id = openssl_decrypt($edit_id, $ciphering,$decryption_key,
         $options, $decryption_iv);
         $sql = "SELECT * FROM  catagore_type WHERE  cat_id = '".$id."' ";
         $execute = mysqli_query($link, $sql);
         while($row=$execute->fetch_assoc())
         {
             $data[]=$row;
         }
         echo json_encode ($data); 
         
        }     

?>


