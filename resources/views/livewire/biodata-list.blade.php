<div class="xl:p-16 p-5 h-screen bg-gray-100" style="background-image: url('/images/bg.jpg'); background-size: cover; background-position: center;">
    <div class="overflow-auto rounded-lg shadow-xl">
        <table class="w-full">
            <thead class="bg-white border-b-2 border-gray-200 border-spacing-2">
            <tr class="text-left">
                <th class="p-3 text-sm font-semibold tracking-wide text-center">
                    No.
                </th>
                <th class="p-3 text-sm font-semibold tracking-wide">
                    Nama
                </th>
                <th class="p-3 text-sm font-semibold tracking-wide">
                    Usia
                </th>
                <th class="p-3 text-sm font-semibold tracking-wide">
                    Jenis Kelamin
                </th>
                <th class="p-3 text-sm font-semibold tracking-wide">
                    Domisili(Kota)
                </th>
                <th class="p-3 text-sm font-semibold tracking-wide">

                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @foreach($this->bios as $index => $biodata)
                <tr class="bg-white">
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">{{ $index + 1}}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap  font-semibold">

                        <div class="xl:flex xl:items-center xl:gap-5">
                            <img
                                src="{{ asset('storage/' .$biodata->image)  }}"
                                class="h-12 rounded-lg w-12"
                                alt="{{ 'Photo Profile '. $biodata->full_name }}"
                            />
                            {{ $biodata->full_name }}
                        </div>

                        
                    </td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ \Carbon\Carbon::parse($biodata->birth_date)->diff(\Carbon\Carbon::now())->format('%y') }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $biodata->gender }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $biodata->address->city->name }}</td>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                        <a href="detail/{{ $biodata->id }}" class="rounded-xl px-5 bg-gray-500 p-2 text-white">
                            Details
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <div class="p-3 bg-white">
            {{ $this->bios->links() }}
        </div>
    </div>

</div>

