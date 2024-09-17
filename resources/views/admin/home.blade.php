@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-recent-orders-component />
            <x-top-selling-products />
        </div>
    </div>
@endsection
