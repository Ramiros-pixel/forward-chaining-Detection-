@extends('layouts.app')

@section('title', 'Hasil Diagnosa')
@section('nav_diagnosa', 'active')

@section('styles')
<style>
    .result-hero {
        background-color: var(--white);
        border: 2px solid var(--green-200);
        border-radius: var(--radius-lg);
        padding: 28px 30px;
        margin-bottom: 20px;
        box-shadow: var(--shadow-sm);
    }
    .result-hero-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 20px;
    }
    .result-hero-icon {
        width: 54px;
        height: 54px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .result-hero-icon.found {
        background-color: var(--green-100);
        border: 2px solid var(--green-300);
    }
    .result-hero-icon.not-found {
        background-color: var(--amber-100);
        border: 2px solid #FFE082;
    }
    .result-hero-icon svg {
        width: 28px;
        height: 28px;
    }
    .result-hero-icon.found svg { fill: var(--green-800); }
    .result-hero-icon.not-found svg { fill: #E65100; }

    .result-hero-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--green-900);
    }
    .result-hero-sub {
        font-size: 0.85rem;
        color: var(--gray-500);
        margin-top: 2px;
    }

    .penyakit-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .penyakit-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background-color: var(--green-50);
        border: 1px solid var(--green-200);
        border-left: 4px solid var(--green-600);
        border-radius: var(--radius-sm);
        padding: 12px 16px;
    }
    .penyakit-item .penyakit-bullet {
        width: 10px;
        height: 10px;
        background-color: var(--green-600);
        border-radius: 50%;
        flex-shrink: 0;
    }
    .penyakit-item .penyakit-name {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--green-900);
    }
    .penyakit-item .penyakit-badge {
        margin-left: auto;
    }

    .rule-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid var(--green-100);
    }
    .rule-item:last-child { border-bottom: none; }
    .rule-number {
        width: 24px;
        height: 24px;
        background-color: var(--green-800);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: 700;
        flex-shrink: 0;
    }
    .rule-text {
        font-size: 0.875rem;
        color: var(--gray-700);
        padding-top: 3px;
    }
    .rule-text strong { color: var(--green-800); }

    .memory-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
    }
    .memory-chip {
        background-color: var(--green-100);
        color: var(--green-900);
        border: 1px solid var(--green-300);
        border-radius: 20px;
        padding: 5px 12px;
        font-size: 0.8rem;
        font-weight: 700;
        font-family: 'Nunito', monospace;
    }

    .not-found-box {
        background-color: var(--amber-100);
        border: 1px solid #FFE082;
        border-radius: var(--radius-sm);
        padding: 16px;
        text-align: center;
        color: #5D4037;
        font-size: 0.9rem;
    }
    .not-found-box svg {
        width: 36px;
        height: 36px;
        fill: #FFB300;
        margin: 0 auto 8px;
        display: block;
    }

    .action-bar {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 24px;
    }
</style>
@endsection

@section('content')
<div class="container">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-header-badge">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
            Hasil Analisis
        </div>
        <h1>Hasil Diagnosa Forward Chaining</h1>
        <p>Berikut adalah hasil klasifikasi penyakit berdasarkan gejala dan keluhan yang Anda pilih.</p>
    </div>

    {{-- Section 1: Kesimpulan Penyakit --}}
    <div class="result-hero">
        <div class="result-hero-header">
            @if($result['penyakit']->count() > 0)
                <div class="result-hero-icon found">
                    <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                </div>
                <div>
                    <div class="result-hero-title">Klasifikasi Penyakit Terdeteksi</div>
                    <div class="result-hero-sub">{{ $result['penyakit']->count() }} penyakit ditemukan berdasarkan gejala yang dipilih</div>
                </div>
            @else
                <div class="result-hero-icon not-found">
                    <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                </div>
                <div>
                    <div class="result-hero-title">Tidak Ada Klasifikasi Ditemukan</div>
                    <div class="result-hero-sub">Tidak ada pola yang cocok dengan data gejala yang dipilih</div>
                </div>
            @endif
        </div>

        @if($result['penyakit']->count() > 0)
            <div class="penyakit-list">
                @foreach($result['penyakit'] as $p)
                    <div class="penyakit-item">
                        <div class="penyakit-bullet"></div>
                        <span class="penyakit-name">{{ $p->nama_penyakit }}</span>
                        <span class="badge badge-green penyakit-badge">{{ $p->kode_penyakit }}</span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="not-found-box">
                <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                <strong>Tidak ditemukan klasifikasi penyakit yang cocok.</strong><br>
                Coba pilih lebih banyak gejala atau konsultasikan ke tenaga medis.
            </div>
        @endif
    </div>

    {{-- Section 2: Trace Alur Logika (Fired Rules) --}}
    <div class="card">
        <div class="card-header">
            <div class="card-icon">
                <svg viewBox="0 0 24 24"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg>
            </div>
            <div>
                <div class="card-title">Penelusuran Aturan (Rule Trail)</div>
                <div class="card-subtitle">Rules yang terpenuhi dan dieksekusi oleh mesin forward chaining</div>
            </div>
            @if(count($result['fired_rules']) > 0)
                <span class="badge badge-blue">{{ count($result['fired_rules']) }} rules</span>
            @endif
        </div>

        @if(count($result['fired_rules']) > 0)
            @foreach($result['fired_rules'] as $index => $ruleCode)
                <div class="rule-item">
                    <div class="rule-number">{{ $index + 1 }}</div>
                    <div class="rule-text">
                        Aturan <strong>{{ $ruleCode }}</strong> terpenuhi dan mengeksekusi kesimpulan baru ke working memory.
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">Tidak ada aturan yang terpenuhi dengan gejala yang dipilih.</p>
        @endif

        <hr class="divider">

        <div class="d-flex align-center gap-2 mb-2">
            <div class="card-icon" style="width:32px;height:32px;">
                <svg viewBox="0 0 24 24" style="width:16px;height:16px;"><path d="M20 6h-2.18c.07-.44.18-.88.18-1.34C18 2.1 15.9 0 13.34 0c-1.38 0-2.62.55-3.54 1.44L9 2.2 8.2 1.44C7.28.55 6.04 0 4.66 0 2.1 0 0 2.1 0 4.66c0 .46.11.9.18 1.34H0L6 12H0l6 6h7.17l5.66-5.66-1.41-1.41-5.12 5.12H7.83L3.41 12H9l-6-6h10l6 6h-5.5l1.41 1.41L20.59 8 20 6z"/></svg>
            </div>
            <strong style="font-size:0.875rem;color:var(--green-900)">Fakta dalam Working Memory Akhir:</strong>
            <span class="badge badge-gray">{{ count($result['working_memory']) }} fakta</span>
        </div>

        <div class="memory-grid">
            @foreach($result['working_memory'] as $code)
                <span class="memory-chip">{{ $code }}</span>
            @endforeach
        </div>
    </div>

    {{-- Action Bar --}}
    <div class="action-bar">
        <a href="{{ route('diagnosa.index') }}" class="btn btn-primary">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            Diagnosa Baru
        </a>
        <a href="{{ route('riwayat.index') }}" class="btn btn-secondary">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>
            Lihat Riwayat
        </a>
    </div>

</div>
@endsection