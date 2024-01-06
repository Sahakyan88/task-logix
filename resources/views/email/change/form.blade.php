<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Change</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* You can add custom styles here */
    </style>
</head>
<body>

<h1>Change Email</h1>
<form method="POST" action="{{ route('email.change.initiate') }}" class="needs-validation" novalidate>
    @csrf
    <div class="mb-3">
        <label for="new_email" class="form-label">New Email Address:</label>
        <input type="email" id="new_email" name="new_email" class="form-control" required>
        <div class="invalid-feedback">
            Please provide a valid email.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Request Change</button>
</form>

</body>
</html>
