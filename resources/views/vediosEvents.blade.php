@extends('layouts.template')
@section('content')
<BR></BR>
<BR></BR>
<BR></BR>
<BR></BR>
<center>
<p class="font-weight-bold">Visitors  :  {{$viewer->viewers}}</p>
</center>
<br> <br>
<div class="row justify-content-center mt-5">
    <div class="col-12 col-md-6">
    <p>
    @include('includes.video1')
    </p>
    </div>
    <div class="col-12 col-md-6">
    <p>
        @include('includes.video2')
    </p>
    </div>
    </div><div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6">
        <p>
        @include('includes.video1')
        </p>
        </div>
        <div class="col-12 col-md-6">
        <p>
            @include('includes.video2')
        </p>
        </div>
        </div><div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6">
            <p>
            @include('includes.video1')
            </p>
            </div>
            <div class="col-12 col-md-6">
            <p>
                @include('includes.video2')
            </p>
            </div>
            </div><div class="row justify-content-center mt-5">
                <div class="col-12 col-md-6">
                <p>
                @include('includes.video1')
                </p>
                </div>
                <div class="col-12 col-md-6">
                <p>
                    @include('includes.video2')
                </p>
                </div>
                </div>