<?php
session_start();

// Reset form if user clicks Back
if (isset($_POST['back'])) {
    unset($_SESSION['user_type']);
    header("Location: register.php");
    exit;
}

// Step 1 submission: save user_type in session and move to step 2
if (isset($_POST['step1_submit'])) {
    $user_type = $_POST['user_type'] ?? null;
    if ($user_type === 'reader' || $user_type === 'author') {
        $_SESSION['user_type'] = $user_type;
    } else {
        $error = "Please select an account type.";
    }
}

// Step 2 submission
if (isset($_POST['step2_submit'])) {

    $registered_type = $_SESSION['user_type'] ?? 'reader';
    session_destroy();
    exit;
}

// Determine which step to show
$show_step1 = !isset($_SESSION['user_type']);
$show_step2 = isset($_SESSION['user_type']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Booklyn</title>
    <link rel="stylesheet" href="../assets/css/register.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/myLogo.png" type="image/x-icon">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <style>
        :root {
            --primary-clr: #3B82F6;
            --secondary-clr: #1E293B;
            --accent-gold: #FCD34D;
            --bg-clr: #F8FAFC;
            --pure-white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background: var(--secondary-clr);
            color: var(--secondary-clr);
        }

        .registration-container {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin-top: 30px;
        }

        .back-vid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -2;
        }

        .video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.97), rgba(59, 130, 246, 0.15));
            z-index: -1;
        }

        /* Progress Indicator */
        .progress-container {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 10;
        }

        .progress-step {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--pure-white);
            transition: all 0.3s ease;
        }

        .step-circle.active {
            background: var(--primary-clr);
            border-color: var(--accent-gold);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.6);
            color: var(--pure-white);
        }

        .step-line {
            width: 60px;
            height: 2px;
            background: rgba(255, 255, 255, 0.2);
        }

        /* Step 1: Card Style */
        .choice-card {
            background: var(--pure-white);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 50px 40px;
            max-width: 500px;
            width: 100%;
            border: 1px solid rgba(59, 130, 246, 0.2);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .choice-card h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--secondary-clr);
            font-weight: 700;
        }

        .choice-card p {
            color: var(--secondary-clr);
            opacity: 0.7;
            margin-bottom: 30px;
        }

        .user-type-select {
            width: 100%;
            padding: 16px 20px;
            background: var(--bg-clr);
            border: 2px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            color: var(--secondary-clr);
            font-size: 16px;
            margin-bottom: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%231E293B' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 20px center;
        }

        .user-type-select:focus {
            outline: none;
            border-color: var(--primary-clr);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .user-type-select option {
            background: var(--pure-white);
            color: var(--secondary-clr);
        }

        .btn-primary {
            width: 100%;
            padding: 16px;
            background: var(--primary-clr);
            border: none;
            border-radius: 12px;
            color: var(--pure-white);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            background: #2563EB;
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4);
        }

        .error {
            color: #ff6b6b;
            font-size: 14px;
            margin-bottom: 15px;
            display: block;
        }

        /* Step 2: Split Layout */
        .registration-form {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            background: var(--pure-white);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            overflow: hidden;
            max-width: 1100px;
            width: 100%;
            max-height: 85vh;
            border: 1px solid rgba(59, 130, 246, 0.2);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            animation: fadeInUp 0.6s ease;
            margin-top: 20px;
        }

        .left-panel {
            background: linear-gradient(135deg, var(--primary-clr) 0%, var(--secondary-clr) 100%);
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left-panel h1 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            line-height: 1.3;
            color: var(--pure-white);
        }

        .left-panel p {
            font-size: 1rem;
            opacity: 0.95;
            margin-bottom: 30px;
            line-height: 1.6;
            color: var(--pure-white);
        }

        .feature-list {
            list-style: none;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            font-size: 1rem;
            color: var(--pure-white);
        }

        .feature-list i {
            width: 30px;
            height: 30px;
            background: var(--accent-gold);
            color: var(--secondary-clr);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .right-panel {
            padding: 40px;
            overflow-y: auto;
            max-height: 90vh;
        }

        .right-panel::-webkit-scrollbar {
            width: 6px;
        }

        .right-panel::-webkit-scrollbar-track {
            background: var(--bg-clr);
        }

        .right-panel::-webkit-scrollbar-thumb {
            background: var(--primary-clr);
            border-radius: 3px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: var(--secondary-clr);
        }

        .required {
            color: #EF4444;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            color: var(--primary-clr);
            font-size: 16px;
            z-index: 1;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px 14px 45px;
            background: var(--bg-clr);
            border: 2px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            color: var(--secondary-clr);
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-clr);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background: var(--pure-white);
        }

        .form-control::placeholder {
            color: rgba(30, 41, 59, 0.4);
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            color: var(--primary-clr);
            cursor: pointer;
            transition: color 0.3s ease;
            z-index: 1;
        }

        .toggle-password:hover {
            color: var(--secondary-clr);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
            padding: 14px 16px 14px 45px;
        }

        .file-input-wrapper {
            position: relative;
        }

        .file-input-wrapper input[type="file"] {
            padding: 14px 16px 14px 45px;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn-back {
            flex: 1;
            padding: 14px;
            background: var(--bg-clr);
            border: 2px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            color: var(--secondary-clr);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: var(--primary-clr);
        }

        .btn-submit {
            flex: 2;
            padding: 14px;
            background: var(--primary-clr);
            border: none;
            border-radius: 12px;
            color: var(--pure-white);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .btn-submit:hover {
            background: #2563EB;
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4);
        }

        .error-message {
            color: #EF4444;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            .registration-form {
                grid-template-columns: 1fr;
                max-height: none;
            }

            .left-panel {
                padding: 30px 25px;
            }

            .left-panel h1 {
                font-size: 1.5rem;
            }

            .feature-list li {
                font-size: 0.95rem;
            }

            .right-panel {
                max-height: none;
                padding: 30px 25px;
            }

            .progress-container {
                top: 15px;
            }

            .step-circle {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }

            .step-line {
                width: 40px;
            }
        }

        @media (max-width: 576px) {
            .registration-container {
                padding: 10px;
            }

            .choice-card {
                padding: 35px 25px;
            }

            .choice-card h1 {
                font-size: 1.6rem;
            }

            .left-panel, .right-panel {
                padding: 25px 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-back, .btn-submit {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php
     include ("../includes/navbar.php");
     include ("../includes/loader.php");
    ?>

    <video autoplay loop muted playsinline class="back-vid">
        <source src="../assets/img/bg-vid.mp4" type="video/mp4">
    </video>
    <div class="video-overlay"></div>

    <!-- Progress Indicator -->
    <div class="progress-container">
        <div class="progress-step">
            <div class="step-circle <?php echo $show_step1 ? 'active' : ''; ?>">1</div>
            <div class="step-line"></div>
            <div class="step-circle <?php echo $show_step2 ? 'active' : ''; ?>">2</div>
        </div>
    </div>

    <div class="registration-container">
        <?php if ($show_step1): ?>
            <!-- Step 1: Choose User Type -->
            <div class="choice-card">
                <?php if (!empty($error)): ?>
                    <span class="error"><?= htmlspecialchars($error) ?></span>
                <?php endif; ?>
                
                <h1>Register To Begin</h1>
                <p>Create account as an author or a reader.</p>
                
                <form method="POST" action="../app/process.php">
                    <select name="user_type" class="user-type-select" required>
                        <option value="" disabled selected>Select account type</option>
                        <option value="reader">📖 Register as Reader</option>
                        <option value="author">✍️ Register as Author</option>
                    </select>
                    
                    <button type="submit" class="btn-primary" name="step1_submit">
                        Continue <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
                    </button>
                </form>
            </div>

        <?php elseif ($show_step2): ?>
            <!-- Step 2: Registration Form -->
            <div class="registration-form">
                <!-- Left Panel -->
                <div class="left-panel">
                    <h1>Welcome to Booklyn 📚</h1>
                    <?php if ($_SESSION['user_type'] === 'reader'): ?>
                        <p>Join the reading revolution. Fill the form to get started as a reader.</p>
                        <ul class="feature-list">
                            <li><i class="fa-solid fa-check"></i> Easy Library Access</li>
                            <li><i class="fa-solid fa-book"></i> Personalized Book Recs</li>
                            <li><i class="fa-solid fa-chart-line"></i> Track Reading History</li>
                        </ul>
                    <?php else: ?>
                        <p>Join our network of authors. Fill the form to register and start publishing.</p>
                        <ul class="feature-list">
                            <li><i class="fa-solid fa-check"></i> Reach More Readers</li>
                            <li><i class="fa-solid fa-book"></i> Manage Your Collection</li>
                            <li><i class="fa-solid fa-chart-line"></i> Track Your Success</li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Right Panel - Forms -->
                <div class="right-panel">
                    <?php if ($_SESSION['user_type'] === 'reader'): ?>
                        <!-- Reader Form -->
                        <form id="registerForm" method="POST" action="../app/process.php">
                            <div class="form-group">
                                <label for="username">Username <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-circle-user input-icon"></i>
                                    <input id="username" name="username" class="form-control" placeholder="Your Username" type="text" required />
                                </div>
                                <span class="error-message" id="usernameError"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-envelope input-icon"></i>
                                    <input id="email" name="email" class="form-control" placeholder="Your Email" type="email" required />
                                </div>
                                <span class="error-message" id="emailError"></span>
                            </div>

                            <div class="form-group">
                                <label for="pwd">Password <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-lock input-icon"></i>
                                    <input id="pwd" name="pwd" class="form-control" placeholder="Your Password" type="password" required />
                                    <i id="togglePassword" class="fa-solid fa-eye toggle-password"></i>
                                </div>
                                <span class="error-message" id="pwdError"></span>
                            </div>

                            <div class="form-group">
                                <label for="cpwd">Confirm Password <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-lock input-icon"></i>
                                    <input id="cpwd" name="cpwd" class="form-control" placeholder="Confirm Password" type="password" required />
                                    <i id="toggleConfirmPassword" class="fa-solid fa-eye toggle-password"></i>
                                </div>
                                <span class="error-message" id="cpwdError"></span>
                            </div>

                            <div class="form-actions">
                                <button type="button" onclick="window.location.href='back.php'" class="btn-back">
                                    <i class="fa-solid fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" name="step2_submit" class="btn-submit">
                                    Register <i class="fa-solid fa-user-plus"></i>
                                </button>
                            </div>
                        </form>

                    <?php elseif ($_SESSION['user_type'] === 'author'): ?>
                        <!-- Author Form -->
                        <form id="registerForm" method="POST" action="../app/process.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-circle-user input-icon"></i>
                                    <input id="username" name="username" class="form-control" placeholder="Your Username" type="text" required />
                                </div>
                                <span class="error-message" id="usernameError"></span>
                            </div>

                            <div class="form-group">
                                <label for="penName">Pen Name <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-signature input-icon"></i>
                                    <input id="penName" name="penName" class="form-control" placeholder="Your Pen Name" type="text" required />
                                </div>
                                <span class="error-message" id="penNameError"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-envelope input-icon"></i>
                                    <input id="email" name="email" class="form-control" placeholder="Your Email" type="email" required />
                                </div>
                                <span class="error-message" id="emailError"></span>
                            </div>

                            <div class="form-group">
                                <label for="profile_pic">Profile Picture <span class="required">*</span></label>
                                <div class="input-wrapper file-input-wrapper">
                                    <i class="fa-solid fa-cloud-arrow-up input-icon"></i>
                                    <input id="profile_pic" name="profile_pic" class="form-control" type="file" accept="image/*" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bio">Short Bio</label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-feather input-icon"></i>
                                    <textarea name="bio" id="bio" class="form-control" placeholder="Write a short bio about yourself"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-lock input-icon"></i>
                                    <input id="pwd" name="password" class="form-control" placeholder="Your Password" type="password" required />
                                    <i id="togglePassword" class="fa-solid fa-eye toggle-password"></i>
                                </div>
                                <span class="error-message" id="pwdError"></span>
                            </div>

                            <div class="form-group">
                                <label for="cpwd">Confirm Password <span class="required">*</span></label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-lock input-icon"></i>
                                    <input id="cpwd" name="cpwd" class="form-control" placeholder="Confirm Password" type="password" required />
                                    <i id="toggleConfirmPassword" class="fa-solid fa-eye toggle-password"></i>
                                </div>
                                <span class="error-message" id="cpwdError"></span>
                            </div>

                            <div class="form-actions">
                                <button type="button" onclick="window.location.href='back.php'" class="btn-back">
                                    <i class="fa-solid fa-arrow-left"></i> Back
                                </button>
                                <button type="submit" name="step2_submit" class="btn-submit">
                                    Register <i class="fa-solid fa-user-plus"></i>
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="../assets/js/register.js"></script>

    <?php if(isset($_SESSION['alert'])): ?>
        <script src="../assets/js/sweetalert.js"></script>
        <script>
            Swal.fire({
                title: '<?= $_SESSION['alert']['title'] ?>',
                text: '<?= $_SESSION['alert']['message'] ?>',
                icon: '<?= $_SESSION['alert']['type'] ?>'
            }).then((result) => {
                <?php if(isset($_SESSION['alert']['redirect'])): ?>
                    window.location.href = '<?= $_SESSION['alert']['redirect'] ?>';
                <?php endif; ?>
            });
        </script>
        <?php unset($_SESSION['alert']); endif; ?>

    <script>
        // Password toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const pwd = document.getElementById('pwd');
            const cpwd = document.getElementById('cpwd');

            if (togglePassword && pwd) {
                togglePassword.addEventListener('click', function() {
                    const type = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                    pwd.setAttribute('type', type);
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            }

            if (toggleConfirmPassword && cpwd) {
                toggleConfirmPassword.addEventListener('click', function() {
                    const type = cpwd.getAttribute('type') === 'password' ? 'text' : 'password';
                    cpwd.setAttribute('type', type);
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            }
        });
    </script>
</body>
</html>