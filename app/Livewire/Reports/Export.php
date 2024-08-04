<?php

namespace App\Livewire\Reports;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Export extends Component
{
    public Model $model;
    public $size = 'A4';
    public string $filterClass;
    public $perPage = 18;
    public $title = 'Report';
    public $exportColumns;

    //query string
    protected $queryString = [
        'size' => ['except' => ''],
        'title' => ['except' => 'تقرير'],
    ];

    public function mount()
    {
        if ($this->size == 'A3') {
            $this->perPage = 28;
        } elseif ($this->size == 'A3_landscape') {
            $this->perPage = 18;
        } elseif ($this->size == 'A4') {
            $this->perPage = 10;
        } elseif ($this->size == 'A4_landscape') {
            $this->perPage = 10;
        } elseif ($this->size == 'A5') {
            $this->perPage = 4;
        } elseif ($this->size == 'A5_landscape') {
            $this->perPage = 2;
        } elseif ($this->size == 'card') {
            $this->perPage = 5;
        }

    }

    public function render()
    {
        $query = $this->model::query();

        $records = $query->get();

        $this->exportColumns = $this->model->getExportColumns();

        return view('livewire.reports.export',
            [
                'Chunkrecords' => $records->chunk($this->perPage),
            ]);
    }

}
