<?php

namespace App\Http\Controllers;

use App\Services\HospitalService;
use Illuminate\Http\Request;

class HospitalSpecialistController extends Controller
{
    //
    private  $hospitalService;

    public function __construct(HospitalService $hospitalService)
    {
        $this->hospitalService = $hospitalService;
    }

    public function attach(Request $request, int $hospitalId)
    {
        $request->validated([
            'specialist_id' => 'required|exists:specialist,id',
        ]);

        $this->hospitalService->attachSpecialist(
            $hospitalId,
            $request->input('specialist_id'),
        );

        return response()->json(['message' => 'Specialist attached successfully']);
    }
}
