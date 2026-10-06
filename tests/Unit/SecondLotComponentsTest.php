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
    public function the_copy_button_and_the_script_work_with_a_csp_nonce(): void
    {
        $text   = $this->render('<x-zk-copy-button text="npm i x" />');
        $target = $this->render('<x-zk-copy-button target="#cmd" label="Copy command" />');
        $custom = $this->render('<x-zk-copy-button text="x">Duplicate</x-zk-copy-button>');
        $script = $this->render('<x-zk-scripts nonce="abc123" />');
        $plain  = $this->render('<x-zk-scripts />');

        $this->assertStringContainsString('data-zk-copy="npm i x"', $text);
        $this->assertStringContainsString('>Copy</button>', $text);
        $this->assertStringContainsString('data-zk-copy="#cmd"', $target);
        $this->assertStringContainsString('>Copy command</button>', $target);
        $this->assertStringContainsString('>Duplicate</button>', $custom);
        $this->assertStringContainsString('<script nonce="abc123">', $script);
        $this->assertStringContainsString('data-zk-dismiss', $script);
        $this->assertStringContainsString('data-zk-copy', $script);
        $this->assertStringContainsString('data-zk-modal', $script);
        $this->assertStringNotContainsString('nonce', $plain);
    }

    #[Test]
    public function the_description_list_takes_pairs_or_its_own_content(): void
    {
        $html = $this->render('<x-zk-description-list :items="[\'Name\' => \'Ada\', \'Role\' => \'Engineer\']" />');

        $this->assertStringStartsWith('<dl class="description-list"', $html);
        $this->assertStringContainsString('<dt>Name</dt>', $html);
        $this->assertStringContainsString('<dd>Engineer</dd>', $html);
        $this->assertSame(2, substr_count($html, 'description-list-item'));
    }

    #[Test]
    public function the_dismissible_alert_and_banner_use_a_data_attribute_not_an_inline_handler(): void
    {
        $alert  = $this->render('<x-zk-alert :dismissible="true">A</x-zk-alert>');
        $banner = $this->render('<x-zk-banner :dismissible="true">B</x-zk-banner>');

        $this->assertStringContainsString('data-zk-dismiss=".alert"', $alert);
        $this->assertStringContainsString('data-zk-dismiss=".banner"', $banner);
        $this->assertStringNotContainsString('onclick', $alert . $banner);
    }

    #[Test]
    public function the_meter_uses_the_native_element_with_its_thresholds(): void
    {
        $html = $this->render('<x-zk-meter :value="60" :low="30" :high="80" :optimum="100" label="Disk" />');
        $bare = $this->render('<x-zk-meter :value="5" :max="10" />');

        $this->assertStringContainsString('<meter', $html);
        $this->assertStringContainsString('low="30"', $html);
        $this->assertStringContainsString('high="80"', $html);
        $this->assertStringContainsString('optimum="100"', $html);
        $this->assertStringContainsString('aria-label="Disk"', $html);
        $this->assertStringNotContainsString('low=', $bare);
        $this->assertStringContainsString('max="10"', $bare);
    }

    #[Test]
    public function the_navigation_helpers_are_plain_links_and_landmarks(): void
    {
        $skip   = $this->render('<x-zk-skip-link />');
        $top    = $this->render('<x-zk-back-to-top />');
        $bar    = $this->render("<x-zk-app-bar :sticky=\"true\">\n<x-slot:start>\nLogo\n</x-slot>\nTitle\n<x-slot:end>\nMenu\n</x-slot>\n</x-zk-app-bar>");
        $bottom = $this->render("<x-zk-bottom-navigation label=\"Tabs\">\n<x-zk-bottom-navigation-item href=\"/home\" label=\"Home\" :active=\"true\"><x-slot:icon>H</x-slot>\n</x-zk-bottom-navigation-item>\n<x-zk-bottom-navigation-item href=\"/me\">Me</x-zk-bottom-navigation-item>\n</x-zk-bottom-navigation>");

        $this->assertStringContainsString('<a href="#main" class="skip-link">Skip to the content</a>', $skip);
        $this->assertStringContainsString('href="#top"', $top);
        $this->assertStringContainsString('aria-label="Back to top"', $top);
        $this->assertStringStartsWith('<header', $bar);
        $this->assertStringContainsString('data-sticky', $bar);
        $this->assertStringContainsString('app-bar-start', $bar);
        $this->assertStringContainsString('app-bar-end', $bar);
        $this->assertStringContainsString('aria-label="Tabs"', $bottom);
        $this->assertSame(1, substr_count($bottom, 'aria-current="page"'));
        $this->assertStringContainsString('bottom-navigation-icon', $bottom);
    }

    #[Test]
    public function the_otp_input_asks_the_browser_for_the_code(): void
    {
        $html = $this->render('<x-zk-otp name="token" :length="4" />');
        $text = $this->render('<x-zk-otp :numeric="false" />');

        $this->assertStringContainsString('autocomplete="one-time-code"', $html);
        $this->assertStringContainsString('inputmode="numeric"', $html);
        $this->assertStringContainsString('maxlength="4"', $html);
        $this->assertStringContainsString('pattern="[0-9]{4}"', $html);
        $this->assertStringContainsString('inputmode="text"', $text);
        $this->assertStringNotContainsString('pattern=', $text);
    }

    #[Test]
    public function the_rating_draws_full_half_and_empty_stars_with_an_accessible_name(): void
    {
        $html = $this->render('<x-zk-rating :value="3.5" />');

        $this->assertStringContainsString('role="img"', $html);
        $this->assertStringContainsString('aria-label="3.5 / 5"', $html);
        $this->assertSame(3, substr_count($html, 'data-state="full"'));
        $this->assertSame(1, substr_count($html, 'data-state="half"'));
        $this->assertSame(1, substr_count($html, 'data-state="empty"'));
        $this->assertStringContainsString('aria-label="Good"', $this->render('<x-zk-rating :value="4" label="Good" :max="4" />'));
    }

    #[Test]
    public function the_rating_input_is_a_radio_group_that_remembers_the_value(): void
    {
        $html = $this->render('<x-zk-rating-input name="stars" legend="Your rating" :value="4" />');

        $this->assertStringContainsString('<legend>Your rating</legend>', $html);
        $this->assertSame(5, substr_count($html, 'type="radio"'));
        $this->assertSame(1, substr_count($html, 'checked'));
        $this->assertMatchesRegularExpression('/value="4"\s+checked/', $html);
    }

    #[Test]
    public function the_stepper_marks_the_state_of_each_step(): void
    {
        $html = $this->render('<x-zk-stepper label="Checkout" :current="2" :steps="[\'Cart\', [\'label\' => \'Address\', \'description\' => \'Where to\'], \'Payment\']" />');

        $this->assertStringContainsString('aria-label="Checkout"', $html);
        $this->assertStringContainsString('data-state="complete"', $html);
        $this->assertStringContainsString('data-state="current"', $html);
        $this->assertStringContainsString('data-state="upcoming"', $html);
        $this->assertSame(1, substr_count($html, 'aria-current="step"'));
        $this->assertStringContainsString('<span class="step-description">Where to</span>', $html);
        $this->assertStringContainsString('<span class="step-label">Cart</span>', $html);
    }

    #[Test]
    public function the_timeline_is_an_ordered_list_of_dated_items(): void
    {
        $html = $this->render('<x-zk-timeline><x-zk-timeline-item title="Shipped" time="Oct 6" datetime="2026-10-06" variant="success">Left the depot</x-zk-timeline-item><x-zk-timeline-item>Bare</x-zk-timeline-item></x-zk-timeline>');

        $this->assertStringStartsWith('<ol class="timeline"', $html);
        $this->assertStringContainsString('data-variant="success"', $html);
        $this->assertStringContainsString('<time class="timeline-time" datetime="2026-10-06">Oct 6</time>', $html);
        $this->assertStringContainsString('<p class="timeline-title">Shipped</p>', $html);
        $this->assertSame(1, substr_count($html, '<time'));
        $this->assertSame(2, substr_count($html, 'timeline-marker'));
    }

    #[Test]
    public function the_toast_is_a_status_in_a_live_region_that_can_be_dismissed_with_a_data_attribute(): void
    {
        $container = $this->render('<x-zk-toast-container placement="top-end"><x-zk-toast variant="error">Failed</x-zk-toast><x-zk-toast :dismissible="false">Saved</x-zk-toast></x-zk-toast-container>');

        $this->assertStringContainsString('role="region"', $container);
        $this->assertStringContainsString('aria-live="polite"', $container);
        $this->assertStringContainsString('data-placement="top-end"', $container);
        $this->assertStringContainsString('role="alert"', $container);
        $this->assertStringContainsString('role="status"', $container);
        $this->assertSame(1, substr_count($container, 'data-zk-dismiss=".toast"'));
        $this->assertStringNotContainsString('onclick', $container);
    }

    #[Test]
    public function the_tree_nests_with_details_and_keeps_leaves_plain(): void
    {
        $html = $this->render('<x-zk-tree label="Files"><x-zk-tree-item label="src" :open="true"><x-zk-tree-item label="index.php" /></x-zk-tree-item></x-zk-tree>');

        $this->assertStringContainsString('aria-label="Files"', $html);
        $this->assertStringContainsString('<details open>', $html);
        $this->assertStringContainsString('<summary class="tree-label">src</summary>', $html);
        $this->assertStringContainsString('<span class="tree-label">index.php</span>', $html);
        $this->assertStringContainsString('<ul class="tree-group">', $html);
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
