@extends('templates.master')

@section('page-title', 'Unit Kerja')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row render">
        {{-- data rendered --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/unit-kerja/main.js')}}"></script>
@endpush