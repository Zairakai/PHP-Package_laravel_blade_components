<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents\Tests\Unit;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;
use PHPUnit\Framework\Attributes\Test;
use Zairakai\LaravelBladeComponents\Tests\TestCase;

final class SecondLotComponentsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        View::share('errors', new ViewErrorBag);
    }

    #[Test]
    public function the_carousel_is_a_labelled_region_of_slides(): void
    {
        $html = $this->render('<x-zk-carousel label="Photos"><x-zk-carousel-slide label="1 of 2">A</x-zk-carousel-slide><x-zk-carousel-slide>B</x-zk-carousel-slide></x-zk-carousel>');

        $this->assertStringContainsString('role="region"', $html);
        $this->assertStringContainsString('aria-roledescription="carousel"', $html);
        $this->assertStringContainsString('aria-label="Photos"', $html);
        $this->assertStringContainsString('tabindex="0"', $html);
        $this->assertSame(2, substr_count($html, 'aria-roledescription="slide"'));
        $this->assertSame(1, substr_count($html, 'aria-label="1 of 2"'));
    }

    #[Test]
    public function the_copy_button_has_its_data_attributes_and_asks_for_the_copy_script(): void
    {
        $text   = $this->render('<x-zk-copy-button text="npm i x" />');
        $target = $this->render('<x-zk-copy-button target="#cmd" label="Copy command" />');
        $custom = $this->render('<x-zk-copy-button text="x">Duplicate</x-zk-copy-button>');
        $script = $this->render('<x-zk-scripts nonce="abc123" />');

        $this->assertStringContainsString('data-zk-copy="npm i x"', $text);
        $this->assertStringContainsString('>Copy</button>', $text);
        $this->assertStringContainsString('data-zk-copy="#cmd"', $target);
        $this->assertStringContainsString('>Copy command</button>', $target);
        $this->assertStringContainsString('>Duplicate</button>', $custom);
        $this->assertStringContainsString('<script nonce="abc123">', $script);
        $this->assertStringContainsString('data-zk-copy', $script);
        $this->assertStringNotContainsString('data-zk-dismiss', $script);
    }

    /**
     * A closing slot tag must be followed by a line break, or Blade reads the next word as part of the directive.
     * The white space is collapsed: the conditional attributes leave spaces that do not matter.
     */
    private function render(string $template): string
    {
        $html = Blade::render(str_replace('</x-slot>', "</x-slot>\n", $template));

        return str_replace(' >', '>', (string) preg_replace('/\s+/', ' ', $html));
    }
}
