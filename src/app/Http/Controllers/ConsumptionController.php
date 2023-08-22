<?php

namespace App\Http\Controllers;

use App\Models\Consumption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consumptions = Consumption::select('consumptions.*')->orderBy('id', 'asc')->paginate(5);

        return view('consumptions.index', [
            'consumptions' => $consumptions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        // dd($userId);
        $consumptionFirst = Consumption::where('user_id', $userId)->orderBy('id', 'desc')->first();

        return view('consumptions.create', [
            'consumptionFirst' => $consumptionFirst
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'water' => [
                    'required',
                    'numeric',
                    'max_digits:5',
                    'new_consumption:water',
                ],
                'electricity' => [
                    'required',
                    'numeric',
                    'max_digits:6',
                    'new_consumption:electricity',
                ],
            ],
            [
                'water.required' => 'Please enter consumption of water',
                'water.max_digits' => 'Consumption of water must be max 5 digits',
                'water.new_consumption' => 'Please enter greater than last one in water consumption field',
                'electricity.required' => 'Please enter consumption of electricity',
                'electricity.max_digits' => 'Consumption of electricity must be max 6 digits',
                'electricity.new_consumption' => 'Please enter greater than last one in electricity consumption field',

            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $consumption = new Consumption;
        $consumption->user_id = $request->user()->id;
        $consumption->date = $request->date;
        $consumption->water = $request->water;
        $consumption->electricity = $request->electricity;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $consumption->image_path = $filename;
        }
        $consumption->save();

        return redirect()
            ->route('consumptions-index')
            ->with('success', 'New consumptions of water [' . $consumption->water . '] and of electricity [' . $consumption->electricity . '] has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Delete a client
     */
    public function delete()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
