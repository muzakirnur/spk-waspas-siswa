<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="w-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <div class="flex flex-wrap justify-between">
                    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Normalisasi Attribute</h2>
                    </header>
                </div>
                <div class="p-3">
                <!-- Table -->
                    <div class="overflow-x-auto">
                        <table id="tableIndex" class="table-auto w-full dark:text-slate-300">
                            <!-- Table header -->
                            <thead class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Nama Attribute</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Kode Attribute</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Bobot Attribute</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Normalisasi</div>
                                    </th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm font-medium divide-y divide-slate-100 dark:divide-slate-700">
                                <!-- Row -->
                                @foreach ($data['attributes'] as $attribute)   
                                <tr>
                                    <td class="p-2">
                                        <div class="text-left">{{$attribute->nama}}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="text-left">{{$attribute->kode}}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="text-left">{{$attribute->bobot}}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="text-left">{{$attribute->normalizedAttribute()}}</div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="w-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <div class="flex flex-wrap justify-between">
                    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Data Awal</h2>
                    </header>
                </div>
                <div class="p-3">
                <!-- Table -->
                    <div class="overflow-x-auto">
                        <table id="tableIndex" class="table-auto w-full dark:text-slate-300 mb-4">
                            <!-- Table header -->
                            <thead class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">
                                    <tr>
                                        <th rowspan="2" class="text-left">Nama Mahasiswa</th>
                                        <th colspan="{{$data['attributes']->count()}}" scope="colgroup">Nilai Bobot Attribute</th>
                                    </tr>
                                    <tr>
                                        @foreach ($data['attributes'] as $attribute)
                                        <th scope="col">{{$attribute->kode}}</th>
                                        @endforeach
                                    </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm font-medium divide-y divide-slate-100 dark:divide-slate-700">
                                <!-- Row -->
                                @foreach ($data['mahasiswas'] as $mahasiswa)
                                <tr>
                                    <th scope="row" class="p-2">
                                        <div class="text-left">
                                            {{$mahasiswa->nama}}
                                        </div>
                                    </th>
                                    @foreach ($mahasiswa->getFinancial() as $financial)   
                                    <td class="p-2">
                                        <div class="text-center">{{$financial->nilaiAttribute->value}}</div>
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data['mahasiswas']->links()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="w-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <div class="flex flex-wrap justify-between">
                    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Penilaian Pada Setiap Alternatif</h2>
                    </header>
                </div>
                <div class="p-3">
                <!-- Table -->
                    <div class="overflow-x-auto">
                        <table id="tableIndex" class="table-auto w-full dark:text-slate-300 mb-4">
                            <!-- Table header -->
                            <thead class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">
                                    <tr>
                                        <th rowspan="2" class="text-left">Nama Mahasiswa</th>
                                        <th colspan="{{$data['attributes']->count()}}" scope="colgroup">Attribute</th>
                                    </tr>
                                    <tr>
                                        @foreach ($data['attributes'] as $attribute)
                                        <th scope="col">{{$attribute->kode}}</th>
                                        @endforeach
                                    </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm font-medium divide-y divide-slate-100 dark:divide-slate-700">
                                <!-- Row -->
                                @foreach ($data['mahasiswas'] as $mahasiswa)
                                <tr>
                                    <th scope="row" class="p-2">
                                        <div class="text-left">
                                            {{$mahasiswa->nama}}
                                        </div>
                                    </th>
                                    @foreach ($mahasiswa->getFinancial() as $financial)   
                                    <td class="p-2">
                                        <div class="text-center">{{$financial->nilai}}</div>
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data['mahasiswas']->links()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="w-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <div class="flex flex-wrap justify-between">
                    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Nilai Utility</h2>
                    </header>
                </div>
                <div class="p-3">
                <!-- Table -->
                    <div class="overflow-x-auto">
                        <table id="tableIndex" class="table-auto w-full dark:text-slate-300 mb-4">
                            <!-- Table header -->
                            <thead class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">
                                    <tr>
                                        <th rowspan="2" class="text-left">Alternatif</th>
                                        @foreach ($data['attributes'] as $attribute)
                                        <th scope="col">Ui ({{$attribute->kode}})</th>
                                        @endforeach
                                    </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm font-medium divide-y divide-slate-100 dark:divide-slate-700">
                                <!-- Row -->
                                @foreach ($data['mahasiswas'] as $mahasiswa)
                                <tr>
                                    <th scope="row" class="p-2">
                                        <div class="text-left">
                                            A{{ ($data['mahasiswas'] ->currentpage()-1) * $data['mahasiswas'] ->perpage() + $loop->index + 1 }}
                                        </div>
                                    </th>
                                    @foreach ($mahasiswa->getFinancial() as $financial)   
                                    <td class="p-2">
                                        <div class="text-center">{{$financial->nilaiUtility()}}</div>
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data['mahasiswas']->links()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="w-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <div class="flex flex-wrap justify-between">
                    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Nilai Keseluruhan Utility</h2>
                    </header>
                </div>
                <div class="p-3">
                <!-- Table -->
                    <div class="overflow-x-auto">
                        <table id="tableIndex" class="table-auto w-full dark:text-slate-300 mb-4">
                            <!-- Table header -->
                            <thead class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">
                                    <tr>
                                        <th class="text-left">Alternatif</th>
                                        <th class="text-left">Nama Mahasiswa</th>
                                        <th class="text-left">Nilai Akhir</th>
                                    </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm font-medium divide-y divide-slate-100 dark:divide-slate-700">
                                <!-- Row -->
                                @foreach ($data['mahasiswas'] as $mahasiswa)
                                <tr>
                                    <td class="p-2">
                                        <div class="text-left">A{{ ($data['mahasiswas'] ->currentpage()-1) * $data['mahasiswas'] ->perpage() + $loop->index + 1 }}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="text-left">{{$mahasiswa->nama}}</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="text-left">{{$mahasiswa->countAllUtility()}}</div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data['mahasiswas']->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>