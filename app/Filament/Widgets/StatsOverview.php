<?php

namespace App\Filament\Widgets;

use App\Models\Gallery;
use App\Models\News;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', News::count())
                ->description('Berita & Pengumuman aktif')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
            Stat::make('Koleksi Galeri', Gallery::count())
                ->description('Foto & Video kegiatan')
                ->descriptionIcon('heroicon-m-camera')
                ->color('info'),
            // Tambahkan statistik anggota jika nanti sudah ada model Member
        ];
    }
}
