{{-- <nav class="bg-indigo-500">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Team</a>
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Projects</a>
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Calendar</a>
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>
  
          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
            </div>
  
            <!--
              Dropdown menu, show/hide based on menu state.
  
              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
          </div>
        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
      </div>
    </div>
  </nav> --}}
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class=" flex flex-wrap items-center justify-between mx-[4%] p-4 ">
        <a href="{{ route('landingpage') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('/images/logo.png') }}" alt="logo" class="h-10">
            <span
                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
            >Joglosemar</span
            >
        </a>
        <button
            data-collapse-toggle="navbar-default"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default"
            aria-expanded="false"
        >
            <span class="sr-only">Open main menu</span>
            <svg
                class="w-5 h-5"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 17 14"
            >
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15"
                />
            </svg>
        </button>
            <div class="">
                <ul class="flex gap-[1vw] font-bold items-center text-white">
                    <div class="flex gap-2">
                        <div>
                            <livewire:search-box/>
                        </div>
                        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                            <ul
                                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                            >
                                <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                                    <img
                                        src="https://media-cgk1-1.cdn.whatsapp.net/v/t61.24694-24/328800017_650674973695588_5564531715144486245_n.jpg?ccb=11-4&oh=01_AdQBbDYAzSi8N2bpqn3F50y_lnJ0UpniwphOtPvbphf1bA&oe=655C331D&_nc_sid=e6ed6c&_nc_cat=102"
                                        class="h-10 rounded-3xl"
                                        alt=""
                                    />
                                </a>
                            </ul>
                        </div>
                    </div>
                </ul>
            </div>
    </div>
</nav>
{{-- <header class="bg-white shadow-md">
    <nav class="flex justify-between items-center">
        <div class="pl-12">
            <a href="{{ route('landingpage') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('/images/logo.svg') }}" alt="logo" class="h-10">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap"
                >Paguyuban Joglo Semar</span
                >
            </a>
        </div>
        <div class="py-6">
            <ul class="flex items-center gap-[2vw] font-bold">
                <li class="ml-10">
                    <img class="w-10" src="storage/python.png" alt="">
                </li>
            </ul>

        </div>

        <div class="flex justify-center mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <ul class="flex gap-[2vw] font-bold items-center">
                <li class="hover:text-green-600">
                    <a href="#dashboard">Dashboard</a>
                </li>
                <li class="hover:text-green-600">
                    <a href="#kegiatan">Kegiatan</a>
                </li>
                <li class="hover:text-green-600">
                    <a href="#saldo" class="mr-10">Saldo</a>
                </li>
                <li>
                    <div class="flex gap-2 pr-6">
                        <div>
                            <livewire:search-box/>
                        </div>
                        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                            <ul
                                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                            >
                                <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                                    <img
                                        src="https://media-cgk1-1.cdn.whatsapp.net/v/t61.24694-24/328800017_650674973695588_5564531715144486245_n.jpg?ccb=11-4&oh=01_AdQBbDYAzSi8N2bpqn3F50y_lnJ0UpniwphOtPvbphf1bA&oe=655C331D&_nc_sid=e6ed6c&_nc_cat=102"
                                        class="h-10 rounded-3xl"
                                        alt=""
                                    />
                                </a>
                            </ul>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

    </nav>
</header> --}}