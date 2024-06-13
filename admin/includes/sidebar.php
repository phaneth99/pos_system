<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link collapsed" 
                href="#" data-bs-toggle="collapse" 
                data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                <!-- Change Laout to Cantegory -->
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategory" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="categories-create.php">Create Cantegory</a>
                        <a class="nav-link" href="categories.php">View Categores</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" 
                href="#" data-bs-toggle="collapse" 
                data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
                <!-- Change Laout to Cantegory -->
                    <div class="sb-nav-link-icon"><i class="fas fa-columns">
                        
                    </i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProduct" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="products-create.php">Create Products</a>
                        <a class="nav-link" href="products.php">View Products</a>
                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading">Mange Users</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdmins"
                    aria-expanded="false" aria-controls="collapseAdmins">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    <!-- Changed collapseLayout to Admins -->
                    Admins/Staff
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAdmins" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <!-- Changed collapseLayout to Admins -->
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="admins-create.php">Add Admin</a>
                        <a class="nav-link" href="admins.php">View Admins</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Group 01
        </div>
    </nav>
</div>