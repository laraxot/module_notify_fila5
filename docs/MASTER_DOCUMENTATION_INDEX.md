# FixCity Platform - Master Documentation Index

**Purpose**: Central navigation for all platform documentation  
**Audience**: All developers, architects, and stakeholders  
**Status**: Active

---

## 🎯 Quick Links

| Category | Link | Description |
|----------|------|-------------|
| 📖 **Getting Started** | [Onboarding](#onboarding) | New developer guide |
| 🏗️ **Architecture** | [Architecture Overview](#architecture) | System architecture |
| 📋 **Standards** | [Coding Standards](#standards) | Development standards |
| 🔧 **Modules** | [Modules Index](#modules) | Module documentation |
| 🎨 **Themes** | [Themes Index](#themes) | Theme documentation |
| 📊 **Quality** | [Quality Tools](#quality) | Quality assurance |
| 🚀 **Deployment** | [Deployment Guide](#deployment) | Deployment procedures |

---

## 📚 Documentation by Category

### Onboarding

- [Developer Onboarding Guide](docs/project_docs/onboarding/developer-onboarding.md)
- [Development Environment Setup](docs/project_docs/setup/development-environment.md)
- [First Contribution](docs/project_docs/contributing/first-contribution.md)

### Architecture

#### Core Architecture
- [System Architecture Overview](docs/project_docs/architecture/system-overview.md)
- [Module Architecture](laravel/Modules/Xot/docs/architecture/module-architecture.md)
- [Database Design](docs/project_docs/architecture/database-design.md)
- [API Design](docs/project_docs/architecture/api-design.md)

#### Design Patterns
- [Repository Pattern](laravel/Modules/Xot/docs/patterns/repository-pattern.md)
- [Action Pattern](laravel/Modules/Xot/docs/actions/action-pattern.md)
- [Data Transfer Objects](laravel/Modules/Xot/docs/datas/dto-pattern.md)
- [Service Provider Pattern](laravel/Modules/Xot/docs/providers/service-provider-pattern.md)

#### Architectural Decisions (ADRs)
- [ADR Index](docs/project_docs/architecture/adr-index.md)
- [ADR-001: Use Spatie Queueable Actions](laravel/Modules/Xot/docs/architecture/decisions/adr-001-spatie-queueable-actions.md)
- [ADR-002: No Service Classes](laravel/Modules/Xot/docs/architecture/decisions/adr-002-no-service-classes.md)
- [ADR-003: Filament 5 Migration](laravel/Modules/Xot/docs/architecture/decisions/adr-003-filament-5-migration.md)

### Standards

#### Coding Standards
- [PHP Coding Standards](docs/conventions/php-coding-standards.md)
- [JavaScript/TypeScript Standards](docs/conventions/javascript-standards.md)
- [CSS/Tailwind Standards](docs/conventions/tailwind-standards.md)
- [Naming Conventions](docs/conventions/naming-conventions.md)

#### Documentation Standards
- [Documentation Governance](docs/DOCUMENTATION_GOVERNANCE.md) ⭐ **NEW**
- [Documentation Style Guide](docs/project_docs/documentation/style-guide.md)
- [README Template](docs/project_docs/templates/readme-template.md)
- [ADR Template](docs/project_docs/templates/adr-template.md)

#### Best Practices
- [Logging Best Practices](docs/LOGGING_BEST_PRACTICES.md)
- [Error Handling](laravel/Modules/Xot/docs/best-practices/error-handling.md)
- [Security Best Practices](docs/project_docs/security/security-best-practices.md)
- [Performance Optimization](laravel/Modules/Xot/docs/performance/optimization-guide.md)

### Modules

#### Core Modules
- **Xot** - Core Framework Module
  - [Documentation Index](laravel/Modules/Xot/docs/00-index.md)
  - [XotBase Classes](laravel/Modules/Xot/docs/xotbase-classes.md)
  - [Service Providers](laravel/Modules/Xot/docs/providers/providers-index.md)

- **User** - Authentication & Authorization
  - [Documentation Index](laravel/Modules/User/docs/README.md)
  - [Authentication Guide](laravel/Modules/User/docs/authentication.md)
  - [Authorization Guide](laravel/Modules/User/docs/authorization.md)

- **Blog** - Content Management
  - [Documentation Index](laravel/Modules/Blog/docs/README.md)
  - [Blocks System](laravel/Modules/Blog/docs/blocks.md)
  - [Visual Editor](laravel/Modules/Blog/docs/visual-editor.md)

- **Cms** - Content Management System
  - [Documentation Index](laravel/Modules/Cms/docs/README.md)
  - [Pages System](laravel/Modules/Cms/docs/pages.md)
  - [Menus System](laravel/Modules/Cms/docs/menus.md)

- **Tenant** - Multi-tenancy
  - [Documentation Index](laravel/Modules/Tenant/docs/README.md)
  - [Tenant Isolation](laravel/Modules/Tenant/docs/tenant-isolation.md)
  - [Database per Tenant](laravel/Modules/Tenant/docs/database-per-tenant.md)

#### Supporting Modules
- **UI** - UI Components & Utilities
  - [Documentation Index](laravel/Modules/UI/docs/README.md)
  - [Component Library](laravel/Modules/UI/docs/components/components-index.md)
  - [Icons System](laravel/Modules/UI/docs/icons/icons-system.md)

- **Comment** - Comment System
  - [Documentation Index](laravel/Modules/Comment/docs/README.md)
  - [Comment Integration](laravel/Modules/Comment/docs/integration.md)

- **Media** - Media Management
  - [Documentation Index](laravel/Modules/Media/docs/README.md)
  - [File Upload](laravel/Modules/Media/docs/file-upload.md)
  - [Image Processing](laravel/Modules/Media/docs/image-processing.md)

- **Notify** - Notifications
  - [Documentation Index](laravel/Modules/Notify/docs/README.md)
  - [Notification Channels](laravel/Modules/Notify/docs/channels.md)
  - [Email Templates](laravel/Modules/Notify/docs/email-templates.md)

#### Module Documentation Structure
```
Modules/ModuleName/
├── docs/
│   ├── README.md              # Module overview
│   ├── architecture/          # Architecture docs
│   ├── guides/                # How-to guides
│   ├── references/            # API references
│   ├── best-practices/        # Best practices
│   └── troubleshooting/       # Troubleshooting
```

### Themes

#### Active Themes

**TwentyOne** - Modern Tailwind Theme
- [Documentation Index](laravel/Themes/TwentyOne/docs/README.md)
- [Getting Started](laravel/Themes/TwentyOne/docs/getting-started.md)
- [Components](laravel/Themes/TwentyOne/docs/components/components-index.md)
- [Build System](laravel/Themes/TwentyOne/docs/build-system.md)
- [Customization](laravel/Themes/TwentyOne/docs/customization.md)

**Sixteen** - AGID Compliant Theme
- [Documentation Index](laravel/Themes/Sixteen/docs/index.md)
- [AGID Compliance](laravel/Themes/Sixteen/docs/agid/agid-compliance.md)
- [Components](laravel/Themes/Sixteen/docs/components/components-index.md)
- [Accessibility](laravel/Themes/Sixteen/docs/accessibility.md)
- [Bootstrap Italia](laravel/Themes/Sixteen/docs/bootstrap-italia.md)

#### Theme Documentation Structure
```
Themes/ThemeName/
├── docs/
│   ├── README.md              # Theme overview
│   ├── getting-started/       # Installation & setup
│   ├── components/            # Component docs
│   ├── customization/         # Customization guides
│   └── build-system/          # Build processes
```

### Quality

#### Static Analysis
- [PHPStan Guide](docs/phpstan/phpstan-guide.md)
- [PHPStan Level 10 Rules](docs/phpstan/phpstan-level-10-rules.md)
- [PHPMD Guide](docs/quality/phpmd-guide.md)
- [PHPInsights Guide](docs/quality/phpinsights-guide.md)

#### Testing
- [Testing Guide](docs/testing/testing-guide.md)
- [Pest PHP Guide](docs/testing/pest-php-guide.md)
- [Test Coverage](docs/testing/test-coverage.md)
- [E2E Testing](docs/testing/e2e-testing.md)

#### Code Review
- [Code Review Guide](docs/project_docs/code-review.md)
- [Pull Request Template](docs/project_docs/templates/pr-template.md)
- [Review Checklist](docs/project_docs/checklists/review-checklist.md)

### Deployment

#### Environment Setup
- [Production Setup](docs/project_docs/deployment/production-setup.md)
- [Staging Setup](docs/project_docs/deployment/staging-setup.md)
- [Local Development](docs/project_docs/setup/local-development.md)

#### CI/CD
- [CI/CD Pipeline](docs/project_docs/deployment/cicd-pipeline.md)
- [GitHub Actions](docs/project_docs/deployment/github-actions.md)
- [Deployment Checklist](docs/project_docs/checklists/deployment-checklist.md)

#### Monitoring
- [Monitoring Setup](docs/project_docs/operations/monitoring.md)
- [Logging Strategy](docs/LOGGING_BEST_PRACTICES.md)
- [Error Tracking](docs/project_docs/operations/error-tracking.md)

---

## 🗺️ Documentation Roadmaps

### Module Roadmaps
- [Blog Module Roadmap](laravel/Modules/Blog/docs/roadmap.md)
- [UI Module Roadmap](laravel/Modules/UI/docs/roadmap.md)
- [Xot Module Roadmap](laravel/Modules/Xot/docs/roadmap/roadmap.md)

### Theme Roadmaps
- [TwentyOne Roadmap](laravel/Themes/TwentyOne/docs/roadmap.md)
- [Sixteen Roadmap](laravel/Themes/Sixteen/docs/roadmap/roadmap.md)

### Platform Roadmaps
- [Master Roadmap](docs/project_docs/roadmaps/master-roadmap.md)
- [Product Strategy](docs/project_docs/strategy/product-strategy.md)
- [Technical Roadmap](docs/project_docs/roadmaps/technical-roadmap.md)

---

## 📊 Documentation Health

### Current Status

| Metric | Target | Current | Status |
|--------|--------|---------|--------|
| Documentation Coverage | >90% | TBD | 🟡 In Progress |
| Temporal Strings | 0 | 0 | ✅ Complete |
| Duplicate Content | <1% | TBD | 🟡 In Progress |
| Broken Links | 0 | TBD | 🟡 In Progress |

### Recent Improvements

- ✅ **2026-03-13**: Removed all temporal strings (784 instances)
- ✅ **2026-03-13**: Created documentation governance framework
- ✅ **2026-03-13**: Created master documentation index
- 🟡 **In Progress**: Consolidate duplicate documentation
- 🟡 **In Progress**: Xot module content audit

### Ongoing Initiatives

- [Documentation Improvement Plan](docs/DOCUMENTATION_ANALYSIS_AND_IMPROVEMENT_PLAN.md)
- [Documentation Governance](docs/DOCUMENTATION_GOVERNANCE.md)
- [Database Directory Naming Fix](DATABASE_DIRECTORY_NAMING_FIX.md)

---

## 🛠️ Tools and Resources

### Documentation Tools
- [Markdown Guide](https://www.markdownguide.org)
- [Markdown Lint](docs/project_docs/tools/markdown-lint.md)
- [Link Checker](docs/project_docs/tools/link-checker.md)

### Development Tools
- [PHPStan](docs/phpstan/phpstan-guide.md)
- [Pest PHP](docs/testing/pest-php-guide.md)
- [Laravel Pint](docs/quality/laravel-pint.md)

### Templates
- [README Template](docs/project_docs/templates/readme-template.md)
- [ADR Template](docs/project_docs/templates/adr-template.md)
- [Guide Template](docs/project_docs/templates/guide-template.md)

---

## 📚 External Resources

### Laravel
- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)
- [Livewire Documentation](https://livewire.laravel.com/docs)

### PHP
- [PHP Documentation](https://www.php.net/docs.php)
- [PSR Standards](https://www.php-fig.org/psr/)
- [PHP The Right Way](https://phptherightway.com/)

### JavaScript
- [MDN Web Docs](https://developer.mozilla.org/)
- [JavaScript.info](https://javascript.info/)
- [TypeScript Handbook](https://www.typescriptlang.org/docs/)

---

## 🤝 Contributing

### How to Contribute

1. **Read Standards**: Review [Documentation Governance](docs/DOCUMENTATION_GOVERNANCE.md)
2. **Find Gap**: Identify missing or outdated documentation
3. **Create Draft**: Write in `docs/drafts/`
4. **Submit Review**: Create PR with documentation changes
5. **Merge**: After approval, merge and move to final location

### Documentation Owners

- **Architecture Team**: @architecture-team
- **Module Docs**: Module maintainers
- **Theme Docs**: Theme maintainers
- **Platform Docs**: @documentation-team

---

## 📞 Support

### Getting Help

- **Questions**: Use GitHub Discussions
- **Issues**: Create GitHub Issue
- **Urgent**: Contact @architecture-team

### Related Documents

- [Contributing Guide](docs/CONTRIBUTING.md)
- [Code of Conduct](docs/CODE_OF_CONDUCT.md)
- [Security Policy](docs/SECURITY.md)

---

**Status**: Active  
**Owner**: @architecture-team  
**Review Cycle**: Quarterly  
**Last Git Update**: 2026-03-13

*This index is maintained in git. For the latest version, check the repository.*
