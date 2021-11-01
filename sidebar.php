<?php
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<!-- Sidebar -->
<div class="sidebar">



    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
                <a href="dashboard.php" class="nav-link <?= ($activePage == 'dashboard') ? 'active':''; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard

                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="renters.php" class="nav-link <?= ($activePage == 'renters' || $activePage == 'add_renters') ? 'active':''; ?>">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        Renters

                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="apartments.php" class="nav-link <?= ($activePage == 'apartments' || $activePage == 'add_apartments') ? 'active':''; ?>">
                    <!--<i class="nav-icon fas fa-people-carry"></i>-->
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                        Apartment List

                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="rentmanage.php" class="nav-link <?= ($activePage == 'rentmanage' || $activePage == 'add_flatrent') ? 'active':''; ?>">
                    <!--<i class="nav-icon fas fa-people-carry"></i>-->
                    <i class="nav-icon fas fa-house-user"></i>
                    <p>
                        Rent Management

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="invoice_list.php" class="nav-link <?= ($activePage == 'invoice_list') ? 'active':''; ?>">
                    <!--<i class="nav-icon fas fa-people-carry"></i>-->
                    <i class="nav-icon fas fa-file-invoice"></i>
                    <p>
                        Invoice
                    </p>
                </a>
            </li>


            <li class="nav-item <?= ($activePage == 'expense_category' || $activePage == 'expense_list' || $activePage == 'add_expense') ? 'menu-open':'' ; ?>">
                <a href="expense.php" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        Expense
                        <i class="right fas fa-angle-left"></i>

                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="expense_category.php" class="nav-link <?= ($activePage == 'expense_category') ? 'active':''; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="expense_list.php" class="nav-link <?= ($activePage == 'expense_list') ? 'active':''; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Expense List</p>
                        </a>
                    </li>

                </ul>


            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Reports
                        <i class="right fas fa-angle-left"></i>

                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="sales_report.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sales Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="expense_report.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Expense Report</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="sales_chart.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sales Chart </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="expense_chart.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Expense Chart</p>
                        </a>
                    </li>

                </ul>


            </li>

            <li class="nav-item">
                <a href="products.php" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Settings
                        <i class="right fas fa-angle-left"></i>

                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="apartment_information.php" class="nav-link <?= ($activePage == 'apartment_information') ? 'active':''; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Apartment Information</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="all_users.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Users</p>
                        </a>
                    </li>
                </ul>

            </li>

            <li class="nav-item">
                <a href="security_guards.php" class="nav-link <?= ($activePage == 'security_guards' || $activePage == 'edit_guards') ? 'active':''; ?>">
                    <i class="nav-icon fas fa-user-secret"></i>
                    <p>
                        Security Guards

                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>