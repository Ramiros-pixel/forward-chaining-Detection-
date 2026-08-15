<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Diagnosa Forward Chaining</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .card { border: 1px solid #ddd; border-radius: 8px; padding: 15px; margin-bottom: 20px; }
        .alert-error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .checkbox-group { margin-bottom: 8px; }
        button { background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>

    <h2>Form Diagnosa MTBS / Balita Sakit</h2>

    <!-- Pesan Validasi Jika Belum Memilih Checkbox -->
    @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
    @endif
    @error('inputs')
        <div class="alert-error">{{ $message }}</div>
    @enderror

    <form action="{{ route('diagnosa.process') }}" method="POST">
        @csrf

        <!-- Keluhan Utama -->
        <div class="card">
            <h3>1. Pilih Keluhan Utama</h3>
            @foreach($keluhans as $keluhan)
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="inputs[]" value="{{ $keluhan->kode_keluhan }}">
                         {{ $keluhan->keluhan }}
                    </label>
                </div>
            @endforeach
        </div>

        <!-- Daftar Gejala -->
        <div class="card">
            <h3>2. Pilih Gejala yang Dialami</h3>
            @foreach($gejalas as $gejala)
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="inputs[]" value="{{ $gejala->kode_gejala }}">
                         {{ $gejala->nama_gejala }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit">Proses Diagnosa</button>
    </form>

</body>
</html>