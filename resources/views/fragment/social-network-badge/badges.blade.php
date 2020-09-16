@php
/**
 * @var \App\UserSocialNetworkBadge[] $badges
 */
@endphp
@foreach($badges as $badge)
    @include('fragment.social-network-badge.badge-link',['badge'=>$badge])
@endforeach
