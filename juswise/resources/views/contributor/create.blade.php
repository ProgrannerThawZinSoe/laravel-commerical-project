@extends('layouts.app')

@section("title") Create Case @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="/dashboard/contributor">Contributor Account Lists</a></li>
        <li class="breadcrumb-item active mb-3" aria-current="page">Create Contributor Account
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle"></i>
                        Create Contributor Account
                    </h4>
               </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="card shadow mt-3"> 
                <div class="card-body case-card m-4">
                   <form  enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="parties">Contributor Name</label>
                            <input type="text" id="parties" class="form-control fs-5 @error('title')
                                is-invalid
                            @enderror" placeholder="Contributor Name" name="name" autocomplete="FALSE" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Password</label>
                            <input type="password" rows="6" class="form-control fs-5 @error('case_number')
                                is-invalid
                            @enderror" placeholder="Contributor Password" value="juswine@123456" name="password" required autocomplete="FALSE">
                            @error('case_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                     

                        <div class="form-group mb-4">
                            <label for="parties">Phone Number</label>
                            <input type="number" id="parties" class="form-control fs-5 @error('title')
                                is-invalid
                            @enderror" placeholder="Contributor Phoen Number" name="phone" autocomplete="FALSE" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Address</label>
                            <textarea rows="6" class="form-control fs-5 @error('case_number')
                                is-invalid
                            @enderror" placeholder="Contributor Address" name="address" required></textarea>
                            @error('case_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Create Contributor Account</button>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
