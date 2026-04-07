# BMad Method - Setup & Configuration Guide

**Project:** FixCity Fila5 Base  
**BMad Version:** 6.2.2  
**Installation Date:** 2026-04-06  
**Last Updated:** 2026-04-07

---

## Installation Status: ✅ COMPLETE

BMad Method is **fully installed and configured** with all modules operational.

---

## Installed Modules

| Module | Version | Type | Description |
|--------|---------|------|-------------|
| **core** | 6.2.2 | Built-in | Core BMad skills, agents, and utilities |
| **bmm** | 6.2.2 | Built-in | BMad Method - Main workflow (Analysis → Planning → Solutioning → Implementation) |
| **cis** | 0.1.9 | External | Creative Intelligence Suite (brainstorming, design thinking, innovation) |
| **gds** | 0.2.2 | External | Game Dev Studio (game development workflows) |
| **tea** | 1.7.2 | External | Test Architecture Enterprise (advanced testing patterns) |
| **wds** | 0.3.1 | External | Web Development Studio (UX design, scenarios, design systems) |

---

## Directory Structure

```
_bmad/
├── _config/                    # BMad configuration
│   ├── agents/                 # Agent configurations
│   ├── custom/                 # Custom configurations
│   ├── ides/                   # IDE-specific configs (opencode.yaml)
│   ├── agent-manifest.csv      # All registered agents
│   ├── skill-manifest.csv      # All registered skills
│   ├── files-manifest.csv      # File registry
│   ├── manifest.yaml           # Installation manifest
│   └── bmad-help.csv           # Help system data
├── core/                       # Core BMad Module
│   ├── bmad-help/              # Interactive help system
│   ├── bmad-init/              # Project initialization
│   ├── bmad-brainstorming/     # Brainstorming techniques
│   ├── bmad-distillator/       # Document compression
│   ├── bmad-editorial-review-*/ # Prose & structure review
│   ├── bmad-review-*/          # Adversarial & edge case review
│   └── config.yaml
├── bmm/                        # BMad Method (Main Workflow)
│   ├── 1-analysis/             # Phase 1: Analysis
│   │   ├── bmad-agent-analyst/         # Mary - Business Analyst
│   │   ├── bmad-agent-tech-writer/     # Paige - Technical Writer
│   │   ├── bmad-product-brief/         # Product brief creation
│   │   ├── bmad-document-project/      # Project documentation
│   │   └── research/           # Domain/Market/Technical research
│   ├── 2-plan-workflows/       # Phase 2: Planning
│   │   ├── bmad-agent-pm/              # John - Product Manager
│   │   ├── bmad-agent-ux-designer/     # Sally - UX Designer
│   │   ├── bmad-create-prd/            # PRD creation
│   │   ├── bmad-create-ux-design/      # UX design specs
│   │   ├── bmad-edit-prd/              # PRD editing
│   │   └── bmad-validate-prd/          # PRD validation
│   ├── 3-solutioning/          # Phase 3: Solution Design
│   │   ├── bmad-agent-architect/       # Winston - System Architect
│   │   ├── bmad-create-architecture/   # Architecture design
│   │   ├── bmad-create-epics-and-stories/ # Story breakdown
│   │   ├── bmad-check-implementation-readiness/
│   │   └── bmad-generate-project-context/
│   └── 4-implementation/       # Phase 4: Implementation
│       ├── bmad-agent-dev/             # Amelia - Developer
│       ├── bmad-agent-qa/              # Quinn - QA Engineer
│       ├── bmad-agent-sm/              # Bob - Scrum Master
│       ├── bmad-agent-quick-flow-solo-dev/ # Barry - Quick Dev
│       ├── bmad-code-review/           # Adversarial code review
│       ├── bmad-create-story/          # Story creation
│       ├── bmad-dev-story/             # Story implementation
│       ├── bmad-quick-dev/             # Rapid implementation
│       ├── bmad-sprint-planning/       # Sprint management
│       ├── bmad-sprint-status/         # Status tracking
│       ├── bmad-correct-course/        # Course correction
│       ├── bmad-retrospective/         # Post-epic review
│       └── bmad-qa-generate-e2e-tests/ # E2E test generation
├── cis/                        # Creative Intelligence Suite
│   └── skills/                 # CIS skills (brainstorming, design thinking, etc.)
├── gds/                        # Game Dev Studio
│   ├── agents/                 # Game-specific agents
│   ├── workflows/              # Game dev workflows
│   └── gametest/               # Game testing patterns
├── tea/                        # Test Architecture Enterprise
│   ├── agents/                 # Test architect (Murat)
│   └── workflows/              # Testing workflows
├── wds/                        # Web Development Studio
│   ├── agents/                 # WDS agents (Freya - UX, Saga - Analyst)
│   ├── skills/                 # WDS skills
│   ├── workflows/              # WDS workflows
│   └── data/                   # WDS data files
├── prd/                        # PRD documentation system
└── threads/                    # Persistent conversation threads

_bmad-output/                   # Generated artifacts
├── codebase/                   # Codebase analysis outputs
├── implementation-artifacts/   # Implementation outputs
├── planning-artifacts/         # Planning outputs
└── test-artifacts/             # Test artifacts

skills/                         # Installed BMad skills (for AI assistants)
├── anthropic/
├── taste/
└── ui-ux-pro-max/
```

---

## Configuration Files

### Root Configuration
- **`_bmad/config.yaml`** - Project-level BMad config
  ```yaml
  document_output_language: Italiano
  output_folder: '{project-root}/_bmad-output'
  ```

- **`_bmad/config.user.yaml`** - User preferences
  ```yaml
  user_name: Xot
  communication_language: Italiano
  ```

### Core Module Config
- **`_bmad/core/config.yaml`** - Core module settings
  ```yaml
  user_name: Zorin
  communication_language: English
  document_output_language: English
  output_folder: _bmad-output
  ```

---

## Available Agents (28 Total)

### BMM Agents (Main Method)
| Agent | Name | Role | Module |
|-------|------|------|--------|
| bmad-agent-analyst | Mary | Business Analyst | bmm/1-analysis |
| bmad-agent-tech-writer | Paige | Technical Writer | bmm/1-analysis |
| bmad-agent-pm | John | Product Manager | bmm/2-plan |
| bmad-agent-ux-designer | Sally | UX Designer | bmm/2-plan |
| bmad-agent-architect | Winston | System Architect | bmm/3-solutioning |
| bmad-agent-dev | Amelia | Developer | bmm/4-implementation |
| bmad-agent-qa | Quinn | QA Engineer | bmm/4-implementation |
| bmad-agent-sm | Bob | Scrum Master | bmm/4-implementation |
| bmad-agent-quick-flow-solo-dev | Barry | Quick Flow Solo Dev | bmm/4-implementation |

### CIS Agents (Creative Intelligence)
| Agent | Name | Role |
|-------|------|------|
| bmad-cis-agent-brainstorming-coach | Carson | Brainstorming Specialist |
| bmad-cis-agent-creative-problem-solver | Dr. Quinn | Problem Solver |
| bmad-cis-agent-design-thinking-coach | Maya | Design Thinking Coach |
| bmad-cis-agent-innovation-strategist | Victor | Innovation Strategist |
| bmad-cis-agent-presentation-master | Caravaggio | Presentation Expert |
| bmad-cis-agent-storyteller | Sophia | Storyteller |

### GDS Agents (Game Dev Studio)
| Agent | Name | Role |
|-------|------|------|
| gds-agent-game-architect | Cloud Dragonborn | Game Architect |
| gds-agent-game-designer | Samus Shepard | Game Designer |
| gds-agent-game-dev | Link Freeman | Game Developer |
| gds-agent-game-qa | GLaDOS | Game QA Architect |
| gds-agent-game-scrum-master | Max | Game Scrum Master |
| gds-agent-game-solo-dev | Indie | Game Solo Dev |
| gds-agent-tech-writer | Paige | Technical Writer |

### TEA Agents (Test Architecture)
| Agent | Name | Role |
|-------|------|------|
| bmad-tea | Murat | Master Test Architect |

### WDS Agents (Web Dev Studio)
| Agent | Name | Role |
|-------|------|------|
| wds-agent-freya-ux | Freya | UX Designer |
| wds-agent-saga-analyst | Saga | Business Analyst |

---

## Available Skills (40+ Total)

### Core Skills
- `bmad-help` - Interactive BMad help system
- `bmad-init` - Project initialization
- `bmad-brainstorming` - Brainstorming sessions
- `bmad-distillator` - Document compression
- `bmad-editorial-review-prose` - Prose review
- `bmad-editorial-review-structure` - Structure review
- `bmad-review-adversarial-general` - Adversarial review
- `bmad-review-edge-case-hunter` - Edge case analysis
- `bmad-party-mode` - Multi-agent discussions
- `bmad-index-docs` - Documentation indexing
- `bmad-shard-doc` - Document splitting

### BMM Workflow Skills
- `bmad-product-brief` - Product brief creation
- `bmad-create-prd` - PRD creation
- `bmad-edit-prd` - PRD editing
- `bmad-validate-prd` - PRD validation
- `bmad-create-ux-design` - UX design specs
- `bmad-create-architecture` - Architecture design
- `bmad-create-epics-and-stories` - Story breakdown
- `bmad-check-implementation-readiness` - Readiness check
- `bmad-generate-project-context` - Project context generation
- `bmad-create-story` - Story creation
- `bmad-dev-story` - Story implementation
- `bmad-quick-dev` - Rapid implementation
- `bmad-code-review` - Code review
- `bmad-sprint-planning` - Sprint planning
- `bmad-sprint-status` - Sprint status tracking
- `bmad-correct-course` - Course correction
- `bmad-retrospective` - Retrospectives
- `bmad-document-project` - Project documentation
- Research skills: `bmad-domain-research`, `bmad-market-research`, `bmad-technical-research`

### CIS Skills
- `bmad-cis-design-thinking` - Design thinking process
- `bmad-cis-innovation-strategy` - Innovation strategy
- `bmad-cis-problem-solving` - Problem solving
- `bmad-cis-storytelling` - Storytelling

### TEA Skills (Testing)
- `bmad-testarch-framework` - Test framework setup
- `bmad-testarch-atdd` - ATDD
- `bmad-testarch-automate` - Test automation
- `bmad-testarch-ci` - CI/CD pipeline
- `bmad-teach-me-testing` - Teaching testing

### WDS Skills
- WDS-specific skills for UX design, scenarios, and design systems

---

## How to Use BMad Skills

### Via AI Assistant Skills
All BMad skills are registered as project skills. Invoke them using the `skill` tool:

```
skill: "bmad-help"           # Get help
skill: "bmad-create-prd"     # Create PRD
skill: "bmad-create-architecture"  # Create architecture
skill: "bmad-agent-analyst"  # Talk to Mary (analyst)
skill: "bmad-agent-pm"       # Talk to John (PM)
skill: "bmad-agent-architect" # Talk to Winston (architect)
skill: "bmad-code-review"    # Review code
skill: "bmad-brainstorming"  # Brainstorm ideas
```

### Via Agent Invocation
You can also invoke agents by name:

```
"Talk to Mary about requirements"     # Business Analyst
"Talk to John about the PRD"          # Product Manager
"Talk to Winston about architecture"  # Architect
"Talk to Amelia about implementation" # Developer
"Talk to Quinn about testing"         # QA Engineer
"Talk to Bob about sprint planning"   # Scrum Master
```

### Via BMad Help
Run the help skill to get interactive guidance:

```
skill: "bmad-help"
```

---

## BMad Workflow Phases

### Phase 1: Analysis
1. Product Brief creation
2. Domain/Market/Technical research
3. Project documentation
4. Requirements elicitation

### Phase 2: Planning
1. PRD creation
2. UX Design specs
3. PRD validation
4. PRD editing

### Phase 3: Solutioning
1. Architecture design
2. Epic & story breakdown
3. Implementation readiness check
4. Project context generation

### Phase 4: Implementation
1. Sprint planning
2. Story creation
3. Story implementation
4. Code review
5. QA & testing
6. Sprint status tracking
7. Retrospectives

---

## Output Artifacts

All generated artifacts are stored in `_bmad-output/`:

- **`codebase/`** - Codebase analysis outputs
- **`implementation-artifacts/`** - Implementation outputs
- **`planning-artifacts/`** - Planning outputs (PRDs, UX specs, etc.)
- **`test-artifacts/`** - Test artifacts

Current artifacts include:
- `prd.md` - Product Requirements Document
- `architecture.md` - Architecture document
- `ui-spec.md` - UI specifications
- `epics-and-stories.md` - Epic and story breakdown
- `sprint-plan.md` - Sprint plan
- `design-comuni-*.md` - Design Comuni project docs (47 components, 38 pages)

---

## Configuration Notes

### Language Settings
- **User communication:** Italian (config.user.yaml)
- **Document output:** Italian (config.yaml)
- **Core module:** English (core/config.yaml)

### IDE Integration
- Configured for: **opencode**
- IDE config: `_bmad/_config/ides/opencode.yaml`

---

## Quick Reference

### Start a New Feature
1. `skill: "bmad-help"` - Get guidance
2. `skill: "bmad-create-prd"` - Create requirements
3. `skill: "bmad-create-architecture"` - Design solution
4. `skill: "bmad-create-epics-and-stories"` - Break into stories
5. `skill: "bmad-dev-story"` - Implement stories

### Review Code
1. `skill: "bmad-code-review"` - Adversarial review
2. `skill: "bmad-review-edge-case-hunter"` - Edge case analysis

### Get Help
1. `skill: "bmad-help"` - Interactive help system

---

## Links

- **Official Docs:** https://docs.bmad-method.org/
- **Installation Guide:** https://docs.bmad-method.org/get-started
- **GitHub:** https://github.com/bmad-code-org
- **Modules:**
  - CIS: https://github.com/bmad-code-org/bmad-module-creative-intelligence-suite
  - GDS: https://github.com/bmad-code-org/bmad-module-game-dev-studio.git
  - TEA: https://github.com/bmad-code-org/bmad-method-test-architecture-enterprise
  - WDS: https://github.com/bmad-code-org/bmad-method-wds-expansion

---

## Maintenance

### Updating BMad
BMad modules can be updated via their respective package managers or git repositories.

### Adding New Skills
New skills should be added in the `_bmad/` directory structure following the module conventions.

### Configuration Changes
Edit `_bmad/config.yaml` for project settings or `_bmad/config.user.yaml` for user preferences.

---

*Last verified: 2026-04-07*
