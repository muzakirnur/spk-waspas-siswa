<?php

namespace App\Http\Livewire\Hasil;

use App\Models\Hasil;
use App\Models\Jurusan;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $paginate=10;
    public $quota = [];

    public function mount()
    {
        $jurusan = Jurusan::query()->orderBy('priority', 'asc')->get();
        for($i=0;$i<count($jurusan);$i++){
            if(count($this->quota) == 0){
                $array = [
                    'id' => $jurusan[$i]->id,
                    'start' => 1,
                    'end' => $jurusan[$i]->quota,
                ];
            }else{
                $prevArray = $this->quota[$i-1];
                $array = [
                    'id' => $jurusan[$i]->id,
                    'start' => $prevArray['end'] +1,
                    'end' => $prevArray['end'] + $jurusan[$i]->quota,
                ];
            }
            $this->quota[$i] = $array;
        }
    }

    public function render()
    {
        return view('livewire.hasil.table', [
            'data' => Hasil::query()->orderBy('nilai', 'DESC')->paginate($this->paginate),
            'jurusan' => Jurusan::query()->orderBy('priority', 'asc')->get(),
        ]);
    }
}
