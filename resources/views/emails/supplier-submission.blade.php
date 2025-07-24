<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Supplier Submission</title>
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f7f6;
        }

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid #e0e0e0;
        }

        .header {
            background: linear-gradient(135deg, #38A169, #2F855A);
            /* Tailwind green-700 to green-800 equivalent */
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .header h1 {
            font-size: 28px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .header .icon {
            font-size: 3.5em;
            /* Larger icon */
            display: block;
            margin-bottom: 15px;
        }

        .content-section {
            padding: 25px 30px;
        }

        .info-block {
            margin-bottom: 25px;
            padding: 20px;
            background-color: #fbfdfe;
            /* Lighter background */
            border-radius: 8px;
            border-left: 5px solid #38A169;
            /* Accent border */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .info-title {
            font-weight: bold;
            color: #2F855A;
            /* Darker green for titles */
            margin-bottom: 15px;
            font-size: 19px;
            border-bottom: 1px solid #e9ecef;
            /* Subtle separator */
            padding-bottom: 10px;
        }

        .info-item {
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
        }

        .info-label {
            font-weight: 600;
            /* Semi-bold */
            display: inline-block;
            width: 200px;
            /* Aligned labels */
            color: #555;
            flex-shrink: 0;
            font-size: 15px;
        }

        .info-value {
            flex: 1;
            color: #333;
            font-size: 15px;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin-top: 5px;
        }

        .badge-primary {
            background-color: #4CAF50;
            /* Green */
            color: white;
        }

        .badge-info {
            background-color: #2196f3;
            /* Blue */
            color: white;
        }

        .badge-warning {
            background-color: #ff9800;
            /* Orange */
            color: white;
        }

        .badge-danger {
            background-color: #ff6b6b;
            /* Red */
            color: white;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }

        .photo-grid img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            object-fit: cover;
            aspect-ratio: 1 / 1;
            /* Keep images square */
        }

        .technical-info {
            background-color: #eef2f3;
            border-radius: 6px;
            padding: 12px;
            font-size: 13px;
            color: #666;
            font-family: 'Courier New', monospace;
            word-break: break-all;
            margin-top: 10px;
        }

        .footer {
            background-color: #2F855A;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 12px 12px;
            font-size: 13px;
            opacity: 0.9;
        }

        .btn-link {
            display: inline-block;
            background-color: #38A169;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-link:hover {
            background-color: #2F855A;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <span class="icon">📝</span>
            <h1>New Supplier Form Submission</h1>
            <p>Received on {{ $submissionTime->format('d M Y, H:i:s') }} WIB</p>
        </div>

        <div class="content-section">
            <div class="info-block">
                <div class="info-title">👤 User Information</div>
                <div class="info-item">
                    <span class="info-label">Submitted By:</span>
                    <span class="info-value">{{ $user->name }} (ID: #{{ $user->id }})</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ $user->email }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">User Role:</span>
                    <span class="info-value">
                        <span class="badge {{ $user->role == 'supplier' ? 'badge-warning' : 'badge-info' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </span>
                </div>
            </div>

            <div class="info-block">
                <div class="info-title">🏭 Supplier Details</div>
                <div class="info-item">
                    <span class="info-label">Supplier ID:</span>
                    <span class="info-value">#{{ $supplier->id }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Supplier Type:</span>
                    <span class="info-value">
                        <span class="badge badge-primary">{{ $supplierTypeText }}</span>
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">Region:</span>
                    <span class="info-value">{{ $supplier->region }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Monthly Available Volume:</span>
                    <span class="info-value">{{ number_format($supplier->monthly_available_volume) }} tons</span>
                </div>
                @if ($supplier->annual_production_volume)
                    <div class="info-item">
                        <span class="info-label">Annual Production Volume:</span>
                        <span class="info-value">{{ number_format($supplier->annual_production_volume) }} tons</span>
                    </div>
                @endif
                @if ($supplier->dura_composition || $supplier->tenera_composition || $supplier->pisifera_composition)
                    <div class="info-item">
                        <span class="info-label">PKS Composition:</span>
                        <span class="info-value">
                            @if ($supplier->dura_composition)
                                Dura: {{ $supplier->dura_composition }}%
                            @endif
                            @if ($supplier->tenera_composition)
                                Tenera: {{ $supplier->tenera_composition }}%
                            @endif
                            @if ($supplier->pisifera_composition)
                                Pisifera: {{ $supplier->pisifera_composition }}%
                            @endif
                        </span>
                    </div>
                @endif
                @if ($supplier->sales_record)
                    <div class="info-item">
                        <span class="info-label">Sales Record (Past 1 Year):</span>
                        <span class="info-value">{{ number_format($supplier->sales_record) }} tons</span>
                    </div>
                @endif
                @if ($supplier->desired_selling_price)
                    <div class="info-item">
                        <span class="info-label">Desired Selling Price:</span>
                        <span class="info-value">{{ $supplier->desired_selling_price }}</span>
                    </div>
                @endif
                @if ($supplier->minimum_order_quantity)
                    <div class="info-item">
                        <span class="info-label">Minimum Order Quantity:</span>
                        <span class="info-value">{{ number_format($supplier->minimum_order_quantity) }} tons</span>
                    </div>
                @endif
                @if ($supplier->urgent_sale_available)
                    <div class="info-item">
                        <span class="info-label">Urgent Sale:</span>
                        <span class="info-value">
                            <span class="badge badge-danger">🚨 AVAILABLE</span>
                        </span>
                    </div>
                @endif
                @if ($supplier->notes)
                    <div class="info-item">
                        <span class="info-label">Notes:</span>
                        <span class="info-value">{{ $supplier->notes }}</span>
                    </div>
                @endif
            </div>

            @if (
                !empty($supplier->product_photos) ||
                    !empty($supplier->factory_photos) ||
                    !empty($supplier->sample_pks_photos) ||
                    $supplier->lab_test_report)
                <div class="info-block">
                    <div class="info-title">📎 Submitted Files</div>
                    @if (!empty($supplier->product_photos))
                        <div class="info-item">
                            <span class="info-label">Product Photos:</span>
                            <span class="info-value">
                                <div class="photo-grid">
                                    @foreach ($supplier->product_photos as $photo)
                                        <a href="{{ $photo }}" target="_blank"><img src="{{ $photo }}"
                                                alt="Product Photo"></a>
                                    @endforeach
                                </div>
                            </span>
                        </div>
                    @endif
                    @if (!empty($supplier->factory_photos))
                        <div class="info-item">
                            <span class="info-label">Factory/Warehouse Photos:</span>
                            <span class="info-value">
                                <div class="photo-grid">
                                    @foreach ($supplier->factory_photos as $photo)
                                        <a href="{{ $photo }}" target="_blank"><img src="{{ $photo }}"
                                                alt="Factory Photo"></a>
                                    @endforeach
                                </div>
                            </span>
                        </div>
                    @endif
                    @if (!empty($supplier->sample_pks_photos))
                        <div class="info-item">
                            <span class="info-label">Sample PKS Photos:</span>
                            <span class="info-value">
                                <div class="photo-grid">
                                    @foreach ($supplier->sample_pks_photos as $photo)
                                        <a href="{{ $photo }}" target="_blank"><img src="{{ $photo }}"
                                                alt="Sample PKS Photo"></a>
                                    @endforeach
                                </div>
                            </span>
                        </div>
                    @endif
                    @if ($supplier->lab_test_report)
                        <div class="info-item">
                            <span class="info-label">Lab Test Report:</span>
                            <span class="info-value"><a href="{{ $supplier->lab_test_report }}" target="_blank"
                                    style="color: #38A169; text-decoration: underline;">View Report</a></span>
                        </div>
                    @endif
                </div>
            @endif

            <div class="info-block">
                <div class="info-title">🌐 Technical Information</div>
                <div class="info-item">
                    <span class="info-label">Submission IP Address:</span>
                    <span class="info-value">{{ $submissionIp }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">User Agent:</span>
                    <span class="info-value">
                        <div class="technical-info">{{ $userAgent }}</div>
                    </span>
                </div>
            </div>

            <p style="text-align: center; margin-top: 30px; font-size: 16px; color: #444;">
                Please review this information and follow up with the supplier as needed.
            </p>
            <p style="text-align: center;">
                <a href="{{ url('/admin/suppliers/' . $supplier->id) }}" class="btn-link">View Supplier in Admin
                    Panel</a>
            </p>
        </div>

        <div class="footer">
            <p><strong>FBE - Fujiyama Biomass Energy</strong></p>
            <p>Automated Supplier Submission Notification System</p>
            <p>{{ now()->format('Y') }} - Trusted Biomass Platform</p>
        </div>
    </div>
</body>

</html>
