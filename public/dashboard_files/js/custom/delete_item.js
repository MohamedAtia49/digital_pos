//delete
$('.delete').click(function (e) {

    var that = $(this)

    e.preventDefault();

    var n = new Noty({
        text: `<div style="text-align: center;">@lang('site.confirm_delete')</div>`,
        type: "error",
        layout: 'topCenter',
        killer: true,
        buttons: [
            Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                that.closest('form').submit();
            }),

            Noty.button("@lang('site.no')", 'btn btn-warning mr-2', function () {
                n.close();
            })
        ]
    });

    n.show();

});//end of delete
