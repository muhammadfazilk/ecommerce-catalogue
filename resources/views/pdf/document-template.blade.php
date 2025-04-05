<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Compliance Document</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            line-height: 1.5;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section h3 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .metadata-table {
            width: 100%;
            border-collapse: collapse;
        }

        .metadata-table th, .metadata-table td {
            text-align: left;
            padding: 8px;
        }

        .metadata-table th {
            width: 200px;
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 50px;
            font-size: 12px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Compliance Document Details</h1>
    </div>

    <div class="section">
        <h3>Document Metadata</h3>
        <table class="metadata-table">
            <tr>
                <th>Title</th>
                <td>{{ $doc->title }}</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>{{ $doc->type }}</td>
            </tr>
            <tr>
                <th>Issue Date</th>
                <td>{{ \Carbon\Carbon::parse($doc->issue_date)->format('F d, Y') }}</td>
            </tr>
            <tr>
                <th>Associated Product</th>
                <td>{{ $doc->product->name ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Generated on {{ now()->format('F d, Y H:i') }} by {{ config('app.name') }}
    </div>
</body>
</html>
