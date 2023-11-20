<?php

namespace App\Http\Controllers;

use App\Http\Requests\VariableExpenseRequest;
use App\Models\VariableExpense;
use Illuminate\Http\Request;

class VariableExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variableExpenses = VariableExpense::query()->paginate(10);
        return view('variable-expense.index', [
            'variableExpenses' => $variableExpenses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('variable-expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VariableExpenseRequest $request)
    {
        $data = $request->validated();

        try {
            VariableExpense::query()->create($data);
            return back()->with('success', 'Variable expense created successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VariableExpense $variableExpense)
    {
        return view('variable-expense.edit', [
            'variableExpense' => $variableExpense,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VariableExpenseRequest $request, VariableExpense $variableExpense)
    {
        $data = $request->validated();

        try {
            $variableExpense->update($data);
            return redirect()->route('variableExpenses.index')->with('success', 'Variable expense updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('variableExpenses.index')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VariableExpense $variableExpense)
    {
        try {
            $variableExpense->delete();
            return back()->with('success', 'Variable expense deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
