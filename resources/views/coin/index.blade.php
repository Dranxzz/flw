@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
    <coin
         create="{{ Auth::user()->can('coin.create') }}"
         deletet="{{ Auth::user()->can('coin.delete') }}"
         updated="{{ Auth::user()->can('coin.updated') }}"
     />
</div>
@endsection