<table id="datatables" class="table align-middle table-row-dashed fs-6 gy-5 text-center">
    <thead>
        <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th>#</th>
            {{$slot}}
            @if ($action)
                <th>{{__('Control')}}</th>
            @endif
        </tr>
    </thead>
</table>
