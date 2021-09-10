@extends('layouts.app')

@section('content')
@if ($recipes->count())
@foreach ($recipes as $recipe)
<div>
    <div class="title">
        <h3>{{ $recipe->title }}</h3>
    </div>
    <div class="tags">
        @foreach ($recipe->category as $category)
            <span>{{ $category->category }}</span>
        @endforeach
    </div>
    <div class="tags">
        @foreach ($recipe->ingredient as $ingredient)
            <span>{{ $ingredient->name }}</span>
        @endforeach
    </div>
    <div class="body">
        <p>{{$recipe->description}}</p>
    </div>
    <div class="steps">
        <ol>
        @foreach(explode("\n",$recipe->steps) as $row)
            <li>{{ $row }}</li>
        @endforeach
        </ol>
    </div>
</div>
@endforeach
{{ $recipes->links() }}
@else
<span>No recipes yet!</span>
@endif

@endsection