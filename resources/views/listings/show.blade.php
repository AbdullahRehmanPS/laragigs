{{--@extends('layout')--}}
{{--@section('content')--}}
<x-layout>
    @include('partials/_search')
    {{--<h1>{{$listing['title']}}</h1>--}}
    {{--<p>{{$listing['description']}}</p>--}}
    <a href="/" class="inline-block text-black ml-4 mb-4 hover:text-laravel">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card>
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt=""/>
                <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>

                <x-listing-tags :tagsCsv="$listing->tags" />

                <div class="text-lg my-4 hover:text-laravel">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>

                <div>
                    <h3 class="text-3xl font-bold mb-4">Job Description</h3>
                    <div class="text-lg space-y-6">
                        <p>{{$listing->description}}</p>
                        <div class="flex flex-col items-center justify-center text-center">
                            <a href="mailto:{{$listing->email}}" target="_blank" class="bg-laravel text-white w-60 mt-6 py-2 rounded-xl hover:bg-black">
                                <i class="fa-solid fa-envelope"></i> Contact Employer
                            </a>
                            <a href="{{$listing->website}}" target="_blank" class="bg-black text-white mt-3 w-60 py-2 rounded-xl hover:bg-laravel">
                                <i class="fa-solid fa-globe"></i> Visit Website
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </x-card>
        <x-card class="mt-4 flex space-x-6">
            <a href="/listings/{{$listing->id}}/edit" class="hover:text-laravel">
                <i class="fa-solid fa-edit"></i> Edit
            </a>
            <form action="/listings/{{$listing->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:opacity-80">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
        </x-card>
    </div>
</x-layout>
{{--@endsection--}}
