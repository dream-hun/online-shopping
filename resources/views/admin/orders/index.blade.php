@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Order">
                    <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.order.fields.order_no') }}</th>
                        <th>{{ trans('cruds.order.fields.client_name') }}</th>
                        <th>{{ trans('cruds.order.fields.client_phone') }}</th>
                        <th>{{ trans('cruds.order.fields.payment_type') }}</th>
                        <th>Delivery Method</th>
                        <th>{{ trans('cruds.order.fields.status') }}</th>
                        <th>Placed At</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
            @can('order_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.orders.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id;
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}');
                        return;
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }
                        })
                            .done(function () { location.reload() });
                    }
                }
            };
            dtButtons.push(deleteButton);
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.orders.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'order_no', name: 'order_no' },
                    { data: 'client_name', name: 'client_name' },
                    { data: 'client_phone', name: 'client_phone' },
                    { data: 'payment_type', name: 'payment_type' },
                    { data: 'delivery_method', name: 'delivery_method' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            };
            let table = $('.datatable-Order').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        });
    </script>
@endsection
