# 🏠 Homepage Replication Project - Master Index

> Complete guide for replicating the reference Design Comuni homepage in Tailwind CSS + Alpine.js
>
> **Status**: Planning Phase  
> **Last Updated**: 2026-04-02  
> **Team**: Multi-agent orchestration  

---

## 📚 Documentation Structure

This index provides bidirectional links to all analysis documents, screenshots, and phase plans.

### Quick Links

| Section | Purpose | Link |
|---------|---------|------|
| **Analysis** | Structure & CSS mapping | → [analysis/](analysis/) |
| **Screenshots** | Visual comparison at multiple viewports | → [screenshots/](screenshots/) |
| **Visual Comparison** | Annotated side-by-side analysis | → [visual-comparison/](visual-comparison/) |
| **Mappings** | Bootstrap Italia → Tailwind class translations | → [mappings/](mappings/) |
| **Phases** | Work breakdown & execution plans | → [phases/](phases/) |

---

## 🎯 Project Goal

**Primary Objective**: Make `http://127.0.0.1:8000/it/tests/homepage` visually identical to reference `https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html`

**Constraints**:
- ❌ NO Bootstrap Italia CSS
- ✅ Use Tailwind CSS only
- ✅ Use Alpine.js for interactivity
- 📂 Work within: `laravel/Themes/Sixteen`
- 🔨 Build: `npm run build && npm run copy`

---

## 📋 Current State Assessment

```
HTML Structure Match:    ✅ ~90% (reference: 159 elements, local: 127 elements)
CSS Framework:           ⚠️  Mixed (Bootstrap Italia + Tailwind)
Components Rendering:    ⏳ Partial (structure OK, styling incomplete)
Interactivity:           ⏳ Some Alpine.js, needs expansion
Visual Parity:           ❌ Not yet achieved
```

---

## 🗂️ Documentation Organization

### [1. Analysis Folder](./analysis/)

Contains structural and technical analysis documents:

- **`01-HTML-STRUCTURE-ANALYSIS.md`** - Element-by-element comparison
- **`02-CSS-FRAMEWORK-AUDIT.md`** - Bootstrap Italia classes in use
- **`03-COMPONENT-BREAKDOWN.md`** - Hero, cards, grids, modals inventory
- **`04-RESPONSIVE-PATTERNS.md`** - Breakpoint and reflow analysis

🔗 **Back to**: [INDEX](#-documentation-structure)

### [2. Screenshots Folder](./screenshots/)

Raw screenshot files for visual comparison:

- `reference_desktop.png` - Reference at 1920×1080
- `reference_tablet.png` - Reference at 768×1024
- `reference_mobile.png` - Reference at 375×667
- `local_desktop.png` - Local at 1920×1080
- `local_tablet.png` - Local at 768×1024
- `local_mobile.png` - Local at 375×667

**Usage**: Import into Figma/Miro for detailed visual annotation

🔗 **Back to**: [INDEX](#-documentation-structure)

### [3. Visual Comparison Folder](./visual-comparison/)

Annotated analysis of screenshots:

- **`01-VISUAL-DIFF-DESKTOP.md`** - Side-by-side analysis @ 1920px
- **`02-VISUAL-DIFF-TABLET.md`** - Responsive breakdown @ 768px
- **`03-VISUAL-DIFF-MOBILE.md`** - Mobile challenges @ 375px
- **`04-STYLING-ISSUES-SUMMARY.md`** - Consolidated problem list

🔗 **Back to**: [INDEX](#-documentation-structure)

### [4. Mappings Folder](./mappings/)

Bootstrap Italia → Tailwind translation tables:

- **`01-BOOTSTRAP-CLASSES-INVENTORY.md`** - All Bootstrap Italia classes used
- **`02-TAILWIND-EQUIVALENTS.md`** - Corresponding Tailwind utilities
- **`03-CUSTOM-COMPONENTS-MAP.md`** - `.chip`, `.read-more`, etc. → Tailwind
- **`04-COLOR-TOKEN-MAPPING.md`** - AGID colors → Tailwind config

🔗 **Back to**: [INDEX](#-documentation-structure)

### [5. Phases Folder](./phases/)

Execution work breakdown:

- **`01-PHASE-A-DISCOVERY.md`** - Analysis & planning (in progress)
- **`02-PHASE-B-CONFIG.md`** - Tailwind configuration
- **`03-PHASE-C-COMPONENTS.md`** - Component refactoring (Wave 1)
- **`04-PHASE-D-INTERACTIVITY.md`** - Alpine.js enhancement (Wave 2)
- **`05-PHASE-E-POLISH.md`** - Testing & refinement

🔗 **Back to**: [INDEX](#-documentation-structure)

---

## 🚀 Execution Roadmap

### Phase A: Discovery (Today)
**Goal**: Complete inventory of differences
- ✅ Capture screenshots at 3 viewports
- ✅ Extract HTML structure diff
- ✅ Map all Bootstrap Italia classes
- ⏳ Create visual analysis docs

### Phase B: Configuration (Tomorrow)
**Goal**: Tailwind + Alpine ready
- ⏳ Update `tailwind.config.js` with AGID tokens
- ⏳ Create custom component utilities
- ⏳ Test build pipeline

### Phase C: Components (Day 2)
**Goal**: Hero + governance cards matching reference
- ⏳ Refactor hero section CSS
- ⏳ Refactor governance cards grid
- ⏳ Verify responsive behavior

### Phase D: Interactivity (Day 3)
**Goal**: Alpine.js behavior matching
- ⏳ Governance calendar carousel
- ⏳ Language dropdown
- ⏳ Search modal

### Phase E: Polish (Day 3-4)
**Goal**: Final visual parity
- ⏳ Responsive testing all breakpoints
- ⏳ Accessibility audit (WCAG AA)
- ⏳ Build size optimization

---

## 📊 Success Criteria

| Criterion | Target | Status |
|-----------|--------|--------|
| Visual Parity | 98%+ match @ all viewports | ⏳ |
| HTML Structure | 95%+ elements match | ✅ (90%) |
| CSS Framework | 0% Bootstrap Italia imports | ⏳ |
| Performance | <100KB CSS | ⏳ |
| Accessibility | Lighthouse a11y ≥90 | ⏳ |
| Build | `npm run build && npm run copy` success | ✅ |

---

## 🤝 Team & Agents

### Human Lead
- Project coordinator & UAT

### Agent Roles

| Agent | Responsibility | Docs |
|-------|-----------------|------|
| **Explorer** | Codebase analysis, screenshot capture | → [analysis/](analysis/) |
| **Developer** | CSS/JS implementation, component refactoring | → [phases/](phases/) |
| **Architect** | Design system decisions, config | → [mappings/](mappings/) |
| **QA Verifier** | Testing, accessibility audit | → [visual-comparison/](visual-comparison/) |

---

## 📁 File References

### Template Files
- Blade template: `laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`
- Data JSON: `laravel/config/local/fixcity/database/content/pages/tests.homepage.json`

### Build Configuration
- Tailwind config: `laravel/Themes/Sixteen/tailwind.config.js`
- Vite config: `laravel/Themes/Sixteen/vite.config.js`
- Styles: `laravel/Themes/Sixteen/resources/css/`

### Documentation Root
- Project context: `bashscripts/ai/.agents/docs/project-context.md`

---

## 🔍 How to Use This Index

1. **Start here** if you're new: Read the [Project Goal](#-project-goal) section
2. **For structure questions**: Check [Analysis Folder](./analysis/)
3. **For visual issues**: See [Visual Comparison Folder](./visual-comparison/)
4. **For implementation**: Visit [Phases Folder](./phases/)
5. **For class mapping**: Browse [Mappings Folder](./mappings/)
6. **For screenshots**: Open [Screenshots Folder](./screenshots/)

---

## 🔗 Related Documentation

**Project Context**:
- [Project Context](../../../../bashscripts/ai/.agents/docs/project-context.md)

**Theme Architecture**:
- [Sixteen Theme](../architecture/)
- [Components](../components/)

**Navigation**:
- Parent: `laravel/Themes/Sixteen/docs/`
- Sibling: Design Comuni docs (`design-comuni/`)
- Related: Modules (`laravel/Modules/*/docs/`)

---

## 📝 Contributing

When adding documentation:

1. Follow naming convention: `NN-KEBAB-CASE-TITLE.md` (NN = order)
2. Add bidirectional links (← Back to INDEX, → Next section)
3. Include metadata: Status, Last Updated, Owner
4. Add to this index under appropriate folder
5. Link from corresponding folder README

**Example metadata**:
```markdown
---
status: in-progress
author: agent-name
last-updated: 2026-04-02
reviewed: false
---
```

---

## 📞 Contact & Support

- **Issues**: Check [GitHub Issues](#) (if integrated)
- **Questions**: Review relevant folder README
- **Updates**: Run `/gsd-progress` to check phase status

---

**Last Updated**: 2026-04-02 09:59 UTC  
**Next Review**: When Phase A completes

