<?php

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FixedExpenseController;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\PurchaseListController;
use App\Http\Controllers\PurchaseMonthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariableExpenseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('users', UserController::class)->except('show');
Route::resource('bank/accounts', BankAccountController::class)
    ->parameter('accounts', 'bankAccount')
    ->except('show');

Route::resource('fixed/expenses', FixedExpenseController::class)
    ->parameter('expenses', 'fixedExpense')
    ->except('show');

Route::resource('variable/expenses', VariableExpenseController::class)
    ->parameter('expenses', 'variableExpense')
    ->names([
        'index' => 'variableExpenses.index',
        'create' => 'variableExpenses.create',
        'store' => 'variableExpenses.store',
        'edit' => 'variableExpenses.edit',
        'update' => 'variableExpenses.update',
        'destroy' => 'variableExpenses.destroy',
    ])
    ->except('show');

Route::resource('purchase/lists', PurchaseListController::class)
    ->parameter('lists', 'purchaseList')
    ->names([
        'index' => 'purchaseLists.index',
        'create' => 'purchaseLists.create',
        'store' => 'purchaseLists.store',
        'edit' => 'purchaseLists.edit',
        'update' => 'purchaseLists.update',
        'destroy' => 'purchaseLists.destroy',
    ])
    ->except('show');

Route::resource('purchase/lists.items', ItemListController::class)
    ->parameter('lists', 'purchaseList')
    ->parameter('items', 'itemList')
    ->except('show');

Route::resource('purchase/lists.months', PurchaseMonthController::class)
    ->parameter('lists', 'purchaseList')
    ->parameter('months', 'purchaseMonth')
    ->except('show');
Route::post('purchase/lists/months/{purchaseMonth}/shopping', [PurchaseMonthController::class, 'changeStatusShopping'])->name('lists.months.change.shopping');
Route::get('purchase/lists/months/{purchaseMonth}/finished', [PurchaseMonthController::class, 'viewChangeStatusFinished'])->name('lists.months.change.finished');
Route::post('purchase/lists/months/{purchaseMonth}/finished', [PurchaseMonthController::class, 'changeStatusFinished'])->name('lists.months.change.finished');
Route::resource('purchase/lists/months.items', PurchaseItemController::class)
    ->parameter('months', 'purchaseMonth')
    ->only('create', 'store');
Route::post('payments/{id}', PaymentController::class)->name('payments');
require __DIR__ . '/auth.php';
