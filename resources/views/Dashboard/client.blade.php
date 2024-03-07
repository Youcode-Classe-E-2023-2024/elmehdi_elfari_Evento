<!-- component -->
<!DOCTYPE html>
<html class="dark scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/dist/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="h-screen">

    <header class="h-14 bg-gray-100 top-0 w-full fixed shadow" style="z-index: 99999;">
        <div class="flex justify-between items-center px-10 h-14">
            <div class="flex justify-between items-center gap-x-14">
                <div class="w-40">
                    <h2 class="text-md font-bold" href="#">Rabiul Islam</h2>
                    <p class="text-gray-400 text-[12px]">
                        Web Developer
                    </p>
                </div>

                <a id="toggle-button"
                    class="hidden lg:block bg-gray-200 rounded-full transition-all duration-500 ease-in-out"
                    onclick="collapseSidebar()" href="#"><i class="fa-solid fa-arrow-left p-3"></i></a>
            </div>

            @role('client')
                @if (Auth::user()->asked_permission == false)
                    <form class="hidden p-2 lg:block bg-gray-200 rounded-full transition-all duration-500 ease-in-out"
                        onclick="collapseSidebar()" method="POST" action="{{ route('asckPermission') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Ask for Permission
                        </button>
                    </form>
                @else
                    @can('organize')
                        fuck you
                    @else
                        waiting
                    @endcan
                @endif
            @endrole

        </div>
    </header>

    <!-- main content -->
    <main class="h-[calc(100vh-120px)] w-full absolute top-14">
        <!-- left sidebar -->
        <aside id="sidebar"
            class="w-[60px] lg:w-[240px] h-[calc(100vh-120px)] whitespace-nowrap fixed shadow overflow-x-hidden transition-all duration-500 ease-in-out">
            <div class="flex flex-col justify-between h-full">
                <ul class="flex flex-col gap-1 mt-2">
                    <li class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="#">
                            <i class="fa-solid fa-house text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">Dashboard</span>
                        </a>
                    </li>
                    <form
                        class="flex flex-col gap-1 mt-2 w-full flex items-center py-3 fa-solid fa-right-from-bracket text-center px-5 text-gray-500 hover:bg-gray-100 hover:text-gray-900"
                        method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-toggle flex items-center">
                            <a role="menuitem"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer">
                                Log Out
                            </a>
                        </button>
                    </form>
                </ul>
            </div>
        </aside>

        <!-- main content -->
        <section id="content"
            class="w-[100wh-60px] lg:w-[100wh-250px] ml-[60px] lg:ml-[240px] p-5 right-0 transition-all duration-500 ease-in-out">
            <!-- user summary -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-slate-50 p-5 m-2 rounded-md flex justify-between items-center shadow">
                    <div>
                        <h3 class="font-bold">Total Event</h3>
                        <p class="text-gray-500">{{ $EventCount }}</p>
                    </div>
                    <i class="fa-solid fa-users p-4 bg-gray-200 rounded-md"></i>
                </div>

                <div class="bg-slate-50 p-5 m-2 flex justify-between items-center shadow">
                    <div>
                        <h3 class="font-bold">Total Active Users</h3>
                        <p class="text-gray-500">65</p>
                    </div>
                    <i class="fa-solid fa-users p-4 bg-green-200 rounded-md"></i>
                </div>

                <div class="bg-slate-50 p-5 m-2 flex justify-between items-center shadow">
                    <div>
                        <h3 class="font-bold">Total In Active Users</h3>
                        <p class="text-gray-500">30</p>
                    </div>
                    <i class="fa-solid fa-users p-4 bg-yellow-200 rounded-md"></i>
                </div>

                <div class="bg-slate-50 p-5 m-2 flex justify-between items-center shadow">
                    <div>
                        <h3 class="font-bold">Deleted Users</h3>
                        <p class="text-gray-500">5</p>
                    </div>
                    <i class="fa-solid fa-users p-4 bg-red-200 rounded-md"></i>
                </div>
            </div>

            <div class="overflow-x-auto">
                <div class="font-[sans-serif] space-x-4  my-3 space-y-4 text-center">
                    <a href="{{ route('get.event') }}"
                        class="px-6 py-2 rounded text-white text-sm tracking-wider font-medium outline-none border-2 border-blue-600 bg-blue-600 hover:bg-transparent hover:text-black transition-all duration-300">Add
                        Event</a>
                </div>
                <table class="min-w-full bg-white font-sans">
                    <thead class="bg-gray-100 whitespace-nowrap">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Date Start</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Date End</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Number of Places</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @forelse ($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->date_start }}</td>
                                <td>{{ $event->date_end }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->number_places }}</td>
                                <td>{{ $event->status }}</td>
                                <td>
                                    <a href="{{ route('Events.show', $event->id) }}"
                                        class="px-6 py-2 rounded-full text-black text-sm tracking-wider font-medium outline-none border-2 border-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">View</a>
                                    <a href="{{ route('Events.edit', $event->id) }}"
                                        class="px-6 py-2 rounded-full text-black text-sm tracking-wider font-medium outline-none border-2 border-orange-500 hover:bg-orange-600 hover:text-white transition-all duration-300">Edit</a>
                                    <form action="{{ route('Events.destroy', $event->id) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-6 py-2 rounded-full text-black text-sm tracking-wider font-medium outline-none border-2 border-red-600 hover:bg-red-600 hover:text-white transition-all duration-300"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">No events available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </section>
    </main>

    <footer class="bg-gray-50 p-5 bottom-0 fixed w-full">
        <p class="text-center">Copyright @2023</p>
    </footer>

    <script>
        function collapseSidebar() {
            let sidebar = document.getElementById('sidebar')
            let content = document.getElementById('content')
            let toggle = document.getElementById('toggle-button')
            let titles = sidebar.querySelectorAll('span')

            if (sidebar.classList.contains('lg:w-[240px]')) {
                //sidebar
                sidebar.classList.remove('lg:w-[240px]')
                sidebar.classList.add('w-[60px]')

                //content
                content.classList.remove('lg:w-[100wh-250px]')
                content.classList.remove('lg:ml-[240px]')
                content.classList.add('lg:w-[100wh-100px]')
                content.classList.add('ml-[60px]')

                //toggle
                toggle.classList.remove('rotate-0')
                toggle.classList.add('rotate-180')
            } else {
                //sidebar
                sidebar.classList.remove('w-[60px]')
                sidebar.classList.add('lg:w-[240px]')

                //content
                content.classList.remove('lg:w-[100wh-100px]')
                content.classList.remove('ml-[60px]')
                content.classList.add('lg:w-[100wh-250px]')
                content.classList.add('lg:ml-[240px]')

                //toggle
                toggle.classList.remove('rotate-180')
                toggle.classList.add('rotate-0')
            }
        }

        // toggle user dropdown
        function openUserDropdown() {
            document.getElementById('user-dropdown').classList.toggle('hidden')
        }
    </script>

    <script>
        var options = {
            chart: {
                height: 350,
                type: "line",
                stacked: false
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#FF1654", "#247BA0"],
            series: [{
                    name: "Series A",
                    data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
                },
                {
                    name: "Series B",
                    data: [20, 29, 37, 36, 44, 45, 50, 58]
                }
            ],
            stroke: {
                width: [4, 4]
            },
            plotOptions: {
                bar: {
                    columnWidth: "20%"
                }
            },
            xaxis: {
                categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016]
            },
            yaxis: [{
                    axisTicks: {
                        show: true
                    },
                    axisBorder: {
                        show: true,
                        color: "#FF1654"
                    },
                    labels: {
                        style: {
                            colors: "#FF1654"
                        }
                    },
                    title: {
                        text: "Series A",
                        style: {
                            color: "#FF1654"
                        }
                    }
                },
                {
                    opposite: true,
                    axisTicks: {
                        show: true
                    },
                    axisBorder: {
                        show: true,
                        color: "#247BA0"
                    },
                    labels: {
                        style: {
                            colors: "#247BA0"
                        }
                    },
                    title: {
                        text: "Series B",
                        style: {
                            color: "#247BA0"
                        }
                    }
                }
            ],
            tooltip: {
                shared: false,
                intersect: true,
                x: {
                    show: false
                }
            },
            legend: {
                horizontalAlign: "left",
                offsetX: 40
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>

    <!-- pie chart  -->
    <script>
        var options = {
            chart: {
                height: 350,
                type: "pie",
                stacked: false
            },
            colors: ["#FF1654", "#247BA0"],
            series: [44, 55, 13, 33],
            labels: ['Apple', 'Mango', 'Orange', 'Watermelon']
        };

        var chart = new ApexCharts(document.querySelector("#pie_chart"), options);

        chart.render();
    </script>

    <!-- candle stick chart -->
    <script>
        var options = {
            chart: {
                height: 350,
                type: "candlestick",
                stacked: false
            },
            colors: ["#FF1654", "#247BA0"],
            series: [{
                data: [
                    [1538856000000, [6593.34, 6600, 6582.63, 6600]],
                    [1538856900000, [6595.16, 6604.76, 6590.73, 6593.86]]
                ]
            }]
        };

        var chart = new ApexCharts(document.querySelector("#candle_chart"), options);

        chart.render();
    </script>


    <!-- heatmap chart -->
    <script>
        var options = {
            chart: {
                height: 350,
                type: "heatmap",
                stacked: false
            },
            colors: ["#FF1654", "#247BA0"],
            series: [{
                    name: "Series 1",
                    data: [{
                        x: 'W1',
                        y: 22
                    }, {
                        x: 'W2',
                        y: 29
                    }, {
                        x: 'W3',
                        y: 13
                    }, {
                        x: 'W4',
                        y: 32
                    }]
                },
                {
                    name: "Series 2",
                    data: [{
                        x: 'W1',
                        y: 43
                    }, {
                        x: 'W2',
                        y: 43
                    }, {
                        x: 'W3',
                        y: 43
                    }, {
                        x: 'W4',
                        y: 43
                    }]
                }
            ]
        };

        var chart = new ApexCharts(document.querySelector("#heatmap_chart"), options);

        chart.render();
    </script>
</body>

</html>
