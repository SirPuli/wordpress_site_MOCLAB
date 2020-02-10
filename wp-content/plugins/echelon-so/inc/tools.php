<?php

/**
* Create page
*/

function echelonso_register_options_page() {
    add_submenu_page('tools.php', 'Regenerate Echelon Plugin Styles', 'Regenerate Echelon Plugin Styles', 'manage_options', 'echelon-so', 'echelonso_options_page');
}
add_action('admin_menu', 'echelonso_register_options_page');

function echelonso_options_page()
{
    ?>
    <h1>Echelon</h1>
    <p>When you make changes in the customizer you will need to regenerate the css.</p>
    <span id="echelon-regen" class="button button-primary">Regenerate Echelon CSS</span>
    <div id="echelon-regen-tracker" class="idle">Ready.</div>
    <style type="text/css">
    #echelon-regen-tracker {
        width: 300px;
        margin-top: 30px;
        padding: 15px;
    }
    #echelon-regen-tracker.idle {
        background: #fafafa;
        border: 1px solid #ececec;
    }
    </style>
    <script type="text/javascript">
    (function($) {
        $(document).ready(function() {
            $('#echelon-regen').on('click', function() {
                
                if (!$(this).hasClass('disabled')) {
                    
                    var button = $(this)
                    button.addClass('disabled')
                    $('#echelon-regen-tracker').html('Please wait, this might take some time.')
                    
                    $.ajax({
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        type: "post",
                        data: {
                            action: 'echelonso_regen_less'
                        },
                        success: function (response) {
                            button.removeClass('disabled')
                            $('#echelon-regen-tracker').html('Done, the old css file may still be cached in your browser.')
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            $('#echelon-regen-tracker').html(textStatus + errorThrown)
                        }
                    });
                    
                }
                
            })
        })
    })(jQuery)
    </script>
    <?php
} ?>
