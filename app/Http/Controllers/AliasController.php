<?php

namespace App\Http\Controllers;

use App\Alias;
use App\Domain;
use Illuminate\Http\Request;

class AliasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $aliases = Alias::all();
        return response()->json($aliases);
    }

    public function create(Request $request)
    {
        $alias = new Alias;
        $alias->source = $request->source;
        $alias->destination= $request->destination;
        $alias->created_by = $request->created_by;
        $alias->domain_id  = $this->getDomain($request->source)->id;

        $alias->save();
        return response()->json($alias);
    }

    public function show($id)
    {
        $alias = Alias::find($id);
        return response()->json($alias);
    }

    public function update(Request $request, $id)
    {
        $alias= Alias::find($id);

        $alias->name = $request->input('name');
        $alias->price = $request->input('price');
        $alias->description = $request->input('description');
        $alias->save();
        return response()->json($alias);
    }

    public function destroy($id)
    {
        $alias = Alias::find($id);
        $alias->delete();
        return response()->json('product removed successfully');
    }

    private function getDomain($mail)
    {
        $domain = explode('@', $mail);
        \Log::debug($domain);
        $domain = Domain::where('name', $domain[1])->first();
        \Log::debug($domain);

        return $domain;
    }
}
