@extends('layouts.main')

@section('content')

    @foreach($components as $component)

        <div class="container">

            <div style="
                height: 100px;
                font-family: monospace;
                display: flex;
                align-items: center;
                color: #777;
            ">
                            
                {{ $component->name }}
            
            </div>
        
        </div>        
        
        <div class="{{ $component->nocontainer or 'container' }}">

            {!! component($component->name, [$component->with]) !!}
                
        </div>

        @foreach($component->is as $is)
        
        <div class="container">

            <div style="
                height: 100px;
                font-family: monospace;
                display: flex;
                align-items: center;
                color: #777;
            ">
                            
                {{ $component->name }}
                {{ component($component->name)->is($is)->generateIsClasses() }}

            </div> 
        
        </div>        
        
        <div class="{{ $component->nocontainer or 'container' }}">

            {!! component($component->name, [$component->with])->is($is) !!}
                
        </div>

        @endforeach

    @endforeach

@endsection

