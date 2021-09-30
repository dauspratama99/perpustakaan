<div class="form-group well">
<div id="tampil"></div>



<script>
    $(function(){
        $("#tampil").load("<?php echo site_url('coba/tampilData');?>");
        
        $(".hapus").live("click",function(){
            alert("wwkwkwk");
        })
    })
</script>