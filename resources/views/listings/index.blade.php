<?php /* ?>
<h1><?php echo $heading; ?></h1>
<br/>
<?php foreach ($listings as $listing) { ?>
    <h2><?php echo  $listing['title']; ?></h2>
    <p><?php echo $listing['description']; ?></p>
<?php } ?>

<?php */ ?>
<?php /* ?>
@php
$test = 1;
@endphp
{{$test}}


<h1>{{$heading}}</h1>
<br/>
<?php */ ?>


@extends('layout')


@section('content')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@unless(count($listings)  == 0)
@foreach ($listings as $listing)
 <?php /* ?>   <h2><a href="/laragigs/listings/{{$listing['id']}}">{{$listing['title']}}</a></h2>
    <p>{{$listing['description']}}</p> <?php */ ?>

 <!-- Item 1 -->



<x-listingcard :listing="$listing"></x-listingcard>

@endforeach

@else
<p>No Record Found.</p>
@endunless

</div>
<div class="mt-6 p-4">
    {{$listings->links() }}
</div>
@endsection
