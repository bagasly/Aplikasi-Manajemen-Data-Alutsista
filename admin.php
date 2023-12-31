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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
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
              <button
                class="nav-link active"
                id="nav-news-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-news"
                type="button"
                role="tab"
                aria-controls="nav-news"
                aria-selected="true"
              >
                <i class="fa-solid fa-table-list"></i>News
              </button>
            </li>
            <li class="list-group-item">
              <button
                class="nav-link"
                id="nav-inventory-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-inventory"
                type="button"
                role="tab"
                aria-controls="nav-inventory"
                aria-selected="false"
              >
                <i class="fa-solid fa-clipboard-list"></i>Inventory
              </button>
            </li>
            <li class="list-group-item">
              <button
                class="nav-link"
                id="nav-apply-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-apply"
                type="button"
                role="tab"
                aria-controls="nav-apply"
                aria-selected="false"
              >
                <i class="fa-solid fa-paper-plane"></i>Apply
              </button>
            </li>
            <li class="list-group-item">
              <button
                class="nav-link"
                id="nav-report-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-report"
                type="button"
                role="tab"
                aria-controls="nav-report"
                aria-selected="false"
              >
                <i class="fa-solid fa-envelope-open"></i>Report
              </button>
            </li>
            <li class="list-group-item">
              <button
                class="nav-link"
                id="nav-account-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-account"
                type="button"
                role="tab"
                aria-controls="nav-account"
                aria-selected="false"
              >
                <i class="fa-solid fa-user-plus"></i>Account
              </button>
            </li>
            <li class="list-group-item">
              <button
                class="nav-link"
                id="nav-profile-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-profile"
                type="button"
                role="tab"
                aria-controls="nav-profile"
                aria-selected="false"
              >
                <i class="fa-solid fa-user"></i>Profile
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="content tab-content" id="nav-tabContent">
      <!-- News -->
      <div
        id="nav-news"
        class="tab-pane fade show active"
        role="tabpanel"
        aria-labelledby="nav-news-tab"
        tabindex="0"
      >
        <nav class="navbar">
          <div class="container-fluid p-2">
            <a
              class="navbar-brand text-white"
              style="font-size: x-large; font-weight: 700"
              >News</a
            >
            <div
              class="d-flex me-3"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')"
            >
              <a
                class="text-white"
                style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                "
                >admin</a
              >
              <a
                ><i
                  class="fa-solid fa-user text-white"
                  style="cursor: pointer; font-size: large"
                ></i
              ></a>
            </div>
          </div>
        </nav>
        <div class="card border-0 bg-transparent" style="padding: 3%">
          <div
            class="card-header text-white p-3"
            style="background-color: #134a6e"
          >
            <button type="button" class="btn btn-primary">
              <i class="fa-solid fa-plus" style="color: white"></i>
            </button>
            <div id="dropdown" class="float-end">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn text-white dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
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
                <button
                  type="button"
                  class="btn text-white dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
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
          <table
            class="table table-bordered text-md-center"
            style="margin-top: 2%"
          >
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Link</th>
                <th scope="col"><i class="fa-solid fa-info"></i></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <th scope="row">1</th>
                <td>0001</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <button
                    type="button"
                    class="btn btn-sm btn-warning"
                    data-bs-toggle="modal"
                    data-bs-target="#edit"
                  >
                    Edit
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Inventory -->
      <div
        id="nav-inventory"
        class="tab-pane fade"
        role="tabpanel"
        aria-labelledby="nav-inventory-tab"
        tabindex="0"
      >
        <nav class="navbar">
          <div class="container-fluid p-2">
            <a
              class="navbar-brand text-white"
              style="font-size: x-large; font-weight: 700"
              >Inventory</a
            >
            <div
              class="d-flex me-3"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')"
            >
              <a
                class="text-white"
                style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                "
                >admin</a
              >
              <a
                ><i
                  class="fa-solid fa-user text-white"
                  style="cursor: pointer; font-size: large"
                ></i
              ></a>
            </div>
          </div>
        </nav>
        <div class="card border-0 bg-transparent" style="padding: 3%">
          <div
            class="card-header text-white p-3"
            style="background-color: #134a6e"
          >
            <button type="button" class="btn btn-primary">
              <i class="fa-solid fa-plus" style="color: white"></i>
            </button>
            <div id="dropdown" class="float-end">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn text-white dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
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
                <button
                  type="button"
                  class="btn text-white dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
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
          <table
            class="table table-bordered text-md-center"
            style="margin-top: 2%"
          >
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Serial Number</th>
                <th scope="col">Name</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Location</th>
                <th scope="col"><i class="fa-solid fa-info"></i></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <th scope="row">1</th>
                <td>0001</td>
                <td>AKM</td>
                <td>70</td>
                <td>Available</td>
                <td></td>
                <td>
                  <button
                    type="button"
                    class="btn btn-sm btn-warning"
                    data-bs-toggle="modal"
                    data-bs-target="#edit"
                  >
                    Edit
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Apply -->
      <div
        id="nav-apply"
        class="tab-pane fade"
        role="tabpanel"
        aria-labelledby="nav-apply-tab"
        tabindex="0"
      >
        <nav class="navbar">
          <div class="container-fluid p-2">
            <a
              class="navbar-brand text-white"
              style="font-size: x-large; font-weight: 700"
              >Apply</a
            >
            <div
              class="d-flex me-3"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')"
            >
              <a
                class="text-white"
                style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                "
                >admin</a
              >
              <a
                ><i
                  class="fa-solid fa-user text-white"
                  style="cursor: pointer; font-size: large"
                ></i
              ></a>
            </div>
          </div>
        </nav>
        <div class="card border-0 bg-transparent" style="padding: 3%">
          <div
            class="card-header text-white p-5"
            style="background-color: #134a6e"
          ></div>
          <div class="container-lg bg-white">
            <div class="list-group" style="padding: 2%">
              <a
                href="#"
                class="list-group-item list-group-item-action list-group-item-secondary"
                data-bs-toggle="modal"
                data-bs-target="#applyMessage"
                style="padding: 1%"
                >From ......</a
              >
            </div>
          </div>
        </div>
      </div>

      <!-- Report -->
      <div
        id="nav-report"
        class="tab-pane fade"
        role="tabpanel"
        aria-labelledby="nav-request-tab"
        tabindex="0"
      >
        <nav class="navbar">
          <div class="container-fluid p-2">
            <a
              class="navbar-brand text-white"
              style="font-size: x-large; font-weight: 700"
              >Report</a
            >
            <div
              class="d-flex me-3"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')"
            >
              <a
                class="text-white"
                style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                "
                >admin</a
              >
              <a
                ><i
                  class="fa-solid fa-user text-white"
                  style="cursor: pointer; font-size: large"
                ></i
              ></a>
            </div>
          </div>
        </nav>
        <div class="card border-0 bg-transparent" style="padding: 3%">
          <div
            class="card-header text-white p-5"
            style="background-color: #134a6e"
          ></div>
          <div class="container-lg bg-white">
            <div class="list-group" style="padding: 2%">
              <a
                href="#"
                class="list-group-item list-group-item-action list-group-item-secondary"
                data-bs-toggle="modal"
                data-bs-target="#reportMessage"
                style="padding: 1%"
                >From ......</a
              >
            </div>
          </div>
        </div>
      </div>

      <!-- Account -->
      <div
        id="nav-account"
        class="tab-pane fade"
        role="tabpanel"
        aria-labelledby="nav-account-tab"
        tabindex="0"
      >
        <nav class="navbar">
          <div class="container-fluid p-2">
            <a
              class="navbar-brand text-white"
              style="font-size: x-large; font-weight: 700"
              >Account</a
            >
            <div
              class="d-flex me-3"
              onclick="showTabContent('nav-profile', 'nav-profile-tab')"
            >
              <a
                class="text-white"
                style="
                  cursor: pointer;
                  text-decoration: none;
                  margin-right: 10px;
                "
                >admin</a
              >
              <a
                ><i
                  class="fa-solid fa-user text-white"
                  style="cursor: pointer; font-size: large"
                ></i
              ></a>
            </div>
          </div>
        </nav>
        <div class="card border-white bg-transparent" style="padding: 3%">
          <div
            class="card-header text-white p-3"
            style="background-color: #134a6e"
          >
            <button type="button" class="btn btn-primary">
              <i class="fa-solid fa-plus" style="color: white"></i>
            </button>
            <div id="dropdown" class="float-end">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn text-white dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
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
                <button
                  type="button"
                  class="btn text-white dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
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
          <table
            class="table table-bordered text-md-center"
            style="margin-top: 2%"
          >
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Grade</th>
                <th scope="col">Battalion</th>
                <th scope="col"><i class="fa-solid fa-info"></i></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <th scope="row">1</th>
                <td>0001</td>
                <td>Ashura</td>
                <td>Jendral</td>
                <td>Macan Maung AD</td>
                <td>
                  <button
                    type="button"
                    class="btn btn-sm btn-danger text-black"
                  >
                    Delete
                  </button>
                  <button
                    type="button"
                    class="btn btn-sm btn-warning"
                    data-bs-toggle="modal"
                    data-bs-target="#editAccount"
                  >
                    Edit
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Profile -->
      <div
        id="nav-profile"
        class="tab-pane fade"
        role="tabpanel"
        aria-labelledby="nav-profile-tab"
        tabindex="0"
      >
        <nav class="navbar">
          <div class="container-fluid p-2">
            <a
              class="navbar-brand text-white"
              style="font-size: x-large; font-weight: 700"
              >Profile</a
            >
            <div>
              <a class="me-1"
                ><i
                  class="fa-solid fa-user text-white"
                  style="cursor: pointer; font-size: large"
                  onclick="showTabContent('nav-profile', 'nav-profile-tab')"
                ></i
              ></a>
              <a
                class="text-white me-3"
                style="cursor: pointer; text-decoration: none"
                onclick="showTabContent('nav-profile', 'nav-profile-tab')"
                >user</a
              >
              <button type="button" class="btn btn-sm btn-danger me-2">
                Logout
              </button>
            </div>
          </div>
        </nav>
        <?php
        // Sambungkan ke database
        require_once('./php/koneksi.php');

        // Ambil username dari sesi
        $username = $_SESSION['username'];

        // Persiapkan pernyataan SQL
        $sql = "SELECT name, grade, role FROM users WHERE username = ?";

        // Persiapkan pernyataan SQL menggunakan prepared statement
        $stmt = $conn->prepare($sql); $stmt->bind_param("s", $username);
        //Eksekusi pernyataan SQL 
        $stmt->execute(); // Ambil hasil query 
        $result= $stmt->get_result(); // Ambil data pengguna 
        if ($result->num_rows > 0)
        { $row = $result->fetch_assoc(); $name = $row['name']; $grade =$row['grade']; $role = $row['role']; } // Tutup koneksi 
        $stmt->close();
        $conn->close(); ?>
        <div
          class="container-fluid text-center d-grid"
          style="
            margin: 3%;
            width: 95%;
            border-radius: 10px;
            padding: 10%;
            background-color: #134a6e;
          "
        >
          <div class="profile-image">
            <div class="profile-image-placeholder">
              <input
                type="file"
                class="form-control"
                id="floatingInput"
                name="foto"
              />
              <!-- Tambahkan atribut "accept" untuk membatasi tipe file yang dapat diunggah -->
            </div>
          </div>
          <form action="" method="post">
            <div class="profile-info" style="padding: 2% 10% 0 10%">
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="floatingInput"
                  name="name"
                  value="<?php echo $name; ?>"
                  readonly
                />
                <label for="floatingInput">Nama</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="floatingPassword"
                  name="grade"
                  value="<?php echo $grade; ?>"
                  readonly
                />
                <label for="floatingPassword">Grade</label>
              </div>
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  id="floatingPassword"
                  name="role"
                  value="<?php echo $role; ?>"
                  readonly
                />
                <label for="floatingPassword">Role</label>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Modal -->
      <!-- Account -->
      <div
        class="modal fade"
        id="editAccount"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="editAccount"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div
              class="modal-header"
              style="background-color: var(--btn); color: white"
            >
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger">Delete</button>
              <button type="button" class="btn btn-primary">Edit</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Apply Message -->
      <div
        class="modal fade"
        id="applyMessage"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="applyMessage"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div
              class="modal-header"
              style="background-color: var(--btn); color: white"
            >
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Message</h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <p>From ...</p>
              <p>message</p>
              <div class="form-floating" style="margin-bottom: 5px">
                <textarea
                  class="form-control"
                  placeholder="Leave a comment here"
                  id="floatingTextarea"
                ></textarea>
                <label for="floatingTextarea">Comments</label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="flexRadioDefault"
                  id="flexRadioDefault1"
                />
                <label class="form-check-label" for="flexRadioDefault1">
                  Decline
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="flexRadioDefault"
                  id="flexRadioDefault2"
                  checked
                />
                <label class="form-check-label" for="flexRadioDefault2">
                  Accept
                </label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Send</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Report -->
      <div
        class="modal fade"
        id="reportMessage"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="reportMessage"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div
              class="modal-header"
              style="background-color: var(--btn); color: white"
            >
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Message</h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <p>From ...</p>
              <p>message</p>
              <div class="form-floating" style="margin-bottom: 5px">
                <textarea
                  class="form-control"
                  placeholder="Leave a comment here"
                  id="floatingTextarea"
                ></textarea>
                <label for="floatingTextarea">Comments</label>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="button" class="btn btn-primary">Send</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit -->
      <div
        class="modal fade"
        id="edit"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="edit"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div
              class="modal-header"
              style="background-color: var(--btn); color: white"
            >
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="container text-center w-100">
                <div class="row">
                  <div class="col w-30">
                    <img
                      class="w-75 bg-body-secondary"
                      style="margin-bottom: 5%"
                      src="assets/ak47.png"
                      alt=""
                    />
                    <img
                      class="w-75 bg-body-secondary"
                      src="assets/peluru.png"
                      alt=""
                    />
                  </div>
                  <div class="col">
                    <ul class="list-group">
                      <li class="list-group-item list-group-item-secondary">
                        Serial Number
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Name
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Type
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Capacity
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Size
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Weight
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Fire Power
                      </li>
                    </ul>
                  </div>
                  <div class="col">
                    <ul class="list-group">
                      <li class="list-group-item list-group-item-secondary">
                        Speed
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Materials
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Status
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Owner
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Location
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        Maintance
                      </li>
                      <li class="list-group-item list-group-item-secondary">
                        History
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="button" class="btn btn-primary">Send</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/global.js"></script>
  </body>
</html>
