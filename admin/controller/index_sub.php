<?php include_once '../Model/db_confige.php';?>

<?php 
    $sub_cat_name = " ";
    $sub_cat_code= " ";
    $sub_cat_info= " ";
    $error1 = $error2 = $error3=$error4= $success= " "; 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $sub_cat_name =trim( $_POST['sub_cat_name']);
        $sub_cat_code =trim( $_POST['sub_cat_code']);
        $sub_cat_info =trim( $_POST['sub_cat_info']);
        echo $sub_cat_name;
        /*  $subCat_name =trim( $_POST['name']);
        $subCat_code =trim( $_POST['code']);
        $subCat_info =trim( $_POST['info']);
     */
    
     if(empty($sub_cat_name)|| empty($sub_cat_code)|| empty($sub_cat_info)){
            if(empty($sub_cat_name)&& empty($sub_cat_code)&& empty($sub_cat_info)){
            $error1 = "Please fill up both forms";
            }
            elseif(empty($sub_cat_name)){
            $error2 = "Please fill up subcat type name.";

            }
            elseif(empty($sub_cat_code)){
                $error3 = "Please fill up subcat type code.";
        
                }
            else{
            $error4 = "Please fill up subcat type info.";

            }
            

        
        } 
        else{
            $sql = "INSERT INTO sub_catagore(sub_cat_name,sub_cat_code,sub_cat_info)VALUE(?,?,?)"; 
            $sql_statment = mysqli_prepare($link, $sql);
            echo mysqli_error($link);

            if($sql_statment){
                mysqli_stmt_bind_param($sql_statment,"sss", $var1, $var2,$var3);
                $var1=$sub_cat_name;
                $var2=$sub_cat_code;
                $var3=$sub_cat_info;
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
<!DOCTYPE html>
<html lang="en">
     <?php include '../view/layout/header.php';?>
    <body>
            <?php include '../view/layout/side_navber.php';?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
              <?php include '../view/layout/collapes_navber.php';?>
                <!-- Page content-->
                <div >
                      <h2 style="color:blue"> Inventory Admin panal</h2>
                    <h3 style="color:blue">Add Sub catagory</h3>
                    <?php 
                      if(!empty($success)){
                        
                         echo '<span style="color:green;">'.$success.'</span>';
                        }
                        else{
                          echo '<span style="color:red;">'. $error1.'</span>';
                        }     
                      ?> 
                      <span><?php  echo $error1;  ?></span>
                     
                       <span id="mainSub_notification" style="display:none"; ></span>  

                </div>
               

          <form class="shadow p-4"  >
                
            <div class="mb-3">
            <br>
            <label for="sub_cat_name" class="form-label"style="color:cornflowerblue;">sub_cat_name</label>
            <input  value="<?php echo $sub_cat_name;?>"  type="text" id="sub_cat_name"  name="sub_cat_name" placeholder="sub_cat_name" required>
            <?php 
                 if(!empty($error2)){
                echo '<span style="color:red";>'. $error2.'</span>'; 

               } 
            
            ?>
              <span id="subCat_notification1" style="display:none"; ></span> 
     
           </div>
           <div class="mb-3">
            <label for="sub_cat_code" class="form-label" style="color:cornflowerblue;">sub_cat_code</label>
            <input value="<?php echo $sub_cat_code;?>"   type="text"       class="sub_cat_code" id="sub_cat_code" placeholder="sub_cat_code" name="sub_cat_code" required>
           <?php 
                 if(!empty($error3)){
                echo '<span style="color:red;">'. $error3.'</span>';

               } 
             
            ?>
            <span id="subCat_notification2" style="display:none"; ></span> 
            </div>
            <div class="mb-3">
            <label for="sub_cat_info" class="form-label" style="color:cornflowerblue;">sub_cat_info</label>
            <input value="<?php echo $sub_cat_info;?>"   type="text"       class="sub_cat_info" id="sub_cat_info" placeholder="sub_cat_info" name="sub_cat_info" required>
           <?php 
                 if(!empty($error3)){
                echo '<span style="color:red;">'. $error3.'</span>';

               } 
             
            ?>
            <span id="subCat_notification3" style="display:none"; ></span> 
            </div>
   
            <button type="button" class="btn btn-primary"  onclick="Datainsert_sub();">Add subCat types</button>
          </form>


         <div id="show_table_div" class = "col-md-6">
        <div class = "mb-3">
        <h2 >Show data</h2>
        </div>
        
        <div>
            <span id="from_response"></span>
            <div class = "table_responsive" id="pagination_data">

            </div>
            <div id="pagination"></div>
        </div>
        
            
        </div> 
           <?php include '../view/layout/js_lib.php';?>
     </body>
</html>
