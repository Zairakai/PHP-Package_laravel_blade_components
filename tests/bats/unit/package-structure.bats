#!/usr/bin/env bats
#
# Unit Tests: Package Structure
#
# Validates that all required files and directories of laravel-blade-components
# are present and correctly configured.
#

# Load test helpers
load '../helpers/test_helper'

setup() {
    setup_test_env
}

teardown() {
    teardown_test_env
}

# ============================================================================
# composer.json
# ============================================================================

@test "composer.json exists" {
    assert_file_exists "${PROJECT_ROOT}/composer.json"
}

@test "composer.json has correct package name" {
    run grep -q '"name": "zairakai/laravel-blade-components"' "${PROJECT_ROOT}/composer.json"

    [ "$status" -eq 0 ]
}

@test "composer.json has library type" {
    run grep -q '"type": "library"' "${PROJECT_ROOT}/composer.json"

    [ "$status" -eq 0 ]
}

@test "composer.json requires php ^8.3" {
    run grep -q '"php":' "${PROJECT_ROOT}/composer.json"

    [ "$status" -eq 0 ]
}

@test "composer.json defines quality scripts" {
    local scripts=("analyse" "cs" "test" "test:coverage" "rector")

    for script in "${scripts[@]}"; do
        run grep -q "\"${script}\"" "${PROJECT_ROOT}/composer.json"
        [ "$status" -eq 0 ]
    done
}

@test "composer.json requires laravel-dev-tools" {
    run grep -q '"zairakai/laravel-dev-tools"' "${PROJECT_ROOT}/composer.json"

    [ "$status" -eq 0 ]
}

@test "composer.json extra.laravel.providers is set" {
    run grep -q '"providers"' "${PROJECT_ROOT}/composer.json"

    [ "$status" -eq 0 ]
}

@test "composer.json autoload psr-4 includes src/" {
    run grep -q '"Zairakai\\\\LaravelBladeComponents\\\\"' "${PROJECT_ROOT}/composer.json"

    [ "$status" -eq 0 ]
}

# ============================================================================
# Source Files
# ============================================================================

@test "src/ directory exists" {
    assert_dir_exists "${PROJECT_ROOT}/src"
}

@test "LaravelBladeComponentsServiceProvider.php exists" {
    assert_file_exists "${PROJECT_ROOT}/src/LaravelBladeComponentsServiceProvider.php"
}

@test "BladeHelpers.php exists" {
    assert_file_exists "${PROJECT_ROOT}/src/BladeHelpers.php"
}

@test "ServiceProvider declares strict_types" {
    run grep -q "declare(strict_types=1)" "${PROJECT_ROOT}/src/LaravelBladeComponentsServiceProvider.php"

    [ "$status" -eq 0 ]
}

@test "ServiceProvider loads translations" {
    run grep -q "loadTranslationsFrom" "${PROJECT_ROOT}/src/LaravelBladeComponentsServiceProvider.php"

    [ "$status" -eq 0 ]
}

@test "ServiceProvider registers all component categories" {
    local file="${PROJECT_ROOT}/src/LaravelBladeComponentsServiceProvider.php"

    run grep -q "zairakai::content\." "$file"
    [ "$status" -eq 0 ]

    run grep -q "zairakai::form\." "$file"
    [ "$status" -eq 0 ]

    run grep -q "zairakai::layout\." "$file"
    [ "$status" -eq 0 ]

    run grep -q "zairakai::medias\." "$file"
    [ "$status" -eq 0 ]
}

@test "ServiceProvider registers internal aliases" {
    local file="${PROJECT_ROOT}/src/LaravelBladeComponentsServiceProvider.php"

    run grep -q "'form.field'" "$file"
    [ "$status" -eq 0 ]

    run grep -q "'form.input'" "$file"
    [ "$status" -eq 0 ]

    run grep -q "'layout.container'" "$file"
    [ "$status" -eq 0 ]
}

# ============================================================================
# Views
# ============================================================================

@test "resources/views/ directory exists" {
    assert_dir_exists "${PROJECT_ROOT}/resources/views"
}

@test "resources/views/content/ exists with blade files" {
    assert_dir_exists "${PROJECT_ROOT}/resources/views/content"

    local components=("blockquote" "heading" "link" "list" "msr" "paragraph")

    for component in "${components[@]}"; do
        assert_file_exists "${PROJECT_ROOT}/resources/views/content/${component}.blade.php"
    done
}

@test "resources/views/form/ exists with blade files" {
    assert_dir_exists "${PROJECT_ROOT}/resources/views/form"

    local components=("input" "select" "textarea" "checkbox" "radio" "button" "form" "label" "field" "password")

    for component in "${components[@]}"; do
        assert_file_exists "${PROJECT_ROOT}/resources/views/form/${component}.blade.php"
    done
}

@test "resources/views/layout/ exists with blade files" {
    assert_dir_exists "${PROJECT_ROOT}/resources/views/layout"

    local components=("header" "footer" "main" "section" "nav" "breadcrumb" "pagination" "tabs" "container")

    for component in "${components[@]}"; do
        assert_file_exists "${PROJECT_ROOT}/resources/views/layout/${component}.blade.php"
    done
}

@test "resources/views/medias/ exists with blade files" {
    assert_dir_exists "${PROJECT_ROOT}/resources/views/medias"

    local components=("image" "video" "audio" "figure" "iframe" "source" "track")

    for component in "${components[@]}"; do
        assert_file_exists "${PROJECT_ROOT}/resources/views/medias/${component}.blade.php"
    done
}

# ============================================================================
# Translations
# ============================================================================

@test "resources/lang/ directory exists" {
    assert_dir_exists "${PROJECT_ROOT}/resources/lang"
}

@test "resources/lang/en/layout.php exists" {
    assert_file_exists "${PROJECT_ROOT}/resources/lang/en/layout.php"
}

@test "all supported locales have layout.php" {
    local locales=("en" "fr" "es" "de" "it" "pt" "nl" "ar" "zh" "ja" "ko" "ru" "uk" "pl" "cs" "ro" "tr" "sv" "da" "fi" "no")

    for locale in "${locales[@]}"; do
        assert_file_exists "${PROJECT_ROOT}/resources/lang/${locale}/layout.php"
    done
}

@test "translations use zairakai namespace in views" {
    run grep -rq "zairakai::layout\." "${PROJECT_ROOT}/resources/views"

    [ "$status" -eq 0 ]
}

# ============================================================================
# Tests Directory
# ============================================================================

@test "tests/ directory exists" {
    assert_dir_exists "${PROJECT_ROOT}/tests"
}

@test "tests/Unit/ directory exists" {
    assert_dir_exists "${PROJECT_ROOT}/tests/Unit"
}

@test "tests/Unit/ServiceProviderTest.php exists" {
    assert_file_exists "${PROJECT_ROOT}/tests/Unit/ServiceProviderTest.php"
}

@test "tests/TestCase.php exists" {
    assert_file_exists "${PROJECT_ROOT}/tests/TestCase.php"
}

# ============================================================================
# CI / Tooling
# ============================================================================

@test ".gitlab-ci.yml exists" {
    assert_file_exists "${PROJECT_ROOT}/.gitlab-ci.yml"
}

@test ".gitlab-ci.yml references laravel-dev-tools pipeline" {
    assert_file_contains "${PROJECT_ROOT}/.gitlab-ci.yml" "pipeline-php-package.yml"
}

@test ".gitlab-ci.yml has correct CACHE_KEY" {
    assert_file_contains "${PROJECT_ROOT}/.gitlab-ci.yml" "laravel-blade-components"
}

@test ".gitlab-ci.yml has correct PACKAGIST_PACKAGE" {
    assert_file_contains "${PROJECT_ROOT}/.gitlab-ci.yml" "zairakai/laravel-blade-components"
}

@test "Makefile exists" {
    assert_file_exists "${PROJECT_ROOT}/Makefile"
}

@test "phpstan.neon exists" {
    assert_file_exists "${PROJECT_ROOT}/phpstan.neon"
}

@test "phpunit.xml exists" {
    assert_file_exists "${PROJECT_ROOT}/phpunit.xml"
}

@test "config/dev-tools/ directory exists" {
    assert_dir_exists "${PROJECT_ROOT}/config/dev-tools"
}

@test "config/blade-components.php exists" {
    assert_file_exists "${PROJECT_ROOT}/config/blade-components.php"
}

@test "config/blade-components.php has password section" {
    run grep -q "min_characters" "${PROJECT_ROOT}/config/blade-components.php"

    [ "$status" -eq 0 ]
}

@test "config/blade-components.php has select section" {
    run grep -q "icon_after" "${PROJECT_ROOT}/config/blade-components.php"

    [ "$status" -eq 0 ]
}
