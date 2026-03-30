# Implementation: /my-tickets Folio Page

## Overview
The `/my-tickets` page provides a dynamic dashboard for authenticated users to view and manage their submitted tickets.

## Components
- **Folio Route**: `laravel/Themes/Sixteen/resources/views/pages/my-tickets.blade.php`
- **Volt Component**: Inline class-based component managing state for search and status filtering.
- **Model**: `Modules\Fixcity\Models\Ticket`

## Features
- **Statistics**: Display total, pending, and resolved tickets for the current user.
- **Filtering**: Real-time filtering by name (search) and status.
- **Responsive List**: A table-based list of tickets with status badges and type icons.
- **Empty State**: CTA to create the first ticket if none found.

## Technical Details
- **Middleware**: `auth`, `verified` enforced at route level.
- **Query Optimization**: Uses eager loading (conceptually, to be refined if needed).
- **Icons**: Uses `x-dynamic-component` with icons retrieved from `TicketTypeEnum`.

## Roadmap Alignment
- Part of Phase 2, Epic 2.1 (Citizen Dashboard).
