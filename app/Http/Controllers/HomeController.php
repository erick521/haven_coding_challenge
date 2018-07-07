<?php
/**
 * Created by PhpStorm.
 * User: erickcortes
 * Date: 7/6/18
 * Time: 7:24 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class HomeController extends Controller
{
    public function getIndex(Request $request) {

        // collect contacts from Contact
        $contacts = Contact::getAllOrderedBy();

        return view('home')->with(["contacts" => $contacts]);
    }
}