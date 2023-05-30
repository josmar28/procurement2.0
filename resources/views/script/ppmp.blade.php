<script>
    @if(Session::get('create_ppmp'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created PPMP",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("create_ppmp",false);
        ?>
        @endif

    @if(Session::get('update_ppmp'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated PPMP",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("update_ppmp",false);
    ?>
    @endif

    @if(Session::get('remove_ppmp'))
    Lobibox.notify('warning', {
        title: "",
        msg: "PPMP Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("remove_ppmp",false);
    ?>
    @endif

</script>