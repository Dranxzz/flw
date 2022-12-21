@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
    <category
         create="{{ Auth::user()->can('category.create') }}"
         deletet="{{ Auth::user()->can('category.delete') }}"
         updated="{{ Auth::user()->can('category.updated') }}"
     />
</div>
@endsection