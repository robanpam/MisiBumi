@extends('layout.master')

@section('title', 'Password Reset')

@section('content')
    <h1>Password Reset Request</h1>
    <p>We received a request to reset your password. Click the link below to create a new password:</p>
    <p>
        <a href="{{ $link }}">{{ $link }}</a>
    </p>
    <p>If you did not request this, please ignore this email.</p>
    <p>Thank you!</p>
@endsection()
