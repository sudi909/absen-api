<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function registerDevice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|exists:users,username',
            'password' => 'required',
            'identifier' => 'required',
            'classroom_code' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'errors' => 'true',
                'message' => $validator->errors()->first()
            ], 401);
        }
        
        $user = User::whereUsername($request->username)->first();
        
        if (Hash::check($request->password, $user->password)) {
            
            try {
                $apiKey = $this->updateDevice($request);
            } catch (\Exception $e) {
                return response()->json([
                    'errors' => 'true',
                    'message' => $e->getMessage()
                ], 400);
            }
            
            return response()->json([
                'errors' => false,
                'token' => $apiKey
            ]);
        }
    }
    
    public function updateDevice(Request $request) : string
    {
        $device = Device::updateOrCreate([
            'identifier' => $request->identifier
        ], [
            'identifier' => $request->identifier,
            'classroom_code' => $request->classroom_code,
            'last_ip' => $request->ip(),
            'token' => base64_encode(Str::random(64)),
        ]);
        
        return $device->token;
    }
}
