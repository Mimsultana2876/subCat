<?php include_once '../Model/db_confige.php';?>
<?php
     if(isset($_POST['del_id'])){
        $del_id = $_POST['del_id'];
        //echo ($edit_id);
        $del_id = trim($del_id);
         $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $decryption_key = "1234";
        $decryption_iv = "1234567891011121";
        $del_id = openssl_decrypt($del_id, $ciphering,$decryption_key,
        $options, $decryption_iv);
        $sql = "DELETE FROM  catagore_type WHERE  cat_id = '$del_id' ";
        $sql = mysqli_query($link,$sql);
        
       }     
?>