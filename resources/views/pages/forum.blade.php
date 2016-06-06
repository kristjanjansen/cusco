@extends('layouts.main')

@section('header', $header)

@section('content')

    @foreach ($contents as $content)
        
        <div class="container margin-bottom-md">

            {!! $content !!}
                
        </div>

    @endforeach

@endsection

