<div class="wrap">
    <h2>Pure Highlightjs <?php echo __('Settings', 'pure-highlightjs'); ?></h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'pure-highlightjs-group' ); ?>
        <?php do_settings_sections( 'pure-highlightjs-group' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php echo __('Theme', 'pure-highlightjs') ?></th>
                <td>
                    <select name="pure-highlightjs-theme">
                        <?php foreach (pure_highlightjs_get_style_list() as $style) {
                            echo '<option value="' . esc_attr($style) . '"';
                            if ( $style == pure_highlightjs_option('pure-highlightjs-theme', PURE_HIGHLIGHTJS_DEFAULT_THEME) ) {
                                echo ' selected="selected"';
                            }
                            echo '>' . esc_attr($style) . '</option>';
                        } ?>
                    </select>
                </td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_attr_e('Save Changes', 'pure-highlightjs');?>">
            <input type="hidden" name="formaction" value="update-pure-highlightjs">
        </p>
    </form>
</div>