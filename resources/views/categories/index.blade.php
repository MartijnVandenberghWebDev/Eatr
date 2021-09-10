@extends('layouts.app')

@section('content')
@if (Auth::user() && Auth::user()->admin == 1)
<form class="form-inline" action="{{ route("categories") }}" method="post">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control mr-3" name="category" placeholder="Category name">
    </div>
    <button class="btn btn-primary form-control" type="submit">Add category</button>
</form>
@if ($categories->count())
<table class="table mt-4">
    <thead class="thead-light">
        <tr>
            <th>Category</th>
            <th>id</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->category }}</td>
            <td>{{ $category->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span>No categories yet!</span>
@endif
@endif

@endsection