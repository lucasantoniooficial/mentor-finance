<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseItemRequest;
use App\Models\PurchaseMonth;
use Illuminate\Http\Request;

class PurchaseItemController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(PurchaseMonth $purchaseMonth)
    {
        $items = $purchaseMonth->purchaseList->itemLists;

        return view('purchase-list.month.item.index', [
            'purchaseMonth' => $purchaseMonth,
            'items' => $items,
        ]);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(PurchaseItemRequest $request, PurchaseMonth $purchaseMonth)
    {
        $data = $request->validated();

        try {
            foreach($data['items'] as $item) {
                $purchaseMonth->purchaseItems()->updateOrCreate([
                    'item_list_id' => $item['item_list_id'],
                ], $item);
            }

            return redirect()->route('dashboard')->with('success', 'The purchase items were created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'There was an error creating the purchase items.');
        }
    }
}
