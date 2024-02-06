@extends('admin.layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Editar de Medicamentos</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Medicamentos</h5>

                        <form action="{{ route('edit.medicamentos_estoque',$oldRecord->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf 
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nome do Medicamento<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                      <select class="form-select" aria-label="Default select example" name="medicamento_id" required>
                                        <option selected>Seleciona o Nome do Medicamento</option>
                                        @foreach ($getRecord as $value)
                                            <option {{ ($value->id == $oldRecord->medicamento_id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Lote ID<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"  value="{{ $oldRecord->batch_id }}" name="batch_id" class="form-control" required>
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Data de Expiração<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" value="{{ $oldRecord->expiry_date }}" name="expiry_date" class="form-control" required>
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Quantidade<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"  value="{{ $oldRecord->quantity }}" name="quantity" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">MRP<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"  value="{{ $oldRecord->mrp }}" name="mrp" class="form-control" required>
                                    </div>
                                </div>

                                     <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Taxa<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"  value="{{ $oldRecord->rate }}" name="rate" class="form-control" required>
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>

    </section>


@endsection