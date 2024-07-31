<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = Carbon::now();
        $oneMonthAgo = $now->copy()->subMonth();

        // Get date from visitor table group by visited_at
        $visits = Visitor::select(DB::raw('LEFT(visited_at,10) as visited_at'))
        ->whereBetween('visited_at', [$oneMonthAgo, $now])
        ->groupBy(DB::raw('LEFT(visited_at,10)'))
        ->orderBy('visited_at', 'asc')
        ->get();
        $datas = [];
        foreach ($visits as $visitor) {
            $visit_date = Carbon::parse($visitor->visited_at)->format('Y-m-d');
            $visit_count = Visitor::where(DB::raw('LEFT(visited_at,10)'), $visit_date)->count();
            $datas[] = [
                'visit_date' => Carbon::parse($visit_date)->format('m-d'),
                'visit_count' => $visit_count,
            ];
        }
        $visitors = $datas;
        return view('admin.index', compact('visitors'));
    }
}
