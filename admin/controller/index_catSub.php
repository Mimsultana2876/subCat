<?php include_once '../Model/db_confige.php';?>

<?php 
$cat_id = " ";
$sub_cat_id= " ";
$error1 = $error2 = $error3= $success= " "; 
if($_SERVER["REQUEST_METHOD"]=="POST"){
  echo "ddd";
  $cat_id =trim( $_POST['cat_id']);
  $sub_cat_id =trim( $_POST['sub_cat_id']);
  //$cat_type_name =trim( $_POST['name']);
  //$cat_type_code =trim( $_POST['code']);
  
     if(empty($cat_id)|| empty($sub_cat_id)){
            if(empty($cat_id) && empty($sub_cat_id) ){
            $error1 = "Please fill up both forms";
            }
            elseif(empty($cat_id)){
            $error2 = "Please fill up cat id.";

            }
            else{
            $error3 = "Please fill up sub cat id.";

            }
        

    
        }  
     else{
        $sql = "INSERT INTO cat_sub(cat_id,sub_cat_id)VALUE(?,?)"; 
        $sql_statment = mysqli_prepare($link, $sql);
        //echo mysqli_error($link);

        if($sql_statment){
        mysqli_stmt_bind_param($sql_statment,"ii", $var1, $var2);
        $var1=$cat_id;
        $var2=$sub_cat_id;
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
                    <h3 style="color:blue">Add catSub</h3>
                    <?php 
                      if(!empty($success)){
                        
                         echo '<span style="color:green;">'.$success.'</span>';
                        }
                        else{
                          echo '<span style="color:red;">'. $error1.'</span>';
                        }     
                      ?> 
                      <span><?php  echo $error1;  ?></span>
                     
                       <span id="main_notification" style="display:none"; ></span>  

                </div>
               

          <form class="shadow p-4" >
                
            <div class="mb-3">
            <br>
            <label for="cat_id" class="form-label"style="color:cornflowerblue;">cat_id</label>
            <input  value="<?php echo $cat_id;?>"  type="text" id="cat_id"  name="cat_id" placeholder="cat_id" required>
            <?php 
                 if(!empty($error2)){
                echo '<span style="color:red";>'. $error2.'</span>'; 

               } 
            
            ?>
              <span id="sub_notification1" style="display:none"; ></span> 
     
           </div>
           <div class="mb-3">
            <label for="sub_cat_id" class="form-label" style="color:cornflowerblue;">sub_cat_id</label>
            <input value="<?php echo $sub_cat_id;?>"   type="text"       class="sub_cat_id" id="sub_cat_id" placeholder="sub_cat_id" name="sub_cat_id" required>
           <?php 
                 if(!empty($error3)){
                echo '<span style="color:red;">'. $error3.'</span>';

               } 
             
            ?>
            <span id="sub_notification2" style="display:none"; ></span> 
            </div>
   
            <button type="button" class="btn btn-primary" onclick="Datainsert_catSub();"  >Add catagore types</button>
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
