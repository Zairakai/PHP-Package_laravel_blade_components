<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelBladeComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'zairakai');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'zairakai');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/views/content' => resource_path('views/vendor/zairakai/content'),
                __DIR__ . '/../resources/views/form'    => resource_path('views/vendor/zairakai/form'),
                __DIR__ . '/../resources/views/layout'  => resource_path('views/vendor/zairakai/layout'),
                __DIR__ . '/../resources/views/medias'  => resource_path('views/vendor/zairakai/medias'),
            ], 'zairakai-components');

            $this->publishes([
                __DIR__ . '/../resources/lang' => lang_path('vendor/zairakai'),
            ], 'zairakai-lang');

            $this->publishes([
                __DIR__ . '/../config/blade-components.php' => config_path('blade-components.php'),
            ], 'zairakai-config');

            $this->publishes([
                __DIR__ . '/../resources/views'             => resource_path('views/vendor/zairakai'),
                __DIR__ . '/../resources/lang'              => lang_path('vendor/zairakai'),
                __DIR__ . '/../config/blade-components.php' => config_path('blade-components.php'),
            ], 'zairakai-all');
        }

        $this->registerComponents();
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-components.php', 'blade-components');
    }

    /**
     * Register Blade components.
     */
    protected function registerComponents(): void
    {
        $aliases = [
            ...$this->contentAliases(),
            ...$this->formAliases(),
            ...$this->layoutAliases(),
            ...$this->mediaAliases(),
            ...$this->internalAliases(),
        ];

        foreach ($aliases as [$view, $alias]) {
            Blade::component($view, $alias);
        }
    }

    /**
     * @return array<array{string, string}>
     */
    private function contentAliases(): array
    {
        return [
            ['zairakai::content.blockquote', 'zk-blockquote'],
            ['zairakai::content.heading',    'zk-heading'],
            ['zairakai::content.link',       'zk-link'],
            ['zairakai::content.list',       'zk-list'],
            ['zairakai::content.msr',        'zk-msr'],
            ['zairakai::content.paragraph',  'zk-paragraph'],
        ];
    }

    /**
     * @return array<array{string, string}>
     */
    private function formAliases(): array
    {
        return [
            ['zairakai::form.additional', 'zk-additional'],
            ['zairakai::form.button',     'zk-button'],
            ['zairakai::form.checkbox',   'zk-checkbox'],
            ['zairakai::form.color',      'zk-color'],
            ['zairakai::form.datalist',   'zk-datalist'],
            ['zairakai::form.date',       'zk-date'],
            ['zairakai::form.datetime',   'zk-datetime'],
            ['zairakai::form.email',      'zk-email'],
            ['zairakai::form.field',      'zk-field'],
            ['zairakai::form.fieldset',   'zk-fieldset'],
            ['zairakai::form.file',       'zk-file'],
            ['zairakai::form.form',       'zk-form'],
            ['zairakai::form.hidden',     'zk-hidden'],
            ['zairakai::form.input',      'zk-input'],
            ['zairakai::form.label',      'zk-label'],
            ['zairakai::form.month',      'zk-month'],
            ['zairakai::form.number',     'zk-number'],
            ['zairakai::form.password',   'zk-password'],
            ['zairakai::form.radio',      'zk-radio'],
            ['zairakai::form.range',      'zk-range'],
            ['zairakai::form.reset',      'zk-reset'],
            ['zairakai::form.search',     'zk-search'],
            ['zairakai::form.select',     'zk-select'],
            ['zairakai::form.submit',     'zk-submit'],
            ['zairakai::form.switch',     'zk-switch'],
            ['zairakai::form.tel',        'zk-tel'],
            ['zairakai::form.textarea',   'zk-textarea'],
            ['zairakai::form.time',       'zk-time'],
            ['zairakai::form.url',        'zk-url'],
            ['zairakai::form.week',       'zk-week'],
        ];
    }

    /**
     * @return array<array{string, string}>
     */
    private function internalAliases(): array
    {
        return [
            ['zairakai::content.link',      'content.link'],
            ['zairakai::content.list',      'content.list'],
            ['zairakai::content.msr',       'content.msr'],
            ['zairakai::content.paragraph', 'content.paragraph'],
            ['zairakai::form.additional', 'form.additional'],
            ['zairakai::form.button',     'form.button'],
            ['zairakai::form.checkbox',   'form.checkbox'],
            ['zairakai::form.field',      'form.field'],
            ['zairakai::form.form',       'form.form'],
            ['zairakai::form.input',      'form.input'],
            ['zairakai::form.label',      'form.label'],
            ['zairakai::form.submit',     'form.submit'],
            ['zairakai::layout.container',  'layout.container'],
            ['zairakai::medias.image',      'medias.image'],
            ['zairakai::medias.source',     'medias.source'],
            ['zairakai::medias.track',      'medias.track'],
        ];
    }

    /**
     * @return array<array{string, string}>
     */
    private function layoutAliases(): array
    {
        return [
            ['zairakai::layout.article',    'zk-article'],
            ['zairakai::layout.aside',      'zk-aside'],
            ['zairakai::layout.breadcrumb', 'zk-breadcrumb'],
            ['zairakai::layout.column',     'zk-column'],
            ['zairakai::layout.container',  'zk-container'],
            ['zairakai::layout.footer',     'zk-footer'],
            ['zairakai::layout.grid',       'zk-grid'],
            ['zairakai::layout.grid-item',  'zk-grid-item'],
            ['zairakai::layout.header',     'zk-header'],
            ['zairakai::layout.main',       'zk-main'],
            ['zairakai::layout.nav',        'zk-nav'],
            ['zairakai::layout.pagination', 'zk-pagination'],
            ['zairakai::layout.row',        'zk-row'],
            ['zairakai::layout.section',    'zk-section'],
            ['zairakai::layout.tabs',       'zk-tabs'],
            ['zairakai::layout.wrapper',    'zk-wrapper'],
        ];
    }

    /**
     * @return array<array{string, string}>
     */
    private function mediaAliases(): array
    {
        return [
            ['zairakai::medias.audio',      'zk-audio'],
            ['zairakai::medias.canvas',     'zk-canvas'],
            ['zairakai::medias.figcaption', 'zk-figcaption'],
            ['zairakai::medias.figure',     'zk-figure'],
            ['zairakai::medias.iframe',     'zk-iframe'],
            ['zairakai::medias.image',      'zk-image'],
            ['zairakai::medias.object',     'zk-object'],
            ['zairakai::medias.source',     'zk-source'],
            ['zairakai::medias.track',      'zk-track'],
            ['zairakai::medias.video',      'zk-video'],
        ];
    }
}
