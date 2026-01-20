<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Demo</title>
</head>
<body>

<h1>Contact (Demo)</h1>

@if ($errors->any())
    <ul style="color: red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if (session('success'))
    <p style="color: green">
        {{ session('success') }}
    </p>
@endif

<form method="POST" action="/contact">
    @csrf

    <div>
        <label>Name</label><br>
        <input type="text" name="name">
    </div>

    <div>
        <label>Email</label><br>
        <input type="email" name="email">
    </div>

    <div>
        <label>Message</label><br>
        <textarea name="message" rows="4"></textarea>
    </div>

    <button type="submit">Send</button>
</form>

</body>
</html>
