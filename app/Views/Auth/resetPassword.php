<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>
<body>
    <p>Hello,</p>
    <p>You have requested a password reset. Please click the link below to reset your password:</p>
    <p><a href="<?= base_url('reset-password?token=' . $token) ?>">Reset Password</a></p>
    <p>If you did not request this, please ignore this email.</p>
</body>
</html>
