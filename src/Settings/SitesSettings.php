<?php

namespace TomatoPHP\FilamentSettingsHub\Settings;

use Spatie\LaravelSettings\Settings;

class SitesSettings extends Settings
{
    public string $site_name;

    public ?string $site_description = null;

    public ?string $site_keywords = null;

    public mixed $site_profile = null;

    public mixed $site_logo = null;

    public ?string $site_author = null;

    public ?string $site_email = null;

    public ?string $site_phone = null;

    public ?array $site_social = [];

    public ?string $site_primary_color = null;
    public ?string $site_secondary_color = null;
    public ?string $site_tertiary_color = null;


    public static function group(): string
    {
        return 'sites';
    }
}
