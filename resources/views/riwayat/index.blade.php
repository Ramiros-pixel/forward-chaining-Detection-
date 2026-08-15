@extends('layouts.app')

@section('title', 'Riwayat Diagnosa')
@section('nav_riwayat', 'active')

@section('styles')
    <style>
        .riwayat-card {
            background-color: var(--white);
            border: 1px solid var(--green-200);
            border-radius: var(--radius-md);
            margin-bottom: 16px;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: box-shadow var(--transition), transform var(--transition);
        }

        .riwayat-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .riwayat-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            background-color: var(--green-50);
            border-bottom: 1px solid var(--green-200);
            flex-wrap: wrap;
            gap: 10px;
        }

        .riwayat-card-meta {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .riwayat-number {
            width: 32px;
            height: 32px;
            background-color: var(--green-800);
            color: var(--white);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 800;
            flex-shrink: 0;
        }

        .riwayat-date {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--green-900);
        }

        .riwayat-time {
            font-size: 0.75rem;
            color: var(--gray-500);
            display: block;
        }

        .riwayat-stats {
            display: flex;
            gap: 8px;
        }

        .riwayat-card-body {
            padding: 18px 20px;
        }

        .riwayat-section {
            margin-bottom: 14px;
        }

        .riwayat-section:last-child {
            margin-bottom: 0;
        }

        .riwayat-section-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--gray-500);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .riwayat-section-label svg {
            width: 14px;
            height: 14px;
            fill: var(--gray-400);
        }

        .chip-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .chip {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .chip-gejala {
            background-color: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }

        .chip-penyakit {
            background-color: var(--green-100);
            color: var(--green-900);
            border: 1px solid var(--green-300);
        }

        .chip-rule {
            background-color: #E3F2FD;
            color: #1565C0;
            border: 1px solid #BBDEFB;
        }

        .chip-more {
            background-color: var(--gray-200);
            color: var(--gray-600);
            border: 1px solid var(--gray-300);
            font-style: italic;
        }

        .empty-state {
            text-align: center;
            padding: 60px 24px;
            color: var(--gray-400);
        }

        .empty-state svg {
            width: 64px;
            height: 64px;
            fill: var(--gray-300);
            margin: 0 auto 16px;
            display: block;
        }

        .empty-state h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gray-500);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 0.875rem;
            margin-bottom: 20px;
        }

        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 24px;
            gap: 8px;
            flex-wrap: wrap;
        }

        .pagination-wrapper .page-item {
            display: inline-block;
        }

        .pagination-wrapper .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            border: 1px solid var(--green-300);
            border-radius: var(--radius-sm);
            color: var(--green-800);
            font-size: 0.875rem;
            font-weight: 600;
            transition: all var(--transition);
            background-color: var(--white);
        }

        .pagination-wrapper .page-link:hover {
            background-color: var(--green-100);
            border-color: var(--green-500);
        }

        .pagination-wrapper .page-link.active,
        .pagination-wrapper .page-item.active .page-link {
            background-color: var(--green-800);
            color: var(--white);
            border-color: var(--green-800);
        }

        .pagination-wrapper .page-item.disabled .page-link {
            color: var(--gray-400);
            border-color: var(--gray-200);
            cursor: not-allowed;
            pointer-events: none;
        }

        .stats-bar {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .stat-box {
            background-color: var(--white);
            border: 1px solid var(--green-200);
            border-radius: var(--radius-md);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
            min-width: 160px;
            box-shadow: var(--shadow-sm);
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            background-color: var(--green-100);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon svg {
            width: 20px;
            height: 20px;
            fill: var(--green-800);
        }

        .stat-value {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--green-900);
            line-height: 1;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--gray-500);
            margin-top: 2px;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        {{-- Page Header --}}
        <div class="page-header">
            <div class="page-header-badge">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z" />
                </svg>
                Riwayat Saya
            </div>
            <h1>Riwayat Diagnosa Anda</h1>
            <p>Daftar semua diagnosa yang pernah Anda lakukan. Data bersifat pribadi dan hanya dapat dilihat oleh Anda.</p>
        </div>

        {{-- Stats Bar --}}
        <div class="stats-bar">
            <div class="stat-box">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z" />
                    </svg>
                </div>
                <div>
                    <div class="stat-value">{{ $riwayat->total() }}</div>
                    <div class="stat-label">Total Diagnosa</div>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z" />
                    </svg>
                </div>
                <div>
                    <div class="stat-value">{{ $riwayat->currentPage() }}</div>
                    <div class="stat-label">Halaman Saat Ini</div>
                </div>
            </div>
            <a href="{{ route('diagnosa.index') }}" class="btn btn-primary" style="align-self:center; margin-left:auto;">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                </svg>
                Diagnosa Baru
            </a>
        </div>

        {{-- Riwayat List --}}
        @if ($riwayat->count() > 0)
            @php $no = ($riwayat->currentPage() - 1) * $riwayat->perPage(); @endphp
            @foreach ($riwayat as $item)
                @php $no++; @endphp
                <div class="riwayat-card">
                    <div class="riwayat-card-header">
                        <div class="riwayat-card-meta">
                            <div class="riwayat-number">{{ $no }}</div>
                            <div>
                                <div class="riwayat-date">{{ $item->created_at->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                </div>
                                <span class="riwayat-time">{{ $item->created_at->format('H:i') }} WIB</span>
                            </div>
                        </div>
                        <div class="riwayat-stats">
                            <span class="badge badge-green">
                                {{ count($item->penyakit_terdeteksi) }} penyakit
                            </span>
                            <span class="badge badge-blue">
                                {{ count($item->gejala_dipilih) }} gejala
                            </span>
                            <span class="badge badge-gray">
                                {{ count($item->fired_rules) }} rules
                            </span>
                        </div>
                    </div>

                    <div class="riwayat-card-body">

                        {{-- Penyakit Terdeteksi --}}
                        <div class="riwayat-section">
                            <div class="riwayat-section-label">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                </svg>
                                Klasifikasi Penyakit
                            </div>
                            <div class="chip-list">
                                @if (count($item->penyakit_terdeteksi) > 0)
                                    @foreach ($item->penyakit_terdeteksi as $penyakit)
                                        <span class="chip chip-penyakit">{{ $penyakit }}</span>
                                    @endforeach
                                @else
                                    <span class="chip chip-more">Tidak ada penyakit terdeteksi</span>
                                @endif
                            </div>
                        </div>

                        {{-- Gejala Dipilih --}}
                        <div class="riwayat-section">
                            <div class="riwayat-section-label">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14l-5-5 1.41-1.41L12 14.17l7.59-7.59L21 8l-9 9z" />
                                </svg>
                                Gejala & Keluhan Dipilih
                            </div>
                            <div class="chip-list">
                                @foreach (array_slice($item->gejala_dipilih, 0, 10) as $kode)
                                    @php
                                        $nama = $gejalaDict[$kode] ?? '';
                                        $displayText = $nama ? "{$kode} - {$nama}" : $kode;
                                    @endphp
                                    <span class="chip chip-gejala">{{ $displayText }}</span>
                                @endforeach
                                @if (count($item->gejala_dipilih) > 10)
                                    <span class="chip chip-more">+{{ count($item->gejala_dipilih) - 10 }} lainnya</span>
                                @endif
                            </div>
                        </div>

                        {{-- Fired Rules --}}
                        {{-- @if (count($item->fired_rules) > 0)
                            <div class="riwayat-section">
                                <div class="riwayat-section-label">
                                    <svg viewBox="0 0 24 24">
                                        <path
                                            d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z" />
                                    </svg>
                                    Rules Terpenuhi
                                </div>
                                <div class="chip-list" style="flex-direction: column;">
                                    @foreach ($item->fired_rules as $rule)
                                        @php
                                            $ruleDesc = $ruleDict[$rule] ?? '';
                                            $displayText = $ruleDesc ? "{$rule} : {$ruleDesc}" : $rule;
                                        @endphp
                                        <span class="chip chip-rule" style="white-space: normal; text-align: left;">{{ $displayText }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif --}}

                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            @if ($riwayat->hasPages())
                <div class="pagination-wrapper">
                    {{-- Previous --}}
                    @if ($riwayat->onFirstPage())
                        <span class="page-item disabled"><span class="page-link">&#8592;</span></span>
                    @else
                        <a href="{{ $riwayat->previousPageUrl() }}" class="page-link">&#8592;</a>
                    @endif

                    {{-- Page Numbers --}}
                    @for ($i = 1; $i <= $riwayat->lastPage(); $i++)
                        @if ($i == $riwayat->currentPage())
                            <span class="page-link active">{{ $i }}</span>
                        @else
                            <a href="{{ $riwayat->url($i) }}" class="page-link">{{ $i }}</a>
                        @endif
                    @endfor

                    {{-- Next --}}
                    @if ($riwayat->hasMorePages())
                        <a href="{{ $riwayat->nextPageUrl() }}" class="page-link">&#8594;</a>
                    @else
                        <span class="page-item disabled"><span class="page-link">&#8594;</span></span>
                    @endif
                </div>
            @endif
        @else
            {{-- Empty State --}}
            <div class="card">
                <div class="empty-state">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z" />
                    </svg>
                    <h3>Belum Ada Riwayat Diagnosa</h3>
                    <p>Anda belum pernah melakukan diagnosa. Mulai diagnosa pertama Anda sekarang!</p>
                    <a href="{{ route('diagnosa.index') }}" class="btn btn-primary">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                        </svg>
                        Mulai Diagnosa
                    </a>
                </div>
            </div>
        @endif

    </div>
@endsection
