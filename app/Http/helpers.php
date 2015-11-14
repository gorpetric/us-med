<?php

function stripMarkdown($string)
{
	$a = preg_replace("/[\r\n]{2,}/", ' ', $string);
	return preg_replace("/[^a-zA-Z0-9.:šŠđĐžŽćĆčČ ]+/", '', $a);
}