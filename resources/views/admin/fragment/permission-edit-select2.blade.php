@php
    use App\Permission;
        /**
         * @var Permission[] $permissions
         */
@endphp
<div class="form-group">
    <label for="permission_list">Права</label>
    <input type="hidden" name="permissions[]" value="" />
    <select id="permission_list" name="permissions[]" class="form-control" multiple data-allow-clear=true>
        @foreach ($permissions as $permission)
            <option value="{{$permission->id}}" selected="selected">{{$permission->name}}({{$permission->slug}})</option>
        @endforeach
    </select>

</div>


@push('scripts')
    <script type="application/javascript" defer>
        window.addEventListener("load", function (event) {
            $('#permission_list').select2({
                theme: 'bootstrap4',
                placeholder: "Выбрать права",
                minimumInputLength: 2,
                allowClear: true,
                ajax: {
                    url: '{{route('admin.permission.find')}}',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (obj) {
                                return {id: obj.id, text: (obj.name + '( ' + obj.slug + ')')};
                            })
                        };

                    },
                    cache: true
                }
            });
        })
    </script>
@endpush
