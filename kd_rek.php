<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <title>Lawang Kota</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul style="background-color:#23222f;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-door-open"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lawang Kota<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="far fa-star"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- List Import Data Laporan Dari Excel -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-folder-open"></i>
                    <span>Import</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Laporan :</h6>
                        <a class="collapse-item" href="lra.php">Data LRA</a>
                        <a class="collapse-item" href="realisasi_rek.php">Data Realisasi <br />
                            Per Rekening</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider" />

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-folder"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master :</h6>
                        <a class="collapse-item" href="skpd.php">Data SKPD</a>
                        <a class="collapse-item" href="program.php">Data Program</a>
                        <a class="collapse-item" href="kegiatan.php">Data Kegiatan</a>
                        <a class="collapse-item" href="sub_keg.php">Data Sub Kegiatan</a>
                        <a class="collapse-item" href="urusan.php">Data Urusan</a>
                        <a class="collapse-item" href="urusan_mapping.php">
                            Data Urusan Mapping</a>
                        <a class="collapse-item" href="kd_rek.php"> Data Kode Rekening</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider" />

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-map"></i>
                    <span>Cetak Laporan</span>
                </a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cetak Laporan :</h6>
                        <a class="collapse-item" href="real_pem.php">Laporan Realisasi <br />
                            Anggaran Pendapatan <br />
                            Dan Belanja</a>
                        <a class="collapse-item" href="lra_pendapatan.php">Laporan Target Dan <br />
                            Realisasi Pendapatan <br />
                            Asli Daerah <br /></a>
                        <a class="collapse-item" href="rrb.php">Laporan Realisasi<br />
                            Anggaran Belanja Menurut<br />
                            Urusan Dan Fungsi</a>
                        <a class="collapse-item" href="rekap_pdn.php">Rekap Realisasi PDN</a>
                        <a class="collapse-item" href="rekap_disdik.php">Rekapitulasi Realisasi <br />
                            Pendidikan</a>
                        <a class="collapse-item" href="rekap_diskes.php">Rekapitulasi Realisasi <br />
                            Kesehatan</a>
                        <a class="collapse-item" href="rekap_publik.php">Rekapitulasi Realisasi <br />
                            Publik</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_pengguna']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kode Rekening</h6>
                        </div>
                        <div class="card-body">
                            <div style="margin: auto; width: 1183px; padding-top: 20px; padding-bottom: 20px;">

                                <?php include("aksi_kd_rek.php") ?>

                                <form action="" method="POST" enctype="multipart/form-data" class="row g-2">
                                    <div class="col-auto">
                                        <input class="form-control" type="file" name="filexls" id="formFile" />
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Upload File Kode Rekening" />
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style='width: 3%;'>No</th>
                                            <th>Kode Rekening</th>
                                            <th>Uraian</th>
                                            <th>Kode Level</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>

                                    <?php

                                    include "koneksi.php";
                                    $ambildata = mysqli_query($conn, "SELECT * FROM kode_rekening WHERE nomor <> 0");
                                    while ($tampil = mysqli_fetch_array($ambildata)) {
                                        echo "
                                            <tr>
                                            <td>$tampil[nomor]</td>
                                            <td>$tampil[kd_rek]</td>
                                            <td>$tampil[uraian]</td>
                                            <td>$tampil[kd_level]</td>
                                            <td>$tampil[tipe]</td>
                                            </tr>";
                                    }

                                    ?>

                                    <tfoot>
                                        <tr>
                                            <th style='width: 3%;'>No</th>
                                            <th>Kode Rekening</th>
                                            <th>Uraian</th>
                                            <th>Kode Level</th>
                                            <th>Type</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lawang Kota</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar Dari Aplikasi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pilih "Keluar" di bawah jika Anda ingin mengakhiri sesi Anda saat ini.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Batal
                    </button>
                    <a class="btn btn-primary" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>