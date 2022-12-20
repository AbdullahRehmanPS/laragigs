{{--<h1>{{$heading}} Listings</h1>--}}
{{--@extends('layout')--}}
{{--@section('content')--}}
<x-layout>
    @include('partials/_hero')
    @include('partials/_search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@unless(count($listings) == 0)
@foreach ($listings as $listing)
{{--<a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a><br>--}}
{{--<p>{{$listing['description']}}</p>--}}
            <x-listing-card :listing="$listing"/>
@endforeach
@else
    <p>No Listing Found</p>
@endunless
</div>
</x-layout>
{{--@endsection--}}