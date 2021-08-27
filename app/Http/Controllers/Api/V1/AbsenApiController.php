<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Identifier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class AbsenApiController
 *
 * @package App\Http\Controllers\Api\V1
 */
class AbsenApiController extends Controller
{
    /**
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function tapIn(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|exists:internal_identifiers,identifier',
                'location' => 'required',
            ],
            [
                'id.exists' => 'Oops, NIM / NIP anda tidak terdaftar',
                'location.required' => 'Oops, Lokasi anda tidak diketahui',
            ],
            [
                'id.vaccine_count' => 'Oops, NIM / NIP anda tidak terdaftar',
                'location.required' => 'Oops, Lokasi anda tidak diketahui',
            ],
        );

        if ($validator->fails()) {
            return response()->json(['errors' => true, 'message' => $validator->errors()->first()], 401);
        }

        $att = [
            'identifier' => $request->id,
            'location_id' => $request->location,
            'is_vaccine' => true,
        ];

        $date = Carbon::now()->format('Y-m-d');
        $latestRecord = Attendance::where('identifier', $request->id)
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

        $ids = Identifier::where('identifier', $request->id)->first();

        if ($ids->vaccine_count <= 0) {
            $att['is_vaccine'] = false;
        }

        try {
            Attendance::create($att);
        } catch (\Exception $exception) {
            return response()->json(
                [
                    'errors' => true,
                    'message' => $exception->getMessage(),
                ],
                500
            );
        }

        $attendee = Identifier::where('identifier', $request->id)->first();
        $name = $attendee->name;
        if ($att['type'] == "IN") {
            $message = "Selamat Datang, ";
        } else {
            $message = "Sampai Jumpa Lagi, ";
        }

        if ($ids->vaccine_count <= 0) {
            return response()->json(['errors' => true, 'message' => ', Belum Divaksin', 'name' => $name], 401);
        }

        return response()->json(['errors' => false, 'message' => $message, 'name' => $name]);
    }
}
