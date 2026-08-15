@extends('layouts.app')

@section('title', 'Form Diagnosa')
@section('nav_diagnosa', 'active')

@section('styles')
<style>
    .diagnosa-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    @media (max-width: 768px) {
        .diagnosa-grid { grid-template-columns: 1fr; }
    }

    .gejala-search {
        position: relative;
        margin-bottom: 14px;
    }
    .gejala-search input {
        width: 100%;
        padding: 10px 14px 10px 40px;
        border: 1px solid var(--gray-300);
        border-radius: var(--radius-sm);
        font-family: 'Nunito', sans-serif;
        font-size: 0.875rem;
        background-color: var(--gray-50);
        color: var(--gray-800);
        transition: border-color var(--transition);
        outline: none;
    }
    .gejala-search input:focus {
        border-color: var(--green-500);
        background-color: var(--white);
    }
    .gejala-search .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        width: 16px;
        height: 16px;
        color: var(--gray-400);
        pointer-events: none;
    }

    .selected-count {
        background-color: var(--green-700);
        color: var(--white);
        border-radius: 20px;
        padding: 2px 8px;
        font-size: 0.75rem;
        font-weight: 700;
        min-width: 22px;
        text-align: center;
        display: inline-block;
    }

    .sticky-action {
        position: sticky;
        bottom: 0;
        background-color: var(--white);
        border-top: 2px solid var(--green-100);
        padding: 16px 24px;
        margin: 0 -24px -24px -24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        border-radius: 0 0 var(--radius-md) var(--radius-md);
    }
    .sticky-action-info {
        font-size: 0.85rem;
        color: var(--gray-500);
    }
    .sticky-action-info strong {
        color: var(--green-800);
        font-weight: 700;
    }

    .empty-gejala {
        text-align: center;
        padding: 24px;
        color: var(--gray-400);
        font-size: 0.875rem;
        display: none;
    }
    .empty-gejala svg {
        width: 40px;
        height: 40px;
        margin: 0 auto 8px;
        fill: var(--gray-300);
        display: block;
    }

    .section-number {
        width: 26px;
        height: 26px;
        background-color: var(--green-800);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 800;
        flex-shrink: 0;
    }
</style>
@endsection

@section('content')
<div class="container">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-header-badge">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
            Forward Chaining Engine
        </div>
        <h1>Form Diagnosa MTBS / Balita Sakit</h1>
        <p>Pilih keluhan dan gejala yang dialami balita, lalu klik "Proses Diagnosa" untuk melihat hasil klasifikasi penyakit.</p>
    </div>

    {{-- Validation Error --}}
    @if(session('error'))
        <div class="alert alert-error">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
            {{ session('error') }}
        </div>
    @endif
    @error('inputs')
        <div class="alert alert-error">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
            {{ $message }}
        </div>
    @enderror

    <form action="{{ route('diagnosa.process') }}" method="POST" id="diagnosaForm">
        @csrf

        <div class="diagnosa-grid">

            {{-- Section 1: Keluhan Utama --}}
            <div class="card">
                <div class="card-header">
                    <div class="section-number">1</div>
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 0 20A10 10 0 0 0 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                    </div>
                    <div>
                        <div class="card-title">Keluhan Utama</div>
                        <div class="card-subtitle">Pilih keluhan utama yang dirasakan</div>
                    </div>
                    <span class="selected-count" id="countKeluhan">0</span>
                </div>

                <div id="keluhanList">
                    @foreach($keluhans as $keluhan)
                        <label class="checkbox-item">
                            <input type="checkbox"
                                   name="inputs[]"
                                   value="{{ $keluhan->kode_keluhan }}"
                                   class="cb-keluhan"
                                   id="keluhan_{{ $keluhan->kode_keluhan }}">
                            <label for="keluhan_{{ $keluhan->kode_keluhan }}">{{ $keluhan->keluhan }}</label>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Section 2: Gejala --}}
            <div class="card">
                <div class="card-header">
                    <div class="section-number">2</div>
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14l-5-5 1.41-1.41L12 14.17l7.59-7.59L21 8l-9 9z"/></svg>
                    </div>
                    <div>
                        <div class="card-title">Gejala yang Dialami</div>
                        <div class="card-subtitle">Pilih semua gejala yang tampak</div>
                    </div>
                    <span class="selected-count" id="countGejala">0</span>
                </div>

                <div class="gejala-search">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    <input type="text" id="searchGejala" placeholder="Cari gejala...">
                </div>

                <div id="gejalaList">
                    @foreach($gejalas as $gejala)
                        <label class="checkbox-item gejala-item">
                            <input type="checkbox"
                                   name="inputs[]"
                                   value="{{ $gejala->kode_gejala }}"
                                   class="cb-gejala"
                                   id="gejala_{{ $gejala->kode_gejala }}"
                                   data-label="{{ strtolower($gejala->nama_gejala) }}">
                            <label for="gejala_{{ $gejala->kode_gejala }}">{{ $gejala->nama_gejala }}</label>
                        </label>
                    @endforeach
                </div>

                <div class="empty-gejala" id="emptyGejala">
                    <svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    Tidak ditemukan gejala yang cocok
                </div>

                {{-- Sticky Submit Button --}}
                <div class="sticky-action">
                    <div class="sticky-action-info">
                        Total dipilih: <strong id="totalSelected">0</strong> item
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M9.5 6.5v3h-3v2h3v3h2v-3h3v-2h-3v-3h-2zM11 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-8-4z"/></svg>
                        Proses Diagnosa
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    const cbKeluhan    = document.querySelectorAll('.cb-keluhan');
    const cbGejala     = document.querySelectorAll('.cb-gejala');
    const countKeluhan = document.getElementById('countKeluhan');
    const countGejala  = document.getElementById('countGejala');
    const totalSelected = document.getElementById('totalSelected');
    const searchInput  = document.getElementById('searchGejala');
    const gejalaItems  = document.querySelectorAll('.gejala-item');
    const emptyGejala  = document.getElementById('emptyGejala');

    function updateCounts() {
        const k = document.querySelectorAll('.cb-keluhan:checked').length;
        const g = document.querySelectorAll('.cb-gejala:checked').length;
        countKeluhan.textContent = k;
        countGejala.textContent  = g;
        totalSelected.textContent = (k + g);
    }

    cbKeluhan.forEach(cb => cb.addEventListener('change', updateCounts));
    cbGejala.forEach(cb  => cb.addEventListener('change', updateCounts));

    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        let visibleCount = 0;
        gejalaItems.forEach(item => {
            const label = item.querySelector('input').dataset.label || '';
            if (!query || label.includes(query)) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        emptyGejala.style.display = (visibleCount === 0) ? 'block' : 'none';
    });
</script>
@endsection