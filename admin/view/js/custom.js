 $(document).ready(function(){
    showData();
    editData();
    pagination();
    deletData();
});
//var error1 = "Please fill up both forms";
/* var error2 = "Please fill up catagory type name.";
var error3 = "Please fill up catagory type code.";
var success = "successfully inserted"; */
var a = "plese fill up the file!";

function Datainsert(){
    var cat_type_name = document.getElementById ("cat_type_name").value;
    var cat_type_code = document.getElementById ("cat_type_code").value;
     if(cat_type_name==" " || cat_type_code== " "){
        if(cat_type_name==" " && cat_type_code==" " ){
         
            document.getElementById("sub_notification1").innerHTML=error2;
           document.getElementById("sub_notification1").style.display="block";
           document.getElementById("sub_notification1").style.color="red";
           document.getElementById("sub_notification2").innerHTML=error3;
           document.getElementById("sub_notification2").style.display="block";
           document.getElementById("sub_notification2").style.color="red";
          
    
        }
        else if(cat_type_name == ""){
            
          document.getElementById("sub_notification1").innerHTML=error2;
           document.getElementById("sub_notification1").style.display="block";
           document.getElementById("sub_notification1").style.color="red";
           document.getElementById("sub_notification2").style.display="none";
           document.getElementById("main_notification").style.display="none";
    
        }
        else if(cat_type_code ==""){
         
            document.getElementById("sub_notification2").innerHTML=error3;
            document.getElementById("sub_notification2").style.display="block";
            document.getElementById("sub_notification2").style.color="red";
            document.getElementById("sub_notification1").style.display="none";
            document.getElementById("main_notification").style.display="none";
        }
       
    }  
    //alert("plese fill up catagory name");
  
    //alert ("cat_type_name");
    else{
            
          
        $.ajax({
            method:"POST",
            url:"insert.php",
            data:{
                name:cat_type_name,
                code:cat_type_code
            },
            success:function(data){
                if (data==1){
                    alert ("both value are already exeisted") 
                }
                else{
                    var success = "successfully inserted";
                     document.getElementById("main_notification").innerHTML=success;
                    document.getElementById("main_notification").style.display="block";
                    document.getElementById("main_notification").style.color="green";
                    document.getElementById("sub_notification1").style.display="none";
                    document.getElementById("sub_notification2").style.display="none"; 
                }
               /*  $('#show_data').html(data); */
               //document .getElementById("show_table_div").style.display="block";
                 
    
                 showData();
                 //alert("Successfully inserted");
   
           }
            
            
              
        }); 
      
      
    } 
    
   
}
function showData(){
    //alert("show");
    $.ajax({
        method:"POST",
        url:"show.php",
        
        success:function(data){
             $('#show_data').html(data);
            document .getElementById("show_table_div").style.display="block";
 
           //showData();
           //alert("Successfully inserted");

        }
          
    }); 
} 

function editData(){
    $(document).on('click','.editBtn', function(){
        var cat_id = $(this).attr('id');
        //alert(id);
       $.ajax({
           method: "POST",
           url: "fetch_single_data.php",
           data: {
               id: cat_id
           },
           dataType: 'json',
           success: function(data) {
                //alert(JSON.stringify(data[0].cat_id)); 
                localStorage.setItem('name', data[0].cat_type_name);
               localStorage.setItem('code', data[0].cat_type_code);
               var options = {
                   ajaxPrefix: ''
               };
               new Dialogify('../view/layout/edit_data_form.php', options)
                   .title('Edit Category Type Data')
                   .buttons([
                       {
                           text:'Cancle',
                           click:function(e){
                               this.close();
                           }

                       },
                       {
                           text: 'Edit',
                           type: Dialogify.BUTTON_PRIMARY,
                           click: function(e) {
                               var form_data = new FormData();
                               form_data.append('name', $('#name').val());
                               form_data.append('code', $('#code').val());
                               form_data.append('id', data[0].cat_id);
                               //alert(form_data);
                               $.ajax({
                                   method: "POST",
                                   url: 'edit_data.php',
                                   data: form_data,
                                   contentType: false,
                                   cache: false,
                                   processData: false,
                                   success: function(data) {
                                         //alert("kdji");
                                         //alert(data);
                                        $.ajax({
                                         async:true,
                                           cache: false,
                                           processData:false, 
                                           method: "POST",
                                           url: "show.php",
                                           success: function(data) {
                                               $('#show_data').html(data);
                                           }
                                       });  
                                   }
                               });


                           }
                       }

                   ]).showModal(); 
           }

       });

    });
}
function pagination(page){
    $.ajax({
         url:"show.php",
         method:"POST",
         data:{page:page},
         success:function(data){
             //alert(data);
             $('#pagination_data').html(data);

         }
    });
    
}
$(document).on('click', '.pagination_link', function(){  
  
    //alert('osjk');
    var page =$(this).attr('id');
    pagination(page);
    //alert(id);
});  
function deletData(){
    $(document).on('click', '.deleteBtn', function(){  
        var delete_id =$(this).attr('id');
        $.ajax({
            url:"delete.php",
            method:"POST",
            data:{del_id:delete_id},
            success:function(data){
               showData();
   
            }
       });
    });  

} 