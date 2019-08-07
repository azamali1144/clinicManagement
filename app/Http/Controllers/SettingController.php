<?php
namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Display a listing of the themes.
     *
     * @return \Illuminate\Http\Response
     */
    public function listThemes(Request $request)
    {
        return view('admin.theme.list');
    }

    /**
     * Display a listing of the themes.
     *
     * @return \Illuminate\Http\Response
     */
    public function setThemes(Request $request)
    {

        $request->session()->put('version', $request->get('theme'));

        $setting = Setting::where('key', 'theme')->where('user_id', Auth::user()->id)->get();
        if(isset($setting) && count($setting) > 0){

            if($setting[0]->value !== $request->get('theme')){
                Setting::where('id', $setting[0]->id)->where('user_id', Auth::user()->id)->update(['value' => $request->get('theme')]);
            }
        }

        return response()->json([
            'status' => true,
            'name' => $request->get('theme'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
