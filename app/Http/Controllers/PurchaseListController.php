<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseListRequest;
use App\Models\PurchaseList;
use Illuminate\Http\Request;

class PurchaseListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseLists = PurchaseList::query()->paginate(10);

        return view('purchase-list.index', [
            'purchaseLists' => $purchaseLists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchase-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseListRequest $request)
    {
        $data = $request->validated();

        try {
            PurchaseList::query()->create($data);

            return back()->with('success', 'Purchase list created successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseList $purchaseList)
    {
        return view('purchase-list.edit', [
            'purchaseList' => $purchaseList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PurchaseListRequest $request, PurchaseList $purchaseList)
    {
        $data = $request->validated();

        try {
            $purchaseList->update($data);

            return redirect()->route('purchaseLists.index')->with('success', 'Purchase list updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('purchaseLists.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseList $purchaseList)
    {
        try {
            $purchaseList->delete();

            return back()->with('success', 'Purchase list deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }
}
