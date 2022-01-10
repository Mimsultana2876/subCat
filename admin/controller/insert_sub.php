<?php include_once '../Model/db_confige.php';?>
<?php 
    $subCat_name = " ";
    $subCat_code= " ";
    $subCat_info= " ";
    $error1 = $error2 = $error3= $error4=$success= " "; 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
        $subCat_name =trim( $_POST['name']);
        $subCat_code =trim( $_POST['code']);
        $subCat_info =trim( $_POST['info']);
    
        if(empty($subCat_name)|| empty($subCat_code)|| empty($subCat_info)){
            if(empty($subCat_name)&& empty($subCat_code)&& empty($subCat_info)){
            $error1 = "Please fill up both forms";
            }
            elseif(empty($subCat_name)){
            $error2 = "Please fill up subcat type name.";

            }
            elseif(empty($subCat_code)){
                $error3 = "Please fill up subcat type code.";
        
                }
            else{
            $error4 = "Please fill up subcat type info.";

            }
        

    
        } 
        else{
            $sql = "INSERT INTO sub_catagore(subCat_name,subCat_code,subCat_info)VALUE(?,?)"; 
            $sql_statment = mysqli_prepare($link, $sql);
            //echo mysqli_error($link);
        
            if($sql_statment){
            mysqli_stmt_bind_param($sql_statment,"sss", $var1, $var2,$var3);
            $var1=$subCat_name;
            $var2=$subCat_code;
            $var3=$subCat_info;
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
  
?>