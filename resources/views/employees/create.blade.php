@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Buat Employees</div>
            <div class="card-body">
                @if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

                <form action="{{route('employees.store', ['company' => $company])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" @error('nama') is-invalid @enderror" name="nama" id="nama" class="form-control" value="{{old('nama')}}">
                        @error('nama')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" @error('email') is-invalid @enderror" name="email" id="email" class="form-control" value="{{old('email')}}">
                        @error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
						@enderror
                    </div>
                    <div class="col-12">
                        <div class="float-right">
                            <button class="btn btn-sm btn-primary">{{ __("Save") }}</button>
                            <a href="{{ route('company.show', ['company'=> $company]) }}" class="btn btn-sm btn-light">{{ __("Cancel") }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
    var fileName = e.target.files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
    })
</script>
@endsection