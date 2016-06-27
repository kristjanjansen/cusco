@extends('layouts.main')

@section('header', $header)

@section('content')

    <div class="container">

        <div class="row-center">

            <div class="col-9">

                @foreach ($content->withoutLast() as $content_item)
                
                <div class="margin-bottom-md">

                    {!! $content_item !!}
                        
                </div>

                @endforeach

                <div>

                    {!! $content->last() !!}
                        
                </div>

            </div>

        </div>

    </div>

@endsection

