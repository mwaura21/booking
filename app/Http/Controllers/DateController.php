<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Available;
use Illuminate\Http\Request;

class DateController extends Controller
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
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(Date $date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function edit(Date $date)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Date $date)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(Date $date)
    {
        //
    }

    public function viewAll(Request $request, Date $date)
    {
        $available = Available::latest()->where('date_id', $date->id)->paginate(5);
        $date = $date->id;
        
        return view('available.view',compact('date', 'available'));
    }
    
    public function deleteAll(Request $request)
    {
		$id = $request->id;
        if(empty($id))
        {
            return redirect()->back()
            ->with('error-message','No entries selected');
        }
		foreach ($id as $date) 
		{
            $number = count($id);

			Date::where('id', $date)->delete();
		}
        if($number > 1)
        {
		return redirect()->route('available.index')
                        ->with('message','Dates deleted successfully');
        }
        return redirect()->route('available.index')
                        ->with('message','Date deleted successfully');
    }
}
