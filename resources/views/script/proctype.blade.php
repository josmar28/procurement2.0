<script>
    @if(Session::get('pr_type_add'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created Procure Type",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("pr_type_add",false);
        ?>
        @endif

    @if(Session::get('pr_type_update'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated Procure Type",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("pr_type_update",false);
    ?>
    @endif

    @if(Session::get('pr_type_remove'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Procure Type Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("pr_type_remove",false);
    ?>
    @endif

    @if(Session::get('pr_type_remove_no'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Procure Type ID Not found",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("pr_type_remove_no",false);
    ?>
    @endif

</script>