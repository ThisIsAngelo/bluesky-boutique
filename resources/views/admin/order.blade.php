<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg {
            border: 2px solid white;
            width: 90%;
            margin: auto;
            text-align: center;
        }

        .th_deg {
            background-color: skyblue;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">All Orders</h1>

                <div style="margin-left:51px; align-item:center;" class="">
                    <form action="{{url('search')}}" method="GET">
                        @csrf
                        <input style="color: black" type="text" name="search" placeholder="Search for something">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>

                <table class="table_deg">
                    <tr class="th_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                    </tr>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product_title }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>
                                <img src="{{ asset('storage/product/' . $order->image) }}" />
                            </td>
                            <td>
                                @if ($order->delivery_status == 'Processing')
                                    <a href="{{ url("/delivered/{$order->id}") }}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary">Delivered</a>
                                @else
                                    <p style="color: green;">Delivered</p>
                                @endif
                            </td>
                            @empty
                            <tr>
                                <td colspan="16">
                                    Data Not Found
                                </td>
                            </tr>

                        </tr>
                    @endforelse

                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>