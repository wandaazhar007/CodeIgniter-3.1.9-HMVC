<form class="card card-md" action="<?php echo base_url('main/saveRegister') ?>" method="post">
    <div class="card-body">
        <h2 class="mb-3 text-center"><?php echo $title ?></h2>
        <div class="">
            <!-- <label class="form-label">Nama Lengkap</label> -->
            <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo set_value('name') ?>">
            <small class="text-danger" style="margin-left: 10px;"><?php echo form_error('name') ?></small>
        </div>
        <div class="">
            <!-- <label class="form-label">Email</label> -->
            <input type="text" class="form-control" placeholder="Enter your email" name="email" value="<?php echo set_value('email') ?>">
            <small class="text-danger" style="margin-left: 10px;"><?php echo form_error('email') ?></small>
        </div>
        <div class="">
            <!-- <label class="form-label">Password</label> -->
            <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="Password" name="password1">
                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <circle cx="12" cy="12" r="2" />
                            <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                            <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" /></svg>
                    </a>
                </span>
            </div>
            <small class="text-danger" style="margin-left: 10px;"><?php echo form_error('password1') ?></small>
        </div>
        <div class="">
            <!-- <label class="form-label">Repeat Password</label> -->
            <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="Repeat Password" name="password2">
                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <circle cx="12" cy="12" r="2" />
                            <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                            <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" /></svg>
                    </a>
                </span>
            </div>
            <small class="text-danger" style="margin-left: 10px;"><?php echo form_error('password2') ?></small>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block">Create new account</button>
        </div>
    </div>
</form>