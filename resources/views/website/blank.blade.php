@extends('website.master')
@section('title', $page)
@section('style_header','background:black;color:#fff')
@section('contint')

<div style="margin-top:100px "></div>

@include('website/'.$page)




@endsection
