<script>
    @if(Session::get('create_supply'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created Supply",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("create_supply",false);
        ?>
        @endif

    @if(Session::get('update_supply'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated Supply",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("update_supply",false);
    ?>
    @endif

    @if(Session::get('remove_supply'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Supply Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("remove_supply",false);
    ?>
    @endif

</script>