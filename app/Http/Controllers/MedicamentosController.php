<?php

namespace App\Http\Controllers;

use App\Models\EstoqueMedicamento;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    public function medicamentos(Request $request)
    {
        $data['getRecord'] = Medicamento::where('isDeleted', '=', 0)->get();
        return view('admin.medicamentos.list', $data);
    }

    public function add_medicamentos()
    {
        return view('admin.medicamentos.add');
    }

    public function add_medicamentos_create(Request $request)
    {
        // dd($request->all());


        $medicamentos = new Medicamento;
        $medicamentos->name = trim($request->name);
        $medicamentos->packing = trim($request->packing);
        $medicamentos->generic_name = trim($request->generic_name);
        $medicamentos->supplier_name = trim($request->supplier_name);
        $medicamentos->save();

        return redirect('admin/medicamentos')->with('success', 'Medicamento Cadastrado com sucesso!');
    }

    public function edit_medicamentos($id)
    {
        $data['getRecord'] = Medicamento::find($id);
        return view('admin.medicamentos.edit', $data);
    }

    public function update_medicamentos($id = '', Request $request)
    {
        if (!empty($id)) {
            $medicamentos = Medicamento::find($id);
        } else {
            $medicamentos = new Medicamento;
        }

        //  $medicamentos = new Medicamento;
        $medicamentos->name = $request->name;
        $medicamentos->packing = $request->packing;
        $medicamentos->generic_name = $request->generic_name;
        $medicamentos->supplier_name = $request->supplier_name;
        $medicamentos->save();

        return redirect('admin/medicamentos')->with('success', 'Medicamento Atualizado com sucesso!');
    }

    public function medicamento_delete($id)
    {
        $deleteRecord = Medicamento::find($id);
        $deleteRecord->isDeleted = 1;
        $deleteRecord->save();
        // $deleteRecord->delete();

        return redirect()->back()->with('success', 'Excluir registro');
    }

    public function medicamento_estoque_list()
    {
        $data['getRecord'] = EstoqueMedicamento::get();
        return view('admin.medicamentos_estoque.list', $data);
    }

    public function medicamento_estoque_add()
    {
        $data['getRecord'] = Medicamento::where('isDeleted', '=', 0)->get();
        return view('admin.medicamentos_estoque.add', $data);
    }

    public function medicamento_estoque_store(Request $request)
    {
        // dd($request->all());

        $estoque_medicamento = new EstoqueMedicamento();

        $estoque_medicamento->medicamento_id = $request->medicamento_id;
        $estoque_medicamento->batch_id = $request->batch_id;
        $estoque_medicamento->expiry_date = $request->expiry_date;
        $estoque_medicamento->quantity = $request->quantity;
        $estoque_medicamento->mrp = $request->mrp;
        $estoque_medicamento->rate = $request->rate;
        $estoque_medicamento->save();

        return redirect('admin/medicamentos_estoque')->with('success', 'Estoque de Medicamento Atualizado com sucesso!');
    }

    public function medicamento_estoque_delete(Request $request, $id)
    {
        $deleteRecord = EstoqueMedicamento::find($id);
        $deleteRecord->delete();

        return redirect()->back()->with('success', "Excluir Registro");
    }

    public function medicamento_estoque_edit($id, Request $request)
    {
        $data['oldRecord'] = EstoqueMedicamento::find($id);
        $data['getRecord'] = Medicamento::where('isDeleted', '=', 0)->get();

        return view('admin.medicamentos_estoque.edit', $data);
    }
}
