@extends('layouts.errors')
@section('title', __('Server Error'))
@section("content", "عفواً هناك ضغط علي السيرفر حاليا الرجاء اعادة المحاولة")
@section('code', '500')
@section('message', __('Server Error'))