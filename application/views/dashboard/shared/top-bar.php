<nav class="navbar navbar-dark navbar-top navbar-expand">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Permissions</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo base_url() ?>index.php/dashboard/levels">Levels</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url() ?>index.php/dashboard/types">Types</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url() ?>index.php/dashboard/permissions">App Permissions</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Profile</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Edit</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url() ?>index.php/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>