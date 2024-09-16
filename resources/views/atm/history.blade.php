<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM - Transaction History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg p-4 col-md-8">
            <h3 class="text-center mb-4">Transaction History</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ ucfirst($transaction->type) }}</td>
                        <td>${{ number_format($transaction->amount, 2) }}</td>
                        <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('atm.menu') }}" class="btn btn-primary mt-4">Back to Menu</a>
        </div>
    </div>
</body>
</html>
