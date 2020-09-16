@php

    /**
     * @var Role[] $roles
     */use App\Models\Role;
@endphp
<div class="form-group">
    <label for="role">Роли</label>
    <select id="roles_list" name="roles[]" class="form-control" multiple>
        @foreach ($roles as $role)
            <option value="{{$role->id}}" selected="selected">{{$role->name}}({{$role->slug}})</option>
        @endforeach
    </select>

</div>


@push('scripts')
    <script type="application/javascript" defer>
        window.addEventListener("load", function (event) {
            $('#roles_list').select2({
                theme: 'bootstrap4',
                placeholder: "Выбрать роли",
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('admin.role.find')}}',
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
