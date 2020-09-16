@php
    /**
     * @var \App\SocialNetworkBadge $badge
     */
@endphp
<div class="form-group">
    <label for="social_network_badge">Социальная сеть</label>
    <select id="social_network_badge" name="social_network_badge_id" class="form-control">
        @isset($badge)
            <option value="{{$badge->id}}" selected="selected">{{$badge->name}}({{$badge->slug}})</option>
        @endif

    </select>

</div>


@push('scripts')
    <script type="application/javascript" defer>
        window.addEventListener("load", function (event) {
            $('#social_network_badge').select2({
                theme: 'bootstrap4',
                placeholder: "Выбрать cоц сеть",
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('snb.find')}}',
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
                    cache: true,
                }
            });
        })
    </script>
@endpush
