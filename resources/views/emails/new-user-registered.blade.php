<!DOCTYPE html>
<html>

<head>
    <title>New User Registration - TruLearnix</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">

    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
        style="border-collapse: collapse; background-color: #ffffff; margin-top: 50px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

        <!-- Header -->
        <tr>
            <td align="center" bgcolor="#4CAF50" style="padding: 40px 0; color: white;">
                <h1 style="margin: 0;">New User Registered</h1>
            </td>
        </tr>

        <!-- Body Content -->
        <tr>
            <td style="padding: 30px;">
                <h2 style="color: #333; margin-top: 0;">Hello Admin,</h2>
                <p style="font-size: 16px; line-height: 1.5; color: #555;">
                    A new user has just signed up on <strong>TruLearnix</strong>. Here are their details:
                </p>

                <!-- User Details -->
                <div style="background-color: #f1f8e9; border-left: 5px solid #4CAF50; padding: 20px; margin: 20px 0;">
                    <p style="margin: 0; font-size: 16px; color: #4b4b4b;">
                        <strong>Name:</strong> {{ $user->name }}<br>
                        <strong>Email:</strong> {{ $user->email }}
                    </p>
                </div>

                <p style="font-size: 16px; color: #555;">
                    You can review this user's profile or manage their access via the admin dashboard.
                </p>

                <!-- CTA -->
                <p style="margin-top: 30px; text-align: center;">
                    <a href="{{ url('/admin/users') }}" style="background-color: #4CAF50; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
                        View User in Admin Panel
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
