@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Buat Company</div>
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

                <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
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
                        <input type="email" @error('email') is-invalid @enderror" name="email" id="email" class="form-control" value="{{old('email')}}">
                        @error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="logo">
                            <label class="custom-file-label"  @error('logo') is-invalid @enderror" for="customFile">Choose file</label>
                            @error('logo')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="url" @error('website') is-invalid @enderror" name="website" id="website" class="form-control" value="{{old('website')}}">
                        @error('website')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
                    </div>
                    <div class="col-12">
                        <div class="float-right">
                            <button class="btn btn-sm btn-primary">{{ __("Save") }}</button>
                            <a href="{{ route('company.index') }}" class="btn btn-sm btn-light">{{ __("Cancel") }}</a>
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