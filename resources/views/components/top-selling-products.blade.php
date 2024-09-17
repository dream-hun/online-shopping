<div class="card">
    <div class="card-header">
        <strong>Top Selling Products</strong>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-hover table-outline mb-0">
            <thead class="thead-light">
                <tr>
                    <th>Product Name</th>
                    <th class="text-center">Total Sales</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>
                            <div>{{ $product->name }}</div>
                        </td>
                        <td class="text-center">
                            <strong>{{ $product->total }}</strong>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">No top selling products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
