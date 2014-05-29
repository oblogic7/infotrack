// @codekit-prepend "vendors/jquery/jquery-1.11.0.js"
// @codekit-prepend "vendors/jquery/jquery-ui-1.10.3.js"
// @codekit-prepend "vendors/bootstrap/bootstrap.js"
// @codekit-prepend "vendors/datatables/jquery.dataTables.js"
// @codekit-prepend "vendors/datatables/dataTables.bootstrap.js"
// @codekit-prepend "vendors/slimScroll/jquery.slimscroll.js"
// @codekit-prepend "vendors/bower_components/typeahead.js/dist/bloodhound.js"
// @codekit-prepend "vendors/bower_components/typeahead.js/dist/typeahead.jquery.js"

// @codekit-prepend "vendors/AdminLTE/app.js"

(function () {
    "use strict";

    var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
        'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
        'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
        'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
        'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
        'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
        'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
        'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
        'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
    ];

// constructs the suggestion engine
    var clients = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `states` is an array of state names defined in "The Basics"
        prefetch: '/typeahead/clients'
    });

// kicks off the loading/processing of `local` and `prefetch`
    clients.initialize();

    $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'clients',
            displayKey: 'name',
            // `ttAdapter` wraps the suggestion engine in an adapter that
            // is compatible with the typeahead jQuery plugin
            source: clients.ttAdapter(),
            templates: {
                header: '<h3>Clients</h3>',
//                suggestion: Handlebars.compile('<p><strong>{{name}}</strong></p>')
            }

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

    var boxHeight = $('#chat-box').height();
        //SLIMSCROLL FOR CHAT WIDGET
        $('#chat-box').slimScroll({
            height: '250px',
        });

    $('document').ready(function () {
        $('#chat-box').slimScroll({ scrollTo: boxHeight + 'px' });
    });

})(jQuery);

