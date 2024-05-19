@extends('layouts.main')
@section('content')
<div>
<section id="kegiatan" class="flex justify-center 2xl:my-24 xl:my-24 sm:my-14 sm:pb-60">
    <div class="2xl:px-28 xl:px-28 sm:px-10">
        <h1 class="2xl:text-5xl xl:text-5xl md:text-4xl 2xl:inline-block xl:inline-block sm:flex sm:text-2xl sm:font-bold 2xl:font-normal xl:font-normal lg:font-normal ">
            Kegiatan
        </h1>
        <div>
                    {{-- <h1 class="2xl:text-5xl xl:text-5xl 2xl:inline-block xl:inline-block 2xl:float-right xl:float-right sm:flex sm:text-2xl"><a href="{{ route('allActivity') }}">View All</a></h1> --}}

                    
                    {{-- <div class="2xl:flex sm:inline-block 2xl:justify-center xl:justify-center 2xl:gap-7 xl:gap-7 md:gap-3">
                    @foreach($allactivity as $activities)    
                        <div class="w-full rounded overflow-hidden shadow-lg my-10 border-red-500 border-2">
                            <img class="w-full max-h-44 object-cover"
                                src="{{ asset('storage/'. $activities->image) }}"
                                alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $activities->title }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $activities -> body}}
                                </p>
                            </div>
                        </div>   
                    @endforeach
                    </div> --}}

                    {{-- <div class="gap-4 2xl:justify-center xl:justify-center 2xl:gap-7 xl:gap-7 md:gap-3">
                        @foreach($allactivity as $activities)    
                        <div class="w-3/4 rounded overflow-hidden shadow-lg my-10">
                            <img class="w-full max-h-44 object-cover"
                                src="{{ asset('storage/'. $activities->image) }}"
                                alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $activities->title }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $activities -> body}}
                                </p>
                            </div>
                        </div>   
                    @endforeach --}}
                </div>                   
        <div class="2xl:grid xl:grid sm:inline-block grid-cols-3 gap-4 2xl:justify-center xl:justify-center 2xl:gap-7 xl:gap-7 md:gap-3">

            @foreach($allactivity as $activities)    
            <div class=" bg-white rounded-lg w-full rounded overflow-hidden shadow-lg my-10">
                <img class="w-full max-h-44 object-cover"
                    src="{{ asset('storage/'. $activities->image) }}"
                    alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2"><a href="detailActivity/{{ $activities->id }}">{{ $activities->title }}</a></div>
                    <div class="font-bold text-xl mb-2">{{ $activities->created_at->todatestring()}}</div>
                    {{-- <p class="text-gray-700 text-base">
                        {{ $activities -> body}}
                    </p> --}}
                </div>
            </div>
  
            @endforeach


        




    </div>

</section>
@endsection