<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Showfilms extends Component
{
    public $movies, $moviesDates, $moviesHours;
    public $date = '', $hour = '', $type = '';

    public function render()
    {
        $dates = [];

        $today = Carbon::today();

        $dates[] = ['value' => $today->format('Y-m-d'), 'label' => 'Dziś (' . $today->format('d.m') . ($today->isSunday() ? ' (sunday)' : '') . ')'];

        $tomorrow = $today->copy()->addDay();
        $dates[] = ['value' => $tomorrow->format('Y-m-d'), 'label' => 'Jutro (' . $tomorrow->format('d.m') . ($tomorrow->isSunday() ? ' (sunday)' : '') . ')'];

        for ($i = 0; $i < 12; $i++) {
            $date = $today->copy()->addDays($i);
            $label = $date->format('d.m');
            if ($date->isSunday()) {
                $label .= ' (sunday)';
            }
            $dates[] = ['value' => $date->format('Y-m-d'), 'label' => $label];
        }

        $this->moviesDates = $dates;

        // Inicjalizuj tablicę na dostępne godziny
        $hours = [];

        // Pobierz obecną godzinę
        $currentHour = Carbon::now()->hour;

        // Dostępne godziny od obecnej godziny do 22:00
        for ($hour = $currentHour; $hour <= 22; $hour++) {
            $hours[] = ['value' => $hour, 'label' => "{$hour}:00"];
        }

        $this->moviesHours = $hours;

        $movies = [
            [
                'title' => 'Film 1',
                'description' => 'Opis filmu 1',
                'poster_url' => 'https://picsum.photos/200/300',
            ],
            [
                'title' => 'Film 2',
                'description' => 'Opis filmu 2',
                'poster_url' => 'https://picsum.photos/200/300',
            ],
        ];
        $this->movies = $movies;
        return view('livewire.showfilms');
    }
}
