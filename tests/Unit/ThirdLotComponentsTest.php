<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents\Tests\Unit;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;
use PHPUnit\Framework\Attributes\Test;
use Zairakai\LaravelBladeComponents\Tests\TestCase;

final class ThirdLotComponentsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        View::share('errors', new ViewErrorBag);
    }

    #[Test]
    public function a_table_that_fits_one_page_has_no_pagination(): void
    {
        $columns = [['key' => 'n', 'label' => 'N']];
        $html    = $this->render('<x-zk-table :columns="$columns" :rows="[[\'n\' => 1]]" :per-page="10" />', ['columns' => $columns]);

        $this->assertStringContainsString('>1</td>', $html);
        $this->assertStringNotContainsString('data-table-pagination', $html);
    }

    #[Test]
    public function the_carousel_can_leave_out_the_controls_and_the_indicators(): void
    {
        $html   = $this->render('<x-zk-carousel :items="[\'A\', \'B\']" :controls="false" :indicators="false" slide-label="{n}/{total}" />');
        $single = $this->render('<x-zk-carousel :items="[\'Only\']" />');

        $this->assertStringNotContainsString('carousel-controls', $html);
        $this->assertStringNotContainsString('carousel-indicators', $html);
        $this->assertStringContainsString('aria-label="1/2"', $html);
        $this->assertStringContainsString('id="carousel-', $html);
        $this->assertStringNotContainsString('carousel-controls', $single);
    }

    #[Test]
    public function the_carousel_made_of_items_has_slides_indicators_and_hidden_controls(): void
    {
        $html    = $this->render('<x-zk-carousel id="photos" label="Photos" :items="[\'A\', \'B\', \'C\']" :autoplay="4000" :loop="false" />');
        $scripts = $this->render('<x-zk-scripts />');

        $this->assertStringContainsString('id="photos"', $html);
        $this->assertStringContainsString('data-zk-carousel', $html);
        $this->assertStringContainsString('data-autoplay="4000"', $html);
        $this->assertStringContainsString('data-loop="false"', $html);
        $this->assertStringContainsString('id="photos-slide-2"', $html);
        $this->assertStringContainsString('aria-label="2 of 3"', $html);
        $this->assertSame(3, substr_count($html, 'class="carousel-indicator"'));
        $this->assertStringContainsString('href="#photos-slide-3"', $html);
        $this->assertStringContainsString('data-zk-carousel-previous hidden', $html);
        $this->assertStringContainsString('data-zk-carousel-next hidden', $html);
        $this->assertStringContainsString('data-zk-carousel', $scripts);
    }

    #[Test]
    public function the_chip_group_and_the_list_item_are_plain_wrappers(): void
    {
        $group = $this->render('<x-zk-chip-group label="Tags"><x-zk-chip>A</x-zk-chip></x-zk-chip-group>');
        $link  = $this->render('<ul><x-zk-list-item title="Inbox" subtitle="3 new" href="/inbox"><x-slot:prepend>i</x-slot><x-slot:append>3</x-slot></x-zk-list-item></ul>');
        $off   = $this->render('<ul><x-zk-list-item title="Spam" href="/spam" :disabled="true" /></ul>');

        $this->assertStringContainsString('role="group"', $group);
        $this->assertStringContainsString('aria-label="Tags"', $group);
        $this->assertStringContainsString('<a href="/inbox" class="list-item-body">', $link);
        $this->assertStringContainsString('list-item-prepend', $link);
        $this->assertStringContainsString('list-item-append', $link);
        $this->assertStringContainsString('list-item-subtitle">3 new<', $link);
        $this->assertStringContainsString('data-disabled', $off);
        $this->assertStringNotContainsString('<a ', $off);
        $this->assertStringContainsString('aria-disabled="true"', $off);
    }

    #[Test]
    public function the_code_block_can_wrap_and_drop_the_copy_button(): void
    {
        $html = $this->render('<x-zk-code-block code="x" :copyable="false" :wrap="true" />');

        $this->assertStringContainsString('data-wrap', $html);
        $this->assertStringNotContainsString('code-block-copy', $html);
        $this->assertStringNotContainsString('code-block-header', $html);
    }

    #[Test]
    public function the_code_block_numbers_marks_and_copies_the_lines(): void
    {
        $html = $this->render('<x-zk-code-block id="snippet" language="php" title="index.php" :line-numbers="true" :highlight-lines="[2]" :code="$code" />', ['code' => "<?php\necho 1;"]);

        $this->assertStringContainsString('data-line-numbers', $html);
        $this->assertStringContainsString('code-block-title">index.php<', $html);
        $this->assertStringContainsString('code-block-language">php<', $html);
        $this->assertStringContainsString('<code id="snippet" class="language-php">', $html);
        $this->assertSame(2, substr_count($html, 'data-line="'));
        $this->assertStringContainsString('data-highlight data-line="2"', $html);
        $this->assertStringContainsString('&lt;?php', $html);
        $this->assertStringContainsString('data-zk-copy="#snippet"', $html);
        $this->assertStringContainsString('data-zk-copy', $this->render('<x-zk-scripts />'));
    }

    #[Test]
    public function the_code_group_is_a_set_of_radio_tabs_with_a_code_block_each(): void
    {
        $html   = $this->render('<x-zk-code-group id="install" :tabs="[[\'label\' => \'npm\', \'code\' => \'npm i x\'], [\'label\' => \'yarn\', \'code\' => \'yarn add x\', \'language\' => \'bash\']]" />');
        $styles = $this->render('<x-zk-styles />');

        $this->assertSame(2, substr_count($html, 'type="radio"'));
        $this->assertSame(1, substr_count($html, 'checked'));
        $this->assertStringContainsString('for="install-1"', $html);
        $this->assertStringContainsString('code-group-tab', $html);
        $this->assertSame(2, substr_count($html, '<figure'));
        $this->assertStringContainsString('.code-group-input:checked', $styles);
    }

    #[Test]
    public function the_components_are_also_registered_under_the_names_of_vue_components(): void
    {
        $this->assertStringContainsString('type="checkbox"', $this->render('<x-zk-toggle name="a" />'));

        foreach (['<x-zk-group>x</x-zk-group>' => '<fieldset', '<x-zk-dialog id="d" message="m" />' => '<dialog', '<x-zk-tree-view><x-zk-tree-node label="a" /></x-zk-tree-view>' => 'class="tree', '<x-zk-range-slider name="r" />' => 'type="range"', '<x-zk-color-picker name="c" />' => 'type="color"', '<x-zk-date-picker name="d" />' => 'type="date"', '<x-zk-time-picker name="t" />' => 'type="time"'] as $template => $expected) {
            $this->assertStringContainsString($expected, $this->render($template), $template);
        }
    }

    #[Test]
    public function the_confirm_dialog_asks_with_two_buttons_or_only_informs(): void
    {
        $ask   = $this->render('<x-zk-confirm-dialog id="del" title="Delete?" message="Gone for good." confirm-label="Delete" />');
        $alert = $this->render('<x-zk-confirm-dialog id="oops" :alert="true">Saved elsewhere.</x-zk-confirm-dialog>');

        $this->assertStringContainsString('role="alertdialog"', $ask);
        $this->assertStringContainsString('aria-labelledby="del-title"', $ask);
        $this->assertStringContainsString('closedby="closerequest"', $ask);
        $this->assertStringContainsString('value="cancel"', $ask);
        $this->assertStringContainsString('value="confirm" class="dialog-confirm" autofocus>Delete<', $ask);
        $this->assertStringContainsString('Gone for good.', $ask);
        $this->assertStringContainsString('closedby="none"', $alert);
        $this->assertStringNotContainsString('value="cancel"', $alert);
        $this->assertStringNotContainsString('aria-labelledby', $alert);
        $this->assertStringContainsString('Saved elsewhere.', $alert);
    }

    #[Test]
    public function the_cookie_banner_is_hidden_until_the_script_shows_it(): void
    {
        $categories = [['id' => 'essential', 'label' => 'Essential', 'required' => true], ['id' => 'stats', 'label' => 'Statistics', 'description' => 'Anonymous']];
        $html       = $this->render('<x-zk-cookie-banner storage-key="consent" :categories="$categories">We use cookies.</x-zk-cookie-banner>', ['categories' => $categories]);
        $bare       = $this->render('<x-zk-cookie-banner />');

        $this->assertMatchesRegularExpression('/role="dialog"[^>]*hidden/', $html);
        $this->assertStringContainsString('data-zk-consent', $html);
        $this->assertStringContainsString('data-storage-key="consent"', $html);
        $this->assertStringContainsString('data-category="essential" checked disabled', $html);
        $this->assertStringContainsString('<small>Anonymous</small>', $html);
        $this->assertStringContainsString('data-zk-consent-action="save"', $html);
        $this->assertStringContainsString('data-zk-consent-action="accept"', $html);
        $this->assertStringContainsString('data-zk-consent-action="reject"', $html);
        $this->assertStringNotContainsString('cookie-banner-details', $bare);
        $this->assertStringContainsString('data-zk-consent', $this->render('<x-zk-scripts />'));
    }

    #[Test]
    public function the_countdown_shows_the_time_left_and_ticks_with_the_script(): void
    {
        Date::setTestNow('2026-10-06 12:00:00');
        $html  = $this->render('<x-zk-countdown target="2026-10-07 13:02:03" />');
        $short = $this->render('<x-zk-countdown target="2026-10-06 12:00:09" :units="[\'seconds\' => \' s\']" />');
        Date::setTestNow();

        $this->assertStringContainsString('datetime="PT90123S"', $html);
        $this->assertStringContainsString('data-zk-countdown="2026-10-07T13:02:03', $html);
        $this->assertStringContainsString('data-unit="days" data-suffix="d">1d<', $html);
        $this->assertStringContainsString('data-unit="hours" data-suffix="h">01h<', $html);
        $this->assertStringContainsString('>02m<', $html);
        $this->assertStringContainsString('>03s<', $html);
        $this->assertStringNotContainsString('data-unit="days"', $short);
        $this->assertStringContainsString('>09 s<', $short);
        $this->assertStringContainsString('data-zk-countdown', $this->render('<x-zk-scripts />'));
    }

    #[Test]
    public function the_diff_reads_a_unified_diff_with_its_line_numbers(): void
    {
        $diff = "--- a/a.txt\n+++ b/a.txt\n@@ -1,2 +1,2 @@\n keep\n-old\n+new";
        $html = $this->render('<x-zk-diff title="a.txt" :diff="$diff" />', ['diff' => $diff]);

        $this->assertStringContainsString('diff-title">a.txt<', $html);
        $this->assertStringContainsString('data-type="meta"', $html);
        $this->assertStringContainsString('data-type="hunk"', $html);
        $this->assertStringContainsString('<ins class="diff-line" data-type="add">', $html);
        $this->assertStringContainsString('<del class="diff-line" data-type="remove">', $html);
        $this->assertStringContainsString('data-old="2" data-new=""', $html);
        $this->assertStringContainsString('data-old="" data-new="2"', $html);
        $this->assertStringContainsString('data-old="1" data-new="1"', $html);
        $this->assertStringNotContainsString('diff-number', $this->render('<x-zk-diff diff="+x" :line-numbers="false" />'));
    }

    #[Test]
    public function the_file_dropzone_wraps_a_real_file_input(): void
    {
        $html   = $this->render('<x-zk-file-dropzone name="docs" accept=".pdf" :multiple="true" :required="true" />');
        $single = $this->render('<x-zk-file-dropzone name="doc" :disabled="true" />');

        $this->assertStringContainsString('type="file"', $html);
        $this->assertStringContainsString('name="docs[]"', $html);
        $this->assertStringContainsString('accept=".pdf"', $html);
        $this->assertStringContainsString('multiple', $html);
        $this->assertStringContainsString('required', $html);
        $this->assertStringContainsString('name="doc"', $single);
        $this->assertStringContainsString('disabled', $single);
        $this->assertStringContainsString('file-dropzone-label">Drop files here or<', $html);
    }

    #[Test]
    public function the_json_viewer_nests_details_and_opens_the_first_levels(): void
    {
        $html = $this->render('<x-zk-json-viewer id="doc" :value="$value" :expanded="1" />', ['value' => ['name' => 'Ada', 'tags' => ['a', 'b'], 'ok' => true, 'none' => null, 'n' => 3]]);

        $this->assertStringContainsString('Object(5)', $html);
        $this->assertStringContainsString('Array(2)', $html);
        $this->assertStringContainsString('<span class="json-key">name</span>', $html);
        $this->assertStringContainsString('&quot;Ada&quot;', $html);
        $this->assertStringContainsString('data-type="boolean"', $html);
        $this->assertStringContainsString('data-type="null"', $html);
        $this->assertStringContainsString('data-type="number"', $html);
        $this->assertSame(1, substr_count($html, '<details open'));
        $this->assertStringContainsString('data-zk-copy="#doc-source"', $html);
    }

    #[Test]
    public function the_layout_helpers_are_plain_elements_with_their_hooks(): void
    {
        $this->assertStringContainsString('<div class="flex">A</div>', $this->render('<x-zk-flex>A</x-zk-flex>'));
        $this->assertStringContainsString('<div class="flex-item">B</div>', $this->render('<x-zk-flex-item>B</x-zk-flex-item>'));
        $this->assertStringContainsString('aria-hidden="true" class="spacer"', $this->render('<x-zk-spacer />'));
        $sticky = $this->render('<x-zk-sticky edge="bottom" as="nav">N</x-zk-sticky>');
        $this->assertStringStartsWith('<nav data-sticky data-edge="bottom"', $sticky);
    }

    #[Test]
    public function the_lazy_image_defers_loading_unless_it_is_eager(): void
    {
        $lazy  = $this->render('<x-zk-lazy-image src="/a.jpg" alt="A" srcset="/a2.jpg 2x" sizes="100vw" fit="contain" />');
        $eager = $this->render('<x-zk-lazy-image src="/a.jpg" :eager="true" />');

        $this->assertStringContainsString('loading="lazy"', $lazy);
        $this->assertStringContainsString('decoding="async"', $lazy);
        $this->assertStringContainsString('srcset="/a2.jpg 2x"', $lazy);
        $this->assertStringContainsString('data-fit="contain"', $lazy);
        $this->assertStringContainsString('loading="eager"', $eager);
        $this->assertStringContainsString('alt=""', $eager);
    }

    #[Test]
    public function the_lightbox_opens_one_dialog_per_image_from_its_thumbnail(): void
    {
        $items = [['src' => '/a.jpg', 'thumbnail' => '/a-s.jpg', 'alt' => 'First', 'caption' => 'Dawn'], ['src' => '/b.jpg']];
        $html  = $this->render('<x-zk-lightbox id="gallery" :items="$items" />', ['items' => $items]);
        $none  = $this->render('<x-zk-lightbox id="g2" :items="$items" :thumbnails="false" />', ['items' => $items]);

        $this->assertStringContainsString('commandfor="gallery-1" command="show-modal" data-zk-modal="gallery-1"', $html);
        $this->assertStringContainsString('aria-label="View First"', $html);
        $this->assertStringContainsString('src="/a-s.jpg"', $html);
        $this->assertSame(2, substr_count($html, '<dialog'));
        $this->assertStringContainsString('<figcaption>Dawn</figcaption>', $html);
        $this->assertStringContainsString('aria-label="Image 2"', $html);
        $this->assertStringNotContainsString('lightbox-thumbnails', $none);
        $this->assertStringContainsString('data-zk-modal', $this->render('<x-zk-scripts />'));
    }

    #[Test]
    public function the_loader_is_a_status_while_loading_and_the_content_after(): void
    {
        $loading = $this->render('<x-zk-loader status="Loading">Content</x-zk-loader>');
        $done    = $this->render('<x-zk-loader :loading="false">Content</x-zk-loader>');

        $this->assertStringContainsString('role="status"', $loading);
        $this->assertStringContainsString('aria-busy="true"', $loading);
        $this->assertStringContainsString('loader-text">Loading<', $loading);
        $this->assertStringNotContainsString('Content', $loading);
        $this->assertStringContainsString('Content', $done);
        $this->assertStringNotContainsString('role="status"', $done);
    }

    #[Test]
    public function the_markdown_component_strips_html_and_unsafe_links_by_default(): void
    {
        $html    = $this->render('<x-zk-markdown :text="$text" />', ['text' => "# Title\n\n**bold** <script>alert(1)</script> [x](javascript:alert(1))"]);
        $allowed = $this->render('<x-zk-markdown :text="$text" :allow-html="true" />', ['text' => '<b>raw</b>']);

        $this->assertStringContainsString('<h1>Title</h1>', $html);
        $this->assertStringContainsString('<strong>bold</strong>', $html);
        $this->assertStringNotContainsString('<script', $html);
        $this->assertStringNotContainsString('javascript:', $html);
        $this->assertStringContainsString('<b>raw</b>', $allowed);
    }

    #[Test]
    public function the_multi_select_is_a_select_with_several_choices(): void
    {
        $html = $this->render('<x-zk-multi-select name="roles" :options="[\'a\' => \'A\', \'b\' => \'B\']" />');

        $this->assertStringContainsString('multiple', $html);
        $this->assertStringContainsString('name="roles[]"', $html);
        $this->assertMatchesRegularExpression('/>\\s*B\\s*<\\/option>/', $html);
    }

    #[Test]
    public function the_share_button_and_the_theme_switcher_carry_their_settings_in_data_attributes(): void
    {
        $share   = $this->render('<x-zk-share-button title="T" text="X" url="https://e.org" copied-label="Done" />');
        $theme   = $this->render('<x-zk-theme-switcher :modes="[\'light\', \'dark\']" storage-key="th" attribute="data-mode" default="light" />');
        $scripts = $this->render('<x-zk-scripts />');

        $this->assertStringContainsString('data-zk-share', $share);
        $this->assertStringContainsString('data-title="T"', $share);
        $this->assertStringContainsString('data-url="https://e.org"', $share);
        $this->assertStringContainsString('data-copied-label="Done"', $share);
        $this->assertStringContainsString('role="status"', $share);
        $this->assertStringContainsString('data-zk-theme-switcher', $theme);
        $this->assertStringContainsString('data-storage-key="th"', $theme);
        $this->assertStringContainsString('data-attribute="data-mode"', $theme);
        $this->assertSame(2, substr_count($theme, 'data-mode="'));
        $this->assertStringContainsString('>Light</button>', $theme);
        $this->assertStringContainsString('data-zk-share', $scripts);
        $this->assertStringContainsString('data-zk-theme-switcher', $scripts);
    }

    #[Test]
    public function the_table_cuts_a_list_in_pages_and_shows_the_pagination(): void
    {
        $this->get('/?page=2');
        $columns = [['key' => 'n', 'label' => 'N']];
        $rows    = array_map(static fn (int $n): array => ['n' => $n], range(1, 25));
        $html    = $this->render('<x-zk-table :columns="$columns" :rows="$rows" :per-page="10" />', ['columns' => $columns, 'rows' => $rows]);

        $this->assertStringContainsString('>11</td>', $html);
        $this->assertStringContainsString('>20</td>', $html);
        $this->assertStringNotContainsString('>10</td>', $html);
        $this->assertStringNotContainsString('>21</td>', $html);
        $this->assertStringContainsString('data-table-pagination', $html);
        $this->assertStringContainsString('aria-current="page"', $html);
        $this->assertStringContainsString('page=3', $html);
        $this->assertStringContainsString('aria-label="Pagination"', $html);
    }

    #[Test]
    public function the_table_has_an_empty_row_and_sorts_down_on_request(): void
    {
        $columns = [['key' => 'name', 'label' => 'Name', 'sortable' => true]];
        $empty   = $this->render('<x-zk-table :columns="$columns" :rows="[]" empty-text="Nobody" sort="name" direction="desc" />', ['columns' => $columns]);

        $this->assertStringContainsString('data-table-empty', $empty);
        $this->assertStringContainsString('>Nobody</td>', $empty);
        $this->assertStringContainsString('colspan="1"', $empty);
        $this->assertStringContainsString('aria-sort="descending"', $empty);
        $this->assertStringContainsString('dir=asc', $empty);
    }

    #[Test]
    public function the_table_shows_columns_rows_and_sort_links(): void
    {
        $this->get('/?sort=name&dir=asc');
        $columns = [['key' => 'name', 'label' => 'Name', 'sortable' => true], ['key' => 'city', 'label' => 'City', 'align' => 'end']];
        $rows    = [['name' => 'Ada', 'city' => 'London'], (object) ['name' => 'Alan', 'city' => 'Wilmslow']];
        $html    = $this->render('<x-zk-table caption="People" :columns="$columns" :rows="$rows" />', ['columns' => $columns, 'rows' => $rows]);

        $this->assertStringContainsString('<caption>People</caption>', $html);
        $this->assertStringContainsString('aria-sort="ascending"', $html);
        $this->assertStringContainsString('sort=name', $html);
        $this->assertStringContainsString('dir=desc', $html);
        $this->assertStringContainsString('data-align="end"', $html);
        $this->assertStringContainsString('>London</td>', $html);
        $this->assertStringContainsString('>Wilmslow</td>', $html);
        $this->assertSame(1, substr_count($html, 'class="data-table-sort"'));
    }

    #[Test]
    public function the_table_takes_the_page_of_a_laravel_paginator(): void
    {
        $columns              = [['key' => 'n', 'label' => 'N']];
        $lengthAwarePaginator = new LengthAwarePaginator([['n' => 31], ['n' => 32]], 40, 2, 2, ['path' => '/list']);
        $paginator            = new Paginator([['n' => 1]], 1, 1);
        $html                 = $this->render('<x-zk-table :columns="$columns" :rows="$lengthAwarePaginator" />', ['columns' => $columns, 'lengthAwarePaginator' => $lengthAwarePaginator]);
        $last                 = $this->render('<x-zk-table :columns="$columns" :rows="$paginator" />', ['columns' => $columns, 'paginator' => $paginator]);

        $this->assertStringContainsString('>31</td>', $html);
        $this->assertStringContainsString('>32</td>', $html);
        $this->assertStringContainsString('page=20', $html);
        $this->assertStringNotContainsString('page=21', $html);
        $this->assertStringNotContainsString('data-table-pagination', $last);
    }

    #[Test]
    public function the_terminal_shows_prompts_for_commands_only_and_copies_the_commands(): void
    {
        $html = $this->render('<x-zk-terminal id="shell" title="Install" :lines="[\'composer install\', [\'type\' => \'output\', \'text\' => \'Done\']]" prompt=">" />');

        $this->assertStringContainsString('data-type="command"', $html);
        $this->assertStringContainsString('data-type="output"', $html);
        $this->assertSame(1, substr_count($html, 'terminal-prompt'));
        $this->assertStringContainsString('aria-hidden="true">&gt; </span>composer install', $html);
        $this->assertStringContainsString('data-zk-copy="#shell-commands"', $html);
        $this->assertStringContainsString('id="shell-commands" hidden>composer install<', $html);
    }

    /**
     * A closing slot tag must be followed by a line break, or Blade reads the next word as part of the directive.
     * The white space is collapsed: the conditional attributes leave spaces that do not matter.
     *
     * @param array<string, mixed> $data
     */
    private function render(string $template, array $data = []): string
    {
        $html = Blade::render(str_replace('</x-slot>', "</x-slot>\n", $template), $data);

        return str_replace(' >', '>', (string) preg_replace('/\s+/', ' ', $html));
    }
}
