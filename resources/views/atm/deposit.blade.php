<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM - Deposit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg p-4 col-md-6">
            <h3 class="text-center mb-4">Deposit</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            <form action="{{ route('atm.deposit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" step="0.01" class="form-control" id="amount" name="amount" placeholder="Enter amount to deposit" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Deposit</button>
            </form>
            <a href="{{ route('atm.menu') }}" class="btn btn-primary mt-4">Back to Menu</a>
        </div>
    </div>
</body>
</html>
