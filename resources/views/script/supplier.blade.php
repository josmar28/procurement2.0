<script>
    @if(Session::get('create_supplier'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created Supplier",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("create_supplier",false);
        ?>
        @endif

    @if(Session::get('update_supplier'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated Supplier",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("update_supplier",false);
    ?>
    @endif

    @if(Session::get('remove_supplier'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Supplier Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("remove_supplier",false);
    ?>
    @endif

</script>