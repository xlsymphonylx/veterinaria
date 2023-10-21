<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Treatment;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::with('treatment.patient')->get(); // Include associated treatments
        return view('diseases.index', compact('diseases'));
    }

    public function create()
    {
        $treatments = Treatment::with('patient')->get(); // Include treatments for dropdown menu
        return view('diseases.create', compact('treatments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'treatment_id' => 'required',
        ]);

        $diseaseData = $request->all();

        Disease::create($diseaseData);

        return redirect()->route('diseases.index')
            ->with('success', 'Enfermedad creada exitosamente');
    }

    public function show($id)
    {

        $disease = Disease::with('treatment')->find($id); // Include associated treatment
        $treatments = Treatment::with('patient')->get(); // Include treatments for dropdown menu

        return view('diseases.show', compact('disease', 'treatments'));
    }

    public function edit($id)
    {
        $disease = Disease::with('treatment')->find($id); // Include associated treatment
        $treatments = Treatment::with('patient')->get(); // Include treatments for dropdown menu
        return view('diseases.edit', compact('disease', 'treatments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'treatment_id' => 'required',
        ]);

        $disease = Disease::find($id);
        $disease->update($request->all());

        return redirect()->route('diseases.index')
            ->with('success', 'Enfermedad actualizada exitosamente');
    }

    public function destroy($id)
    {
        $disease = Disease::find($id);
        $disease->delete();

        return redirect()->route('diseases.index')
            ->with('success', 'Enfermedad eliminada exitosamente');
    }
}
