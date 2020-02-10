(function($) {
    $(document).ready(function() {

        // linked widgets
        $("[data-echelonso_linked_widgets]").each(function(k, v) {
            $(v).wrapInner('<a href="'+$(v).data('echelonso_linked_widgets')+'" />');
        })

        // transition toggling
        $('.eso-add-transition-toggle').closest('.so-panel').addClass('uk-transition-toggle');

        // replicate hidden
        $('[uk-hidden="hidden"]').attr('hidden', '');

        // replicate totop
        $('[uk-totop="totop"]').attr('uk-totop', '');


    })

    $(window).resize(function() {
        $('.uk-container').width($('.uk-container').closest('.panel-grid').width());
    })

})(jQuery)
