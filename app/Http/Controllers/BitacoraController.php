<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Bitacora\CreateBitacora;
use App\Actions\Bitacora\UpdateBitacora;
use App\Http\Requests\StoreBitacoraRequest;
use App\Http\Requests\UpdateBitacoraRequest;
use App\Models\Bitacora;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\View\View;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard', [
            'month' => Date::now()->monthName,
            'average_glucose' => Bitacora::query()->whereBelongsTo(Auth::user())->whereMonth('day', Date::now()->month)->avg('glucose'),
            'bitacoras' => Bitacora::query()->whereBelongsTo(Auth::user())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('bitacora.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBitacoraRequest $request, CreateBitacora $action): RedirectResponse
    {
        $action->handle($request->user(), $request->validated());

        return to_route('dashboard')->with(['success' => 'New entrie created']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bitacora $bitacora): View
    {
        return view('bitacora.edit', $bitacora);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBitacoraRequest $request, Bitacora $bitacora, UpdateBitacora $action): RedirectResponse
    {
        $action->handle($bitacora, $request->validated());

        return to_route('bitacora.edit', $bitacora)->with(['success' => 'Data updated succesfully']);
    }
}
