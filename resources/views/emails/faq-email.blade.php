@component('mail::message')
# {{$email->subject}}
## Category: {{$email->category}}

{{$email->message}}

##Sent By: {{$email->sender}}, on {{now()->format('d m Y, H:i')}}
@endcomponent
