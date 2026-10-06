<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents\Tests\Unit;

use Illuminate\Support\Facades\Blade;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use Zairakai\LaravelBladeComponents\AssetRegistry;
use Zairakai\LaravelBladeComponents\Tests\TestCase;

final class AssetRegistryTest extends TestCase
{
    #[Test]
    public function a_style_that_does_not_exist_is_refused_too(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('"nope" is not a style of the library');

        (new AssetRegistry())->style('nope');
    }

    #[Test]
    public function it_can_add_scripts_by_hand_or_all_of_them(): void
    {
        $assetRegistry = new AssetRegistry();

        $this->assertStringContainsString('data-zk-share', $assetRegistry->scripts(['share']));
        $this->assertStringNotContainsString('data-zk-copy', $assetRegistry->scripts(['share']));

        $all = $assetRegistry->scripts(['all']);

        foreach (['dismiss', 'copy', 'modal', 'carousel', 'countdown', 'share', 'theme', 'consent'] as $name) {
            $this->assertNotSame('', trim((string) file_get_contents(__DIR__ . '/../../resources/js/' . $name . '.js')), $name);
        }

        $this->assertStringContainsString('data-zk-consent', $all);
        $this->assertStringContainsString('data-zk-theme-switcher', $all);
        $this->assertStringContainsString('.code-group-tab', $assetRegistry->styles(['all']));
    }

    #[Test]
    public function it_prints_nothing_when_no_component_asked_for_a_script_or_a_style(): void
    {
        $assetRegistry = new AssetRegistry();

        $this->assertSame('', $assetRegistry->scripts());
        $this->assertSame('', $assetRegistry->styles());
    }

    #[Test]
    public function it_prints_only_what_was_asked_for_once_and_in_the_order_of_the_library(): void
    {
        $assetRegistry = new AssetRegistry();
        $assetRegistry->script('copy', 'dismiss', 'copy');
        $assetRegistry->style('carousel');

        $scripts = $assetRegistry->scripts();

        $this->assertStringContainsString('data-zk-dismiss', $scripts);
        $this->assertSame(1, substr_count($scripts, "closest('[data-zk-copy]')"));
        $this->assertLessThan(strpos($scripts, 'data-zk-copy'), strpos($scripts, 'data-zk-dismiss'));
        $this->assertStringNotContainsString('data-zk-share', $scripts);
        $this->assertStringContainsString('.carousel-track', $assetRegistry->styles());
        $this->assertStringNotContainsString('.code-group', $assetRegistry->styles());
    }

    #[Test]
    public function it_refuses_a_name_that_is_not_in_the_library(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('"nope" is not a script of the library');

        (new AssetRegistry())->script('nope');
    }

    #[Test]
    public function the_scripts_and_styles_components_accept_a_list_of_features_by_hand(): void
    {
        $scripts = Blade::render('<x-zk-scripts features="share, theme" />');
        $styles  = Blade::render('<x-zk-styles :features="[\'code-group\']" nonce="s1" />');

        $this->assertStringContainsString('data-zk-share', $scripts);
        $this->assertStringContainsString('data-zk-theme-switcher', $scripts);
        $this->assertStringNotContainsString('data-zk-copy', $scripts);
        $this->assertStringContainsString('<style nonce="s1">', str_replace(' >', '>', (string) preg_replace('/\s+/', ' ', $styles)));
        $this->assertStringContainsString('.code-group-panel', $styles);
    }

    #[Test]
    public function the_scripts_component_prints_nothing_for_a_page_without_scripts(): void
    {
        $html = Blade::render('<x-zk-badge>New</x-zk-badge><x-zk-scripts /><x-zk-styles />');

        $this->assertStringNotContainsString('<script', $html);
        $this->assertStringNotContainsString('<style', $html);
    }

    #[Test]
    public function the_scripts_component_prints_only_the_scripts_of_the_components_rendered_before_it(): void
    {
        $html = Blade::render('<x-zk-alert :dismissible="true">A</x-zk-alert><x-zk-scripts nonce="n1" />');

        $this->assertStringContainsString('<script nonce="n1">', str_replace(' >', '>', (string) preg_replace('/\s+/', ' ', $html)));
        $this->assertStringContainsString('data-zk-dismiss', $html);
        $this->assertStringNotContainsString('data-zk-copy', $html);
        $this->assertStringNotContainsString('data-zk-modal', $html);
    }
}
