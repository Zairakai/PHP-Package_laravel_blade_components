<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents;

use InvalidArgumentException;

/**
 * Remembers which scripts and styles the rendered components need, so that a page only loads those.
 *
 * A component asks for what it needs while it renders (`script('dismiss')`); `zk-scripts` and `zk-styles`, put
 * after the content in the layout, print what was asked for.
 */
final class AssetRegistry
{
    /**
     * @var list<string>
     */
    public const array SCRIPTS = ['dismiss', 'copy', 'modal', 'carousel', 'countdown', 'share', 'theme', 'consent'];

    /**
     * @var list<string>
     */
    public const array STYLES = ['carousel', 'code-group'];

    /**
     * @var array<string, true>
     */
    private array $scripts = [];

    /**
     * @var array<string, true>
     */
    private array $styles = [];

    public function script(string ...$names): void
    {
        foreach ($names as $name) {
            $this->scripts[$this->known($name, self::SCRIPTS, 'script')] = true;
        }
    }

    /**
     * The code of the scripts that were asked for, plus the given ones ("all" for every one of them).
     *
     * @param list<string> $also
     */
    public function scripts(array $also = []): string
    {
        return $this->read('js', self::SCRIPTS, $this->scripts, $also);
    }

    public function style(string ...$names): void
    {
        foreach ($names as $name) {
            $this->styles[$this->known($name, self::STYLES, 'style')] = true;
        }
    }

    /**
     * @param list<string> $also
     */
    public function styles(array $also = []): string
    {
        return $this->read('css', self::STYLES, $this->styles, $also);
    }

    private function file(string $directory, string $name): string
    {
        return __DIR__ . '/../resources/' . $directory . '/' . $name . '.' . $directory;
    }

    /**
     * @param list<string> $known
     */
    private function known(string $name, array $known, string $kind): string
    {
        if (! in_array($name, $known, true)) {
            $message = sprintf('"%s" is not a %s of the library: use %s.', $name, $kind, implode(', ', $known));

            throw new InvalidArgumentException($message);
        }

        return $name;
    }

    /**
     * @param list<string>        $all
     * @param array<string, true> $needed
     * @param list<string>        $also
     */
    private function read(string $directory, array $all, array $needed, array $also): string
    {
        $names = in_array('all', $also, true) ? $all : [...array_keys($needed), ...$also];
        $names = array_values(array_unique($names));

        foreach ($names as $name) {
            $this->known($name, $all, $directory);
        }

        $position = static fn (string $name): int|false => array_search($name, $all, true);

        usort($names, static fn (string $a, string $b): int => $position($a) <=> $position($b));

        $code = [];

        foreach ($names as $name) {
            $code[] = trim((string) file_get_contents($this->file($directory, $name)));
        }

        return implode("\n", $code);
    }
}
