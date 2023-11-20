<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'items' => collect($this->items)->map(function($item, $key) {
                if(isset($item['purchased'])) {
                    $item['purchased'] = $item['purchased'] == 'on' ? true : false;
                } else {
                    $item['purchased'] = false;
                }

                return [
                    'item_list_id' => $key,
                    'quantity' => $item['quantity'],
                    'purchased' => $item['purchased'],
                ];
            })->values()->toArray()
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'items' => 'array',
            'items.*' => 'array',
            'items.*.quantity' => 'required',
            'items.*.purchased' => 'required|boolean',
            'items.*.item_list_id' => 'required|exists:item_lists,id'
        ];
    }
}
