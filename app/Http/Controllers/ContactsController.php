<?php
/**
 * Created by PhpStorm.
 * User: erickcortes
 * Date: 7/6/18
 * Time: 7:24 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function postAddNewContact(Request $request) {
        return response()->json(array("success"=>true, "result" => 1));
    }
}