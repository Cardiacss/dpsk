@extends('ADMIN.layouts.main')
@section('title', 'Otorisasi')

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
        Home
    </a> /
    <a href="{{ route('admin.otorisasi') }}" style="text-decoration:none; color:#2994A4;">
    Otorisasi
</a>

</p>
@endsection


@section('artikel')
<div class="container">

    {{-- ===== ITEM 1 : DIREKTUR UTAMA ===== --}}
    <h5 style="color:#555; margin-bottom:20px;">Otorisasi untuk item : Direktur Utama</h5>

    @if ($direkturUtama->isNotEmpty())
        @foreach ($direkturUtama as $item)
            @include('ADMIN.partials.otorisasi_form', ['item' => $item])
        @endforeach
    @else
        @include('ADMIN.partials.otorisasi_form', [
            'item' => null,
            'jabatan' => 'Direktur Utama',
        ])
    @endif

    <hr>

    {{-- ===== ITEM 2 : DIREKTUR ===== --}}
    <h5 style="color:#555; margin-bottom:20px;">Otorisasi untuk item : Direktur</h5>

    @if ($direktur->isNotEmpty())
        @foreach ($direktur as $item)
            @include('ADMIN.partials.otorisasi_form', ['item' => $item])
        @endforeach
    @else
        @include('ADMIN.partials.otorisasi_form', [
            'item' => null,
            'jabatan' => 'Direktur',
        ])
    @endif

    @if (session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

</div>