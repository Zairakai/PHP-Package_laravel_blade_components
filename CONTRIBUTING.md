# Contributing

> This project follows the [Zairakai Global Contributing Guide][handbook-contributing].  
> Please read it before contributing. The sections below document project-specific workflow.

---

## Development Workflow

| Step | Command / Action | Description |
| :--- | :--- | :--- |
| **1. Install** | `composer install` | Install dependencies and set up git hooks. |
| **2. Branch** | `git checkout -b feature/#TICKET-name` | Create a feature branch from `main`. |
| **3. Code** | *(your IDE)* | Implement your changes following quality standards. |
| **4. Quality** | `make quality` | Run the full quality gate. |
| **5. Test** | `make test` | Ensure all tests are passing. |
| **6. Commit** | `git commit -m "type(scope): #TICKET subject"` | Use [Conventional Commits][git-rules] format. |
| **7. Push** | `git push origin feature/#TICKET-name` | Push and open a Merge Request to `main`. |

---

## Types of Contributions

| Type | Guidelines |
| :--- | :--- |
| **🐛 Bug Reports** | Use the issue template. Include minimal reproduction steps, expected vs actual behavior, Laravel/PHP versions. |
| **✨ Feature Requests** | Describe the use case. Must fit the package scope (Blade components, layouts, forms, medias). |
| **🧩 Components** | Views go in `resources/views/{content,form,layout,medias}/`. Register aliases in `LaravelBladeComponentsServiceProvider`. |
| **🌐 Translations** | Add or update files in `resources/lang/{locale}/layout.php`. All 21 supported locales must be kept in sync. |
| **🔧 Helpers** | `src/BladeHelpers.php` only. Keep methods static and dependency-free. |
| **⚙️ ServiceProvider** | For registration, publish tags, and config merging only. Do not add business logic. |

---

## Quality Targets

| Command | Tool | Description |
| :--- | :--- | :--- |
| `make quality` | All | Full static analysis and formatting gate. |
| `make analyse` | PHPStan | PHP static analysis (Level Max). |
| `make cs` | Pint | Check code style. |
| `make cs:fix` | Pint | Fix code style automatically. |
| `make test` | PHPUnit | Run unit tests with coverage. |
| `make markdownlint` | Markdownlint | Validate Markdown documentation. |

---

[handbook-contributing]: https://gitlab.com/zairakai/handbook/-/blob/main/CONTRIBUTING.md
[git-rules]: https://gitlab.com/zairakai/handbook/-/blob/main/policies/git-rules.md
