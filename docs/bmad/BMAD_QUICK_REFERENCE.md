# BMad Method - Quick Reference Card

**Project:** FixCity Fila5 Base | **Version:** 6.2.2 | **Status:** ✅ Fully Operational

---

## 🚀 Quick Start

### Get Help
```
skill: "bmad-help"    # Interactive guidance system
```

### Talk to Agents
| Agent | Command | Purpose |
|-------|---------|---------|
| **Mary** (Analyst) | `skill: "bmad-agent-analyst"` | Requirements, research, analysis |
| **John** (PM) | `skill: "bmad-agent-pm"` | Product requirements, user stories |
| **Sally** (UX) | `skill: "bmad-agent-ux-designer"` | UX design, wireframes, specs |
| **Winston** (Architect) | `skill: "bmad-agent-architect"` | System architecture, tech decisions |
| **Amelia** (Dev) | `skill: "bmad-agent-dev"` | Code implementation |
| **Quinn** (QA) | `skill: "bmad-agent-qa"` | Testing, quality assurance |
| **Bob** (Scrum) | `skill: "bmad-agent-sm"` | Sprint planning, agile |
| **Barry** (Quick Dev) | `skill: "bmad-agent-quick-flow-solo-dev"` | Rapid implementation |
| **Murat** (Test Arch) | `skill: "bmad-tea"` | Advanced testing strategy |
| **Freya** (UX WDS) | `skill: "wds-agent-freya-ux"` | Strategic UX design |
| **Saga** (Analyst WDS) | `skill: "wds-agent-saga-analyst"` | Product discovery |

---

## 📋 Common Workflows

### New Feature Development
1. `bmad-product-brief` → Define the product
2. `bmad-create-prd` → Create requirements
3. `bmad-create-ux-design` → Design UX
4. `bmad-create-architecture` → Design architecture
5. `bmad-create-epics-and-stories` → Break into stories
6. `bmad-sprint-planning` → Plan sprint
7. `bmad-dev-story` → Implement stories

### Code Review
```
skill: "bmad-code-review"              # Adversarial review
skill: "bmad-review-edge-case-hunter"  # Edge case analysis
```

### Brainstorming
```
skill: "bmad-brainstorming"           # Core brainstorming
skill: "bmad-cis-agent-brainstorming-coach"  # Expert facilitation
```

### Testing
```
skill: "bmad-testarch-framework"   # Setup test framework
skill: "bmad-testarch-automate"    # Automate tests
skill: "bmad-qa-generate-e2e-tests" # Generate E2E tests
```

---

## 📁 Key Directories

| Directory | Purpose |
|-----------|---------|
| `_bmad/` | BMad modules (core, bmm, cis, gds, tea, wds) |
| `_bmad-output/` | Generated artifacts (PRDs, specs, plans) |
| `docs/bmad/` | BMad documentation |
| `skills/` | Installed skills for AI assistants |

---

## 📊 Installed Modules

| Module | Version | Skills | Agents |
|--------|---------|--------|--------|
| **core** | 6.2.2 | 11 | - |
| **bmm** | 6.2.2 | 20 | 9 |
| **cis** | 0.1.9 | 8 | 6 |
| **gds** | 0.2.2 | 22 | 7 |
| **tea** | 1.7.2 | 9 | 1 |
| **wds** | 0.3.1 | 10 | 2 |

**Total:** 110 skills | 28 agents

---

## 🔗 Links

- **Official Docs:** https://docs.bmad-method.org/
- **Setup Guide:** `docs/bmad/BMAD_SETUP_GUIDE.md`
- **Output Artifacts:** `_bmad-output/`

---

*Generated: 2026-04-07*
