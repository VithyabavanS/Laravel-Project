<x-layout>
@include('partials._hero')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless(count($listings)==0)

@foreach ($listings as $listing)
@if ($listing->approved == 1)
    <x-listing-card :listing="$listing"/>
    @else
    
    <x-card >
        <div class="flex border-b-2 border-blue-500 pb-5 border-opacity-50">
            <img
                class="hidden w-48 mr-10 md:block"
                src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image-blue.png')}}"
                alt=""
            />
            <div>
                <div class="text-lg mt-4 mb-4">
                    <i class="fa-solid fa-user"></i> {{$listing->user_name}}
                </div>
                
               
                <h3 class="text-2xl mb-4">
                    <p>Waiting for Admin's Approval</p> 
                </h3>
                <div class="text-xl font-bold mb-4"></div>
                {{-- <x-listing-tags :tagsCsv="$listing->tags"/> --}}
               
            </div>
        </div>
    </x-card>
    
    
@endif
@endforeach

@else
    <p>No Listings Found</p>
@endunless

 </div>   
<div class="mt-6 p-4">
    {{$listings->links()}}
</div>

</x-layout>
