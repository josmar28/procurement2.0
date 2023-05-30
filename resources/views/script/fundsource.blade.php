<script>
    @if(Session::get('source_add'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created Fund Source",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("source_add",false);
        ?>
        @endif

    @if(Session::get('source_update'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated Fund Source",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("source_update",false);
    ?>
    @endif

    @if(Session::get('remove_source'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Fund Source Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("remove_source",false);
    ?>
    @endif

</script>