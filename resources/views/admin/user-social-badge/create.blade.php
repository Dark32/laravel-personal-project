@extends('layouts.admin')

@section('content')
    <div class="card push-top">
        <div class="card-header">
            создать привязку соц сети
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form action="{{route('admin.user-social-network-badge.store')}}" method="post">
                @csrf
                @can('admin.user.list')
                    <div class="form-group">
                        <label for="user_id">Пользователь</label>
                        <select id="user_id" name="user_id" class="form-control">
                        </select>
                    </div>
                @endcan
                @include('fragment.social-network-badge.select2')
                <div class="form-group">
                    <label for="link">Ссылка</label>
                    <input type="text" class="form-control" name="link" value="{{old('link')}}"/>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Сохранить</button>
            </form>
        </div>
        @endsection



        @push('scripts')
            <script type="application/javascript" defer>
                window.addEventListener("load", function (event) {
                    $('#user_id').select2({
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
