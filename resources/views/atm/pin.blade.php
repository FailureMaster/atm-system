<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM - Enter PIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif --}}
    

    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow-lg p-4 col-md-6">
            <h3 class="text-center mb-4">Enter PIN</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            <form action="{{ route('atm.checkPin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="pin" class="form-label">PIN</label>
                    <input type="password" class="form-control" id="pin" name="pin" maxlength="4" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
