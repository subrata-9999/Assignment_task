<!DOCTYPE html>
<html lang="en">
<?= view('Components/Header', ['page_title' => "Profile Details"]) ?>

<body>
    <?= view('Components/Navbar') ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                User Profile
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <?= esc($error) ?><br>
                        <?php endforeach ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form id="editProfileForm" action="/profileupdate" method="post">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= session()->get('user_name') ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= session()->get('user_email') ?>" readonly>
                    </div>
                    <button type="button" id="editButton" class="btn btn-primary mt-2">Update</button>
                    <button type="submit" id="saveButton" class="btn btn-success mt-2" style="display: none;">Save</button>
                    <button type="button" id="cancelButton" class="btn btn-secondary mt-2 ml-2" style="display: none;">Cancel</button>
                </form>
            </div>
        </div>
    </div>



    <?= view('Components/Script') ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButton = document.getElementById('editButton');
            const saveButton = document.getElementById('saveButton');
            const cancelButton = document.getElementById('cancelButton');
            const inputs = document.querySelectorAll('#editProfileForm input'); // Select all input fields inside the form

            editButton.addEventListener('click', function() {
                // Enable editing
                inputs.forEach(input => {
                    input.removeAttribute('readonly');
                });
                saveButton.style.display = 'inline-block';
                cancelButton.style.display = 'inline-block';
                editButton.style.display = 'none';
            });

            cancelButton.addEventListener('click', function() {
                // Cancel editing
                inputs.forEach(input => {
                    input.setAttribute('readonly', true);
                });
                saveButton.style.display = 'none';
                cancelButton.style.display = 'none';
                editButton.style.display = 'inline-block';
                window.location.reload();
            });
        });
    </script>

</body>

</html>