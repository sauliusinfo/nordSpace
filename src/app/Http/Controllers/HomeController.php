<?php

namespace App\Http\Controllers;

use App\Models\Consumption;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dump($request);
        $serverInfo = $request->server('SERVER_SOFTWARE');

        return view(
            'home',
            [
                'serverInfo' => $serverInfo
            ]
        );
    }

    public function statistics()
    {
        $users = User::all();
        $consumptions = Consumption::all();

        return view(
            'statistics',
            [
                'consumptions' => $consumptions,
                'users' => $users
            ]
        );
    }

    public function phpInfo()
    {
        return phpinfo();
    }
}
