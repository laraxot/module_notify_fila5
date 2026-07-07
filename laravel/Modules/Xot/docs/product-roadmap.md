# Product Roadmap - Xot Module

**Version:** 1.0.0  
**Last Updated:** 2026-03-13  
**Status:** Draft  

---

## Overview

The Xot module is the core foundation of the Laraxot ecosystem, providing base classes, patterns, and utilities for all other modules.

## Vision

Be the reliable foundation that enables rapid module development with consistent patterns and maximum type safety.

## Current State

- **PHPStan Status:** In Progress (Level 10)
- **Key Classes:** XotBaseModel, XotBaseResource, XotBaseServiceProvider
- **Patterns:** Action-over-Services, Trait-based reuse

## Roadmap

### Q1 2026 - Foundation Stability

| Feature | Status | Priority | Notes |
|---------|--------|----------|-------|
| PHPStan Level 10 Compliance | In Progress | Critical | 138 errors to fix |
| XotBase Class Refinement | In Progress | High | Add missing methods |
| Documentation Completeness | Planned | High | All classes documented |
| Migration Best Practices | In Progress | Medium | Standard patterns |

### Q2 2026 - Developer Experience

| Feature | Status | Priority | Notes |
|---------|--------|----------|-------|
| Code Generation Commands | Planned | High | Artisan commands |
| IDE Helper Integration | Planned | Medium | Better autocomplete |
| Additional XotBase Classes | Planned | Medium | Form, Table bases |
| Performance Optimization | Planned | Medium | Query optimization |

### Q3-Q4 2026 - Innovation

| Feature | Status | Priority | Notes |
|---------|--------|----------|-------|
| AI-assisted Development | Planned | Low | Code suggestions |
| Advanced Code Analysis | Planned | Low | Custom PHPStan rules |
| Template Generation | Planned | Low | Module scaffolding |

## Key Deliverables

1. **XotBaseModel** - Base Eloquent model with common functionality
2. **XotBaseResource** - Filament resource base class
3. **XotBaseServiceProvider** - Module service provider base
4. **XotBaseListRecords** - List records base for Filament

## Dependencies

- Laravel 12.x
- Filament 5.x
- Livewire 4.x
- Spatie packages

## Success Metrics

| Metric | Target | Current |
|--------|--------|---------|
| PHPStan Errors | 0 | ~50 |
| Test Coverage | 90%+ | TBD |
| Documentation | 100% | 80% |

---

*Template based on Notion Product Roadmap patterns*
