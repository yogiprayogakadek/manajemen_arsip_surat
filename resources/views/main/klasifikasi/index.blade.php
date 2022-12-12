@extends('templates.master')

@section('page-title', 'Klasifikasi Surat')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row render">
        {{-- data rendered --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/klasifikasi/main.js')}}"></script>
@endpush