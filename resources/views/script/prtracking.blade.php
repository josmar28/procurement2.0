<script>
    @if(Session::get('update_pr'))
        Lobibox.notify('success', {
            title: "",
            msg: "Draft Succesfully Updated",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("update_pr",false);
        ?>
    @endif

    @if(Session::get('remote_pr'))
        Lobibox.notify('warning', {
            title: "",
            msg: "PR Removed!",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("remote_pr",false);
        ?>
    @endif
</script>