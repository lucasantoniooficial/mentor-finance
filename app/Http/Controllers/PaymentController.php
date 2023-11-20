<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\FixedExpense;
use App\Models\VariableExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $balance = BankAccount::query()->balance()->first()->balance;
        if($request->fixed == 'Sim') {
            $expense = FixedExpense::query()->findOrFail($id);
        } else {
            $expense = VariableExpense::query()->findOrFail($id);
        }

        if($balance < $expense->amount) {
            return redirect()->back()->with('error', 'Saldo insuficiente para realizar o pagamento!');
        }

        $dueDate = Carbon::create(now()->year, now()->month, $expense->day_of_month);

        if(!$expense->day_of_month) {
            $dueDate = $expense->due_date;
        }

        if($request->fixed == 'Sim') {
            $expense->payments()->create([
                'bank_account_id' => BankAccount::query()->latest()->first()->id,
                'due_date' => $dueDate,
                'payment_date' => now(),
                'amount' => $expense->amount,
                'status' => 'Pago'
            ]);
        } else {
            $expense->payment()->create([
                'bank_account_id' => BankAccount::query()->latest()->first()->id,
                'due_date' => $dueDate,
                'payment_date' => now(),
                'amount' => $expense->amount,
                'status' => 'Pago'
            ]);

            $expense->update([
                'status' => 'Pago'
            ]);
        }

        return redirect()->back()->with('success', 'Pagamento realizado com sucesso!');
    }
}
