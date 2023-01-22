<x-main-layout>
    <div class="px-5 mx-auto mb-8 scroll-m-16 max-w-7xl">
        <div class="flex flex-col w-full md:flex-row">
            <div class="w-1/2 mx-auto md:pr-8 md:w-1/3">
                <img src="{{ asset('/storage/' . $nurse->picture) }}" class="w-full h-auto" alt="">
            </div>
            <div class="w-full mt-5 md:mt-0 md:w-2/3">
                <div class="flex items-center">
                    <p class="mr-3 text-3xl font-bold">{{ $nurse->name }}</p>
                    @auth
                        @if ($savedNurse->count())
                            <form action="/nurses/detail/{{ $nurse->id }}" method="POST" class="flex items-center">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="/nurses/detail/{{ $nurse->id }}" method="POST" class="flex items-center">
                                @csrf
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                    </svg>
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
                <div class="flex items-center mt-3 text-md">
                    <svg aria-hidden="true"
                        class="w-5 h-5 {{ $nurse->rating >= 1 ? 'text-yellow-400' : 'text-gray-300' }}"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>First star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true"
                        class="w-5 h-5 {{ $nurse->rating >= 1.5 ? 'text-yellow-400' : 'text-gray-300' }}"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Second star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true"
                        class="w-5 h-5 {{ $nurse->rating >= 2.5 ? 'text-yellow-400' : 'text-gray-300' }}"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Third star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true"
                        class="w-5 h-5 {{ $nurse->rating >= 3.5 ? 'text-yellow-400' : 'text-gray-300' }}"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Fourth star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true"
                        class="w-5 h-5 mr-3 {{ $nurse->rating == 5 ? 'text-yellow-400' : 'text-gray-300' }}"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Fifth star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <p class="text-gray-700">
                        {{ number_format($nurse->rating, 1, '.', ',') }}
                        <span class="">({{ $nurse->totalReview }} reviews)</span>
                    </p>
                </div>

                <p class="mt-4"><span class="text-gray-600">Location:
                    </span>{{ $nurse->province . ', ' . $nurse->cityName }}</p>
                <p class="mt-2"><span class="text-gray-600">Age:
                    </span>{{ $nurse->age }} years old</p>
                <p class="mt-2"><span class="text-gray-600">Gender:
                    </span>{{ $nurse->gender }}</p>
                <p class="mt-2"><span class="text-gray-600">Ethnicity:
                    </span>{{ $nurse->ethnicity }}</p>
                <p class="mt-2 md:min-h-[160px] lg:min-h-[240px]"><span class="text-gray-600">Description:
                    </span>{{ $nurse->description }}</p>
                <div class="flex items-center justify-between mt-3 lg:mt-0">
                    <p><span class="text-gray-600">Wage:
                        </span><br><span
                            class="text-xl font-semibold">Rp{{ number_format($nurseElo->price, 2, ',', '.') }}</span>
                    </p>
                    <a href="/trans/{{ $nurseElo->id }}"><button
                            class="rounded-[6px] bg-gray-800 py-[9px] px-[18px] hover:bg-gray-900 transition ease-in-out duration-300 text-white hover:text-gray-200 mt-3">
                            Order
                            Now</button></a>
                </div>
            </div>
        </div>
        <div class="mt-12">
            <h1 class="text-3xl font-bold">More Information</h1>
            <div class="w-full shadow-[0_0_16px_-8px_rgba(107,114,128,1.000)] border-white h-max rounded-lg mt-5">
                <div class="flex flex-col w-full p-8 sm:flex-row">
                    <div class="w-full sm:w-2/5 sm:mr-8">
                        <h1 class="text-2xl font-medium">Skill</h1>
                        @if ($nurseElo->skills)
                            <div class="mt-3 lg:grid lg:grid-flow-col lg:grid-rows-6">
                                @foreach (explode(';', $nurseElo->skills) as $skills)
                                    <div class="flex items-center">
                                        <img src="{{ asset('assets/checklist.png') }}" alt="" class="mr-3 w-7">
                                        <p class="text-[17px]">{{ $skills }}</p>
                                    </div>
                                    {{-- @if (count(explode(';', $nurseElo->skills)) - 1 != $loop->index)
                                        <hr>
                                    @endif --}}
                                @endforeach
                            </div>
                        @else
                            <div class="flex flex-col items-center justify-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    data-name="Layer 1" viewBox="0 0 571.9401 689.03807" class="w-40 opacity-70">
                                    <path
                                        d="M310.01916,435.42226a27.98147,27.98147,0,0,0,42.37447,6.73419L438.65036,491.628,435.4356,440.0556l-81.418-39.07245a28.13311,28.13311,0,0,0-43.99844,34.43911Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#ffb8b8" />
                                    <path
                                        d="M559.74073,633.60374c-25.58649,35.81171-24.67114,95.72552-17.53253,161.29907l120.97431,0,5.25976-12.27277,7.013,12.27277H789.41664s-8.76624-166.5589-24.54554-171.81867S559.74073,633.60374,559.74073,633.60374Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#2f2e41" />
                                    <circle cx="357.25219" cy="92.2184" r="61.36378" fill="#ffb8b8" />
                                    <path
                                        d="M707.534,275.36772l12,23,83,37L780.71663,546.50355,771.534,568.36772l4.96133,18.98719L764.534,601.36772c12.00666,10.86383,13.53168,22.23645,7,34l-38.22143,8.75551s-212.52143,18.89787-194.6109-14.026c19.5697-35.97382,24.5531-142.21509-18.64893-198.988-36.67743-48.19873-8.51874-110.74154-8.51874-110.74154l87-26,32-19Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#3f3d56" />
                                    <path
                                        d="M690.42555,108.19489a3.3845,3.3845,0,0,1,3.25677-1.93272c-28.09344-1.68047-57.68463,1.5939-81.18768,17.0753-5.694,3.75065-11.06234,8.2243-17.25845,10.94508a1.85911,1.85911,0,0,0-.37964,3.163l.68052.53368a1.86606,1.86606,0,0,1-.60741,3.25335l0,0a1.86606,1.86606,0,0,0-.4688,3.35219l5.21528,3.37072a1.85778,1.85778,0,0,1,.0171,3.12575,9.27094,9.27094,0,0,1-1.38684.70319,1.86177,1.86177,0,0,0-.59,3.12753,18.53712,18.53712,0,0,1,5.04588,7.37659c1.73828,4.51977,2.05054,9.44217,2.34418,14.27575,1.79657-6.9743,9.408-11.07971,16.59783-11.49687s14.20191,1.95513,21.1991,3.66045a117.27165,117.27165,0,0,0,46.548,1.79065c-5.25647,10.54876-.82245,23.13119,3.63952,34.03981l14.44311-6.19059c19.83576-11.1969,6.01886,36.16774-1.39679,42.67007,15.14148,5.24939,54.77246-53.01373,42.02326-75.11433-6.632-11.49641-1.92432-26.324-14.96289-37.2275-6.39032-6.72715-19.14893-3.73718-25.66358-9.32824-2.56408-2.20055,1.34412-8.08781-2.17956-9.37084C704.184,109.57076,690.61909,107.76539,690.42555,108.19489Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#2f2e41" />
                                    <path
                                        d="M586.484,300.30766c-11.26,49.99-40.14,166.71-69.44,191.12011a17.09185,17.09185,0,0,1-6.52,3.84986c-102.99,25.09009-135.99-38.90991-135.99-38.90991s27.6-13.45,28.3-39.74l55.66,17.27,48.52-109.19007,7.14-6.66.04-.03992Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#3f3d56" />
                                    <path
                                        d="M806.07542,761.94066a27.9815,27.9815,0,0,0-2.93831-42.80551L832.009,623.98224l-49.53858,14.69627L762.648,726.78424a28.13311,28.13311,0,0,0,43.42743,35.15642Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#ffb8b8" />
                                    <path
                                        d="M779.6504,330.0445l22.8836,5.32322s94.58417,184.02791,71.79194,219.09292-50.7146,151.15612-50.7146,151.15612-41.298-8.21-57.07734-29.249l28.89558-137.68626-29.8053-115.7146Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#3f3d56" />
                                    <path
                                        d="M345.50989,603.32045l.82172-296.38866a22.65241,22.65241,0,0,1,22.68944-22.564l223.83925.62059a22.65238,22.65238,0,0,1,22.56385,22.68944l-.82172,296.38866a22.65238,22.65238,0,0,1-22.68932,22.564l-223.83924-.62058A22.6524,22.6524,0,0,1,345.50989,603.32045Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#e6e6e6" />
                                    <path
                                        d="M362.92794,513.84626l.52828-190.54552a21.21423,21.21423,0,0,1,21.24934-21.13184l192.371.53334a21.21515,21.21515,0,0,1,21.13292,21.24935l-.73122,263.74558A21.21517,21.21517,0,0,1,576.22782,608.829L457.058,608.49863A94.49829,94.49829,0,0,1,362.92794,513.84626Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#fff" />
                                    <path d="M555.034,385.86772h-150a9,9,0,0,1,0-18h150a9,9,0,0,1,0,18Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#6c63ff" />
                                    <path d="M438.034,344.36772h-33a9,9,0,0,1,0-18h33a9,9,0,0,1,0,18Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#6c63ff" />
                                    <path d="M555.034,427.36772h-150a9,9,0,0,1,0-18h150a9,9,0,0,1,0,18Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#6c63ff" />
                                    <path d="M555.034,468.86772h-150a9,9,0,0,1,0-18h150a9,9,0,0,1,0,18Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#6c63ff" />
                                    <circle cx="236.96655" cy="436.54264" r="35.81102" fill="#6c63ff" />
                                    <path
                                        d="M538.01154,561.04537a3.98231,3.98231,0,0,1-3.18646-1.59372l-9.7698-13.02661a3.98339,3.98339,0,1,1,6.37358-4.77985l6.39173,8.52166,16.41634-24.62419a3.98356,3.98356,0,1,1,6.629,4.41936L541.32638,559.2714a3.9851,3.9851,0,0,1-3.204,1.77267C538.08546,561.04472,538.0485,561.04537,538.01154,561.04537Z"
                                        transform="translate(-305.93035 -105.86477)" fill="#fff" />
                                    <circle cx="160.60365" cy="92.50295" r="17" fill="#f2f2f2" />
                                    <circle cx="98.60365" cy="581.50295" r="17" fill="#f2f2f2" />
                                    <circle cx="489.60365" cy="158.50295" r="17" fill="#f2f2f2" />
                                </svg>
                                <p class="font-normal leading-5 text-center text-gray-400 text-md mt-7">
                                    {{ $nurseElo->name }} <br>has no skills
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="w-full mt-5 sm:w-3/5 sm:mt-0">
                        <h1 class="text-2xl font-medium">Experiences</h1>
                        @if ($nurseElo->experience()->get()->count() != 0)
                            <ol class="relative mt-3 border-l border-gray-200">
                                @foreach ($nurseElo->experience()->orderBy('date', 'desc')->get() as $experience)
                                    <li class="mb-5 ml-4">
                                        <div
                                            class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white">
                                        </div>
                                        <time
                                            class="mb-1 text-sm font-normal leading-none text-gray-400">{{ Carbon\Carbon::parse($experience->date)->format('M Y') }}</time>
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            {{ $experience->title }}</h3>
                                        <p class="text-base font-normal text-gray-500">
                                            {{ $experience->description }}</p>
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <div class="flex flex-col items-center justify-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    data-name="Layer 1" viewBox="0 0 753.87469 703.82827" class="opacity-70 w-52">
                                    <path
                                        d="M578.47505,103.95771l-23.06843,12.58664L271.19846,271.61447,248.13,284.2011a48.1793,48.1793,0,0,0-19.1955,65.29607L440.57765,737.39072a48.17922,48.17922,0,0,0,65.296,19.19561l.05958-.03251L836.15907,576.37545l.05958-.03251a48.17924,48.17924,0,0,0,19.19553-65.296L643.77106,123.15338A48.17929,48.17929,0,0,0,578.47505,103.95771Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#f2f2f2" />
                                    <path
                                        d="M585.11115,116.11916l-27.323,14.908L282.08828,281.455,254.7657,296.36278a34.30947,34.30947,0,0,0-13.66965,46.4988L452.73916,730.75513a34.30947,34.30947,0,0,0,46.4988,13.66952l.05958-.0325L829.5234,564.21377l.06-.03274a34.30935,34.30935,0,0,0,13.66926-46.49851L631.60954,129.789A34.30936,34.30936,0,0,0,585.11115,116.11916Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#fff" />
                                    <path
                                        d="M589.66653,236.52147,466.505,303.72109a8.01411,8.01411,0,1,1-7.677-14.07012l123.16157-67.19962a8.01411,8.01411,0,1,1,7.677,14.07012Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#f2f2f2" />
                                    <path
                                        d="M631.641,244.43106,479.45984,327.46442a8.01411,8.01411,0,0,1-7.677-14.07012l152.18119-83.03336a8.01411,8.01411,0,1,1,7.677,14.07012Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#f2f2f2" />
                                    <path
                                        d="M415.87223,275.74837l-113.5479,61.95419a3.84082,3.84082,0,0,0-1.53151,5.21006L349.14436,431.53a3.84075,3.84075,0,0,0,5.21,1.5317l113.5479-61.95419a3.84075,3.84075,0,0,0,1.53153-5.21l-48.35154-88.61735A3.84081,3.84081,0,0,0,415.87223,275.74837Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#f2f2f2" />
                                    <path
                                        d="M650.7763,348.96263,483.723,440.11051a8.01411,8.01411,0,1,1-7.677-14.07012l167.05327-91.14788a8.01411,8.01411,0,1,1,7.677,14.07012Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#f2f2f2" />
                                    <path
                                        d="M692.7508,356.87223,496.67791,463.85384a8.01411,8.01411,0,0,1-7.677-14.07012L685.07384,342.80211a8.01411,8.01411,0,1,1,7.677,14.07012Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#f2f2f2" />
                                    <circle cx="197.03853" cy="382.67177" r="34" fill="#f2f2f2" />
                                    <path
                                        d="M928.81234,263.78816H552.494a48.17927,48.17927,0,0,0-48.125,48.12512V753.78907a48.17922,48.17922,0,0,0,48.125,48.12506H928.81234a48.17922,48.17922,0,0,0,48.125-48.12506V311.91328A48.17927,48.17927,0,0,0,928.81234,263.78816Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#e6e6e6" />
                                    <path
                                        d="M928.81283,277.64235H552.494a34.30947,34.30947,0,0,0-34.271,34.27093V753.78907A34.30947,34.30947,0,0,0,552.494,788.06H928.81283a34.30936,34.30936,0,0,0,34.27051-34.27088V311.91328A34.30937,34.30937,0,0,0,928.81283,277.64235Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#fff" />
                                    <path
                                        d="M875.14319,385.51745H734.84151a8.01411,8.01411,0,0,1,0-16.02823H875.14319a8.01412,8.01412,0,1,1,0,16.02823Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#6c63ff" />
                                    <path
                                        d="M908.20141,412.56508H734.84151a8.01411,8.01411,0,1,1,0-16.02822h173.3599a8.01411,8.01411,0,0,1,0,16.02822Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#6c63ff" />
                                    <path
                                        d="M703.79234,336.71073H574.44224a3.8408,3.8408,0,0,0-3.83984,3.84v100.95a3.84075,3.84075,0,0,0,3.83984,3.84h129.3501a3.84076,3.84076,0,0,0,3.83984-3.84v-100.95A3.84081,3.84081,0,0,0,703.79234,336.71073Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#e6e6e6" />
                                    <path
                                        d="M609.92406,398.70111a34.087,34.087,0,0,1-8.804,23.076c-5.656,6.20712-14.07618,10.3236-22.57327,8.62043-7.82416-1.56829-14.18219-8.4067-13.389-16.6795a12.356,12.356,0,0,1,15.2668-11.09515c7.43265,1.92885,10.39415,12.64095,4.20051,17.669-1.4862,1.2065-3.62136-.90359-2.12132-2.12132,4.0944-3.32385,2.8295-10.5954-2.11244-12.419-5.75371-2.12311-11.84978,2.44324-12.26355,8.32554-.49057,6.97428,4.85221,12.22646,11.40422,13.463,7.08789,1.3377,14.11532-2.29,18.91808-7.29718a30.95507,30.95507,0,0,0,8.474-21.54183,1.5009,1.5009,0,0,1,3,0Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#2f2e41" />
                                    <circle cx="416.15529" cy="266.1673" r="53.51916" fill="#6c63ff" />
                                    <path
                                        d="M636.47981,387.08916l-.05566-2c3.7207-.10352,7.001-.33692,9.46582-2.1377a6.14794,6.14794,0,0,0,2.38134-4.52832,3.51432,3.51432,0,0,0-1.15283-2.89453c-1.63623-1.38184-4.269-.93457-6.188-.05469l-1.65478.75879,3.17334-23.19043,1.98144.27149-2.69922,19.72656c2.60743-.7666,5.02344-.43652,6.67823.96094a5.471,5.471,0,0,1,1.86035,4.49218,8.13264,8.13264,0,0,1-3.2002,6.07325C643.90266,386.88115,639.78694,386.99638,636.47981,387.08916Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#2f2e41" />
                                    <rect x="431.16715" y="256.92907" width="10.77148" height="2"
                                        fill="#2f2e41" />
                                    <rect x="397.16715" y="256.92907" width="10.77148" height="2"
                                        fill="#2f2e41" />
                                    <path
                                        d="M609.57212,445.34074a53.00636,53.00636,0,0,1,12.89014-5.93,8.56789,8.56789,0,0,1,.02-4.71,9.42609,9.42609,0,0,1,9.12988-6.63h13.04a9.45955,9.45955,0,0,1,9.15039,6.64,8.532,8.532,0,0,1,.01953,4.7,53.16732,53.16732,0,0,1,12.89014,5.93Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#2f2e41" />
                                    <path
                                        d="M700.52232,344.39072a11.57143,11.57143,0,0,0-3.52979-2.87,8.36739,8.36739,0,0,0-3.8501-.95,8.77158,8.77158,0,0,0-5.10986,1.72c-4.07031,2.88-6.89014,9.09-6.89014,16.28,0,9.02,4.43995,16.5,10.21,17.80005a8.25321,8.25321,0,0,0,1.79.2c6.60987,0,12-8.07,12-18C705.14243,352.81077,703.33238,347.68076,700.52232,344.39072Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#3f3d56" />
                                    <path
                                        d="M590.6024,341.86076h-.00977a8.57836,8.57836,0,0,0-4.4502-1.29,8.36738,8.36738,0,0,0-3.85009.95,11.57143,11.57143,0,0,0-3.52979,2.87l-.01025.01c-2.79981,3.29-4.60987,8.42-4.60987,14.17,0,7.76,3.27979,14.38,7.87989,16.91a8.54175,8.54175,0,0,0,4.12011,1.09,7.72431,7.72431,0,0,0,.96-.06h.00976c6.16016-.74,11.03027-8.5,11.03027-17.94C598.14243,351.01072,595.01255,344.52073,590.6024,341.86076Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#3f3d56" />
                                    <path
                                        d="M582.77242,373.76a1.50127,1.50127,0,0,0,1.42151-1.98,58.49864,58.49864,0,1,1,112.68726-6.5747,1.50006,1.50006,0,0,0,2.93554.61914A61.50091,61.50091,0,1,0,581.35116,372.739,1.50077,1.50077,0,0,0,582.77242,373.76Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#3f3d56" />
                                    <path
                                        d="M666.10324,329.57746c2.11924,2.89278,1.07447,6.79121-1.15837,9.28528-2.90548,3.24541-7.53877,3.45016-11.5618,2.8478-4.51431-.67591-9.3026-2.7909-13.87293-1.3656-3.89537,1.2148-6.67418,4.74793-10.7211,5.63537-3.589.787-7.88081-.25477-9.139-4.08016-.60459-1.83823,2.29142-2.6261,2.89284-.79751.81395,2.47478,4.32865,2.42543,6.34145,1.74012,3.22689-1.09867,5.71374-3.77105,8.8854-5.04749,3.73933-1.50491,7.79621-.82549,11.60323.03181,3.58831.808,7.718,2.006,11.29267.49665,2.64515-1.1169,4.74985-4.635,2.84717-7.23211-1.14219-1.5591,1.45985-3.05738,2.59042-1.51416Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#2f2e41" />
                                    <path
                                        d="M874.932,513.49157H684.63034a8.01411,8.01411,0,1,1,0-16.02823H874.932a8.01412,8.01412,0,0,1,0,16.02823Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#e6e6e6" />
                                    <path
                                        d="M907.99023,540.5392H684.63034a8.01412,8.01412,0,1,1,0-16.02823H907.99023a8.01412,8.01412,0,1,1,0,16.02823Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#e6e6e6" />
                                    <path
                                        d="M874.932,610.705H684.63034a8.01411,8.01411,0,1,1,0-16.02822H874.932a8.01411,8.01411,0,1,1,0,16.02822Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#e6e6e6" />
                                    <path
                                        d="M907.99023,637.75267H684.63034a8.01411,8.01411,0,1,1,0-16.02823H907.99023a8.01411,8.01411,0,1,1,0,16.02823Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#e6e6e6" />
                                    <circle cx="386.2497" cy="420.61448" r="34" fill="#e6e6e6" />
                                    <circle cx="386.2497" cy="518.61448" r="34" fill="#e6e6e6" />
                                    <path
                                        d="M874.932,708.705H684.63034a8.01411,8.01411,0,1,1,0-16.02822H874.932a8.01411,8.01411,0,1,1,0,16.02822Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#e6e6e6" />
                                    <path
                                        d="M907.99023,735.75267H684.63034a8.01411,8.01411,0,1,1,0-16.02823H907.99023a8.01411,8.01411,0,1,1,0,16.02823Z"
                                        transform="translate(-223.06266 -98.08587)" fill="#e6e6e6" />
                                    <circle cx="386.2497" cy="616.61448" r="34" fill="#e6e6e6" />
                                </svg>
                                <p class="font-normal leading-5 text-center text-gray-400 text-md mt-7">
                                    {{ $nurseElo->name }} <br>has no experiences
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12">
            <h1 class="text-3xl font-bold">Review</h1>
            <div class="flex flex-col justify-between w-full mt-5 space-y-7 md:flex-row md:space-y-0">
                <div
                    class="w-full md:w-2/5 shadow-[0_0_16px_-8px_rgba(107,114,128,1.000)] border-white h-max mr-5 rounded-lg ">
                    <div class="p-8">
                        <div class="flex items-center mb-3">
                            <svg aria-hidden="true"
                                class="w-5 h-5 {{ $nurse->rating >= 1 ? 'text-yellow-400' : 'text-gray-300' }}"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>First star</title>
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg aria-hidden="true"
                                class="w-5 h-5 {{ $nurse->rating >= 1.5 ? 'text-yellow-400' : 'text-gray-300' }}"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Second star</title>
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg aria-hidden="true"
                                class="w-5 h-5 {{ $nurse->rating >= 2.5 ? 'text-yellow-400' : 'text-gray-300' }}"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Third star</title>
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg aria-hidden="true"
                                class="w-5 h-5 {{ $nurse->rating >= 3.5 ? 'text-yellow-400' : 'text-gray-300' }}"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Fourth star</title>
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <svg aria-hidden="true"
                                class="w-5 h-5 mr-3 {{ $nurse->rating == 5 ? 'text-yellow-400' : 'text-gray-300' }}"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Fifth star</title>
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <p class="ml-2 text-sm font-medium text-gray-900">
                                {{ number_format($nurse->rating, 1, '.', ',') }} out of 5</p>
                        </div>
                        <p class="text-sm font-medium text-gray-500">{{ $nurse->totalReview }}
                            total
                            ratings</p>
                        <div class="flex flex-col justify-around">
                            <div class="flex items-center w-full mt-4">
                                <span class="text-sm font-medium text-gray-400">5 star</span>
                                <div class="w-3/4 h-5 mx-4 bg-gray-200 rounded">
                                    <div class="h-5 bg-yellow-400 rounded"
                                        style="width: {{ $nurse->totalReview != 0 ? ($totalReview[0]->total5rating / $nurse->totalReview) * 100 : 0 }}%">
                                    </div>
                                </div>
                                <span
                                    class="text-sm font-medium text-gray-400">{{ $totalReview[0]->total5rating }}</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <span class="text-sm font-medium text-gray-400">4 star</span>
                                <div class="w-3/4 h-5 mx-4 bg-gray-200 rounded">
                                    <div class="h-5 bg-yellow-400 rounded"
                                        style="width: {{ $nurse->totalReview != 0 ? ($totalReview[0]->total4rating / $nurse->totalReview) * 100 : 0 }}%">
                                    </div>
                                </div>
                                <span
                                    class="text-sm font-medium text-gray-400">{{ $totalReview[0]->total4rating }}</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <span class="text-sm font-medium text-gray-400">3 star</span>
                                <div class="w-3/4 h-5 mx-4 bg-gray-200 rounded">
                                    <div class="h-5 bg-yellow-400 rounded"
                                        style="width: {{ $nurse->totalReview != 0 ? ($totalReview[0]->total3rating / $nurse->totalReview) * 100 : 0 }}%">
                                    </div>
                                </div>
                                <span
                                    class="text-sm font-medium text-gray-400">{{ $totalReview[0]->total3rating }}</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <span class="text-sm font-medium text-gray-400">2 star</span>
                                <div class="w-3/4 h-5 mx-4 bg-gray-200 rounded">
                                    <div class="h-5 bg-yellow-400 rounded"
                                        style="width: {{ $nurse->totalReview != 0 ? ($totalReview[0]->total2rating / $nurse->totalReview) * 100 : 0 }}%">
                                    </div>
                                </div>
                                <span
                                    class="text-sm font-medium text-gray-400">{{ $totalReview[0]->total2rating }}</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <span class="text-sm font-medium text-gray-400">1 star</span>
                                <div class="w-3/4 h-5 mx-4 bg-gray-200 rounded">
                                    <div class="h-5 bg-yellow-400 rounded"
                                        style="width: {{ $nurse->totalReview != 0 ? ($totalReview[0]->total1rating / $nurse->totalReview) * 100 : 0 }}%">
                                    </div>
                                </div>
                                <span
                                    class="text-sm font-medium text-gray-400">{{ $totalReview[0]->total1rating }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $nursesPaginate = $nurseElo->transaction()->paginate(5);
                @endphp
                <div
                    class="w-full md:w-3/5 border h-max shadow-[0_0_16px_-8px_rgba(107,114,128,1.000)] border-white rounded-lg">
                    <div class="p-8 space-y-5">
                        @if ($reviews->count() != 0)
                            @foreach ($reviews as $review)
                                <div class="flex">
                                    <img class="w-20 h-20 mr-5 rounded-full"
                                        src="{{ asset('/storage/' . $review->transaction->user->picture) }}"
                                        alt="">
                                    <div class="">
                                        <p class="text-3xl font-medium">
                                            {{ $review->transaction->user->name }}</p>
                                        <p class="mt-1 text-xs text-gray-400">Using {{ strtok($nurse->name, ' ') }}'s
                                            service
                                        </p>
                                        <p class="text-xs text-gray-400">Since
                                            {{ $nurseElo->transaction()->where('user_id', '=', $review->transaction->user_id)->first()->created_at->format('Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center !mt-3 text-md">
                                    <svg aria-hidden="true"
                                        class="w-5 h-5 {{ $review->rating >= 1 ? 'text-yellow-400' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>First star</title>
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true"
                                        class="w-5 h-5 {{ $review->rating >= 1.5 ? 'text-yellow-400' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Second star</title>
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true"
                                        class="w-5 h-5 {{ $review->rating >= 2.5 ? 'text-yellow-400' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Third star</title>
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true"
                                        class="w-5 h-5 {{ $review->rating >= 3.5 ? 'text-yellow-400' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fourth star</title>
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true"
                                        class="w-5 h-5 mr-3 {{ $review->rating == 5 ? 'text-yellow-400' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fifth star</title>
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="!mt-0 text-smt text-gray-400">
                                    {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                                </div>
                                <div class="!mt-2">
                                    <p>
                                        {{ $review->review }}
                                    </p>
                                </div>
                                @if ($reviews->count() - 1 != $loop->index)
                                    <hr>
                                @endif
                            @endforeach
                            <div class="mt-8">
                                {{ $nursesPaginate->links() }}
                            </div>
                        @else
                            <div class="flex flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    data-name="Layer 1" viewBox="0 0 718.50899 601.71823" class="opacity-70 w-52">
                                    <path
                                        d="M895.34555,200.62251H263.02218a1.0156,1.0156,0,0,1,0-2.0307H895.34555a1.0156,1.0156,0,0,1,0,2.0307Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#cacaca" />
                                    <ellipse cx="23.34831" cy="11.16881" rx="10.92534" ry="11.16881"
                                        fill="#3f3d56" />
                                    <ellipse cx="61.09038" cy="11.16881" rx="10.92534" ry="11.16881"
                                        fill="#3f3d56" />
                                    <ellipse cx="98.83246" cy="11.16881" rx="10.92534" ry="11.16881"
                                        fill="#3f3d56" />
                                    <path
                                        d="M872.72853,166.83832h-26.81a2.0304,2.0304,0,0,0,0,4.06h26.81a2.0304,2.0304,0,0,0,0-4.06Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#3f3d56" />
                                    <path
                                        d="M872.72853,174.45832h-26.81a2.0304,2.0304,0,0,0,0,4.06h26.81a2.0304,2.0304,0,0,0,0-4.06Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#3f3d56" />
                                    <path
                                        d="M872.72853,182.0683h-26.81a2.0304,2.0304,0,0,0,0,4.06h26.81a2.0304,2.0304,0,0,0,0-4.06Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#3f3d56" />
                                    <path
                                        d="M862.717,234.906H286.777a12.048,12.048,0,0,0-12.03,12.03v1.94a12.048,12.048,0,0,0,12.03,12.03H862.717a12.048,12.048,0,0,0,12.03-12.03v-1.94A12.048,12.048,0,0,0,862.717,234.906Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#f0f0f0" />
                                    <path
                                        d="M356.28234,252.70618H301.45945a4.62947,4.62947,0,0,1,0-9.25893h54.82289C362.25257,243.36392,362.31228,252.79027,356.28234,252.70618Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#fff" />
                                    <path
                                        d="M520.28234,252.70618H465.45945a4.62947,4.62947,0,0,1,0-9.25893h54.82289C526.25257,243.36392,526.31228,252.79027,520.28234,252.70618Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#fff" />
                                    <path
                                        d="M684.28234,252.70618H629.45945a4.62947,4.62947,0,0,1,0-9.25893h54.82289C690.25257,243.36392,690.31228,252.79027,684.28234,252.70618Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#fff" />
                                    <path
                                        d="M839.78234,253.20618H784.95945a4.62946,4.62946,0,0,1,0-9.25893h54.82289C845.75257,243.86392,845.81228,253.29027,839.78234,253.20618Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#6c63ff" />
                                    <rect x="490.21805" y="70.83595" width="2" height="26"
                                        fill="#fff" />
                                    <path
                                        d="M547.2921,619.71843H312.239a7.90878,7.90878,0,0,1-7.89963-7.89963V577.39342a7.90879,7.90879,0,0,1,7.89963-7.89964H547.2921a7.9088,7.9088,0,0,1,7.89964,7.89964V611.8188A7.90879,7.90879,0,0,1,547.2921,619.71843Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#f0f0f0" />
                                    <path
                                        d="M524.45379,614.39H317.56867a7.9088,7.9088,0,0,1-7.89964-7.89964v-23.7643a7.9088,7.9088,0,0,1,7.89964-7.89964h224.395a7.90879,7.90879,0,0,1,7.89964,7.89964v6.25441A25.43817,25.43817,0,0,1,524.45379,614.39Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#fff" />
                                    <path
                                        d="M453.09041,592.15716H358.617a2.03732,2.03732,0,1,1,0-4.07464h94.47342a2.03732,2.03732,0,0,1,0,4.07464Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#e6e6e6" />
                                    <path
                                        d="M500.91452,600.48987H358.617a2.03733,2.03733,0,1,1,0-4.07465H500.91452a2.03733,2.03733,0,0,1,0,4.07465Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#e6e6e6" />
                                    <path
                                        d="M562.307,530.10611H294.29691a8.07557,8.07557,0,0,1-8.06636-8.06636V317.17217a8.07531,8.07531,0,0,1,8.06636-8.06606H562.307a8.07531,8.07531,0,0,1,8.06636,8.06606V522.03975A8.07557,8.07557,0,0,1,562.307,530.10611Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#fff" />
                                    <path
                                        d="M562.30686,531.10611H294.29709a9.077,9.077,0,0,1-9.0664-9.06641V317.172a9.07652,9.07652,0,0,1,9.0664-9.06592H562.30686a9.07652,9.07652,0,0,1,9.0664,9.06592V522.0397A9.077,9.077,0,0,1,562.30686,531.10611Zm-268.00977-221a7.07423,7.07423,0,0,0-7.0664,7.06592V522.0397a7.07434,7.07434,0,0,0,7.0664,7.06641H562.30686a7.07434,7.07434,0,0,0,7.0664-7.06641V317.172a7.07423,7.07423,0,0,0-7.0664-7.06592Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#f0f0f0" />
                                    <path
                                        d="M286.84959,491.10611V522.0399a7.45829,7.45829,0,0,0,7.44716,7.44716H562.30719a7.45829,7.45829,0,0,0,7.44717-7.44716V491.10611Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#f0f0f0" />
                                    <rect x="428.29533" y="234.39979" width="1.99962" height="333.55961"
                                        transform="translate(-402.07292 382.34175) rotate(-57.37135)"
                                        fill="#f0f0f0" />
                                    <rect x="263.30853" y="400.17978" width="333.55961" height="1.99962"
                                        transform="translate(-410.46649 131.14319) rotate(-32.62865)"
                                        fill="#f0f0f0" />
                                    <polygon
                                        points="545.364 587.788 532.974 587.787 527.079 539.998 545.366 539.999 545.364 587.788"
                                        fill="#a0616a" />
                                    <path
                                        d="M807.06258,747.80889l-13.22-5.37-.39-.16-7.3,5.53a15.54249,15.54249,0,0,0-15.53,14.87c-.02.22-.02.45-.02.68v.51h39.95v-16.06Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#2f2e41" />
                                    <polygon
                                        points="516.348 576.258 504.66 580.37 483.238 537.245 500.488 531.177 516.348 576.258"
                                        fill="#a0616a" />
                                    <path
                                        d="M776.72189,736.61787l-14.2529-.67773-.421-.02152-5.05069,7.63948a15.54248,15.54248,0,0,0-9.71416,19.1816c.05413.21415.13048.43115.20682.64809l.16927.4811,37.68529-13.2598L780.014,735.45951Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#2f2e41" />
                                    <path
                                        d="M811.77112,545.79972c11.33506-.43955-2.70631,89.88978-2.70631,89.88978s4.10734,79.30546,3.23671,83.46726-.10978,15.38636-.10978,15.38636c-2.22075-4.04192-25.13224-.9914-25.13224-.9914l-3.11682-80.37587-15.91342-64.39953-22.06224,43.168,21.14563,66.26061s8.56336,7.92394,7.65278,11.0553-23.341,10.19318-27.46279,10.353-2.26071-5.07241-2.46051-10.22468-19.59569-52.90457-26.41781-69.1522-1.51846-39.15745,1.964-55.80468,21.80339-47.88859,21.80339-47.88859C764.93328,510.893,800.43605,546.23928,811.77112,545.79972Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#2f2e41" />
                                    <path
                                        d="M673.63366,472.80155a9.15861,9.15861,0,0,0,13.72045,2.99545l27.25821,17.784-.083-16.91272L688.65716,462.3732a9.20824,9.20824,0,0,0-15.0235,10.42835Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#a0616a" />
                                    <path
                                        d="M805.88412,560.28042c-28.10986.001-43.60059-5.626-51.82666-10.65039-10.05859-6.14356-11.77978-12.62207-11.84814-12.89551l-.02-.07812.979-12.32032.42822-.959a19.50463,19.50463,0,0,0,.73438-14.00684l-.03076-.09472.00781-.09864,6.57275-85.24462,23.25977-7.61915,6.7666-6.79882,30.12744-.437,4.19776,8.51025,23.751,8.94141L827.31478,495.9855l-5.59375,9.6416L823.972,516.13l-.01562.09473-7.33838,43.7998-.40381.01758Q810.78549,560.28531,805.88412,560.28042Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#3f3d56" />
                                    <path
                                        d="M733.162,507.09878l-11.02783-6.53809-.69092-.998a15.7342,15.7342,0,0,0-12.4541-6.74805l-.12842-.00391L693.67221,483.881l6.2959-18.44336,23.81,7.03418,16.59961-41.24463a13.19911,13.19911,0,0,1,23.47559-2.00635,13.62434,13.62434,0,0,1,1.96728,7.20508v26.9873l-.09961.13379Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#3f3d56" />
                                    <path
                                        d="M806.88908,544.41764a9.15863,9.15863,0,0,1,12.18666-6.97916l20.656-25.15175,5.002,16.15634-20.38215,21.40758a9.20824,9.20824,0,0,1-17.46248-5.433Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#a0616a" />
                                    <path
                                        d="M837.77328,541.2394,824.057,527.52163l8.73145-21.27441,12.65381-17.27832c-13.48389-6.56446-23.60547-22.11524-30.93946-34.98828l-.08252-.14454,1.82618-14.30371a18.367,18.367,0,0,1,3.87353-9.14306,18.36952,18.36952,0,0,1,29.90869,1.709l24.5918,54.66846-.27686.41308-19.78027,33.71875-5.39844,3.501Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#3f3d56" />
                                    <path
                                        d="M817.60205,380.40273a25.10467,25.10467,0,0,1-49.75065-6.77109l.0485-.35635a25.10467,25.10467,0,0,1,49.69445,7.12639Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#a0616a" />
                                    <path
                                        d="M811.21258,393.33348c1.28921-2.61883,2.61359-5.43045,2.25128-8.32684s-3.20276-5.66484-5.99192-4.80406c-1.66786.51473-2.92844,2.16171-4.67189,2.246-2.39885.116-3.77423-2.62948-4.5209-4.91211l-3.041-9.29657a25.15357,25.15357,0,0,1-20.89111,4.72079c-2.82347-.64554-5.67592-1.90416-7.33216-4.28021s-1.64627-6.0617.6254-7.85842c1.11387-.881,2.59642-1.2157,3.66088-2.15577a4.10217,4.10217,0,0,0-3.27565-7.13851l7.65693-.957-2.28138-4.12614a7.535,7.535,0,0,0,5.99172,1.0992c2.06-.37093,4.0002-1.21914,6.01549-1.78479a23.15188,23.15188,0,0,1,25.75441,10.81464,9.80176,9.80176,0,0,1,10.687,3.08588c2.04974,2.60156,2.60717,6.07331,2.68659,9.38439a40.71463,40.71463,0,0,1-4.15033,18.86012,15.45115,15.45115,0,0,1-3.48657,4.94577,6.97822,6.97822,0,0,1-5.60143,1.83184"
                                        transform="translate(-262.02897 -164.07002)" fill="#2f2e41" />
                                    <path
                                        d="M404.40219,367.50327a38.99224,38.99224,0,0,0,5.03952,16.61592c6.12735,10.761,16.635,18.55205,27.952,23.183,14.13887,5.78576,29.89994,5.964,44.905,4.67391,13.93671-1.19822,27.73161-3.9757,41.71968-4.54814a290.67425,290.67425,0,0,1,32.435.77368c20.93161,1.48566,41.77624,4.2422,62.48665,7.58393q8.41338,1.34092,16.79136,2.8814a8.30457,8.30457,0,0,1,1.55945.28974c.10141.04156.26448.00913.35732.06753.16859.10618-.682-.26919-.16638.15694A15.47381,15.47381,0,0,1,639.394,421.642l7.64885,9.84331c2.19349,2.82282,4.22918,6.25235,7.064,8.4773a12.79059,12.79059,0,0,0,14.15922.98683,14.14994,14.14994,0,0,0,5.26533-5.981,51.61658,51.61658,0,0,1,6.26129-9.03759c9.09984-10.61576,21.74694-17.14527,32.32494-26.07738a57.57506,57.57506,0,0,0,12.92811-14.77806,41.79039,41.79039,0,0,0,5.34147-16.5949c1.26668-11.87124-2.37608-23.97752-8.50294-34.07663a68.07168,68.07168,0,0,0-27.63411-25.2936c-12.802-6.52219-26.968-9.69913-41.16812-11.28228-15.07643-1.68086-30.32813-1.67562-45.47815-1.50592q-25.50363.28389-50.91513,2.24306-25.44586,1.96956-50.69115,5.59916c-16.14935,2.32185-32.496,4.74188-48.30385,8.85022-13.96486,3.62937-27.89045,9.30228-38.31857,19.58089C410.10319,341.73455,403.65432,354.24087,404.40219,367.50327Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#6c63ff" />
                                    <path
                                        d="M482.46256,371.27969a5.00673,5.00673,0,0,1-4.74267-5.62432l.35883-2.82483a3.37273,3.37273,0,0,0-1.0977-2.937l-2.12184-1.896a4.99256,4.99256,0,0,1,2.395-8.62841l2.79727-.53131a3.36716,3.36716,0,0,0,2.45306-1.94914l1.14815-2.60739a4.99375,4.99375,0,0,1,8.94657-.38788l1.3687,2.496a3.3679,3.3679,0,0,0,2.6145,1.73263l2.83185.2861a4.99272,4.99272,0,0,1,3.1339,8.38851l-1.95031,2.07351a3.36148,3.36148,0,0,0-.83849,3.01891l.60171,2.78437a4.9927,4.9927,0,0,1-7.00862,5.57168l-2.57528-1.21347a3.35983,3.35983,0,0,0-3.13216.13461l-2.46066,1.43289A4.99889,4.99889,0,0,1,482.46256,371.27969Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#fff" />
                                    <path
                                        d="M522.558,370.11518a5.04346,5.04346,0,0,1-3.36337-1.50156,5.17347,5.17347,0,0,1-1.35388-4.32291l.32924-2.5919a3.43188,3.43188,0,0,0-1.11784-2.99155l-1.96831-1.7588a5.13349,5.13349,0,0,1-1.79914-4.0285,4.99124,4.99124,0,0,1,4.06492-4.71539l2.76479-.52514a3.43125,3.43125,0,0,0,2.5-1.98821l1.03031-2.33979a5.22514,5.22514,0,0,1,4.40614-3.20619,4.96762,4.96762,0,0,1,4.64379,2.58361l1.35279,2.467a3.43328,3.43328,0,0,0,2.66529,1.76515l2.62461.26516a5.13094,5.13094,0,0,1,3.82473,2.20359,4.99253,4.99253,0,0,1-.51847,6.20233l-1.92768,2.04945a3.43035,3.43035,0,0,0-.85423,3.07484l.55556,2.57084a5.15516,5.15516,0,0,1-.90576,4.31869,4.97984,4.97984,0,0,1-6.06361,1.43465l-2.54866-1.20092a3.4292,3.4292,0,0,0-3.18733.13869l-2.4321,1.41627A4.999,4.999,0,0,1,522.558,370.11518Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#fff" />
                                    <path
                                        d="M562.75714,369.94527a5.00673,5.00673,0,0,1-4.74267-5.62433l.35882-2.82482a3.3727,3.3727,0,0,0-1.09769-2.937l-2.12185-1.896a4.99258,4.99258,0,0,1,2.395-8.62842l2.79727-.53131a3.36713,3.36713,0,0,0,2.45306-1.94913l1.14814-2.60739a4.99376,4.99376,0,0,1,8.94658-.38789l1.3687,2.496a3.3679,3.3679,0,0,0,2.61449,1.73263l2.83186.2861a4.99272,4.99272,0,0,1,3.1339,8.3885l-1.95031,2.07352a3.36142,3.36142,0,0,0-.83849,3.0189l.6017,2.78437a4.99269,4.99269,0,0,1-7.00862,5.57168l-2.57527-1.21346a3.35979,3.35979,0,0,0-3.13217.13461l-2.46065,1.43289A4.999,4.999,0,0,1,562.75714,369.94527Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#fff" />
                                    <path
                                        d="M601.858,368.88446a5.00674,5.00674,0,0,1-4.74267-5.62432l.35883-2.82483a3.37275,3.37275,0,0,0-1.09769-2.937l-2.12185-1.896a4.99256,4.99256,0,0,1,2.395-8.62841l2.79728-.53131a3.36713,3.36713,0,0,0,2.453-1.94914l1.14815-2.60739a4.99376,4.99376,0,0,1,8.94658-.38788l1.3687,2.496a3.36789,3.36789,0,0,0,2.61449,1.73263l2.83186.2861a4.99272,4.99272,0,0,1,3.1339,8.38851l-1.95032,2.07351a3.36145,3.36145,0,0,0-.83848,3.01891l.6017,2.78437a4.99269,4.99269,0,0,1-7.00862,5.57168l-2.57527-1.21347a3.35985,3.35985,0,0,0-3.13217.13461l-2.46065,1.4329A4.999,4.999,0,0,1,601.858,368.88446Z"
                                        transform="translate(-262.02897 -164.07002)" opacity="0.2" />
                                    <path
                                        d="M640.95879,367.82366a5.00675,5.00675,0,0,1-4.74267-5.62433l.35883-2.82482a3.37276,3.37276,0,0,0-1.09769-2.937l-2.12185-1.896a4.99256,4.99256,0,0,1,2.395-8.62841l2.79728-.53131a3.36712,3.36712,0,0,0,2.453-1.94913l1.14815-2.6074a4.99376,4.99376,0,0,1,8.94658-.38788l1.36869,2.49605a3.368,3.368,0,0,0,2.6145,1.73263l2.83186.2861a4.99272,4.99272,0,0,1,3.1339,8.3885l-1.95032,2.07352a3.36142,3.36142,0,0,0-.83848,3.0189l.6017,2.78437a4.99269,4.99269,0,0,1-7.00862,5.57168l-2.57527-1.21346a3.35979,3.35979,0,0,0-3.13217.13461l-2.46066,1.43289A4.999,4.999,0,0,1,640.95879,367.82366Z"
                                        transform="translate(-262.02897 -164.07002)" opacity="0.2" />
                                    <path
                                        d="M890.07067,701.43944,891.21453,675.72a83.06565,83.06565,0,0,1,38.74475-9.8078c-18.60845,15.21374-16.283,44.54071-28.899,64.99963A49.96442,49.96442,0,0,1,864.42089,754.001l-15.5722,9.53437a83.72447,83.72447,0,0,1,17.647-67.8451,80.87424,80.87424,0,0,1,14.863-13.81018C885.08819,691.71428,890.07067,701.43944,890.07067,701.43944Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#f2f2f2" />
                                    <path
                                        d="M979.34727,765.78825H561.96534a1.19068,1.19068,0,1,1,0-2.38137H979.34727a1.19068,1.19068,0,1,1,0,2.38137Z"
                                        transform="translate(-262.02897 -164.07002)" fill="#cacaca" />
                                </svg>
                                <p class="font-normal text-gray-400 text-md mt-7">
                                    There are no reviews yet...
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
