<?php
function split_lines($text, $tag = 'span', $maxlines = 20) {

	$text = preg_split("/\\r\\n|\\r|\\n/", $text);	
	$text = array_slice( $text, 0, $maxlines );
	$text = '<' . $tag . '>' . implode('</' . $tag . '><' . $tag . '>', $text) . '</' . $tag . '>';
	return $text;
	
}