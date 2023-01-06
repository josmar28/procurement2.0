<script>
    $('.additem_modal').on('click',function(){
        <?php echo 'var url ="'.asset('procurement/additem').'";';?>
        var id = $(this).data('id');
        var _token = "{{ csrf_token() }}";

        $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id:id,
                    _token: _token
                },
                success: function(data){
                    $('.additem_body').html(data);
                }
            });
  
    });

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