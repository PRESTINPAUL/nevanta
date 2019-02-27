<?php
if (!defined('ABSPATH')) {
    exit();
}
?>
<style>.wpdiscuz_progressbar{ background:url(<?php echo plugins_url(WpdiscuzCore::$PLUGIN_DIRECTORY . '/'); ?>assets/img/progressbar.gif) left no-repeat #FFFFFF;  box-sizing:border-box; overflow:hidden; font-size:16px; color:#FFFFFF; padding:14px 0px 15px 0px; min-width:50px!important; white-space:nowrap; } </style>
<div>
    <h2 style="padding:5px 10px 10px 10px; margin:0px;"><?php _e('Supercharge existing comments', 'wpdiscuz'); ?> </h2>
    <p style="padding:10px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif;">
        <?php _e("wpDiscuz 3.0 and all future 3.x versions have been named as Supercharged. 
        It's super fast and perfectly optimized. wpDiscuz 3 version is dozens of times faster than 1.x and 2.x versions. 
        The Supercharged version supports millions of comments per post, so the number of comments doesn't matter anymore. 
        You can use wpDiscuz for extremely large and active websites without any worry. <br />
        To start using this crazy machine you should do one-time data optimization of existing comments. 
		All new comments will be automatically optimized. Just click on [Supercharge my comments] button and wait for 100% result. 
		<span style='color:#0091CD'>Please be patient. The duration of this process depends on number of your website comments. It may take minutes if you have more than 1000 comments.</span>
		This process doesn't affect any data, it doesn't re-store comments in different tables, it just collects comments thread hierarchy and relationship information.<br />", 'wpdiscuz'); ?>
    </p>
    <div style="margin:20px 0px 30px 0px;">
        <div style="max-width:400px; float:left; padding:10px; margin-right:20px;">
            <?php
            $realLastCommentId = $this->dbManager->getLastCommentId();
            $disabled = $realLastCommentId ? '' : 'disabled="disabled"';
            ?>
            <input id="wpdiscuz_synch_comments_count" value="25" style="width:80px;" type="number" placeholder="<?php _e('Default value is 25', 'wpdiscuz'); ?>" name="wpdiscuz_synch_comments_count"/>
            <button <?php echo $disabled; ?> type="button" class="button button-primary" style="background:#4793C8;" id="wpdiscuz_synch_comments"><?php _e('Supercharge My Comments', 'wpdiscuz'); ?></button>
            <br />
            <span style="font-size:11px; color:#666666;"><?php _e("Number of comments per request", 'wpdiscuz'); ?></span>
        </div>
        <div style="min-width:354px; float:left; border-radius:4px; border:#CCCCCC 1px solid;">
            <div id="wpdiscuz_progressbar_wrapper" class="wrap" style="max-width:354px; height:50px; width:100%; margin:0px;"></div>
        </div>
        <div style="clear:both;"></div>
        <div style="font-size:13px; color:#666666; padding:10px;"><?php _e("Please note: If your comments are not optimized yet, those are hidden on front-end. All comments will be back once this process is completed.", 'wpdiscuz'); ?></div>
        <div style=" padding:15px; margin:15px 0px; background:#EDFAFF; font-size:13px;">
        <h3 style="margin-top:0px; padding-top:0px;">Some good tips</h3>
        <p style="font-size:14px; font-weight:bold; margin-bottom:5px;"> If the [Supercharge my comments] button doesn't work:</p>
        This problem comes just because you have some "Warning" errors getting outputted before the first header gets written ( or in-between ). 
        This is the 90% of all cases. This comes from different plugins. We can't check all those so we've created a stand-alone version of comment supercharger:
        <ol>
            <li style="margin-bottom:2px">Please download this file: <a href="http://wpdiscuz.com/300/wpdiscuz.zip" target="_blank">http://wpdiscuz.com/300/wpdiscuz.zip</a></li>
            <li style="margin-bottom:2px">Unzip and upload wpdiscuz.php file to root directory of your WordPress site.</li>
            <li style="margin-bottom:2px">Than call it like <span style="color:#FF6633">http://example.com/wpdiscuz.php</span></li>
            <li style="margin-bottom:2px">This will show you a form with [Go] button. Just click on that and wait for "Done!" message.</li>
            <li style="margin-bottom:2px">Remove wpdiscuz.php file from your root directory.</li>
		</ol>
        
        <p style="font-size:14px; font-weight:bold; margin-bottom:5px;">If "There are new comments for optimization [--button--]" message can't get away:</p>
        Please try to post a new comment on front-end, it should fix this issue. Also don't forget to clean all caches after that. 
        </div>
    </div>
    <span style="font-size:12px; color:#666666;">&nbsp;&nbsp; <?php _e("Note: after each deactivation of wpDiscuz, it may ask you to optimize existing comments again. It needs to make sure, that all comments, which have been added during deactivation period are also optimized.", 'wpdiscuz'); ?></span>
</div>