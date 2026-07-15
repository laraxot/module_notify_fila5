---
title: "Model/Factory/Seeder Audit"
type: concept
tags: [model, factory, seeder]
created: 2026-07-14
updated: 2026-07-14
qmd: "model-factory-seeder model/factory/seeder audit"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./-repos.md"
  - "./-todo.md"
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./AGENTS.md"
  - "./ANALISI-COMPLETA-.deprecated.md.md"
  - "./CHANGELOG.md"
related:
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./ANALISI-COMPLETA-2025-10-01.md"
  - "./COMPLETAMENTO-PROGETTO-2025-10-01.md"
  - "./DOCUMENTATION_IMPROVEMENT_SUMMARY_2026-03-13.md"
  - "./GITHUB_ISSUES_RECOMMENDATIONS_2026-03-02.md"
  - "./IMPLEMENTATION_SUMMARY_2025-01-27.md"
---

# Model/Factory/Seeder Audit

Generated: [DATE] 16:29

## Coverage
| Model | Factory | Seeded |
|---|---|---|
| Notification | yes | no |
| MailTemplateLog | yes | no |
| NotificationTemplateVersion | yes | no |
| Contact | yes | no |
| NotifyTheme | yes | no |
| MailTemplateVersion | yes | no |
| NotificationType | yes | no |
| NotificationTemplate | yes | no |
| MailTemplate | yes | yes |
| NotifyThemeable | yes | no |

Seeders:
- `database/seeders/DatabaseSeeder.php`
- `database/seeders/MailTemplateSeeder.php`
- `database/seeders/MailTemplatesSeeder.php`
- `database/seeders/NotifyDatabaseSeeder.php`

## Missing / Actions
- Add exemplar seeding for: NotificationTemplate, NotificationTemplateVersion, NotificationType, Contact, NotifyTheme.
- Keep `MailTemplate*` seeding as is; extend with relationships if needed.

## Likely non-business-critical
- None; all listed are domain entities but some may be configuration-only and safe to seed minimally.
