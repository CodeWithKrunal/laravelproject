@extends('layout')
@section('content')
<div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <header>
                        <h1
                            class="text-3xl text-center font-bold my-6 uppercase"
                        >
                            Manage Gigs
                        </h1>
                    </header>

                    <table class="w-full table-auto rounded-sm">
                        <tbody>

                          @unless($listings->isEmpty())

                          @foreach ($listings as $listing)

                            <tr class="border-gray-300">
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <a href="{{ $listing->id }}/edit">
                                        {{ $listing->title }}
                                    </a>
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <a
                                        href="{{ url('') }}/listings/{{ $listing->id }}/edit"
                                        class="text-blue-400 px-6 py-2 rounded-xl"
                                        ><i
                                            class="fa-solid fa-pen-to-square"
                                        ></i>
                                        Edit</a
                                    >
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >

                                    <form method="POST" action="{{url('')}}/listings/{{$listing->id}}/delete">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">
                                            <i
                                                class="fa-solid fa-trash-can"
                                            ></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr class="border-gray-300">
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                        No Listing Found
                                </td>
                            </tr>

                            @endunless
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
