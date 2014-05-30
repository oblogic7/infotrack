<?php

namespace YA;

use Dryval\ValidationTrait;

class ActivityLog extends \Eloquent {

    use ValidationTrait;

	// Add your validation rules here
	public static $rules = [
		 'message' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['message', 'message_type', 'service_id', 'client_id', 'client_contact_id', 'auth_detail_id', 'software_license_id', 'software_license_seat_id', 'computer_id', 'user_id'];

    public $table = "activity_log";

    public function created_by() {
        return $this->belongsTo('\User', 'user_id', 'id');
    }

}