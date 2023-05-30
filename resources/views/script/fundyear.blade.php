<script>
    @if(Session::get('year_add'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created Fund Year",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("year_add",false);
        ?>
        @endif

    @if(Session::get('year_update'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated Fund Year",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("year_update",false);
    ?>
    @endif

    @if(Session::get('year_remove'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Year Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("year_remove",false);
    ?>
    @endif

</script>