<div class="wrap">
    <?php settings_errors(); ?>

    <div>
        <form method="post" action="options.php">
            <?php
                settings_fields( 'spp_option_settings' );
                do_settings_sections( 'google_map_api_key' );
                submit_button();
            ?>
        </form>
    </div>
</div>