<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $domains = Domain::all();
        return response()->json($domains);
    }

    public function create(Request $request)
    {
        $domain = new Domain;
        $domain->created_by = $request->created_by;
        $domain->name = $request->name;

        $domain->save();
        return response()->json($domain);
    }

    public function show($id)
    {
        $domain = Domain::find($id);
        return response()->json($domain);
    }

    public function update(Request $request, $id)
    {
        $domain= Domain::find($id);

        $domain->name = $request->input('name');
        $domain->price = $request->input('price');
        $domain->description = $request->input('description');
        $domain->save();
        return response()->json($domain);
    }

    public function destroy($id)
    {
        $domain = Domain::find($id);
        $domain->delete();
        return response()->json('product removed successfully');
    }
}
