<table id="datatables" class="text-gray-600 table align-middle table-row-dashed fs-6 fw-bold gy-5 dataTable no-footer">
    <thead>
        <tr class="text-start text-gray-600 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-10px" rowspan="1" colspan="1">#</th>
            {{$slot}}
            @if ($action)
                <th rowspan="1" colspan="1" >{{__('app.action')}}</th>
            @endif
        </tr>
    </thead>
</table>
