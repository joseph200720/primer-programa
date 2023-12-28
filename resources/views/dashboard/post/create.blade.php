@extends('dashboard\post.layout')

@section('content')

    <h1>Crear post</h1>
    
    @include('dashboard\post.fragment._errors-form')

     <form action="{{ route('post.store') }}" method="post">
        
        @include('dashboard\post._form')
       
     </form>


@endsection
