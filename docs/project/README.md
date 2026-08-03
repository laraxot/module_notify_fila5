---
title: "📁 Project Documentation Index"
type: index
tags: [notify, docs, project]
module: Notify
created: 2026-07-20
updated: 2026-07-20
qmd: "notify documentazione project readme 📁 project documentation index index readme frontmatter qmd search"
issues:
  - "https://github.com/laraxot/module_notify_fila5/issues/56"
discussions:
  - "https://github.com/laraxot/module_notify_fila5/discussions/57"
related:
  - ../README.md
  - ../wiki/index.md
  - ../notifications/readme.md
  - ../integrations/readme.md
  - ../templates/readme.md
---
# 📁 Project Documentation Index

> **Last Updated**: 2026-03-31  
> **Status**: ✅ Active

---

## 📋 Overview

<<<<<<< HEAD
This directory contains project-wide configuration and setup documentation for the Notify platform.
=======
This directory contains project-wide configuration and setup documentation for the FixCity platform.
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

---

## 📁 Documentation Files

### Configuration

| File | Description | Category |
|------|-------------|----------|
| [`configuration.md`](configuration.md) | General project configuration | Setup |
| [`kilo-configuration.md`](kilo-configuration.md) | KILO tool configuration | Tools |
| [`kilo-configuration.md`](kilo-configuration.md) | KILO configuration complete | Tools |

### Development

| File | Description | Category |
|------|-------------|----------|
| [`AGENTS.md`](AGENTS.md) | AI agents configuration | AI |
| [`AI_AGENT_LESSONS_LEARNED.md`](AI_AGENT_LESSONS_LEARNED.md) | AI agent learnings | AI |
| [`AI_SKILLS_AND_PLUGINS_COMPLETE.md`](AI_SKILLS_AND_PLUGINS_COMPLETE.md) | AI skills setup | AI |
| [`COMMIT_MESSAGE.md`](COMMIT_MESSAGE.md) | Commit message guidelines | Git |
| [`VITE_FIX_AND_EXECUTION_PLAN.md`](VITE_FIX_AND_EXECUTION_PLAN.md) | Vite build fixes | Build |

### Infrastructure

| File | Description | Category |
|------|-------------|----------|
<<<<<<< HEAD
| [`vhost-configuration.md`](vhost-configuration.md) | **Apache vhost for laraxot.local** | 🌐 **VHost** |
=======
| [`vhost-configuration.md`](vhost-configuration.md) | **Apache vhost for fixcity.local** | 🌐 **VHost** |
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

### Planning

| File | Description | Category |
|------|-------------|----------|
| [`2-1-1-PLAN.md`](2-1-1-PLAN.md) | Sprint planning | Planning |
| [`2-1-CONTEXT.md`](2-1-CONTEXT.md) | Project context | Planning |
| [`PROJECT.md`](PROJECT.md) | Project overview | Planning |
| [`REQUIREMENTS.md`](REQUIREMENTS.md) | Requirements | Planning |
| [`ROADMAP.md`](ROADMAP.md) | Project roadmap | Planning |
| [`STATE.md`](STATE.md) | Current state | Planning |

### Philosophy

| File | Description | Category |
|------|-------------|----------|
| [`philosophy.md`](philosophy.md) | Project philosophy | Guidelines |
<<<<<<< HEAD
| [`NOTIFY_IMPROVEMENT_PLAN.md`](NOTIFY_IMPROVEMENT_PLAN.md) | Improvement plan | Planning |
| [`NOTIFY_IMPROVEMENT_START_HERE.md`](NOTIFY_IMPROVEMENT_START_HERE.md) | Where to start | Planning |
=======
| [`FIXCITY_IMPROVEMENT_PLAN.md`](FIXCITY_IMPROVEMENT_PLAN.md) | Improvement plan | Planning |
| [`FIXCITY_IMPROVEMENT_START_HERE.md`](FIXCITY_IMPROVEMENT_START_HERE.md) | Where to start | Planning |
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

### Integrations

| File | Description | Category |
|------|-------------|----------|
| [`NOTEBOOKLM_SETUP_COMPLETE.md`](NOTEBOOKLM_SETUP_COMPLETE.md) | NotebookLM setup | AI |
| [`notebooklm-integration.md`](notebooklm-integration.md) | NotebookLM integration | AI |

---

## 🌐 VHost Configuration

### Quick Reference

<<<<<<< HEAD
**Domain**: `laraxot.local`  
**Document Root**: `public_html/`  
**Configuration File**: [`../../laravel/config/vhost/laraxot.local.conf`](../../laravel/config/vhost/laraxot.local.conf)
=======
**Domain**: `fixcity.local`  
**Document Root**: `public_html/`  
**Configuration File**: [`../../laravel/config/vhost/fixcity.local.conf`](../../laravel/config/vhost/fixcity.local.conf)
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

### Setup Steps

```bash
# 1. Copy vhost config to Apache
<<<<<<< HEAD
sudo cp laravel/config/vhost/laraxot.local.conf /etc/apache2/sites-available/

# 2. Enable site
sudo a2ensite laraxot.local.conf
=======
sudo cp laravel/config/vhost/fixcity.local.conf /etc/apache2/sites-available/

# 2. Enable site
sudo a2ensite fixcity.local.conf
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

# 3. Reload Apache
sudo systemctl reload apache2

# 4. Update /etc/hosts
<<<<<<< HEAD
echo "127.0.0.1 laraxot.local" | sudo tee -a /etc/hosts
=======
echo "127.0.0.1 fixcity.local" | sudo tee -a /etc/hosts
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Full Documentation

- [Complete VHost Guide](vhost-configuration.md) - Detailed setup and troubleshooting
- [Modules VHost Docs](../../Modules/docs/vhost-configuration.md) - Module-specific
- [Themes VHost Docs](../../Themes/docs/vhost-configuration.md) - Theme-specific

---

## 🔗 Related Documentation

### Internal

- [Main Index](../index.md) - Master documentation index
- [Modules Docs](../../Modules/docs/) - Module documentation
- [Themes Docs](../../Themes/docs/) - Theme documentation
- [Bash Scripts](../../../../bashscripts/docs/) - Script documentation

### External

- [Apache VirtualHost Docs](https://httpd.apache.org/docs/2.4/vhosts/)
- [Laravel Deployment](https://laravel.com/docs/deployment)

---

## 📊 File Categories

### By Topic

**Infrastructure:**
- [`vhost-configuration.md`](vhost-configuration.md) - Apache vhost setup

**AI & Agents:**
- [`AGENTS.md`](AGENTS.md)
- [`AI_AGENT_LESSONS_LEARNED.md`](AI_AGENT_LESSONS_LEARNED.md)
- [`AI_SKILLS_AND_PLUGINS_COMPLETE.md`](AI_SKILLS_AND_PLUGINS_COMPLETE.md)
- [`NOTEBOOKLM_SETUP_COMPLETE.md`](NOTEBOOKLM_SETUP_COMPLETE.md)
- [`notebooklm-integration.md`](notebooklm-integration.md)

**Configuration:**
- [`configuration.md`](configuration.md)
- [`kilo-configuration.md`](kilo-configuration.md)

**Planning:**
- [`PROJECT.md`](PROJECT.md)
- [`REQUIREMENTS.md`](REQUIREMENTS.md)
- [`ROADMAP.md`](ROADMAP.md)
- [`STATE.md`](STATE.md)
- [`2-1-1-PLAN.md`](2-1-1-PLAN.md)
- [`2-1-CONTEXT.md`](2-1-CONTEXT.md)

**Development:**
- [`COMMIT_MESSAGE.md`](COMMIT_MESSAGE.md)
- [`VITE_FIX_AND_EXECUTION_PLAN.md`](VITE_FIX_AND_EXECUTION_PLAN.md)

**Philosophy:**
- [`philosophy.md`](philosophy.md)
<<<<<<< HEAD
- [`NOTIFY_IMPROVEMENT_PLAN.md`](NOTIFY_IMPROVEMENT_PLAN.md)
- [`NOTIFY_IMPROVEMENT_START_HERE.md`](NOTIFY_IMPROVEMENT_START_HERE.md)
=======
- [`FIXCITY_IMPROVEMENT_PLAN.md`](FIXCITY_IMPROVEMENT_PLAN.md)
- [`FIXCITY_IMPROVEMENT_START_HERE.md`](FIXCITY_IMPROVEMENT_START_HERE.md)
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

---

## 📝 Maintenance

### Adding New Documentation

1. Create markdown file in this directory
2. Add to this index under appropriate category
3. Update main index: [`../index.md`](../index.md)
4. Update modules index: [`../../Modules/docs/DOCUMENTATION_INDEX.md`](../../Modules/docs/DOCUMENTATION_INDEX.md)
5. Update themes index: [`../../Themes/docs/DOCUMENTATION_INDEX.md`](../../Themes/docs/DOCUMENTATION_INDEX.md)

### Review Schedule

- **Monthly**: Check for broken links
- **Quarterly**: Update configuration examples
- **Annually**: Full documentation audit

---

**Maintainer**: Project Team  
**Last Review**: 2026-03-31  
**Next Review**: 2026-06-30  
**Status**: ✅ Active
