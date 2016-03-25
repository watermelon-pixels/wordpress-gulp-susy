<?php
  function ib_theme_settings_page() {
    ?>
      <div class="wrap">
        <h1>Theme options</h1>
        <form method="post" action="options.php">
          <?php
            settings_fields("general_section");
            do_settings_sections("general-options");

            submit_button();
          ?>
        </form>
      </div>
    <?php
  }

  function ib_google_analytics() {
  ?>
    <input type="text" name="google_analytics" id="google_analytics" value="<?php echo esc_attr(get_option('google_analytics')); ?>" />
  <?php
  }

  function ib_footer_text() {
  ?>
    <textarea type="textarea" name="footer_text" id="footer_text"><?php echo esc_attr(get_option("footer_text")); ?></textarea>
  <?php
  }

  function ib_display_theme_settings_fields() {
    add_settings_section("general_section", "General", null, "general-options");

    add_settings_field("google_analytics", "Google Analytics ID", "ib_google_analytics", "general-options", "general_section");
    register_setting("general_section", "google_analytics");

    add_settings_field("footer_text", "Footer text", "ib_footer_text", "general-options", "general_section");
    register_setting("general_section", "footer_text");
  }

  add_action("admin_init", "ib_display_theme_settings_fields");
