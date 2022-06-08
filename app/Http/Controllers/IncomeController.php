<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Saving;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();

        return view('pages.dashboard.income.index', compact(
            'incomes',
        ));
    }

    public function create()
    {
        return view('pages.dashboard.income.create');
    }

    public function store() // Success
    {
        $year = request()->year;
        $month = request()->month;
        $day = request()->day;

        $savingId = Saving::whereMonth('date', $month)->whereYear('date', $year)->first();

        if ($savingId == null) {
            $saving = Saving::create([
                'amount' => request()->amount,
                'date' => $year.'-'.$month.'-'.$day,
                'user_id' => 1,
            ]);
        } else {
            $saving = $savingId->update([
                'amount' => request()->amount + $savingId->amount,
            ]);
        }

        $income = Income::create([
            'amount' => request()->amount,
            'date' => $year.'-'.$month.'-'.$day,
            'from' => request()->from,
            'saving_id' => $savingId == null ? $saving->id : $savingId->id,
        ]);

        return redirect()->route('income.index')->with('create', 'successfully create');
    }

    public function edit($id)
    {
        $income = Income::findOrFail($id);

        return view('pages.dashboard.income.edit', compact(
            'income'
        ));
    }

    public function update($id) // Success
    {
        $income = Income::findOrFail($id);

        $saving = Saving::whereId($income->saving_id)->first();

        $saving->update([
            'amount' => $saving->amount + request()->amount - $income->amount,
        ]);

        $income->update([
            'amount' => request()->amount,
            'from' => request()->from,
            'saving_id' => $income->saving_id,
        ]);

        return redirect()->route('income.index')->with('update', 'successfully update');
    }

    public function destroy($id) // success
    {
        $income = Income::findOrFail($id);

        $saving = Saving::whereId($income->saving_id)->first();

        $saving->update([
            'amount' => $saving->amount - $income->amount,
        ]);

        $income->delete();

        return redirect()->route('income.index')->with('delete', 'successfully delete');
    }
}
