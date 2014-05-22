// @codekit-prepend "vendors/jquery/jquery-1.11.0.js"
// @codekit-prepend "vendors/jquery/jquery-ui-1.10.3.js"
// @codekit-prepend "vendors/bootstrap/bootstrap.js"
// @codekit-prepend "vendors/datatables/jquery.dataTables.js"
// @codekit-prepend "vendors/datatables/dataTables.bootstrap.js"
// @codekit-prepend "vendors/slimScroll/jquery.slimscroll.js"

// @codekit-prepend "vendors/AdminLTE/app.js"

(function () {
    "use strict";

    // Uncloak password on hover.
    $('.credentials-table tr input').on('focus blur', function (e) {

        if (e.type == 'focus') {
            $(this).attr('type', 'text');
        }

        if (e.type == 'blur') {
            $(this).attr('type', 'password');
        }
    })

    var boxHeight = $('#chat-box').height();
        //SLIMSCROLL FOR CHAT WIDGET
        $('#chat-box').slimScroll({
            height: '250px',
        });

    $('document').ready(function () {
        $('#chat-box').slimScroll({ scrollTo: boxHeight + 'px' });
    });

})(jQuery);

