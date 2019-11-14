<?php

use App\Plan;

function jsoon_data($json_data)
{
return json_decode($json_data);
}
function contracts()
{
    return \DB::table('contracts')->where('active',1)->get();
}
function temprature()
{
    return \DB::table('temperaturesConstraints')->where('active',1)->get();
}
function cdc()
{
    return \DB::table('cdcs')->groupBy('description')->where('active',1)->get();
}

function ati()
{
    return \DB::table('ati')->orderBy('id','desc')->where('active',1)->get();
}
function tranportationType()
{
    return \DB::table('transportationsTypes')->orderBy('id','desc')->where('active',1)->get();
}
function planType()
{
    return \DB::table('plansTypes')->orderBy('id','desc')->where('active',1)->get();
}
function agent()
{
    return \DB::table('agents')->orderBy('id','desc')->where('active',1)->get();
}
function plan()
{
    return \DB::table('plans')->groupBy('description')->where('active',1)->orderBy('id','desc')->get();
}
function address()
{
    return \DB::table('addresses')->groupBy('description')->where('active',1)->orderBy('id','desc')->get();
}
function sanificationsType()
{
return \DB::table('sanificationsTypes')->orderBy('id','desc')->where('active',1)->get();
}
