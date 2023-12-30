<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="antialiased">
        <h1>Email : {{ $email }}</h1>
        <h1><a href="{{ $url }}">Click To Reset Password.</a></h1>
    </body>
</html>


{{-- @component('mail::message')
# Introduction

Message for : {{$name}}
Click on the button below to confirm your account
@component('mail::button', ['url' => $url])
Click to Activate
@endcomponent

Thank you,<br>
{{ config('app.name') }}
@endcomponent --}}