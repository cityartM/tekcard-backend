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
             {data: 'id', name: 'id',searchable: false},
                 @foreach($columns as $key => $column)
                 @if(is_array($column))
             {data: '{{$key}}', name: '{!! $column[0] !!}'},
                 @else
             {data: '{!! $column !!}', name: '{!! $column !!}'},
                 @endif
                 @endforeach
             {data: 'action', searchable: false, orderable: false}
         ]
     });
</script>
