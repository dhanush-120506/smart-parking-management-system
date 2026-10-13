# Smart Parking Management System
Course: CS23531 – Web Programming

A web application to manage parking slots: park a vehicle, auto-assign a free slot,
exit with automatic fee calculation, and view parking history.

## How the project maps to the syllabus
| Unit | Topic | Where it is used |
|------|-------|------------------|
| I   | HTML, CSS, Bootstrap, Hosting & Git | `index.php`, `history.php`, `css/style.css`, Bootstrap grid/cards/forms/navbar |
| II  | JavaScript: DOM, forms, events | `js/app.js` (form validation, event handlers, fetch, dynamic slot grid) |
| III | PHP + MySQL, Bootstrap | `api/*.php`, `config/db.php`, `includes/`, `database/schema.sql` |
| IV  | ReactJS basics, JSX, components, API, life cycle | `react-app/src` |
| V   | React data flow: state, props, prop validation, hooks, routing | `useState`, `useEffect`, custom hook `useSlots`, `PropTypes`, `react-router-dom` |

## Run the PHP + Bootstrap version
1. Install XAMPP (Apache + MySQL) and start both.
2. Copy this folder to `C:\xampp\htdocs\smart-parking-system`.
3. Open phpMyAdmin → Import → choose `database/schema.sql`.
4. If your MySQL password is not empty, edit `config/db.php`.
5. Open http://localhost/smart-parking-system/

## Run the React version (needs Node.js 18+)
```
cd react-app
npm install
npm run dev
```
Open http://localhost:5173 (the PHP API must be running; adjust `VITE_API_URL` in `react-app/.env` if needed).

## API endpoints
| Method | URL | Purpose |
|--------|-----|---------|
| GET  | api/slots.php   | List all slots with current vehicle |
| POST | api/park.php    | `{vehicle_no, slot_id}` (slot_id 0 = auto-assign) |
| POST | api/exit.php    | `{vehicle_no}` → returns hours billed and fee |
| GET  | api/history.php | Last 100 bookings |

Fee rule: Rs. 20 per hour, minimum 1 hour (change `RATE_PER_HOUR` in `config/db.php`).

## Git (Unit I – hosting a website and Git)
```
git init
git add .
git commit -m "Smart Parking Management System"
```

## Ideas to extend
Admin login with PHP sessions, different rates per slot type, QR-code tickets, reports by date.
