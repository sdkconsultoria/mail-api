<?php

namespace App\Http\Controllers;

use App\Account;
use App\Domain;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $accounts = Account::all();
        return response()->json($accounts);
    }

    public function create(Request $request)
    {
        $account = new Account;
        $account->email      = $request->email;
        $account->password   = $request->password;
        $account->created_by = $request->created_by;
        $account->domain_id  = $this->getDomain($request->email)->id;

        $account->save();
        return response()->json($account);
    }

    public function show($id)
    {
        $account = Account::find($id);
        return response()->json($account);
    }

    public function update(Request $request, $id)
    {
        $account= Account::find($id);

        $account->domain_id = $domain->id;
        $account->password = $request->input('password');
        $account->email = $request->input('email');
        $account->save();
        return response()->json($account);
    }

    public function destroy($id)
    {
        $account = Account::find($id);
        $account->delete();
        return response()->json('product removed successfully');
    }

    private function getDomain($mail)
    {
        $domain = explode('@', $mail);
        $domain = Domain::where('name', $domain[1])->first();
        return $domain;
    }
}
