<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginform.php");
    exit;
}
$username = $_SESSION['username'];
$level    = $_SESSION['level'];
$nama    = $_SESSION['nama'];
include 'conn/config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Study Room</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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
        .available-rooms {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    gap: 12px;
    overflow-x: auto;
    padding: 10px 0;
}
.room-item {
    display: flex;
    align-items: center;
    gap: 15px;
    flex: 0 0 250px;
    min-width: 250px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 18px;
    background: white;
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


.sidebar-bottom .logout:hover {
    background-color: #f7c5dd;
}

.brand {
    color: #d94687;
    font-weight: bold;
    font-size: 15px;
}

.menu-link {
    color: #855d75;
    border-radius: 10px;
    padding: 10px 12px;
    text-decoration: none;
    display: block;
    margin-bottom: 4px;
    font-size: 13px;
}

.menu-link:hover,
.menu-link.active {
    background-color: #f7c5dd;
    color: #bc3476;
}

/* ===== NAVBAR ===== */
.topbar {
  height: 39px;
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 20px;
}

.search-box {
    background-color: #fff0f7;
    border: none;
    font-size: 13px;
}

/* ===== BANNER ===== */
.banner {
    background: linear-gradient(110deg, #fbd8e9, #fff0f7);
    border-radius: 15px;
}

.banner h2 {
    font-size: 25px;
    margin-bottom: 8px;
}

.banner p {
    font-size: 13px;
}

.pink {
    color: #d94687;
}

/* ===== CARD ===== */
.custom-card {
    border: 1px solid #f2e4ec;
    border-radius: 13px;
    background-color: #fffdfd;
}

.card-title-pink {
    color: #c94380;
    font-weight: bold;
    font-size: 15px;
}
@media (max-width: 767.98px) {
    .sidebar {
        min-height: auto;
    }

    .banner h2 {
        font-size: 21px;
    }
}
/* ===== DAFTAR RUANG ===== */
.room-icon {
    background-color: #fce7f1;
    color: #d95392;
    width: 38px;
    height: 38px;
    flex: 0 0 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.room-item {
    border-bottom: 1px solid #f5e9ef;
    padding: 10px 0;
    font-size: 13px;
}

.room-item:last-child {
    border-bottom: none;
}

.room-item strong {
    font-size: 14px;
}

.empty-result {
    min-height: 140px;
}
.btn-pink {
    background-color: #e85b98;
    color: white;
    border: none;
    font-size: 13px;
}

.btn-pink:hover {
    background-color: #d44484;
    color: white;
}

    </style>
</head>

<body>

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <a href="dashboard.php" class="brand">
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

            <a href="reservasi.php" class="nav-link active">
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
            <a href="login.html" class="nav-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>

    </aside>
 <main class="col-md-9 col-lg-10 p-0">
            <nav class="navbar topbar px-3 px-md-4 py-3">
                <div class="container-fluid p-0 gap-3">

                    <div class="input-group w-50">
                        <span class="input-group-text search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>

                        <input type="search"
                               id="searchRoom"
                               class="form-control search-box"
                               placeholder="Cari ruang kelas...">
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-regular fa-bell pink"></i>

                        <div class="rounded-circle p-2"
                             style="background:#fbddec;color:#d94687">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <span>Admin</span>
                    </div>

                </div>
            </nav>

            <div class="p-3 p-lg-4">

                <section class="banner p-4 mb-3">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                            <h2 class="pink fw-bold">
                                <i class="fa-regular fa-calendar-days me-2"></i>
                                Reservasi Ruang Kelas
                            </h2>

                            <p class="text-secondary mb-0">
                                Pesan ruang kelas sesuai dengan kebutuhan Anda.
                            </p>
                        </div>

                        <div class="col-md-4 text-center mt-3 mt-md-0">
                            <i class="fa-solid fa-chalkboard-user"
                               style="font-size:65px;color:#e99abd"></i>
                        </div>

                    </div>
                </section>

                <div class="row g-3" id="reservasi">

                    <div class="col-lg-7">

                        <section class="card custom-card p-3 p-md-4">

                            <h5 class="card-title-pink border-bottom pb-3">
                                <i class="fa-regular fa-calendar-days me-2"></i>
                                Formulir Reservasi
                            </h5>

                           <form id="reservationForm" method="POST" action="proses_reservasi.php">

    <!-- Hidden input untuk id_ruang (diisi saat user pilih ruangan) -->
    <input type="hidden" name="id_ruang" id="id_ruang" required>

    <div class="row g-3">

        <div class="col-md-6">
            <label for="tanggal" class="form-label">Tanggal Reservasi</label>
            <input type="date" 
                   id="tanggal" 
                   name="tanggal" 
                   class="form-control" 
                   required
                   min="<?= date('Y-m-d') ?>">
        </div>

        <div class="col-md-6">
            <label for="mulai" class="form-label">Waktu Mulai</label>
            <input type="time" 
                   id="mulai" 
                   name="jam_mulai" 
                   class="form-control" 
                   required>
        </div>

        <div class="col-md-6">
            <label for="selesai" class="form-label">Waktu Selesai</label>
            <input type="time" 
                   id="selesai" 
                   name="jam_selesai" 
                   class="form-control" 
                   required>
        </div>

        <div class="col-md-6">
            <label for="keperluan" class="form-label">Keperluan</label>
            <select id="keperluan" 
                    name="keperluan" 
                    class="form-select" 
                    required>
                <option value="">Pilih keperluan</option>
                <option value="Kuliah">Kuliah</option>
                <option value="Rapat">Rapat</option>
                <option value="Belajar kelompok">Belajar kelompok</option>
                <option value="Seminar">Seminar</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>

        <div class="col-12">
            <label for="keterangan" class="form-label">Keterangan (opsional)</label>
            <textarea id="keterangan" 
                      name="keterangan" 
                      class="form-control" 
                      rows="2"
                      placeholder="Tulis keterangan..."></textarea>
        </div>

    </div>

<div class="d-flex justify-content-end gap-2 mt-3">

    <button type="button" id="btnCariRuang" class="btn btn-pink px-4 py-2">
        <i class="fa-solid fa-magnifying-glass me-2"></i>
        Cari Ruang
    </button>

    <button type="submit" class="btn btn-pink px-4 py-2">
        <i class="fa-solid fa-check me-2"></i>
        Ajukan Reservasi
    </button>

</div>
</form>
 </section>

                    </div>
                    <div class="col-lg-5">
                        <section class="card custom-card p-3 p-md-4">
                            <h5 class="card-title-pink border-bottom pb-3">
                                <i class="fa-solid fa-house me-2"></i>
                                Ruang Tersedia
                            </h5>
                            <div id="roomList">

                                <div class="room-item d-flex align-items-center gap-3"
                                     data-name="Ruang 101">
                                    <div class="room-icon">
                                        <i class="fa-solid fa-display"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong>Ruang 101</strong><br>
                                        <small class="text-secondary">
                                            Kapasitas 30 orang
                                        </small>
                                    </div>
                                    <i class="fa-solid fa-chevron-right pink"></i>
                                </div>

                                <div class="room-item d-flex align-items-center gap-3"
                                     data-name="Ruang 102">
                                    <div class="room-icon">
                                        <i class="fa-solid fa-display"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong>Ruang 102</strong><br>
                                        <small class="text-secondary">
                                            Kapasitas 25 orang
                                        </small>
                                    </div>
                                    <i class="fa-solid fa-chevron-right pink"></i>
                                </div>

                                <div class="room-item d-flex align-items-center gap-3"
                                     data-name="Ruang 103">
                                    <div class="room-icon">
                                        <i class="fa-solid fa-display"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong>Ruang 103</strong><br>
                                        <small class="text-secondary">
                                            Kapasitas 40 orang
                                        </small>
                                    </div>
                                    <i class="fa-solid fa-chevron-right pink"></i>
                                </div>

                                <div class="room-item d-flex align-items-center gap-3"
                                     data-name="Ruang 104">
                                    <div class="room-icon">
                                        <i class="fa-solid fa-display"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong>Ruang 104</strong><br>
                                        <small class="text-secondary">
                                            Kapasitas 35 orang
                                        </small>
                                    </div>
                                    <i class="fa-solid fa-chevron-right pink"></i>
                                </div>

                                <div class="room-item d-flex align-items-center gap-3"
                                     data-name="Ruang 105">
                                    <div class="room-icon">
                                        <i class="fa-solid fa-display"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong>Ruang 105</strong><br>
                                        <small class="text-secondary">
                                            Kapasitas 30 orang
                                        </small>
                                    </div>
                                    <i class="fa-solid fa-chevron-right pink"></i>
                                </div>

                                <div class="room-item d-flex align-items-center gap-3"
                                     data-name="Ruang 106">
                                    <div class="room-icon">
                                        <i class="fa-solid fa-display"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong>Ruang 106</strong><br>
                                        <small class="text-secondary">
                                            Kapasitas 25 orang
                                        </small>
                                    </div>
                                    <i class="fa-solid fa-chevron-right pink"></i>
                                </div>

                            </div>
                        </section>

                    </div>

                </div>

                <section class="card custom-card p-3 p-md-4 mt-3">

                    <h5 class="card-title-pink border-bottom pb-3">
                        <i class="fa-regular fa-calendar-days me-2"></i>
                        Hasil Pencarian
                    </h5>

                   <div class="available-rooms" id="availableRooms">
                </div>

                </section>

            </div>
        </main>
   

</div>

<!-- JAVASCRIPT -->
<script>
const tanggalInput   = document.getElementById('tanggal');
const mulaiInput     = document.getElementById('mulai');
const selesaiInput   = document.getElementById('selesai');
const availableRooms = document.getElementById('availableRooms');
const btnCariRuang   = document.getElementById('btnCariRuang');

async function cekKetersediaan() {
    // Cek elemen
    if (!availableRooms) {
        alert('Elemen #availableRooms tidak ditemukan!');
        return;
    }

    const tanggal     = tanggalInput.value;
    const jam_mulai   = mulaiInput.value;
    const jam_selesai = selesaiInput.value;
    if (!tanggal || !jam_mulai || !jam_selesai) {
        alert('Silakan isi Tanggal, Jam Mulai, dan Jam Selesai terlebih dahulu.');
        return;
    }
   if (jam_mulai >= jam_selesai) {
        alert('Jam Selesai harus lebih besar dari Jam Mulai.');
        return;
    }

    // Loading
    availableRooms.innerHTML = `<p class="text-muted">Mencari ruangan tersedia...</p>`;

    try {
        const response = await fetch(
            `cek_ketersediaan.php?tanggal=${tanggal}&jam_mulai=${jam_mulai}&jam_selesai=${jam_selesai}`
        );
        const data = await response.json();

        availableRooms.innerHTML = '';

        if (data.length === 0) {
            availableRooms.innerHTML = `<p class="text-muted">Tidak ada ruangan tersedia di waktu ini.</p>`;
            return;
        }
       data.forEach(room => {
    const item = document.createElement('div');
    item.className = 'room-item';
    item.dataset.id = room.id_ruang;
    item.innerHTML = `
        <div class="room-icon">
            <i class="fa-solid fa-desktop"></i>
        </div>
        <div class="room-info">
            <h4>${room.nama_ruang}</h4>
            <p>Kapasitas ${room.kapasitas} orang</p>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
    `;
      document.getElementById('availableRooms').appendChild(item);
            // Klik ruangan → isi id_ruang
            item.addEventListener('click', function () {
                const idInput = document.getElementById('id_ruang');
                if (idInput) {
                    idInput.value = this.dataset.id;
                }

                // Tandai yang dipilih
                document.querySelectorAll('.room-item').forEach(el => {
                    el.classList.remove('selected');
                });
                this.classList.add('selected');
            });

            availableRooms.appendChild(item);
        });

    } catch (error) {
        console.error(error);
        availableRooms.innerHTML = `<p class="text-danger">Gagal memuat data ruangan.</p>`;
    }
}

// Hanya jalankan saat tombol diklik
btnCariRuang.addEventListener('click', cekKetersediaan);
</script>
</body>
</html>

