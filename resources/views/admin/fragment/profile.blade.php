@php
    /**
     * @var \App\UserProfile $profile
     */
@endphp
@isset($profile)

    <div class="container">
        <div class="row">
            <div class="col">Пол</div>
            <div class="col">{{$profile->sex}}</div>
        </div> <div class="row">
            <div class="col">Аватар</div>
            <div class="col">{{$profile->avatar}}</div>
        </div>
    </div>

@endif
