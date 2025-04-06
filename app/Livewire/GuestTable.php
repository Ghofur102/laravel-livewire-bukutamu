<?php

namespace App\Livewire;

use App\Models\Guest;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class GuestTable extends Component
{
    use WithPagination;

    #[Validate('required')]
    public $nama = "";

    #[Validate('required')]
    public $alamat = "";

    #[Validate('required')]
    public $tujuan = "";

    #[Validate('required')]
    public $tanggal = "";

    public $previewGuest;
    public $showPreview = false;

    public function render()
    {
        return view('livewire.guest-table', [
            "guests" => Guest::latest()->paginate(2)
        ]);
    }

    public function store()
    {
        $this->validate();
        Guest::create($this->all());
        $this->reset();
        session()->flash("sukses", "Data tamu berhasil ditambahkan!");
    }

    public function preview($id)
    {
        $this->previewGuest = Guest::find($id);
        $this->showPreview = true;
    }

    public function nonaktifPreview()
    {
        $this->previewGuest = null;
        $this->showPreview = false;
    }
}
