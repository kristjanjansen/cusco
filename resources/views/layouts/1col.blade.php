@extends('layouts.main')

@section('header', $header)

@section('content')

    <div class="container">

        <div class="row-center padding-topbottom-md">

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

@section('footer', $footer)


