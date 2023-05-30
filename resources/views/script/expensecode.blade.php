<script>
    @if(Session::get('expense_add'))
        Lobibox.notify('success', {
            title: "",
            msg: "Successfully Created Expense Code",
            size: 'mini',
            rounded: true
        });
        <?php
        Session::put("expense_add",false);
        ?>
        @endif

    @if(Session::get('expense_update'))
    Lobibox.notify('success', {
        title: "",
        msg: "Successfully Updated Expense Code",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("expense_update",false);
    ?>
    @endif

    @if(Session::get('expense_remove'))
    Lobibox.notify('warning', {
        title: "",
        msg: "Expense Code Removed",
        size: 'mini',
        rounded: true
    });
    <?php
    Session::put("expense_remove",false);
    ?>
    @endif

</script>