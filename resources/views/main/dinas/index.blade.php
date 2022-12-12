@extends('templates.master')

@section('page-title', 'Dinas')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row render">
        {{-- data rendered --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/dinas/main.js')}}"></script>
@endpush