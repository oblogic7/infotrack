<?php

namespace YA;

use YA\Observers\ClientObserver;

class Client extends BaseModel {

    protected $fillable = ['name'];

    protected static $rules = ['name' => 'required|unique:clients,name,:id:'];

    protected static $messages = [
        'name.unique' => 'That client already exists!',
    ];

    public static function boot() {
        parent::boot();

        static::observe(new ClientObserver());
    }

    public function credentials() {
        return $this->hasMany('YA\Authentication\AuthDetail');
    }

    public function contacts() {
        return $this->hasMany('YA\ClientContact');
    }

    public function services() {
        return $this->hasMany('YA\Services\BaseService');
    }

    public function activity() {
        return $this->hasMany('YA\ActivityLog');
    }

    public function serviceActivity() {
        return $this->hasManyThrough('YA\ActivityLog', 'YA\Services\BaseService', 'client_id', 'service_id');
    }

    public function authActivity() {
        return $this->hasManyThrough('YA\ActivityLog', 'YA\Authentication\AuthDetail', 'client_id', 'auth_detail_id');
    }

    public function contactActivity() {
        return $this->hasManyThrough('YA\ActivityLog', 'YA\ClientContact', 'client_id', 'client_contact_id');
    }

    public function getChildActivityAttribute() {
        $activity = $this->serviceActivity;
        $activity = $activity->merge($this->authActivity);
        $activity = $activity->merge($this->contactActivity);

        $activity = $this->sortCollectionByDate($activity);

        foreach($activity as &$item) {
            $item->isChild = true;
        }

        return $activity;
    }

    public function getAllActivityAttribute() {

        $activity = $this->getChildActivityAttribute();
        $activity = $activity->merge($this->activity);

        $activity = $this->sortCollectionByDate($activity);

        return $activity;
    }

    private function sortCollectionByDate($collection) {
        $collection->sort(
            function ($a, $b) {
                $a = $a->created_at->timestamp;
                $b = $b->created_at->timestamp;
                if ($a === $b) {
                    return 0;
                }

                return ($a > $b) ? 1 : -1;
            }
        );

        return $collection;
    }

}