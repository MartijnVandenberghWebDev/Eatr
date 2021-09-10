@extends('layouts.app')

@section('content')
<form action="{{ route("recipes.store") }}" method="post">
    @csrf

    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Recipe title" class="form-control mb-4">

    <label for="description">Description</label>
    <input type="text" name="description" placeholder="Recipe description" class="form-control mb-4">

    <label for="category">Categories</label>
    <div class="d-flex justify-content-between form-control mb-4">
        @foreach ($categories as $category)
        <div class="categoryCheckbox mr-4">
            <input type="checkbox" class="mr-2" name="category"
                value="{{$category->id}}"><span>{{$category->category}}</span>
        </div>
        @endforeach
    </div>

    <div class="mb-2">
        <label for="ingredient">Ingredients</label>
        <div class="d-flex">
            @foreach ($ingredients as $ingredientGroup)
            <div class="dropdown mr-2">
                <button class="btn btn-secondary dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{$ingredientGroup[0]->ingredientCategory->category}}
                </button>
                <div class="dropdown-menu ingredientDropdown" id="ingredientDropdown" aria-labelledby="dropdownMenuButton">
                    @foreach ($ingredientGroup as $ingredient)
                    <label class="dropdown-item m-0" id="ingredientInList"><input type="checkbox"
                            name="ingredients" value="{{$ingredient->id}}"
                            class="mr-1">{{$ingredient->name}}</label>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="mt-4 mb-4">
        <label for="steps">Steps (up to 10)</label>
        <ol id="stepList" hidden>
        </ol>
        <textarea name="step" id="stepText" placeholder="Directions" class="form-control mb-2"
            style="resize: none"></textarea>
        <div class="btn btn-success" id="stepBtn">Add step</div>
    </div>

    <button type="submit" class="btn btn-primary form-control mb-4">Add recipe</button>
</form>
<script src="/js/addStep.js"></script>
@endsection