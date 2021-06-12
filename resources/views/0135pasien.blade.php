<head>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pasien</title>
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        thead {
            background-color: #f2f2f2;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        .tambah {
            padding: 8px 16px;
            text-decoration: none;
        }

    </style>
</head>

<body>
    @extends('layout.header')
    @section('konten')
        <div class="container" align="center" style="position: relative; width=800px">
            <h1>Cari Data Pasien</h1>
            <form action="/pasien/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari Nama .." value="{{ old('cari') }}">
                <input type="submit" value="CARI">
            </form>
            <br>
            <div class="card-header"><a href="{{route('exportpasien')}}" class="btn btn-success">Export</a></div>
            <table class=" table" style="width: 600px">
            <thead class="table">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasien as $pasien)
                    <tr>
                        <td>{{ $pasien->id }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>
                        <a href="{{url('pasien/'.$pasien->id."/edit")}}">
                            <button type="submit">Edit</button>
                        </a>
                        <form action="{{url('pasien/'.$pasien->id)}}" method="post" >
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            <div style="overflow-x:auto;" align="center">
                <button class="tambah">
                    <a href="{{ route('pasien.create') }}">Tambah Data</a>
                </button>
            </div>
        @endsection
</body>
