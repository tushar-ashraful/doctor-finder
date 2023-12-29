$(document).ready(function () {
    "use strict";
    $(".repeater-default").repeater(),
        $(".repeater-custom-show-hide").repeater({
            show: function () {
                $(this).slideDown();
                console.log('realpath')
                // $('.form-parsley').parsley();
	            //     $(".select").select2({
	            //     // placeholder: "Select a state",
	            //     width: "100%",
	            //     // allowClear: true,
	            // });

            },
            isFirstItemUndeletable: true,
            hide: function (e) {
                confirm("Are you sure you want to remove this item?") && $(this).slideUp(e);
            },
        });
});
