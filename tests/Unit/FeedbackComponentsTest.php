<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents\Tests\Unit;

use Illuminate\Support\Facades\Blade;
use PHPUnit\Framework\Attributes\Test;
use Zairakai\LaravelBladeComponents\Tests\TestCase;

final class FeedbackComponentsTest extends TestCase
{
    #[Test]
    public function the_alert_can_be_dismissed_and_hold_an_icon_and_actions(): void
    {
        $html = $this->render('<x-zk-alert :dismissible="true" close-label="Hide"><x-slot:icon>!</x-slot><x-slot:actions>Undo</x-slot>Done</x-zk-alert>');

        $this->assertStringContainsString('class="alert-close" aria-label="Hide"', $html);
        $this->assertStringContainsString('<span class="alert-icon">!</span>', $html);
        $this->assertStringContainsString('<div class="alert-actions">Undo</div>', $html);
    }

    #[Test]
    public function the_alert_is_a_status_and_becomes_an_alert_for_warnings_and_errors(): void
    {
        $info  = $this->render('<x-zk-alert title="Heads up">Saved</x-zk-alert>');
        $error = $this->render('<x-zk-alert variant="error">Failed</x-zk-alert>');

        $this->assertStringContainsString('role="status"', $info);
        $this->assertStringContainsString('data-variant="info"', $info);
        $this->assertStringContainsString('<p class="alert-title">Heads up</p>', $info);
        $this->assertStringContainsString('<div class="alert-content">Saved</div>', $info);
        $this->assertStringContainsString('role="alert"', $error);
        $this->assertStringNotContainsString('alert-close', $error);
    }

    #[Test]
    public function the_banner_shows_its_parts(): void
    {
        $html = $this->render('<x-zk-banner variant="warning" :dismissible="true" dismiss-label="Close"><x-slot:icon>!</x-slot><x-slot:actions>Read</x-slot>Maintenance</x-zk-banner>');

        $this->assertStringContainsString('role="alert"', $html);
        $this->assertStringContainsString('data-variant="warning"', $html);
        $this->assertStringContainsString('<div class="banner-content">Maintenance</div>', $html);
        $this->assertStringContainsString('banner-actions', $html);
        $this->assertStringContainsString('class="banner-dismiss" aria-label="Close"', $html);
    }

    #[Test]
    public function the_circular_progress_draws_the_share_with_the_aria_values(): void
    {
        $html          = $this->render('<x-zk-progress :circular="true" :value="30" :max="60" />');
        $indeterminate = $this->render('<x-zk-progress :circular="true" />');

        $this->assertStringContainsString('role="progressbar"', $html);
        $this->assertStringContainsString('aria-valuenow="30"', $html);
        $this->assertStringContainsString('aria-valuemax="60"', $html);
        $this->assertStringContainsString('stroke-dasharray="50 100"', $html);
        $this->assertStringNotContainsString('aria-valuenow', $indeterminate);
        $this->assertStringContainsString('stroke-dasharray="25 100"', $indeterminate);
    }

    #[Test]
    public function the_linear_progress_uses_the_native_element(): void
    {
        $html          = $this->render('<x-zk-progress :value="40" label="Upload" />');
        $indeterminate = $this->render('<x-zk-progress />');

        $this->assertStringContainsString('<progress', $html);
        $this->assertStringContainsString('value="40"', $html);
        $this->assertStringContainsString('max="100"', $html);
        $this->assertStringContainsString('aria-label="Upload"', $html);
        $this->assertStringContainsString('data-indeterminate', $indeterminate);
        $this->assertStringNotContainsString('value=', $indeterminate);
    }

    #[Test]
    public function the_skeleton_is_hidden_from_assistive_technology_and_can_repeat(): void
    {
        $one  = $this->render('<x-zk-skeleton width="10rem" height="1rem" />');
        $many = $this->render('<x-zk-skeleton :count="3" variant="circle" :animated="false" />');

        $this->assertStringContainsString('aria-hidden="true"', $one);
        $this->assertStringContainsString('style="width: 10rem; height: 1rem;"', $one);
        $this->assertStringContainsString('data-animated', $one);
        $this->assertStringContainsString('skeleton-group', $many);
        $this->assertSame(3, substr_count($many, 'data-variant="circle"'));
        $this->assertStringNotContainsString('data-animated', $many);
    }

    /**
     * A closing slot tag must be followed by a line break, or Blade reads the next word as part of the directive.
     */
    private function render(string $template): string
    {
        return Blade::render(str_replace('</x-slot>', "</x-slot>\n", $template));
    }
}
