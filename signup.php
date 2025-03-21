<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sign up for the application.">
    <meta name="keywords" content="Sign up, Registration">
    <meta name="author" content="Your Name">

    <link rel="icon" href="./assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <link rel="stylesheet" href="./assets/fonts/tabler-icons.min.css">
    <link rel="stylesheet" href="./assets/fonts/feather.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="./assets/fonts/material.css">
    <link rel="stylesheet" href="./assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="./assets/css/style-preset.css">
</head>
<body>
    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="auth-header">
                    <a href="#"><img src="./assets/images/logo-dark.svg" alt="img"></a>
                </div>
                <div class="card my-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-end mb-4">
                            <h3 class="mb-0"><b>Sign up</b></h3>
                            <a href="login.html" class="link-primary">Already have an account?</a>
                        </div>
                        <form id="signupForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">First Name*</label>
                                        <input type="text" class="form-control" placeholder="First Name" id="firstName" name="firstName" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" id="lastName" name="lastName">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Username*</label>
                                <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address*</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Phone Number*</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phoneNumber" name="phoneNumber" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password*</label>
                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Confirm Password*</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" required>
                            </div>
                            <p class="mt-4 text-sm text-muted">By Signing up, you agree to our <a href="#" class="text-primary"> Terms of Service </a> and <a href="#" class="text-primary"> Privacy Policy</a></p>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                        <div id="message" class="mt-3"></div>
                    </div>
                </div>
                <div class="auth-footer row">
                    <div class="col my-1">
                        <p class="m-0">Copyright © <a href="#">Your Company</a></p>
                    </div>
                    <div class="col-auto my-1">
                        <ul class="list-inline footer-link mb-0">
                            <li class="list-inline-item"><a href="#">Home</a></li>
                            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/plugins/popper.min.js"></script>
    <script src="./assets/js/plugins/simplebar.min.js"></script>
    <script src="./assets/js/plugins/bootstrap.min.js"></script>
    <script src="./assets/js/pcoded.js"></script>
    <script src="./assets/js/plugins/feather.min.js"></script>

    <script>
        document.getElementById('signupForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            const form = event.target;
            const messageDiv = document.getElementById('message');
            messageDiv.innerHTML = ''; // Clear previous messages

            if (form.password.value !== form.confirmPassword.value) {
                messageDiv.innerHTML = '<div class="alert alert-danger">Passwords do not match.</div>';
                return;
            }

            const formData = new FormData(form);
            fetch('register.php', {
                method: 'POST',
                body: formData, // Send form data directly
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    messageDiv.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                } else {
                    messageDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                    setTimeout(function() {
                        window.location.href = 'login.html';
                    }, 10000); // Redirect after 2 seconds
                }
            })
            .catch(error => {
                console.error('Error:', error);
                messageDiv.innerHTML = '<div class="alert alert-danger">An error occurred during registration.</div>';
            });
        });
    </script>
</body>
</html>