<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TimeLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeLogController extends Controller
{
    public function index()
    {
        return TimeLog::with('project')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $data['hours'] = isset($data['end_time']) ? Carbon::parse($data['start_time'])->diffInMinutes(Carbon::parse($data['end_time'])) / 60 : 0;
        return TimeLog::create($data);
    }

    public function show(TimeLog $timeLog)
    {
        return $timeLog;
    }

    public function update(Request $request, TimeLog $timeLog)
    {
        $data = $request->only('start_time', 'end_time', 'description');

        if ($data['start_time'] && $data['end_time']) {
            $data['hours'] = Carbon::parse($data['start_time'])->diffInMinutes(Carbon::parse($data['end_time'])) / 60;
        }

        $timeLog->update($data);
        return $timeLog;
    }

    public function destroy(TimeLog $timeLog)
    {
        $timeLog->delete();
        return response()->json(['message' => 'Time log deleted']);
    }
}
