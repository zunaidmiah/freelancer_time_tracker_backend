<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TimeLog;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generate(Request $request)
    {
        $query = TimeLog::query();

        if ($request->client_id) {
            $query->whereHas('project.client', fn($q) => $q->where('id', $request->client_id));
        }else if ($request->project_id) {
            $query->where('project_id', $request->project_id);
        }

        if($request->only_today){
            $today = date("Y-m-d");
            $query->whereDate('start_time', $today)
                    ->whereDate('end_time', $today);
        }else{
            if ($request->from) {
                $query->whereDate('start_time', '>=', $request->from);
            }

            if ($request->to) {
                $query->whereDate('end_time', '<=', $request->to);
            }
        }

        $totalHours = $query->sum('hours');

        return response()->json(['total_hours' => $totalHours]);
    }
}

