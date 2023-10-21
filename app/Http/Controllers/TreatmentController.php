<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::with('patient')->get(); // Include associated patients
        return view('treatments.index', compact('treatments'));
    }

    public function create()
    {
        $patients = Patient::all(); // Include patients for dropdown menu
        return view('treatments.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'patient_id' => 'required',
        ]);

        $treatmentData = $request->all();

        Treatment::create($treatmentData);

        return redirect()->route('treatments.index')
            ->with('success', 'Tratamiento creada exitosamente');
    }

    public function show($id)
    {

        $treatment = Treatment::with('patient')->find($id); // Include associated patient
        $patients = Patient::all(); // Include patients for dropdown menu

        return view('treatments.show', compact('treatment', 'patients'));
    }

    public function edit($id)
    {
        $treatment = Treatment::with('patient')->find($id); // Include associated patient
        $patients = Patient::all(); // Include patients for dropdown menu
        return view('treatments.edit', compact('treatment', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'patient_id' => 'required',
        ]);

        $treatment = Treatment::find($id);
        $treatment->update($request->all());

        return redirect()->route('treatments.index')
            ->with('success', 'Tratamiento actualizada exitosamente');
    }

    public function destroy($id)
    {
        $treatment = Treatment::find($id);
        $treatment->delete();

        return redirect()->route('treatments.index')
            ->with('success', 'Tratamiento eliminada exitosamente');
    }
}
