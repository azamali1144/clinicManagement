<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expanse;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpanseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $expanses = Expanse::paginate(10);
            $params = [
                'title' => 'Expanse Listing',
                'expanses' => $expanses,
            ];
            return view('admin.expanse.expanse_list')->with($params);
        }
        catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException)
                return response()->view('errors.' . '404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $expanses = Expanse::all();
            $params = [
                'title' => 'Add New Expanse',
                'expanses' => $expanses,
            ];
            return view('admin.expanse.expanse_create')->with($params);
        }
        catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException)
                return response()->view('errors.' . '404');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $expanse = Expanse::create([
                'amount' => $request->input('amount'),
                'details' => $request->input('details'),
                'user_id' => Auth::user()->id,
                'date' => $request->input('date'),
            ]);
            $expanse->save();
            return redirect()->route('expanse.index')->with('success', "The user <strong>Expanse</strong> has been added successfully.");
        }
        catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException)
                return response()->view('errors.' . '404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $expanse = Expanse::findOrFail($id);
            $params = [
                'title' => 'Confirm Delete Record',
                'expanse' => $expanse,
            ];
            return view('admin.expanse.expanse_delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException)
                return response()->view('errors.' . '404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $expanse = Expanse::findOrFail($id);
            $params = [
                'title' => 'Edit Expanse',
                'expanse' => $expanse
            ];

            return view('admin.expanse.expanse_edit')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException)
                return response()->view('errors.' . '404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $expanse = Expanse::findOrFail($id);
            $expanse->amount = $request->input('amount');
            $expanse->details = $request->input('details');
            $expanse->user_id = Auth::user()->id;
            $expanse->date = $request->input('date');
            $expanse->save();

            return redirect()->route('expanse.index')->with('succes', "R updated successfully.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException)
                return response()->view('errors.' . '404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $expanse = Expanse::findOrFail($id);
            $expanse->delete();

            return redirect()->route('expanse.index')->with('success', "Operation has been performed successfully.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException)
                return response()->view('errors.' . '404');
        }
    }
}
