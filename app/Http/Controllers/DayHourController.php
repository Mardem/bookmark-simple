<?php

namespace App\Http\Controllers;

use App\Models\HoursDay;
use Illuminate\Http\Request;

class DayHourController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        HoursDay::create($request->all());
        return redirect()->back();
    }
}
