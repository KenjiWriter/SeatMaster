<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Film;

class Showfilms extends Component
{
    public $movies, $moviesDates, $moviesHours;
    public $date = null, $hour = null, $type = null;
    public $modalMovie;

    public function updateMovies()
    {
        $movies = Film::when($this->date, function ($query) {
            $query->whereDate('show_date', '=', $this->date);
        })
            ->when($this->hour, function ($query) {
                $query->whereTime('show_time', '>=', $this->hour);
            })
            ->when($this->type, function ($query) {
                $query->where('type', '=', $this->type);
            })
            ->get();
        $this->movies = $movies;
    }

    public function setModal($index)
    {
        $this->modalMovie = $this->movies[$index];
    }

    public function render()
    {
        $dates = [];

        $today = Carbon::today();
        $dates[] = ['value' => $today->format('Y-m-d'), 'label' => 'Dziś (' . $today->format('d.m') . ($today->isSunday() ? ' (sunday)' : '')];

        $tomorrow = $today->copy()->addDay();
        $dates[] = ['value' => $tomorrow->format('Y-m-d'), 'label' => 'Jutro (' . $tomorrow->format('d.m') . ($tomorrow->isSunday() ? ' (sunday)' : '')];

        for ($i = 2; $i < 12; $i++) {
            $date = $today->copy()->addDays($i);
            $label = $date->format('d.m');
            if ($date->isSunday()) {
                $label .= ' (sunday)';
            }
            $dates[] = ['value' => $date->format('Y-m-d'), 'label' => $label];
        }
        $this->moviesDates = $dates;

        $hours = [];

        $currentHour = Carbon::now()->hour;

        for ($hour = $currentHour; $hour <= 22; $hour++) {
            $hours[] = ['label' => "{$hour}:00"];
        }

        $this->moviesHours = $hours;
        if ($this->movies == null) {
            $movies = Film::whereDate('show_date', '=', $today->format('Y-m-d'))->get();
            $this->date = $today->format('Y-m-d');
            $this->movies = $movies;
        }
        return view('livewire.showfilms');
    }
}
