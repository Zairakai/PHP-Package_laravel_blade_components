# Security Policy

> This project follows the [Zairakai Global Security Policy][handbook-security].
> Please refer to it for standard protections, response timeline, and contact information.

---

## 🔒 Reporting Vulnerabilities

| Channel | Description | Contact / Link |
| :--- | :--- | :--- |
| **GitLab Issues** | For non-sensitive issues (bugs, public vulnerabilities). | [Open Issue][issues] |
| **Service Desk** | Preferred channel for sensitive reports. | `contact-project+zairakai-php-packages-laravel-blade-components-80184735-issue-@incoming.gitlab.com` |
| **Email** | Alternative secure contact. | `security@the-white-rabbits.fr` |

Please **do not disclose vulnerabilities publicly** until they have been reviewed.

---

## 🛡️ Security Features

### Protection Layers

| Layer | Security Protection |
| :--- | :--- |
| **Static Analysis** | PHPStan Level Max compliance and Rector modernizations. |
| **CI Pipeline** | Automated secret detection in GitLab CI. |

---

## 🔍 Security Scope

`zairakai/laravel-blade-components` provides Blade component views, helper methods, and service-provider wiring:

- no external network calls
- no dynamic code execution (`eval`, `exec`, shell calls)
- component output safety still depends on template usage and escaping in consuming apps

You remain responsible for output escaping and controlling which data is passed to components.

---

[handbook-security]: https://gitlab.com/zairakai/handbook/-/blob/main/SECURITY.md
[issues]: https://gitlab.com/zairakai/php-packages/laravel-blade-components/-/issues
