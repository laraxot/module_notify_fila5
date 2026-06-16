# Product Roadmap - User Module

**Version:** 1.0.0  
**Last Updated:** 2026-03-13  
**Status:** Draft  

---

## Overview

The User module provides comprehensive user management including authentication, authorization, roles, teams, and OAuth integration.

## Vision

Provide enterprise-grade user management with best-in-class security, seamless OAuth integration, and intuitive administration.

## Current State

- **Authentication:** Laravel Fortify, Socialite
- **Authorization:** Spatie Roles/Permissions
- **Features:** 2FA, Teams, OAuth
- **PHPStan:** In progress

## Roadmap

### Q1 2026 - Security & Stability

| Feature | Status | Priority | Notes |
|---------|--------|----------|-------|
| PHPStan Level 10 | In Progress | Critical | Fix type errors |
| 2FA Enhancement | In Progress | High | TOTP improvements |
| Session Management | Planned | High | Better control |
| Password Policies | Planned | Medium | Strength rules |

### Q2 2026 - Authentication v2

| Feature | Status | Priority | Notes |
|---------|--------|----------|-------|
| OAuth2 Expansion | Planned | High | More providers |
| Passwordless Auth | Planned | Medium | Magic links |
| SSO Integration | Planned | Medium | SAML/OIDC |
| MFA Options | Planned | Medium | More methods |

### Q3-Q4 2026 - Enterprise

| Feature | Status | Priority | Notes |
|---------|--------|----------|-------|
| Directory Sync | Planned | High | LDAP/AD |
| Audit Logging | Planned | High | User actions |
| Delegation | Planned | Medium | Act-as feature |
| API Tokens v2 | Planned | Medium | Better management |

## Key Deliverables

1. **User Authentication** - Secure login/registration
2. **Role Management** - RBAC with Spatie
3. **Team Support** - Multi-team permissions
4. **OAuth Integration** - Microsoft, Google, GitHub
5. **2FA** - TOTP authentication

## Dependencies

- Xot module (base classes)
- Spatie Laravel Permission
- Laravel Socialite
- Laravel Fortify

## Success Metrics

| Metric | Target | Current |
|--------|--------|---------|
| PHPStan Errors | 0 | ~30 |
| Auth Security | A+ | A |
| OAuth Providers | 5+ | 3 |

---

*Template based on Notion Product Roadmap patterns*
