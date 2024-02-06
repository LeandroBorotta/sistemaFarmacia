@extends('admin.layouts.app')

@section('content')
 
    <div class="pagetitle">
        <h1>Lista de Medicamentos de Estoque</h1>
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
                                    <th scope="col">Nome de Medicamento</th>
                                    <th scope="col">ID do Lote</th>
                                    <th scope="col">Data de Expiração</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">MRP</th>
                                    <th scope="col">Taxa</th>
                                    <th scope="col">Criado Em</th>
                                    <th scope="col">Action</th>
                               </tr>
                            </thead>

                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        {{-- <td>{{ !empty($value->getMedicamentoName->name) ? $value->$value->getMedicamentoName->name : '' }}</td> --}}
                                        <td>{{ !empty($value->getMedicamentoName->name) ? $value->getMedicamentoName->name : '' }}</td>
                                        <td>{{ $value->batch_id }}</td>
                                        <td>{{ $value->expiry_date }}</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{ $value->mrp }}</td>
                                        <td>{{ $value->rate }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('edit.medicamentos_estoque',$value->id)}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                                            <a href="{{ route('delete.medicamentos_estoque',$value->id)}}" class="btn btn-danger" onclick="return confirm('Tem certeza de que deseja excluir?')"><i class="bi bi-trash"></i></a>
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