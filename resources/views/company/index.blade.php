@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="card border-primary">
			<div class="card-header">
				<h5>Data Company</h5>
                <a href="{{route ('company.create')}}" class="btn btn-sm btn-primary">{{ __('Create') }}</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Action</th>
							</tr>
                        </thead>
                        <tbody>
                            @forelse ($company as $index => $user)
								<tr>
									<td>{{ $index + $company->firstItem() }}</td>
									<td>{{ $user->nama }}</td>
									<td>{{ $user->email }}</td>
									<td><img src="{{ route('company.logo', ['company' => $user]) }}" width="50" alt="logo"></td>
									<td>{{ $user->website }}</td>
									<td>
										<a href="{{ route('company.show', ['company' => $user]) }}" class="btn btn-sm btn-primary">Show</a>
										<a href="{{ route('company.edit', ['company' => $user]) }}" class="btn btn-sm btn-primary">Edit</a>
										<a href="{{ route('company.destroy', ['company' => $user]) }}" onclick="deleteCompany('#delete-{{$user->id}}')">Hapus</a>
										
                                        <form action="{{ route('company.destroy', ['company' => $user]) }}" method="POST" id="delete-{{$user->id}}">
                                        @csrf
                                        @method('DELETE')
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="4"> {{ __('Data is empty') }}.... </td>
								</tr>
							@endforelse
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<script>
	function deleteCompany(id){
		event.preventDefault()
		if(confirm("Apakah Anda Yakin Ingin Mengapus")){
			document.querySelector(id).submit()
		}
	}
</script>
@endsection