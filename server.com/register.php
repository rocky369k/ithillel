<?php

session_start();

require_once __DIR__ . '/includes/errors.php';

$title = 'Регистрация';

require __DIR__ . '/templates/header.php';

?>

    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col col-lg-10">
                <div class="card">
                    <header class="card-header">
                        <h4 class="mb-1 text-center">
                            Sign Up
                        </h4>
                    </header>
                    <main class="card-body">
                        <?php
                        if (has_error_message()):
                            show_error_message();
                        endif;
                        ?>
                        <form action="scripts/register.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    E-MAIL
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    PASSWORD
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    Name
                                </label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name (at pleasure)">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit">Sign Up</button>

                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
<?php require __DIR__ . '/templates/footer.php'; ?>
