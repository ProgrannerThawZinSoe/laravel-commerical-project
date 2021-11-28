@extends('layouts.app')

@section("title") Case Category Manager @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item active mb-3" aria-current="page">Contributor Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
            <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Controls</th>
            <th>Created_at</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($contributors as $key=>$contributor)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $contributor->name }}</td>
                <td>{{ $contributor->phone }}</td>
                <td>{{ $contributor->address }}</td>
                <td>
                    <a href="/dashboard/contributor/{{ $contributor->id }}/edit" class="btn btn-sm btn-outline-success">
                        Edit
                    </a>

                    <form action="/dashboard/contributor/{{ $contributor->id }}/delete" method="post" class="d-inline-block" >
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="return askConfirm({{ $contributor->id }})">Delete</button>
                    </form>
                </td>
                <td>
                    <span class="small">
                        <i class="feather-calendar"></i>
                        {{ $contributor->created_at->format("d-m-Y") }}
                    </span>
                    <br>
                    <span class="small">
                        <i class="feather-clock"></i>
                        {{ $contributor->created_at->format("h:i A") }}
                    </span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <script>
        const askConfirm = (id) => {
            Swal.fire({
                title: `Are you sure?`,
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'This Category has been deleted.',
                    'success'
                    )
                    setTimeout(function(){
                       $('#form'+id).submit();
                    }, 1500)
                }
            })
        }

    </script>
@endsection


