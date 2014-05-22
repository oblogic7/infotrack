<?php

namespace YA;

class ActivityLog extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'message' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['message', 'message_type', 'service_id', 'client_id', 'auth_detail_id', 'software_license_id', 'software_license_seat_id', 'computer_id'];

    public $table = "activity_log";

}