<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Buyer Baru</title>
</head>

<body>
    <p>Halo Admin,</p>
    <p>Ada pendaftaran buyer baru yang menunggu verifikasi:</p>
    <ul>
        <li><strong>Nama User:</strong> {{ $user->name }}</li>
        <li><strong>Email User:</strong> {{ $user->email }}</li>
        <li><strong>Nama Perusahaan:</strong> {{ $user->buyer->company_name ?? 'N/A' }}</li>
        <li><strong>Negara/Wilayah:</strong> {{ $user->buyer->country_region ?? 'N/A' }}</li>
        {{-- Tambahkan detail lain dari buyer jika diperlukan --}}
        @if ($user->buyer && $user->buyer->business_license)
            <li><strong>Business License:</strong> <a
                    href="{{ asset('storage/' . $user->buyer->business_license) }}">Lihat Dokumen</a></li>
        @endif
    </ul>
    <p>Silakan masuk ke panel admin untuk meninjau detail dan melakukan verifikasi.</p>
    <p>Terima kasih,</p>
    <p>Tim Fujiyama Biomass Energy</p>
</body>

</html>
