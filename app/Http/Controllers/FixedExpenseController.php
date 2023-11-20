<?php

namespace App\Http\Controllers;

use App\Http\Requests\FixedExpenseRequest;
use App\Models\FixedExpense;
use Illuminate\Http\Request;

class FixedExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fixedExpenses = FixedExpense::query()->paginate(10);
        return view('fixed-expense.index', [
            'fixedExpenses' => $fixedExpenses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fixed-expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FixedExpenseRequest $request)
    {
        $data = $request->validated();

        try {
            FixedExpense::query()->create($data);
            return back()
                ->with('success', 'Fixed expense created successfully.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Something went wrong.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FixedExpense $fixedExpense)
    {
        return view('fixed-expense.edit', [
            'fixedExpense' => $fixedExpense,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FixedExpenseRequest $request, FixedExpense $fixedExpense)
    {
        $data = $request->validated();

        try {
            $fixedExpense->update($data);

            return redirect()->route('expenses.index')
                ->with('success', 'Fixed expense updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('expenses.index')
                ->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FixedExpense $fixedExpense)
    {
        try {
            $fixedExpense->delete();

            return back()
                ->with('success', 'Fixed expense deleted successfully.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Something went wrong.');
        }
    }
}
