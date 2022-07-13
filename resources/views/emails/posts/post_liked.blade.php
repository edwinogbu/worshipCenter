@component('mail::message')
#Your Post was Liked

{{ $liker->first_name }} liked one of your posts

@component('mail::button', ['url' => route('user.userPost.show', $post)])
    view post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
