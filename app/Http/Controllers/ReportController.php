<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Location;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return view('report')->with(compact('locations'));
    }

    public function report(Request $request)
    {
        $start = substr($request->daterange, 0, 11);
        $dateS = strtotime($start);
        $end = substr($request->daterange, 14);
        $dateE = strtotime($end);

        $att = Attendance::whereBetween('created_at', [date('Y-m-d H:i:s', $dateS), date('Y-m-d H:i:s', $dateE)])
            ->where('location_id', $request->location)->get();
        $fileSave = "reports/report $start - $end.csv";
        $fileName = "report $start - $end.csv";;
        $handle = fopen($fileSave, 'w+');
        fputcsv($handle, array('NIM/NIP', 'Nama', 'Lokasi', 'Tipe', 'Status', 'Waktu'));
        foreach($att as $row) {
            if ($row['is_vaccine'] == 1) {
                $status = 'Sudah divaksin';
            } else {
                $status = 'Belum divaksin';
            }
            fputcsv($handle, array($row['identifier'], $row['internalIdentifier']['name'], $row['location']['name'], $row['type'], $status, $row['created_at']));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return response()->download($fileSave, $fileName, $headers);
    }
}
