// @codekit-prepend "vendors/jquery/jquery-1.11.0.js"
// @codekit-prepend "vendors/jquery/jquery-ui-1.10.3.js"
// @codekit-prepend "vendors/bootstrap/bootstrap.js"
// @codekit-prepend "vendors/datatables/jquery.dataTables.js"
// @codekit-prepend "vendors/datatables/dataTables.bootstrap.js"
// @codekit-prepend "vendors/slimScroll/jquery.slimscroll.js"
// @codekit-prepend "vendors/handlebars-v1.3.0.js"
// @codekit-prepend "vendors/bower_components/typeahead.js/dist/bloodhound.js"
// @codekit-prepend "vendors/bower_components/typeahead.js/dist/typeahead.jquery.js"
// @codekit-prepend "vendors/AdminLTE/app.js"

(function () {
    "use strict";


    var clients = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/typeahead/clients'
    });

    var auth = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/typeahead/auth'
    });

    // initialize bloodhound data sets.
    clients.initialize();
    auth.initialize();

    $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'clients',
            displayKey: 'name',
            source: clients.ttAdapter(),
            templates: {
                header: '<h3>Clients</h3>',
                suggestion: Handlebars.compile('<strong>{{name}}</strong>')
            }
        },
        {
            name: 'auth',
            displayKey: 'name',
            source: auth.ttAdapter(),
            templates: {

                header: '<h3>Client Login Credentials</h3>',
                suggestion: Handlebars.compile('<strong>{{name}}</strong><span class="pull-right text-muted"><strong>{{client.name}}</strong></span>')
            }

        }).bind('typeahead:selected', function (obj, datum, name) {
            window.location = datum.ta_url;
        });

    // Uncloak password on hover.
    $('.credentials-table tr input').on('focus blur', function (e) {

        if (e.type == 'focus') {
            $(this).attr('type', 'text');
        }

        if (e.type == 'blur') {
            $(this).attr('type', 'password');
        }
    })

    //SLIMSCROLL FOR CHAT WIDGET
    var boxHeight = $('#chat-box').height();
    $('#chat-box').slimScroll({
        height: '250px'
    });

    $('document').ready(function () {
        $('#chat-box').slimScroll({ scrollTo: boxHeight + 'px' });
    });


    // Client activity log filter buttons
    $('button.filter').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var messageType = $(this).data('filter');

        var allMessages = $('div[data-message-type]');

        // hide all messages
        allMessages.hide();

        //show messages of selected type only.
        allMessages.each(function(i, m) {

            var isType = $(m).data('message-type').indexOf(messageType) > -1 ? 1 : 0;
            if(isType) {
                $(m).show();
            }

        })
        $('div[data-message-type="' + messageType + '"').show();

        if (!messageType) {
            $('div[data-message-type]').show();
        }
    })

})(jQuery);

