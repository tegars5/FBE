<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Website FBE</title>
    <style>
        /* Desain CSS yang sudah ada */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: linear-gradient(135deg, #2a6f2a 0%, #1e5a1e 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .email-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }

        .email-body {
            padding: 30px 20px;
        }

        .info-section {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .info-item {
            background-color: white;
            padding: 12px;
            border-radius: 4px;
            border-left: 3px solid #2a6f2a;
        }

        .info-label {
            font-weight: 600;
            color: #2a6f2a;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .info-value {
            color: #333;
            font-size: 14px;
        }

        .message-section {
            background-color: #fff;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            padding: 20px;
            margin-top: 20px;
        }

        .message-label {
            font-weight: 600;
            color: #2a6f2a;
            font-size: 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .message-content {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            border-left: 4px solid #2a6f2a;
            font-style: italic;
            line-height: 1.8;
            white-space: pre-wrap;
            /* Penting untuk menjaga format pesan */
            word-wrap: break-word;
            /* Memastikan pesan panjang tidak keluar dari batas */
        }

        .email-footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .email-footer p {
            margin: 0;
            font-size: 12px;
            color: #6c757d;
        }

        .priority-badge {
            display: inline-block;
            background-color: #ffc107;
            color: #856404;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            margin-left: 10px;
        }

        .timestamp {
            color: #6c757d;
            font-size: 12px;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .email-header,
            .email-body,
            .email-footer {
                padding: 20px 15px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>🌱 Pesan Baru dari Website</h1>
            <p>Formulir kontak FBE (Fujiyama Biomass Energy)</p>
        </div>
        <div class="email-body">
            <div class="info-section">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value">
                            {{ $formData['first_name'] ?? 'N/A' }} {{ $formData['last_name'] ?? '' }}
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Email</div>
                        <div class="info-value">
                            <a href="mailto:{{ $formData['email_address'] ?? 'N/A' }}"
                                style="color: #2a6f2a; text-decoration: none;">
                                {{ $formData['email_address'] ?? 'N/A' }}
                            </a>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Nomor Telepon</div>
                        <div class="info-value">
                            <a href="tel:{{ $formData['phone_number'] ?? 'N/A' }}"
                                style="color: #2a6f2a; text-decoration: none;">
                                {{ $formData['phone_number'] ?? 'N/A' }}
                            </a>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Perusahaan</div>
                        <div class="info-value">
                            {{ $formData['company_name'] ?? 'Tidak disebutkan' }}
                        </div>
                    </div>
                </div>

                <div class="info-item" style="margin-top: 15px;">
                    <div class="info-label">Jenis Pertanyaan</div>
                    <div class="info-value">
                        {{ $formData['inquiry_type_label'] ?? 'N/A' }}
                        @if (($formData['inquiry_type'] ?? '') === 'quote')
                            <span class="priority-badge">Prioritas Tinggi</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="message-section">
                <div class="message-label">💬 Pesan</div>
                <div class="message-content">
                    {{ $formData['message'] ?? 'Tidak ada pesan.' }}
                </div>
            </div>

            <div class="timestamp">
                📅 Dikirim pada: {{ $formData['submitted_at'] ?? now()->format('d/m/Y H:i:s') }}
            </div>
        </div>

        <div class="email-footer">
            <p>
                Email ini dikirim otomatis dari formulir kontak website FBE.<br>
                Untuk membalas, Anda dapat langsung reply email ini atau hubungi pengirim langsung.
            </p>
        </div>
    </div>
</body>

</html>
