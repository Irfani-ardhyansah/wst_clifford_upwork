<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consultation Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color:#f4f6f8; padding:20px;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; padding:30px; border-radius:8px;">
                    
                    <tr>
                        <td>
                            <h2 style="margin-top:0;">Hi {{ $consultation->first_name }},</h2>

                            <p>
                                Thank you for submitting your consultation request.
                            </p>

                            @if($consultation->time_preference)
                                <p>
                                    <strong>Scheduled Date:</strong><br>
                                    {{ \Carbon\Carbon::parse($consultation->time_preference)->format('l, d F Y - H:i') }}
                                </p>
                            @endif

                            <p>
                                <strong>Meeting Link:</strong><br>
                                <!-- <a href="{{ $consultation->meeting_link }}"> -->
                                <a href="#">
                                    Join Meeting
                                </a>
                            </p>

                            <br>

                            <p>
                                Best regards,<br>
                                <strong>{{ config('app.name') }}</strong>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>