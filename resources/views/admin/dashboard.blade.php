<x-app-layout>
    <div class="container my-5">
        <h2 class="text-center mb-4">Dashboard</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Customers</h5>
                        <p class="display-6">{{ $data['usersCount'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Products</h5>
                        <p class="display-6">{{ $data['productsCount'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="display-6">{{ $data['ordersCount'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-warning">Pending Orders</h5>
                        <p class="display-6 text-warning">{{ $data['pendingOrders'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Completed Orders</h5>
                        <p class="display-6 text-success">{{ $data['completedOrders'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
