<?php

define('DOMAIN', "http://localhost");

$_GENDER_ = array("male", "female");
$_SEX_ = array("bisexual", "heterosexual", "homosexual");
$_TAG_ = array(	"vegan",
				"geek",
				"UNIT student",
				"wow player",
				"music fan",
				"mem lover",
				"anime lover",
				"dota player",
				"animal lover"
);

function encode($str) {
	return sha1(trim($str));
}