<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkResource;
use App\Models\Work;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $type): Response
    {
        $work = Work::query()
            ->where('type', $type)
            ->whereDoesntHave('swipes', fn($q) => $q->where('user_id', $request->user()->id))
            ->inRandomOrder()
            ->first();

        return Inertia::render('Works/SwipeDeck', [
            'type' => $type,
            'work' => $work ? new WorkResource($work) : null,
        ]);
    }

    public function wishlist(Request $request, string $type): Response
    {
        $items = $request->user()->wishlist()->where('type', $type)->paginate(24);

        return Inertia::render('Works/Wishlist', [
            'type'  => $type,
            'items' => WorkResource::collection($items),
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        //
    }
}
