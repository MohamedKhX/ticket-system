<?php

namespace App\Providers\Filament;

use App\Filament\Airline\Reports;
use EightyNine\Reports\ReportsPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\View\View;

class AirlinePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('airline')
            ->path('airline')
            ->colors([
                'primary' => Color::hex('#A91D3A'),
            ])
            ->discoverResources(in: app_path('Filament/Airline/Resources'), for: 'App\\Filament\\Airline\\Resources')
            ->discoverPages(in: app_path('Filament/Airline/Pages'), for: 'App\\Filament\\Airline\\Pages')
            ->pages([
                Reports::class,
            ])
            ->plugins([
                ReportsPlugin::make()
            ])
            ->discoverWidgets(in: app_path('Filament/Airline/Widgets'), for: 'App\\Filament\\Airline\\Widgets')
            ->widgets([])
            ->brandLogo(asset('img/logo-blue.svg'))
            ->favicon(asset('img/favicon.svg'))
            ->brandLogoHeight('2.5rem')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                PanelsRenderHook::TOPBAR_START,
                fn(): View => view('filament.airline.airline-name')
            )
            ->viteTheme('resources/css/filament/airline/theme.css');
    }
}
