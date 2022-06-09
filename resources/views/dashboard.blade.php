@extends('app')

<div class="container">
    <div class="row">
        <div class="col-md-8">
        <h4>Welcome  {{$details->firstname}}   {{$details->lastname}}  {{$details->email}}</h4>
        </div>

        <div class="col-md-4">
        <button> <a href="logout">Logout</a> </button>

        </div>


    </div>
</div>