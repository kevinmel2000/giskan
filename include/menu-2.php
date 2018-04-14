<?php
    $page = explode("/",$_SERVER['REQUEST_URI']);
    $take = $page[count($page)-1];
?>

<div class="wrapper">
    <div class="sidebar" data-color=green data-image="assets/img/sidebar-5.jpg">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Kuaci Clan
                </a>
            </div>
            <ul class="nav">
                <li <?php if($take=='index.php'){echo 'class="nav-item active"';} ?>>
                    <a class="nav-link" href="../../index.php">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li <?php if($take=='lokasi.php'){echo 'class="nav-item active"';} ?>>
                    <a class="nav-link" href="../../lokasi.php">
                        <i class="nc-icon nc-circle-09"></i>
                        <p>Data Toko</p>
                    </a>
                </li>
                <li <?php if($take=='edit.php'){echo 'class="nav-item active"';} ?>>
                    <a class="nav-link" href="edit.php">
                        <i class="nc-icon nc-paper-2"></i>
                        <p>Edit Data</p>
                    </a>
                </li>
                <li <?php if($take=='home.php'){echo 'class="nav-item active"';} ?>>
                    <a class="nav-link" href="home.php">
                        <i class="nc-icon nc-atom"></i>
                        <p>User</p>
                    </a>
                </li>
                <li <?php if($take=='barang.php'){echo 'class="nav-item active"';} ?>>
                    <a class="nav-link" href="../../barang.php">
                        <i class="nc-icon nc-pin-3"></i>
                        <p>Data Barang</p>
                    </a>
                </li>
                <li class="nav-item active active-pro">
                    <a class="nav-link active" href="upgrade.html">
                        <i class="nc-icon nc-alien-33"></i>
                        <p>Gis Untuk Nelayan</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
