<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Expenditure;
use App\Models\Saving;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    public function index()
    {
        $expenditures = Expenditure::all();

        return view('pages.dashboard.expenditure.index', compact(
            'expenditures',
        ));
    }

    public function create()
    {
        return view('pages.dashboard.expenditure.create');
    }

    public function store()
    {
        $request = request()->validate([
            'proof' => 'nullable'
        ]);

        Expenditure::create([
            'amount' => request()->amount,
            'date' => request()->date,
            'for' => request()->for,
            'proof' => $request['proof'],
            'user_id' => 1, // dami
        ]);

        return redirect()->route('expenditure.index')->with('create', 'successfully create');
    }

    public function edit($id)
    {
        $expenditure = Expenditure::findOrFail($id);

        return view('pages.dashboard.expenditure.edit', compact(
            'expenditure'
        ));
    }

    public function update($id)
    {
        $request = request()->validate([
            'proof' => 'nullable'
        ]);

        $expenditure = Expenditure::findOrFail($id);

        $expenditure->update([
            'amount' => request()->amount,
            'date' => request()->date,
            'for' => request()->for,
            'proof' => $request['proof'],
            'user_id' => 1,
        ]);

        return redirect()->route('expenditure.index')->with('update', 'successfully update');
    }

    public function destroy($id)
    {
        $expenditure = Expenditure::findOrFail($id);

        if ($expenditure->debt_id != NULL) {
            $debt = Debt::findOrFail($expenditure->debt_id);

            $debt->update([
                'reminder_amount' => $debt->reminder_amount + $expenditure->amount,
                'status' => false,
            ]);
        }

        $expenditure->delete();

        return redirect()->route('expenditure.index')->with('delete', 'successfully delete');
    }
}
