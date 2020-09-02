<?php


namespace App\Http\Controllers;

/**
 * Class VisitorController
 *
 * @package App\Http\Controllers
 */
class VisitorController extends Controller
{
    /**
     * Show visitor page
     *
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {
        return view('visitor');
    }
}
