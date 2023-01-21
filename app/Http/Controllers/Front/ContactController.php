<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contactcenter;
use App\Models\Callback;
use App\Models\Ourcontact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index()
    {
        $contactcenters = Contactcenter::orderBy('created_at', 'DESC')->paginate(5);
        $ourcontacts = Ourcontact::orderBy('created_at', 'DESC')->get();

        return view('front.contacts', compact(
            'contactcenters',
            'ourcontacts'
        ));
    }

      /**
     * @throws ValidationException
     */
    public function saveCallback(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'comment' => 'required'
        ])->validate();

        if (Callback::create($request->all())) {
            return back()->with('message', 'Your application has been successfully sent');
        }
        return back()->with('message', 'unable to sending');


    }
}
