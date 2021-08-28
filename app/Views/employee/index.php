<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
    <section>
        <h1>Employee List!</h1>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee) { ?>
                    <tr>
                        <td><?= $employee->id ?></td>
                        <td><?= $employee->name ?></td>
                        <td><?= $employee->email ?></td>
                        <td><?= $employee->phone ?></td>
                        <td><?= $employee->created_at ?></td>
                        <td><?= $employee->updated_at ?></td>
                        <td colspan="2">
                            <a href="<?= base_url('employee/view/' . $employee->id ); ?>">View</a>
                            <a href="<?= base_url('employee/edit/' . $employee->id ); ?>">Edit</a>
                            <a href="<?= base_url('employee/delete/' . $employee->id ); ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
<?= $this->endSection() ?>
