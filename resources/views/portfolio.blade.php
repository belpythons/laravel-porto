<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            padding: 20px;
        }

        .wrap {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            margin-bottom: 15px;
        }

        h2 {
            margin-top: 25px;
        }

        ul {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <h1>Portofolio</h1>

        <h2>Profil</h2>
        <p><strong>Nama:</strong> {{ $profile['nama'] }}</p>
        <p><strong>NIM:</strong> {{ $profile['nim'] }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $profile['jenis_kelamin'] }}</p>
        <p><strong>Alamat:</strong> {{ $profile['alamat'] }}</p>

        <h2>Pengalaman</h2>
        <ul>
            @foreach ($portfolio['pengalaman'] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>

        <h2>Prestasi</h2>
        <ul>
            @foreach ($portfolio['prestasi'] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>

        <h2>Pengalaman Kerja</h2>
        <ul>
            @foreach ($portfolio['pengalaman_kerja'] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</body>

</html>
