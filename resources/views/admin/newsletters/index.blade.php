@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.newsletter.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Newsletter">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.newsletter.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsletter.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsletter.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsletter.fields.is_active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newsletters as $key => $newsletter)
                        <tr data-entry-id="{{ $newsletter->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $newsletter->id ?? '' }}
                            </td>
                            <td>
                                {{ $newsletter->name ?? '' }}
                            </td>
                            <td>
                                {{ $newsletter->email ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $newsletter->is_active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $newsletter->is_active ? 'checked' : '' }}>
                            </td>
                            <td>



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Newsletter:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection