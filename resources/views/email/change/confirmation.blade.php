<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm New Email</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<h1>Confirm New Email</h1>
<form method="POST" action="{{ route('email.change.confirmation') }}" class="needs-validation" novalidate>
    @csrf
    <input type="hidden" name="email_change_id" value="{{ $emailChange->id }}">
    <div class="mb-3">
        <label for="code" class="form-label">Verification Code:</label>
        <input type="text" id="code" name="code" class="form-control" required>
        <div class="invalid-feedback">
            Please provide the verification code.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
</form>

</body>
</html>
