<?php

function sendmail($email, $message, $subject = null)
{
	if (!$subject)
		$subject = "Matcha";
	return mail($email, $subject, $message);
}