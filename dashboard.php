<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];
$level    = $_SESSION['level'];
$nama    = $_SESSION['nama'];
include 'conn/config.php'; // sesuaikan path

// Total Ruang Kelas
$queryRuang = "SELECT COUNT(*) AS total FROM ruang";
$resultRuang = mysqli_query($koneksi, $queryRuang);
$totalRuang = mysqli_fetch_assoc($resultRuang)['total'];

// Total Reservasi
$queryReservasi = "SELECT COUNT(*) AS total FROM reservasi";
$resultReservasi = mysqli_query($koneksi, $queryReservasi);
$totalReservasi = mysqli_fetch_assoc($resultReservasi)['total'];

// Total Pengguna
$queryPengguna = "SELECT COUNT(*) AS total FROM pengguna";
$resultPengguna = mysqli_query($koneksi, $queryPengguna);
$totalPengguna = mysqli_fetch_assoc($resultPengguna)['total'];

// Reservasi Hari Ini
$hariIni = date('Y-m-d');
$queryHariIni = "SELECT COUNT(*) AS total FROM reservasi WHERE tanggal = '$hariIni'";
$resultHariIni = mysqli_query($koneksi, $queryHariIni);
$reservasiHariIni = mysqli_fetch_assoc($resultHariIni)['total'];

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Study Room</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --pink: #e96d9b;
            --pink-dark: #d95386;
            --pink-light: #ffe5ef;
            --pink-pale: #fff5f9;
            --text: #5e5360;
            --muted: #a49aa3;
            --border: #f5e5ec;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
  margin: 0;
  background: #fff5f9;
  color: #5e5360;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
}


        button, input {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .app {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

        .sidebar {
  width: 205px;
  flex-shrink: 0;
  min-height: 100vh;
  padding: 22px 13px;
  background: #ffe4ee;
  display: flex;
  flex-direction: column;
}

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 8px 27px;
        }

        .brand-icon {
            width: 37px;
            height: 37px;
            border-radius: 11px;
            background: #f7c0d5;
            color: var(--pink-dark);
            display: grid;
            place-items: center;
            font-size: 20px;
        }

        .brand-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--pink-dark);
            line-height: 1.3;
        }

        .brand-name small {
            display: block;
            font-size: 10px;
            font-weight: 500;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .logout {
  margin-top: auto;
}

        .nav-link {
            min-height: 38px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 9px;
            color: #a75d7a;
            transition: 0.2s;
        }

        .nav-link i {
            width: 15px;
            text-align: center;
            font-size: 14px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #f8bfd5;
            color: #b84474;
        }

        .nav-link.active {
            font-weight: 600;
        }

        .nav-link .arrow {
            margin-left: auto;
            font-size: 10px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 35px;
        }

        /* AREA UTAMA */

        .main {
  flex: 1;
  min-width: 0;
  padding: 20px;
}

        .topbar {
  height: 39px;
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 20px;
}

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--pink-dark);
            font-size: 20px;
        }

        .search-box {
            flex: 1;
            max-width: 420px;
            height: 39px;
            background: #fce8f0;
            border: 1px solid transparent;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 14px;
            color: #b68a9b;
        }

        .search-box:focus-within {
            border-color: #efb3cb;
            background: white;
        }

        .search-box input {
            width: 100%;
            min-width: 0;
            background: transparent;
            border: none;
            outline: none;
            color: var(--text);
            font-size: 11px;
        }

        .search-box input::placeholder {
            color: #b6a5af;
        }

        .topbar-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 17px;
        }

        .icon-button {
            border: none;
            background: none;
            color: #c86c91;
            font-size: 16px;
            position: relative;
        }

        .notification-dot {
            position: absolute;
            top: -3px;
            right: -3px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ed668e;
            border: 1px solid white;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 11px;
        }

        .avatar {
            height: 31px;
            width: 31px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: var(--pink-dark);
            background: #f8d1e0;
            font-size: 13px;
        }

        /* BANNER */

        .welcome-banner {
            min-height: 150px;
            border-radius: 13px;
            padding: 25px;
            margin-bottom: 19px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            overflow: hidden;
            position: relative;
            background: linear-gradient(110deg, #ffe5ef, #f8bfd7);
        }

        .welcome-banner::before {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            background: #f7c4d9;
            opacity: 0.4;
            border-radius: 50%;
            top: -120px;
            right: 36%;
        }

        .welcome-text {
            position: relative;
            z-index: 1;
        }

        .welcome-text h1 {
            font-size: 23px;
            line-height: 1.5;
            font-weight: 700;
            color: #d95487;
            margin-bottom: 3px;
        }

        .welcome-text h2 {
            font-size: 15px;
            font-weight: 500;
            color: #76536a;
            margin-bottom: 10px;
        }

        .welcome-text p {
            font-size: 11px;
            color: #967e8d;
        }

        .banner-art {
            width: 230px;
            flex-shrink: 0;
            align-self: stretch;
            margin: -10px -8px -25px 0;
        }

        .banner-art svg {
            width: 100%;
            height: 100%;
        }

        /* KARTU STATISTIK */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 17px 13px;
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 0;
            box-shadow: 0 3px 12px rgba(211, 133, 165, 0.04);
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            background: #ffe7f0;
            color: #df6392;
            font-size: 17px;
        }

        .stat-info {
            min-width: 0;
        }

        .stat-info p {
            font-size: 10px;
            color: #958b94;
            margin-bottom: 4px;
        }

        .stat-info h3 {
            color: #795065;
            font-size: 23px;
            line-height: 1.2;
            font-weight: 600;
        }

        /* PANEL KONTEN */

        .content-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 16px;
            align-items: stretch;
        }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 19px;
            min-width: 0;
            box-shadow: 0 3px 12px rgba(211, 133, 165, 0.04);
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 18px;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #76536a;
            font-size: 13px;
            font-weight: 600;
        }

        .panel-title i {
            color: var(--pink-dark);
        }

        .see-all {
            color: #cc7596;
            font-size: 10px;
            white-space: nowrap;
        }

        .see-all:hover {
            color: var(--pink-dark);
            text-decoration: underline;
        }


        .room-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 13px;
        }

        .room-card {
            min-width: 0;
            padding: 14px 5px 12px;
            text-align: center;
            border-radius: 9px;
            background: #fff4f8;
            border: 1px solid transparent;
            transition: 0.2s;
        }

        .room-card:hover {
            border-color: #f2bfd2;
            transform: translateY(-2px);
        }

        .room-icon {
            height: 45px;
            display: grid;
            place-items: center;
            font-size: 29px;
            color: #e77aa1;
            margin-bottom: 5px;
        }

        .room-card h4 {
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 7px;
            color: #786270;
        }

.status.available {
    background: #e8f5e9;
    color: #2e7d32;
}

.status.unavailable {
    background: #fce4ec;
    color: #c62828;
}

        .available {
            color: #d45d8c;
            background: #fbd9e6;
        }

        .approved {
            color: #389b76;
            background: #def6e9;
        }

        .pending {
            color: #b98229;
            background: #fff0d1;
        }

        .rejected {
            color: #c84f66;
            background: #ffe0e6;
        }


        .reservation-list {
            display: flex;
            flex-direction: column;
        }

        .reservation-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 0;
            border-bottom: 1px solid #f8edf2;
        }

        .reservation-item:last-child {
            border-bottom: none;
        }

        .reservation-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: #ffebf2;
            color: #df6a97;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            font-size: 14px;
        }

        .reservation-info {
            min-width: 0;
            flex: 1;
        }

        .reservation-info h4 {
            color: #77616e;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .reservation-info p {
            color: #a69aa3;
            font-size: 9px;
            line-height: 1.6;
        }

        .reservation-item .status {
            flex-shrink: 0;
        }

        /* NOTIFIKASI */

        .notice {
            display: none;
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 9px;
            color: #a84c75;
            background: #ffe3ee;
            border: 1px solid #f6cadb;
        }

        .notice.show {
            display: block;
        }


        @media (max-width: 1100px) {
            .sidebar {
                width: 175px;
            }

            .main {
                padding: 16px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: -220px;
                z-index: 20;
                width: 205px;
                box-shadow: 5px 0 20px rgba(180, 90, 125, 0.1);
            }

            .sidebar.open {
                left: 0;
            }

            .main {
                width: 100%;
                padding: 13px;
            }

            .menu-toggle {
                display: block;
            }

            .topbar {
                gap: 10px;
            }

            .topbar-right {
                gap: 12px;
            }

            .profile-name {
                display: none;
            }

            .welcome-banner {
                min-height: 130px;
                padding: 18px;
            }

            .welcome-text h1 {
                font-size: 18px;
            }

            .welcome-text h2 {
                font-size: 12px;
            }

            .welcome-text p {
                font-size: 10px;
            }

            .banner-art {
                width: 120px;
                margin-right: -20px;
            }

            .stat-card {
                padding: 13px 10px;
                gap: 8px;
            }

            .stat-icon {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }

            .stat-info p {
                font-size: 9px;
            }

            .stat-info h3 {
                font-size: 20px;
            }

            .panel {
                padding: 13px;
            }
        }

        @media (max-width: 400px) {
            .stats-grid {
                gap: 8px;
            }

            .room-grid {
                gap: 7px;
            }

            .room-card {
                padding: 10px 3px;
            }

            .banner-art {
                display: none;
            }

            .reservation-item {
                gap: 7px;
            }

            .reservation-item .status {
                font-size: 8px;
                padding: 4px 5px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <a href="dashboard.html" class="brand">
            <div class="brand-icon">
                <i class="fa-solid fa-book-open"></i>
            </div>
            <div class="brand-name">
                Study Room
                <small>Peminjaman Ruang Kelas</small>
            </div>
        </a>

        <nav class="nav-menu">

            <a href="dashboard.php" class="nav-link active">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="reservasi.php" class="nav-link">
                <i class="fa-regular fa-calendar-check"></i>
                <span>Reservasi</span>
            </a>

            <a href="jadwal_ruang_kelas.php" class="nav-link">
                <i class="fa-regular fa-calendar-days"></i>
                <span>Jadwal</span>
            </a>

            <a href="data-master.html" class="nav-link">
                <i class="fa-solid fa-table-list"></i>
                <span>Data Master</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>

        </nav>

        <div class="sidebar-bottom">
            <a href="index.php" class="nav-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>

    </aside>

    <main class="main">

        <header class="topbar">

            <button class="menu-toggle" id="menuToggle"
                    aria-label="Buka menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <label class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" id="searchInput"
                       placeholder="Cari ruang kelas...">
            </label>

            <div class="topbar-right">

                <button class="icon-button" id="notificationButton"
                        title="Notifikasi">
                    <i class="fa-regular fa-bell"></i>
                    <span class="notification-dot"></span>
                </button>

                <div class="profile">
                    <div class="avatar">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span class="profile-name"><?= htmlspecialchars($nama);?></span>
                    <i class="fa-solid fa-chevron-down"
                       style="font-size:9px"></i>
                </div>

            </div>
        </header>

        <div class="notice" id="notice"></div>

        <section class="welcome-banner">

            <div class="welcome-text">
                <h1>Selamat Datang,</h1>
                <h2>di Aplikasi Peminjaman Ruang Kelas</h2>
                <p>
                    Kelola peminjaman ruang kelas dengan mudah,
                    cepat, dan terorganisir.
                </p>
            </div>

            <div class="banner-art">
                <svg viewBox="0 0 250 150"
                     xmlns="http://www.w3.org/2000/svg">

                    <rect width="250" height="150" fill="#f9c9dc"/>

                    <path d="M0 0 H250 V115 H0Z" fill="#f8d5e2"/>
                    <path d="M0 115 L250 115 L250 150 L0 150Z"
                          fill="#f1b5ce"/>

                    <rect x="202" y="12" width="31" height="54"
                          fill="#e878a0"/>
                    <rect x="207" y="17" width="21" height="44"
                          fill="#ffeaf2"/>
                    <path d="M217 17 V61 M207 39 H228"
                          stroke="#e878a0" stroke-width="3"/>

                    <circle cx="135" cy="14" r="7"
                            fill="#fff0f6" stroke="#df6c98"
                            stroke-width="1.5"/>
                    <path d="M135 10 V14 L138 16"
                          fill="none" stroke="#df6c98"
                          stroke-width="1.5"/>

                    <rect x="83" y="28" width="80" height="39"
                          rx="2" fill="#df6b98"/>
                    <rect x="87" y="32" width="72" height="31"
                          fill="#ffe8f1"/>

                    <rect x="103" y="76" width="53" height="5"
                          fill="#d96796"/>
                    <rect x="107" y="81" width="45" height="23"
                          fill="#f6a5c3"/>
                    <path d="M112 104 V120 M147 104 V120"
                          stroke="#d96796" stroke-width="3"/>

                    <rect x="15" y="83" width="13" height="20"
                          fill="#e67ca3"/>
                    <path d="M21 83 Q4 72 10 65 Q23 70 21 83
                             M21 83 Q37 66 39 75 Q34 84 21 83
                             M21 83 V63"
                          fill="#cf7a9a"/>

                    <rect x="25" y="105" width="48" height="5"
                          fill="#df709a"/>
                    <path d="M30 110 V133 M68 110 V133"
                          stroke="#d96796" stroke-width="3"/>
                    <rect x="34" y="115" width="14" height="14"
                          fill="#e983a9"/>
                    <rect x="53" y="115" width="14" height="14"
                          fill="#e983a9"/>

                    <rect x="174" y="105" width="51" height="5"
                          fill="#df709a"/>
                    <path d="M180 110 V133 M219 110 V133"
                          stroke="#d96796" stroke-width="3"/>
                    <rect x="183" y="115" width="14" height="14"
                          fill="#e983a9"/>
                    <rect x="202" y="115" width="14" height="14"
                          fill="#e983a9"/>

                    <circle cx="35" cy="20" r="18"
                            fill="#ffe8f1" opacity=".5"/>
                    <circle cx="180" cy="90" r="25"
                            fill="#f7b6cf" opacity=".35"/>

                </svg>
            </div>

        </section>

        <!-- STATISTIK -->
        <section class="stats-grid">

            <article class="stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-door-open"></i>
                </div>
                <div class="stat-info">
                    <p>Total Ruang Kelas</p>
                    <h3 id="totalRooms"><?= $totalRuang ?></h3>
                </div>
            </article>

            <article class="stat-card">
                <div class="stat-icon">
                    <i class="fa-regular fa-calendar-check"></i>
                </div>
                <div class="stat-info">
                    <p>Total Reservasi</p>
                    <h3 id="totalReservations"><?= $totalReservasi ?></h3>
                </div>
            </article>

            <article class="stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="stat-info">
                    <p>Pengguna Terdaftar</p>
                    <h3><?= $totalPengguna ?></h3>
                </div>
            </article>

            <article class="stat-card">
                <div class="stat-icon">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <div class="stat-info">
                    <p>Reservasi Hari Ini</p>
                    <h3><?= $reservasiHariIni ?></h3>
                </div>
            </article>
        </section>
<section class="content-grid">

    <!-- ==================== RUANG KELAS TERSEDIA ==================== -->
    <div class="panel">
        <div class="panel-header">
            <h3 class="panel-title">
                <i class="fa-regular fa-building"></i>
                Ruang Kelas Tersedia
            </h3>
            <a href="reservasi.php" class="see-all">Lihat Semua →</a>
        </div>

        <div class="room-grid" id="roomGrid">
    <?php
    include 'conn/config.php'; // sesuaikan path

    $queryRuang = "SELECT * FROM ruang ORDER BY nama_ruang ASC";
    $resultRuang = mysqli_query($koneksi, $queryRuang);

    if ($resultRuang && mysqli_num_rows($resultRuang) > 0):
        while ($row = mysqli_fetch_assoc($resultRuang)):

            // Cek status aktif
            if ($row['status_aktif'] == 0) {
                $statusClass = 'available';
                $statusText  = 'Tersedia';
            } else {
                $statusClass = 'unavailable';
                $statusText  = 'Tidak Tersedia';
            }
    ?>
        <article class="room-card" data-room="<?= htmlspecialchars($row['nama_ruang']) ?>">
            <div class="room-icon">
                <i class="fa-solid fa-chalkboard"></i>
            </div>
            <h4><?= htmlspecialchars($row['nama_ruang']) ?></h4>
            <span class="status <?= $statusClass ?>">
                <?= $statusText ?>
            </span>
        </article>
    <?php
        endwhile;
    else:
    ?>
        <p>Tidak ada data ruangan.</p>
    <?php endif; ?>
</div>
</div>

    <!-- ==================== RESERVASI TERBARU ==================== -->
    <div class="panel">
        <div class="panel-header">
            <h3 class="panel-title">
                <i class="fa-regular fa-calendar-check"></i>
                Reservasi Terbaru
            </h3>
            <a href="reservasi.php" class="see-all">Lihat Semua →</a>
        </div>

        <div class="reservation-list" id="reservationList">
            <?php
            $queryReservasi = "SELECT r.*, rg.nama_ruang 
                               FROM reservasi r
                               JOIN ruang rg ON r.id_ruang = rg.id_ruang
                               ORDER BY r.tanggal DESC, r.jam_mulai DESC
                               LIMIT 5";
            $resultReservasi = mysqli_query($koneksi, $queryReservasi);

            if ($resultReservasi && mysqli_num_rows($resultReservasi) > 0):
                while ($row = mysqli_fetch_assoc($resultReservasi)):

                    // Format tanggal
                    $tanggal = date('d M Y', strtotime($row['tanggal']));
                    $jam = substr($row['jam_mulai'], 0, 5) . ' - ' . substr($row['jam_selesai'], 0, 5);

                    // Status
                    $status = strtolower($row['status']);
                    if ($status == 'aktif' || $status == 'disetujui') {
                        $statusClass = 'approved';
                        $statusText  = 'Disetujui';
                    } elseif ($status == 'menunggu' || $status == 'pending') {
                        $statusClass = 'pending';
                        $statusText  = 'Menunggu';
                    } else {
                        $statusClass = 'pending';
                        $statusText  = ucfirst($status);
                    }
            ?>
                <article class="reservation-item">
                    <div class="reservation-icon">
                        <i class="fa-solid fa-door-open"></i>
                    </div>
                    <div class="reservation-info">
                        <h4><?= htmlspecialchars($row['nama_ruang']) ?></h4>
                        <p><?= $tanggal ?> &nbsp; | &nbsp; <?= $jam ?></p>
                    </div>
                    <span class="status <?= $statusClass ?>"><?= $statusText ?></span>
                </article>
            <?php
                endwhile;
            else:
            ?>
                <p>Belum ada reservasi.</p>
            <?php endif; ?>
        </div>
    </div>

</section>

    </main>

</div>

<script>
    const sidebar = document.getElementById("sidebar");
    const menuToggle = document.getElementById("menuToggle");

    menuToggle.addEventListener("click", function () {
        sidebar.classList.toggle("open");
    });

    const notice = document.getElementById("notice");

    document.getElementById("notificationButton")
        .addEventListener("click", function () {
            notice.textContent =
                "Anda memiliki reservasi yang perlu diperiksa.";
            notice.classList.toggle("show");
        });

    const searchInput = document.getElementById("searchInput");

    searchInput.addEventListener("input", function () {
        const keyword = this.value.toLowerCase().trim();

        document.querySelectorAll(".room-card").forEach(function (room) {
            const match = room.textContent.toLowerCase().includes(keyword);
            room.style.display = match ? "" : "none";
        });

        document.querySelectorAll(".reservation-item")
            .forEach(function (reservation) {
                const match = reservation.textContent
                    .toLowerCase().includes(keyword);

                reservation.style.display = match ? "" : "none";
            });
    });

    document.querySelectorAll(".nav-link").forEach(function (link) {
        link.addEventListener("click", function () {
            if (this.getAttribute("href") !== "index.php") {
                document.querySelectorAll(".nav-link")
                    .forEach(function (item) {
                        item.classList.remove("active");
                    });

                this.classList.add("active");
            }
        });
    }); 
</script>

</body>
</html>