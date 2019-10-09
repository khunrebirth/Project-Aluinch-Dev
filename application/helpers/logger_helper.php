<?php

function logger_store($data)
{
	$CI =& get_instance();

	$CI->db->insert('logs', [
		'user_id' => $data['user_id'],
		'detail' => $data['detail'],
		'event_id' => get_event_id($data['event']),
		'ip' => $data['ip']
	]);
}

function get_event_id($event)
{
	$event_id = 0;

	switch ($event) {
		case 'login':
			$event_id = 1;
			break;

		case 'logout':
			$event_id = 2;
			break;

		case 'add':
			$event_id = 3;
			break;

		case 'update':
			$event_id = 4;
			break;

		case 'delete':
			$event_id = 5;
			break;

		case 'sort_item':
			$event_id = 6;
			break;

		default:
			$event_id = 7;
	}

	return $event_id;
}

