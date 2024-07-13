<!DOCTYPE html>
<html lang="en">
<?= view('Components/Header', ['page_title' => "Registration"]) ?>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Register</h3>

                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <?= esc($error) ?><br>
                                <?php endforeach ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="/register" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="<?= old('name') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?= old('email') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        Already have an account? <a href="/login">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?= view('Components/Script'); ?>

</body>
</html>
