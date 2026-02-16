# CRM System - Version 6

A specialized CRM system returning to Livewire with focus on international operations, featuring country/language management and accounting integration with HLS video support.

## Description

Version 6 brings the project full circle back to Livewire while introducing specialized features for international business operations. This version includes multi-country and multi-language support, general ledger integration for financial tracking, and HLS (HTTP Live Streaming) capabilities for video content management - suggesting evolution toward a media-focused business application.

## Tech Stack

- **Backend**: Laravel 11.9 (PHP 8.2+)
- **Frontend**: Livewire 3.5 + Volt 1.6
- **UI**: DaisyUI 4.12 + Tailwind CSS 3.4
- **UI Components**: Mary UI 1.35 (Livewire components)
- **Database**: SQLite/MySQL/PostgreSQL support
- **Build Tool**: Vite 5
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

## Installation

1. Clone the repository:
```bash
git clone https://github.com/stukenov/crm-v6.git
cd crm-v6
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Setup environment:
```bash
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
```

4. Initialize database:
```bash
php artisan migrate
```

5. Build and serve:
```bash
npm run build
php artisan serve
```

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

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

Copyright (c) 2025 Saken Tukenov

## Development Timeline

This is Version 6 (September 2024) - Return to Livewire with international operations, accounting integration, and video streaming capabilities.
