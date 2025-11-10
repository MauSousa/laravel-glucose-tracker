<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreBitacoraRequest;
use App\Http\Requests\UpdateBitacoraRequest;
use App\Models\Bitacora;
use Illuminate\View\View;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('bitacora.index');
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
    public function store(StoreBitacoraRequest $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bitacora $bitacora): void
    {
        //
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
    public function update(UpdateBitacoraRequest $request, Bitacora $bitacora): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bitacora $bitacora): void
    {
        //
    }
}
