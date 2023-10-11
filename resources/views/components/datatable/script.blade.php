<script>
    $.extend(true, $.fn.dataTable.defaults, {
        ajax: {
            url: '{!! $route !!}',
            data: function (d) {
                return $.extend({}, d, {
                    // Columns
                });
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            @foreach($columns as $key => $column)
                @if(is_array($column))
                    {data: '{{$key}}', name: '{!! $column[0] !!}'},
                @else
                    {data: '{!! $column !!}', name: '{!! $column !!}'},
                @endif
            @endforeach
            @if ($action)
                {data: 'action', searchable: false, orderable: false}
            @endif
        ]
    });
</script>
