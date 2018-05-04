@component('mail::message')
# Someone needs help on ***ibarralandsurveyors.com.***

    First Name:{{$request->input('firstName')}}.

    Last Name:{{$request->input('lastName')}}.

    Email:{{$request->input('email')}}.

    Company Name:{{$request->input('company')}}.

    Scope of Work:{{$request->input('scope')}}.

    City:{{$request->input('city')}}.

    State:{{$request->input('state')}}.

    Zip Code:{{$request->input('zip')}}.
    
    Message:{{$request->input('comments')}}.

@component('mail::button', ['url' => 'http://ibarralandsurveyors.com'])
Go to Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
