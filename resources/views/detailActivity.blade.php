
@extends('layouts.main')
@section('content')

{{-- <img class="w-full max-h-44 object-cover"
                        src="{{ asset('storage/'. $detailActivity->image) }}"
                        alt="Sunset in the mountains"> --}}

                        {{-- {{ !! $detailActivity -> body !! }} --}}
                        
                        <div class="activity flex justify-center bg-slate-200 p-10">
                            {{-- <button class="rounded-full">
                                <a href="">Back</a></button>  --}}
                            <div class="bg-white rounded-lg">   
                                <div class="p-10 text-5xl">
                                    {!! ($detailActivity -> title) !!}
                                </div><div class="pl-10">
                                    Publikasi tanggal
                                    {!! ($detailActivity -> create_at) !!}
                                </div>
                                <div class="p-10 text-balance">
                                    {!! ($detailActivity -> body) !!}
                                </div>
                            </div>
                        </div>


@endsection