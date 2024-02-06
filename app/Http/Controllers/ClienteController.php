<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function clientes(Request $request)
    {
        $data['getRecord'] = Cliente::getAllRecord();
        return view('admin.clientes.list', $data);
    }

    public function add_clientes(Request $request)
    {
        return view('admin.clientes.add');
    }

    public function insert_add_clientes(Request $request)
    {
        // dd($request->all());

        $clientes = new Cliente();
        $clientes->name = trim($request->name);
        $clientes->contact_number = trim($request->contact_number);
        $clientes->address = trim($request->address);
        $clientes->doctor_name = trim($request->doctor_name);
        $clientes->doctor_address = trim($request->doctor_address);
        $clientes->save();

        return redirect('admin/clientes')->with('success', ' Cliente Cadastrado com Sucesso.');
    }

    public function edit_clientes($id, Request $request)
    {
        // echo $id;die();
        // $data['getRecord'] = Cliente::find($id);
        $data['getRecord'] = Cliente::getSingle($id);
        return view('admin.clientes.edit', $data);
    }

    public function update_clientes($id, Request $request)
    {
        //$clientes = Cliente::find($id);
        $clientes = Cliente::getSingle($id);
        $clientes->name = trim($request->name);
        $clientes->contact_number = trim($request->contact_number);
        $clientes->address = trim($request->address);
        $clientes->doctor_name = trim($request->doctor_name);
        $clientes->doctor_address = trim($request->doctor_address);
        $clientes->update();

        return redirect('admin/clientes')->with('success', ' Cliente Atualizado com Sucesso.');
    }

    public function delete_clientes($id)
    {
        // echo $id;die();

        // $delete_record = Cliente::find($id);
        $delete_record = Cliente::getSingle($id);
        $delete_record->delete();

        return redirect('admin/clientes')->with('error', ' Cliente Deletado com Sucesso.');
    }
}
