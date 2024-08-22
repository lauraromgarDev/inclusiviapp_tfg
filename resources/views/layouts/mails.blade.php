<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>
<body>
<table>
    <tr>
        <td>
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </td>
    </tr>
    <tr>
        <td>
            <h1>{{ $title }}</h1>
            <p>{{ $content }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Atentamente,</p>
            <p>{{ $sender }}</p>
        </td>
    </tr>
</table>
</body>
</html>
