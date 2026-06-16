# 🤖 Multi-Agent AI Teams - Collaboration Guide

> **Last Updated**: 2026-03-13  
> **Status**: ✅ Active  
> **Version**: 1.0

---

## 🎯 Overview

This guide establishes how multiple AI agents collaborate on the same codebase, avoiding conflicts and maximizing efficiency.

---

## 👥 Agent Teams

### Team Structure

```
🤖 AI Agent Teams
├── 🔧 Infrastructure Team
│   ├── GitHub Actions
│   ├── CI/CD
│   └── DevOps
├── 📚 Documentation Team
│   ├── Module Docs
│   ├── Theme Docs
│   └── API Docs
├── 🧪 Testing Team
│   ├── Unit Tests
│   ├── Integration Tests
│   └── E2E Tests
└── 🎨 Frontend Team
    ├── Components
    ├── Styles
    └── UX
```

---

## 📋 Collaboration Rules

### Rule #1: Always Check Existing Work

**BEFORE starting a task**:
```bash
# Check recent commits
git log -n 10 --oneline

# Check GitHub Actions
gh run list --repo laraxot/base_fixcity_fila5

# Check open PRs
gh pr list --repo laraxot/base_fixcity_fila5
```

---

### Rule #2: Communicate via GitHub

**ALWAYS use**:
- ✅ GitHub Issues for tasks
- ✅ GitHub Discussions for questions
- ✅ GitHub PRs for changes
- ✅ Comments for updates

**NEVER**:
- ❌ Work in silence
- ❌ Duplicate others' work
- ❌ Force push without checking

---

### Rule #3: Sync .github Properly

**CRITICAL**: When updating `.github/`:

```bash
# 1. Update .github/workflows/
# Edit files...

# 2. Sync to bashscripts/ai/.github/
mkdir -p bashscripts/ai/.github/workflows
cp .github/workflows/*.yml bashscripts/ai/.github/workflows/

# 3. Document sync
echo "## $(date)" >> bashscripts/ai/.github/SYNC_LOG.md
echo "- Synced: $(ls .github/workflows/)" >> bashscripts/ai/.github/SYNC_LOG.md

# 4. Commit BOTH
git add .github/ bashscripts/ai/.github/
git commit -m "Sync .github with bashscripts/ai/.github"
git push
```

---

### Rule #4: Test Before Declaring Complete

**NEVER say "complete" without**:
1. ✅ Code committed
2. ✅ Pushed to GitHub
3. ✅ GitHub Actions passing
4. ✅ Logs checked
5. ✅ Documentation updated

---

## 🔄 Workflow for Multi-Agent Tasks

### Step 1: Check Current State

```bash
# What's being worked on?
gh issue list --repo laraxot/base_fixcity_fila5 --state open
gh pr list --repo laraxot/base_fixcity_fila5 --state open

# Recent activity
git log -n 20 --oneline
```

---

### Step 2: Claim Your Task

```bash
# Create or comment on issue
gh issue comment <number> --body "@agent-name working on this"

# Create branch
git checkout -b agent/<task-name>
```

---

### Step 3: Do Your Work

```bash
# Make changes
# Test locally
# Commit frequently

git add .
git commit -m "feat: my change"
```

---

### Step 4: Sync & Push

```bash
# Pull latest changes
git pull --rebase origin dev

# Sync .github if needed
cp .github/workflows/*.yml bashscripts/ai/.github/workflows/

# Push
git push origin agent/<task-name>
```

---

### Step 5: Create PR

```bash
gh pr create \
  --title "feat: my feature" \
  --body "Description of changes" \
  --base dev
```

---

### Step 6: Monitor & Fix

```bash
# Check CI
gh run list --repo laraxot/base_fixcity_fila5

# If fails, check logs
gh run view <run-id> --log

# Fix and push more commits
```

---

## 📊 Conflict Resolution

### When Two Agents Work on Same File

**Scenario**: Agent A and Agent B both edit `.github/workflows/ci.yml`

**Solution**:
1. ✅ **Communicate**: Comment on issue/PR
2. ✅ **Coordinate**: Who finishes first?
3. ✅ **Merge**: Second agent rebases on first
4. ✅ **Test**: Verify merged changes work

---

### When GitHub Actions Fail

**Scenario**: Multiple agents trigger workflows

**Solution**:
1. ✅ **Wait**: Let one finish
2. ✅ **Check**: Review logs
3. ✅ **Fix**: Whoever broke it fixes it
4. ✅ **Retry**: Re-run workflows

---

## 🎯 Best Practices

### Documentation

- ✅ Document EVERY change
- ✅ Update SYNC_LOG.md
- ✅ Comment your code
- ✅ Create/update guides

### Communication

- ✅ Comment on issues
- ✅ Update PR descriptions
- ✅ Tag other agents
- ✅ Ask questions in Discussions

### Testing

- ✅ Test locally first
- ✅ Monitor GitHub Actions
- ✅ Fix failures immediately
- ✅ Don't leave broken builds

---

## 📚 Resources

### GitHub Features

| Feature | Purpose | Link |
|---------|---------|------|
| **Issues** | Task tracking | /issues |
| **Discussions** | Q&A, ideas | /discussions |
| **PRs** | Code review | /pulls |
| **Actions** | CI/CD | /actions |
| **Projects** | Kanban boards | /projects |

### Commands Reference

```bash
# Check status
gh run list --repo <owner>/<repo>
gh pr list --repo <owner>/<repo>
gh issue list --repo <owner>/<repo>

# View details
gh run view <id> --log
gh pr view <id>
gh issue view <id>

# Create items
gh issue create --title "..." --body "..."
gh pr create --title "..." --body "..."
```

---

## 🤝 Agent Responsibilities

### Every Agent Must:

1. ✅ Check existing work before starting
2. ✅ Communicate via GitHub
3. ✅ Sync .github properly
4. ✅ Test before declaring complete
5. ✅ Document everything
6. ✅ Help other agents
7. ✅ Never leave broken builds

---

## 📈 Success Metrics

| Metric | Target | How to Measure |
|--------|--------|----------------|
| **Conflicts** | < 5% | Git merge conflicts / total commits |
| **Duplicate Work** | 0% | Issues with "duplicate" label |
| **Broken Builds** | < 10% | Failed Actions / total Actions |
| **Documentation** | 100% | All changes have docs |

---

**Created**: 2026-03-13  
**By**: Multi-Agent AI Team  
**Purpose**: Enable seamless collaboration
