<form action="{{ $action }}" method="POST" accept-charset="utf-8">

    <input name="_method" type="hidden" value="{{ $method }}">
    
    {{ csrf_field() }}


