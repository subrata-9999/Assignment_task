<!DOCTYPE html>
<html lang="en">
<?= view('Components/Header', ['page_title' => "User Access"]) ?>

<body>
    <?= view('Components/Navbar') ?>


    <div class="container-lg mt-5">
        <div class="text-center mb-4">
            <button id="showEmployees" class="btn btn-primary">Employees</button>
            <button id="showAdmins" class="btn btn-secondary">Admins</button>
        </div>

        <!-- Employees Card -->
        <div id="employeesCard" class="card mb-5">
            <div class="card-header bg-primary text-white">
                <h2>Employees</h2>
            </div>
            <div class="card-body">
                <table id="employeesTable" class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="d-none">ID</th>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl_No = 1;
                        foreach ($allEmployees as $employee) : ?>
                            <tr>
                                <td class="d-none"><?= $employee['id'] ?></td>
                                <td><?= $sl_No++; ?></td>
                                <td><?= $employee['name'] ?></td>
                                <td><?= $employee['email'] ?></td>
                                <td><?= strtoupper($employee['status']) ?></td>
                                <td>
                                    <button class="btn btn-success"><a class="text-white text-decoration-none" href="/changeUserType/<?= $employee['id'] ?>">Make Admin</a></button>
                                    <?php if ($employee['status'] === 'active') : ?>
                                        <button class="btn btn-primary">
                                            <a href="/statusUpdate/<?= $employee['id'] ?>" class="text-white text-decoration-none">Inactive</a>
                                        </button>
                                    <?php else : ?>
                                        <button class="btn btn-secondary">
                                            <a href="/statusUpdate/<?= $employee['id'] ?>" class="text-white text-decoration-none">Active</a>
                                        </button>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Admins Card -->
        <div id="adminsCard" class="card d-none">
            <div class="card-header bg-primary text-white">
                <h2>Admins</h2>
            </div>
            <div class="card-body">
                <table id="adminsTable" class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl_No = 1;
                        foreach ($allAdmins as $admin) : ?>
                            <tr>
                                <td><?= $sl_No++; ?></td>
                                <td><?= $admin['name'] ?></td>
                                <td><?= $admin['email'] ?></td>
                                <!-- Add more columns as needed -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?= view('Components/Script'); ?>
    <script>
        $(document).ready(function() {
            $('#employeesTable').DataTable();
            $('#adminsTable').DataTable();

            $('#showEmployees').click(function() {
                $('#employeesCard').removeClass('d-none');
                $('#adminsCard').addClass('d-none');
                $(this).addClass('btn-primary').removeClass('btn-secondary');
                $('#showAdmins').addClass('btn-secondary').removeClass('btn-primary');
            });

            $('#showAdmins').click(function() {
                $('#adminsCard').removeClass('d-none');
                $('#employeesCard').addClass('d-none');
                $(this).addClass('btn-primary').removeClass('btn-secondary');
                $('#showEmployees').addClass('btn-secondary').removeClass('btn-primary');
            });

            // Initialize with employees table visible
            $('#showEmployees').click();
        });
    </script>
</body>

</html>