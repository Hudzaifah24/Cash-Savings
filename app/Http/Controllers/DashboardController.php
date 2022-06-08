<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Expenditure;
use App\Models\Saving;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $savings = Saving::all();

        $expenditures = Expenditure::all();

        $debts = Debt::where('status', false)->get();

        // Total Saving All
            if (!$savings->count() == 0) {
                foreach ($savings as $valueSaving) {
                    $amountSaving[] = $valueSaving->amount;
                }

                if (!$expenditures->count() == 0) {
                    foreach ($expenditures as $valueExpenditure) {
                        $amountExpenditure[] = $valueExpenditure->amount;
                    }

                    // Expenditure amount
                    $expenditure_saving = array_sum($amountExpenditure);
                } else {
                    $expenditure_saving = 0;
                }

                // Saving amount
                $savingAmount = array_sum($amountSaving);

                $chart = [
                    'jan' => Saving::whereMonth('date', 1)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 1)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'feb' => Saving::whereMonth('date', 2)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 2)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'mar' => Saving::whereMonth('date', 3)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 3)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'apr' => Saving::whereMonth('date', 4)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 4)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'mei' => Saving::whereMonth('date', 5)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 5)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'jun' => Saving::whereMonth('date', 6)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 6)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'jul' => Saving::whereMonth('date', 7)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 7)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'agu' => Saving::whereMonth('date', 8)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 8)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'sep' => Saving::whereMonth('date', 9)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 9)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'okt' => Saving::whereMonth('date', 10)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 10)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'nov' => Saving::whereMonth('date', 11)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 11)->whereYear('date', Carbon::now('Y'))->first()->amount,
                    'des' => Saving::whereMonth('date', 12)->whereYear('date', Carbon::now('Y'))->first() == null ? 0 : Saving::whereMonth('date', 12)->whereYear('date', Carbon::now('Y'))->first()->amount,
                ];
            } else {
                $savingAmount = 0;

                $expenditure_saving = 0;

                $chart = [
                    'jan' => 0,
                    'feb' => 0,
                    'mar' => 0,
                    'apr' => 0,
                    'mei' => 0,
                    'jun' => 0,
                    'jul' => 0,
                    'agu' => 0,
                    'sep' => 0,
                    'okt' => 0,
                    'nov' => 0,
                    'des' => 0,
                ];
            }
        // End Total Saving All

        // Total Income this month
            $incomeAmounts = Saving::whereMonth('date', Carbon::now('m'))->whereYear('date', Carbon::now('Y'))->first();

            if (!$incomeAmounts == null) {
                $incomeAmount = Saving::whereMonth('date', Carbon::now('m'))->whereYear('date', Carbon::now('Y'))->first()->amount;
            } else {
                $incomeAmount = 0;
            }
        // End Total Income this month

        // Total Expenditure this month
            $expendituresThisMonth = Expenditure::whereMonth('date', Carbon::now('m'))->whereYear('date', Carbon::now('Y'))->get();

            if (!$expendituresThisMonth->count() == 0) {
                foreach ($expendituresThisMonth as $key => $valueExpenditureThisMonth) {
                    $amountExpenditureThisMonth[] = $valueExpenditureThisMonth->amount;
                }

                $expenditureAmount = array_sum($amountExpenditureThisMonth);
            } else {
                $expenditureAmount = 0;
            }
        // End Total Expenditure this month

        // Total Debt
            if (!$debts->count() == 0) {
                // foreach ($debts as $valueReminderAmount) {
                //     $amountReminderAmount[] = $valueReminderAmount->reminder_amount;
                // }

                foreach ($debts as $key => $valueDebt) {
                    $amountDebt[] = $valueDebt->amount;
                }

                // $action = array_sum($amountDebt) - array_sum($amountReminderAmount);

                $debtAmount = array_sum($amountDebt);
            } else {
                $debtAmount = 0;
            }
        // End Total Debt

        $data = [
            'saving' => $savingAmount,
            'income' => $incomeAmount,
            'expenditure_saving' => $expenditure_saving,
            'expenditure' => $expenditureAmount,
            'debt' => $debtAmount,
        ];

        return view('pages.dashboard.dashboard', compact(
            'data',
        ));
    }
}
