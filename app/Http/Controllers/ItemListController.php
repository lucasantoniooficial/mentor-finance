<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemListRequest;
use App\Models\ItemList;
use App\Models\PurchaseList;
use Illuminate\Http\Request;

class ItemListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PurchaseList $purchaseList)
    {
        $itemLists = $purchaseList->itemLists()->paginate(10);
        return view('purchase-list.item.index', [
            'purchaseList' => $purchaseList,
            'itemLists' => $itemLists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PurchaseList $purchaseList)
    {
        return view('purchase-list.item.create', [
            'purchaseList' => $purchaseList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemListRequest $request, PurchaseList $purchaseList)
    {
        $data = $request->validated();

        try {
            $purchaseList->itemLists()->create($data);
            return back()
                ->with('success', 'Item created successfully.');
        } catch (\Exception $exception) {
            return back()
                ->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseList $purchaseList, ItemList $itemList)
    {
        return view('purchase-list.item.edit', [
            'purchaseList' => $purchaseList,
            'itemList' => $itemList
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemListRequest $request, PurchaseList $purchaseList, ItemList $itemList)
    {
        $data = $request->validated();

        try {
            $itemList->update($data);
            return redirect()->route('lists.items.index', $purchaseList->id)
                ->with('success', 'Item updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('lists.items.index', $purchaseList->id)
                ->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseList $purchaseList, ItemList $itemList)
    {
        try {
            $itemList->delete();
            return back()
                ->with('success', 'Item deleted successfully.');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Something went wrong!');
        }
    }
}
