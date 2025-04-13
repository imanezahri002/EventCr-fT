<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ config('app.name') }}</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <h1>Welcome to {{ config('app.name') }}, {{ $user->prenom }}!</h1>
                <p>Thank you for joining our community. We're excited to have you on board.</p>
                <h2>Your Account Details:</h2>
                <ul>
                    <li><strong>Email:</strong> {{ $user->email }}</li>
                </ul>
                <p style="text-align: center;">
                    <a href="{{ config('app.url') . 'email/verify/' . $user->id }}" style="padding: 10px 20px; background-color: #3490dc; color: #ffffff; text-decoration: none; border-radius: 5px;">Verify your account here</a>
                </p>
               <p>Thanks again,<br>{{ config('app.name') }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="text-align: center;">
                    <a href="{{ config('app.url') }}" style="padding: 10px 20px; background-color: #3490dc; color: #ffffff; text-decoration: none; border-radius: 5px;">Visit our website</a>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
