<!DOCTYPE html>
<html lang="en">
<?= view('Components/Header', ['page_title' => "Forgot Password"]) ?>

<body>
    <div class="container-lg mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Forgot Password</h3>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        <form action="/forgot-password" method="post" id="forgot-password-form">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('Components/Script'); ?>
    <!-- <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        $(document).ready(function() {
            $('#forgot-password-form').submit(function(e) {
                e.preventDefault();
                let email = $('#email').val();
                Email.send({
                    SecureToken: "f540aa4a-8269-4442-8e3b-e8a5ef66491b",
                    To: email,
                    From: "subrata.pramanik.subho@gmail.com",
                    Subject: "Forgot Password",
                    Body: "Please click on the link to reset your password: <a href='http://yourdomain.com/reset-password?token=someToken'>Reset Password</a>",
                }).then(
                    message => {
                        if (message == "OK") {
                            alert("Email sent successfully");
                            $('#forgot-password-form').trigger("reset");
                        } else {
                            alert("There was an error sending the email: " + message);
                        }
                    }
                );
            });
        });
    </script> -->
</body>

</html>
