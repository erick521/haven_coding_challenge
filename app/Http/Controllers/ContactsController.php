<?php
/**
 * Created by PhpStorm.
 * User: erickcortes
 * Date: 7/6/18
 * Time: 7:24 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use View;

use App\Contact;

class ContactsController extends Controller
{
    public function __construct() {
        View::share('GOOGLE_MAPS_API_KEY', env('GOOGLE_MAPS_API_KEY'));
    }

    public function getIndex(Request $request, $sort_field = 'first_name', $order = 'asc') {

        // validate sort field
        if(!empty($sort_field) &&
            $sort_field != 'first_name' &&
            $sort_field != 'last_name' &&
            $sort_field != 'email') {
            $sort_field = 'first_name';
        }

        // collect contacts from Contact
        $contacts = Contact::getAllOrderedBy(10, $sort_field, $order=='asc');

        return view('home')->with(
            [
                "contacts" => $contacts,
                "sort" => ['column' => $sort_field, 'order' => $order]
            ]);
    }

    /**
     * Validates New Contact info and creates a new DB entry
     * if passes
     * @param Request $request
     * @return mixed
     */
    public function postAddNewContact(Request $request) {

        $validator = Validator::make($request->all(),
            self::getValidationRules());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        } else {

            // create new Contact
            Contact::create($request->all());

            return response()->json(['success' => true]);
        }
    }

    public function postDeleteContact(Request $request) {
        $id = $request->input('id');

        // create new Contact
        Contact::destroy($id);

        return response()->json(['success' => true]);
    }

    public function postEditContact(Request $request) {

        $validator = Validator::make($request->all(),
            self::getValidationRules());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        } else {

            // update Contact
            $id = $request->input('id');

            $contact = $request->all();
            unset($contact["_token"]);

            // id gets filtered out by mass assignment rule
             Contact::where('id', $id)
                 ->update($contact);

            return response()->json(['success' => true]);
        }
    }

    protected static function getValidationRules() {
        return [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'max:10|present',
            'birthdate' => 'present|date_format:Y-m-d|nullable',
            'address1' => 'present',
            'address2' =>  'present',
            'city' => 'present',
            'state' => 'alpha|max:2|present',
            'zip' => 'numeric|present|nullable'
        ];
    }
}