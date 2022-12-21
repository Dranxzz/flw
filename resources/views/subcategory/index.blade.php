@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
    <subcategory
         create="{{ Auth::user()->can('subcategory.create') }}"
         deletet="{{ Auth::user()->can('subcategory.delete') }}"
         updated="{{ Auth::user()->can('subcategory.updated') }}"
     />
</div>
@endsection