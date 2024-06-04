@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kalender Pemesanan</h1>
    <div id="calendar"></div>
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush
