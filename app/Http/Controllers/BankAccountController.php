<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountRequest;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankAccounts = BankAccount::query()->paginate(10);
        return view('bank-account.index', [
            'bankAccounts' => $bankAccounts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bank-account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankAccountRequest $request)
    {
        $data = $request->validated();

        try {
            BankAccount::query()->create($data);
            return back()->with('success', 'Bank account created successfully!');
        } catch (\Exception $exception) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankAccount $bankAccount)
    {
        return view('bank-account.edit', [
            'bankAccount' => $bankAccount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankAccountRequest $request, BankAccount $bankAccount)
    {
        $data = $request->validated();

        try {
            $bankAccount->update($data);
            return redirect()->route('accounts.index')->with('success', 'Bank account updated successfully!');
        } catch (\Exception $exception) {
            return redirect()->route('accounts.index')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankAccount $bankAccount)
    {
        try {
            $bankAccount->delete();
            return back()->with('success', 'Bank account deleted successfully!');
        } catch (\Exception $exception) {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
