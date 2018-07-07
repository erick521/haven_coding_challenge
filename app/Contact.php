<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table="contacts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'birthday',
        'address',
        'city',
        'state',
        'zip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public static function getAllOrderedBy($orderedBy="first_name") {
        return Contact::select()
            ->orderBy($orderedBy)
            ->get();
    }
}
