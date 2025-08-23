<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Нова порука са контакт форме</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; }
        h1 { color: #3490dc; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #e9ecef; }
        .message-box { margin-top: 20px; padding: 15px; background-color: #e9ecef; border-left: 5px solid #3490dc; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Нова порука</h1>
        
        <table>
            <tr>
                <th>Име и презиме:</th>
                <td>{{ $validatedData['full_name'] }}</td>
            </tr>
            @if ($validatedData['company_name'])
            <tr>
                <th>Назив фирме:</th>
                <td>{{ $validatedData['company_name'] }}</td>
            </tr>
            @endif
            <tr>
                <th>Е-пошта:</th>
                <td>{{ $validatedData['email'] }}</td>
            </tr>
            @if ($validatedData['phone'])
            <tr>
                <th>Телефон:</th>
                <td>{{ $validatedData['phone'] }}</td>
            </tr>
            @endif
            <tr>
                <th>Тип пројекта:</th>
                <td>{{ $validatedData['project_type'] }}</td>
            </tr>
            @if ($validatedData['budget'])
            <tr>
                <th>Буџет:</th>
                <td>{{ $validatedData['budget'] }}</td>
            </tr>
            @endif
        </table>

        <div class="message-box">
            <strong>Детаљан опис пројекта:</strong>
            <p>{{ $validatedData['message'] }}</p>
        </div>

    </div>

</body>
</html>