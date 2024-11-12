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
                        <th width="10">

                        </th>
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
                                Delivery Method
                            </th>
                            <th>
                                {{ trans('cruds.order.fields.status') }}
                            </th>
                            <th>
                                Placed At
                            </th>

                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr data-entry-id="{{ $order->id }}">
                                <td>

                                </td>
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
                                    {{ $order->created_at ?? '' }}
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
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('order_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.orders.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            let table = $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
