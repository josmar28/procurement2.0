<script>
    $('.createpr_modal').on('click',function(){
        <?php echo 'var url ="'.asset('procurement/createpr').'";';?>
        $.ajax({    
            url:url,
            type: 'GET',
            success: function(data){
                $('.createpr_body').html(data);
            }
        })
  
    });
</script>