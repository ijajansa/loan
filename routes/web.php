<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\SubAgentController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\CardApplicationController;
use App\Http\Controllers\LoanMasterController;
use App\Http\Controllers\LoanDocumentController;
use App\Http\Controllers\BankCommissionController;
use App\Http\Controllers\BankCommissionCrController;
use App\Http\Controllers\WalletRequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});
Route::get('privacy-policy', function () {
    return view('web.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('change-password',[PanelController::class, 'loadChangePasswordPage'])->middleware('permission.admin');
Route::post('change-password',[PanelController::class, 'changePassword'])->middleware('permission.admin');


Route::group(['prefix' => 'dsa', 'middleware'=> ['auth']], function(){
	Route::get('/',[AgentController::class, 'all']);
	Route::get('add',[AgentController::class, 'add']);
	Route::get('delete/{id}',[AgentController::class, 'delete']);
	Route::get('edit/{id}',[AgentController::class, 'edit']);
	Route::post('add',[AgentController::class, 'insert']);
	Route::get('status/{id}',[AgentController::class, 'status']);
	Route::post('edit/{id}',[AgentController::class, 'update']);
});

Route::group(['prefix' => 'sub-dsa', 'middleware'=> ['auth']], function(){
	Route::get('/',[SubAgentController::class, 'all']);
	Route::get('add',[SubAgentController::class, 'add']);
	Route::get('delete/{id}',[SubAgentController::class, 'delete']);
	Route::get('edit/{id}',[SubAgentController::class, 'edit']);
	Route::post('add',[SubAgentController::class, 'insert']);
	Route::get('status/{id}',[SubAgentController::class, 'status']);
	Route::post('edit/{id}',[SubAgentController::class, 'update']);
});

Route::group(['prefix' => 'loan-types', 'middleware'=> ['auth']], function(){
	Route::get('/',[LoanMasterController::class, 'all']);
	Route::get('add',[LoanMasterController::class, 'add']);
	Route::get('edit/{id}',[LoanMasterController::class, 'edit']);
	Route::get('status/{id}',[LoanMasterController::class, 'status']);
	Route::get('delete/{id}',[LoanMasterController::class, 'destroy']);
	Route::post('edit/{id}',[LoanMasterController::class, 'update']);
	Route::post('add',[LoanMasterController::class, 'insert']);
	Route::get('assign/{id}',[LoanMasterController::class, 'documents']);
	Route::post('assign/{id}',[LoanMasterController::class, 'assignDocuments']);

});

Route::group(['prefix' => 'loan-documents', 'middleware'=> ['auth']], function(){
	Route::get('/',[LoanDocumentController::class, 'all']);
	Route::get('add',[LoanDocumentController::class, 'add']);
	Route::get('edit/{id}',[LoanDocumentController::class, 'edit']);
	Route::get('status/{id}',[LoanDocumentController::class, 'status']);
	Route::get('delete/{id}',[LoanDocumentController::class, 'destroy']);
	Route::post('edit/{id}',[LoanDocumentController::class, 'update']);
	Route::post('add',[LoanDocumentController::class, 'insert']);
});

Route::group(['prefix' => 'loan-applications', 'middleware'=> ['auth']], function(){
	Route::get('/',[LoanApplicationController::class, 'all']);
	Route::get('edit/{id}',[LoanApplicationController::class, 'edit']);
	Route::post('status/{id}',[LoanApplicationController::class, 'status']);
});

Route::group(['prefix' => 'credit-card-leads', 'middleware'=> ['auth']], function(){
	Route::get('/',[CardApplicationController::class, 'all']);
	Route::get('edit/{id}',[CardApplicationController::class, 'edit']);
	Route::post('status/{id}',[CardApplicationController::class, 'status']);
});

	Route::get('wallet-history',[PanelController::class, 'loadWalletPage']);
	Route::get('wallet-withdraw',[PanelController::class, 'loadWalletWithdrawPage']);
	Route::post('wallet-withdraw',[PanelController::class, 'loadWalletWithdraw']);
	Route::get('loan-panel',[PanelController::class, 'loadLoanPage']);
	Route::get('credit-card',[PanelController::class, 'creditCardPage']);
	Route::get('view-credit-card-details/{id}',[PanelController::class, 'viewCreditCardPage']);
	Route::get('list-credit-cards',[PanelController::class, 'listCards']);
	Route::post('credit-card',[PanelController::class, 'creditCard']);
	Route::get('view-loan/{id}',[PanelController::class, 'viewLoanLead']);
	Route::post('upload-loan',[PanelController::class, 'uploadLoan']);
	Route::post('edit-dsa/{id}',[PanelController::class, 'updateDSA']);
	Route::post('upload-document/{id}',[PanelController::class, 'uploadDocument']);


Route::group(['prefix' => 'bank-commissions', 'middleware'=> ['auth']], function(){
	Route::get('/',[BankCommissionController::class, 'all']);
	Route::get('add',[BankCommissionController::class, 'add']);
	Route::get('delete/{id}',[BankCommissionController::class, 'delete']);
	Route::get('edit/{id}',[BankCommissionController::class, 'edit']);
	Route::post('add',[BankCommissionController::class, 'insert']);
	Route::get('status/{id}',[BankCommissionController::class, 'status']);
	Route::post('edit/{id}',[BankCommissionController::class, 'update']);
});
Route::group(['prefix' => 'credit-card-commissions', 'middleware'=> ['auth']], function(){
	Route::get('/',[BankCommissionCrController::class, 'all']);
	Route::get('add',[BankCommissionCrController::class, 'add']);
	Route::get('delete/{id}',[BankCommissionCrController::class, 'delete']);
	Route::get('edit/{id}',[BankCommissionCrController::class, 'edit']);
	Route::post('add',[BankCommissionCrController::class, 'insert']);
	Route::get('status/{id}',[BankCommissionCrController::class, 'status']);
	Route::post('edit/{id}',[BankCommissionCrController::class, 'update']);
});

Route::group(['prefix' => 'wallet-requests', 'middleware'=> ['auth']], function(){
	Route::get('/',[WalletRequestController::class, 'all']);
	Route::get('add',[WalletRequestController::class, 'add']);
	Route::get('delete/{id}',[WalletRequestController::class, 'delete']);
	Route::get('edit/{id}',[WalletRequestController::class, 'edit']);
	Route::post('add',[WalletRequestController::class, 'insert']);
	Route::get('status/{id}',[WalletRequestController::class, 'status']);
	Route::post('edit/{id}',[WalletRequestController::class, 'update']);
});
