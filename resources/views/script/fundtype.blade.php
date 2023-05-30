<script>
    @if(Session::get('type_add'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created Fund Type",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("type_add",false);
        ?>
        @endif

    @if(Session::get('type_update'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated Fund Type",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("type_update",false);
    ?>
    @endif

    @if(Session::get('remove_type'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Fund Type Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("remove_type",false);
    ?>
    @endif

</script>