<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="/Client">Client</a>
                        <a class="collapse-item" href="/Delivery">Delivery</a>
                        <a class="collapse-item" href="/Merchants">Merchants</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Heading -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Vechicle</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/Vehicles">All Vechicle</a>
                        <a class="collapse-item" href="/Vehicle_Add">Add New Vechicle</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/Order" >
                    <i class="fas fa-fw fa-folder"></i>
                    <span>All Orders</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/Order_Pending">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Orders Pending</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/Order_Delivery" >
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Orders in Delivery</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/Order_Complete" >
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Orders Complete</span>
                </a>
            </li>
            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                </nav>
                <!-- End of Topbar -->

                <div class="container">
                    <div class="row">


                        <div class="col-lg-12 order-lg-1">

                            <div class="card shadow mb-4">

                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">commision</h6>
                                </div>

                                <div class="card-body">

                                    <form method="POST" action="/Add_commission" autocomplete="off">
                                        @csrf
                                        <h6 class="heading-small text-muted mb-4">commision information</h6>
                                        {{-- {{$data->id}} --}}
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="pl-lg-4">
                                            <div class="row">

                                                <div class="col-lg-4">

                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="name">Minimum Shipping<span
                                                                class="small text-danger">*</span></label>
                                                        <input type="number" id="name" class="form-control" name="minimum_shipping"
                                                            placeholder="Minimum Shipping" value="4">
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="name">Maximum Shipping<span
                                                                class="small text-danger">*</span></label>
                                                        <input type="number" id="name" class="form-control" name="maximum_shipping"
                                                            placeholder="Maximum Shipping" value="{{$data->maximum_shipping}}">
                                                    </div>
                                                </div>
                                                <h1></h1>

                                                <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="name">Commission %<span
                                                                class="small text-danger">*</span></label>
                                                        <input type="number" id="name" class="form-control" name="commission"
                                                            placeholder="Commission" value="{{$data->commission}}">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <!-- Button -->
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
    </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


</body>

</html>
