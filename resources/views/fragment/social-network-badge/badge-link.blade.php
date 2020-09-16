@php
/**
 * @var \App\UserSocialNetworkBadge $badge
 */
@endphp
<a href="{{$badge->link}}">@include('fragment.social-network-badge.badge-icon',['badge'=>$badge->socialBadge])</a>
