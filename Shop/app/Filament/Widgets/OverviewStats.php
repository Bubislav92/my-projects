<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order; // Uvezi Order model
use App\Models\User;  // Uvezi User model
use App\Models\BlogPost;

class OverviewStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Stat 1: Ukupno plaćanja (porudžbine sa statusom 'paid')
            Stat::make('Total Payments', Order::where('payment_status', 'paid')->count())
                ->description('Total number of successfully paid orders')
                ->descriptionIcon('heroicon-o-currency-dollar') // Ikona dolara
                ->color('success'), // Zelena boja za uspešna plaćanja

            // Stat 2: Ukupan broj porudžbina
            Stat::make('Total Orders', Order::count())
                ->description('Total number of all orders')
                ->descriptionIcon('heroicon-o-shopping-bag') // Ikona korpe
                ->color('info'), // Plava boja za informaciju

            // Stat 3: Ukupan broj korisnika
            Stat::make('Total Users', User::count())
                ->description('Total number of registered users')
                ->descriptionIcon('heroicon-o-users') // Ikona korisnika
                ->color('primary'), // Primarna boja panela

            // Stat 4: Ukupan broj blog postova
            Stat::make('Total Blog Posts', BlogPost::count())
                ->description('Total number of published blog posts')
                ->descriptionIcon('heroicon-o-document-text') // Ikona za dokument
                ->color('warning'), // Žuta boja
        ];
    }
}