<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents\Tests\Unit;

use Illuminate\Support\Facades\Blade;
use PHPUnit\Framework\Attributes\Test;
use Zairakai\LaravelBladeComponents\Tests\TestCase;

final class DisplayComponentsTest extends TestCase
{
    #[Test]
    public function the_accordion_items_use_details_with_a_shared_name_for_the_exclusive_mode(): void
    {
        $html = $this->render('<x-zk-accordion><x-zk-accordion-item title="One" name="faq" :open="true">A</x-zk-accordion-item><x-zk-accordion-item title="Two" name="faq" :disabled="true" :level="4">B</x-zk-accordion-item></x-zk-accordion>');

        $this->assertStringContainsString('class="accordion"', $html);
        $this->assertSame(2, substr_count($html, 'name="faq"'));
        $this->assertSame(1, substr_count($html, ' open'));
        $this->assertStringContainsString('<h3 class="accordion-header">One</h3>', $html);
        $this->assertStringContainsString('<h4 class="accordion-header">Two</h4>', $html);
        $this->assertStringContainsString('data-disabled', $html);
        $this->assertStringContainsString('aria-disabled="true"', $html);
        $this->assertStringContainsString('<div class="accordion-panel">A</div>', $html);
    }

    #[Test]
    public function the_avatar_shows_the_image_the_initials_or_the_slot(): void
    {
        $image    = $this->render('<x-zk-avatar src="/a.png" name="Ada Lovelace" />');
        $initials = $this->render('<x-zk-avatar name="ada lovelace byron" />');
        $slot     = $this->render('<x-zk-avatar alt="Guest">?</x-zk-avatar>');

        $this->assertStringContainsString('<img src="/a.png" alt="" loading="lazy">', $image);
        $this->assertStringContainsString('role="img"', $image);
        $this->assertStringContainsString('aria-label="Ada Lovelace"', $image);
        $this->assertStringContainsString('<span aria-hidden="true">AL</span>', $initials);
        $this->assertStringContainsString('aria-label="Guest"', $slot);
        $this->assertStringContainsString('?', $slot);
        $this->assertStringContainsString('data-shape="circle"', $slot);
    }

    #[Test]
    public function the_badge_exposes_its_variant_size_and_dot(): void
    {
        $html = $this->render('<x-zk-badge variant="success" size="small" :dot="true">New</x-zk-badge>');

        $this->assertStringContainsString('class="badge"', $html);
        $this->assertStringContainsString('data-variant="success"', $html);
        $this->assertStringContainsString('data-size="small"', $html);
        $this->assertStringContainsString('data-dot', $html);
        $this->assertStringContainsString('>New</span>', $html);
    }

    #[Test]
    public function the_card_has_its_class_hooks_and_the_optional_parts(): void
    {
        $html = $this->render('<x-zk-card title="Title" class="extra"><x-slot:footer>Foot</x-slot>Body</x-zk-card>');

        $this->assertStringContainsString('class="card extra"', $html);
        $this->assertStringContainsString('<header class="card-header">Title</header>', $html);
        $this->assertStringContainsString('<div class="card-body">Body</div>', $html);
        $this->assertStringContainsString('<footer class="card-footer">Foot</footer>', $html);
    }

    #[Test]
    public function the_card_leaves_out_the_header_and_the_footer_when_empty_and_can_be_another_element(): void
    {
        $html = $this->render('<x-zk-card as="article">Body</x-zk-card>');

        $this->assertStringStartsWith('<article', $html);
        $this->assertStringNotContainsString('card-header', $html);
        $this->assertStringNotContainsString('card-footer', $html);
    }

    #[Test]
    public function the_chip_shows_its_icon_state_and_remove_button(): void
    {
        $html  = $this->render('<x-zk-chip variant="info" :selected="true" :removable="true" remove-label="Delete"><x-slot:icon>i</x-slot>Tag</x-zk-chip>');
        $plain = $this->render('<x-zk-chip :disabled="true" :removable="true">Tag</x-zk-chip>');

        $this->assertStringContainsString('data-variant="info"', $html);
        $this->assertStringContainsString('data-selected', $html);
        $this->assertStringContainsString('<span class="chip-icon" aria-hidden="true">i</span>', $html);
        $this->assertStringContainsString('aria-label="Delete"', $html);
        $this->assertStringContainsString('data-disabled', $plain);
        $this->assertMatchesRegularExpression('/chip-remove" aria-label="Remove"\s+disabled/', $plain);
    }

    #[Test]
    public function the_divider_is_a_rule_unless_it_has_a_label_or_is_vertical(): void
    {
        $rule     = $this->render('<x-zk-divider />');
        $label    = $this->render('<x-zk-divider>or</x-zk-divider>');
        $vertical = $this->render('<x-zk-divider orientation="vertical" />');

        $this->assertStringStartsWith('<hr', $rule);
        $this->assertStringContainsString('role="separator"', $label);
        $this->assertStringContainsString('<span class="divider-label">or</span>', $label);
        $this->assertStringContainsString('aria-orientation="vertical"', $vertical);
        $this->assertStringContainsString('data-orientation="vertical"', $vertical);
    }

    #[Test]
    public function the_empty_state_shows_what_it_is_given(): void
    {
        $html = $this->render('<x-zk-empty-state title="Nothing yet" description="Add one."><x-slot:icon>o</x-slot><x-slot:actions><a href="/new">New</a></x-slot></x-zk-empty-state>');
        $bare = $this->render('<x-zk-empty-state />');

        $this->assertStringContainsString('<p class="empty-state-title">Nothing yet</p>', $html);
        $this->assertStringContainsString('<p class="empty-state-description">Add one.</p>', $html);
        $this->assertStringContainsString('empty-state-icon', $html);
        $this->assertStringContainsString('empty-state-actions', $html);
        $this->assertStringNotContainsString('empty-state-title', $bare);
        $this->assertStringNotContainsString('empty-state-description', $bare);
    }

    #[Test]
    public function the_stat_shows_the_direction_and_the_sentiment_of_a_change(): void
    {
        $up   = $this->render('<x-zk-stat label="Visits" value="1.2K" :change="12" />');
        $down = $this->render('<x-zk-stat label="Errors" :change="-3" sentiment="positive">42</x-zk-stat>');
        $none = $this->render('<x-zk-stat label="Users" value="9" />');

        $this->assertStringContainsString('<dt class="stat-label">Visits</dt>', $up);
        $this->assertStringContainsString('<dd class="stat-value">1.2K</dd>', $up);
        $this->assertStringContainsString('data-direction="up" data-sentiment="positive"', $up);
        $this->assertStringContainsString('+12%', $up);
        $this->assertStringContainsString('data-direction="down" data-sentiment="positive"', $down);
        $this->assertStringContainsString('<dd class="stat-value">42</dd>', $down);
        $this->assertStringNotContainsString('stat-change', $none);
    }

    /**
     * A closing slot tag must be followed by a line break, or Blade reads the next word as part of the directive.
     */
    private function render(string $template): string
    {
        return Blade::render(str_replace('</x-slot>', "</x-slot>\n", $template));
    }
}
