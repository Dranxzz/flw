@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
    <order
         create="{{ Auth::user()->can('order.create') }}"
         deletet="{{ Auth::user()->can('order.delete') }}"
         updated="{{ Auth::user()->can('order.updated') }}"
     />
</div>
@endsection