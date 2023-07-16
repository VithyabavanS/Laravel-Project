<x-layout>
    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Approve Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($listings->isEmpty())
                @foreach ($listings as $listing) 
                @if ($listing->approved==0)
                <tr class="border-gray-300">
                    <td 
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/listings/{{$listing->id}}">
                            {{$listing->title}}
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <!-- Approve button -->
                    <form action="{{ route('listings.approve', $listing) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('PUT')
                        <button class="text-blue-400 px-6 py-2 rounded-xl">
                            <i class="fa-solid fa fa-check"></i>
                            Approve
                        </button>
                    </form>
                    </td>

                    <td><!-- Reject button -->
                    <form action="{{ route('listings.reject', $listing) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('PUT')
                        <button class="text-red-500">
                            <i class="fa-solid fa fa-ban"></i>
                            Reject
                        </button>
                    </form>
                    </td>


                
                    {{-- <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/listings/{{$listing->id}}/edit"
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
                    <form method="POST" action="/listings/{{$listing->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"></i>
                            Delete
                        </button>
                    
                    </form>
                    </td> --}}
                </tr>
                {{-- @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">
                            No Listings Found
                        </p>
                    </td>
                </tr> --}}
                @endif
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">
                            No Listings Found
                        </p>
                    </td>
                </tr>
                @endunless
                
            </tbody>
        </table>
    </x-card>

</x-layout>