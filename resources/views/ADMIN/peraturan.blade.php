@extends('ADMIN.layouts.main')
@section('title', 'Peraturan')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="{{ route('admin.peraturan') }}" style="text-decoration:none; color:#2994A4;">
            Peraturan
        </a>
    </p>
@endsection



@section('artikel')
    <div class="container">

        {{-- ===== ITEM 1 ===== --}}
        <h5 style="color:#555; margin-bottom:20px;">Peraturan untuk item : Penawaran Pensiun</h5>
        @if ($data1->isNotEmpty())
            @foreach ($data1 as $item)
                @include('ADMIN.partials.peraturan_form', ['item' => $item])
            @endforeach
        @else
            @include('ADMIN.partials.peraturan_form', [
                'item' => null,
                'skepentingan' => 'Penawaran Pensiun',
            ])
        @endif
        <hr>

        {{-- ===== ITEM 2 ===== --}}
        <h5 style="color:#555; margin-bottom:20px;">Peraturan untuk item : SKNormalMengingat1</h5>
        @if ($data2->isNotEmpty())
            @foreach ($data2 as $item)
                @include('ADMIN.partials.peraturan_form', ['item' => $item])
            @endforeach
        @else
            @include('ADMIN.partials.peraturan_form', [
                'item' => null,
                'skepentingan' => 'SKNormalMengingat1',
            ])
        @endif
        <hr>

        {{-- ===== ITEM 3 ===== --}}
        <h5 style="color:#555; margin-bottom:20px;">Peraturan untuk item : SKNormalMengingat2</h5>
        @if ($data3->isNotEmpty())
            @foreach ($data3 as $item)
                @include('ADMIN.partials.peraturan_form', ['item' => $item])
            @endforeach
        @else
            @include('ADMIN.partials.peraturan_form', [
                'item' => null,
                'skepentingan' => 'SKNormalMengingat2',
            ])
        @endif

        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

    </div>
@endsection
