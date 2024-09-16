<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM - Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-light">
    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg p-4 col-md-6">
            <h3 class="text-center mb-4">ATM Menu</h3>
            <ul class="list-group">
                <a href="{{route('atm.checkBalance')}}" class="list-group-item list-group-item-action">Check Balance</a>
                <a href="{{route('atm.depositForm')}}" class="list-group-item list-group-item-action">Deposit</a>
                <a href="{{route('atm.withdrawForm')}}" class="list-group-item list-group-item-action">Withdraw</a>
                <a href="{{route('atm.transactionHistory')}}" class="list-group-item list-group-item-action">Transaction History</a>
            </ul>
            <form action="{{ route('atm.logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
