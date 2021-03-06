@extends('layouts.member')

@section('title', Utility::hasString($member->username) ? Translator::transSmart('app.%s followers', sprintf('%s followers', $member->username ), false, ['username' => $member->username]): Translator::transSmart('app.Followers', 'Followers'))

@section('styles')
    @parent
    {{ Html::skin('app/modules/member/fanpage/page.css') }}
    {{ Html::skin('widgets/social-media/member/card.css') }}
@endsection

@section('scripts')
    @parent
    {{ Html::skin('widgets/social-media/infinite.js') }}
    {{ Html::skin('app/modules/member/fanpage/page.js') }}
    {{ Html::skin('app/modules/member/activity/following.js') }}
    {{ Html::skin('widgets/social-media/member/card.js') }}
@endsection


@section('content')
    <div class="member-profile-follower fanpage">
        @include('templates.member.profile.banner', array('member' => $member, 'sandbox' => $sandbox))
    </div>

    @include('templates.widget.social_media.member.card_layout', array('following' => $following, 'auth_member' => $auth_member, 'profile_member' => $member, 'members' => $followers->pluck('followings'), 'last_id' => $last_follower_id, 'paging' => $follower->getPaging(), 'is_slice_paging' => true, 'url' => URL::route(Domain::route('member::profile::follower-member'), array('username' => $member->username)), 'empty_text' => Translator::transSmart('app.You Have No Followers', 'You Have No Followers') , 'ending_text' => Translator::transSmart('app.Not More', 'Not More')))

@endsection