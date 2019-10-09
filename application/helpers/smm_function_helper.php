<?php

function smm_slug($text) {
	$textlower = strtolower($text);

	return str_replace(" ","-", $textlower);
}
