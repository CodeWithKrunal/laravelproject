@extends('layout')

@section('content')
<?php /* ?>
<h2>
   Title: {{$listing['title']}}
</h2>
<h3>Comapany: {{$listing['company']}}</h3>
<h3>Location: {{$listing['location']}}</h3>
<h3>Website: {{$listing['website']}}</h3>
<h3>Tags: {{$listing['tags']}}</h3>

<p>
    Description: {{$listing['description']}}
</p>
<?php */ ?>

<a href="{{url('/')}}" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card>
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$listing->logo ? asset('public/storage/' . $listing->logo ) : asset('public/images/no-image.png')}}"
                            alt=""
                        />



                        <h3 class="text-2xl mb-2">{{$listing['title']}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listing['company']}}</div>

                        <x-listingtags :tagsCsv="$listing['tags']"></x-listingtags>

                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$listing['location']}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                   {{$listing['description']}}
                                </p>


                                <a
                                    href="mailto:{{$listing['email']}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                <a
                                    href="{{$listing['website']}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                            </div>

                        </div>
                    </div>
                </x-card>

<x-card class="mt-4 p-2 flex space-x-6">
    <a class="text-right" href="{{ url('/listings/'.$listing->id .'/edit') }}"> <i class="fa-solid fa-pencil"></i></i> Edit</a>


    <form method="POST" action="{{url('')}}/listings/{{$listing->id}}/delete">
        @csrf
        @method('DELETE')
        <button> <i class="fa-solid fa-trash"></i> Delete</button>
    </form>

</x-card>






            </div>

@endsection
