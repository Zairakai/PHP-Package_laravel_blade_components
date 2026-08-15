<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents\Tests\Unit;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;
use PHPUnit\Framework\Attributes\Test;
use Zairakai\LaravelBladeComponents\Tests\TestCase;

final class PasswordComponentTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // input.blade.php reads $errors->has($name) — normally auto-shared by
        // Laravel's ShareErrorsFromSession middleware on a real HTTP request,
        // which Blade::render() bypasses in tests.
        View::share('errors', new ViewErrorBag);
    }

    #[Test]
    public function it_omits_the_toggle_entirely_when_disabled(): void
    {
        $html = Blade::render('<x-zk-password name="password_confirmation" label="Confirm password" :showToggle="false" />');

        $this->assertStringNotContainsString('data-toggle-visibility', $html);
        $this->assertStringNotContainsString('icon-visibility', $html);
    }

    #[Test]
    public function it_renders_the_icon_sprite_exactly_once_even_with_multiple_fields(): void
    {
        $html = Blade::render(<<<'BLADE'
            <x-zk-password name="password" label="Password" />
            <x-zk-password name="password_confirmation" label="Confirm password" />
            BLADE);

        $this->assertSame(1, substr_count($html, 'id="icon-visibility"'));
        $this->assertSame(1, substr_count($html, 'id="icon-visibility-off"'));
    }

    #[Test]
    public function it_renders_the_toggle_button_inside_data_input_not_around_it(): void
    {
        $html = Blade::render('<x-zk-password name="password" label="Password" />');

        $inputPos  = strpos($html, 'data-input');
        $buttonPos = strpos($html, 'data-toggle-visibility');

        $this->assertNotFalse($inputPos);
        $this->assertNotFalse($buttonPos);
        $this->assertGreaterThan($inputPos, $buttonPos, 'Toggle button must be nested inside [data-input], not wrapped around it.');

        // The button must close before [data-input] does, so it stays scoped
        // to the input row and unaffected by a validation message rendered
        // afterward at the x-form.field level.
        $dataInputCloseTag = strpos($html, '</div>', $inputPos);
        $this->assertLessThan($dataInputCloseTag, $buttonPos);
    }

    #[Test]
    public function it_respects_named_slots_over_config_defaults(): void
    {
        $html = Blade::render(<<<'BLADE'
            <x-zk-password name="password" label="Password">
                <x-slot name="iconShow"><i class="fa-regular fa-eye"></i></x-slot>
                <x-slot name="iconHide"><i class="fa-regular fa-eye-slash"></i></x-slot>
            </x-zk-password>
            BLADE);

        $this->assertStringContainsString('fa-regular fa-eye', $html);
        $this->assertStringNotContainsString('<use href="#icon-visibility">', $html);
    }

    #[Test]
    public function it_uses_svg_icons_by_default_not_emoji(): void
    {
        $html = Blade::render('<x-zk-password name="password" label="Password" />');

        $this->assertStringNotContainsString('😳', $html);
        $this->assertStringNotContainsString('🫣', $html);
        $this->assertStringContainsString('<use href="#icon-visibility">', $html);
        $this->assertStringContainsString('<use href="#icon-visibility-off">', $html);
    }
}
