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

        <!-- Sidebar -->
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

                <div class="card-body" style="background-color: white;color:black;">
                    <div class="table-responsive">

                        <h1 class="btn btn-success  btn-sm">Total => {{$total}}</h1>
                        <h1 class="btn btn-primary  btn-sm">commission => {{$total * ($data->commission/100)}}</h1>
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>description</th>
                                    <th>Price</th>
                                    <th>Shipping Rate</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['orders'] as $order )
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->to}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->description}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->shipping_rate}}</td>
                                    <td>{{$order->total}}</td>

                                    <td>
                                        <div class="row">
                                            {{-- <div class="col">
                                                <a href="{{ route('order.edit', $order) }}" class="btn btn-success btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="{{ route('order.show', $order) }}" class="btn btn-info btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div> --}}
                                            <div class="col">
                                                <form id="FormDeleteTime" method="post" action="{{ route('Delete-order-merchant', $order->id) }}">
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger  btn-sm">
                                                        Delete order
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>


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
