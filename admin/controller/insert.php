<?php include_once '../Model/db_confige.php';?>
<?php 
$cat_type_name = " ";
$cat_type_code= " ";
$error1 = $error2 = $error3= $success= " "; 
if($_SERVER["REQUEST_METHOD"]=="POST"){
  //echo "ddd";
  //$cat_type_name =trim( $_POST['cat_type_name']);
  //$cat_type_code =trim( $_POST['cat_type_code']);
  $cat_type_name =trim( $_POST['name']);
  $cat_type_code =trim( $_POST['code']);
  
  if(empty($cat_type_name)|| empty($cat_type_code)){
    if(empty($cat_type_name) && empty($cat_type_code) ){
      $error1 = "Please fill up both forms";
    }
    elseif(empty($cat_type_name)){
      $error2 = "Please fill up catagory type name.";

    }
    else{
      $error3 = "Please fill up catagory type code.";

    }
    

 
  } 
  else{
    $existed_sql_name = "SELECT * FROM catagore_type WHERE cat_type_name='$cat_type_name' ";
    $existed_sql_code = "SELECT * FROM catagore_type WHERE cat_type_code='$cat_type_code' ";
    $existed_sql_name= mysqli_query($link, $existed_sql_name);
    $existed_sql_code= mysqli_query($link, $existed_sql_code);
      if($existed_sql_name->num_rows>0 && $existed_sql_code->num_rows>0){
        echo (1);
      }
      else{
        $sql = "INSERT INTO catagore_type(cat_type_name,cat_type_code)VALUE(?,?)"; 
        $sql_statment = mysqli_prepare($link, $sql);
        //echo mysqli_error($link);
    
        if($sql_statment){
         mysqli_stmt_bind_param($sql_statment,"ss", $var1, $var2);
         $var1=$cat_type_name;
         $var2=$cat_type_code;
         $execute= mysqli_stmt_execute($sql_statment);
            if($execute){
             
              $success = "Successfully inserted.";
              /* header("location:index.php"); */
            }
             else{
                echo "somthing wents wrong!";
      
              } 
      
      
        }

      }
   

  } 
 
  
}  
  
?>