<?php


namespace App\Http\Controllers;

use App\Models\Location;

/**
 * Class SettingController
 *
 * @package App\Http\Controllers
 */
class SettingController extends Controller
{
    /**
     * Show setting page
     *
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {
        $locations = Location::all();

        return view('setting')->with(compact('locations'));
    }
}
