# CRM System - Version 6

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)
[![Laravel](https://img.shields.io/badge/Laravel-11.9-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white)](https://www.php.net)
[![Livewire](https://img.shields.io/badge/Livewire-4.x-FB70A9?logo=livewire&logoColor=white)](https://livewire.laravel.com)

> An international business platform built on Laravel + Livewire — multi-country/multi-language management, general-ledger accounting, and HLS video streaming in one CRM.

A specialized CRM system returning to Livewire with focus on international operations, featuring country/language management and accounting integration with HLS video support.

## Description

Version 6 brings the project full circle back to Livewire while introducing specialized features for international business operations. This version includes multi-country and multi-language support, general ledger integration for financial tracking, and HLS (HTTP Live Streaming) capabilities for video content management - suggesting evolution toward a media-focused business application.

## Tech Stack

- **Backend**: Laravel 11.9 (PHP 8.2+)
- **Frontend**: Livewire 4 + Volt 1.6
- **UI**: DaisyUI 5 + Tailwind CSS 4
- **UI Components**: Mary UI 2.8 (Livewire components)
- **Database**: SQLite/MySQL/PostgreSQL support
- **Build Tool**: Vite 8
- **Video**: HLS (HTTP Live Streaming) support

## Key Features

- **International Support**: Multi-country and multi-language management
- **General Ledger**: Accounting and financial transaction tracking
- **HLS Video Streaming**: HTTP Live Streaming video content delivery
- **DaisyUI Components**: Beautiful pre-built UI components
- **Mary UI**: Advanced Livewire component library
- **Real-time Updates**: Livewire-powered reactive interface
- **Financial Tracking**: Built-in accounting capabilities

## Data Models

- **User**: Authentication and user management
- **Country**: International country management
- **Language**: Multi-language support
- **GeneralLedgerEntry**: Financial accounting and transaction tracking

## Quickstart

Requires **PHP 8.2+**, **Composer**, and **Node.js**. The default setup runs on SQLite — no database server needed.

```bash
# 1. Clone
git clone https://github.com/stukenov/crm-v6.git
cd crm-v6

# 2. Install dependencies
composer install
npm install

# 3. Configure environment
cp .env.example .env
php artisan key:generate
touch database/database.sqlite

# 4. Run migrations
php artisan migrate

# 5. Build assets and serve
npm run build
php artisan serve
```

The app is now available at <http://localhost:8000>.

To switch from SQLite to MySQL/PostgreSQL, update the `DB_CONNECTION` and related `DB_*` values in your `.env` before running `php artisan migrate`.

## Development

For development with hot module replacement:

```bash
npm run dev
```

In a separate terminal:
```bash
php artisan serve
```

## HLS Video Support

This version includes an `hls/` directory for HTTP Live Streaming video content. The system can handle video streaming for media-related business operations.

## UI Components

This version uses DaisyUI for Tailwind CSS components and Mary UI for advanced Livewire components, providing:
- Pre-built, customizable UI elements
- Consistent design system
- Accessible components out of the box
- Simplified development workflow

## Architecture

V6 introduces specialized features:
- **Country/Language Models**: For international operations
- **General Ledger**: For financial tracking and accounting
- **HLS Integration**: For video content delivery
- **Component-Based UI**: DaisyUI + Mary UI for consistent design

This suggests evolution from a pure CRM toward an international media/content business platform with accounting capabilities.

## The CRM series

This repository is the latest entry in a deliberate, six-version exploration of CRM architectures. Rather than maintaining a single codebase, I rebuilt the same problem domain six times — each version a clean experiment in a different stack, frontend paradigm, or architectural philosophy. The goal was to understand the trade-offs firsthand: monolith vs. SPA, Blade/Livewire vs. React/Inertia, full-featured frameworks vs. simplified custom patterns.

The result is a side-by-side map of how the same CRM evolves across modern PHP/JS ecosystems — and **V6** (this repo) is where that journey lands: a Livewire-based international business platform with accounting and HLS video.

| Version | Focus | Stack | Repo |
| --- | --- | --- | --- |
| V1 | Initial CRM with a flexible, Node-based architecture | Laravel 11 + Livewire | [crm-v1](https://github.com/stukenov/crm-v1) |
| V2 | Full-featured CRM — Contacts, Deals, Interactions | Laravel + Jetstream | [crm-v2](https://github.com/stukenov/crm-v2) |
| V3 | Stability & optimization release on the V2 architecture | Laravel + Jetstream | [crm-v3](https://github.com/stukenov/crm-v3) |
| V4 | Modern SPA rewrite | React + Inertia.js + Material-UI + NextUI | [crm-v4](https://github.com/stukenov/crm-v4) |
| V5 | Experimental simplified architecture | Nuxt.js-inspired patterns | [crm-v5](https://github.com/stukenov/crm-v5) |
| **V6** ← you are here | **International business platform** — accounting, multi-language, HLS video | **Laravel 11 + Livewire** | [crm-v6](https://github.com/stukenov/crm-v6) |

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

Copyright (c) 2025 Saken Tukenov

## Development Timeline

This is Version 6 (September 2024) - Return to Livewire with international operations, accounting integration, and video streaming capabilities.
