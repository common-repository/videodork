<?php

/*
Plugin Name: VideoDork
Description: Embed XHTML-compatible YouTube and Gametrailers and videos easily.
Author: regua
Author URI: http://regua.biz
Version: 1.0
*/

function videodork($subject) {
	$pattern = array(
	'/\[http:\/\/((www\.)?youtube\.(([a-z]{2,3})(\.[a-z]{2,3})?))\/((watch\?v\=)|(v\/))([a-zA-Z0-9_\-\|]{11})(\&.*)?\/?\]/',
	'/\[http:\/\/((www\.)?gametrailers\.com)\/(player)\/([0-9]*)(\.html)(\?.*)?\/?\]/',
	'/\[http:\/\/((www\.)?gametrailers\.com)\/(player)\/(usermovies)\/([0-9]*)(\.html)(\?.*)?\/?\]/'
	);
	$replacement = array(
	'<object type="application/x-shockwave-flash" style="width:425px; height:355px;" data="http://www.youtube.$3/v/$9"></object>',
	'<object type="application/x-shockwave-flash" style="width:480px; height:392px;" data="http://www.gametrailers.com/remote_wrap.php?mid=$4"></object>',
	'<object type="application/x-shockwave-flash" style="width:480px; height:392px;" data="http://www.gametrailers.com/remote_wrap.php?umid=$5"></object>'
	);
	$subject = preg_replace($pattern, $replacement, $subject);
	return ($subject);
}

add_filter('the_content', 'videodork');

?>
