<?php
/*
  Plugin Name: Facebook Comments Plugin
  Plugin URI: http://www.drizzlethemes.com/
  Description: Facebook comments plugin lets people comment on listing at your site using their Facebook account.
  Version: 1.0.0
  Author: DrizzleThemes
  Author URI: http://www.drizzlethemes.com/
  Short Name: fb_comments_plugin
 */

function fb_comments_plugin_call_after_install() {
  //osc_set_preference('fb_api', 'Api id', 'fb_comments_plugin', 'STRING');
  osc_set_preference('fb_comments_count', '3', 'fb_comments_plugin', 'STRING');
  osc_set_preference('fb_comments_order', 'reverse_time', 'fb_comments_plugin', 'STRING');
  osc_set_preference('fb_comments_theme', 'light', 'fb_comments_plugin', 'STRING');
  
  
}

function fb_comments_plugin_call_after_uninstall() {
  osc_delete_preference('fb_api', 'fb_comments_plugin');
  osc_delete_preference('fb_comments_count', 'fb_comments_plugin');
  osc_delete_preference('fb_comments_order', 'fb_comments_plugin');
  osc_delete_preference('fb_comments_theme', 'fb_comments_plugin');
  
  
}

function fb_comments_plugin_actions() {
  $dao_preference = new Preference();
  $option = Params::getParam('fbcommentoption');

  if (Params::getParam('file') != 'fb_comments_plugin/admin/admin.php') {
    return '';
  }

  if ($option == 'fbcommentsettings') {
    osc_set_preference('fb_api', Params::getParam("fb_api") ? Params::getParam("fb_api") : '0', 'fb_comments_plugin', 'STRING');
	osc_set_preference('fb_comments_count', Params::getParam("fb_comments_count") ? Params::getParam("fb_comments_count") : '0', 'fb_comments_plugin', 'STRING');
	osc_set_preference('fb_comments_order', Params::getParam("fb_comments_order") ? Params::getParam("fb_comments_order") : '0', 'fb_comments_plugin', 'STRING');
	osc_set_preference('fb_comments_theme', Params::getParam("fb_comments_theme") ? Params::getParam("fb_comments_theme") : '0', 'fb_comments_plugin', 'STRING');
    
    osc_add_flash_ok_message(__('Facebook Comments has been updated', 'fb_comments_plugin'), 'admin');
    osc_redirect_to(osc_admin_render_plugin_url('fb_comments_plugin/admin/admin.php'));
  }
}

// HELPER
function dd_fb_api() {
  return(osc_get_preference('fb_api', 'fb_comments_plugin'));
}
function dd_fb_count() {
  return(osc_get_preference('fb_comments_count', 'fb_comments_plugin'));
}
function dd_fb_order() {
  return(osc_get_preference('fb_comments_order', 'fb_comments_plugin'));
}
function dd_fb_theme() {
  return(osc_get_preference('fb_comments_theme', 'fb_comments_plugin'));
}

function fb_comments_plugin_admin() {
  osc_admin_render_plugin('fb_comments_plugin/admin/admin.php');
}

/**
 * Create a menu on the admin panel
 */
function fb_comments_plugin_admin_menu() {
  
    osc_add_admin_submenu_divider('plugins', 'FB Comments', 'fb_comments_plugin', 'administrator');
    osc_add_admin_submenu_page('plugins', __('Settings', 'fb_comments_plugin'), osc_route_admin_url('fb-comments-plugin-admin-conf'), 'fb_comments_plugin_settings', 'administrator');
}


function fb_commentmeta() {?>
<meta property="fb:app_id" content="<?php echo dd_fb_api();?>" />
<?php }

function fb_commethook() { ?>
<div class="item-comments fb-comment-box">
<h3><?php _e('Facebook Comments', 'fb_comments_plugin'); ?></h3>
<div id="fb-root"></div>
<script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/<?php echo osc_current_user_locale(); ?>/sdk.js#xfbml=1&version=v2.3&appId=<?php echo dd_fb_api();?>";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
 <div class="fb-comments" data-href="<?php echo osc_base_url(); ?>index.php?page=item&id=<?php echo osc_item_id(); ?>" data-order-by="<?php echo dd_fb_order();?>" data-numposts="<?php echo dd_fb_count();?>" data-width="100%" data-colorscheme="<?php echo dd_fb_theme();?>"></div>
</div>
<?php }

osc_add_route('fb-comments-plugin-admin-conf', 'fb_comments_plugin', 'fb_comments_plugin', osc_plugin_folder(__FILE__).'admin/admin.php'); 

//Insert FB App ID to Meta
osc_add_hook('header', 'fb_commentmeta');

osc_add_hook('dd_fb_comments', 'fb_commethook');
osc_add_hook('init_admin', 'fb_comments_plugin_actions');

// show menu items
osc_add_hook('admin_menu_init', 'fb_comments_plugin_admin_menu');

// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__) . "_uninstall", 'fb_comments_plugin_call_after_uninstall');
osc_add_hook(osc_plugin_path(__FILE__) . "_configure", 'fb_comments_plugin_admin');


// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'fb_comments_plugin_call_after_install');
?>