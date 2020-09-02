<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class VisitorAttendanceApiController
 *
 * @package App\Http\Controllers\Api\V1
 */
class VisitorAttendanceApiController extends Controller
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
                'name' => 'required|min:3|max:100',
                'location' => 'required',
                'phone' => 'required|digits_between:6,15',
                'address' => 'nullable|string',
                'keperluan' => 'nullable|string',
            ],
            [
                'name.required' => 'Oops, Nama harus diisi',
                'name.min' => 'Oops, Nama minimal 3 karakter',
                'location.required' => 'Oops, Lokasi anda tidak diketahui',
                'phone.required' => 'Oops, Nomor Telepon harus diisi',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => true, 'message' => $validator->errors()->first()], 401);
        }

        try {
            Visitor::create($request->all());
        } catch (\Exception $exception) {
            return response()->json(
                [
                    'errors' => true,
                    'message' => $exception->getMessage(),
                ],
                500
            );
        }

        $message = "Selamat Datang, ".$request->name;
        return response()->json(['errors' => false, 'message' => $message]);
    }
}
