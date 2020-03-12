<style type="text/css">
	#content-page { background:#e5e5e5; }
	.col6 { width:650px; float:left; margin:0 10px; }
	.col5 { width:500px; float:left;  margin:0 10px; }
	.form-container { border:2px solid #ddd; background:#fff; }
	.form-container h2 { margin:0; padding:10px 15px; background:#47639e; color:#fff;}
	.form-container fieldset { padding:15px; }
	.form-container .quote { padding:15px; border:1px solid #eee; background:#f9f9f9; margin:15px; }
	.control-group { margin-bottom:15px; }
	.control-label { margin-bottom:5px; display:block; }
	.form-actions { margin-top:15px; margin-bottom:0;}
	.form-horizontal .form-actions { padding-left:15px;}
	.form-container input[type=text], .form-container select { padding:10px; width:95%; }
	.form-container input[type=text].swidth { width:20%; }
	
	.help { color:#999; font-size:12px; }
	.clearfix { clear:both; }
</style>
<div class="plugin-page">
	<div class="col5">
		<?php $pluginInfo = osc_plugin_get_info('fb_comments_plugin/index.php');  ?>
        <div class="form-container">
        <h2 class="render-title"><?php _e('Facebook Comments Settings', 'fb_comments_plugin'); ?></h2>
        <form action="<?php echo osc_admin_render_plugin_url('fb_comments_plugin/admin/admin.php'); ?>" class="form-horizontal" method="post">
          <input type="hidden" name="fbcommentoption" value="fbcommentsettings" />
          <fieldset>
          <div class="control-group">
            <label class="control-label"><?php _e('Facebook App ID', 'fb_comments_plugin'); ?></label>
            <div class="controls">
                <input name="fb_api" type="text" value="<?php echo osc_esc_html(dd_fb_api()); ?>"/>
            </div>
            <span class="help"><?php _e('Get your Facebook App ID', 'fb_comments_plugin'); ?>, <a href="https://developers.facebook.com/apps" target="_blank"><?php _e('Click here', 'fb_comments_plugin'); ?></a>.</span>
          </div>
          
           <div class="control-group">
            <label class="control-label"><?php _e('Number of Comments', 'fb_comments_plugin'); ?></label>
            <div class="controls">
                <input class="swidth" name="fb_comments_count" type="text" value="<?php echo osc_esc_html(dd_fb_count()); ?>"/>
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label"><?php _e('Sort by', 'fb_comments_plugin'); ?></label>
            <div class="controls">
          
            <select name="fb_comments_order">
            	<option <?php if(osc_esc_html(dd_fb_order())=='social'){echo "selected='selected'";}?> value="social"><?php _e('Top', 'fb_comments_plugin'); ?></option>
                <option <?php if(osc_esc_html(dd_fb_order())=='time'){echo "selected='selected'";}?> value="time"><?php _e('Oldest', 'fb_comments_plugin'); ?></option>
                <option <?php if(osc_esc_html(dd_fb_order())=='reverse_time'){echo "selected='selected'";}?> value="reverse_time"><?php _e('Newest', 'fb_comments_plugin'); ?></option>
            </select>
            </div>
           
          </div>
          
          <div class="control-group">
            <label class="control-label"><?php _e('Color scheme', 'fb_comments_plugin'); ?></label>
            <div class="controls">
           	<select name="fb_comments_theme">
            	<option <?php if(osc_esc_html(dd_fb_theme())=='dark'){echo "selected='selected'";}?> value="dark"><?php _e('Dark', 'fb_comments_plugin'); ?></option>
                <option <?php if(osc_esc_html(dd_fb_theme())=='light'){echo "selected='selected'";}?> value="light"><?php _e('Light', 'fb_comments_plugin'); ?></option>
            </select>
            </div>
           
          </div>
          
          <p><strong><?php _e('Code', 'fb_comments_plugin'); ?>:</strong><br /><?php _e('Use following code to show Facebook comments at listing page', 'fb_comments_plugin'); ?> (item.php)<br /><br />
          	<code>&lt;?php osc_run_hook('dd_fb_comments'); ?&gt;</code></p><br />
          <p><?php _e('Visit the', 'fb_comments_plugin'); ?> <a href="https://developers.facebook.com/tools/comments/" target="_blank"><?php _e('Comment settings', 'fb_comments_plugin'); ?></a>. <?php _e('You will get a list of all your Facebook apps, which enables you to moderate all comments tied to the corresponding app', 'fb_comments_plugin'); ?>. </p>
         </fieldset>
          
          <div class="form-actions">
            <input type="submit" value="<?php _e('Save changes', 'fb_comments_plugin'); ?>" class="btn btn-submit">
          </div>
          
        </form>
        </div>
        
        <div class="footer">
            <p class="form-row">
            &copy; <?php echo date('Y'); ?> <?php _e('Facebook Comments Plugin', 'fb_comments_plugin'); ?> - <a href="http://docs.drizzlethemes.com/facebook-comments-plugin/" target="_blank"><?php _e('Documentation', 'fb_comments_plugin'); ?></a> - <a href="https://drizzlethemes.com/support" target="_blank"><?php _e('Support', 'fb_comments_plugin'); ?></a> - <a href="http://www.drizzlethemes.com/">DrizzleThemes</a>.
            </p>
        </div>
	</div><!-- /Col5 -->
    
    <div class="clearfix"></div>
</div>
