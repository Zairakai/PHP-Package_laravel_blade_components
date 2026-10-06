<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents\Tests\Unit;

use Illuminate\Support\Facades\Blade;
use PHPUnit\Framework\Attributes\Test;
use Zairakai\LaravelBladeComponents\Tests\TestCase;

final class OverlayComponentsTest extends TestCase
{
    #[Test]
    public function every_new_component_is_registered_and_published(): void
    {
        foreach (['display.card', 'feedback.alert', 'overlay.modal', 'content.callout'] as $view) {
            $this->assertTrue(view()->exists('zairakai::' . $view), $view);
        }
    }

    #[Test]
    public function the_code_kbd_and_callout_components_keep_their_hooks(): void
    {
        $code    = $this->render('<x-zk-code>echo 1;</x-zk-code>');
        $kbd     = $this->render('<x-zk-kbd>Esc</x-zk-kbd>');
        $combo   = $this->render('<x-zk-kbd :keys="[\'Ctrl\', \'K\']" separator="-" />');
        $callout = $this->render('<x-zk-callout variant="warning" title="Careful"><x-slot:icon>!</x-slot>Mind the gap</x-zk-callout>');
        $default = $this->render('<x-zk-callout>Body</x-zk-callout>');

        $this->assertStringContainsString('<code class="code">echo 1;</code>', $code);
        $this->assertStringContainsString('<kbd class="kbd">Esc</kbd>', $kbd);
        $this->assertStringContainsString('kbd kbd-combo', $combo);
        $this->assertStringContainsString('<kbd class="kbd-key">Ctrl</kbd>', $combo);
        $this->assertStringContainsString('aria-hidden="true">-</span>', $combo);
        $this->assertStringContainsString('role="note"', $callout);
        $this->assertStringContainsString('data-variant="warning"', $callout);
        $this->assertStringContainsString('Careful', $callout);
        $this->assertStringContainsString('callout-icon', $callout);
        $this->assertStringContainsString('Info', $default);
    }

    #[Test]
    public function the_drawer_is_a_dialog_on_a_side(): void
    {
        $html = $this->render('<x-zk-drawer id="menu" title="Menu" side="left"><x-slot:footer>Foot</x-slot>Links</x-zk-drawer>');
        $bare = $this->render('<x-zk-drawer id="plain">Links</x-zk-drawer>');

        $this->assertStringContainsString('class="drawer"', $html);
        $this->assertStringContainsString('data-side="left"', $html);
        $this->assertStringContainsString('aria-labelledby="menu-title"', $html);
        $this->assertStringContainsString('<footer class="drawer-footer">Foot</footer>', $html);
        $this->assertStringContainsString('data-side="right"', $bare);
        $this->assertStringNotContainsString('drawer-title', $bare);
    }

    #[Test]
    public function the_dropdown_lists_links_and_buttons(): void
    {
        $html = $this->render('<x-zk-dropdown id="user" label="Account"><x-slot:trigger>Account</x-slot><x-zk-dropdown-item href="/profile">Profile</x-zk-dropdown-item><x-zk-dropdown-item>Sign out</x-zk-dropdown-item><x-zk-dropdown-item href="/x" :disabled="true">Off</x-zk-dropdown-item></x-zk-dropdown>');

        $this->assertStringContainsString('popovertarget="user"', $html);
        $this->assertStringContainsString('class="dropdown dropdown-menu"', $html);
        $this->assertStringContainsString('data-placement="bottom-start"', $html);
        $this->assertStringContainsString('<a href="/profile" class="dropdown-item">Profile</a>', $html);
        $this->assertMatchesRegularExpression('/<button type="button"\s+class="dropdown-item">Sign out<\/button>/', $html);
        $this->assertMatchesRegularExpression('/<button type="button"\s+disabled/', $html);
        $this->assertStringNotContainsString('href="/x"', $html);
    }

    #[Test]
    public function the_modal_can_be_an_alert_dialog_without_title_or_footer(): void
    {
        $html = $this->render('<x-zk-modal id="gone" :alert="true" closedby="none">Deleted</x-zk-modal>');

        $this->assertStringContainsString('role="alertdialog"', $html);
        $this->assertStringContainsString('closedby="none"', $html);
        $this->assertStringNotContainsString('aria-labelledby', $html);
        $this->assertStringNotContainsString('modal-footer', $html);
    }

    #[Test]
    public function the_modal_is_a_native_dialog_named_by_its_title(): void
    {
        $html = $this->render('<x-zk-modal id="confirm" title="Sure?"><x-slot:footer>Actions</x-slot>Body</x-zk-modal>');

        $this->assertStringStartsWith('<dialog', $html);
        $this->assertStringContainsString('id="confirm"', $html);
        $this->assertStringContainsString('aria-labelledby="confirm-title"', $html);
        $this->assertStringContainsString('aria-describedby="confirm-body"', $html);
        $this->assertStringContainsString('closedby="any"', $html);
        $this->assertStringContainsString('<h2 id="confirm-title" class="modal-title">Sure?</h2>', $html);
        $this->assertStringContainsString('<form method="dialog">', $html);
        $this->assertStringContainsString('<div id="confirm-body" class="modal-body">Body</div>', $html);
        $this->assertStringContainsString('<footer class="modal-footer">Actions</footer>', $html);
        $this->assertStringNotContainsString('alertdialog', $html);
    }

    #[Test]
    public function the_popover_is_driven_by_the_native_attribute(): void
    {
        $html = $this->render('<x-zk-popover id="info" label="More" mode="manual"><x-slot:trigger>Info</x-slot>Details</x-zk-popover>');

        $this->assertStringContainsString('popovertarget="info"', $html);
        $this->assertStringContainsString('popover="manual"', $html);
        $this->assertStringContainsString('aria-label="More"', $html);
        $this->assertStringContainsString('data-placement="bottom"', $html);
        $this->assertStringContainsString('>Info</button>', $html);
        $this->assertStringContainsString('Details', $html);
    }

    #[Test]
    public function the_tooltip_follows_the_trigger_with_the_given_id(): void
    {
        $html = $this->render('<x-zk-tooltip id="tip" text="Copy" placement="bottom"><button aria-describedby="tip">Copy</button></x-zk-tooltip>');

        $this->assertStringContainsString('<button aria-describedby="tip">Copy</button>', $html);
        $this->assertStringContainsString('id="tip"', $html);
        $this->assertStringContainsString('role="tooltip"', $html);
        $this->assertStringContainsString('data-placement="bottom"', $html);
        $this->assertStringContainsString('>Copy</span>', $html);
    }

    /**
     * A closing slot tag must be followed by a line break, or Blade reads the next word as part of the directive.
     */
    private function render(string $template): string
    {
        return Blade::render(str_replace('</x-slot>', "</x-slot>\n", $template));
    }
}
