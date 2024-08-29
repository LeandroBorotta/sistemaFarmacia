<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicamentosController;
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

// Terminei a aula 16. começar no 17

Route::get('/', [AuthController::class, 'login']);
Route::get('forgot', [AuthController::class, 'forgot']);

Route::post('login_post', [AuthController::class, 'login_post'])->name('admin.login_post');

Route::post('forgot_post', [AuthController::class, 'forgot_post'])->name('admin.forgot_post');

Route::get('reset/{token}', [AuthController::class, 'getReset']);

Route::post('reset/{token}', [AuthController::class, 'postReset'])->name('admin.reset');


// Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/clientes', [ClienteController::class, 'clientes']);
    Route::get('admin/clientes/add', [ClienteController::class, 'add_clientes']);
    Route::post('admin/clientes/add', [ClienteController::class, 'insert_add_clientes'])->name('insert.clientes');
    Route::get('admin/clientes/edit/{id}', [ClienteController::class, 'edit_clientes'])->name('clientes.edit');
    Route::post('admin/clientes/edit/{id}', [ClienteController::class, 'update_clientes'])->name('cliente.update');
    Route::get('admin/clientes/delete/{id}', [ClienteController::class, 'delete_clientes'])->name('cliente.delete');

    // Medicamentos start

    Route::get('admin/medicamentos', [MedicamentosController::class, 'medicamentos']);
    Route::get('admin/medicamentos/add', [MedicamentosController::class, 'add_medicamentos']);
    Route::post('admin/medicamentos/add', [MedicamentosController::class, 'add_medicamentos_create'])->name('create.medicamento');
    Route::get('admin/medicamentos/edit/{id}', [MedicamentosController::class, 'edit_medicamentos'])->name('edit.medicamento');
    Route::post('admin/medicamentos/edit/{id}', [MedicamentosController::class, 'update_medicamentos'])->name('update.medicamento');
    Route::get('admin/medicamentos/delete/{id}', [MedicamentosController::class, 'medicamento_delete'])->name('delete.medicamento');
    // Medicamentos End

    // Estoque de Medicamento
    Route::get('admin/medicamentos_estoque', [MedicamentosController::class, 'medicamento_estoque_list']);
    Route::get('admin/medicamentos_estoque/add', [MedicamentosController::class, 'medicamento_estoque_add']);
    Route::post('admin/medicamentos_estoque/add', [MedicamentosController::class, 'medicamento_estoque_store'])->name('medicamento.estoque');
    Route::get('admin/medicamentos_estoque/delete/{id}', [MedicamentosController::class, 'medicamento_estoque_delete'])->name('delete.medicamentos_estoque');
    Route::get('admin/medicamentos_estoque/edit/{id}', [MedicamentosController::class, 'medicamento_estoque_edit'])->name('edit.medicamentos_estoque');
    // End Estoque de Medicamento
// });

Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
