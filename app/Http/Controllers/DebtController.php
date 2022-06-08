<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Expenditure;
use Carbon\Carbon;

class DebtController extends Controller
{
    public function index()
    {
        $debts = Debt::all();

        return view('pages.dashboard.debt.index', compact(
            'debts'
        ));
    }

    public function create()
    {
        return view('pages.dashboard.debt.create');
    }

    public function store()
    {
        Debt::create([
            'amount' => request()->amount,
            'date' => request()->date,
            'to_whom' => request()->to_whom,
            'email' => request()->email,
            'reminder_amount' => request()->amount,
            'status' => false,
            'user_id' => 1,
        ]);

        return redirect()->route('debt.index')->with('create', 'successfully create');
    }

    public function edit($id)
    {
        $debt = Debt::findOrFail($id);

        return view('pages.dashboard.debt.edit', compact(
            'debt'
        ));
    }

    public function update($id)
    {
        $debt = Debt::findOrFail($id);

        $debt->update([
            'amount' => request()->amount,
            'date' => request()->date,
            'to_whom' => request()->to_whom,
            'email' => request()->email,
            'user_id' => 1,
        ]);

        return redirect()->route('debt.index')->with('update', 'successfully update');
    }

    public function destroy($id)
    {
        $debt = Debt::findOrFail($id);

        $expenditures = Expenditure::where('debt_id', $debt->id)->get();

        if (!$expenditures->count() == 0) {
            foreach ($expenditures as $key => $value) {
                $value->delete();
            }
        }
        $debt->delete();

        return redirect()->route('debt.index')->with('delete', 'successfully delete');
    }

    public function pay($id)
    {
        $debt = Debt::findOrFail($id);

        if (request()->with == 'savings') {
            $expenditure = Expenditure::create([
                'amount' => request()->amount,
                'date' => Carbon::now(),
                'for' => 'Hutang '.$debt->to_whom,
                'proof' => NULL,
                'debt_id' => $debt->id,
                'user_id' => 1,
            ]);

            $debt->update([
                'expenditure_id' => $expenditure->id,
            ]);
        }

        $plus = request()->amount;

        if ($plus == $debt->amount || $debt->reminder_amount - $plus == 0) {
            $debt->update([
                'status' => true,
            ]);
        } elseif ($plus > $debt->amount) {
            return back();
        }

        $debt->update([
            'reminder_amount' => $debt->reminder_amount - request()->amount,
            'with' => request()->with,
        ]);

        return redirect()->route('debt.index')->with('success', 'Anda berhasil membayar');
    }

    public function refresh($id)
    {
        $debt = Debt::findOrFail($id);

        $expenditures = Expenditure::where('debt_id', $debt->id)->get();

        if (!$expenditures->count() == 0) {
            foreach ($expenditures as $key => $value) {
                $value->delete();
            }
        }

        $debt->update([
            'reminder_amount' => $debt->amount,
            'status' => false,
            'with' => NULL,
        ]);

        return redirect()->route('debt.index')->with('success', 'Anda berhasil membayar');
    }
}
