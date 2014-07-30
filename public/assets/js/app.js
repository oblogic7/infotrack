// @codekit-prepend "vendors/jquery/jquery-1.11.0.js"
// @codekit-prepend "vendors/jquery/jquery-ui-1.10.3.js"
// @codekit-prepend "vendors/bootstrap/bootstrap.js"
// @codekit-prepend "vendors/bootstrap-tagsinput/bootstrap-tagsinput.js"
// @codekit-prepend "vendors/datatables/jquery.dataTables.js"
// @codekit-prepend "vendors/datatables/dataTables.bootstrap.js"
// @codekit-prepend "vendors/slimScroll/jquery.slimscroll.js"
// @codekit-prepend "vendors/handlebars-v1.3.0.js"
// @codekit-prepend "vendors/chosen/chosen.jquery.js"
// @codekit-prepend "vendors/bower_components/typeahead.js/dist/bloodhound.js"
// @codekit-prepend "vendors/bower_components/typeahead.js/dist/typeahead.jquery.js"
// @codekit-prepend "vendors/AdminLTE/app.js"

/*=============================================
 Module Pattern
 @Matt Snyder- 2013
 =============================================*/

var INFOTRACK = (function () {

    /*========== Alias to settings ==========*/
    var s;

    return {

        /*========== Settings ==========*/
        settings: {
            sayHello: 'Hello World',
            sayBye: 'Bye World'
        },

        /*========== Table of Contents ==========*/
        init: function() {
            s = this.settings;

        },

        /*========== Say Hello ==========*/
        _InitSayHello: function() {
            console.log(s.sayHello);
        },

        /*========== Say Bye ==========*/
        _InitSayBye: function() {
            console.log(s.sayBye);
        }

    };

})();


/*========== Kick Start ==========*/
(function() {
    INFOTRACK.init();
})();




(function () {
    "use strict";


    var clients = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/typeahead/clients'
    });

    var clientAuth = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('token'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/typeahead/clientAuth'
    });

    var internalAuth = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('token'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/typeahead/internalAuth'
    });

    // initialize bloodhound data sets.
    clients.initialize();
    clientAuth.initialize();
    internalAuth.initialize();

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
            name: 'client_auth',
            displayKey: 'name',
            source: clientAuth.ttAdapter(),
            templates: {

                header: '<h3>Client Login Credentials</h3>',
                suggestion: Handlebars.compile('<strong>{{name}}</strong><span class="pull-right text-muted"><strong>{{client.name}}</strong></span>')
            }

        },
        {
            name: 'internal_auth',
            displayKey: 'name',
            source: internalAuth.ttAdapter(),
            templates: {

                header: '<h3>Internal Credentials</h3>',
                suggestion: Handlebars.compile('<strong>{{name}}</strong>')
            }

        }).bind('typeahead:selected', function (obj, datum, name) {
            window.location = datum.ta_url;
        });

    $('document').ready(function () {
        $('.chosen').chosen({width: '100%'})
    });

    // Uncloak password on hover.
    $('.unmask-pass').on('focus blur', function (e) {

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
        allMessages.each(function (i, m) {

            var isType = $(m).data('message-type').indexOf(messageType) > -1 ? 1 : 0;
            if (isType) {
                $(m).show();
            }

        })
        $('div[data-message-type="' + messageType + '"').show();

        if (!messageType) {
            $('div[data-message-type]').show();
        }
    });

    $('.role-dropdown').change(function() {

        var roleId = $(this).val();
        var userId = $(this).data('user-id');
        var url = 'http://infotrack.obscurelogic.com/users/' + userId + '/roles/' + roleId;
        var data = $(this).serialize();

        $.ajax({
            type: "PUT",
            url: url,
            data: data,
            dataType: 'json',
            success: function() {
                console.log('success');
            }
        });
    })


})(jQuery);

