<!DOCTYPE html>
<html>

<head>
    <title>Welcome to TruLearnix</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">

    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
        style="border-collapse: collapse; background-color: #ffffff; margin-top: 50px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

        <!-- Header -->
        <tr>
            <td align="center" bgcolor="#4CAF50" style="padding: 40px 0; color: white;">
                <h1 style="margin: 0;">Welcome to TruLearnix</h1>
            </td>
        </tr>

        <!-- Greeting -->
        <tr>
            <td style="padding: 30px;">
                <h2 style="color: #333;">Hello, {{ $user->name }}!</h2>
                <p style="font-size: 16px; line-height: 1.5; color: #555;">
                    Thank you for joining TruLearnix. We’re excited to have you on board and look forward to helping you get started.
                </p>

                <!-- 🎁 Joining Bonus Section -->
                <div style="background-color: #e8f5e9; border-left: 5px solid #4CAF50; padding: 20px; margin: 20px 0;">
                    <h3 style="color: #2e7d32; margin-top: 0;">🎉 You've Earned 500 Bonus Points!</h3>
                    <p style="margin: 0; font-size: 16px; color: #4b4b4b;">
                        As a thank-you for signing up, we've added <strong>500 points</strong> to your account.
                        You can use them towards exciting rewards, offers, and more.
                    </p>
                </div>

                <!-- CTA -->
                <p style="margin-top: 30px; text-align: center;">
                    <a href="{{ url('/') }}" style="background-color: #4CAF50; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
                        Start Earning More
                    </a>
                </p>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td align="center" bgcolor="#f4f4f4" style="padding: 20px; color: #999;">
                &copy; {{ date('Y') }} TruLearnix. All rights reserved.
            </td>
        </tr>
    </table>

</body>

</html>