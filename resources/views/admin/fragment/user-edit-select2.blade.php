@php
    use App\Models\User;
    /**
     * @var User[] $users
     */
@endphp
<div class="form-group">
    <label for="users">Пользователи</label>
    <select id="users_list" name="users[]" class="form-control" multiple>
        @foreach ($users as $user)
            <option value="{{$user->id}}" selected="selected">{{$user->name}}({{$user->email}})</option>
        @endforeach
    </select>

</div>


@push('scripts')
    <script type="application/javascript" defer>
        window.addEventListener("load", function (event) {
            $('#users_list').select2({
                theme: 'bootstrap4',
                placeholder: "Выбрать пользователей",
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('admin.user.find')}}',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (obj) {
                                return {id: obj.id, text: (obj.name + '( ' + obj.email + ')')};
                            })
                        };

                    },
                    cache: true
                }
            });
        })
    </script>
@endpush
