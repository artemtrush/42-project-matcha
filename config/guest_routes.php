<?php

return array(
    'login' => 'login/index',
    'registration' => 'registration/index',
	'reset/(.+)' => 'reset/index/$1',
    '' => 'login/index'
);
