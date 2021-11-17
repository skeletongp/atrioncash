<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait BalanceTrait
{
    public $start, $end;
    public function dates()
    {
        if (!request('start') || !request('end')) {
            $start = Carbon::now()->subDays(7);
            $end = Carbon::now();
            $start = date('Y-m-d', strtotime($start));
            $end = date('Y-m-d', strtotime($end));
        } else {
            $start = request('start');
            $end = request('end');
        }
        $this->start = $start;
        $this->end = $end;
    }

    public function scopeInterval(Builder $query)
    {
        $this->dates();
        return [
            'actual' => $query->whereBetween('fecha', [$this->start, $this->end])->orderBy('created_at','desc'),
            'start' => date('d M', strtotime($this->start)),
            'end' => date('d M', strtotime($this->end)),
        ];
    }
    public function scopeEarly(Builder $query, $time = "")
    {
        $this->dates();
        $start = $this->start;
        $end = $this->end;

        switch ($time) {
            case 'day':
                $dif = Carbon::parse($end)->diffInDays(Carbon::parse($start));
                $beforeStart = Carbon::parse($start)->subDay($dif + 1);
                $beforeEnd = Carbon::parse($start)->subDay(1);
                break;
            case 'week':
                $beforeStart = Carbon::parse($start)->subWeek(1);
                $beforeEnd = Carbon::parse($end)->subWeek(1);
                break;
            case 'month':
                $beforeStart = Carbon::parse($start)->subMonth(1);
                $beforeEnd = Carbon::parse($end)->subMonth(1);
                break;
            default:
                $beforeStart = Carbon::parse($start)->subWeek(1);
                $beforeEnd = Carbon::parse($end)->subWeek(1);
                break;
        }

        $beforeStart = date('Y-m-d', strtotime($beforeStart));
        $beforeEnd = date('Y-m-d', strtotime($beforeEnd));
        return
            [
                'early' => $query->whereBetween('day', [$beforeStart, $beforeEnd])->get(),
                'beforeStart' => date('d M', strtotime($beforeStart)),
                'beforeEnd' => date('d M', strtotime($beforeEnd)),
            ];
    }
}
