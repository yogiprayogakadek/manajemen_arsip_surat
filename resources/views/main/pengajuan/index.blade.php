@extends('templates.master')

@section('page-title', 'Pengajuan')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row render">
        {{-- data rendered --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/pengajuan/main.js')}}"></script>
@endpush