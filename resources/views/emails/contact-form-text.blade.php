esan Baru dari Website FBE

Detail Formulir Kontak:
-----------------------
Nama Lengkap: {{ $formData['first_name'] ?? 'N/A' }} {{ $formData['last_name'] ?? '' }}
Email: {{ $formData['email_address'] ?? 'N/A' }}
Nomor Telepon: {{ $formData['phone_number'] ?? 'N/A' }}
Perusahaan: {{ $formData['company_name'] ?? 'Tidak disebutkan' }}
Jenis Pertanyaan: {{ $formData['inquiry_type_label'] ?? 'N/A' }}
Dikirim pada: {{ $formData['submitted_at'] ?? now()->format('d/m/Y H:i:s') }}

Pesan:
------
{{ $formData['message'] ?? 'Tidak ada pesan.' }}

---------------------------------------------------
Email ini dikirim otomatis dari formulir kontak website FBE.
Untuk membalas, Anda dapat langsung reply email ini.
