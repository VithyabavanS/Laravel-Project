@props(['listing'])
<x-card >
    <div class="flex border-b-2 border-blue-500 pb-5 border-opacity-50">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image-blue.png')}}"
            alt=""
        />
        <div>
            <div class="text-lg mt-4 mb-4">
                <i class="fa-solid fa-user"></i> {{$listing->user_name}}
            </div>
            
           
            <h3 class="text-2xl mb-4">
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            {{-- <div class="text-xl font-bold mb-4">{{$listing->company}}</div> --}}
            <x-listing-tags :tagsCsv="$listing->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>