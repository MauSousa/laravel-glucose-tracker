<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Bitacora\CreateBitacora;
use App\Actions\Bitacora\UpdateBitacora;
use App\Http\Requests\StoreBitacoraRequest;
use App\Http\Requests\UpdateBitacoraRequest;
use App\Models\Bitacora;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\View\View;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('dashboard', [
            'month' => Date::now()->monthName,
            'months' => [
                '01' => 'Enero',
                '02' => 'Febrero',
                '03' => 'Marzo',
                '04' => 'Abril',
                '05' => 'Mayo',
                '06' => 'Junio',
                '07' => 'Julio',
                '08' => 'Agosto',
                '09' => 'Septiembre',
                '10' => 'Octubre',
                '11' => 'Noviembre',
                '12' => 'Diciembre',
            ],
            'user_years' => Bitacora::query()
                ->whereBelongsTo(Auth::user())
                ->distinct('day')
                ->get(['day'])
                ->map(fn($day) => Date::parse($day->day)->year)
                ->unique()
                ->sort()
                ->values(),
            'average_glucose' => round(
                Bitacora::query()
                    ->whereBelongsTo(Auth::user())
                    ->whereMonth('day', Date::now()->month)
                    ->whereYear('day', Date::now()->year)
                    ->avg('glucose') ?? 0
            ),
            'three_month_average_glucose' => round(
                Bitacora::query()
                    ->whereBelongsTo(Auth::user())
                    ->whereBetween('day', [Date::now()->subMonths(3), Date::now()])
                    ->avg('glucose') ?? 0
            ),
            'six_month_average_glucose' => round(
                Bitacora::query()
                    ->whereBelongsTo(Auth::user())
                    ->whereBetween('day', [Date::now()->subMonths(6), Date::now()])
                    ->avg('glucose') ?? 0
            ),
            'yearly_average_glucose' => round(
                Bitacora::query()
                    ->whereBelongsTo(Auth::user())
                    ->whereBetween('day', [Date::now()->subYears(), Date::now()])
                    ->avg('glucose') ?? 0
            ),
            'bitacoras' => Bitacora::query()
                ->when($request->month, function ($query, $month): void {
                    $query->whereMonth('day', $month);
                })
                ->when($request->year, function ($query, $year): void {
                    $query->whereYear('day', $year);
                })
                ->whereBelongsTo(Auth::user())
                ->latest('day')
                ->latest('time_of_test')
                ->simplePaginate(10)
                ->withQueryString(),
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
