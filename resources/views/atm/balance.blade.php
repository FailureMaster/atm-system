<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM - Check Balance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg p-4 col-md-6 text-center">
            <h3 class="mb-4">Current Balance</h3>
            <h2 class="text-success">${{ number_format($balance, 2) }}</h2>
            <a href="{{ route('atm.menu') }}" class="btn btn-primary mt-4">Back to Menu</a>
        </div>
    </div>
</body>
</html>
