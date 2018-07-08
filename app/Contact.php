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
        'birthdate',
        'address1',
        'address2',
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

    public static function getAllOrderedBy($pagination= 10, $orderedBy="first_name", $ascending=true) {

        $asc = "ASC";
        if(!$ascending) {
            $asc = "DESC";
        }

        return Contact::select()
            ->orderBy($orderedBy, $asc)
            ->paginate($pagination);
    }
}
