<?php include_once '../Model/db_confige.php';?>
<?php 
    $edit_id = $_POST['id'];
   
    //echo mysqli_error($link);
    $error1 = $error2 = $error3= $success= " ";  
    $cat_type_name =$cat_type_code = " ";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $cat_type_name =trim($_POST['name']);
        $cat_type_code =trim($_POST['code']);
        echo $cat_type_name;
        if(empty($cat_type_name) || empty($cat_type_code)){
            if(empty($cat_type_name) && empty($cat_type_code)){
                //echo "sadsad";
                $error1 = "Please fill up both forms";
            }
            else if (empty($cat_type_name)){

                $error2 = "Please Insert catagore_type Name";
                
            }
            else if (empty($cat_type_code)){
                $error3 = "Please Insert catagore_type Code";
            }

            
        }
        else{
            
            $sql = "UPDATE catagore_type SET cat_type_name='$cat_type_name', cat_type_code='$cat_type_code' WHERE cat_id='$edit_id' ";
            $sql = mysqli_query($link,$sql);
            if ($sql){
                $success = "Successfully Edited";
                // header("location: ../view/layout/js_lib.php");

            }
            else{
                "Oops! Something went wrong. .";
            }
        }
       
            
    }
        
        
   
  
?>