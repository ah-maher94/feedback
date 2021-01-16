@component('mail::message')
# Your feedback was liked

{{ $liker->name }} liked one of your feedbacks



Thanks,<br>
{{ config('app.name') }}
@endcomponent