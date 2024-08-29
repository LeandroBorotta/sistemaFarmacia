@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Lista de Clientes</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('admin/clientes/add') }}" class="btn btn-primary">Adicionar Novo Cliente</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Número de Contato</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Nome Doctor</th>
                                    <th scope="col">Endereço Doctor</th>
                                    <th scope="col">Criado Em</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->contact_number }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->doctor_name }}</td>
                                        <td>{{ $value->doctor_address }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('clientes.edit', $value->id) }}" class="btn btn-success"><i
                                                    class="bi bi-pencil-square"></i></a>

                                            <a href="{{ route('cliente.delete', $value->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Tem certeza de que deseja excluir?')"><i
                                                    class="bi bi-trash"></i></a>
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
