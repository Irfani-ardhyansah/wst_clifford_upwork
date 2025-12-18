<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WST Member Portal & Asset Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #000000;
            --accent: #0d9488;
            --accent-dark: #0f766e;
            --bg-gray: #f8fafc;
        }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-gray); }
        .glass-panel { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        .modal-overlay { background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px); }
        
        .fade-in { animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        .nav-btn.active { background-color: rgba(255,255,255,0.1); border-right: 3px solid var(--accent); }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #ccc; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #999; }
        
        /* Card hover effect */
        .asset-card { transition: all 0.3s ease; }
        .asset-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(0,0,0,0.12); }
    </style>
</head>
<body class="text-gray-800 h-screen flex overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-black text-white flex flex-col shadow-xl z-20 hidden md:flex">
        <div class="p-6 border-b border-gray-800">
            <h1 class="text-2xl font-bold tracking-tight">Water Solutions<span class="text-teal-500">Tech</span></h1>
            <p class="text-xs text-gray-500 mt-1">Member Portal</p>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 px-3">Browse</p>
            
            <button onclick="router('portal')" id="nav-portal" class="nav-btn active w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-300">
                <i class="fa-solid fa-layer-group w-5"></i> All Resources
            </button>
            <button onclick="filterAssets('White Paper')" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                <i class="fa-solid fa-file-lines w-5"></i> White Papers
            </button>
            <button onclick="filterAssets('Case Study')" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                <i class="fa-solid fa-briefcase w-5"></i> Case Studies
            </button>
            <button onclick="filterAssets('Webinar')" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                <i class="fa-solid fa-video w-5"></i> Webinars
            </button>
            <button onclick="filterAssets('Tool')" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                <i class="fa-solid fa-calculator w-5"></i> Tools & Calculators
            </button>

            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mt-8 mb-3 px-3">Quick Links</p>
            <a href="https://watersolutech.com" target="_blank" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                <i class="fa-solid fa-arrow-up-right-from-square w-5"></i> Main Website
            </a>
            <a href="mailto:info@watersolutech.com" class="nav-btn w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800/50 transition flex items-center gap-3 text-gray-400">
                <i class="fa-solid fa-envelope w-5"></i> Contact Support
            </a>
        </nav>

        <!-- User Profile Section -->
        <div class="p-4 border-t border-gray-800">
            <div id="user-profile" class="hidden">
                <div class="flex items-center gap-3 mb-3 p-2 rounded-lg bg-gray-800/50">
                    <div class="w-10 h-10 rounded-full bg-teal-600 flex items-center justify-center text-sm font-bold" id="user-initials">AB</div>
                    <div class="overflow-hidden flex-1">
                        <p class="text-sm font-semibold truncate" id="user-name-display">User Name</p>
                        <p class="text-xs text-gray-400 truncate" id="user-company-display">Company</p>
                    </div>
                </div>
                <button onclick="logout()" class="text-xs text-gray-500 hover:text-red-400 w-full text-left px-2 transition">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i>Sign Out
                </button>
            </div>
            <button onclick="router('admin-login')" class="text-xs text-gray-600 hover:text-gray-400 mt-4 w-full text-center transition">
                <i class="fa-solid fa-lock mr-1"></i> Admin Access
            </button>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        
        <!-- Mobile Header -->
        <header class="bg-white shadow-sm p-4 flex justify-between items-center md:hidden z-10">
            <h1 class="font-bold text-lg">WST Portal</h1>
            <button onclick="toggleMobileMenu()" class="text-gray-600 text-xl"><i class="fa-solid fa-bars"></i></button>
        </header>

        <div id="app-container" class="flex-1 overflow-y-auto p-6 md:p-8 relative">
            
            <!-- PORTAL VIEW -->
            <div id="view-portal" class="fade-in">
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-black to-gray-900 text-white rounded-2xl p-8 mb-8 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.4&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                    <div class="relative z-10">
                        <h2 class="text-2xl md:text-3xl font-bold mb-2" id="welcome-text">Welcome to the Resource Library</h2>
                        <p class="text-gray-400 max-w-xl">Access our premium collection of white papers, case studies, webinars, and industry tools for water management optimization.</p>
                    </div>
                </div>

                <!-- Filter Bar -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900" id="section-title">All Resources</h3>
                        <p class="text-sm text-gray-500" id="asset-count">Loading...</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <input type="text" id="search-input" onkeyup="searchAssets()" placeholder="Search resources..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none w-64">
                            <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        </div>
                    </div>
                </div>

                <!-- Asset Grid -->
                <div id="asset-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Populated by JS -->
                </div>
            </div>

            <!-- ADMIN VIEW -->
            <div id="view-admin" class="hidden fade-in">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Admin Dashboard</h2>
                        <p class="text-sm text-gray-500">Manage assets and track engagement</p>
                    </div>
                    <button onclick="router('portal')" class="text-sm text-teal-600 hover:text-teal-700 font-medium">
                        <i class="fa-solid fa-arrow-left mr-2"></i>Back to Portal
                    </button>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Assets</p>
                        <p class="text-3xl font-bold mt-1" id="stat-assets">0</p>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Views</p>
                        <p class="text-3xl font-bold mt-1 text-teal-600" id="stat-views">0</p>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Registered Users</p>
                        <p class="text-3xl font-bold mt-1" id="stat-users">0</p>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Top Asset</p>
                        <p class="text-sm font-semibold mt-1 truncate" id="stat-top">-</p>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 col-span-2">
                        <h3 class="font-bold text-gray-700 mb-4">Asset Engagement</h3>
                        <div class="h-64">
                            <canvas id="clicksChart"></canvas>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-700 mb-4">Top Performing</h3>
                        <ul id="top-assets-list" class="space-y-3">
                            <!-- Populated by JS -->
                        </ul>
                    </div>
                </div>

                <!-- Upload Form -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-8">
                    <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-cloud-arrow-up text-teal-600"></i>
                        Upload New Asset
                    </h3>
                    <form id="upload-form" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Asset Title *</label>
                            <input type="text" id="asset-title" required class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none" placeholder="e.g., Cooling Tower Optimization Guide">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
                            <select id="asset-category" class="w-full p-3 border border-gray-200 rounded-lg outline-none bg-white">
                                <option>White Paper</option>
                                <option>Case Study</option>
                                <option>Webinar</option>
                                <option>Tool</option>
                                <option>Article</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Industry</label>
                            <select id="asset-industry" class="w-full p-3 border border-gray-200 rounded-lg outline-none bg-white">
                                <option value="">All Industries</option>
                                <option>Hospitality</option>
                                <option>Commercial Real Estate</option>
                                <option>Healthcare</option>
                                <option>Education</option>
                                <option>Manufacturing</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tags (comma separated)</label>
                            <input type="text" id="asset-tags" class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none" placeholder="water, GRESB, savings">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea id="asset-description" rows="2" class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none" placeholder="Brief description of this resource..."></textarea>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">HTML Content *</label>
                            <textarea id="asset-content" rows="4" required class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none font-mono text-xs" placeholder="Paste your HTML content here..."></textarea>
                            <p class="text-xs text-gray-400 mt-1">Paste the full HTML document or content that will display in the viewer.</p>
                        </div>
                        <div class="col-span-2 flex justify-end gap-3">
                            <button type="reset" class="px-6 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition">Clear</button>
                            <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition font-medium">
                                <i class="fa-solid fa-plus mr-2"></i>Add Asset
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Assets Table -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-4 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold">All Assets</h3>
                        <span class="text-sm text-gray-500" id="table-count">0 assets</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-semibold">
                                <tr>
                                    <th class="p-4">Asset Name</th>
                                    <th class="p-4">Type</th>
                                    <th class="p-4">Industry</th>
                                    <th class="p-4">Views</th>
                                    <th class="p-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="admin-asset-table" class="divide-y divide-gray-100 text-sm">
                                <!-- Populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Leads Table -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-8">
                    <div class="p-4 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold">Registered Leads</h3>
                        <button onclick="exportLeads()" class="text-sm text-teal-600 hover:text-teal-700 font-medium">
                            <i class="fa-solid fa-download mr-1"></i>Export CSV
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-semibold">
                                <tr>
                                    <th class="p-4">Name</th>
                                    <th class="p-4">Company</th>
                                    <th class="p-4">Email</th>
                                    <th class="p-4">Registered</th>
                                </tr>
                            </thead>
                            <tbody id="leads-table" class="divide-y divide-gray-100 text-sm">
                                <!-- Populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- ADMIN LOGIN VIEW -->
            <div id="view-admin-login" class="hidden fade-in flex flex-col items-center justify-center h-full">
                <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-100">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-black rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-lock text-white text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold">Admin Access</h2>
                        <p class="text-sm text-gray-500 mt-1">Enter password to continue</p>
                    </div>
                    <input type="password" id="admin-pass" class="w-full p-3 border border-gray-200 rounded-lg mb-4 focus:ring-2 focus:ring-teal-500 outline-none" placeholder="Enter Password" onkeypress="if(event.key==='Enter')checkAdmin()">
                    <button onclick="checkAdmin()" class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-800 transition">
                        <i class="fa-solid fa-arrow-right mr-2"></i>Login
                    </button>
                    <p class="text-xs text-center mt-4 text-gray-400">Default: admin123</p>
                </div>
            </div>

        </div>
    </main>

    <!-- REGISTRATION MODAL -->
    <div id="auth-modal" class="fixed inset-0 modal-overlay flex items-center justify-center z-50 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all scale-95" id="modal-content">
            <div class="bg-black text-white p-8 relative">
                <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white transition">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
                <h3 class="text-2xl font-bold">Access Premium Content</h3>
                <p class="text-gray-400 mt-2">Register once for unlimited access to all resources.</p>
            </div>
            <div class="p-8">
                <!-- Asset Preview -->
                <div id="pending-asset-preview" class="hidden bg-gray-50 rounded-lg p-4 mb-6 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-teal-100 text-teal-600 flex items-center justify-center">
                        <i class="fa-solid fa-file-lines text-xl"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold truncate" id="pending-asset-title">Asset Title</p>
                        <p class="text-sm text-gray-500" id="pending-asset-type">Type</p>
                    </div>
                </div>

                <form id="reg-form" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" id="reg-name" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none" placeholder="John Smith">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Company <span class="text-red-500">*</span></label>
                        <input type="text" id="reg-company" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none" placeholder="Acme Properties LLC">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Work Email <span class="text-red-500">*</span></label>
                        <input type="email" id="reg-email" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none" placeholder="john@acmeproperties.com">
                    </div>
                    <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 rounded-lg mt-2 transition">
                        <i class="fa-solid fa-unlock mr-2"></i>Get Instant Access
                    </button>
                </form>
                <p class="text-xs text-center text-gray-400 mt-4">By registering, you'll have access to all our premium resources.</p>
            </div>
        </div>
    </div>

    <!-- ASSET VIEWER -->
    <div id="asset-viewer" class="fixed inset-0 bg-gray-100 z-50 hidden flex flex-col">
        <div class="bg-black text-white p-4 flex justify-between items-center shadow-lg">
            <div class="flex items-center gap-4">
                <button onclick="closeViewer()" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg text-sm transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i>Back
                </button>
                <h3 id="viewer-title" class="font-semibold text-lg truncate">Document Viewer</h3>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="printAsset()" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg text-sm transition">
                    <i class="fa-solid fa-print mr-2"></i>Print
                </button>
            </div>
        </div>
        <div class="flex-1 p-4 overflow-hidden">
            <iframe id="viewer-frame" class="w-full h-full bg-white shadow-xl rounded-lg border border-gray-200"></iframe>
        </div>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div id="toast" class="fixed bottom-6 right-6 bg-gray-900 text-white px-6 py-3 rounded-lg shadow-xl transform translate-y-20 opacity-0 transition-all duration-300 z-50">
        <span id="toast-message">Notification</span>
    </div>

    <script>
        // =============================================
        // DATA & STATE MANAGEMENT
        // =============================================
        
        // Sample HTML content for the demo white paper
        const SAMPLE_WHITEPAPER = `
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Inter', -apple-system, sans-serif; line-height: 1.7; max-width: 900px; margin: 0 auto; padding: 50px 30px; color: #1a1a1a; }
        h1 { font-size: 2.5rem; margin-bottom: 0.5rem; font-weight: 800; }
        h2 { font-size: 1.4rem; margin-top: 2.5rem; border-bottom: 3px solid #0d9488; padding-bottom: 0.5rem; color: #0d9488; }
        .subtitle { color: #666; font-size: 1.1rem; margin-bottom: 2rem; }
        .stat-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin: 2rem 0; }
        .stat-box { background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%); padding: 1.5rem; border-radius: 12px; text-align: center; border: 1px solid #99f6e4; }
        .stat-number { font-size: 2.5rem; font-weight: 800; color: #0d9488; }
        .stat-label { font-size: 0.85rem; color: #666; margin-top: 0.25rem; }
        .highlight { background: #f0fdfa; border-left: 4px solid #0d9488; padding: 1.25rem 1.5rem; margin: 1.5rem 0; border-radius: 0 8px 8px 0; }
        .highlight strong { color: #0d9488; }
        ul { padding-left: 1.5rem; }
        li { margin-bottom: 0.75rem; }
        .footer { margin-top: 4rem; padding-top: 2rem; border-top: 2px solid #e5e5e5; text-align: center; color: #666; }
        .logo { font-weight: 800; font-size: 1.2rem; margin-bottom: 0.5rem; }
        .logo span { color: #0d9488; }
    </style>
</head>
<body>
    <h1>Hospitality REIT Water Optimization</h1>
    <p class="subtitle">Strategic Guide to Portfolio-Wide Water Management Excellence | 2025 Edition</p>
    
    <div class="stat-grid">
        <div class="stat-box">
            <div class="stat-number">25-49%</div>
            <div class="stat-label">Water Savings</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">234%</div>
            <div class="stat-label">10-Year ROI</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">1.7 yrs</div>
            <div class="stat-label">Payback Period</div>
        </div>
    </div>

    <h2>Executive Summary</h2>
    <p>Water represents hospitality's most underoptimized operational expense. While energy efficiency has captured management attention for decades, water costs have quietly escalated, now comprising 10-15% of utility expenses for full-service hotels. This white paper demonstrates how systematic water management delivers immediate cost reduction while strengthening ESG positioning for institutional investors.</p>

    <div class="highlight">
        <strong>Key Finding:</strong> Hotels implementing comprehensive water programs achieve 25-49% reduction in consumption within 12-18 months, generating returns that substantially exceed capital costs.
    </div>

    <h2>The Water Challenge in Hospitality</h2>
    <p>Full-service hotels consume 100-250 gallons per occupied room daily—3-5x residential per-capita usage. This intensity creates both risk and opportunity:</p>
    <ul>
        <li><strong>Rising utility rates</strong> (5-8% annually in most markets)</li>
        <li><strong>Increasing regulatory pressure</strong> on commercial water users</li>
        <li><strong>Growing investor scrutiny</strong> of ESG performance metrics</li>
        <li><strong>Competitive differentiation</strong> through sustainability leadership</li>
    </ul>

    <h2>Implementation Framework</h2>
    <p>Successful REIT-wide water optimization follows a structured approach:</p>
    <ul>
        <li><strong>Phase 1:</strong> Portfolio Assessment & Benchmarking (Months 1-2)</li>
        <li><strong>Phase 2:</strong> Pilot Implementation at 3-5 Properties (Months 3-6)</li>
        <li><strong>Phase 3:</strong> Portfolio-Wide Rollout (Months 7-18)</li>
        <li><strong>Phase 4:</strong> Continuous Optimization & Reporting (Ongoing)</li>
    </ul>

    <h2>Technology Solutions</h2>
    <p>Modern water management combines multiple technologies:</p>
    <ul>
        <li>Smart flow management systems for guest rooms and common areas</li>
        <li>IoT sensors for real-time leak detection and consumption monitoring</li>
        <li>AI-powered analytics for predictive maintenance and anomaly detection</li>
        <li>Cooling tower optimization reducing makeup water by 20-30%</li>
        <li>Centralized dashboards for portfolio-wide visibility</li>
    </ul>

    <h2>GRESB & ESG Integration</h2>
    <p>Water optimization directly impacts GRESB scoring across multiple indicators. REITs implementing comprehensive programs typically see 15-25 point improvements in water-related categories, enhancing competitive positioning for institutional capital.</p>

    <div class="highlight">
        <strong>GRESB Impact:</strong> Properties with advanced water management systems score 20-30 points higher on water-specific indicators, directly improving overall benchmark rankings.
    </div>

    <h2>Financial Analysis</h2>
    <p>For a typical 300-room full-service hotel:</p>
    <ul>
        <li><strong>Annual water cost:</strong> $180,000 - $350,000</li>
        <li><strong>Implementation investment:</strong> $75,000 - $150,000</li>
        <li><strong>Annual savings (30%):</strong> $54,000 - $105,000</li>
        <li><strong>Simple payback:</strong> 1.2 - 1.8 years</li>
        <li><strong>10-year NPV:</strong> $400,000 - $750,000</li>
    </ul>

    <h2>Next Steps</h2>
    <p>Begin with a portfolio assessment to identify highest-impact properties for pilot implementation. Early movers gain competitive advantage while building organizational expertise for systematic deployment.</p>

    <div class="footer">
        <p class="logo">Water Solutions<span>Tech</span></p>
        <p>watersolutech.com | info@watersolutech.com | +1 (954) 667-9405</p>
        <p style="font-size: 0.8rem; margin-top: 1rem;">© 2025 Water Solutions Technology. All Rights Reserved.</p>
    </div>
</body>
</html>`;

        // Initial assets if LocalStorage is empty
        const initialAssets = [
            {
                id: 1,
                title: "Hospitality REIT Water Optimization 2025",
                type: "White Paper",
                industry: "Hospitality",
                description: "Comprehensive guide to water management optimization for hospitality REITs with 25-49% savings strategies.",
                tags: "water, REIT, hospitality, GRESB, ESG",
                clicks: 124,
                content: SAMPLE_WHITEPAPER
            },
            {
                id: 2,
                title: "DiamondRock Portfolio Case Study",
                type: "Case Study",
                industry: "Hospitality",
                description: "How DiamondRock achieved $2.3M in water savings across 37 properties.",
                tags: "case study, DiamondRock, savings",
                clicks: 89,
                content: `<html><body style="font-family:Inter,sans-serif;padding:50px;max-width:800px;margin:0 auto;"><h1>DiamondRock Portfolio Case Study</h1><p style="color:#666;font-size:1.2rem;">$2.3M Annual Savings Across 37 Properties</p><div style="background:#f0fdfa;padding:30px;border-radius:12px;margin:30px 0;"><h2 style="color:#0d9488;margin-top:0;">Key Results</h2><ul style="line-height:2;"><li><strong>37 properties</strong> optimized</li><li><strong>32% average</strong> water reduction</li><li><strong>$2.3M annual savings</strong></li><li><strong>14 month payback</strong></li><li><strong>22 point GRESB improvement</strong></li></ul></div><h2>Implementation Timeline</h2><p>Phase 1 pilot at 5 flagship properties, followed by systematic rollout across the portfolio over 18 months.</p><div style="margin-top:50px;padding-top:30px;border-top:2px solid #eee;text-align:center;color:#666;"><strong>Water SolutionsTech</strong><br>watersolutech.com</div></body></html>`
            },
            {
                id: 3,
                title: "GRESB Water Reporting Best Practices",
                type: "Webinar",
                industry: "Commercial Real Estate",
                description: "Expert webinar on maximizing GRESB scores through water data management.",
                tags: "GRESB, webinar, ESG, reporting",
                clicks: 215,
                content: `<html><body style="font-family:Inter,sans-serif;padding:50px;max-width:800px;margin:0 auto;text-align:center;"><h1>GRESB Water Reporting</h1><p style="color:#666;">Best Practices Webinar Recording</p><div style="background:#000;color:#fff;padding:80px 40px;border-radius:12px;margin:40px 0;"><p style="font-size:4rem;margin:0;">▶</p><p style="margin-top:20px;">Webinar Recording (45 min)</p></div><h2 style="text-align:left;">Topics Covered</h2><ul style="text-align:left;line-height:2;"><li>GRESB 2025 water indicators</li><li>Data collection best practices</li><li>Benchmarking strategies</li><li>Documentation requirements</li></ul></body></html>`
            },
            {
                id: 4,
                title: "Water Savings ROI Calculator",
                type: "Tool",
                industry: "",
                description: "Interactive calculator to estimate water savings potential for your properties.",
                tags: "calculator, ROI, tool",
                clicks: 156,
                content: `<html><body style="font-family:Inter,sans-serif;padding:50px;max-width:600px;margin:0 auto;"><h1>Water Savings Calculator</h1><p style="color:#666;margin-bottom:30px;">Estimate your potential savings</p><div style="background:#f8fafc;padding:30px;border-radius:12px;border:1px solid #e2e8f0;"><label style="display:block;margin-bottom:20px;"><span style="font-weight:600;display:block;margin-bottom:5px;">Number of Rooms</span><input type="number" value="200" style="width:100%;padding:12px;border:1px solid #e2e8f0;border-radius:8px;font-size:16px;"></label><label style="display:block;margin-bottom:20px;"><span style="font-weight:600;display:block;margin-bottom:5px;">Current Annual Water Cost ($)</span><input type="number" value="250000" style="width:100%;padding:12px;border:1px solid #e2e8f0;border-radius:8px;font-size:16px;"></label><div style="background:#0d9488;color:#fff;padding:20px;border-radius:8px;text-align:center;margin-top:20px;"><p style="margin:0;font-size:0.9rem;">Estimated Annual Savings</p><p style="margin:10px 0 0;font-size:2rem;font-weight:800;">$75,000 - $112,500</p></div></div></body></html>`
            }
        ];

        // Initialize Data from LocalStorage
        let assets = JSON.parse(localStorage.getItem('wst_assets')) || initialAssets;
        let leads = JSON.parse(localStorage.getItem('wst_leads')) || [];
        let currentUser = JSON.parse(localStorage.getItem('wst_user'));
        let currentFilter = null;
        let currentSearch = '';
        
        // Save Helpers
        const saveAssets = () => {
            localStorage.setItem('wst_assets', JSON.stringify(assets));
            renderAssets();
            renderAdmin();
        };

        const saveLeads = () => {
            localStorage.setItem('wst_leads', JSON.stringify(leads));
            renderAdmin();
        };

        // =============================================
        // APP INITIALIZATION
        // =============================================
        
        document.addEventListener('DOMContentLoaded', () => {
            checkAuthStatus();
            renderAssets();
            renderAdmin();
        });

        // =============================================
        // ROUTING & VIEWS
        // =============================================

        function router(viewName) {
            // Hide all views
            ['view-portal', 'view-admin', 'view-admin-login'].forEach(id => {
                document.getElementById(id).classList.add('hidden');
            });

            // Show selected view
            const view = document.getElementById(`view-${viewName}`);
            view.classList.remove('hidden');

            // Update nav styling
            document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.remove('active'));
            const navBtn = document.getElementById(`nav-${viewName}`);
            if (navBtn) navBtn.classList.add('active');

            if (viewName === 'admin') {
                updateCharts();
            }
            
            if (viewName === 'portal') {
                currentFilter = null;
                currentSearch = '';
                document.getElementById('search-input').value = '';
                document.getElementById('section-title').textContent = 'All Resources';
                renderAssets();
            }
        }

        // =============================================
        // AUTHENTICATION
        // =============================================

        function checkAuthStatus() {
            if (currentUser) {
                document.getElementById('user-profile').classList.remove('hidden');
                document.getElementById('user-name-display').textContent = currentUser.name;
                document.getElementById('user-company-display').textContent = currentUser.company;
                document.getElementById('user-initials').textContent = currentUser.name.split(' ').map(n => n[0]).join('').toUpperCase();
                document.getElementById('welcome-text').textContent = `Welcome back, ${currentUser.name.split(' ')[0]}!`;
            }
        }

        function handleAssetClick(assetId) {
            if (!currentUser) {
                // Show pending asset in modal
                const asset = assets.find(a => a.id === assetId);
                if (asset) {
                    document.getElementById('pending-asset-preview').classList.remove('hidden');
                    document.getElementById('pending-asset-title').textContent = asset.title;
                    document.getElementById('pending-asset-type').textContent = asset.type;
                }
                sessionStorage.setItem('pending_asset', assetId);
                showModal();
            } else {
                trackClick(assetId);
                openAsset(assetId);
            }
        }

        // Registration
        document.getElementById('reg-form').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const user = {
                name: document.getElementById('reg-name').value,
                company: document.getElementById('reg-company').value,
                email: document.getElementById('reg-email').value,
                joined: new Date().toISOString()
            };

            // Save user
            localStorage.setItem('wst_user', JSON.stringify(user));
            currentUser = user;

            // Add to leads list
            if (!leads.find(l => l.email === user.email)) {
                leads.push(user);
                saveLeads();
            }

            checkAuthStatus();
            closeModal();
            renderAssets();

            // Handle pending asset
            const pending = sessionStorage.getItem('pending_asset');
            if (pending) {
                trackClick(parseInt(pending));
                openAsset(parseInt(pending));
                sessionStorage.removeItem('pending_asset');
            } else {
                showToast(`Welcome, ${user.name.split(' ')[0]}! You now have full access.`);
            }
        });

        function logout() {
            if (confirm('Sign out of the portal?')) {
                localStorage.removeItem('wst_user');
                currentUser = null;
                location.reload();
            }
        }

        function checkAdmin() {
            const pass = document.getElementById('admin-pass').value;
            if (pass === 'admin123') {
                router('admin');
                document.getElementById('admin-pass').value = '';
            } else {
                showToast('Invalid password');
            }
        }

        // =============================================
        // ASSET RENDERING & FILTERING
        // =============================================

        function renderAssets() {
            const grid = document.getElementById('asset-grid');
            
            // Filter assets
            let filtered = assets;
            
            if (currentFilter) {
                filtered = filtered.filter(a => a.type === currentFilter);
            }
            
            if (currentSearch) {
                const term = currentSearch.toLowerCase();
                filtered = filtered.filter(a => 
                    a.title.toLowerCase().includes(term) ||
                    (a.description && a.description.toLowerCase().includes(term)) ||
                    (a.tags && a.tags.toLowerCase().includes(term))
                );
            }

            // Update count
            document.getElementById('asset-count').textContent = `${filtered.length} resource${filtered.length !== 1 ? 's' : ''} available`;

            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full text-center py-16 text-gray-500">
                        <i class="fa-solid fa-folder-open text-4xl mb-4 text-gray-300"></i>
                        <p class="font-medium">No resources found</p>
                        <p class="text-sm mt-1">Try adjusting your search or filter</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = '';

            filtered.forEach(asset => {
                // Icon and color based on type
                let icon = 'fa-file-lines';
                let color = 'bg-blue-100 text-blue-600';
                
                if (asset.type === 'Webinar') { icon = 'fa-video'; color = 'bg-red-100 text-red-600'; }
                if (asset.type === 'Case Study') { icon = 'fa-briefcase'; color = 'bg-green-100 text-green-600'; }
                if (asset.type === 'Tool') { icon = 'fa-calculator'; color = 'bg-purple-100 text-purple-600'; }
                if (asset.type === 'Article') { icon = 'fa-newspaper'; color = 'bg-orange-100 text-orange-600'; }

                const card = `
                    <div class="asset-card bg-white rounded-xl shadow-sm border border-gray-100 p-6 cursor-pointer group" onclick="handleAssetClick(${asset.id})">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-14 h-14 rounded-xl ${color} flex items-center justify-center text-2xl">
                                <i class="fa-solid ${icon}"></i>
                            </div>
                            ${currentUser 
                                ? '<span class="text-xs bg-teal-100 text-teal-700 px-2 py-1 rounded-full font-medium"><i class="fa-solid fa-check mr-1"></i>Unlocked</span>' 
                                : '<span class="text-xs bg-amber-100 text-amber-700 px-2 py-1 rounded-full font-medium"><i class="fa-solid fa-lock mr-1"></i>Premium</span>'
                            }
                        </div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">${asset.type}</p>
                        <h3 class="font-bold text-lg leading-tight mb-2 group-hover:text-teal-600 transition">${asset.title}</h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-4">${asset.description || ''}</p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <span class="text-xs text-gray-400">${asset.industry || 'All Industries'}</span>
                            <span class="text-sm font-semibold text-teal-600 group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                                ${currentUser ? 'View' : 'Register to View'} 
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </span>
                        </div>
                    </div>
                `;
                grid.innerHTML += card;
            });
        }

        function filterAssets(type) {
            currentFilter = type;
            currentSearch = '';
            document.getElementById('search-input').value = '';
            document.getElementById('section-title').textContent = type + 's';
            renderAssets();
            
            // Update nav styling
            document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.remove('active'));
        }

        function searchAssets() {
            currentSearch = document.getElementById('search-input').value;
            renderAssets();
        }

        // =============================================
        // TRACKING
        // =============================================

        function trackClick(id) {
            const asset = assets.find(a => a.id === id);
            if (asset) {
                asset.clicks++;
                saveAssets();
            }
        }

        // =============================================
        // ASSET VIEWER
        // =============================================

        function openAsset(id) {
            const asset = assets.find(a => a.id === id);
            if (asset) {
                document.getElementById('viewer-title').textContent = asset.title;
                
                // Convert content to data URI if it's raw HTML
                let content = asset.content;
                if (content && !content.startsWith('data:') && !content.startsWith('http')) {
                    content = 'data:text/html;charset=utf-8,' + encodeURIComponent(content);
                }
                
                document.getElementById('viewer-frame').src = content;
                document.getElementById('asset-viewer').classList.remove('hidden');
            }
        }
        
        function closeViewer() {
            document.getElementById('asset-viewer').classList.add('hidden');
            document.getElementById('viewer-frame').src = 'about:blank';
        }

        function printAsset() {
            document.getElementById('viewer-frame').contentWindow.print();
        }

        // =============================================
        // MODAL HELPERS
        // =============================================

        function showModal() {
            const modal = document.getElementById('auth-modal');
            const content = document.getElementById('modal-content');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('auth-modal');
            const content = document.getElementById('modal-content');
            modal.classList.add('opacity-0');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.getElementById('pending-asset-preview').classList.add('hidden');
                document.getElementById('reg-form').reset();
            }, 300);
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-message').textContent = message;
            toast.classList.remove('translate-y-20', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }

        // =============================================
        // ADMIN FUNCTIONS
        // =============================================

        function renderAdmin() {
            const table = document.getElementById('admin-asset-table');
            const topList = document.getElementById('top-assets-list');
            const leadsTable = document.getElementById('leads-table');
            
            // Stats
            const totalViews = assets.reduce((sum, a) => sum + a.clicks, 0);
            const sorted = [...assets].sort((a, b) => b.clicks - a.clicks);
            
            document.getElementById('stat-assets').textContent = assets.length;
            document.getElementById('stat-views').textContent = totalViews.toLocaleString();
            document.getElementById('stat-users').textContent = leads.length;
            document.getElementById('stat-top').textContent = sorted[0]?.title || '-';
            document.getElementById('table-count').textContent = `${assets.length} assets`;

            // Top Performing List
            topList.innerHTML = '';
            sorted.slice(0, 5).forEach((a, index) => {
                topList.innerHTML += `
                    <li class="flex justify-between items-center py-2 ${index < 4 ? 'border-b border-gray-100' : ''}">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="text-lg font-bold text-gray-300 w-6">${index + 1}</span>
                            <span class="text-sm font-medium truncate">${a.title}</span>
                        </div>
                        <span class="text-sm font-bold text-teal-600 bg-teal-50 px-2 py-1 rounded ml-2 whitespace-nowrap">${a.clicks}</span>
                    </li>
                `;
            });

            // Assets Table
            table.innerHTML = '';
            assets.forEach(asset => {
                table.innerHTML += `
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4">
                            <span class="font-medium text-gray-900">${asset.title}</span>
                        </td>
                        <td class="p-4">
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-medium">${asset.type}</span>
                        </td>
                        <td class="p-4 text-gray-500">${asset.industry || '-'}</td>
                        <td class="p-4">
                            <span class="font-bold text-teal-600">${asset.clicks}</span>
                        </td>
                        <td class="p-4 text-right">
                            <button onclick="editAsset(${asset.id})" class="text-gray-400 hover:text-blue-600 mr-3 transition">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button onclick="deleteAsset(${asset.id})" class="text-gray-400 hover:text-red-600 transition">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });

            // Leads Table
            leadsTable.innerHTML = '';
            if (leads.length === 0) {
                leadsTable.innerHTML = '<tr><td colspan="4" class="p-8 text-center text-gray-400">No leads yet</td></tr>';
            } else {
                leads.forEach(lead => {
                    const date = new Date(lead.joined).toLocaleDateString();
                    leadsTable.innerHTML += `
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 font-medium">${lead.name}</td>
                            <td class="p-4 text-gray-600">${lead.company}</td>
                            <td class="p-4">
                                <a href="mailto:${lead.email}" class="text-teal-600 hover:underline">${lead.email}</a>
                            </td>
                            <td class="p-4 text-gray-500">${date}</td>
                        </tr>
                    `;
                });
            }
        }

        // Upload Asset
        document.getElementById('upload-form').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const newAsset = {
                id: Date.now(),
                title: document.getElementById('asset-title').value,
                type: document.getElementById('asset-category').value,
                industry: document.getElementById('asset-industry').value,
                description: document.getElementById('asset-description').value,
                tags: document.getElementById('asset-tags').value,
                clicks: 0,
                content: document.getElementById('asset-content').value
            };

            assets.push(newAsset);
            saveAssets();
            e.target.reset();
            showToast('Asset uploaded successfully!');
            updateCharts();
        });

        function deleteAsset(id) {
            if (confirm('Delete this asset? This cannot be undone.')) {
                assets = assets.filter(a => a.id !== id);
                saveAssets();
                updateCharts();
                showToast('Asset deleted');
            }
        }

        function editAsset(id) {
            const asset = assets.find(a => a.id === id);
            if (asset) {
                document.getElementById('asset-title').value = asset.title;
                document.getElementById('asset-category').value = asset.type;
                document.getElementById('asset-industry').value = asset.industry || '';
                document.getElementById('asset-description').value = asset.description || '';
                document.getElementById('asset-tags').value = asset.tags || '';
                document.getElementById('asset-content').value = asset.content || '';
                
                // Remove old and re-add on submit
                deleteAsset(id);
                
                window.scrollTo({ top: document.getElementById('upload-form').offsetTop - 100, behavior: 'smooth' });
                showToast('Edit the form and save to update');
            }
        }

        function exportLeads() {
            if (leads.length === 0) {
                showToast('No leads to export');
                return;
            }
            
            const csv = [
                ['Name', 'Company', 'Email', 'Registered'].join(','),
                ...leads.map(l => [
                    `"${l.name}"`,
                    `"${l.company}"`,
                    l.email,
                    l.joined
                ].join(','))
            ].join('\n');

            const blob = new Blob([csv], { type: 'text/csv' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `wst-leads-${new Date().toISOString().split('T')[0]}.csv`;
            a.click();
            showToast('CSV downloaded');
        }

        // =============================================
        // CHARTS
        // =============================================

        let myChart = null;
        
        function updateCharts() {
            const ctx = document.getElementById('clicksChart');
            if (!ctx) return;
            
            if (myChart) myChart.destroy();

            const sorted = [...assets].sort((a, b) => b.clicks - a.clicks).slice(0, 8);
            const labels = sorted.map(a => a.title.length > 20 ? a.title.substring(0, 20) + '...' : a.title);
            const data = sorted.map(a => a.clicks);

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Views',
                        data: data,
                        backgroundColor: '#0d9488',
                        borderRadius: 6,
                        barThickness: 24
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { 
                            beginAtZero: true,
                            grid: { color: '#f1f5f9' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 11 } }
                        }
                    }
                }
            });
        }

        // Close modal on escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal();
                closeViewer();
            }
        });

        // Close modal on overlay click
        document.getElementById('auth-modal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('auth-modal')) {
                closeModal();
            }
        });
    </script>
</body>
</html>
