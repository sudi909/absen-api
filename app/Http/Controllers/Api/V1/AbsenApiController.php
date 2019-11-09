<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Device;
use App\Models\Mahasiswa\MahasiswaList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenApiController extends Controller
{
    public function tapIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'nim' => 'required|exists:mahasiswa_lists,nim',
            'card_code' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => true, 'message' => $validator->errors()->first()], 401);
        }
        
        try {
            $device = Device::whereToken($request->token)->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['errors' => true, 'message' => $e->getMessage()], 401);
        }
        
        $device->update([
            'last_ip' => $request->ip()
        ]);
        
        try {
            $mahasiswa = MahasiswaList::whereNim($request->nim)
                ->whereHas('cards', function ($query) use ($request) {
                    $query->whereCardCode($request->card_code);
                })->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['errors' => true, 'message' => "Card Not Registered!"], 401);
        }
        
        $absen = [
            'nim' => $request->nim,
            'classroom_code' => $device->classroom_code,
        ];
        
        Absen::create($absen);
        
        return response()->json(['errors' => false, 'message' => 'ok']);
        
    }
}
