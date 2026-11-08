<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Peminjaman Ruang Kelas</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff0f4;
            overflow: hidden;
            position: relative;
            padding: 25px;
        }
        .background-shape {
            position: fixed;
            z-index: -1;
            background: #ffc6d9;
            width: 250px;
            height: 200px;
            opacity: 0.9;
        }

        .shape-top {
            top: -85px;
            left: -75px;
            border-radius: 0 0 75% 0;
            transform: rotate(-10deg);
        }

        .shape-bottom {
            right: -70px;
            bottom: -100px;
            width: 330px;
            height: 240px;
            border-radius: 70% 0 0 0;
        }

        .dots {
            position: fixed;
            width: 75px;
            height: 65px;
            background-image: radial-gradient(
                #f3a6bf 2px,
                transparent 2.5px
            );
            background-size: 14px 14px;
            opacity: 0.65;
            z-index: -1;
        }

        .dots-top {
            top: 55px;
            right: 12%;
        }

        .dots-bottom {
            bottom: 45px;
            left: 7%;
        }

        .browser {
            width: 100%;
            max-width: 1000px;
            background: #ffedf2;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(203, 101, 139, 0.12);
        }

        .browser-bar {
            height: 30px;
            background: #ffc6d9;
            display: flex;
            align-items: center;
            gap: 6px;
            padding-left: 12px;
        }

        .browser-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #d77d9e;
        }

        .login-card {
            width: 700px;
            max-width: calc(100% - 40px);
            min-height: 360px;
            margin: 70px auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #fffafa;
            border-radius: 13px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(194, 104, 139, 0.10);
        }

        .welcome-panel {
            background: #fff0f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px 18px;
            text-align: center;
        }

        .classroom {
            width: 100%;
            max-width: 260px;
            height: 170px;
            background: #fbdce7;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
            margin-bottom: 12px;
        }

        .classroom svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .welcome-panel h2 {
            color: #e66c98;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .welcome-panel p {
            font-size: 11px;
            color: #92909a;
        }

        .small-line {
            margin-top: 14px;
            height: 3px;
            width: 28px;
            background: #f3abc4;
            border-radius: 5px;
        }

        .form-panel {
            padding: 30px 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .logo {
            width: 55px;
            height: 55px;
            background: #f8c3d7;
            color: #e65f91;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 29px;
            margin-bottom: 8px;
        }

        .form-panel h1 {
            font-size: 21px;
            color: #e35e8e;
            margin-bottom: 2px;
        }

        .subtitle {
            color: #99949a;
            font-size: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .login-form {
            width: 100%;
        }

        .input-group {
            width: 100%;
            height: 39px;
            border: 1px solid #f1d5df;
            border-radius: 8px;
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            padding: 0 12px;
            background: #fffafa;
            transition: 0.3s;
        }

        .input-group:focus-within {
            border-color: #e66c98;
            box-shadow: 0 0 0 3px rgba(230, 108, 152, 0.10);
        }

        .input-group > i {
            color: #d987a5;
            font-size: 13px;
            margin-right: 10px;
        }

        .input-group input {
            width: 100%;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            font-family: inherit;
            font-size: 11px;
            color: #555;
        }

        .input-group input::placeholder {
            color: #aaa3a8;
        }

        .toggle-password {
            cursor: pointer;
            color: #8f8990 !important;
            margin: 0 !important;
        }

        .login-button {
            width: 100%;
            height: 39px;
            margin-top: 1px;
            border: none;
            border-radius: 8px;
            background: #e66c98;
            color: white;
            font-family: inherit;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-button:hover {
            background: #d95586;
            transform: translateY(-1px);
            box-shadow: 0 5px 12px rgba(220, 83, 133, 0.2);
        }

        .message {
            font-size: 11px;
            text-align: center;
            margin-top: 12px;
            color: #d95586;
            min-height: 16px;
        }

        @media (max-width: 600px) {
            body {
                padding: 12px;
                overflow-y: auto;
            }

            .browser {
                max-width: 100%;
            }

            .login-card {
                grid-template-columns: 1fr;
                max-width: calc(100% - 24px);
                margin: 25px auto;
            }

            .welcome-panel {
                padding: 22px 18px;
            }

            .classroom {
                height: 145px;
                max-width: 240px;
            }

            .welcome-panel h2 {
                font-size: 16px;
            }

            .form-panel {
                padding: 28px 25px;
            }

            .dots-top {
                right: 4%;
            }
        }
    </style>
</head>

<body>

    <div class="background-shape shape-top"></div>
    <div class="background-shape shape-bottom"></div>
    <div class="dots dots-top"></div>
    <div class="dots dots-bottom"></div>

    <main class="browser">
        <div class="browser-bar">
            <span class="browser-dot"></span>
            <span class="browser-dot"></span>
            <span class="browser-dot"></span>
        </div>

        <section class="login-card">

            <!-- PANEL KIRI -->
            <div class="welcome-panel">

                <div class="classroom">
                    <svg viewBox="0 0 280 180"
                         xmlns="http://www.w3.org/2000/svg">

                        <!-- Latar kelas -->
                        <rect width="280" height="180" fill="#f9d8e5"/>
                        <rect x="0" y="0" width="280" height="18"
                              fill="#f6c5d8"/>

                        <!-- Dinding dan lantai -->
                        <path d="M0 18 H280 V120 H0 Z"
                              fill="#fbe5ed"/>
                        <path d="M0 120 L280 120 L280 180 L0 180 Z"
                              fill="#f4bcd0"/>

                        <!-- Jendela -->
                        <rect x="7" y="28" width="44" height="83"
                              fill="#e889aa"/>
                        <rect x="12" y="33" width="34" height="72"
                              fill="#fff0f5"/>
                        <path d="M29 33 V105 M12 68 H46"
                              stroke="#e889aa" stroke-width="4"/>
                        <path d="M8 28 L50 48"
                              stroke="#e889aa" stroke-width="4"/>

                        <!-- Jam dinding -->
                        <circle cx="140" cy="37" r="12"
                                fill="#fff4f7" stroke="#e58bab"
                                stroke-width="2"/>
                        <path d="M140 30 V37 L145 40"
                              fill="none" stroke="#e58bab"
                              stroke-width="2"/>

                        <!-- Papan tulis -->
                        <rect x="87" y="54" width="111" height="57"
                              rx="2" fill="#e78baa"/>
                        <rect x="92" y="59" width="101" height="46"
                              fill="#f7d4e1"/>
                        <rect x="98" y="64" width="89" height="36"
                              fill="#f3c1d4"/>
                        <rect x="130" y="111" width="25" height="4"
                              fill="#df86a6"/>

                        <!-- Pot tanaman -->
                        <path d="M65 110 L86 110 L82 127 L69 127 Z"
                              fill="#e783a5"/>
                        <path d="M75 110 Q60 98 64 92 Q76 96 75 110"
                              fill="#d98eaa"/>
                        <path d="M75 110 Q88 92 92 100 Q87 110 75 110"
                              fill="#d98eaa"/>
                        <path d="M75 108 L75 92"
                              stroke="#c66f94" stroke-width="2"/>

                        <!-- Meja belakang kiri -->
                        <rect x="40" y="119" width="65" height="7"
                              fill="#e887a8"/>
                        <path d="M44 126 V150 M99 126 V150"
                              stroke="#d97c9d" stroke-width="4"/>
                        <rect x="37" y="116" width="70" height="6"
                              fill="#f6a9c4"/>

                        <!-- Kursi belakang -->
                        <rect x="44" y="130" width="20" height="19"
                              rx="2" fill="#ec91b0"/>
                        <rect x="82" y="130" width="20" height="19"
                              rx="2" fill="#ec91b0"/>

                        <!-- Meja depan kiri -->
                        <rect x="20" y="140" width="87" height="9"
                              fill="#e77fa2"/>
                        <path d="M25 149 V170 M101 149 V170"
                              stroke="#d87599" stroke-width="5"/>
                        <rect x="16" y="136" width="95" height="8"
                              rx="2" fill="#f29fbb"/>

                        <!-- Kursi depan kiri -->
                        <rect x="24" y="151" width="24" height="22"
                              rx="3" fill="#e783a5"/>
                        <rect x="78" y="151" width="24" height="22"
                              rx="3" fill="#e783a5"/>

                        <!-- Meja kanan belakang -->
                        <rect x="174" y="119" width="67" height="7"
                              fill="#e887a8"/>
                        <path d="M179 126 V151 M236 126 V151"
                              stroke="#d97c9d" stroke-width="4"/>
                        <rect x="171" y="116" width="73" height="6"
                              fill="#f6a9c4"/>

                        <!-- Kursi kanan -->
                        <rect x="176" y="129" width="23" height="21"
                              rx="3" fill="#e987a8"/>
                        <rect x="216" y="129" width="23" height="21"
                              rx="3" fill="#e987a8"/>

                        <!-- Meja kanan depan -->
                        <rect x="166" y="141" width="96" height="9"
                              fill="#e77fa2"/>
                        <path d="M173 150 V173 M255 150 V173"
                              stroke="#d87599" stroke-width="5"/>
                        <rect x="163" y="137" width="101" height="8"
                              rx="2" fill="#f29fbb"/>

                        <!-- Efek cahaya -->
                        <path d="M0 0 H280 V180 H0 Z"
                              fill="white" opacity="0.05"/>
                    </svg>
                </div>

                <h2>Peminjaman Ruang Kelas</h2>
                <p>Mudah, Cepat, dan Terorganisir</p>
                <div class="small-line"></div>

            </div>

            <!-- PANEL KANAN -->
            <div class="form-panel">

                <div class="logo">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <h1>Login</h1>
                <p class="subtitle">
                    Silakan masuk untuk melanjutkan
                </p>

                <form class="login-form" id="loginForm" action="login.php" method="POST">
                    <div class="input-group">
                        <i class="fa-regular fa-user"></i>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Username"
                            autocomplete="username"
                            required>
                    </div>

                    <div class="input-group">
                        <i class="fa-solid fa-lock"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Password"
                            autocomplete="current-password"
                            required>

                        <i class="fa-regular fa-eye toggle-password"
                           id="togglePassword"
                           title="Tampilkan password"
                           role="button"
                           tabindex="0"
                           aria-label="Tampilkan password"></i>
                    </div>

                    <button type="submit" class="login-button">
                        Masuk
                    </button>

                    <p class="message" id="message"></p>

                </form>

            </div>
        </section>
    </main>

    <script>
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        function changePasswordVisibility() {
            const isPassword = passwordInput.type === "password";
            passwordInput.type = isPassword ? "text" : "password";
            togglePassword.classList.toggle("fa-eye", !isPassword);
            togglePassword.classList.toggle("fa-eye-slash", isPassword);
            togglePassword.title = isPassword ? "Sembunyikan password": "Tampilkan password";
        }
        togglePassword.addEventListener("click", changePasswordVisibility);
        togglePassword.addEventListener("keydown", function(event) {
            if (event.key === "Enter" || event.key === " ") {
                event.preventDefault();
                changePasswordVisibility();
            }
        });
        // Validasi form demo
        document.getElementById("loginForm").addEventListener("submit", function(event) {
                //event.preventDefault();
                const username = document.getElementById("username").value.trim();
                const password = document.getElementById("password").value;
                const message = document.getElementById("message");
                if (!username || !password) {
                    event.preventDefault();
                    message.textContent = "Username dan password harus diisi!";
                    message.style.color = "red";
                }
            }
        );
    </script>

</body>
</html>