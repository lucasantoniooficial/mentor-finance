<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'balance',
        'entry_date'
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function balanceFormated(): Attribute
    {
        return new Attribute(
            get: function() {
                $fmt = numfmt_create('pt_BR', \NumberFormatter::CURRENCY);
                return numfmt_format_currency($fmt, $this->balance, 'BRL');
            }
        );
    }

    public function entryDateFormated(): Attribute
    {
        return new Attribute(
            get: function() {
                return Carbon::parse($this->entry_date)->format('d/m/Y');
            }
        );
    }

    public function scopeBalance(Builder $builder)
    {
        return $builder
            ->select([
                DB::raw('bank_accounts.balance - SUM(payments.amount) as balance')
            ])
            ->join('payments', 'payments.bank_account_id', 'bank_accounts.id')
            ->whereIn('payments.status', ['Pendente', 'Pago'])
            ->whereMonth('payments.due_date', now()->month)
            ->groupBy('bank_accounts.id');
    }
}
