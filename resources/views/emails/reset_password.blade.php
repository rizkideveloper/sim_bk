<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Email</title>
</head>

<body>
    <h2>{{ $data['title'] }}</h2>
    <div>
        <a href="http://127.0.0.1:8000/add_NewPassword/{{ $data['email'] }}">reset password</a>
    </div>
</body>

</html>
