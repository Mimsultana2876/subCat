<?php include_once '../Model/db_confige.php';?>
<?php 

    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
        $name =trim( $_POST['name']);
        $pass =trim( $_POST['pass']);
        $email =trim( $_POST['email']);
        $phoneNumber =trim( $_POST['phoneNumber']);
        //$pass =trim( $_POST['pass']);
        $dob =trim( $_POST['dob']);
        
        $sql="INSERT INTO admins (admin_name,admin_email,admin_password,admin_phone_number,admin_DOB,v_key,v_status)VALUES(?,?,?,?,?,?,?,)";
        $sql_statment=mysqli_prepare($link,$sql);
        
            if($sql_statment){
                $v_key = md5(time().$email);
                mysqli_stmt_bind_param($sql_statment,"ssssssi", $var1, $var2,$var3,$var4,$var5,$var6,$var7);
                $var1=$name;
                $var2=$email;
                $var3=md5($pass);
                $var4=$dob;
                $var5=$phoneNumber;
                $var6=$v_key;
                $var7=0;

                $execute= mysqli_stmt_execute($sql_statment);
                if($execute){
                
                $success = "Successfully inserted.";
                echo (1);
                /* header("location:index.php"); */
                }
                else{
                    echo(2);
                }
                 
        
        
            }
    }
  
?> 
