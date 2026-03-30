# FixCity Platform Improvement - PROJECT.md

**Project Name**: FixCity Platform Improvement
**Created**: 2026-03-30
**Status**: Active
**Priority**: Critical

---

## Executive Summary

**Mission**: Transform FixCity from MVP (40% test coverage, 780ms TTFB) to production-ready platform (85% coverage, 200ms TTFB) with excellent documentation, robust CI/CD, and autonomous AI agent implementation.

**Vision**: A modern, performant urban issue management platform that serves citizens efficiently with AI-powered automation and multi-agent collaboration.

---

## Current State Analysis

### Strengths ✅
- **Code Quality**: PHPStan Level 10 (0 errors)
- **Architecture**: 17 modules with Laraxot framework
- **AI Integration**: OpenViking + BMAD + GSD + Ralph Loop ready
- **Documentation Culture**: 232+ markdown files
- **Multi-Agent Infrastructure**: Collaboration-ready

### Challenges ⚠️
| Issue | Current | Target | Gap | Priority |
|-------|---------|--------|-----|----------|
| **Test Coverage** | 40% | 85% | -45% | 🔴 Critical |
| **TTFB** | 780ms | 200ms | +580ms | 🔴 Critical |
| **DB Queries/Page** | 87 | <10 | +77 | 🟡 High |
| **Documentation** | 130 files (root) | Organized | Chaos | 🟡 High |
| **Roadmap Duplicates** | 16 files | 2-3 | +13 | 🟡 High |
| **CI/CD** | Partial | Complete | Gaps | 🟡 High |

### Effort Estimates
- **Documentation Cleanup**: 40-60h
- **Test Coverage**: 120h
- **Performance Optimization**: 80h
- **CI/CD Fixes**: 20-30h
- **Total**: ~260-290h (8-10 weeks with 3 devs)

---

## Technical Stack

### Backend
- **Laravel**: 12.x
- **PHP**: 8.2+
- **Filament**: 5.x (migrating 4→5)
- **Livewire**: 4.x
- **Database**: SQLite (dev) → PostgreSQL (prod)

### Frontend
- **Tailwind CSS**: 4.x
- **Vite**: Latest
- **Vue 3**: Composition API
- **Leaflet.js**: Maps
- **Alpine.js**: Interactions

### Testing & Quality
- **Pest PHP**: Testing framework
- **PHPStan**: Level 10
- **Laravel Pint**: Code formatting
- **Biome/ESLint**: Frontend linting

### AI Agent Tools
- **OpenViking**: Context management (v0.2.13)
- **BMAD**: Requirements & architecture (v6.2.2)
- **GSD**: Phase-based execution
- **Ralph Loop**: Autonomous implementation

---

## Success Criteria

### Phase 1: Foundation (Weeks 1-4)
- [ ] Documentation organized (master index, no duplicates)
- [ ] GitHub Actions all passing
- [ ] OpenViking fully operational
- [ ] GSD structure created

### Phase 2: Test Coverage (Weeks 5-8)
- [ ] Coverage: 40% → 65%
- [ ] All test syntax errors fixed
- [ ] Integration tests for critical paths
- [ ] E2E tests for user workflows

### Phase 3: Performance (Weeks 9-12)
- [ ] TTFB: 780ms → 400ms
- [ ] DB queries: 87 → 40
- [ ] Eager loading implemented
- [ ] Caching strategy deployed

### Phase 4: Production Ready (Weeks 13-16)
- [ ] Coverage: 65% → 85%
- [ ] TTFB: 400ms → 200ms
- [ ] DB queries: 40 → <10
- [ ] PostgreSQL migration complete
- [ ] CI/CD fully automated

---

## Architecture Overview

```
┌─────────────────────────────────────────────────┐
│              FixCity Platform                   │
├─────────────────────────────────────────────────┤
│  Frontend Layer                                 │
│  ├─ Tailwind CSS 4 (Design System)             │
│  ├─ Vue 3 Components                            │
│  ├─ Livewire 4 (Reactive)                       │
│  └─ Leaflet.js (Maps)                           │
├─────────────────────────────────────────────────┤
│  Application Layer                              │
│  ├─ Filament 5 (Admin Panel)                    │
│  ├─ Volt (Single-file Components)               │
│  ├─ Folio (File-based Routing)                  │
│  └─ Spatie QueueableAction (Business Logic)     │
├─────────────────────────────────────────────────┤
│  Domain Layer (17 Modules)                      │
│  ├─ Fixcity (Ticket Management)                 │
│  ├─ User (Authentication)                       │
│  ├─ Cms (Content)                               │
│  ├─ Geo (Geocoding)                             │
│  ├─ AI (ML Integration)                         │
│  └─ ... (12 more modules)                       │
├─────────────────────────────────────────────────┤
│  Data Layer                                     │
│  ├─ Eloquent ORM                                │
│  ├─ SQLite (Development)                        │
│  └─ PostgreSQL (Production)                     │
├─────────────────────────────────────────────────┤
│  AI Agent Layer                                 │
│  ├─ OpenViking (Context)                        │
│  ├─ BMAD (Requirements)                         │
│  ├─ GSD (Execution)                             │
│  └─ Ralph Loop (Autonomous)                     │
└─────────────────────────────────────────────────┘
```

---

## Risk Assessment

| Risk | Probability | Impact | Mitigation |
|------|-------------|--------|------------|
| **Documentation Overwhelm** | High | Medium | Incremental cleanup, prioritize critical docs |
| **Test Coverage Gap** | High | High | Focus on critical paths first, use Ralph Loop |
| **Performance Regression** | Medium | High | Baseline metrics, monitor every change |
| **CI/CD Complexity** | Medium | Medium | Fix one workflow at a time, test thoroughly |
| **AI Agent Learning Curve** | Low | Low | Documentation and examples provided |

---

## Stakeholders

- **Product Owner**: Urban citizens, city administrators
- **Development Team**: AI Agents (Qwen, Claude, Cursor, Copilot)
- **Technical Lead**: GSD Orchestrator
- **QA**: Automated testing (Pest, E2E)
- **DevOps**: GitHub Actions

---

## Communication Plan

### Daily
- GitHub issue updates (progress, blockers)
- OpenViking context updates

### Weekly
- Sprint review (Friday)
- Metrics report (coverage, performance)
- Roadmap adjustment

### Per Phase
- Phase demo
- Retrospective
- Next phase planning

---

## Metrics & KPIs

### Code Quality
- **PHPStan Level**: 10 (maintain)
- **Test Coverage**: 40% → 85%
- **Code Duplication**: <5%

### Performance
- **TTFB**: 780ms → 200ms
- **Page Load**: 2s → <1s
- **DB Queries**: 87 → <10

### Developer Experience
- **CI/CD Pass Rate**: >95%
- **Time to Deploy**: <10 minutes
- **Documentation Coverage**: 100%

---

## Budget & Timeline

### Timeline
- **Start**: 2026-03-30
- **Phase 1 End**: 2026-04-27 (4 weeks)
- **Phase 2 End**: 2026-06-22 (8 weeks)
- **Phase 3 End**: 2026-08-17 (12 weeks)
- **Phase 4 End**: 2026-10-12 (16 weeks)

### Budget
- **Total Effort**: ~260-290 hours
- **Team**: 3 AI agents full-time
- **Calendar**: 16 weeks (4 months)
- **Cost**: €250k (equivalent team of 3 human devs)

---

## Next Steps

1. **Today**:
   - [x] Initialize OpenViking
   - [ ] Create GSD structure
   - [ ] Create PRD (this document)
   - [ ] Plan Phase 1

2. **This Week**:
   - [ ] Documentation cleanup start
   - [ ] Fix failing GitHub Actions
   - [ ] Setup Ralph Loop

3. **Next 2 Weeks**:
   - [ ] Complete Phase 1.1 (Documentation)
   - [ ] Start Phase 1.2 (CI/CD)
   - [ ] Begin test coverage baseline

---

## Approval

**Created By**: AI Agent Team  
**Approved By**: Pending  
**Date**: 2026-03-30  

---

## Revision History

| Version | Date | Author | Changes |
|---------|------|--------|---------|
| 1.0 | 2026-03-30 | AI Agent | Initial creation |

---

**Status**: ✅ **READY FOR PHASE PLANNING**  
**Next Command**: `/gsd-plan-phase 1`
