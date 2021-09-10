@extends('layouts.app')

@section('content')
@if ($recipe)
<div>
    <div class="title">
        <h3>{{ $recipe->title }}</h3>
    </div>
    <div class="tags">
        @foreach ($recipe->category as $category)
            <span class="badge badge-pill badge-primary">{{ $category->category }}</span>
        @endforeach
    </div>
    <div class="tags">
        @foreach ($recipe->ingredient as $ingredient)
            <span class="badge badge-pill badge-light">{{ $ingredient->name }}</span>
        @endforeach
    </div>
    <div class="body">
        <p>{{$recipe->description}}</p>
    </div>
    <div class="steps">
        <ol>
        @foreach(explode("°",$recipe->steps) as $row)
            <li>{{ $row }}</li>
        @endforeach
        </ol>
    </div>
</div>
@else
<span>Oops, something went wrong.</span>
@endif

@endsection