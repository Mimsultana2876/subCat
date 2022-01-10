function register(){
    var name = document.getElementById("nameValidation").value ;
    var pass = document.getElementById("password").value ;
    var conpass = document.getElementById("conpassword").value ;
    var pass = document.forms['FormName']['password'].value;
    var conpass = document.forms['FormName']['conPassword'].value;
    var email = document.getElementById("uemail").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var dob = document.getElementById("dob").value;
    //var dob = dob.split(".").reverse().join(".");
    //alert(dob);
    $.ajax({
        method:"POST",
        url:"insert_reg.php",
        data:{
            name:name,
            pass:pass,
            email:email,
            phoneNumber:phoneNumber,
            dob:dob
        },
        success:function(data){
            if (data==1){
               //alert ("both value are already exeisted") 
               alert("successfully inserted");
            }
            else{
                alert("somthing has problem");
            }
            
           /*  $('#show_data').html(data); */
           //document .getElementById("show_table_div").style.display="block";
             

             //showData();
             //alert("Successfully inserted");

        }
        
        
          
    });
   /*  if(a==''&& pass==''){
        var $error = "Please insert your name";
        var $error2 = "Please insert password";
        document.getElementById("error").innerHTML=$error;
        document.getElementById("error").style.display="block";
        document.getElementById("error").style.color="red";
        document.getElementById("error2").innerHTML=$error2;
        document.getElementById("error2").style.display="block";
        document.getElementById("error2").style.color="red";

    }
    else if(a.length<6){
        var $error = "Your name length should be greater than 5";
          var $error2 = "Your name length should be greater than 5";
         document.getElementById("error").innerHTML=$error;
        document.getElementById("error").style.display="block";
        document.getElementById("error").style.color="red";
        document.getElementById("error2").innerHTML=$error2;
        document.getElementById("error2").style.display="block";
        document.getElementById("error2").style.color="red";

    }
    else{
        var upper_a = a.charAt(0).toUpperCase()+a.slice(1);
       //a.charAT(0)= upper_a;
        //alert(upper_a);
    } */
}
function pass_match(){
    var pass = document.forms['FormName']['password'].value;
    var conpass = document.forms['FormName']['conPassword'].value;
    if(pass!=conpass){
        document.getElementById("main_notification").innerHTML="Password does not match";
        document.getElementById("main_notification").style.display="block";
        document.getElementById("main_notification").style.color="red";

    }
    else{
        document.getElementById("main_notification").innerHTML="Password varified";
        document.getElementById("main_notification").style.display="block";
        document.getElementById("main_notification").style.color="green";

    }
}
/* function image_upload(){
    $("#but_upload").click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files;
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: 'upload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); 
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
    });
} */
