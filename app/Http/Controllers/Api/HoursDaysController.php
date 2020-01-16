<?php

namespace App\Http\Controllers\Api;

use App\Models\Day;
use App\Models\HoursDay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoursDaysController extends Controller
{
    public function days()
    {
        return Day::orderBy('id', 'desc')->get();
    }

    public function hours(Request $request)
    {
        return HoursDay::orderBy('id', 'desc')->where('day_id', $request->id)->get();
    }
}
