@props(['listing'])
<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$listing->logo ? asset('public/storage/'. $listing->logo) : asset('public/images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="{{Request::url()}}/show/{{$listing['id']}}">{{$listing['title']}}</a>



            </h3>
            <div class="text-xl font-bold mb-4">{{$listing['company']}}</div>
           <x-listingtags :tagsCsv="$listing['tags']">
           </x-listingtags>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>
                {{$listing['location']}}
            </div>
        </div>
    </div>
</x-card>
