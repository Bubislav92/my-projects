<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('email_translate.message_received_confirmation') }}</title>
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
        <h1>{{ __('email_translate.thank_you_for_contacting_us_comma') }} {{ $data['full_name'] ?? '' }}!</h1>
        
        <p>{{ __('email_translate.your_message_successfully_received') }}</p>

        <table>
            <tr>
                <th>{{ __('email_translate.project') }}</th>
                <td>{{ $data['project_type'] ?? '' }}</td>
            </tr>
            <tr>
                <th>{{ __('email_translate.budget') }}</th>
                <td>{{ $data['budget'] ?? 'Није унет' }}</td>
            </tr>
        </table>
        
        <div class="message-box">
            <strong>{{ __('email_translate.copy_of_your_message') }}</strong>
            <p>{{ $data['message'] ?? '' }}</p>
        </div>

        <p style="margin-top: 20px;">
            <a href="{{ config('app.url') }}" style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 5px;">{{ __('email_translate.visit_our_site') }}</a>
        </p>

        <p style="margin-top: 20px;">
            {{ __('email_translate.kind_regards') }}<br>
            {{ config('app.name') }}
        </p>

    </div>

</body>
</html>