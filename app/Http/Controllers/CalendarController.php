<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends BaseController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $date = $request->get('date');
        $thisDate = Carbon::now();
        if ($date){
            $thisDate = Carbon::parse($date['date']);
        }
        return view('calendar', compact('thisDate'));
    }
}
