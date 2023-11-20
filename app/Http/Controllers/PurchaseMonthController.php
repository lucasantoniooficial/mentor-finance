<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseMonthRequest;
use App\Models\BankAccount;
use App\Models\PurchaseList;
use App\Models\PurchaseMonth;
use App\Models\VariableExpense;
use Illuminate\Http\Request;

class PurchaseMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PurchaseList $purchaseList)
    {
        $purchaseMonths = $purchaseList->purchaseMonths()->paginate(10);

        return view('purchase-list.month.index', [
            'purchaseList' => $purchaseList,
            'purchaseMonths' => $purchaseMonths,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PurchaseList $purchaseList)
    {
        return view('purchase-list.month.create', [
            'purchaseList' => $purchaseList,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseMonthRequest $request, PurchaseList $purchaseList)
    {
        $data = $request->validated();

        try {
            $purchaseList->purchaseMonths()->create($data);

            return back()->with('success', 'Month created successfully.');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseList $purchaseList, PurchaseMonth $purchaseMonth)
    {
        return view('purchase-list.month.edit', [
            'purchaseList' => $purchaseList,
            'purchaseMonth' => $purchaseMonth,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PurchaseMonthRequest $request, PurchaseList $purchaseList, PurchaseMonth $purchaseMonth)
    {
        $data = $request->validated();

        try {
            $purchaseMonth->update($data);

            return redirect()->route('lists.months.index', $purchaseMonth->id)
                ->with('success', 'Month updated successfully.');
        } catch (\Exception $exception) {
            return redirect()->route('lists.months.index', $purchaseMonth->id)
                ->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseList $purchaseList, PurchaseMonth $purchaseMonth)
    {
        try {
            $purchaseMonth->delete();

            return back()->with('success', 'Month deleted successfully.');
        } catch (\Exception $exception) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function changeStatusShopping(PurchaseMonth $purchaseMonth)
    {
        try {
            $purchaseMonth->purchaseList->update(['status' => 'Comprando']);
            $purchaseMonth->update(['status' => 'Comprando']);
            return back()->with('success', 'Status changed successfully.');
        } catch (\Exception $exception) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function viewChangeStatusFinished(PurchaseMonth $purchaseMonth)
    {
        return view('purchase-list.month.change-status-finished', [
            'purchaseMonth' => $purchaseMonth,
        ]);
    }

    public function changeStatusFinished(Request $request, PurchaseMonth $purchaseMonth)
    {
        $data = $request->validate([
            'total' => 'required|numeric'
        ]);

        try {
            $purchaseMonth->purchaseList->update([
                'status' => 'Finalizada'
            ]);

            $purchaseMonth->update([
                ...$data,
                'status' => 'Finalizada'
            ]);

            $purchaseMonth->payment()->create([
                'bank_account_id' => BankAccount::query()->latest()->first()->id,
                'amount' => $data['total'],
                'due_date' => now(),
                'payment_date' => now(),
                'status' => 'Pago'
            ]);

            VariableExpense::query()->create([
                'description' => $purchaseMonth->purchaseList->name,
                'amount' => $data['total'],
                'due_date' => now(),
                'status' => 'Pago',
            ]);

            return redirect()->route('dashboard')->with('success', 'Status changed successfully.');
        } catch (\Exception $exception) {
            return redirect()->route('dashboard')->with('error', 'Something went wrong!');
        }
    }
}
