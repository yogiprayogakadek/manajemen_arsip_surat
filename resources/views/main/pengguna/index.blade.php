@extends('templates.master')

@section('page-title', 'Pengguna')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row render">
        {{-- data rendered --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/pengguna/main.js')}}"></script>
@endpush