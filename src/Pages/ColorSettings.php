<?php

namespace TomatoPHP\FilamentSettingsHub\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\ColorPicker;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
use TomatoPHP\FilamentSettingsHub\Traits\UseShield;

class ColorSettings extends SettingsPage
{
    use UseShield;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SitesSettings::class;

    public function getTitle(): string
    {
        return trans('filament-settings-hub::messages.settings.color.title');
    }

    protected function getActions(): array
    {
        $tenant = Filament::getTenant();
        if ($tenant) {
            return [
                Action::make('back')->action(fn () => redirect()->route('filament.' . filament()->getCurrentPanel()->getId() . '.pages.settings-hub', $tenant))->color('danger')->label(trans('filament-settings-hub::messages.back')),
            ];
        }

        return [
            Action::make('back')->action(fn () => redirect()->route('filament.' . filament()->getCurrentPanel()->getId() . '.pages.settings-hub'))->color('danger')->label(trans('filament-settings-hub::messages.back')),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make(trans('filament-settings-hub::messages.settings.color.title'))
                    ->description(trans('filament-settings-hub::messages.settings.color.description'))
                    ->schema([
                        ColorPicker::make('site_primary_color')
                            ->label(trans('filament-settings-hub::messages.settings.color.form.primary_color'))
                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("primary_color")' : null)
                            ->required(),
                        ColorPicker::make('site_secondary_color')
                            ->label(trans('filament-settings-hub::messages.settings.color.form.secondary_color'))
                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("secondary_color")' : null)
                            ->required(),
                        ColorPicker::make('site_tertiary_color')
                            ->label(trans('filament-settings-hub::messages.settings.color.form.tertiary_color'))
                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("tertiary_color")' : null)
                            ->required(),
                    ]),
            ])->columns(1);
    }
}
