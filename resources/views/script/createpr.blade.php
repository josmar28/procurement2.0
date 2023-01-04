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

    @if(Session::get('addPR'))
        Lobibox.notify('success', {
            title: "",
            msg: "Draft Succesfully Added",
            size: 'mini',e
            rounded: true
        });
        <?php
        Session::put("addPR",false);
        ?>
        @endif

</script>