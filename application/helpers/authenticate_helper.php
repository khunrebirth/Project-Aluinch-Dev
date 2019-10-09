<?php

function is_logged_in()
{
    $CI =& get_instance();
    $user = $CI->session->userdata('user_id');

    return isset($user) ? true : false;
}

function is_superadmin()
{
	$CI =& get_instance();

	if ($CI->session->userdata('role_id') != 1) {
		redirect('backoffice/dashboard');
	}
}

function require_login($redirect = '')
{
    if (!is_logged_in()) {
        redirect($redirect);
    }
}

function require_no_login($redirect = '')
{
    if (is_logged_in()) {
        redirect($redirect);
    }
}
