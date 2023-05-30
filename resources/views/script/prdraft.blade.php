<script>
    @if(Session::get('create_pr'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created PR",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("create_pr",false);
        ?>
        @endif

    @if(Session::get('update_pr'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated PR",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("update_pr",false);
    ?>
    @endif

    @if(Session::get('remove_pr'))
    Lobibox.notify('warning', {
        title: "",
        msg: "PR Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("remove_pr",false);
    ?>
    @endif

    @if(Session::get('add_item_draft'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Added Item",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("add_item_draft",false);
    ?>
    @endif
</script>