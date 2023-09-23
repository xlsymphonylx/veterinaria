<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'race' => 'required',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')
                         ->with('success', 'Patient created successfully');
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        return view('patients.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'race' => 'required',
        ]);

        $patient = Patient::find($id);
        $patient->update($request->all());

        return redirect()->route('patients.index')
                         ->with('success', 'Patient updated successfully');
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();

        return redirect()->route('patients.index')
                         ->with('success', 'Patient deleted successfully');
    }
}
