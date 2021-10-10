@extends('layouts.app')

@section("title") Category Manager @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Category Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-layers"></i>
                        Category Lists
                    </h4>
                    <hr>

                    <form action="{{ route('category.store') }}" class="mb-4" method="POST">
                        @csrf
                        <div class="form-inline">
                            <input type="text" name="title" class="form-control form-control-lg @error('title')
                                is-invalid
                            @enderror" placeholder="New Category" value="{{ old('title') }}" required>
                            <button class="btn btn-primary btn-lg ml-3">Add Category</button>
                        </div>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </form>

                    @if (session('message'))
                        <small class="text-success">{{ session('message') }}</small>
                    @endif

                    @if (session('delMessage'))
                        <small class="text-danger   ">{{ session('delMessage') }}</small>
                    @endif

                    @include('category.list')
               </div>
            </div>
        </div>
    </div>
@endsection
