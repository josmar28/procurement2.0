<script>
    @if(Session::get('pr_type_inter_add'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created Procure Type Internal",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("pr_type_inter_add",false);
        ?>
        @endif

    @if(Session::get('pr_type_inter_update'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated Procure Type Internal",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("pr_type_inter_update",false);
    ?>
    @endif

    @if(Session::get('pr_type_inter_remove'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Procure Type Internal Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("pr_type_inter_remove",false);
    ?>
    @endif

    @if(Session::get('pr_type_inter_remove_no'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Procure Type Internal ID Not found",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("pr_type_inter_remove_no",false);
    ?>
    @endif

</script>