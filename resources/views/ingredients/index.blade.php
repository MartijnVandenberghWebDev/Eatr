@extends('layouts.app')

@section('content')
    @auth     
        <form class="form-inline" action="{{ route("ingredients") }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control mr-3" name="ingredient" placeholder="Ingredient name">
            </div>
            <div class="form-group">
                <select name="category" class="form-control mr-3" id="ingredientSelector">
                    <option value="default">--Choose a category--</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary form-control" type="submit">Add Ingredient</button>
        </form>
    @endauth
        @if ($ingredients->count())
        <table class="table mt-4">
            <thead class="thead-light">
                <tr>
                    <th>Ingredient</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->ingredientCategory->category }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $ingredients->links() }}
        @else
        <span>No ingredients yet!</span>
        @endif

@endsection
