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
      --pink: #e94f91;
      --pink-dark: #d83c80;
      --pink-light: #fff0f7;
      --pink-sidebar: #fbe2ef;
      --text: #000000;
      --muted: #9d8995;
      --line: #f2e5ec;
      --bg: #fff9fc;
    }

    * { box-sizing: border-box; }
    body {
  margin: 0;
  background: #fff5f9;
  color: #080808e0;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
}


    .app { display: flex; min-height: 100vh; }
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
      padding: 0 9px 27px;
      color: var(--pink-dark);
      font-weight: 800;
      font-size: 13px;
      line-height: 1.25;
    }
    .brand-icon {
      width: 32px;
      height: 32px;
      display: grid;
      place-items: center;
      font-size: 22px;
      background: #f7c7df;
      border-radius: 10px;
    }
    .nav-menu { display: grid; gap: 5px; position: relative; z-index: 1; }

    .logout {
  margin-top: auto;
}

    .nav-link-custom {
      width: 100%;
      border: 0;
      background: transparent;
      display: flex;
      align-items: center;
      gap: 13px;
      color: #8c687b;
      padding: 11px 12px;
      border-radius: 10px;
      text-decoration: none;
      text-align: left;
      transition: .2s;
      cursor: pointer;
    }
    .nav-link-custom i { width: 17px; color: var(--pink); font-size: 15px; }
    .nav-link-custom:hover, .nav-link-custom.active {
      background: #f7c7df;
      color: var(--pink-dark);
      font-weight: 700;
    }
    .nav-link-custom .chevron { margin-left: auto; font-size: 10px; }
    .logout { margin-top: auto; position: relative; z-index: 1; }
    .sidebar-decoration {
      position: absolute;
      left: 8px;
      bottom: 48px;
      font-size: 82px;
      color: #f4bdd8;
      opacity: .45;
      transform: rotate(-18deg);
      pointer-events: none;
    }

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
    .search-box {
      display: flex;
      align-items: center;
      gap: 10px;
      width: min(340px, 55%);
      padding: 10px 13px;
      border-radius: 9px;
      background: #fceaf3;
      color: #b58da3;
    }
    .search-box input {
      width: 100%;
      border: 0;
      outline: 0;
      background: transparent;
      font-size: 12px;
      color: var(--text);
    }
    .top-actions { display: flex; align-items: center; gap: 18px; }
    .icon-button {
      border: 0;
      background: transparent;
      color: var(--pink);
      font-size: 17px;
      position: relative;
    }
    .notification-dot {
      width: 6px; height: 6px; border-radius: 50%;
      background: #e74b91; position: absolute; top: 0; right: -1px;
    }
    .admin { display: flex; align-items: center; gap: 9px; color: #8a657b; }
    .admin-avatar {
      width: 30px; height: 30px; border-radius: 50%;
      display: grid; place-items: center;
      color: var(--pink); background: #f8d5e7; font-size: 14px;
    }

    .hero {
      min-height: 115px;
      border-radius: 14px;
      padding: 23px 25px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 15px;
      background: linear-gradient(105deg, #fce3f0, #fbd8e9);
      overflow: hidden;
      margin-bottom: 18px;
    }
    .hero-left { display: flex; align-items: center; gap: 17px; }
    .hero-icon {
      width: 42px; height: 42px; border-radius: 12px;
      display: grid; place-items: center;
      background: #f8c9df; color: var(--pink); font-size: 24px;
    }
    .hero h1 { margin: 0 0 6px; font-size: clamp(20px, 2.2vw, 27px); color: var(--pink-dark); font-weight: 800; }
    .hero p { margin: 0; font-size: 12px; color: #927789; }
    .hero-art { display: flex; align-items: center; gap: 18px; color: #e98bb6; font-size: 55px; opacity: .75; padding-right: 8px; }
    .hero-art .window { font-size: 46px; }

    .content-grid { display: grid; grid-template-columns: minmax(0, 1fr) 220px; gap: 14px; align-items: start; }
    .panel {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 12px;
      padding: 12px;
      box-shadow: 0 4px 15px rgba(183, 115, 151, .035);
    }
    .filters { display: flex; align-items: center; gap: 10px; margin-bottom: 13px; }
    .filter-select {
      min-width: 0;
      width: 230px;
      border: 1px solid var(--line);
      background: #fffafd;
      color: #8a6c7c;
      padding: 9px 10px;
      border-radius: 8px;
      font-size: 11px;
      outline-color: #f4a5c8;
    }
    .filter-select.room-filter { width: 190px; }
    .refresh-btn {
      margin-left: auto;
      border: 0; border-radius: 8px;
      padding: 9px 13px;
      background: var(--pink); color: white;
      font-size: 11px; white-space: nowrap;
    }
    .refresh-btn:hover { background: var(--pink-dark); }

    .table-wrap { width: 100%; overflow-x: auto; border: 1px solid #f3e8ee; border-radius: 8px; }
    .schedule-table { width: 100%; min-width: 670px; border-collapse: collapse; text-align: center; }
    .schedule-table th {
      background: #fff0f7;
      color: #936b80;
      font-weight: 700;
      font-size: 10px;
      padding: 13px 7px;
      border: 1px solid #f1e5eb;
      white-space: nowrap;
    }
    .schedule-table td {
      height: 29px;
      padding: 7px 5px;
      border: 1px solid #f2e8ed;
      color: #190ee0;
      font-size: 10px;
      white-space: nowrap;
    }
    .schedule-table td:first-child { color: #786273; font-weight: 600; background: #fffafd; }
    .schedule-table .break-row td { background: #fff0f7; color: #d16e9b; font-size: 9px; }
    .schedule-table .booked { background: #ffe3ef; color: #c83f7e; font-weight: 700; }
    .side-panel { display: grid; gap: 12px; }
    .panel-title { margin: 0 0 12px; color: var(--pink-dark); font-weight: 800; font-size: 13px; }
    .panel-title i { margin-right: 7px; }
    .calendar-heading { display: flex; align-items: center; justify-content: space-between; margin-bottom: 9px; }
    .calendar-heading button {
      border: 0; background: transparent; color: #b07b96; padding: 2px 5px;
    }
    .calendar-month { font-weight: 700; color: #9b7188; font-size: 11px; }
    .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 3px; text-align: center; }
    .calendar-grid span {
      min-height: 22px; display: grid; place-items: center;
      font-size: 10px; color: #8d7c88; border-radius: 50%;
    }
    .calendar-grid .weekday { color: #b18da1; font-weight: 700; font-size: 9px; }
    .calendar-grid .muted-day { color: #d5cbd1; }
    .calendar-grid .day { cursor: pointer; }
    .calendar-grid .day:hover { background: #fce0ed; }
    .calendar-grid .selected { background: var(--pink); color: white; font-weight: 800; }
    .legend { display: grid; gap: 11px; }
    .legend-item { display: flex; align-items: center; gap: 9px; color: #9c8a95; font-size: 11px; }
    .dot { width: 11px; height: 11px; border-radius: 50%; display: inline-block; flex-shrink: 0; }
    .available { background: #68d1b7; }
    .reserved { background: #f17eae; }
    .process { background: #f5bc56; }
    .unavailable { background: #b8b9c2; }
    .status-message { min-height: 16px; margin-top: 9px; color: #bd5c8b; font-size: 11px; }

    @media (max-width: 1000px) {
      .sidebar { width: 175px; }
      .main { padding: 0 13px 20px; }
      .content-grid { grid-template-columns: minmax(0, 1fr) 195px; }
      .hero-art { font-size: 40px; }
    }
    @media (max-width: 760px) {
      .sidebar { width: 64px; padding: 16px 7px; }
      .brand { justify-content: center; padding: 0 0 25px; }
      .brand-name, .nav-link-custom span, .nav-link-custom .chevron { display: none; }
      .nav-link-custom { justify-content: center; padding: 12px 5px; }
      .nav-link-custom i { width: auto; font-size: 17px; }
      .main { padding: 0 10px 18px; }
      .topbar { height: 55px; }
      .admin span, .admin > i { display: none; }
      .hero { padding: 18px; }
      .hero-art { display: none; }
      .content-grid { grid-template-columns: 1fr; }
      .side-panel { grid-template-columns: repeat(2, minmax(0, 1fr)); }
      .filter-select { width: 50%; }
      .filter-select.room-filter { width: 35%; }
    }
    @media (max-width: 480px) {
      .hero-left { align-items: flex-start; gap: 10px; }
      .hero-icon { width: 35px; height: 35px; font-size: 19px; }
      .hero h1 { font-size: 19px; }
      .hero p { line-height: 1.5; }
      .filters { flex-wrap: wrap; }
      .filter-select, .filter-select.room-filter { flex: 1 1 42%; width: auto; }
      .refresh-btn { margin-left: 0; }
      .side-panel { grid-template-columns: 1fr; }
      .search-box { width: 70%; }
      .top-actions { gap: 8px; }
    }
  </style>
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
.available {
  background-color: #d4edda;
  color: #155724;
}

.reserved {
  background-color: #f8d7da;
  color: #1c1f72;
  font-weight: 500;
}

.booked {
  background-color: #fff3cd;
  color: #3e0485;
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
.date-picker {
  padding: 8px 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
  cursor: pointer;
  background-color: white;
}

.date-picker:focus {
  outline: none;
  border-color: #4a90e2;
  box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
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

        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 500;
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

     
    .refresh-btn {
      margin-left: auto;
      border: 0; border-radius: 8px;
      padding: 9px 13px;
      background: var(--pink); color: white;
      font-size: 11px; white-space: nowrap;
    }
    .refresh-btn:hover { background: var(--pink-dark); }

    .table-wrap { width: 100%; overflow-x: auto; border: 1px solid #f3e8ee; border-radius: 8px; }
    .schedule-table { width: 100%; min-width: 670px; border-collapse: collapse; text-align: center; }
    .schedule-table th {
      background: #fff0f7;
      color: #936b80;
      font-weight: 700;
      font-size: 10px;
      padding: 13px 7px;
      border: 1px solid #f1e5eb;
      white-space: nowrap;
    }
    .schedule-table td {
      height: 29px;
      padding: 7px 5px;
      border: 1px solid #f2e8ed;
      color: #a995a1;
      font-size: 10px;
      white-space: nowrap;
    }
    .schedule-table td:first-child { color: #050405; font-weight: 600; background: #fffafd; }
    .schedule-table .break-row td { background: #fff0f7; color: #d16e9b; font-size: 9px; }
    .schedule-table .booked { background: #ffe3ef; color: #c83f7e; font-weight: 700; }
    .side-panel { display: grid; gap: 12px; }
    .panel-title { margin: 0 0 12px; color: var(--pink-dark); font-weight: 800; font-size: 13px; }
    .panel-title i { margin-right: 7px; }
    .calendar-heading { display: flex; align-items: center; justify-content: space-between; margin-bottom: 9px; }
    .calendar-heading button {
      border: 0; background: transparent; color: #b07b96; padding: 2px 5px;
    }
    .calendar-month { font-weight: 700; color: #9b7188; font-size: 11px; }
    .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 3px; text-align: center; }
    .calendar-grid span {
      min-height: 22px; display: grid; place-items: center;
      font-size: 10px; color: #060606; border-radius: 50%;
    }
    .calendar-grid .weekday { color: #b18da1; font-weight: 700; font-size: 9px; }
    .calendar-grid .muted-day { color: #d5cbd1; }
    .calendar-grid .day { cursor: pointer; }
    .calendar-grid .day:hover { background: #fce0ed; }
    .calendar-grid .selected { background: var(--pink); color: white; font-weight: 800; }
    .legend { display: grid; gap: 11px; }
    .legend-item { display: flex; align-items: center; gap: 9px; color: #010101; font-size: 11px; }
    .dot { width: 11px; height: 11px; border-radius: 50%; display: inline-block; flex-shrink: 0; }
    .available { background: #68d1b7; }
    .reserved { background: #f17eae; }
    .process { background: #f5bc56; }
    .unavailable { background: #b8b9c2; }
    .status-message { min-height: 16px; margin-top: 9px; color: #010101; font-size: 11px; }
   .filter-select.room-filter { width: 190px; }
    @media (max-width: 1000px) {
      .sidebar { width: 175px; }
      .main { padding: 0 13px 20px; }
      .content-grid { grid-template-columns: minmax(0, 1fr) 195px; }
      .hero-art { font-size: 40px; }
    }
        .filters { display: flex; align-items: center; gap: 10px; margin-bottom: 13px; }
    @media (max-width: 760px) {
      .sidebar { width: 64px; padding: 16px 7px; }
      .brand { justify-content: center; padding: 0 0 25px; }
      .brand-name, .nav-link-custom span, .nav-link-custom .chevron { display: none; }
      .nav-link-custom { justify-content: center; padding: 12px 5px; }
      .nav-link-custom i { width: auto; font-size: 17px; }
      .main { padding: 0 10px 18px; }
      .topbar { height: 55px; }
      .admin span, .admin > i { display: none; }
      .hero { padding: 18px; }
      .hero-art { display: none; }
      .content-grid { grid-template-columns: 1fr; }
      .side-panel { grid-template-columns: repeat(2, minmax(0, 1fr)); }
      .filter-select { width: 50%; }
      .filter-select.room-filter { width: 35%; }
    }
    @media (max-width: 480px) {
      .hero-left { align-items: flex-start; gap: 10px; }
      .hero-icon { width: 35px; height: 35px; font-size: 19px; }
      .hero h1 { font-size: 19px; }
      .hero p { line-height: 1.5; }
      .filters { flex-wrap: wrap; }
      .filter-select, .filter-select.room-filter { flex: 1 1 42%; width: auto; }
      .refresh-btn { margin-left: 0; }
      .side-panel { grid-template-columns: 1fr; }
      .search-box { width: 70%; }
      .top-actions { gap: 8px; }
    }
    </style>
    
</head>

<body>

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <a href="dashboard_v1.html" class="brand">
            <div class="brand-icon">
                <i class="fa-solid fa-book-open"></i>
            </div>
            <div class="brand-name">
                Study Room
                <small>Peminjaman Ruang Kelas</small>
            </div>
        </a>

        <nav class="nav-menu">

            <a href="dashboard.php" class="nav-link">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="reservasi.php" class="nav-link">
                <i class="fa-regular fa-calendar-check"></i>
                <span>Reservasi</span>
            </a>

            <a href="jadwal_ruang_kelas.html" class="nav-link active">
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
            <a href="login.html" class="nav-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>

    </aside>

 
  <main class="main">
    <header class="topbar">
      <label class="search-box">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" id="searchInput" placeholder="Cari ruang kelas...">
      </label>
      <div class="top-actions">
        <button class="icon-button" aria-label="Notifikasi" onclick="alert('Belum ada notifikasi baru.')">
          <i class="fa-regular fa-bell"></i><span class="notification-dot"></span>
        </button>
        <div class="admin">
          <div class="admin-avatar"><i class="fa-solid fa-user"></i></div>
          <span>Admin</span><i class="fa-solid fa-chevron-down" style="font-size:10px"></i>
        </div>
      </div>
    </header>

    <section class="hero">
      <div class="hero-left">
        <div class="hero-icon"><i class="fa-regular fa-calendar-days"></i></div>
        <div>
          <h1>Jadwal Ruang Kelas</h1>
          <p>Lihat jadwal peminjaman ruang kelas berdasarkan tanggal dan waktu.</p>
        </div>
      </div>
      <div class="hero-art" aria-hidden="true">
        <i class="fa-solid fa-seedling"></i>
        <i class="fa-solid fa-chalkboard"></i>
        <i class="fa-regular fa-window-maximize window"></i>
      </div>
    </section>

    <section class="content-grid">
      <div class="panel">
        <div class="filters">
<div class="filters">
  <input 
    type="date" 
    class="filter-select date-picker" 
    id="dateFilter" 
    aria-label="Pilih tanggal"
    min="<?php echo date('Y-m-d'); ?>"   <!-- Tidak bisa pilih tanggal lampau -->
  >
</div>
<select class="filter-select room-filter" id="roomFilter" aria-label="Pilih ruangan">
    <option value="all">▤　Semua Ruang</option>
    <?php
    include 'conn\config.php'; // Pastikan path koneksi benar
    $query = "SELECT nama_ruang FROM ruang ORDER BY nama_ruang ASC";
    $result = mysqli_query($koneksi, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nama_ruang = htmlspecialchars($row['nama_ruang']);
            echo "<option value=\"$nama_ruang\">$nama_ruang</option>";
        }
    }
    ?>
</select>
        <button class="refresh-btn" id="refreshBtn"><i class="fa-solid fa-arrows-rotate"></i>　Refresh</button>
        </div>
        <div class="table-wrap">
         <table class="schedule-table" id="scheduleTable">
  <thead>
    <tr id="scheduleHeader">
      <th>Waktu</th>
      <!-- Kolom ruangan akan diisi oleh JavaScript -->
    </tr>
  </thead>
  <tbody id="scheduleBody"></tbody>
</table>
        </div>
        <div class="status-message" id="statusMessage" aria-live="polite"></div>
      </div>

      <aside class="side-panel">
        <section class="panel">
          <h2 class="panel-title"><i class="fa-regular fa-calendar"></i> Kalender</h2>
          <div class="calendar-heading">
            <button id="prevMonth" aria-label="Bulan sebelumnya"><i class="fa-solid fa-chevron-left"></i></button>
            <span class="calendar-month" id="calendarMonth">Oktober 2025</span>
            <button id="nextMonth" aria-label="Bulan berikutnya"><i class="fa-solid fa-chevron-right"></i></button>
          </div>
          <div class="calendar-grid" id="calendarGrid"></div>
        </section>

        <section class="panel">
          <h2 class="panel-title">Keterangan Status</h2>
          <div class="legend">
            <div class="legend-item"><span class="dot available"></span>Tersedia</div>
            <div class="legend-item"><span class="dot reserved"></span>Sudah Dipesan</div>
            <div class="legend-item"><span class="dot process"></span>Dalam Proses</div>
            <div class="legend-item"><span class="dot unavailable"></span>Tidak Tersedia</div>
          </div>
        </section>
      </aside>
    </section>
  </main>
</div>

<script>
const times = [
  "07:00 - 08:00", "08:00 - 09:00", "09:00 - 10:00",
  "10:00 - 11:00", "11:00 - 12:00", "12:00 - 13:00",
  "13:00 - 14:00", "14:00 - 15:00", "15:00 - 16:00", "16:00 - 17:00"
];

const scheduleBody   = document.getElementById("scheduleBody");
const scheduleHeader = document.getElementById("scheduleHeader");
const roomFilter     = document.getElementById("roomFilter");
const dateFilter     = document.getElementById("dateFilter");
const statusMessage  = document.getElementById("statusMessage");

// Set default tanggal hari ini
const today = new Date().toISOString().split('T')[0];
dateFilter.value = today;
dateFilter.min = today;

async function loadData() {
  const tanggal = dateFilter.value;
  const response = await fetch(`get_reservasi.php?tanggal=${tanggal}`);
  return await response.json();
}

function isTimeOverlap(slotStart, slotEnd, resStart, resEnd) {
  return slotStart < resEnd && slotEnd > resStart;
}

async function renderSchedule() {
  try {
    const selectedRoom = roomFilter.value;
    const data = await loadData();
    const rooms = data.ruangan.map(r => r.nama_ruang);
    const reservasi = data.reservasi;

    // ===== Header Tabel =====
    scheduleHeader.innerHTML = `<th>Waktu</th>`;
    rooms.forEach(room => {
      if (selectedRoom === "all" || selectedRoom === room) {
        const th = document.createElement("th");
        th.textContent = room;
        scheduleHeader.appendChild(th);
      }
    });

    // ===== Body Tabel =====
    scheduleBody.innerHTML = "";

    times.forEach((time) => {
      const [slotStart, slotEnd] = time.split(" - ");
      const row = document.createElement("tr");

      // Kolom waktu
      const timeCell = document.createElement("td");
      timeCell.textContent = time;
      row.appendChild(timeCell);

      rooms.forEach((room) => {
        if (selectedRoom !== "all" && selectedRoom !== room) return;

        const cell = document.createElement("td");
        cell.dataset.room = room;

        const booked = reservasi.find(r =>
          r.nama_ruang === room &&
          isTimeOverlap(slotStart, slotEnd, r.jam_mulai, r.jam_selesai)
        );

        if (time === "12:00 - 13:00") {
          cell.textContent = "Istirahat";
          cell.classList.add("booked");
        } else if (booked) {
          cell.textContent = booked.keperluan;
          cell.classList.add("reserved");
          cell.title = `${booked.jam_mulai} - ${booked.jam_selesai}`;
        } else {
          cell.textContent = "-";
          cell.classList.add("available");
        }

        row.appendChild(cell);
      });

      if (time === "12:00 - 13:00") row.classList.add("break-row");
      scheduleBody.appendChild(row);
    });

  } catch (error) {
    console.error("Gagal memuat data:", error);
    statusMessage.textContent = "Gagal memuat data reservasi.";
  }
}

// Event listener
roomFilter.addEventListener("change", renderSchedule);
dateFilter.addEventListener("change", renderSchedule);
document.getElementById("refreshBtn").addEventListener("click", renderSchedule);

// ====================== KALENDER ======================
const calendarGrid = document.getElementById("calendarGrid");
const calendarMonth = document.getElementById("calendarMonth");

let shownYear = new Date().getFullYear();
let shownMonth = new Date().getMonth();
let selectedDate = today;

const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
  "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
const weekdayNames = ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"];

function formatDate(date) {
  return date.getFullYear() + "-" +
    String(date.getMonth() + 1).padStart(2, "0") + "-" +
    String(date.getDate()).padStart(2, "0");
}

function renderCalendar() {
  calendarMonth.textContent = monthNames[shownMonth] + " " + shownYear;
  calendarGrid.innerHTML = "";

  weekdayNames.forEach(day => {
    const el = document.createElement("span");
    el.className = "weekday";
    el.textContent = day;
    calendarGrid.appendChild(el);
  });

  const firstDay = new Date(shownYear, shownMonth, 1);
  const offset = (firstDay.getDay() + 6) % 7;
  const daysInMonth = new Date(shownYear, shownMonth + 1, 0).getDate();
  const prevMonthDays = new Date(shownYear, shownMonth, 0).getDate();

  for (let i = 0; i < 42; i++) {
    const el = document.createElement("span");
    const dayNumber = i - offset + 1;
    let dateString;

    if (dayNumber < 1) {
      const d = prevMonthDays + dayNumber;
      dateString = formatDate(new Date(shownYear, shownMonth - 1, d));
      el.textContent = d;
      el.className = "muted-day";
    } else if (dayNumber > daysInMonth) {
      const d = dayNumber - daysInMonth;
      dateString = formatDate(new Date(shownYear, shownMonth + 1, d));
      el.textContent = d;
      el.className = "muted-day";
    } else {
      dateString = formatDate(new Date(shownYear, shownMonth, dayNumber));
      el.textContent = dayNumber;
      el.className = "day";
    }

    if (dateString === selectedDate) el.classList.add("selected");

    el.addEventListener("click", () => {
      selectedDate = dateString;
      dateFilter.value = dateString; // sinkronkan dengan date picker
      renderCalendar();
      renderSchedule(); // refresh jadwal
      statusMessage.textContent = "Tanggal dipilih: " + 
        new Date(dateString + "T12:00:00").toLocaleDateString("id-ID", {
          weekday: "long", day: "numeric", month: "long", year: "numeric"
        });
    });

    calendarGrid.appendChild(el);
  }
}

document.getElementById("prevMonth").addEventListener("click", () => {
  shownMonth--;
  if (shownMonth < 0) {
    shownMonth = 11;
    shownYear--;
  }
  renderCalendar();
});

document.getElementById("nextMonth").addEventListener("click", () => {
  shownMonth++;
  if (shownMonth > 11) {
    shownMonth = 0;
    shownYear++;
  }
  renderCalendar();
});

// Jalankan pertama kali
renderSchedule();
renderCalendar();
</script>
</body>
</html>
