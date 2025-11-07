<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\SwipeStoreRequest;
use App\Models\Swipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SwipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SwipeStoreRequest $request): RedirectResponse
    {
        Swipe::updateOrCreate(
            ['user_id' => $request->user()->id, 'work_id' => $request->validated('work_id')],
            ['direction' => $request->validated('direction')]
        );

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Swipe $swipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Swipe $swipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Swipe $swipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Swipe $swipe)
    {
        //
    }
}
