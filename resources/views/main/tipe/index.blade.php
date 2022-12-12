@extends('templates.master')

@section('page-title', 'Tipe Surat')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row render">
        {{-- data rendered --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/tipe/main.js')}}"></script>
@endpush