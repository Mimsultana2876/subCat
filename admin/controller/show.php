<?php
    include_once '../Model/db_confige.php';
     //$page=$_POST['page'];
     $record_per_page = 5;
     $page=" ";
     $output= "";
     if(isset($_POST["page"])){
        $page=$_POST['page'];
    }
    else
    {
        $page=1;
    }
    
    $start_from = ($page-1)*$record_per_page;
    $sql = "SELECT  * FROM catagore_type   ORDER BY cat_id DESC  LIMIT $start_from , $record_per_page";
    $execute = mysqli_query($link, $sql);
   
    $output .="
    <table class='table table-striped table-bordered table-sm'>  
    <tr>  
         <th width='50%'>Category Type Name</th>  
         <th width='50%'>Category Type Code</th>
         <th width='50%'>Edit</th>
         <th width='50%'>Delete</th>   
    </tr>  
    
    ";
   

   
    if($execute->num_rows>0){
        while ($row =$execute->fetch_assoc()) {
            $id = $row['cat_id'];
            $id = (string)$id;
            $ciphering = "AES-128-CTR";
            $iv_lehgth = openssl_cipher_iv_length($ciphering);
            $options = 0;
            $encryption_key = "1234";
            $encryption_iv = "1234567891011121";
            $encryption = openssl_encrypt(
                $id,
                $ciphering,
                $encryption_key,
                $options,
                $encryption_iv
            );
            $output.= '<tr>
            <td class = "edit_td">'.$row['cat_type_name'].'</td>
            <td class = "edit_td">'.$row['cat_type_code'].'</td>
            <td> <a href ="#" id ="'.$encryption.'" class="btn btn-primary editBtn" role="button">'.'Edit'.'</a></td>
            <td> <a class="btn btn-primary deleteBtn " id ="'.$encryption.'" href="#">'.'Delete'.' </a> </td>
            </tr>';
        }
    }
    $output .='</table><br/><div align="center">';
    $total_record = "SELECT * FROM catagore_type ";
    $total_record= mysqli_query($link, $total_record);
    $total_record = mysqli_num_rows($total_record);
    $total_pages = ceil($total_record/$record_per_page);
    for($page=1;$page<=$total_pages; $page++)
    {
         $output.="<span class = 'pagination_link' style='cursor:pointer; padding:6px;border:1px solid #ccc;'id='".$page."'>".$page."</span>";
    }
    $output .= '</div><br/><br/>';
    echo($output); 
    
?>
