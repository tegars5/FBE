@extends('layouts.app') {{-- Atau layout admin Anda --}}

@section('content')
    <div class="container">
        <h1>Pending Buyer Registrations</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($pendingBuyers->isEmpty())
            <p>Tidak ada pendaftaran buyer yang menunggu verifikasi.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama User</th>
                        <th>Email User</th>
                        <th>Nama Perusahaan</th>
                        <th>Negara</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingBuyers as $buyerUser)
                        <tr>
                            <td>{{ $buyerUser->id }}</td>
                            <td>{{ $buyerUser->name }}</td>
                            <td>{{ $buyerUser->email }}</td>
                            <td>{{ $buyerUser->buyer->company_name ?? 'N/A' }}</td>
                            <td>{{ $buyerUser->buyer->country_region ?? 'N/A' }}</td>
                            <td>
                                <form action="{{ route('admin.verify.buyer', $buyerUser->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Verifikasi</button>
                                </form>
                                <form action="{{ route('admin.reject.buyer', $buyerUser->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menolak pendaftaran ini?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                                {{-- Link untuk melihat detail lebih lanjut --}}
                                <a href="#" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
