<?php
// Mulai sesi
session_start();

// Pemeriksaan apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
  // Jika belum login, redirect ke halaman login
  header("Location: login.html");
  exit();
}

$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$grade = isset($_SESSION['grade']) ? $_SESSION['grade'] : '';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ALUTSISTA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/global.css" />
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="card bg-transparent border-0 text-white">
      <img src="assets/logo.png" class="card-img-top" alt="" />
      <div class="card-body">
        <h3 class="card-title" style="padding-bottom: 10%">Menu</h3>
        <ul class="list-group nav nav-tabs" id="nav-tab" role="tablist">
          <li class="list-group-item">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
              type="button" role="tab" aria-controls="nav-home" aria-selected="true">
              <i class="fa-solid fa-house"></i>Homes
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-inventory-tab" data-bs-toggle="tab" data-bs-target="#nav-inventory"
              type="button" role="tab" aria-controls="nav-inventory" aria-selected="false">
              <i class="fa-solid fa-clipboard-list"></i>Inventory
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request"
              type="button" role="tab" aria-controls="nav-request" aria-selected="false">
              <i class="fa-solid fa-paper-plane"></i>Request
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-report-tab" data-bs-toggle="tab" data-bs-target="#nav-report" type="button"
              role="tab" aria-controls="nav-report" aria-selected="false">
              <i class="fa-solid fa-envelope-open"></i>Report
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
              type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
              <i class="fa-solid fa-user"></i>Profile
            </button>
          </li>
          <li class="list-group-item">
            <button class="nav-link" id="nav-aboutUs-tab" data-bs-toggle="tab" data-bs-target="#nav-aboutUs"
              type="button" role="tab" aria-controls="nav-aboutUs" aria-selected="false">
              <i class="fa-solid fa-circle-info"></i>About Us
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="content tab-content" id="nav-tabContent">
    <!-- Home -->
    <div id="nav-home" class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Home</a>
          <div>
            <a class="me-1"><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"
                onclick="showTabContent('nav-profile', 'nav-profile-tab')"></i></a>
            <a class="text-white me-3" style="cursor: pointer; text-decoration: none"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')">user</a>
            <a href="./php/logout.php"><button type="button" class="btn btn-sm btn-danger me-2">
                Logout
              </button></a>
          </div>
        </div>
      </nav>
      <div class="card border-0 bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-3" style="background-color: #134a6e">
          <div id="dropdown" class="float-end">
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                All Status
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Read</a></li>
                <li><a class="dropdown-item" href="#">Unready</a></li>
                <li>
                  <a class="dropdown-item" href="#">Banned</a>
                </li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                More Filter
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">A-Z</a></li>
                <li><a class="dropdown-item" href="#">Stock</a></li>
                <li>
                  <a class="dropdown-item" href="#">Z-A</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-1">
          <?php
          require_once('./php/koneksi.php');

          $sql = "SELECT * FROM news";
          $result = $conn->query($sql);

          if ($result) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
              ?>
              <div class="col">
                <div class="card">
                  <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php echo htmlspecialchars($row['title']); ?>
                    </h5>
                    <p class="card-text">
                      <?php echo htmlspecialchars($row['date']); ?>
                    </p>
                    <a href="<?php echo htmlspecialchars($row['link']); ?>" class="btn btn-primary" target="_blank">Go
                      somewhere</a>
                  </div>
                </div>
              </div>
              <?php
            }
          } else {
            echo "Error: " . $conn->error; // Menampilkan pesan error jika terjadi kesalahan dalam eksekusi query
          }
          ?>
        </div>
      </div>
    </div>

    <!-- Inventory -->
    <div id="nav-inventory" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-inventory-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Inventory</a>
          <div>
            <a class="me-1"><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"
                onclick="showTabContent('nav-profile', 'nav-profile-tab')"></i></a>
            <a class="text-white me-3" style="cursor: pointer; text-decoration: none"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')">user</a>
            <a href="./php/logout.php"><button type="button" class="btn btn-sm btn-danger me-2">
                Logout
              </button></a>
          </div>
        </div>
      </nav>
      <div class="card border-0 bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-3" style="background-color: #134a6e">
          <div id="dropdown" class="float-end">
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                All Status
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Read</a></li>
                <li><a class="dropdown-item" href="#">Unready</a></li>
                <li>
                  <a class="dropdown-item" href="#">Banned</a>
                </li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                More Filter
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">A-Z</a></li>
                <li><a class="dropdown-item" href="#">Stock</a></li>
                <li>
                  <a class="dropdown-item" href="#">Z-A</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <table class="table table-bordered text-md-center" style="margin-top: 2%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Serial Number</th>
              <th scope="col">Name</th>
              <th scope="col">Materials</th>
              <th scope="col">Status</th>
              <th scope="col">Location</th>
              <th scope="col"><i class="fa-solid fa-info"></i></th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            require_once('./php/koneksi.php');
            $sql = "SELECT serial_number, name, materials, status, location FROM weapons";
            $result = $conn->query($sql);

            if ($result) {
              $index = 1;
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td>
                    <?php echo $index; ?>
                  </td>
                  <td>
                    <?php echo $row['serial_number']; ?>
                  </td>
                  <td>
                    <?php echo $row['name']; ?>
                  </td>
                  <td>
                    <?php echo $row['materials']; ?>
                  </td>
                  <td>
                    <?php echo ($row['status'] == 0) ? 'Ready' : 'Unready'; ?>
                  </td>
                  <td>
                    <?php echo $row['location']; ?>
                  </td>
                  <td><button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#details" onclick="editInventory(<?php echo $row['serial_number']; ?>, 
                      '<?php echo $row['name']; ?>',
                      '<?php echo $row['materials']; ?>',
                      '<?php echo $row['status']; ?>',
                      '<?php echo $row['location']; ?>')">Details</button></td>
                </tr>
                <?php
                $index++;
              }
            } else {
              echo "Error: " . $conn->error;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Request -->
    <div id="nav-request" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-request-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Request</a>
          <div>
            <a class="me-1"><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"
                onclick="showTabContent('nav-profile', 'nav-profile-tab')"></i></a>
            <a class="text-white me-3" style="cursor: pointer; text-decoration: none"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')">user</a>
            <a href="./php/logout.php"><button type="button" class="btn btn-sm btn-danger me-2">
                Logout
              </button></a>
          </div>
        </div>
      </nav>
      <div class="card border-0 bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-5" style="background-color: #134a6e"></div>
        <form class="container-lg bg-body p-4" method="post" action="./php/request.php">
          <div class="row">
            <div class="col" style="margin: 1%">
              <div class="form-floating mb-3">
                <input name="id_user" type="id" class="form-control border-3" id="floatingId" placeholder="Id" />
                <label for="floatingId">Id</label>
              </div>
              <div class="form-floating">
                <input name="serial_number" type="number" class="form-control border-3" id="floatingSerialNumber"
                  placeholder="Serial Number" />
                <label for="floatingSerialNumber">Serial Number</label>
              </div>
            </div>
            <div class="col" style="margin: 1%">
              <div class="form-floating mb-3">
                <textarea name="reason" class="form-control border-3" placeholder="Leave a reason here"
                  id="floatingTextarea" style="height: 100px"></textarea>
                <label for="floatingTextarea">Reason</label>
              </div>
              <div class="form-floating mb-3">
                <input name="tgl_pinjam" type="date" class="form-control border-3" id="floatingDateCollect"
                  placeholder="Date of collect" />
                <label for="floatingDateCollect">Date of collect</label>
              </div>
              <div class="form-floating">
                <input name="tgl_kembali" type="date" class="form-control border-3" id="floatingDateReturn"
                  placeholder="Date of return" />
                <label for="floatingDateReturn">Date of return</label>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg float-end">
            Send
          </button>
        </form>
      </div>
    </div>

    <!-- Report -->
    <div id="nav-report" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-request-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Report</a>
          <div>
            <a class="me-1"><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"
                onclick="showTabContent('nav-profile', 'nav-profile-tab')"></i></a>
            <a class="text-white me-3" style="cursor: pointer; text-decoration: none"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')">user</a>
            <a href="./php/logout.php"><button type="button" class="btn btn-sm btn-danger me-2">
                Logout
              </button></a>
          </div>
        </div>
      </nav>
      <div class="card border-white bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-3" style="background-color: #134a6e">
          <div id="dropdown" class="float-end">
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                All Status
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Read</a></li>
                <li><a class="dropdown-item" href="#">Unready</a></li>
                <li>
                  <a class="dropdown-item" href="#">Banned</a>
                </li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                More Filter
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">A-Z</a></li>
                <li><a class="dropdown-item" href="#">Stock</a></li>
                <li>
                  <a class="dropdown-item" href="#">Z-A</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <table class="table table-bordered text-md-center" style="margin-top: 2%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">ID Request</th>
              <th scope="col">Serial Number</th>
              <th scope="col">Name</th>
              <th scope="col">Date of Collect</th>
              <th scope="col">Date of Return</th>
              <th scope="col">Status</th>
              <th scope="col"><i class="fa-solid fa-info"></i></th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            require_once('./php/koneksi.php');
            $sql = "SELECT r.id_request, r.serial_number, w.name, r.tgl_pinjam, r.tgl_kembali, r.opsi 
                FROM request r
                INNER JOIN weapons w ON r.serial_number = w.serial_number";
            $result = $conn->query($sql);

            if ($result === false) {
              echo "Error: " . $conn->error;
            } else {
              if ($result->num_rows > 0) {
                $index = 1;
                while ($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $index; ?>
                    </td>
                    <td>
                      <?php echo $row['id_request']; ?>
                    </td>
                    <td>
                      <?php echo $row['serial_number']; ?>
                    </td>
                    <td>
                      <?php echo $row['name']; ?>
                    </td>
                    <td>
                      <?php echo $row['tgl_pinjam']; ?>
                    </td>
                    <td>
                      <?php echo $row['tgl_kembali']; ?>
                    </td>
                    <td>
                      <?php echo ($row['opsi'] == 0) ? 'Diterima' : 'Ditolak'; ?>
                    </td>
                    <td>
                      <?php
                      // Tampilkan tombol hanya jika status adalah 1
                      if ($row['opsi'] == 0) {
                        ?>
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#return">
                          Return
                        </button>
                        <?php
                      }
                      ?>
                    </td>
                  </tr>
                  <?php
                  $index++;
                }
              } else {
                echo "<tr><td colspan='8'>Tidak ada data request yang ditemukan.</td></tr>";
              }
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>

    <!-- Profile -->
    <div id="nav-profile" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">Profile</a>
          <div>
            <a class="me-1"><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"
                onclick="showTabContent('nav-profile', 'nav-profile-tab')"></i></a>
            <a class="text-white me-3" style="cursor: pointer; text-decoration: none"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')">user</a>
            <a href="./php/logout.php"><button type="button" class="btn btn-sm btn-danger me-2">
                Logout
              </button></a>
          </div>
        </div>
      </nav>
      <?php
      // Sambungkan ke database
      require_once('./php/koneksi.php');

      // Ambil username dari sesi
      $username = $_SESSION['username'];

      // Persiapkan pernyataan SQL
      $sql = "SELECT id_user, name, grade, role FROM users WHERE username = ?";

      // Persiapkan pernyataan SQL menggunakan prepared statement
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $username);
      //Eksekusi pernyataan SQL 
      $stmt->execute(); // Ambil hasil query 
      $result = $stmt->get_result(); // Ambil data pengguna 
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_user = $row['id_user'];
        $name = $row['name'];
        $grade = $row['grade'];
        $role = $row['role'];
      } // Tutup koneksi 
      $stmt->close();
      $conn->close();
      ?>
      <div class="container-fluid text-center d-grid" style="
            margin: 3%;
            width: 95%;
            border-radius: 10px;
            padding: 10%;
            background-color: #134a6e;
          ">
        <div class="profile-image">
          <div class="profile-image-placeholder">
            <input type="file" class="form-control" id="floatingInput" name="foto" />
            <!-- Tambahkan atribut "accept" untuk membatasi tipe file yang dapat diunggah -->
          </div>
        </div>
        <form action="" method="post">
          <div class="profile-info" style="padding: 2% 10% 0 10%">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="id" value="<?php echo $id_user; ?>"
                readonly />
              <label for="floatingInput">Id</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="name" value="<?php echo $name; ?>"
                readonly />
              <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword" name="grade" value="<?php echo $grade; ?>"
                readonly />
              <label for="floatingPassword">Grade</label>
            </div>
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingPassword" name="role" value="<?php echo $role; ?>"
                readonly />
              <label for="floatingPassword">Role</label>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- About Us -->
    <div id="nav-aboutUs" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-aboutUs-tab" tabindex="0">
      <nav class="navbar">
        <div class="container-fluid p-2">
          <a class="navbar-brand text-white" style="font-size: x-large; font-weight: 700">About Us</a>
          <div>
            <a class="me-1"><i class="fa-solid fa-user text-white" style="cursor: pointer; font-size: large"
                onclick="showTabContent('nav-profile', 'nav-profile-tab')"></i></a>
            <a class="text-white me-3" style="cursor: pointer; text-decoration: none"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')">user</a>
            <a href="./php/logout.php"><button type="button" class="btn btn-sm btn-danger me-2">
                Logout
              </button></a>
          </div>
        </div>
      </nav>
      <div class="card border-0 bg-transparent" style="padding: 3%">
        <div class="card-header text-white p-5" style="background-color: #134a6e"></div>
        <div class="card-body bg-white text-center mh-100" style="height: 700px">
          <img src="assets/logo.png" class="card-img-top w-25" />
          <div class="ps-4 pe-4">
            <p class="card-text">
              Selamat datang di website Alutsista, platform yang menghadirkan
              informasi lengkap seputar Alat Utama Sistem Senjata (Alutsista).
              Kami adalah sumber terpercaya untuk para penggemar militer,
              profesional pertahanan, dan masyarakat umum yang ingin mendalami
              dunia alat utama sistem senjata. Dapatkan wawasan mendalam
              tentang berbagai jenis alutsista yang digunakan oleh pasukan
              militer di seluruh dunia. Mulai dari kendaraan tempur, pesawat
              tempur, hingga peralatan pendukung lainnya, temukan detil teknis
              dan kegunaan masing-masing alat.
            </p>
            <p class="card-text">
              Kami menyajikan berita terkini mengenai perkembangan terbaru
              dalam industri alutsista. Analisis mendalam dari para ahli akan
              membantu Anda memahami dampak dan implikasi dari setiap
              perkembangan teknologi dan kebijakan.
            </p>
            <p class="card-text">
              Jelajahi website Alutsista, dan temukan dunia yang fascinatif di
              balik teknologi dan strategi pertahanan. Kami berharap Anda
              menemukan informasi yang bermanfaat dan memuaskan ketertarikan
              Anda terhadap alutsista. Terima kasih atas kunjungan Anda!
            </p>
            <p class="card-text">
              Hubungi kontak dibawah terkait konten, undangan peliputan dan
              pemasangan iklan.
            </p>
            <div class="fs-1">
              <a href=""><i class="fa-brands fa-instagram text-black"></i></a>
              <a href=""><i class="fa-brands fa-whatsapp text-black"></i></a>
              <a href=""><i class="fa-regular fa-envelope text-black"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <!-- Return -->
    <div class="modal fade" id="return" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="return" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--btn); color: white">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">
              Report file
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col" style="margin: 1%">
                <div class="form-floating mb-3">
                  <input name="id_user" type="id" class="form-control border-3" id="floatingId" placeholder="Id" />
                  <label for="floatingId">Id</label>
                </div>
                <div class="form-floating">
                  <input name="serial_number" type="number" class="form-control border-3" id="floatingSerialNumber"
                    placeholder="Serial Number" />
                  <label for="floatingSerialNumber">Serial Number</label>
                </div>
              </div>
              <div class="col" style="margin: 1%">
                <div class="form-floating mb-3">
                  <textarea name="reason" class="form-control border-3" placeholder="Leave a reason here"
                    id="floatingTextarea" style="height: 100px"></textarea>
                  <label for="floatingTextarea">Description</label>
                </div>
                <div class="form-floating">
                  <input name="tgl_kembali" type="date" class="form-control border-3" id="floatingDateReturn"
                    placeholder="Date of return" />
                  <label for="floatingDateReturn">Date of return</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button" class="btn btn-primary">Send</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Details -->
    <div class="modal fade" id="details" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="details" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color: var(--btn); color: white">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container text-center w-100">
              <div class="row">
                <div class="col w-30">
                  <img class="w-75 bg-body-secondary" style="margin-bottom: 5%" src="assets/ak47.png" alt="" />
                  <img class="w-75 bg-body-secondary" src="assets/peluru.png" alt="" />
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input name="serial_number" type="id" class="form-control border-3"
                      id="floatingSerialNumberinventory" placeholder="Serial Number" value="" disabled />
                    <label for="floatingSerialNumberinventory">Serial Number</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control border-3" id="floatingNameinventory"
                      placeholder="Name" value="" disabled />
                    <label for="floatingNameinventory">Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="type" type="text" class="form-control border-3" id="floatingType" placeholder="Type"
                      value="" disabled />
                    <label for="floatingType">Type</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="capacity" type="text" class="form-control border-3" id="floatingCapacity"
                      placeholder="Capacity" value="" disabled />
                    <label for="floatingCapacity">Capacity</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="size" type="text" class="form-control border-3" id="floatingSize" placeholder="Size"
                      value="" disabled />
                    <label for="floatingSize">Size</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="weight" type="text" class="form-control border-3" id="floatingWeight"
                      placeholder="Weight" value="" disabled />
                    <label for="floatingWeight">Weight</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="fire_power" type="text" class="form-control border-3" id="floatingFirepower"
                      placeholder="Fire Power" value="" disabled />
                    <label for="floatingFirePower">Fire Power</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input name="speed" type="text" class="form-control border-3" id="floatingSpeed" placeholder="Speed"
                      value="" disabled />
                    <label for="floatingSpeed">Speed</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="materials" type="text" class="form-control border-3" id="floatingMaterialsinventory"
                      placeholder="Materials" value="" disabled />
                    <label for="floatingMaterialsinventory">Materials</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="status" type="text" class="form-control border-3" id="floatingStatusinventory"
                      placeholder="Status" value="" disabled />
                    <label for="floatingStatusinventory">Status</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="owner" type="text" class="form-control border-3" id="floatingOwner" placeholder="Owner"
                      value="" disabled />
                    <label for="floatingOwner">Owner</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="location" type="text" class="form-control border-3" id="floatingLocationinventory"
                      placeholder="Location" value="" disabled />
                    <label for="floatingLocationinventory">Location</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="maintance" type="text" class="form-control border-3" id="floatingMaintance"
                      placeholder="Maintance" value="" disabled />
                    <label for="floatingMaintance">Maintance</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="history" type="text" class="form-control border-3" id="floatingHistory"
                      placeholder="History" value="" disabled />
                    <label for="floatingHistory">History</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/global.js"></script>
  <script>
    function editInventory(serial_number, name, status, location, materials) {
      document.getElementById('floatingSerialNumberinventory').value = serial_number;
      document.getElementById('floatingNameinventory').value = name;
      document.getElementById('floatingMaterialsinventory').value = materials;
      document.getElementById('floatingStatusinventory').value = status;
      document.getElementById('floatingLocationinventory').value = location;
    }
  </script>
</body>

</html>