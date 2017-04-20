<?php
/*
Plugin Name: JK Delete Attachments with Post
Description: Delete attachments linked to post when deleting post
Version:     1.0
Author:      Jakub Klapka
Author URI:  https://klapka.lumiart.cz/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once( 'vendor/autoload.php' );

$core = \JakubKlapka\WpDeleteAttachmentsWithPost\DeleteAttachmentsCore::getInstance();
$core->boot();