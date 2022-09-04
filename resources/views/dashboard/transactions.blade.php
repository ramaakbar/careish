<x-layout>
    <x-dashboard-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <h1 class="mb-5 text-3xl font-bold">Transactions</h1>

            <div class="flex flex-wrap gap-5 mb-5">
                <div class="w-full lg:w-2/6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Search</label>
                    <div class="relative ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                        <input type="search" id="simple-search"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            placeholder="Search" required>
                    </div>
                </div>
                <div class="w-1/3 lg:w-1/6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Data Per Page</label>
                    <select
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                        id="">
                        <option value=10 selected>10</option>
                        <option value=20>20</option>
                        <option value=50>50</option>
                    </select>
                </div>

                <div class="w-1/3 lg:w-1/6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Sort By</label>
                    <select
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                        id="">
                        <option value="id" selected>Id</option>
                        <option value="name">Name</option>
                        <option value="Date">Date</option>
                    </select>
                </div>

                <div class="w-1/4 lg:w-1/6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900">Sort Order</label>
                    <select
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
                        id="">
                        <option value="asc" selected>Asc</option>
                        <option value="desc">Desc</option>
                    </select>
                </div>
            </div>

            <div class="w-full bg-white border rounded">
                <div class="overflow-x-auto rounded max-h-[60vh]">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="sticky top-0 w-full text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nurse
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    T1251
                                </th>
                                <td class="px-6 py-4">
                                    Albert Baker
                                </td>
                                <td class="px-6 py-4">
                                    Joseph Wilson
                                </td>
                                <td class="px-6 py-4">
                                    Rp. 1.200.000
                                </td>
                                <td class="px-6 py-4">
                                    2/28/2022
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Cancelled</span>
                                </td>
                                <td class="flex flex-wrap gap-1 px-6 py-4">
                                    <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                    <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    T2316
                                </th>
                                <td class="px-6 py-4">
                                    Alejandro Johnson
                                </td>
                                <td class="px-6 py-4">
                                    Claudia Bryan
                                </td>
                                <td class="px-6 py-4">
                                    Rp. 1.200.000
                                </td>
                                <td class="px-6 py-4">
                                    1/10/2040
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Done</span>
                                </td>
                                <td class="flex flex-wrap gap-1 px-6 py-4">
                                    <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                    <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    T1729
                                </th>
                                <td class="px-6 py-4">
                                    Clara Hunt
                                </td>
                                <td class="px-6 py-4">
                                    Susan Stevens
                                </td>
                                <td class="px-6 py-4">
                                    Rp. 1.200.000
                                </td>
                                <td class="px-6 py-4">
                                    4/9/2070
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Done</span>
                                </td>
                                <td class="flex flex-wrap gap-1 px-6 py-4">
                                    <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                    <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    T1986
                                </th>
                                <td class="px-6 py-4">
                                    Christian Reed
                                </td>
                                <td class="px-6 py-4">
                                    Wayne Kennedy
                                </td>
                                <td class="px-6 py-4">
                                    Rp. 1.200.000
                                </td>
                                <td class="px-6 py-4">
                                    6/8/2099
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">On
                                        Going</span>
                                </td>
                                <td class="flex flex-wrap gap-1 px-6 py-4">
                                    <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                    <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                  T2284
                              </th>
                              <td class="px-6 py-4">
                                  Violet Lowe
                              </td>
                              <td class="px-6 py-4">
                                  Alma Williams
                              </td>
                              <td class="px-6 py-4">
                                  Rp. 1.200.000
                              </td>
                              <td class="px-6 py-4">
                                  3/18/2035
                              </td>
                              <td class="px-6 py-4">
                                  <span
                                      class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Cancelled</span>
                              </td>
                              <td class="flex flex-wrap gap-1 px-6 py-4">
                                  <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                  <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                              </td>
                          </tr>
                          <tr class="bg-white border-b">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                  T2234
                              </th>
                              <td class="px-6 py-4">
                                  Barbara Bennett
                              </td>
                              <td class="px-6 py-4">
                                  Jerome Wilson
                              </td>
                              <td class="px-6 py-4">
                                  Rp. 1.200.000
                              </td>
                              <td class="px-6 py-4">
                                  5/31/2101
                              </td>
                              <td class="px-6 py-4">
                                  <span
                                      class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Done</span>
                              </td>
                              <td class="flex flex-wrap gap-1 px-6 py-4">
                                  <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                  <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                              </td>
                          </tr>
                          <tr class="bg-white border-b">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                  T2766
                              </th>
                              <td class="px-6 py-4">
                                  Brian Lambert
                              </td>
                              <td class="px-6 py-4">
                                  Henry Yates
                              </td>
                              <td class="px-6 py-4">
                                  Rp. 1.200.000
                              </td>
                              <td class="px-6 py-4">
                                  10/12/2050
                              </td>
                              <td class="px-6 py-4">
                                  <span
                                      class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Done</span>
                              </td>
                              <td class="flex flex-wrap gap-1 px-6 py-4">
                                  <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                  <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                              </td>
                          </tr>
                          <tr class="bg-white border-b">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                  T1884
                              </th>
                              <td class="px-6 py-4">
                                  Darrell Lynch
                              </td>
                              <td class="px-6 py-4">
                                  Garrett Ortega
                              </td>
                              <td class="px-6 py-4">
                                  Rp. 1.200.000
                              </td>
                              <td class="px-6 py-4">
                                  10/13/2025
                              </td>
                              <td class="px-6 py-4">
                                  <span
                                      class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">On Going</span>
                              </td>
                              <td class="flex flex-wrap gap-1 px-6 py-4">
                                  <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                  <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                              </td>
                          </tr>
                          <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                T1033
                            </th>
                            <td class="px-6 py-4">
                                Vernon Greer
                            </td>
                            <td class="px-6 py-4">
                                Tommy Daniels
                            </td>
                            <td class="px-6 py-4">
                                Rp. 1.200.000
                            </td>
                            <td class="px-6 py-4">
                                5/26/2025
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">Cancelled</span>
                            </td>
                            <td class="flex flex-wrap gap-1 px-6 py-4">
                                <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                T1295
                            </th>
                            <td class="px-6 py-4">
                                Lucile McLaughlin
                            </td>
                            <td class="px-6 py-4">
                                Daisy Holland
                            </td>
                            <td class="px-6 py-4">
                                Rp. 1.200.000
                            </td>
                            <td class="px-6 py-4">
                                6/13/2072
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Done</span>
                            </td>
                            <td class="flex flex-wrap gap-1 px-6 py-4">
                                <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                T2779
                            </th>
                            <td class="px-6 py-4">
                                Winifred Lawrence
                            </td>
                            <td class="px-6 py-4">
                                Chad Bell
                            </td>
                            <td class="px-6 py-4">
                                Rp. 1.200.000
                            </td>
                            <td class="px-6 py-4">
                                11/10/2061
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Done</span>
                            </td>
                            <td class="flex flex-wrap gap-1 px-6 py-4">
                                <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                T1348
                            </th>
                            <td class="px-6 py-4">
                                Georgia Parsons
                            </td>
                            <td class="px-6 py-4">
                                Eula Fernandez
                            </td>
                            <td class="px-6 py-4">
                                Rp. 1.200.000
                            </td>
                            <td class="px-6 py-4">
                                8/4/2027
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded ">On
                                    Going</span>
                            </td>
                            <td class="flex flex-wrap gap-1 px-6 py-4">
                                <a href="#" class="px-3 font-medium text-blue-600 hover:underline">Edit</a>
                                <a href="#" class="px-3 font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </x-dashboard-layout>
</x-layout>
