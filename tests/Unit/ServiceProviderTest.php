<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents\Tests\Unit;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Blade;
use PHPUnit\Framework\Attributes\Test;
use Zairakai\LaravelBladeComponents\BladeHelpers;
use Zairakai\LaravelBladeComponents\LaravelBladeComponentsServiceProvider;
use Zairakai\LaravelBladeComponents\Tests\TestCase;

final class ServiceProviderTest extends TestCase
{
    // ============================================================
    // Service provider registration
    // ============================================================

    #[Test]
    public function it_is_registered_as_a_service_provider(): void
    {
        $this->assertTrue(
            $this->app->providerIsLoaded(LaravelBladeComponentsServiceProvider::class),
        );
    }

    #[Test]
    public function it_loads_translations_under_zairakai_namespace(): void
    {
        $video  = __('zairakai::layout.medias.video');
        $audio  = __('zairakai::layout.medias.audio');
        $select = __('zairakai::layout.select.default');

        $this->assertNotEquals('zairakai::layout.medias.video', $video);
        $this->assertNotEquals('zairakai::layout.medias.audio', $audio);
        $this->assertNotEquals('zairakai::layout.select.default', $select);
        $this->assertNotEmpty($video);
        $this->assertNotEmpty($audio);
        $this->assertNotEmpty($select);
    }

    #[Test]
    public function it_loads_views_under_zairakai_namespace(): void
    {
        $this->assertTrue(view()->exists('zairakai::form.input'));
        $this->assertTrue(view()->exists('zairakai::layout.section'));
        $this->assertTrue(view()->exists('zairakai::content.heading'));
        $this->assertTrue(view()->exists('zairakai::medias.image'));
    }

    #[Test]
    public function it_matches_route_name_with_wildcard(): void
    {
        $route = new Route('GET', '/dashboard', static fn (): string => 'ok');
        $route->name('dashboard.index');

        request()->setRouteResolver(static fn (): Route => $route);

        $this->assertTrue(BladeHelpers::routeIs('dashboard.*'));
    }

    #[Test]
    public function it_merges_package_config(): void
    {
        $this->assertSame(8, config('blade-components.password.min_characters'));
        $this->assertSame('keyboard_arrow_down', config('blade-components.select.icon_after'));
    }

    // ============================================================
    // View publishing (runningInConsole branch)
    // ============================================================

    #[Test]
    public function it_publishes_all_assets_via_zairakai_all_tag(): void
    {
        $publishes = LaravelBladeComponentsServiceProvider::pathsToPublish(
            LaravelBladeComponentsServiceProvider::class,
            'zairakai-all',
        );

        $this->assertNotEmpty($publishes);
    }

    #[Test]
    public function it_publishes_config_via_zairakai_config_tag(): void
    {
        $publishes = LaravelBladeComponentsServiceProvider::pathsToPublish(
            LaravelBladeComponentsServiceProvider::class,
            'zairakai-config',
        );

        $this->assertNotEmpty($publishes);

        $sourcePath = realpath(array_key_first($publishes));
        $this->assertNotFalse($sourcePath);
        $this->assertFileExists($sourcePath);
    }

    #[Test]
    public function it_publishes_translations_via_zairakai_lang_tag(): void
    {
        $publishes = LaravelBladeComponentsServiceProvider::pathsToPublish(
            LaravelBladeComponentsServiceProvider::class,
            'zairakai-lang',
        );

        $this->assertNotEmpty($publishes);

        $sourcePath = realpath(array_key_first($publishes));
        $this->assertNotFalse($sourcePath);
        $this->assertDirectoryExists($sourcePath);
    }

    #[Test]
    public function it_publishes_views_via_zairakai_components_tag(): void
    {
        $publishes = LaravelBladeComponentsServiceProvider::pathsToPublish(
            LaravelBladeComponentsServiceProvider::class,
            'zairakai-components',
        );

        $this->assertNotEmpty($publishes);

        $sourcePath = realpath(array_key_first($publishes));
        $this->assertNotFalse($sourcePath);
        $this->assertDirectoryExists($sourcePath);
    }

    // ============================================================
    // Component registration — compilation smoke test
    // ============================================================

    #[Test]
    public function it_registers_content_components(): void
    {
        foreach (['zk-blockquote', 'zk-heading', 'zk-link', 'zk-list', 'zk-msr', 'zk-paragraph'] as $alias) {
            $compiled = Blade::compileString("<x-{$alias} />");
            $this->assertIsString($compiled, "Component {$alias} did not compile");
        }
    }

    #[Test]
    public function it_registers_form_components(): void
    {
        $aliases = [
            'zk-additional', 'zk-button', 'zk-checkbox', 'zk-color', 'zk-datalist',
            'zk-date', 'zk-datetime', 'zk-email', 'zk-field', 'zk-fieldset',
            'zk-file', 'zk-form', 'zk-hidden', 'zk-input', 'zk-label',
            'zk-month', 'zk-number', 'zk-password', 'zk-radio', 'zk-range',
            'zk-reset', 'zk-search', 'zk-select', 'zk-submit', 'zk-switch',
            'zk-tel', 'zk-textarea', 'zk-time', 'zk-url', 'zk-week',
        ];

        foreach ($aliases as $alias) {
            $compiled = Blade::compileString("<x-{$alias} />");
            $this->assertIsString($compiled, "Component {$alias} did not compile");
        }
    }

    #[Test]
    public function it_registers_internal_component_aliases(): void
    {
        $aliases = [
            'content.link', 'content.list', 'content.msr', 'content.paragraph',
            'form.additional', 'form.button', 'form.checkbox', 'form.field',
            'form.input', 'form.label',
            'layout.container',
            'medias.image', 'medias.source', 'medias.track',
        ];

        foreach ($aliases as $alias) {
            $compiled = Blade::compileString("<x-{$alias} />");
            $this->assertIsString($compiled, "Internal alias {$alias} did not compile");
        }
    }

    #[Test]
    public function it_registers_layout_components(): void
    {
        $aliases = [
            'zk-article', 'zk-aside', 'zk-breadcrumb', 'zk-column', 'zk-container',
            'zk-footer', 'zk-grid', 'zk-grid-item', 'zk-header', 'zk-main',
            'zk-nav', 'zk-pagination', 'zk-row', 'zk-section', 'zk-tabs',
            'zk-wrapper',
        ];

        foreach ($aliases as $alias) {
            $compiled = Blade::compileString("<x-{$alias} />");
            $this->assertIsString($compiled, "Component {$alias} did not compile");
        }
    }

    #[Test]
    public function it_registers_media_components(): void
    {
        $aliases = [
            'zk-audio', 'zk-canvas', 'zk-figcaption', 'zk-figure', 'zk-iframe',
            'zk-image', 'zk-object', 'zk-source', 'zk-track', 'zk-video',
        ];

        foreach ($aliases as $alias) {
            $compiled = Blade::compileString("<x-{$alias} />");
            $this->assertIsString($compiled, "Component {$alias} did not compile");
        }
    }

    #[Test]
    public function it_returns_fallback_when_name_is_null(): void
    {
        $this->assertSame('fallback', BladeHelpers::getOldValue(null, 'fallback'));
    }

    // ============================================================
    // BladeHelpers static class
    // ============================================================

    #[Test]
    public function it_returns_old_input_from_session(): void
    {
        $session = resolve('session.store');
        request()->setLaravelSession($session);
        $session->flashInput(['email' => 'old@example.com']);

        $this->assertSame('old@example.com', BladeHelpers::getOldValue('email', 'fallback@example.com'));
    }

    #[Test]
    public function it_validates_mime_types(): void
    {
        $this->assertTrue(BladeHelpers::isValidMimeType('image/png'));
        $this->assertFalse(BladeHelpers::isValidMimeType('not-a-mime'));
    }
}
