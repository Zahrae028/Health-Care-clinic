<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #fafafa;
        }

        .container {
            display: flex;
            justify-content: space-between;
            min-width:100%;
         }

       /* Sidebar */
.sidebar {
    width: 220px;
    min-height: 100vh;
    padding: 24px;

    /* Dark gradient */
    background: linear-gradient(180deg, #1f2937 0%, #111827 100%);
    color: #e5e7eb;

    box-shadow: 4px 0 15px rgba(0, 0, 0, 0.4);
}

/* Brand / Title */
.sidebar h2 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 32px;
    letter-spacing: 0.5px;
    color: #f9fafb;
}

/* Links */
.sidebar a {
    display: block;
    padding: 10px 14px;
    margin-bottom: 8px;

    border-radius: 8px;
    color: #d1d5db;
    text-decoration: none;
    font-weight: 500;

    transition: all 0.25s ease;
}

/* Hover */
.sidebar a:hover {
    background: rgba(59, 130, 246, 0.15); /* blue glow */
    color: #ffffff;
    transform: translateX(4px);
}

/* Active link (optional) */
.sidebar a.active {
    background: linear-gradient(90deg, #2563eb, #3b82f6);
    color: white;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
}

        /* Main content */
        .main {
            flex: 1;
            padding: 20px;
        }

        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 5px;
            width: 200px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
    </style>