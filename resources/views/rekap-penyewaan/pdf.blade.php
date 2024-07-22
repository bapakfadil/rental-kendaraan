<!DOCTYPE html>
<html>
<head>
    <title>Rekap Penyewaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Rekap Penyewaan ({{ $startDate->format('d-m-Y') }} - {{ $endDate->format('d-m-Y') }})</h2>
    <h3>Total Pendapatan: Rp {{ number_format($totalIncome, 0, ',', '.') }}</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Kendaraan</th>
                <th>Nomor Plat</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>
                        @if($booking->vehicle)
                            {{ $booking->vehicle->brand }} {{ $booking->vehicle->model }}
                        @else
                            <span>Null</span>
                        @endif
                    </td>
                    <td>
                        @if($booking->vehicle)
                            {{ $booking->vehicle->plate_number }}
                        @else
                            <span>Null</span>
                        @endif
                    </td>
                    <td>{{ $booking->start_date->format('d-m-Y') }}</td>
                    <td>{{ $booking->end_date->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
