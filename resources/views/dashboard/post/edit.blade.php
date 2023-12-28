@extends('dashboard.post.layout')

@section('content')

    <h1>Actualizar Post: {{ $post->title }}</h1>
    
    
    @include('dashboard.post.fragment._errors-form')
    
    <form action="{{ route('post.update', $post->id) }}" method="post"  enctype="multipart/form-data">
        
        @method('PATCH')
        @include('dashboard.post._form',["task" => "edit"])
        
    </form>
   
@endsection
