@extends('layouts.errors')
@section('title', __('Service Unavailable'))
@section("content", "عفواً هذه الخدمة غير متاحة في الوقت الحالي")
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))