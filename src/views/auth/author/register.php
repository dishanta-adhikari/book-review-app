<?php
require_once __DIR__ . "/../../Components/layout.php";

use App\Middleware\SessionMiddleware;
use App\Controllers\RegisterController;
use App\Helpers\Flash;

SessionMiddleware::verifySession('author');
SessionMiddleware::verifySession('user');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $register = new RegisterController($conn);
    $register->register($_POST);
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-sm border p-4">
                <h2 class="mb-4 text-center">Create Account | Author</h2>

                <?php Flash::render(); ?>

                <form method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required />
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control" rows="2" required></textarea>
                        </div>
                        <input type="hidden" name="role" value="author" class="form-control" required />
                        <div class="col-12 d-flex justify-content-between align-items-center mt-3">
                            <button type="submit" class="btn btn-dark">Submit</button>
                            <a class="icon-link icon-link-hover text-decoration-none" href="<?= AUTH_URL ?>/author/login">
                                <svg xmlns="http://www.w3.org/2000/svg" class="bi" viewBox="0 0 16 16" width="16" height="16" aria-hidden="true">
                                    <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                                Click here to Log In
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../../Components/footer.php"; ?>
</body>

</html>