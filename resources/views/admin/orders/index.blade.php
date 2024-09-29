@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
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
                                {{ trans('cruds.order.fields.payment_type') }}
                            </th>
                            <th>
                                Deliverly Method
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.status') }}
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
                                    <span class="badge bg-info">
                                        {{ $order->payment_type }}</span>
                                </td>
                                <td>
                                    {{ $order->delivery_method ?? '' }}
                                </td>

                                <td>
                                    {{ $order->status ?? '' }}
                                </td>

                                <td>
                                    @can('order_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.orders.show', $order->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('order_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.orders.edit', $order->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
