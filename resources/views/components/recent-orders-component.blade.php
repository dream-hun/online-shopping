<div class="card">
    <div class="card-header">
        <strong> Recent orders</strong>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.order_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.client_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.client_phone') }}
                        </th>

                        <th>
                            {{ trans('cruds.order.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.shipping_address') }}
                        </th>



                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        <tr>

                            <td>
                                {{ $order->order_no ?? '' }}
                            </td>
                            <td>
                                {{ $order->client_name ?? '' }}
                            </td>
                            <td>
                                {{ $order->client_phone ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Order::STATUS_SELECT[$order->status] ?? '' }}
                            </td>
                            <td>
                                {{ $order->shipping_address ?? '' }}
                            </td>

                            <td>
                                @can('order_show')
                                    <a class="btn btn-md btn-primary" href="{{ route('admin.orders.show', $order->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('order_edit')
                                    <a class="btn btn-md btn-info" href="{{ route('admin.orders.edit', $order->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
