<!DOCTYPE html>
<html>

<head>
    <title>Akun Anda Telah Diverifikasi</title>
</head>

<body>
    <p>Halo {{ $user->name }},</p>
    <p>Selamat! Akun buyer Anda di Fujiyama Biomass Energy telah berhasil diverifikasi.</p>
    <p>Anda sekarang dapat login ke dashboard buyer Anda dan mulai menjelajahi pemasok, mengajukan permintaan pembelian,
        dan mengelola pesanan Anda.</p>
    <p>Klik link di bawah ini untuk login:</p>
    <p><a href="{{ route('login') }}">Login ke Dashboard Anda</a></p>
    <p>Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi tim kami.</p>
    <p>Terima kasih,</p>
    <p>Tim Fujiyama Biomass Energy</p>
</body>

</html>
