  <div class = "form-group">
    <lable>Category type Name</lable>
    <br>
    <input type="text" name="name" id="name" class="form-control">
</div>
<div class = "form-group">
    <lable>Category type code</lable>
    <br>
    <input type="text" name="code" id="code" class="form-control">
</div>
<script>
    $(document).ready(function(){
        var name= localStorage.getItem('name');
        var code= localStorage.getItem('code');
        $('#name').val(name); 
        $('#code').val(code);  
    });
</script>   