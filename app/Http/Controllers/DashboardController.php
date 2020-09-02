<?php


namespace App\Http\Controllers;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Show main attendance for student / staff
     *
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {
        return view('index');
    }
}
