@extends('ADMIN.layouts.main')

@section('title', 'Dashboard Admin')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#2994A4;">Home</a> 
    </p>
@endsection


@section('artikel')
    <div class="flex items-center justify-center h-full">
        <div class="text-center">
            <h1 class="text-2xl font-bold mb-4">SELAMAT DATANG</h1>
            <p class="text-lg">Anda Masuk Sebagai ADMIN</p>
        </div>
    </div>
@endsection
