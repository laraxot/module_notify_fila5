# 📊 Analysis Folder

> Structural and technical analysis of HTML, CSS, and component differences between reference and local homepage

**Status**: In Progress  
**Last Updated**: 2026-04-02  
**Related**: [← Master Index](../00-HOMEPAGE-REPLICATION-INDEX.md)

---

## 📄 Documents in This Folder

### 1. **01-HTML-STRUCTURE-ANALYSIS.md**
**Purpose**: Element-by-element structural comparison

- Reference vs. local element count
- Semantic HTML preservation
- DOM tree hierarchy differences
- Missing/extra elements inventory

🔗 [Read](./01-HTML-STRUCTURE-ANALYSIS.md) | [← Back](#-documents-in-this-folder)

---

### 2. **02-CSS-FRAMEWORK-AUDIT.md**
**Purpose**: Bootstrap Italia classes currently in use

- All `.container`, `.row`, `.col-*` usages
- Component classes: `.card`, `.btn-primary`, `.chip-simple`, etc.
- Typography classes: `.title-xsmall-semi-bold`, `.text-paragraph-medium`
- Icon and image classes
- Utility classes: `.d-none`, `.d-lg-block`, `.mb-5`, etc.

🔗 [Read](./02-CSS-FRAMEWORK-AUDIT.md) | [← Back](#-documents-in-this-folder)

---

### 3. **03-COMPONENT-BREAKDOWN.md**
**Purpose**: Visual component inventory

Analyzes each major section:
- **Hero section** - Image + news card layout
- **Governance cards** - 3-column grid with variants
- **Topics blocks** - Featured + secondary grids
- **Calendar carousel** - Event slides
- **Useful links** - Search + quick link grid
- **Contact blocks** - Icon + text patterns

🔗 [Read](./03-COMPONENT-BREAKDOWN.md) | [← Back](#-documents-in-this-folder)

---

### 4. **04-RESPONSIVE-PATTERNS.md**
**Purpose**: Responsive design behavior mapping

- Breakpoint triggers (mobile: <768px, tablet: 768-1024px, desktop: >1024px)
- Element reflow patterns at each breakpoint
- Grid reordering (`order-2 order-lg-1` patterns)
- Image/text stacking behavior
- Hidden/shown elements by viewport

🔗 [Read](./04-RESPONSIVE-PATTERNS.md) | [← Back](#-documents-in-this-folder)

---

## 🔍 How to Use Analysis Results

1. **Starting a component refactor?** → Read [03-COMPONENT-BREAKDOWN.md](./03-COMPONENT-BREAKDOWN.md)
2. **Creating Tailwind mappings?** → Review [02-CSS-FRAMEWORK-AUDIT.md](./02-CSS-FRAMEWORK-AUDIT.md)
3. **Debugging structure issues?** → Check [01-HTML-STRUCTURE-ANALYSIS.md](./01-HTML-STRUCTURE-ANALYSIS.md)
4. **Implementing responsive CSS?** → See [04-RESPONSIVE-PATTERNS.md](./04-RESPONSIVE-PATTERNS.md)

---

## 🎯 Next Steps

1. **Capture screenshots** at 3 viewports
2. **Feed analysis data** into [Mappings Folder](../mappings/)
3. **Reference components** from [Visual Comparison](../visual-comparison/)
4. **Execute phases** from [Phases Folder](../phases/)

---

## 🔗 Related Documents

| Document | Purpose |
|----------|---------|
| [Screenshots](../screenshots/) | Raw visual data |
| [Visual Comparison](../visual-comparison/) | Annotated screenshots |
| [Mappings](../mappings/) | Bootstrap → Tailwind translation |
| [Phases](../phases/) | Execution plans using analysis |

---

**Navigation**: 
- [← Back to Master Index](../00-HOMEPAGE-REPLICATION-INDEX.md)
- [Next: Screenshots →](../screenshots/README.md)

