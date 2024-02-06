@extends('admin.layouts.app')

@section('content')
 
    <div class="pagetitle">
        <h1>Lista de Medicamentos</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/medicamentos_estoque/add')}}" class="btn btn-primary">Adicionar Novo Estoque de Medicamento</a>
                        </h5>

                        
                        <table class="table datatable">
                            <thead>
                               <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Embalagem de Medicamento</th>
                                    <th scope="col">Nome Generico</th>
                                    <th scope="col">Nome do Fornecedor</th>
                                    <th scope="col">Criado Em</th>
                                    <th scope="col">Action</th>
                               </tr>
                            </thead>

                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->packing }}</td>
                                        <td>{{ $value->generic_name }}</td>
                                        <td>{{ $value->supplier_name }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('edit.medicamento', $value->id )}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                                            <a href="{{ route('delete.medicamento',$value->id)}}" class="btn btn-danger" onclick="return confirm('Tem certeza de que deseja excluir?')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection