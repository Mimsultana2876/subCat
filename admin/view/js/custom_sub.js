 $(document).ready(function(){
    showData();
    editData();
    pagination();
    deletData();
});
  var error2="please fill up the subCat_name";
  var error3="please fill up the subCat_code";
  var error4="please fill up the subCat_info";

function Datainsert_sub(){
    var sub_cat_name = document.getElementById ("sub_cat_name").value;
    var sub_cat_code = document.getElementById ("sub_cat_code").value;
    var sub_cat_info = document.getElementById ("sub_cat_info").value;
    //alert(subCat_name);
     if(sub_cat_name==" " ||sub_cat_code == " " || sub_cat_info==" "){
        if(sub_cat_name==" " ||sub_cat_code == " " || sub_cat_info==" "){
         
            document.getElementById("subCat_notification1").innerHTML=error2;
           document.getElementById("subCat_notification1").style.display="block";
           document.getElementById("subCat_notification1").style.color="red";
           document.getElementById("subCat_notification2").innerHTML=error3;
           document.getElementById("subCat_notification2").style.display="block";
           document.getElementById("subCat_notification2").style.color="red";
           document.getElementById("subCat_notification3").innerHTML=error4;
           document.getElementById("subCat_notification3").style.display="block";
           document.getElementById("subCat_notification3").style.color="red";
          
    
        }
        else if(sub_cat_name == ""){
            
          document.getElementById("subCat_notification1").innerHTML=error2;
           document.getElementById("subCat_notification1").style.display="block";
           document.getElementById("subCat_notification1").style.color="red";
           document.getElementById("subCat_notification2").style.display="none";
           document.getElementById("subCat_notification3").style.display="none";
          
    
        }
        else if(sub_cat_code ==""){
            document.getElementById("subCat_notification2").innerHTML=error3;
            document.getElementById("subCat_notification2").style.display="block";
            document.getElementById("subCat_notification2").style.color="red";
            document.getElementById("subCat_notification1").style.display="none";
            document.getElementById("subCat_notification3").style.display="none";
         
           
        }
        else{
            document.getElementById("subCat_notification3").innerHTML=error4;
            document.getElementById("subCat_notification3").style.display="block";
            document.getElementById("subCat_notification3").style.color="red";
            document.getElementById("subCat_notification2").style.display="none";
            document.getElementById("subCat_notification1").style.display="none";
        }
       
    }  
   
     else{
            
          
        $.ajax({
            method:"POST",
            url:"insert_sub.php",
            data:{
                name:sub_cat_name,
                code:sub_cat_code,
                info:sub_cat_info
            },
            success:function(data){
                if (data==1)
                {
                    var success = "successfully inserted";
                     document.getElementById("mainsub_notification").innerHTML=success;
                    document.getElementById("mainsub_notification").style.display="block";
                    document.getElementById("mainsub_notification").style.color="green";
                    document.getElementById("subCat_notification1").style.display="none";
                    document.getElementById("subCat_notification2").style.display="none"; 
                    document.getElementById("subCat_notification3").style.display="none"; 
                }
               /*  $('#show_data').html(data);*/ 
               //document .getElementById("show_table_div").style.display="block";
                 
    
                 showData();
                 //alert("Successfully inserted");
   
           }
            
            
              
        }); 
      
      
    }  
    
   
}
/* function showData(){
    //alert("show");
    $.ajax({
        method:"POST",
        url:"show_sub.php",
        
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
        var sub_cat_id = $(this).attr('id');
        //alert(id);
       $.ajax({
           method: "POST",
           url: "fetch_single_data_sub.php",
           data: {
               id: sub_cat_id
           },
           dataType: 'json',
           success: function(data) {
                //alert(JSON.stringify(data[0].sub_cat_id)); 
                localStorage.setItem('name', data[0].subCat_name);
               localStorage.setItem('code', data[0].subCat_code);
               localStorage.setItem('code', data[0].subCat_info);
               var options = {
                   ajaxPrefix: ''
               };
               new Dialogify('../view/layout/edit_data_form_sub.php', options)
                   .title('Edit Sub_Category Type Data')
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
                               form_data.append('info', $('#info').val());
                               form_data.append('id', data[0].sub_cat_id);
                               //alert(form_data);
                               $.ajax({
                                   method: "POST",
                                   url: 'edit_data_sub.php',
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
                                           url: "show_sub.php",
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
         url:"show_sub.php",
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
            url:"delete_sub.php",
            method:"POST",
            data:{del_id:delete_id},
            success:function(data){
               showData();
   
            }
       });
    });  

}  */