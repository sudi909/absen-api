<?php


namespace App\Http\Controllers;

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
        return view('setting');
    }
}
