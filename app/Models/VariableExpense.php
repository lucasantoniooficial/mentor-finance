<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class VariableExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'amount',
        'due_date',
        'status'
    ];

    public function payment(): MorphOne
    {
        return $this->morphOne(Payment::class, 'purchaseable');
    }

    public function amountFormated(): Attribute
    {
        return new Attribute(
            get: function() {
                $fmt = numfmt_create('pt_BR', \NumberFormatter::CURRENCY);
                return numfmt_format_currency($fmt, $this->amount, 'BRL');
            }
        );
    }

    public function dueDateFormated(): Attribute
    {
        return new Attribute(
            get: function() {
                return Carbon::parse($this->due_date)->format('d/m/Y');
            }
        );
    }
}
