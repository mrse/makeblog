<?php
/**
 * Single Go Page Template
 *
 * Basically, just turn this into a redirect engine.
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */

header ('HTTP/1.1 301 Moved Permanently');
header ('Location: ' . make_bitly_url ( esc_url( get_post_meta( get_the_ID(), 'url', true ) ) ) );