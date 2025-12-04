# LARAVEL-ACTION-BREEZE-WEATHER

*Weather Made Simple. Experience Unmatched Clarity*

![Laravel](https://img.shields.io/badge/laravel-v11.x-red)
![Vue](https://img.shields.io/badge/vue-v3.x-green)
![Tailwind](https://img.shields.io/badge/tailwind-v3.x-blue)

*Built with the tools and technologies:*

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vue.js&logoColor=4FC08D)
![Inertia](https://img.shields.io/badge/Inertia.js-9553E9?style=for-the-badge&logo=inertia&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Axios](https://img.shields.io/badge/Axios-5A29E4?style=for-the-badge&logo=axios&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)

## Table of Contents

- [Overview](#overview)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Testing](#testing)

## Overview

Laravel Action Breeze Weather is a modern weather application built with Laravel Actions architecture, featuring real-time weather data integration with a beautiful Vue.js frontend. This project combines the power of Laravel's backend capabilities with Inertia.js for seamless SPA experiences, styled with Tailwind CSS for a professional interface.

## Getting Started

### Prerequisites

This project requires the following dependencies:

- **Programming Language:** PHP 8.2+
- **Package Manager:** Composer, Npm

### Installation

Build laravel-action-breeze-weather from the source and install dependencies:

1. **Clone the repository:**

```bash
git clone https://github.com/anggavb/laravel-action-breeze
```

2. **Navigate to the project directory:**

```bash
cd laravel-action-breeze
```

3. **Install the dependencies:**

Using **composer**:

```bash
composer install
```

Using **npm**:

```bash
npm install
```

4. **Set up environment:**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure database:**

```bash
php artisan migrate
```

### Usage

Run the project with:

Using **composer**:

```bash
php artisan serve
```

Using **npm**:

```bash
npm run dev
```

### Testing

Laravel Action Breeze Weather uses the **pest framework** test framework. Run the test suite with:

Using **composer**:

```bash
vendor/bin/phpunit
```

Using **npm**:

```bash
npm test
```

## Features

### Weather Application
- 🌤️ **Real-time Weather Data:** Integration with OpenWeatherMap API
- 🌍 **Global City Search:** Search weather for any city worldwide
- 📱 **Responsive Design:** Beautiful UI optimized for all devices
- 🔐 **Authentication Protected:** Secure access after user login
- ⚡ **Fast Performance:** Built with modern web technologies
- 🎨 **Tailwind CSS Styling:** Professional and clean interface

### Technical Stack
- **Backend:** Laravel 11.x with Actions architecture
- **Frontend:** Vue.js 3.x with Inertia.js
- **Styling:** Tailwind CSS
- **Database:** SQLite (configurable)
- **API Integration:** OpenWeatherMap API
- **Build Tool:** Vite

### Weather Data Display
- Current temperature and weather conditions
- Humidity and wind speed information
- "Feels like" temperature
- Weather icons and descriptions
- Location-based weather tips

## Configuration

### OpenWeatherMap API Setup

1. Register at [OpenWeatherMap](https://openweathermap.org/api)
2. Get your free API key
3. Add to your `.env` file:

```env
OPENWEATHER_API_KEY=your_api_key_here
```

**Note:** The application works with demo data when API key is not configured.

## Architecture

### Laravel Actions
This project uses Laravel Actions for a clean, organized codebase:

- `WeatherAction.php` - Handles weather-related routes and logic
- Action-based routing for better code organization
- Middleware protection for authenticated routes

### Frontend Structure
- `Weather.vue` - Main weather component
- `AuthenticatedLayout.vue` - Navigation with weather menu
- Axios for API communication
- Vue 3 Composition API

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Weather App Feature

This application includes a simple weather app feature that becomes available after user login.

### Features

- Search weather by city name
- Display current temperature, weather description, and weather icon
- Show additional details: feels like temperature, humidity, and wind speed
- Responsive design with Tailwind CSS
- Weather tips based on current conditions
- Quick search buttons for popular cities

### Setup

1. **Get OpenWeatherMap API Key** (optional):
   - Register at [OpenWeatherMap](https://openweathermap.org/api)
   - Get your free API key
   - Add it to your `.env` file: `OPENWEATHER_API_KEY=your_api_key_here`

2. **Without API Key**:
   - The app will work with demo data when API key is not available
   - Perfect for testing and development

### Usage

1. Login to your account
2. Navigate to "Weather" in the main menu
3. Enter a city name (e.g., Jakarta, London, Tokyo)
4. View the weather information with beautiful Tailwind CSS styling

### Technical Details

- **Backend**: Laravel Action-based architecture
- **Frontend**: Vue.js with Inertia.js
- **Styling**: Tailwind CSS
- **API**: OpenWeatherMap API with fallback to demo data
- **Authentication**: Required (middleware protected routes)
