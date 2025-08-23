<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('email_translate.reply_to_your_message') }}</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; }
        h1 { color: #3490dc; text-align: center; }
        .message-box { margin-top: 20px; padding: 15px; background-color: #e9ecef; border-left: 5px solid #3490dc; }
    </style>
</head>
<body>

    <div class="container">
        <h1>{{ __('email_translate.your_reply') }}</h1>
        
        <p>{{ __('email_translate.dear') }}</p>

        <p>{{ __('email_translate.thank_you_for_contacting_us_reply_is_as_follows') }}</p>

        <div class="message-box">
            <p>{{ $body }}</p>
        </div>

        <p style="margin-top: 20px;">
            {{ __('email_translate.kind_regards') }}<br>
            {{ config('app.name') }}
        </p>

    </div>

</body>
</html>