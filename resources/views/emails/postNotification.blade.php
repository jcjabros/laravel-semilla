@component('mail::message')
# Check out our new Post {{$post->title}}

{!!substr($post->body,0,160)!!}

@component('mail::button', ['url' => 'laravelsemilla.test/posts/{{$post->id}}'])
Read More
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
