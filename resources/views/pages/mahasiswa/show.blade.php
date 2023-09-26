<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="w-full mx-auto xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Data Mahasiswa</h2>
                </header>
                <div class="p-3">
                    <table>
                        <tbody>
                            <tr class="w-full">
                                <td class="w-1/4">Nama</td>
                                <td class="w-1/4 text-right">:</td>
                                <td>{{$mahasiswa->nama}}</td>
                            </tr>
                            <tr class="w-full">
                                <td class="w-1/4">NIM</td>
                                <td class="w-1/4 text-right">:</td>
                                <td>{{$mahasiswa->nim}}</td>
                            </tr>
                            <tr class="w-full">
                                <td class="w-1/4">Jenis Kelamin</td>
                                <td class="w-1/4 text-right">:</td>
                                <td>{{$mahasiswa->jenis_kelamin}}</td>
                            </tr>
                            <tr class="w-full">
                                <td class="w-1/4">Tempat Lahir</td>
                                <td class="w-1/4 text-right">:</td>
                                <td>{{$mahasiswa->tempat_lahir}}</td>
                            </tr>
                            <tr class="w-full">
                                <td class="w-1/4">Tanggal Lahir</td>
                                <td class="w-1/4 text-right">:</td>
                                <td>{{$mahasiswa->tanggal_lahir}}</td>
                            </tr>
                            <tr class="w-full">
                                <td class="w-1/4">Alamat</td>
                                <td class="w-1/4 text-right">:</td>
                                <td>{{$mahasiswa->alamat}}</td>
                            </tr>
                            <tr class="w-full">
                                <td class="w-1/4">Asal Sekolah</td>
                                <td class="w-1/4 text-right">:</td>
                                <td>{{$mahasiswa->asal_sekolah}}</td>
                            </tr>
                            <tr class="w-full">
                                <td class="w-1/4">Program Studi</td>
                                <td class="w-1/4 text-right">:</td>
                                <td>{{$mahasiswa->program_studi}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="w-full mx-auto xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100">Data Finansial</h2>
                </header>
                <div class="p-3">
                    <table>
                        <tbody>
                            @foreach ($mahasiswa->getFinancial() as $row)
                            <tr class="w-full">
                                <td class="w-1/4">{{$row->nilaiAttribute->attribute->nama}}</td>
                                <td class="w-1/4 text-right">:</td>
                                <td>{{$row->nilaiAttribute->value}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-between">
            <a href="{{route('mahasiswa.index')}}" class="btn bg-slate-500 hover:bg-slate-600 text-white">
                <i class="fa-solid fa-chevron-left"></i>
                <span class="hidden xs:block ml-2">Kembali</span>
            </a>
        </div>
    </div>
</x-app-layout>