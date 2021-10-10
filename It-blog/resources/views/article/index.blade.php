@extends('layouts.app')

@section("title") Article Lists @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Article Lists</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-list"></i>
                        Article Lists
                    </h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ route('article.create') }}" class="btn btn-outline-primary">
                                <i class="feather-plus-circle"></i>
                                Create Article
                            </a>


                            @isset(request()->search)
                                <a href="{{ route('article.index') }}" class="text-decoration-none btn btn-outline-danger btn-sm ml-3">x</a>
                                <span class="">Search keyword : '{{ request()->search }}'</span>
                            @endisset
                        </div>

                        <form action="{{ route('article.index') }}" class="mb-4" method="GET">
                            <div class="form-inline">
                                <input type="text" class="form-control" placeholder="Search ..." value="{{ request()->search }}" name="search"  required>
                                <button class="btn btn-primary ml-3">
                                    <i class="feather-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    @if (session('message'))
                        <small class="text-success">{{ session('message') }}</small>
                    @endif

                    @if (session('delMessage'))
                        <small class="text-danger">{{ session('delMessage') }}</small>
                    @endif

                    <table class="table table-hover table-bordered">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Article</th>
                                <th>Category</th>
                                <th>Owner</th>
                                <th>Control</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>
                                        <span class="font-weight-bold">{{ Str::words($article->title, 5, '...') }}</span>
                                        <br>
                                        <small class="text-black-50">{{ Str::words($article->description, 10, '.....') }}</small>
                                    </td>
                                    <td class="text-nowrap">{{ $article->category->title }}</td>
                                    <td class="text-nowrap">{{ $article->user->name }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-outline-success">
                                            Show
                                        </a>

                                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">
                                            Edit
                                        </a>

                                        <form action="{{ route('article.destroy', $article->id) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <span class="small">
                                            <i class="feather-calendar"></i>
                                            {{ $article->created_at->format("d-m-Y") }}
                                        </span>
                                        <br>
                                        <span class="small">
                                            <i class="feather-clock"></i>
                                            {{ $article->created_at->format("h:i A") }}
                                        </span>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center fa-2x text-black-50">There is no article.</td>    
                                </tr>    
                            @endforelse
                        </tbody>

                    </table>

                    <div class="d-flex justify-content-between align-items-center">
                        {{ $articles->appends(request()->all())->links() }}
                        <h4 class="mb-0">Total : {{ $articles->total() }}</h4>
                    </div>
               </div>
            </div>
        </div>
    </div>
@endsection
