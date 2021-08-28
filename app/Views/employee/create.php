<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<section>
    <header>
        <h2>Create new Employee!</h2>
    </header>
    <br />

    <?php if (!empty(session()->getFlashData('error'))) {  ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('employee/store'); ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Employee name</label>
                    <input name="name" 
                        type="text" 
                        class="form-control <?= isset($validation) && $validation->getError('name') ? 'is-invalid' : ''; ?>" 
                        id="name" 
                        value="<?= set_value('name'); ?>"
                        placeholder="John Doe"
                    >
                    <div class="invalid-feedback">
                        <?= isset($validation) ? $validation->getError('name') : '' ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Employee email</label>
                    <input name="email" 
                    type="text" 
                    class="form-control <?= isset($validation) && $validation->getError('email') ? 'is-invalid' : ''; ?>" 
                    id="email" 
                    value="<?= set_value('email'); ?>"
                    placeholder="John.D@example.com">
                    <div class="invalid-feedback">
                        <?= isset($validation) ? $validation->getError('email') : '' ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Employee phone</label>
                    <input 
                    name="phone" 
                    type="text" 
                    class="form-control <?= isset($validation) && $validation->getError('phone') ? 'is-invalid' : ''; ?>" 
                    id="phone" 
                    value="<?= set_value('phone'); ?>"
                    placeholder="0000000000"
                    >
                    <div class="invalid-feedback">
                        <?= isset($validation) ? $validation->getError('phone') : '' ?>
                    </div>
                </div>

                <div>
                    <input type="submit" class="btn btn-outline-primary" value="SAVE">
                    <a class="btn btn-outline-secondary" href="<?= base_url('employee/index'); ?>">CANCEL</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>