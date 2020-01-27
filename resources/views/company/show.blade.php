@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="card border-primary">
			<div class="card-header">
				<h5>Data Employees</h5>
                <a href="{{route ('employees.create', ['company' => $company])}}" class="btn btn-sm btn-primary">{{ __('Create') }}</a>
                <a href="{{route ('company.index', ['company' => $company])}}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
                                <th>No</th>
                                <th>Company</th>
                                <th>Nama</th>
                                <th>email</th>
                                <th>Action</th>
							</tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $index => $employee)
								<tr>
									<td>{{ $index + $employees->firstItem() }}</td>
									<td>{{ $employee->company->nama }}</td>
									<td>{{ $employee->nama }}</td>
									<td>{{ $employee->email }}</td>
									<td>
										<a href="{{ route('employees.edit', ['company' => $company, 'employee' => $employee]) }}" class="btn btn-sm btn-primary">Edit</a>
										<a href="{{ route('employees.destroy', ['company' => $company, 'employee' => $employee]) }}" onclick="deleteEmployees('#delete-{{$employee->id}}')">Hapus</a>

                                        <form action="{{ route('employees.destroy', ['company' => $company, 'employee' => $employee]) }}" method="POST" id="delete-{{$employee->id}}">
                                        @csrf
                                        @method('DELETE')
                                        </form>
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
	function deleteEmployees(id){
		event.preventDefault()
		if(confirm("Apakah Anda Yakin Ingin Mengapus")){
			document.querySelector(id).submit()
		}
	}
</script>
@endsection