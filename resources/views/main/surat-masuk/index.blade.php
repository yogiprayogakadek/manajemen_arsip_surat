@extends('templates.master')

@section('page-title', 'Surat Masuk')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row render">
        {{-- data rendered --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/surat-masuk/main.js')}}"></script>
@endpush