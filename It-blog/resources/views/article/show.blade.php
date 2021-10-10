@extends('layouts.app')

@section("title") {{ $article->title }} @endsection

@section('head')
    <style>
        .description{
            white-space: pre-line;
        }
    </style>
@endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article Lists</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-lg-7">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        {{ $article->title }}
                    </h4>
                    
                    <div class="mt-2 mb-1 d-flex justify-content-between text-secondary">
                        <div>
                            <span class="small">
                                <i class="feather-calendar"></i>
                                {{ $article->created_at->format("d-m-Y") }}
                            </span>
                        
                            <span class="small">
                                <i class="feather-clock"></i>
                                {{ $article->created_at->format("h:i A") }}
                            </span>
                        </div>
                        <div>
                            <i class="feather-layer"></i>
                            <td class="text-nowrap">{{ $article->category->title }}</td>
                        </div>
                    </div>

                    <p class="mb-0 description">
                        {{ $article->description }}
                    </p>
                    <hr>

                    <div class="d-flex justify-content-between"> 
                        <div>
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>

                            <form action="{{ route('article.destroy', $article->id) }}" method="post" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>

                        <p class="mb-0">{{ $article->created_at->diffForHumans() }}</p>
                    </div>
               </div>
            </div>
        </div>
    </div>
@endsection
