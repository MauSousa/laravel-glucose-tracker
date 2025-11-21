<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GenerateReportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): \Illuminate\Http\Response
    {
        $data = Bitacora::query()
            ->when($request->month, function ($query, $month): void {
                $query->whereMonth('day', $month);
            })
            ->when($request->year, function ($query, $year): void {
                $query->whereYear('day', $year);
            })
            ->whereBelongsTo($request->user())
            ->orderBy('day', 'asc')
            ->orderBy('time_of_test', 'asc')
            ->get();

        $pdf = Pdf::loadView('pdf.report', ['data' => $data]);

        return $pdf->stream();
    }
}
