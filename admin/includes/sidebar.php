<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link <?= $page == 'index.php' ? 'active' : ''; ?>" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link <?=$page == 'orders-create.php' ? 'active' : ''; ?>" href="orders-create.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                    Create Order
                </a>
                <a class="nav-link <?=$page == 'orders.php' ? 'active' : ''; ?>" href="orders.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Orders
                </a>


                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link 
                <?=($page == 'categories-create.php') || ($page == 'categories.php')? 'active' : 'collapsed'; ?>"
                href="#" data-bs-toggle="collapse" 
                data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                <!-- Change Laout to Cantegory -->
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?=($page == 'categories-create.php') || ($page == 'categories.php')? 'show' : ''; ?>"
                 id="collapseCategory" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'categories-create.php' ? 'active' : ''; ?>" href="categories-create.php">Create Cantegory</a>
                        <a class="nav-link <?=$page == 'categories.php' ? 'active' : ''; ?>" href="categories.php">View Categores</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed
                 <?=($page == 'products-create.php') || ($page == 'products.php')? 'active' : 'collapsed'; ?>"
                href="#" data-bs-toggle="collapse" 
                data-bs-target="#collapsecustomer" aria-expanded="false" aria-controls="collapsecustomer">
                <!-- Change Laout to Cantegory -->
                    <div class="sb-nav-link-icon"><i class="fas fa-columns">
                        
                    </i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?=($page == 'products-create.php') || ($page == 'products.php')? 'show' : ''; ?>" 
                id="collapsecustomer" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'products-create.php' ? 'active' : ''; ?>" href="products-create.php">Create Products</a>
                        <a class="nav-link <?=$page == 'products.php' ? 'active' : ''; ?>" href="products.php">View Products</a>
                    </nav>
                </div>

                <a class="nav-link <?=($page == 'customers-create.php') || ($page == 'customers.php')? 'active' : 'collapsed'; ?>"
                href="#" data-bs-toggle="collapse" 
                data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
                <!-- Change Laout to Customer -->
                    <div class="sb-nav-link-icon"><i class="fas fa-columns">
                        
                    </i></div>
                    Customers
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?=($page == 'products-create.php') || ($page == 'products.php')? 'show' : ''; ?>" 
                id="collapseProduct" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'customers-create.php' ? 'active' : ''; ?>" href="customers-create.php">Create Customer</a>
                        <a class="nav-link <?=$page == 'customers.php' ? 'active' : ''; ?>" href="customers.php">View Customers</a>
                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading">Mange Users</div>

                <a class="nav-link <?=($page == 'admins-create.php') || ($page == 'admins.php')? 'active' : 'collapsed'; ?>" 
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdmins"
                    aria-expanded="false" aria-controls="collapseAdmins">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    <!-- Changed collapseLayout to Admins -->
                    Admins/Staff
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?=($page == 'admins-create.php') || ($page == 'admins.php')? 'show' : ''; ?>" 
                id="collapseAdmins" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <!-- Changed collapseLayout to Admins -->
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'admins-create.php' ? 'active' : ''; ?>" href="admins-create.php">Add Admin</a>
                        <a class="nav-link <?=$page == 'admins.php' ? 'active' : ''; ?>" href="admins.php">View Admins</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?= $_SESSION['loggedInUser']['name']; ?> </a>
        </div>
    </nav>
</div>