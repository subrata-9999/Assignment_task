<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href=""><?= ucfirst(session()->get('user_type'))?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php foreach (session()->get('user_scope') as $permission) : ?>
                    <?php $this_page_title = trim($permission); ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($this_page_title === $page_title) ? 'active' : '' ?>" href="<?= strtolower(str_replace(' ', '', $this_page_title)) ?>">
                            <?= $this_page_title ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <span style="margin-right: 2%;" class="navbar-text">
                <a class="nav-link active" href="/logout">Logout</a>
            </span>
        </div>
    </div>
</nav>