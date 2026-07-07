# Block 01: Header Slim Wrapper

## Description

Top header bar with region name, language selector, and login button.

## HTML Structure (Reference)

```html
<div class="it-header-slim-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="it-header-slim-wrapper-content">
          <a class="d-lg-block navbar-brand" target="_blank" href="#">Nome della Regione</a>
          <div class="it-header-slim-right-zone" role="navigation">
            <!-- Language dropdown -->
            <!-- Login button -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
```

## HTML Structure (Local)

```html
<div class="it-header-slim-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="it-header-slim-wrapper-content">
          <a class="d-lg-block navbar-brand" target="_blank" href="#">Nome della Regione</a>
          <div class="it-header-slim-right-zone" role="navigation">
            <!-- Language dropdown -->
            <!-- Login button -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
```

## Similarity: 100%

## Differences

| Aspect | Reference | Local |
|--------|-----------|-------|
| CSS Framework | Bootstrap Italia | Tailwind CSS |
| Asset Paths | `../assets/...` | `/themes/Sixteen/...` |

## CSS Required

- Header slim background color
- Font styles for region name
- Button styling for login
- Dropdown styling for language

## Agent Notes

This block is fully aligned. Focus only on CSS styling if visual differences exist.
