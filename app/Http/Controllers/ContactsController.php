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
    private $pagination = '10';

    public function __construct() {
        View::share('GOOGLE_MAPS_API_KEY', env('GOOGLE_MAPS_API_KEY'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getIndex(Request $request) {

        $sort_field = empty($request->sort) ? "first_name" : $request->sort;
        $order = empty($request->order) ? "asc" : $request->order;
        $search = $request->search;

        $pages = $request->input("inlineRadioOptions");

        if(!empty($pages)) {
            if($pages == '10' ||
                $pages == '25' ||
                $pages == '50') {
                $this->pagination = $pages;
            }
        }

        // validate sort field
        if(!empty($sort_field) &&
            $sort_field != 'first_name' &&
            $sort_field != 'last_name' &&
            $sort_field != 'email') {
            $sort_field = 'first_name';
        }

        // collect contacts from Contact
        $contacts = [];

        if(empty($search)) {
            $contacts = Contact::getAllOrderedBy($this->pagination, $sort_field, $order=='asc');
        } else {
            $contacts = Contact::getSearchOrderedBy($search,$this->pagination, $sort_field, $order=='asc');
        }


        return view('home')->with(
            [
                "contacts" => $contacts,
                'search' => $search,
                'pages' => $this->pagination,
                "sort" => [
                    'column' => $sort_field,
                    'order' => $order
                ]
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
            'first_name' => 'required|max:50|alpha',
            'last_name' => 'required|max:50|alpha',
            'email' => 'required|email',
            'phone' => 'present',
            'birthdate' => 'date|nullable',
            'address1' => 'present',
            'address2' =>  'present',
            'city' => 'present',
            'state' => 'alpha|max:2|present',
            'zip' => 'numeric|present|nullable'
        ];
    }
}