@extends('layouts.app')

@section("title") Create Blog @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="/dashboard/blogs">Blogs Lists</a></li>
        <li class="breadcrumb-item active mb-3" aria-current="page"> Blog Details</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle"></i>
                        Create Blog
                    </h4>
                    <hr>

                    <form  id="createArticle" method="POST" enctype="multipart/form-data">
                        @csrf
                    </form>
               </div>
            </div>
        </div>


        @foreach($blogs as $blog)

     

        <div class="col-12 col-lg-12 my-3 my-lg-0">
            <div class="card">
                <div class="card-body">
                 
                    <div class="form-group">
                       <div class="form-group mb-3">
                           <label for="">Blog Title</label>
                           <input  type="text" class="form-control form-control-lg @error('title')
                               is-invalid
                           @enderror" form="createArticle" value="{{ $blog->title }}" readonly name="title" >
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                       </div>

                       <div class="form-group mb-3">
                           <label for="">Blog Category</label>
                           <input  type="text" class="form-control form-control-lg @error('title')
                               is-invalid
                           @enderror" form="createArticle"  value="{{ $blog->categories }}" readonly name="title" >
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                       </div>


                       <div class="form-group mb-3">
                          <img src="{{ asset('blog-images/'.$blog->feature_image) }}" style="width: 300px;height: 300px;" alt="">
                           
                       </div>

                       <div class="form-group">
                           <label for="">Blog Description</label>
                           <textarea  class="form-control fs-5 @error('description')
                               is-invalid
                           @enderror" rows="15" form="createArticle" name="description" readonly > {{ $blog->description }} </textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                       </div>

                       <div class="form-group mb-3">
                           <label for="">Read Time</label>
                           <input  type="text" class="form-control form-control-lg @error('title')
                               is-invalid
                           @enderror" form="createArticle" value="{{ $blog->read_time }}" readonly name="read" >
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                       </div>

                       
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        {{-- <div class="col-12 col-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                       <button class="btn btn-primary w-100" form="createArticle">Create Article</button>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
