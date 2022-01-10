  <div class = "form-group">
    <lable>subCategory Name</lable>
    <br>
    <input type="text" name="name" id="name" class="form-control">
</div>
<div class = "form-group">
    <lable>subCategory code</lable>
    <br>
    <input type="text" name="code" id="code" class="form-control">
</div>
<div class = "form-group">
    <lable>subCategory info</lable>
    <br>
    <input type="text" name="info" id="info" class="form-control">
</div>
<script>
    $(document).ready(function(){
        var name= localStorage.getItem('name');
        var code= localStorage.getItem('code');
        var info= localStorage.getItem('info');
        $('#name').val(name); 
        $('#code').val(code);  
        $('#info').val(info);  
    });
</script>   