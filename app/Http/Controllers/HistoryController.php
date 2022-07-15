<?php

namespace App\Http\Controllers;

use App\DetailCheckout;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $title = 'History';
        $url = 'history';

        $histories = DetailCheckout::all();
        if (isset($request->range)) {
            $id = $request->get('id');
            $range = [$request->get('from'), $request->get('to')];


            $histories = DetailCheckout::query()
                ->when($range, function ($checkouts) use ($range) {
                    if($range[0] != '' && $range[1] != '') {
                        $checkouts->whereDate('created_at', '>=', $range[0])->whereDate('created_at', '<=', $range[1]);
                    }
                })
                ->get();
        }
        return view('history.index', compact('title', 'url', 'histories'));
    }
}
