<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Controls</th>
            <th>Created_at</th>
        </tr>
    </thead>

    <tbody>
        @foreach (App\Category::with('user')->get() as $key=>$category)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->user->name }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-success">
                        Edit
                    </a>

                    <form action="{{ route('category.destroy', $category->id) }}" method="post" class="d-inline-block" id="form{{ $category->id }}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="return askConfirm({{ $category->id }})">Delete</button>
                    </form>
                </td>
                <td>
                    <span class="small">
                        <i class="feather-calendar"></i>
                        {{ $category->created_at->format("d-m-Y") }}
                    </span>
                    <br>
                    <span class="small">
                        <i class="feather-clock"></i>
                        {{ $category->created_at->format("h:i A") }}
                    </span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>