@component('mail::message')
### Email sent from [Contact Page]({{route('contact')}})
# Subject: {{$email->subject}}

{{$email->message}}

##Sent By: {{$email->sender}}, on {{now()->format('d m Y, H:i')}}
@endcomponent
