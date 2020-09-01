<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenApiController extends Controller
{
    public function tapIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:internal_identifiers,identifier',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => true, 'message' => $validator->errors()->first()], 401);
        }

        $att = [
            'identifier' => $request->id,
            'location' => $request->location,
        ];

        $date = Carbon::now()->format('Y-m-d');
        $latestRecord = Attendance::where('identifier', 1903028)
            ->whereDate('created_at', $date)
            ->latest()
            ->first();

        if ($latestRecord instanceof Attendance) {
            if ($latestRecord->type == "IN") {
                $att['type'] = 'OUT';
            } else {
                $att['type'] = 'IN';
            }
        } else {
            $att['type'] = 'IN';
        }

        try {
            Attendance::create($att);
        } catch (\Exception $exception) {
            return response()->json([
                'errors' => true,
                'message' => $exception->getMessage(),
            ], 500);
        }

        return response()->json(['errors' => false, 'message' => 'ok']);

    }
}
