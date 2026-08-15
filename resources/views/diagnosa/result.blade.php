<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .card { border: 1px solid #ddd; border-radius: 8px; padding: 15px; margin-bottom: 20px; }
        .badge { display: inline-block; background-color: #17a2b8; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; margin-right: 4px; }
        .btn { display: inline-block; background-color: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; }
        .btn:hover { background-color: #5a6268; }
    </style>
</head>
<body>

    <h2>Hasil Diagnosa Forward Chaining</h2>

    <!-- Section 1: Kesimpulan Penyakit -->
    <div class="card">
        <h3>Kesimpulan Klasifikasi / Penyakit:</h3>
        @if($result['penyakit']->count() > 0)
            <ul>
                @foreach($result['penyakit'] as $p)
                    <li>
                        <strong>[{{ $p->kode_penyakit }}] {{ $p->nama_penyakit }}</strong>
                    </li>
                @endforeach
            </ul>
        @else
            <p><em>Tidak ditemukan klasifikasi penyakit yang cocok berdasarkan data yang dipilih.</em></p>
        @endif
    </div>

    <!-- Section 2: Trace Alur Logika (Fired Rules) -->
    <div class="card">
        <h3>Penelusuran Aturan (Rule Trail / Rules Excecuted):</h3>
        @if(count($result['fired_rules']) > 0)
            <ol>
                @foreach($result['fired_rules'] as $ruleCode)
                    <li>Aturan <strong>{{ $ruleCode }}</strong> terpenuhi dan mengeksekusi kesimpulan baru.</li>
                @endforeach
            </ol>
        @else
            <p>Tidak ada aturan yang terpenuhi.</p>
        @endif

        <hr>

        <p><strong>Fakta dalam Working Memory Akhir:</strong></p>
        <div>
            @foreach($result['working_memory'] as $code)
                <span class="badge">{{ $code }}</span>
            @endforeach
        </div>
    </div>

    <a href="{{ route('diagnosa.index') }}" class="btn">← Kembalikan ke Form Diagnosa</a>

</body>
</html>