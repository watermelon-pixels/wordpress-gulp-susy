<?php

/* ----------------------------------------------------------
Declare vars
------------------------------------------------------------- */
$themename = "Gulpsy";

function theme_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Panneau du thème</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields("section");
                do_settings_sections("theme-options");
                do_settings_sections("social-options");
                do_settings_sections("tracking-options");
                submit_button();
            ?>          
        </form>
    </div>
    <?php
}

function add_theme_menu_item()
{
    add_menu_page("Theme-Optionen", "Options de Gulpsy", "manage_options", "theme-panel", "theme_settings_page", null, 81);
}
add_action("admin_menu", "add_theme_menu_item");

function display_articleteaser()
{
    ?>
    <textarea id="article_teaser" style="width:100%;height:100px" name="article_teaser"><?php echo get_option('article_teaser'); ?></textarea>
    <?php
}

function display_facebook()
{
    ?>
    <input type="text" id="facebook_url" style="width:100%" name="facebook_url" value="<?php echo get_option('facebook_url'); ?>"/>
    <?php
}

function display_twitter()
{
    ?>
    <input type="text" id="twitter_url" style="width:100%" name="twitter_url" value="<?php echo get_option('twitter_url'); ?>"/>
    <?php
}

function display_youtube()
{
    ?>
    <input type="text" id="youtube_url" style="width:100%" name="youtube_url" value="<?php echo get_option('youtube_url'); ?>"/>
    <?php
}


function display_google_plus()
{
    ?>
    <input type="text" id="google_url" style="width:100%" name="google_url" value="<?php echo get_option('google_url'); ?>"/>
    <?php
}


function display_github()
{
    ?>
    <input type="text" id="github_url" style="width:100%" name="github_url" value="<?php echo get_option('github_url'); ?>"/>
    <?php
}

function display_linkedin()
{
    ?>
    <input type="text" id="linkedin_url" style="width:100%" name="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>"/>
    <?php
}

function display_pinterest()
{
    ?>
    <input type="text" id="pinterest_url" style="width:100%" name="pinterest_url" value="<?php echo get_option('pinterest_url'); ?>"/>
    <?php
}

function display_jscode_ga()
{
    ?>
    <textarea id="ga_js_code" style="width:100%;height:300px" name="ga_js_code"><?php echo get_option('ga_js_code'); ?></textarea>
    <?php
}


function display_logo_url()
{
    ?>
    <div class="uploader">
        <input id="logo_url" name="settings[logo_url]" type="text" />
        <input id="logo_url_button" class="button" name="logo_url_button" type="text" value="Upload" />
    </div>
    <?php
}

function add_theme_options()
{
    add_settings_section("section", "Options de réglage", null, "theme-options");
    add_settings_field("article_teaser", "A propos", "display_articleteaser", "theme-options", "section");
    register_setting("section", "article_teaser");

    add_settings_section("section", "Réseaux sociaux", null, "social-options");
    add_settings_field("facebook_url", "Facebook URL", "display_facebook", "social-options", "section");
    add_settings_field("twitter_url", "Twitter URL", "display_twitter", "social-options", "section");
    add_settings_field("youtube_url", "YouTube URL", "display_youtube", "social-options", "section");
    add_settings_field("google_url", "Google Plus URL", "display_google_plus", "social-options", "section");
    add_settings_field("github_url", "Github URL", "display_github", "social-options", "section");
    add_settings_field("pinterest_url", "Pinterest URL", "display_pinterest", "social-options", "section");
    add_settings_field("linkedin_url", "Linkedin URL", "display_linkedin", "social-options", "section");

    register_setting("section", "facebook_url");
    register_setting("section", "twitter_url");
    register_setting("section", "youtube_url");
    register_setting("section", "google_url");
    register_setting("section", "github_url");
    register_setting("section", "pinterest_url");
    register_setting("section", "linkedin_url");

    add_settings_section("section", "Tracking Code (Google Analytics)", null, "tracking-options");
    add_settings_field("ga_js_code", "JS Code", "display_jscode_ga", "tracking-options", "section");
    register_setting("section", "ga_js_code");

    add_settings_section("section", "Options de réglage", null, "theme-options");
    add_settings_field("logo_url", "Logo", "display_logo_url", "theme-options", "section");
    register_setting("section", "logo_url");

    echo"
    <script>
        jQuery(document).ready(function($){
            var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;

            $('.stag-metabox-table .button').click(function(e) {
                var send_attachment_bkp = wp.media.editor.send.attachment;
                var button = $(this);
                var id = button.attr('id').replace('_button', '');
                _custom_media = true;
                wp.media.editor.send.attachment = function(props, attachment){
                    if ( _custom_media ) {
                        $('#'+id).val(attachment.url);
                    } else {
                        return _orig_send_attachment.apply( this, [props, attachment] );
                    };
                }

                wp.media.editor.open(button);
                return false;
            });

            $('.add_media').on('click', function(){
                _custom_media = false;
            });
        });
    </script>";
}

add_action("admin_init", "add_theme_options");
