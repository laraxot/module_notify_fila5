# Sprint Planning Meeting - FixCity Platform

**Version:** 1.0.0  
**Last Updated:** 2026-03-13  
**Status:** Draft  

---

## Overview

This document outlines the sprint planning process and templates for FixCity platform development.

## Sprint Cadence

| Event | Duration | Frequency |
|-------|----------|-----------|
| Sprint Planning | 2 hours | Bi-weekly |
| Daily Standup | 15 minutes | Daily |
| Sprint Review | 1 hour | Bi-weekly |
| Sprint Retrospective | 1 hour | Bi-weekly |

## Sprint Planning Template

### 1. Sprint Goal

**Sprint #:** [Number]  
**Date:** [YYYY-MM-DD]  
**Goal:** [One sentence objective]

**Example:**
> Complete PHPStan Level 10 compliance for User module

### 2. Capacity Planning

| Team Member | Availability | Points |
|-------------|---------------|--------|
| Developer 1 | 100% | 8 pts |
| Developer 2 | 100% | 8 pts |
| Developer 3 | 50% | 4 pts |
| **Total** | | **20 pts** |

### 3. Sprint Backlog

#### Pulled from Product Backlog

| ID | Story | Points | Priority | Owner |
|----|-------|--------|----------|-------|
| US-001 | As a developer, I want PHPStan errors fixed in User module | 8 | P0 | Dev1 |
| US-002 | As an admin, I want activity logs searchable | 5 | P1 | Dev2 |
| US-003 | As a user, I want faster media uploads | 5 | P1 | Dev3 |

#### Definition of Done

- [ ] Code implemented
- [ ] Tests written and passing
- [ ] PHPStan Level 10 compliant
- [ ] Code reviewed
- [ ] Documentation updated

### 4. Sprint Commitments

| Commitment | Due Date | Owner |
|------------|----------|-------|
| Fix 50 PHPStan errors in User module | Sprint End | Dev1 |
| Implement log search functionality | Sprint End | Dev2 |
| Optimize media upload by 50% | Sprint End | Dev3 |

## Backlog Grooming

### Story Points Scale

| Size | Points | Description |
|------|--------|-------------|
| XS | 1 | Very small task |
| S | 2 | Small task |
| M | 3-5 | Medium task |
| L | 8 | Large task |
| XL | 13 | Very large task |

### Acceptance Criteria Template

```gherkin
Feature: [Feature Name]
  As a [User Type]
  I want [Goal]
  So that [Benefit]

  Scenario: [Scenario Name]
    Given [Precondition]
    When [Action]
    Then [Expected Result]
```

## Sprint Board

### Columns

1. **Backlog** - Prioritized items
2. **To Do** - Committed for sprint
3. **In Progress** - Currently working
4. **Code Review** - PRs pending review
5. **Done** - Completed and merged

### WIP Limits

| Column | Limit |
|--------|-------|
| In Progress | 3 |
| Code Review | 2 |

## Daily Standup Format

### Timebox: 15 minutes

**Each team member answers:**

1. What did I accomplish yesterday?
2. What will I work on today?
3. Are there any blockers?

### Blockers List

| Blocker | Severity | Owner | Resolution |
|---------|----------|-------|------------|
| Waiting for API specs | High | Dev1 | Request specs by EOD |

## Sprint Review Template

### 1. Metrics

| Metric | Target | Actual |
|--------|--------|--------|
| Points Completed | 20 | [X] |
| Points Added | 0 | [X] |
| Bug Rate | <5% | [X]% |

### 2. Demo

| Feature | Presenter | Notes |
|---------|-----------|-------|
| PHPStan fixes | Dev1 | Demo Link |
| Log search | Dev2 | Demo Link |

### 3. Feedback

**What went well:**
- [Item 1]
- [Item 2]

**What could improve:**
- [Item 1]
- [Item 2]

## Sprint Retrospective Template

### 1. What went well?

- [ ]
- [ ]

### 2. What didn't go well?

- [ ]
- [ ]

### 3. Action Items

| Action | Owner | Due Date |
|--------|-------|----------|
| [Action] | [Owner] | [Date] |

### 4. Team Health Check

| Area | Score (1-5) |
|------|-------------|
| Productivity | [ ] |
| Quality | [ ] |
| Communication | [ ] |
| Workload | [ ] |

## Release Planning

### Quarterly Themes

| Quarter | Theme |
|---------|-------|
| Q1 2026 | Quality & Stability |
| Q2 2026 | Feature Expansion |
| Q3 2026 | Growth & Scale |
| Q4 2026 | Enterprise Features |

### Milestone Planning

| Milestone | Target | Stories |
|-----------|--------|---------|
| PHPStan L10 | Q1 2026 | 50 stories |
| Filament 5 | Q1 2026 | 30 stories |
| Media v2 | Q2 2026 | 25 stories |

---

*Template based on Notion Sprint Planning Meeting patterns*
