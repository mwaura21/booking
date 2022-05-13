<?php

namespace App\Http\Controllers;

use App\Models\Available;
use App\Models\Date;
use Illuminate\Http\Request;

class AvailableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = Date::latest()->paginate(5);
        
        return view('available.index',compact('dates'));
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
     * @param  \App\Models\Available  $available
     * @return \Illuminate\Http\Response
     */
    public function show(Available $available)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Available  $available
     * @return \Illuminate\Http\Response
     */
    public function edit(Available $available)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Available  $available
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Available $available)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Available  $available
     * @return \Illuminate\Http\Response
     */
    public function destroy(Available $available)
    {
        //
    }

    public function deleteAll(Request $request)
    {
        $available = $request->input('available');
		$id = $request->id;

        if(empty($id))
        {
            return redirect()->back()
            ->with('error-message','No entries selected');
        }
		foreach ($id as $mavailableenu) 
		{
            $number = count($id);

			Available::where('id', $available)->delete();
		}
        if($number > 1)
        {
		return redirect()->route('available.viewAll', [$available])
                        ->with('message','Entries deleted successfully');
        }
        return redirect()->route('available.viewAll', [$available])
        ->with('message','Entry deleted successfully');
    }
}
