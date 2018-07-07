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

class ContactsController extends Controller
{
    public function postAddNewContact(Request $request) {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'max:10',
            'birthdate' => 'date_format:mm-dd-YYYY',
            'address1' => 'alpha_num',
            'address2' =>  'alpha_num',
            'city' => 'alpha',
            'state' => 'alpha|max:2',
            'zip' => '' // todo here!!
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        }

        $errors = $validator->errors();

        return response()->json($request->input());
    }
}