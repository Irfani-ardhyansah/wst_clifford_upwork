<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Water Monitoring — Water Solutions Technology</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Syne:wght@400;500;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>


    :root {
  /* Core colours — monitoring palette */
  --black:       #0a0a0a;
  --off-white:   #f5f4f1;
  --warm-gray:   #8a8680;
  --border:      rgba(10,10,10,0.1);
  --accent:      #1a3a2a;
  --accent-light:#2d5c42;
  --rule:        1px solid rgba(10,10,10,0.12);
  /* v12 nav/footer palette additions */
  --dark:        #111111;
  --dark-2:      #1a1a1a;
  --white:       #ffffff;
  --gray-1:      #8a8680;
  --gray-2:      #3a3a3a;
  --gray-3:      #cccac6;
  --border-d:    rgba(255,255,255,0.08);
  --border-l:    rgba(0,0,0,0.09);
  --green:       #1a3a2a;
  --green-lt:    #2d5c42;
  --blue-link:   #3b6fd4;
}

    /* ── Page base (from monitoring) ── */
    
    :root {
      --black: #0a0a0a;
      --off-white: #f5f4f1;
      --warm-gray: #8a8680;
      --border: rgba(10,10,10,0.1);
      --accent: #1a3a2a;
      --accent-light: #2d5c42;
      --rule: 1px solid rgba(10,10,10,0.12);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      background: var(--off-white);
      color: var(--black);
      font-family: 'Syne', sans-serif;
      -webkit-font-smoothing: antialiased;
      overflow-x: hidden;
    }

    /* HERO */
    .hero {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1fr 1fr;
      padding-top: 104px;
    }

    .hero-left {
      padding: 80px 64px 80px 48px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      border-right: var(--rule);
    }

    .hero-eyebrow {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--accent-light);
      margin-bottom: 32px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .hero-eyebrow::before {
      content: '';
      display: block;
      width: 32px;
      height: 1px;
      background: var(--accent-light);
    }

    .hero-headline {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(44px, 5vw, 68px);
      font-weight: 300;
      line-height: 1.08;
      letter-spacing: -0.01em;
      color: var(--black);
      margin-bottom: 40px;
    }

    .hero-headline em {
      font-style: italic;
      font-weight: 300;
    }

    .hero-tagline {
      font-size: 14px;
      line-height: 1.8;
      color: var(--warm-gray);
      max-width: 460px;
      margin-bottom: 56px;
      border-left: 2px solid var(--accent);
      padding-left: 20px;
    }

    .hero-actions {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    }

    .btn-primary {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--off-white);
      background: var(--black);
      padding: 16px 32px;
      text-decoration: none;
      transition: background 0.2s;
      display: inline-block;
    }

    .btn-primary:hover { background: var(--accent); }

    .btn-ghost {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--black);
      border: 1px solid var(--black);
      padding: 16px 32px;
      text-decoration: none;
      transition: all 0.2s;
      display: inline-block;
    }

    .btn-ghost:hover {
      background: var(--black);
      color: var(--off-white);
    }

    .hero-right {
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 80px 48px;
      background: var(--black);
      position: relative;
      overflow: hidden;
    }

    .hero-right::before {
      content: '';
      position: absolute;
      top: -120px; right: -120px;
      width: 480px; height: 480px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(45,92,66,0.4) 0%, transparent 70%);
      pointer-events: none;
    }

    .hero-stat-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1px;
      background: rgba(255,255,255,0.08);
      margin-bottom: 48px;
    }

    .hero-stat {
      background: var(--black);
      padding: 32px;
    }

    .hero-stat-value {
      font-family: 'Cormorant Garamond', serif;
      font-size: 48px;
      font-weight: 300;
      color: #fff;
      line-height: 1;
      margin-bottom: 8px;
    }

    .hero-stat-label {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: rgba(255,255,255,0.4);
    }

    .hero-proof {
      border-top: 1px solid rgba(255,255,255,0.1);
      padding-top: 32px;
    }

    .hero-proof-label {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--accent-light);
      margin-bottom: 12px;
    }

    .hero-proof-text {
      font-family: 'Cormorant Garamond', serif;
      font-size: 20px;
      font-weight: 300;
      font-style: italic;
      color: rgba(255,255,255,0.75);
      line-height: 1.6;
    }

    /* SECTION BASICS */
    section { padding: 120px 48px; }

    .section-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 48px;
      margin-bottom: 80px;
      padding-bottom: 40px;
      border-bottom: var(--rule);
    }

    .section-number {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--warm-gray);
      white-space: nowrap;
      padding-top: 6px;
    }

    .section-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(36px, 4vw, 54px);
      font-weight: 300;
      line-height: 1.1;
      flex: 1;
    }

    .section-title em { font-style: italic; }

    .section-description {
      font-size: 14px;
      line-height: 1.8;
      color: var(--warm-gray);
      max-width: 380px;
    }

    /* PROBLEM SECTION */
    .problem-section {
      background: #fff;
      border-top: var(--rule);
      border-bottom: var(--rule);
    }

    .problem-grid {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 1px;
      background: var(--border);
    }

    .problem-card {
      background: #fff;
      padding: 48px 40px;
    }

    .problem-card-number {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--warm-gray);
      margin-bottom: 24px;
    }

    .problem-card-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 26px;
      font-weight: 400;
      line-height: 1.3;
      margin-bottom: 16px;
    }

    .problem-card-body {
      font-size: 13px;
      line-height: 1.8;
      color: var(--warm-gray);
    }

    /* VISIBILITY SECTION */
    .visibility-section {
      background: var(--off-white);
    }

    .visibility-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: start;
    }

    .visibility-left { }

    .visibility-right {
      display: flex;
      flex-direction: column;
      gap: 32px;
    }

    .visibility-item {
      border-left: 2px solid var(--border);
      padding-left: 28px;
      transition: border-color 0.2s;
    }

    .visibility-item:hover {
      border-left-color: var(--accent);
    }

    .visibility-item-tag {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--accent-light);
      margin-bottom: 8px;
    }

    .visibility-item-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 22px;
      font-weight: 400;
      margin-bottom: 10px;
    }

    .visibility-item-body {
      font-size: 13px;
      line-height: 1.8;
      color: var(--warm-gray);
    }

    .pull-quote {
      font-family: 'Cormorant Garamond', serif;
      font-size: 32px;
      font-weight: 300;
      font-style: italic;
      line-height: 1.4;
      color: var(--black);
      margin-bottom: 32px;
    }

    .pull-quote-source {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--warm-gray);
    }

    /* HOW IT WORKS */
    .how-section {
      background: var(--black);
      color: #fff;
    }

    .how-section .section-title { color: #fff; }
    .how-section .section-number { color: rgba(255,255,255,0.3); }
    .how-section .section-description { color: rgba(255,255,255,0.4); }
    .how-section .section-header { border-bottom-color: rgba(255,255,255,0.1); }

    .how-steps {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1px;
      background: rgba(255,255,255,0.08);
    }

    .how-step {
      background: var(--black);
      padding: 48px 40px;
      position: relative;
    }

    .how-step-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 72px;
      font-weight: 300;
      color: rgba(255,255,255,0.06);
      position: absolute;
      top: 24px; right: 32px;
      line-height: 1;
    }

    .how-step-tag {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--accent-light);
      margin-bottom: 20px;
    }

    .how-step-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 26px;
      font-weight: 400;
      color: #fff;
      margin-bottom: 16px;
      line-height: 1.3;
    }

    .how-step-body {
      font-size: 13px;
      line-height: 1.8;
      color: rgba(255,255,255,0.5);
      margin-bottom: 24px;
    }

    .how-step-detail {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: rgba(255,255,255,0.25);
      border-top: 1px solid rgba(255,255,255,0.08);
      padding-top: 20px;
    }

    /* CASE STUDY */
    .case-section {
      background: var(--accent);
      color: #fff;
    }

    .case-inner {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: center;
    }

    .case-label {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: rgba(255,255,255,0.5);
      margin-bottom: 24px;
    }

    .case-headline {
      font-family: 'Cormorant Garamond', serif;
      font-size: 46px;
      font-weight: 300;
      line-height: 1.1;
      margin-bottom: 28px;
    }

    .case-body {
      font-size: 14px;
      line-height: 1.8;
      color: rgba(255,255,255,0.7);
      margin-bottom: 40px;
    }

    .case-link {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #fff;
      text-decoration: none;
      border-bottom: 1px solid rgba(255,255,255,0.3);
      padding-bottom: 4px;
      transition: border-color 0.2s;
    }

    .case-link:hover { border-color: #fff; }

    .case-metrics {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1px;
      background: rgba(255,255,255,0.12);
    }

    .case-metric {
      background: rgba(0,0,0,0.15);
      padding: 40px 32px;
    }

    .case-metric-value {
      font-family: 'Cormorant Garamond', serif;
      font-size: 52px;
      font-weight: 300;
      color: #fff;
      line-height: 1;
      margin-bottom: 8px;
    }

    .case-metric-label {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: rgba(255,255,255,0.5);
    }

    .case-client {
      grid-column: 1 / -1;
      padding: 24px 32px;
      background: rgba(0,0,0,0.2);
      font-size: 12px;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: rgba(255,255,255,0.4);
    }

    /* ENGAGEMENT TIERS */
    .tiers-section {
      background: #fff;
    }

    .tiers-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
    }

    .tier-card {
      border: 1px solid var(--border);
      padding: 56px 48px;
      position: relative;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .tier-card:hover {
      border-color: var(--black);
      box-shadow: 0 16px 48px rgba(0,0,0,0.08);
    }

    .tier-card.featured {
      border-color: var(--black);
      background: var(--black);
      color: #fff;
    }

    .tier-badge {
      font-size: 9px;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--accent-light);
      margin-bottom: 24px;
    }

    .tier-card.featured .tier-badge {
      color: rgba(255,255,255,0.45);
    }

    .tier-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 36px;
      font-weight: 400;
      line-height: 1.1;
      margin-bottom: 12px;
    }

    .tier-card.featured .tier-name { color: #fff; }

    .tier-description {
      font-size: 13px;
      line-height: 1.8;
      color: var(--warm-gray);
      margin-bottom: 40px;
      padding-bottom: 32px;
      border-bottom: var(--rule);
    }

    .tier-card.featured .tier-description {
      color: rgba(255,255,255,0.5);
      border-bottom-color: rgba(255,255,255,0.1);
    }

    .tier-includes-label {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--warm-gray);
      margin-bottom: 20px;
    }

    .tier-card.featured .tier-includes-label { color: rgba(255,255,255,0.35); }

    .tier-includes {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 14px;
      margin-bottom: 48px;
    }

    .tier-includes li {
      font-size: 13px;
      line-height: 1.5;
      color: var(--black);
      display: flex;
      gap: 14px;
      align-items: flex-start;
    }

    .tier-card.featured .tier-includes li { color: rgba(255,255,255,0.75); }

    .tier-includes li::before {
      content: '→';
      font-size: 12px;
      color: var(--accent-light);
      margin-top: 1px;
      flex-shrink: 0;
    }

    .tier-card.featured .tier-includes li::before { color: rgba(255,255,255,0.35); }

    .tier-cta {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--black);
      border: 1px solid var(--black);
      padding: 14px 28px;
      text-decoration: none;
      display: inline-block;
      transition: all 0.2s;
    }

    .tier-cta:hover {
      background: var(--black);
      color: var(--off-white);
    }

    .tier-card.featured .tier-cta {
      color: var(--black);
      background: var(--off-white);
      border-color: var(--off-white);
    }

    .tier-card.featured .tier-cta:hover {
      background: #fff;
    }

    /* CTA BANNER */
    .cta-banner {
      padding: 120px 48px;
      background: var(--off-white);
      border-top: var(--rule);
      display: grid;
      grid-template-columns: 1fr auto;
      gap: 80px;
      align-items: center;
    }

    .cta-headline {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(36px, 4vw, 56px);
      font-weight: 300;
      line-height: 1.1;
      max-width: 640px;
    }

    .cta-headline em { font-style: italic; }

    .cta-sub {
      font-size: 13px;
      line-height: 1.8;
      color: var(--warm-gray);
      margin-top: 20px;
      max-width: 560px;
    }

    .cta-right {
      display: flex;
      flex-direction: column;
      gap: 14px;
      min-width: 220px;
    }

    /* FOOTER */
    footer {
      background: var(--black);
      color: rgba(255,255,255,0.35);
      padding: 40px 48px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 11px;
      letter-spacing: 0.06em;
    }

    footer a {
      color: rgba(255,255,255,0.35);
      text-decoration: none;
    }

    footer a:hover { color: rgba(255,255,255,0.7); }

    /* RESPONSIVE */
    @media (max-width: 960px) {
      nav { padding: 20px 24px; }
      .nav-links { display: none; }
      section { padding: 80px 24px; }
      .hero { grid-template-columns: 1fr; }
      .hero-right { min-height: 400px; }
      .hero-left { padding: 60px 24px; }
      .problem-grid { grid-template-columns: 1fr; }
      .visibility-grid { grid-template-columns: 1fr; }
      .how-steps { grid-template-columns: 1fr; }
      .case-inner { grid-template-columns: 1fr; }
      .tiers-grid { grid-template-columns: 1fr; }
      .cta-banner { grid-template-columns: 1fr; }
      .section-header { flex-direction: column; gap: 24px; }
    }
  

    /* ── Nav (from v12) ── */
    .top-bar {
      background: var(--black);
      display: flex; justify-content: flex-end; align-items: center;
      padding: 0 48px; height: 36px; gap: 28px;
    }
    .top-bar a {
      font-size: 11px; font-weight: 500; letter-spacing: 0.08em;
      text-transform: uppercase; color: rgba(255,255,255,0.45);
      text-decoration: none; transition: color 0.2s;
    }
    .top-bar a:hover { color: rgba(255,255,255,0.85); }

    /* Top bar dropdown — Opportunities only */
    .top-bar .tb-dropdown-wrap { position: relative; }
    .top-bar .tb-dropdown-wrap > a { display: flex; align-items: center; gap: 4px; }
    .top-bar .tb-dropdown-wrap > a svg { opacity: 0.5; transition: transform 0.2s; }
    .top-bar .tb-dropdown-wrap:hover > a svg { transform: rotate(180deg); }
    .tb-dropdown {
      position: absolute; top: 100%; right: 0;
      min-width: 230px; background: var(--white);
      border: 1px solid var(--border-l);
      border-top: 2px solid var(--black);
      box-shadow: 0 12px 32px rgba(0,0,0,0.12);
      opacity: 0; pointer-events: none;
      transform: translateY(-4px);
      transition: opacity 0.18s, transform 0.18s;
      z-index: 500; margin-top: 1px;
    }
    .top-bar .tb-dropdown-wrap:hover .tb-dropdown {
      opacity: 1; pointer-events: auto; transform: translateY(0);
    }
    .tb-dropdown-header {
      padding: 12px 16px 8px;
      font-size: 12px; font-weight: 800; color: var(--black);
      border-bottom: 1px solid var(--border-l);
    }
    .tb-dropdown a {
      display: block; padding: 10px 16px;
      font-size: 12px; font-weight: 400; color: #444;
      text-decoration: none; border-bottom: 1px solid var(--border-l);
      transition: all 0.15s; letter-spacing: 0; text-transform: none;
    }
    .tb-dropdown a:last-child { border-bottom: none; }
    .tb-dropdown a:hover { color: var(--black); background: var(--off-white); padding-left: 22px; }

    nav {
      position: sticky; top: 0; z-index: 200;
      background: var(--white);
      border-bottom: 1px solid var(--border-l);
      display: flex; align-items: center;
      padding: 0 48px; height: 68px; gap: 0;
      box-shadow: 0 2px 12px rgba(0,0,0,0.04);
      position: relative;
    }
    .nav-logo-wrap {
      display: flex; align-items: center; gap: 10px;
      text-decoration: none; margin-right: 0; flex-shrink: 0;
    }
    .nav-logo-icon {
      width: 36px; height: 36px;
    }
    .nav-logo-text {
      display: flex; flex-direction: column; line-height: 1.2;
    }
    .nav-logo-name {
      font-family: 'DM Sans', sans-serif;
      font-size: 13px; font-weight: 600;
      letter-spacing: 0.06em; text-transform: uppercase;
      color: var(--black);
    }

    .nav-logo-wordmark-wrap { display:flex; flex-direction:column; gap:1px; }
    .nav-logo-sub2 {
      font-family:'DM Sans',sans-serif; font-size:9.5px; font-weight:400;
      color:var(--gray-1); letter-spacing:0.04em; white-space:nowrap;
    }
    .nav-logo-icon { flex-shrink:0; }
    .nav-logo-wrap { align-items:center; }

    .nav-logo-sub {
      font-size: 10px; color: var(--gray-1);
      font-weight: 400; letter-spacing: 0.02em;
    }

    .nav-links {
      display: flex; list-style: none; gap: 0;
      position: absolute; left: 50%; transform: translateX(-50%);
    }
    /* Ensure nav is position:relative for absolute child */
    .nav-links > li { position: relative; }
    .nav-links > li > a {
      display: flex; align-items: center; gap: 5px;
      height: 68px; padding: 0 16px;
      font-size: 13px; font-weight: 500;
      color: var(--black); text-decoration: none;
      transition: color 0.2s; white-space: nowrap;
    }
    .nav-links > li > a svg { width: 10px; height: 10px; opacity: 0.5; }
    .nav-links > li > a:hover { color: var(--green-lt); }
    .nav-links > li > a.active-link { color: var(--green); font-weight: 600; }

    .dropdown {
      position: absolute; top: 68px; left: 0;
      min-width: 240px; background: var(--white);
      border: 1px solid var(--border-l);
      border-top: 2px solid var(--black);
      box-shadow: 0 16px 40px rgba(0,0,0,0.10);
      opacity: 0; pointer-events: none;
      transform: translateY(-6px);
      transition: opacity 0.2s, transform 0.2s; z-index: 400;
    }
    .nav-links > li:hover .dropdown {
      opacity: 1; pointer-events: auto; transform: translateY(0);
    }
    .dropdown a {
      display: block; padding: 11px 18px;
      font-size: 12px; font-weight: 500; color: var(--gray-1);
      text-decoration: none; border-bottom: 1px solid var(--border-l);
      transition: all 0.15s;
    }
    .dropdown a:last-child { border-bottom: none; }
    .dropdown a:hover { color: var(--black); background: var(--off-white); padding-left: 24px; }

    .nav-right { display: flex; gap: 0; align-items: center; margin-left: auto; }
    .nav-icon-btn {
      width: 38px; height: 38px; display: flex; align-items: center;
      justify-content: center; border: 1px solid var(--border-l);
      background: none; cursor: pointer; color: var(--black);
      text-decoration: none; transition: border-color 0.2s;
    }
    .nav-icon-btn:hover { border-color: var(--black); }
    .nav-cta {
      font-size: 11px; font-weight: 600; letter-spacing: 0.10em;
      text-transform: uppercase; color: var(--white);
      background: var(--black); padding: 11px 22px;
      text-decoration: none; transition: background 0.2s; white-space: nowrap;
      margin-left: 10px;
    }
    .nav-cta:hover { background: var(--green); }

    /* ─── HERO ─── */
    
    /* Nav uses DM Sans to match v12 */
    .top-bar, nav, .nav-logo-name, .nav-logo-sub2,
    .nav-links a, .nav-cta, .dropdown a,
    .tb-dropdown a, .tb-dropdown-header,
    .ham-btn, .nav-icon-btn { font-family: 'DM Sans', sans-serif !important; }


    /* ── Footer (from v12) ── */
    .footer-main {
      display: grid; grid-template-columns: 1.8fr 1fr 1fr 1fr;
      gap: 48px; padding: 64px 48px 48px;
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .footer-logo-wrap {
      display: flex; align-items: center; gap: 10px;
      text-decoration: none; margin-bottom: 16px; display: block;
    }
    .footer-brand-name {
      font-family: 'DM Sans', sans-serif;
      font-size: 15px; font-weight: 600; color: var(--white);
      letter-spacing: 0.04em; display: block; margin-bottom: 14px;
      text-decoration: none;
    }
    .footer-tagline {
      font-size: 12px; line-height: 1.75; color: rgba(255,255,255,0.3);
      margin-bottom: 20px; max-width: 260px;
    }
    .footer-address {
      font-size: 12px; line-height: 1.8; color: rgba(255,255,255,0.3);
    }
    .footer-address a { color: rgba(255,255,255,0.45); text-decoration: none; }
    .footer-address a:hover { color: rgba(255,255,255,0.8); }
    .footer-socials {
      display: flex; gap: 12px; margin-top: 20px;
    }
    .footer-social {
      width: 32px; height: 32px; border: 1px solid rgba(255,255,255,0.12);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.35); text-decoration: none;
      font-size: 12px; font-weight: 700;
      transition: all 0.2s;
    }
    .footer-social:hover { border-color: rgba(255,255,255,0.4); color: rgba(255,255,255,0.7); }

    .footer-col-title {
      font-size: 9px; font-weight: 700; letter-spacing: 0.16em;
      text-transform: uppercase; color: rgba(255,255,255,0.2);
      margin-bottom: 18px;
    }
    .footer-links { list-style: none; display: flex; flex-direction: column; gap: 9px; }
    .footer-links a {
      font-size: 12px; color: rgba(255,255,255,0.4);
      text-decoration: none; transition: color 0.2s;
    }
    .footer-links a:hover { color: rgba(255,255,255,0.8); }

    .footer-bottom {
      padding: 20px 48px;
      display: flex; justify-content: space-between; align-items: center;
      flex-wrap: wrap; gap: 12px;
    }
    .footer-bottom-left {
      display: flex; align-items: center; gap: 16px;
    }
    .footer-copy {
      font-size: 11px; color: rgba(255,255,255,0.2); letter-spacing: 0.04em;
    }
    .footer-bottom-links { display: flex; gap: 20px; }
    .footer-bottom-links a {
      font-size: 11px; color: rgba(255,255,255,0.25); text-decoration: none;
    }
    .footer-bottom-links a:hover { color: rgba(255,255,255,0.6); }
    .footer-portfolio-cta {
      font-size: 11px; font-weight: 700; letter-spacing: 0.10em;
      text-transform: uppercase; color: var(--black); background: var(--white);
      padding: 10px 20px; text-decoration: none; transition: background 0.2s;
    }
    .footer-portfolio-cta:hover { background: var(--off-white); }

    /* ─── STICKY BOTTOM CTA ─── */
    .sticky-cta {
      position: fixed; bottom: 0; left: 0; right: 0; z-index: 150;
      background: var(--green-lt);
      display: flex; align-items: center; justify-content: space-between;
      padding: 14px 48px; gap: 24px;
      transform: translateY(100%);
      transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 -4px 24px rgba(0,0,0,0.2);
    }
    .sticky-cta.visible { transform: translateY(0); }
    .sticky-cta-text {
      font-size: 13px; font-weight: 500; color: rgba(255,255,255,0.85);
      display: flex; align-items: center; gap: 16px;
    }
    .sticky-cta-text strong { color: #fff; font-weight: 700; }
    .sticky-cta-actions { display: flex; gap: 10px; align-items: center; }
    .sticky-cta-btn {
      font-size: 11px; font-weight: 700; letter-spacing: 0.10em;
      text-transform: uppercase; color: var(--black); background: var(--white);
      padding: 10px 22px; text-decoration: none; transition: background 0.2s;
      white-space: nowrap;
    }
    .sticky-cta-btn:hover { background: var(--off-white); }
    .sticky-cta-dismiss {
      background: none; border: none; cursor: pointer;
      color: rgba(255,255,255,0.5); font-size: 18px; padding: 4px 8px;
      transition: color 0.2s; line-height: 1;
    }
    .sticky-cta-dismiss:hover { color: rgba(255,255,255,0.9); }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 1100px) {
      .nav-links { position: static; transform: none; display: none; }
      .hero-main { grid-template-columns: 1fr; }
      .hero-right { display: none; }
      .insights-grid { grid-template-columns: 1fr; }
      .services-layout { grid-template-columns: 1fr; }
      .services-list { border-right: none; border-bottom: 1px solid var(--border-l); }
      .ba-layout { grid-template-columns: 1fr; gap: 2px; }
      .ba-center { flex-direction: row; padding: 20px 0; border: none; }
      .contact-layout { grid-template-columns: 1fr; }
      .footer-main { grid-template-columns: 1fr 1fr; }
      .logos-grid { grid-template-columns: repeat(3, 1fr); }
      section { padding: 72px 24px; }
      nav, .top-bar, .footer-main, .footer-bottom { padding-left: 24px; padding-right: 24px; }
      .hero-main { padding: 60px 24px 40px; }
      .hero-strip { grid-template-columns: 1fr; }
      .hero-strip-item { padding: 18px 24px; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); }
      .cap-grid { grid-template-columns: 1fr; }
      .cap-card:last-child { grid-column: auto; }
      .industries-header { grid-template-columns: 1fr; }
    }

    /* ─── MANDATE STRIP ─── */
    .mandate-strip {
      background: var(--white);
      border-top: 1px solid var(--border-l);
      border-bottom: 1px solid var(--border-l);
      padding: 28px 48px;
      display: flex; align-items: center; gap: 0;
    }
    .mandate-label {
      font-size: 9px; font-weight: 700; letter-spacing: 0.20em;
      text-transform: uppercase; color: var(--green-lt);
      flex-shrink: 0; margin-right: 32px;
      display: flex; align-items: center; gap: 10px;
    }
    .mandate-label::after {
      content: ''; display: block; width: 1px;
      height: 32px; background: var(--border-l);
    }
    .mandate-items { display: flex; gap: 0; flex: 1; overflow-x: auto; }
    .mandate-item {
      flex-shrink: 0; padding: 0 28px;
      border-right: 1px solid var(--border-l);
      font-size: 13px; color: var(--black); font-weight: 500; line-height: 1.35;
    }
    .mandate-item:first-child { padding-left: 0; }
    .mandate-item span { display: block; font-size: 10px; font-weight: 400; color: var(--gray-1); margin-top: 2px; }

    /* ── Ham + Search (from v12) ── */
    .ham-btn { width:40px;height:40px;display:flex;flex-direction:column;
               align-items:center;justify-content:center;gap:4px;
               background:none;border:1px solid var(--border-l);
               cursor:pointer;transition:border-color .2s;flex-shrink:0;
               margin-left:10px; }
    .ham-btn:hover { border-color:var(--black); }
    .ham-btn span { display:block;width:16px;height:1.5px;
                    background:var(--black); }
    .dm-overlay { position:fixed;inset:0;z-index:850;
                  background:rgba(0,0,0,.35);backdrop-filter:blur(3px);
                  opacity:0;pointer-events:none;transition:opacity .2s; }
    .dm-overlay.open { opacity:1;pointer-events:auto; }
    .dm-box { position:fixed;top:110px;right:20px;width:300px;
              background:#fff;border:1px solid var(--border-l);
              box-shadow:0 16px 48px rgba(0,0,0,.18);
              transform:translateY(-10px) scale(.97);
              transition:transform .2s,opacity .2s;
              opacity:0;pointer-events:none;z-index:851; }
    .dm-overlay.open .dm-box { transform:translateY(0) scale(1);
                                opacity:1;pointer-events:auto; }
    .dm-head { padding:14px 16px 10px;border-bottom:1px solid var(--border-l);
               display:flex;justify-content:space-between;align-items:center; }
    .dm-head-lbl { font-size:9px;font-weight:700;letter-spacing:.18em;
                   text-transform:uppercase;color:var(--gray-1); }
    .dm-x { background:none;border:none;cursor:pointer;color:var(--gray-1);
             font-size:22px;line-height:1;padding:0;transition:color .15s; }
    .dm-x:hover { color:var(--black); }
    .dm-block { padding:13px 16px;border-bottom:1px solid var(--border-l); }
    .dm-block:last-child { border-bottom:none; }
    .dm-lbl { font-size:9px;font-weight:700;letter-spacing:.14em;
              text-transform:uppercase;color:var(--green-lt);margin-bottom:5px; }
    .dm-date { font-family:'Cormorant Garamond',serif;
               font-size:17px;font-weight:400;color:var(--black);
               line-height:1.25;margin-bottom:3px; }
    .dm-time { font-size:13px;color:var(--gray-1);font-family:'DM Sans',sans-serif; }
    .dm-joke { font-size:12px;color:var(--black);line-height:1.65;
               font-style:italic; }
    .dm-verse { font-family:'Cormorant Garamond',serif;font-size:14px;
                font-weight:400;color:var(--black);line-height:1.65;
                font-style:italic;margin-bottom:5px; }
    .dm-ref { font-size:10px;font-weight:700;letter-spacing:.08em;
              text-transform:uppercase;color:var(--gray-1); }

    /* ═══ CONTACT CLEAN ═══ */
    .cc { background:var(--dark);padding:80px 48px;
          display:grid;grid-template-columns:1fr 1fr;
          gap:72px;align-items:center; }
    .cc-grid { display:grid;grid-template-columns:1fr 1fr;
               gap:1px;background:rgba(255,255,255,.06); }
    .cc-card { padding:26px 22px;background:var(--dark); }
    .cc-card-lbl { font-size:9px;font-weight:700;letter-spacing:.14em;
                   text-transform:uppercase;color:var(--green-lt);
                   margin-bottom:8px; }
    .cc-card-title { font-family:'Cormorant Garamond',serif;
                     font-size:20px;font-weight:300;color:#fff;
                     margin-bottom:6px;line-height:1.2; }
    .cc-card-body { font-size:12px;color:rgba(255,255,255,.35);
                    line-height:1.65; }
    .cc-btns { display:flex;gap:10px;flex-wrap:wrap;margin-top:28px; }
    .cc-btn-primary { display:inline-block;padding:13px 26px;
                      background:#fff;color:var(--black);border:none;
                      font-family:'DM Sans',sans-serif;font-size:11px;
                      font-weight:700;letter-spacing:.10em;
                      text-transform:uppercase;cursor:pointer;
                      transition:background .2s; }
    .cc-btn-primary:hover { background:var(--off-white); }
    .cc-btn-ghost { display:inline-block;padding:13px 26px;
                    background:none;color:rgba(255,255,255,.6);
                    border:1px solid rgba(255,255,255,.2);
                    font-family:'DM Sans',sans-serif;font-size:11px;
                    font-weight:700;letter-spacing:.10em;
                    text-transform:uppercase;cursor:pointer;
                    transition:all .2s; }
    .cc-btn-ghost:hover { background:rgba(255,255,255,.06);
                          color:rgba(255,255,255,.9); }
    @media(max-width:1100px){
      .cc{grid-template-columns:1fr;gap:40px;padding:60px 24px;}
    }
    @media(max-width:600px){
      .cc{padding:48px 16px;}
      .cc-grid{grid-template-columns:1fr;}
    }

    /* ── New sections ── */
    
    


    /* ════════════════════════════════════════════
       AUDIENCE SECTIONS
    ════════════════════════════════════════════ */

    .aud-section {
      padding: 96px 48px;
      border-top: var(--rule);
    }
    .aud-section.aud-am { background: #fff; }
    .aud-section.aud-sm { background: var(--black); }
    .aud-section.aud-ed { background: var(--off-white); }

    .aud-inner {
      max-width: 1320px;
      margin: 0 auto;
    }

    /* Role tag */
    .aud-role-tag {
      display: inline-flex; align-items: center; gap: 10px;
      font-size: 10px; font-weight: 700; letter-spacing: .16em;
      text-transform: uppercase; color: var(--accent-light);
      margin-bottom: 20px;
    }
    .aud-role-tag::before {
      content: ''; display: block; width: 24px; height: 1px;
      background: currentColor; flex-shrink: 0;
    }
    .aud-role-tag--green { color: #5a9c70; }
    .aud-role-tag--mono  { color: var(--warm-gray); }

    /* Section header */
    .aud-header {
      max-width: 720px;
      margin-bottom: 56px;
    }
    .aud-heading {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(34px, 3.5vw, 52px);
      font-weight: 300; line-height: 1.08;
      color: var(--black); letter-spacing: -.01em;
      margin-bottom: 18px;
    }
    .aud-section.aud-sm .aud-heading { color: #fff; }
    .aud-heading em { font-style: italic; }
    .aud-sub {
      font-size: 15px; line-height: 1.85;
      color: var(--warm-gray); max-width: 620px;
    }
    .aud-section.aud-sm .aud-sub { color: rgba(255,255,255,.42); }


    /* ══ ASSET MANAGER section ══ */
    .aud-content-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2px;
      background: var(--border);
    }
    .aud-metrics-panel {
      background: var(--black);
      padding: 48px;
    }
    .aud-metric-row {
      display: flex; gap: 0;
      margin-bottom: 40px;
    }
    .aud-metric {
      flex: 1; padding-right: 24px;
    }
    .aud-metric:last-child { padding-right: 0; }
    .aud-metric-divider {
      width: 1px; background: rgba(255,255,255,.08);
      margin: 0 24px;
      flex-shrink: 0;
    }
    .aud-metric-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 44px; font-weight: 300;
      color: #fff; line-height: 1;
      margin-bottom: 8px;
    }
    .aud-metric-lbl {
      font-size: 10px; font-weight: 600;
      letter-spacing: .10em; text-transform: uppercase;
      color: rgba(255,255,255,.28); line-height: 1.5;
    }
    .aud-quote-block {
      border-left: 2px solid var(--accent-light);
      padding-left: 20px;
    }
    .aud-quote-block p {
      font-family: 'Cormorant Garamond', serif;
      font-size: 19px; font-weight: 300; font-style: italic;
      color: rgba(255,255,255,.75); line-height: 1.65;
      margin-bottom: 10px;
    }
    .aud-quote-block cite {
      font-size: 11px; font-weight: 600;
      letter-spacing: .09em; text-transform: uppercase;
      color: rgba(255,255,255,.3); font-style: normal;
    }
    .aud-capability-list {
      background: #fff;
      padding: 48px;
      display: flex; flex-direction: column; gap: 0;
    }
    .aud-cap-item {
      display: flex; gap: 20px; align-items: flex-start;
      padding: 24px 0; border-bottom: var(--rule);
    }
    .aud-cap-item:last-child { border-bottom: none; padding-bottom: 0; }
    .aud-cap-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 28px; font-weight: 300;
      color: var(--accent-light); line-height: 1;
      flex-shrink: 0; width: 32px; margin-top: 2px;
    }
    .aud-cap-title {
      font-size: 14px; font-weight: 700;
      color: var(--black); margin-bottom: 6px; line-height: 1.35;
    }
    .aud-cap-body {
      font-size: 13px; color: var(--warm-gray); line-height: 1.75;
    }


    /* ══ SUSTAINABILITY MANAGER section ══ */
    .aud-gresb-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2px;
      background: rgba(255,255,255,.05);
    }
    .aud-indicator-panel {
      background: #0f1a13;
      padding: 48px;
    }
    .aud-indicator-title {
      font-size: 10px; font-weight: 700;
      letter-spacing: .16em; text-transform: uppercase;
      color: rgba(255,255,255,.25);
      margin-bottom: 28px;
      padding-bottom: 16px;
      border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .aud-indicator-row {
      display: flex; gap: 16px; align-items: flex-start;
      padding: 22px 0; border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .aud-indicator-row:last-child { border-bottom: none; }
    .aud-indicator-code {
      font-family: 'Cormorant Garamond', serif;
      font-size: 30px; font-weight: 300;
      color: var(--accent-light);
      width: 52px; flex-shrink: 0; line-height: 1;
      padding-top: 2px;
    }
    .aud-indicator-name {
      font-size: 13px; font-weight: 700;
      color: #fff; margin-bottom: 5px;
    }
    .aud-indicator-desc {
      font-size: 12px; color: rgba(255,255,255,.38);
      line-height: 1.75;
    }
    .aud-indicator-weight {
      font-family: 'Cormorant Garamond', serif;
      font-size: 24px; font-weight: 300;
      color: var(--accent-light);
      white-space: nowrap; flex-shrink: 0;
      align-self: flex-start;
      margin-top: 2px;
    }
    .aud-esg-proof {
      background: #1a2e20;
      padding: 48px;
      display: flex; flex-direction: column; gap: 0;
    }
    .aud-esg-stat { margin-bottom: 28px; }
    .aud-esg-stat-num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 68px; font-weight: 300;
      color: #fff; line-height: 1;
      margin-bottom: 8px;
    }
    .aud-esg-stat-lbl {
      font-size: 12px; color: rgba(255,255,255,.35);
      line-height: 1.65;
    }
    .aud-esg-divider {
      height: 1px; background: rgba(255,255,255,.07);
      margin: 0 0 28px;
    }
    .aud-esg-checklist {
      display: flex; flex-direction: column;
      gap: 0; margin-bottom: 28px;
    }
    .aud-esg-check-item {
      display: flex; align-items: flex-start; gap: 10px;
      padding: 11px 0;
      border-bottom: 1px solid rgba(255,255,255,.05);
      font-size: 13px; color: rgba(255,255,255,.55);
      line-height: 1.55;
    }
    .aud-esg-check-item:last-child { border-bottom: none; }
    .aud-esg-check-item svg { color: var(--accent-light); flex-shrink: 0; margin-top: 2px; }
    .aud-esg-note {
      font-size: 12px; color: rgba(255,255,255,.28);
      line-height: 1.75;
      border-top: 1px solid rgba(255,255,255,.06);
      padding-top: 20px;
    }


    /* ══ ENGINEERING DIRECTOR section ══ */
    .aud-tech-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2px;
      background: var(--border);
    }
    .aud-tech-specs {
      background: #fff;
      padding: 48px;
      display: flex; flex-direction: column; gap: 0;
    }
    .aud-tech-item {
      display: flex; gap: 18px; align-items: flex-start;
      padding: 22px 0; border-bottom: var(--rule);
    }
    .aud-tech-item:first-child { padding-top: 0; }
    .aud-tech-item:last-child  { border-bottom: none; padding-bottom: 0; }
    .aud-tech-icon {
      width: 40px; height: 40px; flex-shrink: 0;
      background: rgba(45,92,66,.07);
      display: flex; align-items: center; justify-content: center;
      color: var(--accent-light);
    }
    .aud-tech-title {
      font-size: 13px; font-weight: 700;
      color: var(--black); margin-bottom: 6px; line-height: 1.35;
    }
    .aud-tech-body {
      font-size: 12px; color: var(--warm-gray); line-height: 1.75;
    }
    .aud-tech-panel {
      background: var(--black);
      padding: 48px;
      display: flex; flex-direction: column;
    }
    .aud-tech-panel-title {
      font-size: 10px; font-weight: 700;
      letter-spacing: .16em; text-transform: uppercase;
      color: rgba(255,255,255,.25);
      margin-bottom: 24px;
      padding-bottom: 14px;
      border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .aud-tech-compat {
      display: flex; flex-direction: column; gap: 0;
      flex: 1;
    }
    .aud-compat-category {
      padding: 18px 0;
      border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .aud-compat-category:last-child { border-bottom: none; }
    .aud-compat-label {
      font-size: 10px; font-weight: 700;
      letter-spacing: .12em; text-transform: uppercase;
      color: var(--accent-light); margin-bottom: 6px;
    }
    .aud-compat-items {
      font-size: 12px; color: rgba(255,255,255,.45);
      line-height: 1.7;
    }
    .aud-tech-quote {
      margin-top: 28px;
      padding-top: 24px;
      border-top: 1px solid rgba(255,255,255,.06);
    }
    .aud-tech-quote p {
      font-family: 'Cormorant Garamond', serif;
      font-size: 17px; font-weight: 300; font-style: italic;
      color: rgba(255,255,255,.6); line-height: 1.65;
      margin-bottom: 8px;
    }
    .aud-tech-quote cite {
      font-size: 10px; font-weight: 700;
      letter-spacing: .09em; text-transform: uppercase;
      color: rgba(255,255,255,.25); font-style: normal;
    }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
      .aud-content-grid,
      .aud-gresb-grid,
      .aud-tech-grid { grid-template-columns: 1fr; }
      .aud-metric-row { flex-wrap: wrap; gap: 24px; }
      .aud-metric-divider { display: none; }
    }
    @media (max-width: 768px) {
      .aud-section { padding: 64px 24px; }
      .aud-metrics-panel,
      .aud-capability-list,
      .aud-indicator-panel,
      .aud-esg-proof,
      .aud-tech-specs,
      .aud-tech-panel { padding: 36px 24px; }
    }
    @media (max-width: 480px) {
      .aud-metric-row { flex-direction: column; }
    }

  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Water Monitoring — Water Solutions Technology</title>
  
  
  
  
  
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Portfolio Water Visibility — Water Solutions Technology</title>
</head>
<body>

<!-- TOP BAR -->
<div class="top-bar">
  <a href="/investors">Investors</a>
  <a href="/about">About</a>
  <div class="tb-dropdown-wrap">
    <a href="/opportunities/asset-managers">Opportunities
      <svg width="9" height="6" viewBox="0 0 10 6" fill="currentColor"><path d="M0 0l5 6 5-6z"/></svg>
    </a>
    <div class="tb-dropdown">
      <div class="tb-dropdown-header">Opportunities</div>
      <a href="/opportunities/asset-managers">Portfolio Owner &amp; Asset Managers</a>
      <a href="/opportunities/mep">MEP Servicers</a>
      <a href="/opportunities/esg">ESG</a>
      <a href="/opportunities/careers">Careers</a>
      <a href="/opportunities/agents">Agents</a>
    </div>
  </div>
  <a href="https://member.watersolutech.com">
    <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor" style="vertical-align:middle;margin-right:4px;opacity:0.5"><circle cx="6" cy="4" r="2.5"/><path d="M1 11c0-2.76 2.24-5 5-5s5 2.24 5 5"/></svg>
    Login
  </a>
</div>

<!-- NAV -->
<nav>
  <!-- To use a PNG logo: replace the SVG below with
       <img src="/assets/img/wst-logo.png" alt="Water Solutions Technology" style="height:44px;width:auto;"/>
       inside the .nav-logo-wrap anchor tag. -->
  <a href="/" class="nav-logo-wrap" aria-label="Water Solutions Technology — Home">
    <!-- Bubble cluster -->
    <svg class="nav-logo-icon" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle cx="14" cy="28" r="13" fill="#7db87d"/>
      <circle cx="28" cy="22" r="10.5" fill="#2d5c42"/>
      <circle cx="14" cy="41" r="6" fill="#9ecf9e"/>
      <circle cx="37" cy="33" r="4.5" fill="#b5d9b5"/>
    </svg>
    <!-- Wordmark: W with green slash + ATER + subtitle -->
    <div class="nav-logo-text">
      <div class="nav-logo-wordmark-wrap">
        <svg width="108" height="20" viewBox="0 0 108 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
          <!-- W strokes (black) -->
          <path d="M1 1 L7.5 17 L13.5 6.5 L19.5 17 L26 1" stroke="#0d0d0d" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
          <!-- Green diagonal slash overlaid on W centre -->
          <line x1="12" y1="0.5" x2="15.5" y2="18.5" stroke="#2d5c42" stroke-width="2.1" stroke-linecap="round"/>
          <!-- ATER text -->
          <text x="29" y="16" font-family="'DM Sans',Arial,sans-serif" font-size="16" font-weight="700" fill="#0d0d0d" letter-spacing="0.3">ATER</text>
        </svg>
        <span class="nav-logo-sub2">Solutions Technology Inc.</span>
      </div>
    </div>
  </a>

  <ul class="nav-links">

    <!-- SERVICES — dropdown -->
    <li>
      <a href="/services">Services <svg viewBox="0 0 10 6" fill="currentColor"><path d="M0 0l5 6 5-6z"/></svg></a>
      <div class="dropdown">
        <div class="dropdown-section-label" style="padding:10px 16px 4px;font-size:9px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:#999;">Services</div>
        <a href="/services/efficiency-audits">Efficiency Audits</a>
        <a href="/services/efficiency-audits">Feasibility Assessment</a>
        <a href="/services/utility-intelligence">Utility Intelligence (Ara AI)</a>
        <a href="/services/meter-accuracy">Meter Accuracy Optimization</a>
        <a href="/services/smart-monitoring">Smart Water Monitoring</a>
        <a href="/services/water-recovery">Smart Water Recovery</a>
        <a href="/services/cooling-tower">Cooling Tower Optimization</a>
        <a href="/gresb">GRESB Compliance &amp; Strategy</a>
      </div>
    </li>

    <!-- INDUSTRIES — plain link, no dropdown -->
    <li>
      <a href="/industries">Industries</a>
    </li>

    <!-- RESOURCES — dropdown -->
    <li>
      <a href="/resources">Resources <svg viewBox="0 0 10 6" fill="currentColor"><path d="M0 0l5 6 5-6z"/></svg></a>
      <div class="dropdown">
        <div class="dropdown-section-label" style="padding:10px 16px 4px;font-size:9px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:#999;">Resources</div>
        <a href="/resources/articles">Articles</a>
        <a href="/resources/case-studies">Case Studies</a>
        <a href="/resources/white-papers">White Papers</a>
        <a href="/resources/city-rebates">My City Water Rebates</a>
        <a href="/resources/tax-strategy">Tax Strategy &amp; Financing</a>
        <a href="/resources/webinars">Webinars On Demand</a>
        <a href="/resources/events">Events (Past &amp; Upcoming)</a>
        <a href="/resources/tools">Water Target Tools (&amp; Cost Reduction)</a>
      </div>
    </li>

    <!-- ABOUT — plain link, no dropdown -->
    <li>
      <a href="/about">About</a>
    </li>

  </ul>

  <div class="nav-right">
    <button id="nav-search-btn" class="nav-icon-btn" aria-label="Search" type="button">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="7" cy="7" r="4.5"/><line x1="10.5" y1="10.5" x2="14" y2="14"/></svg>
    </button>

    <a href="/contact" class="nav-cta" id="nav-cta-btn">Speak with an Advisor</a>
    <button class="ham-btn" id="ham-btn" type="button" aria-label="Daily &mdash; date, joke &amp; scripture">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-left">
    <div class="hero-eyebrow">Portfolio Advisory · Water Infrastructure</div>
    <h1 class="hero-headline">
      Water visibility<br>
      at the <em>portfolio</em><br>
      level.
    </h1>
    <p class="hero-tagline">
      We work with real estate portfolios to reduce infrastructure cost exposure—specifically water—and convert those improvements into measurable NOI and asset value.
    </p>
    <div class="hero-actions">
      <a href="#swm-form" class="btn-primary">Request Portfolio Assessment</a>
      <a href="#how" class="btn-ghost">How It Works</a>
    </div>
  </div>

  <div class="hero-right">
    <div class="hero-stat-grid">
      <div class="hero-stat">
        <div class="hero-stat-value">25.3%</div>
        <div class="hero-stat-label">Water reduction verified</div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-value">$2.3M</div>
        <div class="hero-stat-label">Savings documented</div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-value">31</div>
        <div class="hero-stat-label">Assets monitored</div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-value">500+</div>
        <div class="hero-stat-label">Properties served</div>
      </div>
    </div>
    <div class="hero-proof">
      <div class="hero-proof-label">DiamondRock Hospitality · Westin Fort Lauderdale</div>
      <div class="hero-proof-text">
        "Verified savings across 31 assets. Reported at the GRESB level."
      </div>
    </div>
  </div>
</section>

<!-- PROBLEM -->
<section class="problem-section">
  <div class="section-header">
    <div class="section-number">01 — The Problem</div>
    <h2 class="section-title">Most portfolios are flying <em>blind</em> on water.</h2>
    <p class="section-description">
      Without asset-level visibility, water is managed as an operating expense — not as a capital markets input. That's a structural disadvantage.
    </p>
  </div>

  <div class="problem-grid">
    <div class="problem-card">
      <div class="problem-card-number">— 01</div>
      <h3 class="problem-card-title">No line of sight to consumption</h3>
      <p class="problem-card-body">
        Portfolio managers receive aggregate utility bills — not actionable data. Anomalies, leaks, and inefficiencies compound for months before anyone notices. By then, the cost is already in the books.
      </p>
    </div>
    <div class="problem-card">
      <div class="problem-card-number">— 02</div>
      <h3 class="problem-card-title">GRESB water data is incomplete or estimated</h3>
      <p class="problem-card-body">
        Missing or low-coverage water data directly suppresses GRESB scores. With 150+ institutional investors referencing GRESB benchmarks, a weak water indicator affects fund positioning and capital access — not just compliance.
      </p>
    </div>
    <div class="problem-card">
      <div class="problem-card-number">— 03</div>
      <h3 class="problem-card-title">Savings are invisible without verification</h3>
      <p class="problem-card-body">
        Efficiency upgrades without verified measurement cannot be reported to investment committees or reflected in NOI projections. Unverified claims carry no weight in underwriting or ESG disclosure.
      </p>
    </div>
  </div>
</section>

<!-- PORTFOLIO VISIBILITY -->
<section class="visibility-section" id="visibility">
  <div class="section-header">
    <div class="section-number">02 — Portfolio Visibility</div>
    <h2 class="section-title">What <em>portfolio-level</em> water visibility actually means.</h2>
    <p class="section-description">
      Visibility isn't sensors. It's the intelligence layer that turns consumption data into investment decisions.
    </p>
  </div>

  <div class="visibility-grid">
    <div class="visibility-left">
      <p class="pull-quote">
        "Water data should tell you which assets are performing, which are at risk, and what the NOI impact is — in real time."
      </p>
      <p class="pull-quote-source">— WST Advisory Framework</p>
    </div>

    <div class="visibility-right">
      <div class="visibility-item">
        <div class="visibility-item-tag">Asset Intelligence</div>
        <h3 class="visibility-item-title">Consumption benchmarked by asset class</h3>
        <p class="visibility-item-body">Every asset measured against its own peer group. Hospitality vs. office vs. industrial — each with its own intensity baseline and anomaly threshold.</p>
      </div>
      <div class="visibility-item">
        <div class="visibility-item-tag">Operational Risk</div>
        <h3 class="visibility-item-title">Leak detection with financial quantification</h3>
        <p class="visibility-item-body">Real-time monitoring flags abnormal consumption. Every alert is translated into an estimated cost exposure before it becomes a capital event.</p>
      </div>
      <div class="visibility-item">
        <div class="visibility-item-tag">Capital Markets</div>
        <h3 class="visibility-item-title">GRESB-formatted data coverage, automatically</h3>
        <p class="visibility-item-body">The Ara AI platform automates utility bill collection portfolio-wide, ensuring data coverage that satisfies WT1 indicator requirements — the highest-weight water component in GRESB scoring.</p>
      </div>
      <div class="visibility-item">
        <div class="visibility-item-tag">NOI Translation</div>
        <h3 class="visibility-item-title">Savings presented in investment committee language</h3>
        <p class="visibility-item-body">Every efficiency improvement is converted to annualized savings, payback period, and NOI impact — with verified documentation suitable for lender, investor, and ESG disclosure.</p>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════
     SECTION A — ASSET MANAGER
     Audience: Portfolio / Fund Manager
     Need: NOI impact, capital markets proof,
           investment committee language
════════════════════════════════════════════ -->
<section class="aud-section aud-am">
  <div class="aud-inner">

    <div class="aud-header">
      <div class="aud-role-tag">For Asset Managers &amp; Portfolio Directors</div>
      <h2 class="aud-heading">From Water Cost<br>to <em>Portfolio Intelligence</em></h2>
      <p class="aud-sub">Water is the last unmanaged utility in most institutional portfolios. WST converts asset-level consumption data into the financial metrics your investment committee, lenders, and LPs expect — NOI impact, payback period, and verified savings documentation.</p>
    </div>

    <div class="aud-content-grid">

      <div class="aud-metrics-panel">
        <div class="aud-metric-row">
          <div class="aud-metric">
            <div class="aud-metric-num">15–30%</div>
            <div class="aud-metric-lbl">Water cost reduction<br>per asset, post-audit</div>
          </div>
          <div class="aud-metric-divider"></div>
          <div class="aud-metric">
            <div class="aud-metric-num">$2.3M</div>
            <div class="aud-metric-lbl">Verified savings<br>across 31 assets</div>
          </div>
          <div class="aud-metric-divider"></div>
          <div class="aud-metric">
            <div class="aud-metric-num">&lt;12mo</div>
            <div class="aud-metric-lbl">Typical payback<br>on monitoring investment</div>
          </div>
        </div>
        <div class="aud-quote-block">
          <p>"Verified savings across 31 assets. Reported at the GRESB level. WST gave us the data to have a different conversation with our investors."</p>
          <cite>Portfolio Manager · DiamondRock Hospitality</cite>
        </div>
      </div>

      <div class="aud-capability-list">
        <div class="aud-cap-item">
          <div class="aud-cap-num">01</div>
          <div>
            <div class="aud-cap-title">Portfolio-level NOI dashboard</div>
            <div class="aud-cap-body">Every asset's water consumption benchmarked against its class peers. Underperforming assets flagged by cost exposure — not just consumption volume — so you prioritise capital allocation correctly.</div>
          </div>
        </div>
        <div class="aud-cap-item">
          <div class="aud-cap-num">02</div>
          <div>
            <div class="aud-cap-title">Investment committee–ready documentation</div>
            <div class="aud-cap-body">Every efficiency improvement expressed as annualised savings, IRR contribution, and payback period. Formatted for IC presentations, lender submissions, and ESG disclosure — not operational reports.</div>
          </div>
        </div>
        <div class="aud-cap-item">
          <div class="aud-cap-num">03</div>
          <div>
            <div class="aud-cap-title">Acquisition due diligence &amp; baseline</div>
            <div class="aud-cap-body">Establish verified water cost baselines on acquisition targets. Uncover billing errors and infrastructure risk before closing. Water liabilities that compound for years are now identifiable within 48 hours of bill access.</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════
     SECTION B — SUSTAINABILITY MANAGER
     Audience: Head of ESG / Sustainability Director
     Need: GRESB coverage, verified data,
           WT1/MR3/RA4 indicators, CDP compliance
════════════════════════════════════════════ -->
<section class="aud-section aud-sm">
  <div class="aud-inner">

    <div class="aud-header">
      <div class="aud-role-tag aud-role-tag--green">For Sustainability &amp; ESG Managers</div>
      <h2 class="aud-heading">GRESB Water Coverage,<br><em>Automated</em></h2>
      <p class="aud-sub">Water data gaps are the single most common reason portfolios lose GRESB points on the water component. WST's Ara AI platform automates utility bill collection portfolio-wide, closing WT1 coverage gaps before submission — and producing verified documentation for CDP and LP disclosure.</p>
    </div>

    <div class="aud-gresb-grid">

      <div class="aud-indicator-panel">
        <div class="aud-indicator-title">GRESB Water Indicators Addressed</div>
        <div class="aud-indicator-row">
          <div class="aud-indicator-code">WT1</div>
          <div>
            <div class="aud-indicator-name">Water Data Coverage</div>
            <div class="aud-indicator-desc">The highest-weighted water indicator (4 of ~7.67 points). Ara AI automates bill acquisition to maximise coverage percentage across your portfolio — eliminating the manual collection that most teams fail to complete before the submission deadline.</div>
          </div>
          <div class="aud-indicator-weight">4 pts</div>
        </div>
        <div class="aud-indicator-row">
          <div class="aud-indicator-code">MR3</div>
          <div>
            <div class="aud-indicator-name">Monitoring &amp; Targets</div>
            <div class="aud-indicator-desc">Real-time IoT monitoring with documented asset-level targets satisfies MR3 requirements. Every alert is logged with cost impact — creating the audit trail GRESB validators expect.</div>
          </div>
          <div class="aud-indicator-weight">2 pts</div>
        </div>
        <div class="aud-indicator-row">
          <div class="aud-indicator-code">RA4</div>
          <div>
            <div class="aud-indicator-name">Risk Assessment</div>
            <div class="aud-indicator-desc">Infrastructure risk quantified at the asset level. Physical water risk — leak exposure, aging meter accuracy, cooling tower bleed rates — documented in the format GRESB's RA4 assessment requires.</div>
          </div>
          <div class="aud-indicator-weight">1 pt</div>
        </div>
      </div>

      <div class="aud-esg-proof">
        <div class="aud-esg-stat">
          <div class="aud-esg-stat-num">150+</div>
          <div class="aud-esg-stat-lbl">Institutional investors use<br>GRESB benchmarks for capital decisions</div>
        </div>
        <div class="aud-esg-divider"></div>
        <div class="aud-esg-checklist">
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            Automated WT1 data collection — no manual entry
          </div>
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            Verification-ready documentation for CDP and investor disclosure
          </div>
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            Like-for-like performance tracking across asset classes
          </div>
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            Sub-meter data supporting GRESB's enhanced scoring pathway
          </div>
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            27% average water use reduction documented post-audit
          </div>
        </div>
        <div class="aud-esg-note">
          WST is a GRESB Solution Provider Partner. Our datasets are structured to satisfy GRESB submission requirements — not adapted from them after the fact.
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════
     SECTION C — ENGINEERING DIRECTOR
     Audience: Director of Engineering / Facilities
     Need: Technical credibility, no-rip-replace,
           integration with existing meters,
           real-time alerts, field-level detail
════════════════════════════════════════════ -->
<section class="aud-section aud-ed">
  <div class="aud-inner">

    <div class="aud-header">
      <div class="aud-role-tag aud-role-tag--mono">For Directors of Engineering &amp; Facilities</div>
      <h2 class="aud-heading">The Technical Layer<br><em>Your Team Can Trust</em></h2>
      <p class="aud-sub">WST doesn't replace your infrastructure — it instruments it. Our IoT monitoring layer integrates with existing main and sub-meters, cooling towers, boilers, and irrigation systems to produce real-time consumption data at the device level. No rip-and-replace. No extended installation windows.</p>
    </div>

    <div class="aud-tech-grid">

      <div class="aud-tech-specs">

        <div class="aud-tech-item">
          <div class="aud-tech-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="2" y="4" width="14" height="10" rx="1.5"/><path d="M6 4V3a1 1 0 011-1h4a1 1 0 011 1v1"/><path d="M9 9v.01"/></svg>
          </div>
          <div>
            <div class="aud-tech-title">Meter Integration — No New Hardware Required</div>
            <div class="aud-tech-body">Connects to your existing main meters, pulse-output sub-meters, and BMS data feeds. Supports Modbus, BACnet, M-Bus, and direct pulse-count wiring. No proprietary hardware lock-in. If a meter already exists, we read it.</div>
          </div>
        </div>

        <div class="aud-tech-item">
          <div class="aud-tech-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="9" cy="9" r="6.5"/><path d="M9 5.5v4l2.5 1.5"/></svg>
          </div>
          <div>
            <div class="aud-tech-title">Real-Time Anomaly Detection — Before the Next Bill</div>
            <div class="aud-tech-body">Baseline deviation triggers alerts in minutes — not billing cycles. Leak signatures, abnormal night-flow, cooling tower bleed rates outside tolerance, and irrigation system faults all surface before they compound into capital events. Every alert includes estimated cost impact.</div>
          </div>
        </div>

        <div class="aud-tech-item">
          <div class="aud-tech-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 13V8l5-4 5 4v5"/><path d="M7 13v-3h4v3"/></svg>
          </div>
          <div>
            <div class="aud-tech-title">Per-Asset, Per-System Drill-Down</div>
            <div class="aud-tech-body">Flow, pressure, and temperature at individual boilers, chillers, cooling towers, and tenant zones. Visualise make-up vs. discharge at any valve. Historical playback lets your team replay last month's flow map to pinpoint abnormal cycles without waiting for a site visit.</div>
          </div>
        </div>

        <div class="aud-tech-item">
          <div class="aud-tech-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 9h12M9 3v12"/><circle cx="9" cy="9" r="3"/></svg>
          </div>
          <div>
            <div class="aud-tech-title">Condition-Based Routing to Your Team</div>
            <div class="aud-tech-body">Critical alarms route to your engineering team's preferred channel — email, SMS, or BMS integration — with full context: asset, system, magnitude, and estimated daily cost. Threshold parameters are configured per system, per site, by your team.</div>
          </div>
        </div>

      </div>

      <div class="aud-tech-panel">
        <div class="aud-tech-panel-title">Supported Systems</div>
        <div class="aud-tech-compat">
          <div class="aud-compat-category">
            <div class="aud-compat-label">Mechanical</div>
            <div class="aud-compat-items">Cooling Towers · Boilers · Chillers · Heat Exchangers · HVAC Make-Up</div>
          </div>
          <div class="aud-compat-category">
            <div class="aud-compat-label">Fixtures &amp; Zones</div>
            <div class="aud-compat-items">Tenant Sub-Meters · Common Areas · Irrigation · Laundry · Kitchen</div>
          </div>
          <div class="aud-compat-category">
            <div class="aud-compat-label">Protocols</div>
            <div class="aud-compat-items">Modbus RTU/TCP · BACnet IP · M-Bus · Pulse Output · 4–20mA · API</div>
          </div>
          <div class="aud-compat-category">
            <div class="aud-compat-label">Reporting</div>
            <div class="aud-compat-items">GRESB Export · IC Documentation · Maintenance Logs · PDF / CSV</div>
          </div>
        </div>
        <div class="aud-tech-quote">
          <p>"WST's audit found issues our engineers missed — it paid for itself in 90 days."</p>
          <cite>Director of Engineering · Hilton South Tower</cite>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how-section" id="how">
  <div class="section-header">
    <div class="section-number">03 — Delivery Model</div>
    <h2 class="section-title">Two systems. <em>One</em> integrated view.</h2>
    <p class="section-description">
      Ara AI handles data coverage. Real-time monitoring validates it. Together they produce the audit-grade visibility institutional portfolios require.
    </p>
  </div>

  <div class="how-steps">
    <div class="how-step">
      <div class="how-step-num">1</div>
      <div class="how-step-tag">Ara AI Platform</div>
      <h3 class="how-step-title">Automated utility bill collection</h3>
      <p class="how-step-body">Ara aggregates utility data across the portfolio automatically — eliminating manual entry, closing coverage gaps, and generating GRESB-ready datasets at scale.</p>
      <div class="how-step-detail">WT1 Coverage · Historical Data · Automated Collection</div>
    </div>
    <div class="how-step">
      <div class="how-step-num">2</div>
      <div class="how-step-tag">IoT Monitoring Layer</div>
      <h3 class="how-step-title">Real-time validation & anomaly detection</h3>
      <p class="how-step-body">Smart sensors monitor live consumption at the asset level. Deviations from baseline trigger immediate alerts with estimated cost impact — before the next billing cycle.</p>
      <div class="how-step-detail">Leak Detection · Baseline Deviation · Real-Time Alerts</div>
    </div>
    <div class="how-step">
      <div class="how-step-num">3</div>
      <div class="how-step-tag">Advisory Synthesis</div>
      <h3 class="how-step-title">Verified data → investment insight</h3>
      <p class="how-step-body">WST translates both data streams into portfolio-level reporting: GRESB submissions, NOI impact analyses, efficiency roadmaps, and investment committee documentation.</p>
      <div class="how-step-detail">GRESB Submission · NOI Analysis · IC Reporting</div>
    </div>
  </div>
</section>

<!-- CASE STUDY -->
<section class="case-section">
  <div class="case-inner">
    <div>
      <div class="case-label">Verified Case Study — DiamondRock Hospitality</div>
      <h2 class="case-headline">$2.3M in verified savings. 31 assets. Reported.</h2>
      <p class="case-body">
        DiamondRock engaged WST to establish portfolio-wide water visibility across its hospitality assets, beginning with The Westin Fort Lauderdale Beach Resort. Real-time monitoring and bill validation delivered verified consumption reductions that were documented for both internal reporting and GRESB submission.
      </p>
      <a href="#" class="case-link">Read Full Case Study</a>
    </div>
    <div>
      <div class="case-metrics">
        <div class="case-metric">
          <div class="case-metric-value">25.3%</div>
          <div class="case-metric-label">Water reduction</div>
        </div>
        <div class="case-metric">
          <div class="case-metric-value">$2.3M</div>
          <div class="case-metric-label">Verified savings</div>
        </div>
        <div class="case-metric">
          <div class="case-metric-value">31</div>
          <div class="case-metric-label">Assets in scope</div>
        </div>
        <div class="case-metric">
          <div class="case-metric-value">GRESB</div>
          <div class="case-metric-label">Reported & verified</div>
        </div>
        <div class="case-client">The Westin Fort Lauderdale Beach Resort · DiamondRock Hospitality</div>
      </div>
    </div>
  </div>
</section>

<!-- ENGAGEMENT TIERS -->
<section class="tiers-section" id="engage">
  <div class="section-header">
    <div class="section-number">04 — Engagement Model</div>
    <h2 class="section-title">Two ways to <em>engage</em> WST.</h2>
    <p class="section-description">
      Whether you need a defined-scope assessment or ongoing portfolio advisory, WST structures around your investment cycle — not a product catalog.
    </p>
  </div>

  <div class="tiers-grid">
    <!-- Project -->
    <div class="tier-card">
      <div class="tier-badge">Project-Based</div>
      <h3 class="tier-name">Portfolio Water Assessment</h3>
      <p class="tier-description">
        A scoped engagement producing audit-grade findings, GRESB-formatted data, and a prioritized efficiency roadmap. Designed for acquisition due diligence, GRESB preparation, or establishing a water baseline across a new portfolio segment.
      </p>
      <div class="tier-includes-label">Engagement Includes</div>
      <ul class="tier-includes">
        <li>On-site and bill validation water audit across defined assets</li>
        <li>Asset-level consumption data formatted for GRESB submission</li>
        <li>Water intensity benchmarking vs. peer asset class</li>
        <li>Prioritized efficiency opportunities with ROI and payback</li>
        <li>Investment committee–ready findings documentation</li>
      </ul>
      <a href="/cdn-cgi/l/email-protection#b6d7d5d5f6c1d7c2d3c4c5d9dac3c2d3d5de98d5d9db" class="tier-cta">Request Scope & Proposal</a>
    </div>

    <!-- Retained -->
    <div class="tier-card featured">
      <div class="tier-badge">Retained Advisory</div>
      <h3 class="tier-name">Ongoing Portfolio Visibility</h3>
      <p class="tier-description">
        A continuous advisory relationship providing real-time monitoring, automated GRESB data collection via Ara AI, and ongoing NOI impact reporting across the portfolio. WST functions as an embedded water intelligence layer.
      </p>
      <div class="tier-includes-label">Engagement Includes</div>
      <ul class="tier-includes">
        <li>Ara AI automated utility bill collection — portfolio-wide</li>
        <li>Real-time IoT monitoring with anomaly alerts and cost translation</li>
        <li>Annual GRESB water data preparation and submission support</li>
        <li>Quarterly portfolio water performance reporting</li>
        <li>Efficiency project implementation and verified savings documentation</li>
        <li>Investment committee briefings and ESG disclosure support</li>
      </ul>
      <a href="/cdn-cgi/l/email-protection#0b6a68684b7c6a7f6e797864677e7f6e686325686466" class="tier-cta">Discuss Retained Engagement</a>
    </div>
  </div>
</section>

<!-- CTA -->
<div class="cta-banner">
  <div>
    <h2 class="cta-headline">
      Start with a portfolio<br>
      <em>visibility assessment.</em>
    </h2>
    <p class="cta-sub">
      A 90-minute working session with WST to map your current water data coverage, identify GRESB gaps, and outline the NOI impact of closing them. No obligation.
    </p>
  </div>
  <div class="cta-right">
    <a href="#swm-form" class="btn-primary">Schedule Assessment</a>
    <a href="#" class="btn-ghost">Download Capability Brief</a>
  </div>
</div>

<!-- ─── FOOTER ─── -->
<footer>
  <div class="footer-main">
    <div>
      <a href="/" class="footer-brand-name">Water Solutions Technology</a>
      <p class="footer-tagline">We translate water performance into financial and investment outcomes — for institutional real estate portfolios across the US.</p>
      <div class="footer-address">
        1200 S. Andrews Avenue, Suite 504<br>
        Fort Lauderdale, FL 33301<br>
        <a href="tel:+19545083877">+1 (954) 508-3877</a><br>
        <a href="/cdn-cgi/l/email-protection#3f5e5c5c7f485e4b5a4d4c50534a4b5a5c57115c5052"><span class="__cf_email__" data-cfemail="28494b4b685f495c4d5a5b47445d5c4d4b40064b4745">[email&#160;protected]</span></a>
      </div>
      <div class="footer-socials">
        <a href="https://www.linkedin.com/company/water-solutions-technology" class="footer-social" aria-label="LinkedIn" target="_blank" rel="noopener">in</a>
        <a href="https://twitter.com/watersolutech" class="footer-social" aria-label="X / Twitter" target="_blank" rel="noopener">𝕏</a>
        <a href="https://www.youtube.com/@watersolutionstech" class="footer-social" aria-label="YouTube" target="_blank" rel="noopener">▷</a>
      </div>
    </div>
    <div>
      <div class="footer-col-title">About</div>
      <ul class="footer-links">
        <li><a href="/about">Our Story</a></li>
        <li><a href="/about/team">Team</a></li>
        <li><a href="/investors">Investors</a></li>
        <li><a href="/opportunities/mep">Careers &amp; Partners</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-col-title">Portfolio</div>
      <ul class="footer-links">
        <li><a href="/resources/case-studies">Case Studies</a></li>
        <li><a href="/industries">Industries</a></li>
        <li><a href="/services">All Services</a></li>
        <li><a href="/resources/tools">Water Tools</a></li>
      </ul>
      <div class="footer-col-title" style="margin-top:24px;">Portals</div>
      <ul class="footer-links">
        <li><a href="https://member.watersolutech.com">Member Portal</a></li>
        <li><a href="https://monitor.watersolutech.com">Smart Monitor</a></li>
        <li><a href="https://ara.watersolutech.com">Ara AI Assistant</a></li>
        <li><a href="https://clientportal.watersolutech.com">Project Tracking</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-col-title">Resources</div>
      <ul class="footer-links">
        <li><a href="/resources/white-papers">White Papers</a></li>
        <li><a href="/resources/webinars">Webinars On Demand</a></li>
        <li><a href="/resources/tools">GRESB Peer Tool</a></li>
        <li><a href="/resources/tax-strategy">Tax Strategy</a></li>
        <li><a href="/resources/city-rebates">Water Consumption Tool</a></li>
        <li><a href="/resources/events">Events &amp; Conferences</a></li>
        <li><a href="/resources/tax-strategy">Financing Application</a></li>
      </ul>
      <div class="footer-col-title" style="margin-top:24px;">Legal</div>
      <ul class="footer-links">
        <li><a href="/privacy-policy">Privacy Policy</a></li>
        <li><a href="/user-agreement">User Agreement</a></li>
        <li><a href="/terms">Terms of Service</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-bottom-left">
      <span class="footer-copy">© <span id="footer-yr"></span> Water Solutions Technology, LLC. All rights reserved.</span>
    </div>
    <div style="display:flex;align-items:center;gap:20px;">
      <div class="footer-bottom-links">
        <a href="/resources/webinars">Webinars &amp; Events</a>
        <a href="https://member.watersolutech.com">Login</a>
      </div>
      <a href="/contact" class="footer-portfolio-cta">Choose Your Portfolio</a>
    </div>
  </div>
</footer>

<!-- ═══ CONSULTATION POPUP ═══ -->
<div class="co" id="co" role="dialog" aria-modal="true" aria-labelledby="co-title">
  <div class="co-box">
    <div id="co-form-wrap">
      <div class="co-head">
        <div>
          <h2 class="co-title" id="co-title">Schedule Your ESG Water Consultation</h2>
          <p class="co-sub">Our water performance advisors will analyse your portfolio — identifying infrastructure cost exposure, ESG data gaps, and the verified financial impact of a structured water programme.</p>
        </div>
        <button class="co-x" id="co-x" aria-label="Close form">&times;</button>
      </div>
      <div class="co-strips">
        <div class="co-strip">
          <div class="co-strip-lbl">Risk Mitigation</div>
          <div class="co-strip-val">Identify hidden cost exposure before it compounds</div>
        </div>
        <div class="co-strip">
          <div class="co-strip-lbl">Financial Impact</div>
          <div class="co-strip-val">Average 15&ndash;30% reduction in annual water spend</div>
        </div>
        <div class="co-strip">
          <div class="co-strip-lbl">ESG Performance</div>
          <div class="co-strip-val">Verified data for LP reporting &amp; investor disclosure</div>
        </div>
      </div>
      <div class="co-body">
        <!-- Honeypot — bots fill this in, humans never see it -->
        <div style="position:absolute;left:-9999px;height:0;overflow:hidden;" aria-hidden="true">
          <input type="text" name="co_hp" id="co-hp" tabindex="-1" autocomplete="off">
        </div>
        <div class="co-row">
          <div class="co-fw">
            <label class="co-lbl" for="co-fn">First Name <span class="co-req">*</span></label>
            <input type="text" class="co-inp" id="co-fn" placeholder="First name" maxlength="80" autocomplete="given-name">
            <span class="co-errmsg" id="co-fn-e"></span>
          </div>
          <div class="co-fw">
            <label class="co-lbl" for="co-ln">Last Name <span class="co-req">*</span></label>
            <input type="text" class="co-inp" id="co-ln" placeholder="Last name" maxlength="80" autocomplete="family-name">
            <span class="co-errmsg" id="co-ln-e"></span>
          </div>
        </div>
        <div class="co-row">
          <div class="co-fw">
            <label class="co-lbl" for="co-em">Work Email <span class="co-req">*</span></label>
            <input type="email" class="co-inp" id="co-em" placeholder="you@company.com" maxlength="200" autocomplete="work email">
            <span class="co-errmsg" id="co-em-e"></span>
          </div>
          <div class="co-fw">
            <label class="co-lbl" for="co-co">Company <span class="co-req">*</span></label>
            <input type="text" class="co-inp" id="co-co" placeholder="Company name" maxlength="120" autocomplete="organization">
            <span class="co-errmsg" id="co-co-e"></span>
          </div>
        </div>
        <div class="co-row">
          <div class="co-fw">
            <label class="co-lbl" for="co-ph">Phone Number</label>
            <input type="tel" class="co-inp" id="co-ph" placeholder="+1 (000) 000-0000" maxlength="30" autocomplete="tel">
            <span class="co-errmsg" id="co-ph-e"></span>
          </div>
          <div class="co-fw">
            <label class="co-lbl" for="co-ps">Portfolio Size (# Properties)</label>
            <input type="number" class="co-inp" id="co-ps" placeholder="e.g. 25" min="1" max="9999">
            <span class="co-errmsg"></span>
          </div>
        </div>
        <div class="co-row">
          <div class="co-fw">
            <label class="co-lbl" for="co-int">Primary Interest</label>
            <select class="co-inp" id="co-int">
              <option value="" disabled selected>Select your goal&hellip;</option>
              <option>Reduce water infrastructure cost exposure</option>
              <option>ESG water data coverage &amp; reporting</option>
              <option>GRESB WT1 / MR3 / RA4 compliance</option>
              <option>Smart monitoring &amp; leak detection</option>
              <option>Cooling tower optimisation</option>
              <option>Utility bill validation &amp; audit</option>
              <option>Section 179 tax strategy &amp; financing</option>
              <option>Full portfolio water programme</option>
              <option>Other</option>
            </select>
          </div>
          <div class="co-fw">
            <label class="co-lbl" for="co-mt">Preferred Meeting Time</label>
            <input type="datetime-local" class="co-inp" id="co-mt">
          </div>
        </div>
        <div class="co-row-1 co-fw">
          <label class="co-lbl" for="co-nt">Additional Notes</label>
          <textarea class="co-inp" id="co-nt" rows="3" placeholder="Tell us about your specific challenges&hellip;" maxlength="1000" style="resize:vertical;padding-top:8px;"></textarea>
        </div>
      </div>
      <div class="co-foot">
        <p class="co-note">We&rsquo;ll follow up within 24 hours to schedule a 30-minute call. Every submission reviewed personally.</p>
        <button class="co-btn" id="co-submit">Submit Request</button>
      </div>
    </div>
    <div class="co-ok" id="co-ok">
      <div class="co-ok-icon">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="#2d5c42" stroke-width="2.2" stroke-linecap="round"><path d="M4 11l5 5 9-9"/></svg>
      </div>
      <h3 class="co-ok-title">Request received.</h3>
      <p class="co-ok-body">A WST advisor will follow up within 24 hours.<br>Every submission is reviewed personally &mdash; no automated sequences.</p>
    </div>
  </div>
</div>

<!-- ═══ SEARCH OVERLAY ═══ -->
<div class="search-overlay" id="search-overlay" role="dialog" aria-label="Site search" aria-modal="true">
  <div class="search-box">
    <div class="search-input-wrap">
      <input type="search" class="search-input" id="search-input"
        placeholder="Search services, resources, industries&hellip;"
        autocomplete="off" spellcheck="false" aria-label="Search"/>
      <button class="search-close" id="search-close" aria-label="Close search">&times;</button>
    </div>
    <div class="search-hint">Press Esc to close &nbsp;&bull;&nbsp; Ctrl+K to open</div>
  </div>
  <div class="search-results" id="search-results" role="listbox"></div>
</div>

<!-- ═══ VIDEO POPUP ═══ -->
<div class="video-overlay" id="video-overlay">
  <div class="video-modal">
    <button class="video-close" id="video-close" aria-label="Close video">&times;</button>
    <div class="video-ratio">
      <iframe id="video-iframe" src="" allowfullscreen allow="autoplay; encrypted-media"
        title="Water Solutions Technology — Overview"></iframe>
    </div>
    <div class="video-caption">Water Solutions Technology &mdash; Portfolio Water Advisory Overview</div>
  </div>
</div>

<!-- ═══ DAILY MODAL ═══ -->
<div class="dm-overlay" id="dm-overlay">
  <div class="dm-box" id="dm-box">
    <div class="dm-head">
      <div class="dm-head-lbl">Daily</div>
      <button class="dm-x" id="dm-x" aria-label="Close">&times;</button>
    </div>
    <div class="dm-block">
      <div class="dm-lbl">Date &amp; Time</div>
      <div class="dm-date" id="dm-date">Loading&hellip;</div>
      <div class="dm-time" id="dm-time"></div>
    </div>
    <div class="dm-block">
      <div class="dm-lbl">Joke of the Day</div>
      <p class="dm-joke" id="dm-joke">Loading&hellip;</p>
    </div>
    <div class="dm-block">
      <div class="dm-lbl">Daily Scripture</div>
      <p class="dm-verse" id="dm-verse">Loading&hellip;</p>
      <div class="dm-ref" id="dm-ref"></div>
    </div>
  </div>
</div>

<!-- ═══ SCROLL TO TOP ═══ -->
<button class="scroll-top" id="scroll-top" aria-label="Back to top" title="Back to top">
  <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
    <path d="M8 12V4M4 7l4-4 4 4"/>
  </svg>
</button>

<!-- ═══ STICKY CTA BAR ═══ -->
<div class="sticky-cta" id="sticky-cta">
  <div class="sticky-cta-text">
    <strong>Ready to see your portfolio&rsquo;s water exposure?</strong>
    &nbsp;A 90-minute assessment with WST &mdash; no obligation.
  </div>
  <div class="sticky-cta-actions">
    <button class="sticky-cta-btn" id="sticky-schedule-btn" onclick="window.openConsult && window.openConsult('assess')">Schedule Assessment</button>
    <button class="sticky-cta-dismiss" id="sticky-dismiss" aria-label="Dismiss">&times;</button>
  </div>
</div>

<script>
/* ═══════════════════════════════════════════════
   WST HOMEPAGE — CONSOLIDATED JS
   All functions at module scope so they're
   accessible from inline HTML where needed.
   No double-wiring. Escape key checks state.
═══════════════════════════════════════════════ */
(function() {

  /* ── Auto year ── */
  var yrEl = document.getElementById('footer-yr');
  if (yrEl) yrEl.textContent = new Date().getFullYear();

  /* ── Services tab ── */
  window.showService = function(id, btn) {
    document.querySelectorAll('.service-panel').forEach(function(p){ p.classList.remove('active'); });
    document.querySelectorAll('.service-list-item').forEach(function(b){ b.classList.remove('active'); });
    var panel = document.getElementById('svc-' + id);
    if (panel) panel.classList.add('active');
    if (btn) btn.classList.add('active');
  };

  /* ── Active nav link ── */
  var curPath = window.location.pathname;
  document.querySelectorAll('.nav-links a').forEach(function(a) {
    if (a.getAttribute('href') === curPath) a.classList.add('active-link');
  });

  /* ── Nav scroll shadow ── */
  var navEl = document.querySelector('nav');
  window.addEventListener('scroll', function() {
    if (navEl) {
      navEl.style.boxShadow = window.scrollY > 20
        ? '0 4px 24px rgba(0,0,0,0.09)'
        : '0 1px 4px rgba(0,0,0,0.04)';
    }
    /* Sticky CTA */
    var sc = document.getElementById('sticky-cta');
    if (sc && !sc._dismissed) {
      sc.classList.toggle('visible', window.scrollY > window.innerHeight * 0.7);
    }
    /* Scroll-to-top */
    var st = document.getElementById('scroll-top');
    if (st) st.classList.toggle('visible', window.scrollY > 400);
  }, { passive: true });

  /* ── Sticky CTA dismiss ── */
  var sdBtn = document.getElementById('sticky-dismiss');
  if (sdBtn) {
    sdBtn.addEventListener('click', function() {
      var sc = document.getElementById('sticky-cta');
      if (sc) { sc.classList.remove('visible'); sc._dismissed = true; }
    });
  }

  /* ── Scroll to top ── */
  var stBtn = document.getElementById('scroll-top');
  if (stBtn) {
    stBtn.addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ══════════════════════════════════════════
     CONSULTATION POPUP
  ══════════════════════════════════════════ */
  var PERSONAL = ['gmail','yahoo','hotmail','outlook','aol','icloud','proton',
                  'live','msn','mail','ymail','googlemail','zoho','gmx',
                  'tutanota','fastmail'];

  function isWorkEmail(email) {
    var p = email.toLowerCase().split('@');
    if (p.length !== 2 || !p[1]) return false;
    var base = p[1].split('.')[0];
    return !PERSONAL.includes(base);
  }

  function coSetState(id, errId, msg) {
    var f = document.getElementById(id);
    var e = document.getElementById(errId);
    if (!f) return !msg;
    if (msg) {
      f.classList.add('err'); f.classList.remove('ok');
      if (e) e.textContent = msg;
    } else {
      f.classList.remove('err'); f.classList.add('ok');
      if (e) e.textContent = '';
    }
    return !msg;
  }

  window.openConsult = function(mode) {
    var overlay = document.getElementById('co');
    if (!overlay) return;
    var title = document.getElementById('co-title');
    if (title) {
      title.textContent = (mode === 'speak')
        ? 'Speak with an Advisor'
        : 'Schedule Your ESG Water Consultation';
    }
    /* Reset form state if re-opening */
    var fw = document.getElementById('co-form-wrap');
    var ok = document.getElementById('co-ok');
    if (fw) fw.style.display = '';
    if (ok) ok.classList.remove('show');
    var sub = document.getElementById('co-submit');
    if (sub) { sub.disabled = false; sub.textContent = 'Submit Request'; }
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    setTimeout(function() {
      var f = document.getElementById('co-fn');
      if (f) f.focus();
    }, 80);
  };

  window.closeConsult = function() {
    var overlay = document.getElementById('co');
    if (overlay) overlay.classList.remove('open');
    document.body.style.overflow = '';
  };

  /* Wire close button */
  var coX = document.getElementById('co-x');
  if (coX) coX.addEventListener('click', window.closeConsult);

  /* Click outside to close */
  var coOverlay = document.getElementById('co');
  if (coOverlay) {
    coOverlay.addEventListener('click', function(e) {
      if (e.target === coOverlay) window.closeConsult();
    });
  }

  /* Wire all CTA triggers — using data attribute to avoid double-wiring */
  function wireConsultTriggers() {
    var triggers = [
      { sel: '#sticky-schedule-btn', mode: 'assess' },
      { sel: '.btn-hero-primary',    mode: 'assess' },
      { sel: '.btn-speak',           mode: 'speak'  },
    ];
    triggers.forEach(function(t) {
      document.querySelectorAll(t.sel).forEach(function(el) {
        if (!el._coWired) {
          el._coWired = true;
          el.addEventListener('click', function(e) {
            e.preventDefault();
            window.openConsult(t.mode);
          });
        }
      });
    });
  }
  wireConsultTriggers();

  /* Wire contact section buttons */
  var ccSpeak  = document.getElementById('cc-speak-btn');
  var ccAssess = document.getElementById('cc-assess-btn');
  if (ccSpeak  && !ccSpeak._coWired)  { ccSpeak._coWired  = true; ccSpeak.addEventListener('click',  function(){ window.openConsult('speak');  }); }
  if (ccAssess && !ccAssess._coWired) { ccAssess._coWired = true; ccAssess.addEventListener('click', function(){ window.openConsult('assess'); }); }

  /* Wire nav CTA */
  var navCta = document.getElementById('nav-cta-btn');
  if (navCta && !navCta._coWired) { navCta._coWired = true; navCta.addEventListener('click', function(e){ e.preventDefault(); window.openConsult('speak'); }); }

  /* Wire hamburger */
  var hamBtn = document.getElementById('ham-btn');
  if (hamBtn && !hamBtn._dmWired) { hamBtn._dmWired = true; hamBtn.addEventListener('click', function(){ if(window.openDailyModal) window.openDailyModal(); }); }

  /* Form submit */
  var coSubmit = document.getElementById('co-submit');
  var coAttempts = 0;
  if (coSubmit) {
    coSubmit.addEventListener('click', function() {
      /* Honeypot check */
      var hp = document.getElementById('co-hp');
      if (hp && hp.value.trim()) return;

      if (coAttempts >= 5) return;
      coAttempts++;

      var ok = true;
      var fn = document.getElementById('co-fn');
      var ln = document.getElementById('co-ln');
      var em = document.getElementById('co-em');
      var co = document.getElementById('co-co');
      var ph = document.getElementById('co-ph');

      if (!fn || !fn.value.trim()) ok = coSetState('co-fn','co-fn-e','First name is required.') && ok;
      else coSetState('co-fn','co-fn-e','');

      if (!ln || !ln.value.trim()) ok = coSetState('co-ln','co-ln-e','Last name is required.') && ok;
      else coSetState('co-ln','co-ln-e','');

      if (!em || !em.value.trim()) {
        ok = coSetState('co-em','co-em-e','Work email is required.') && ok;
      } else if (!/[^@]+@[^.]+\..+/.test(em.value)) {
        ok = coSetState('co-em','co-em-e','Please enter a valid email address.') && ok;
      } else if (!isWorkEmail(em.value)) {
        ok = coSetState('co-em','co-em-e','Please use a work email address.') && ok;
      } else coSetState('co-em','co-em-e','');

      if (!co || !co.value.trim()) ok = coSetState('co-co','co-co-e','Company name is required.') && ok;
      else coSetState('co-co','co-co-e','');

      if (ph && ph.value.trim()) {
        var digits = ph.value.replace(/\D/g,'');
        if (digits.length < 7 || digits.length > 15) {
          ok = coSetState('co-ph','co-ph-e','Please enter a valid phone number.') && ok;
        } else coSetState('co-ph','co-ph-e','');
      }

      /* Strip any HTML/JS injection attempts */
      document.querySelectorAll('#co-form-wrap .co-inp').forEach(function(f) {
        if (f.value && /<[^>]+>|javascript:/i.test(f.value)) f.value = '';
      });

      if (!ok) return;

      coSubmit.disabled = true;
      coSubmit.textContent = 'Sending\u2026';

      /* Production: replace with fetch('/api/consult', { method:'POST', body:... }) */
      setTimeout(function() {
        var fw = document.getElementById('co-form-wrap');
        var okDiv = document.getElementById('co-ok');
        if (fw) fw.style.display = 'none';
        if (okDiv) okDiv.classList.add('show');
      }, 900);
    });
  }

  /* ══════════════════════════════════════════
     SEARCH OVERLAY
  ══════════════════════════════════════════ */
  var SEARCH_INDEX = [
    {title:'Efficiency Audits — Water Bill Validation',path:'/services/efficiency-audits',cat:'Services',kw:'audit bill validation water cost savings overcharge'},
    {title:'Utility Intelligence — Ara AI',path:'/services/utility-intelligence',cat:'Services',kw:'ara ai utility intelligence automated bill collection esg data coverage'},
    {title:'Smart Water Monitoring — IoT',path:'/services/smart-monitoring',cat:'Services',kw:'iot smart monitoring real time sensor leak detection dashboard'},
    {title:'Cooling Tower Optimization',path:'/services/cooling-tower',cat:'Services',kw:'cooling tower coc optimization water savings chemical treatment'},
    {title:'Meter Accuracy Optimization',path:'/services/meter-accuracy',cat:'Services',kw:'meter accuracy flow management billing error correction'},
    {title:'Smart Water Recovery',path:'/services/water-recovery',cat:'Services',kw:'water recovery treatment chemical free scale'},
    {title:'Case Studies — Verified Results',path:'/resources/case-studies',cat:'Resources',kw:'case study diamondrock westin kimpton results proof savings'},
    {title:'White Papers — Advisory Research',path:'/resources/white-papers',cat:'Resources',kw:'white paper research institutional reit esg gresb water'},
    {title:'Webinars On Demand',path:'/resources/webinars',cat:'Resources',kw:'webinar video training water efficiency esg rates'},
    {title:'Water Target Tools & Calculators',path:'/resources/tools',cat:'Resources',kw:'calculator tools water consumption savings roi esg score'},
    {title:'City Water Rebates Database',path:'/resources/city-rebates',cat:'Resources',kw:'rebate city municipal incentive programme funding'},
    {title:'Tax Strategy — Section 179 & OBBBA',path:'/resources/tax-strategy',cat:'Resources',kw:'tax section 179 obbba bonus depreciation financing water equipment'},
    {title:'Articles & Insights',path:'/resources/articles',cat:'Resources',kw:'articles insights blog noi esg water advisory commercial real estate'},
    {title:'Events & Conferences',path:'/resources/events',cat:'Resources',kw:'events conferences gresb nareit uli reit sustainability'},
    {title:'Hospitality — Hotels & Resorts',path:'/industries/hospitality',cat:'Industries',kw:'hospitality hotel resort reit diamond rock westin savings reduction'},
    {title:'Office Buildings — ESG Portfolio',path:'/industries/office',cat:'Industries',kw:'office building commercial real estate esg noi'},
    {title:'Manufacturing & Industrial',path:'/industries/manufacturing',cat:'Industries',kw:'manufacturing industrial process cooling water reuse'},
    {title:'Golf Courses — Irrigation',path:'/industries/golf',cat:'Industries',kw:'golf course irrigation reclaimed water pump smart'},
    {title:'Condominiums & Multifamily',path:'/industries/condominiums',cat:'Industries',kw:'condominium multifamily hoa sub meter billing fair'},
    {title:'All Industries',path:'/industries',cat:'Industries',kw:'industries sectors commercial real estate retail schools senior'},
    {title:'About Water Solutions Technology',path:'/about',cat:'Company',kw:'about wst water solutions technology founded fort lauderdale advisors'},
    {title:'ESG Water Advisory Programme',path:'/gresb',cat:'Company',kw:'gresb esg water advisory wt1 mr3 ra4 institutional solution provider'},
    {title:'Investors',path:'/investors',cat:'Company',kw:'investors investment opportunity sba funding capital water advisory'},
    {title:'Contact — Schedule Assessment',path:'/contact',cat:'Company',kw:'contact schedule assessment audit portfolio water advisor'},
    {title:'Asset Managers & REITs',path:'/opportunities/asset-managers',cat:'Opportunities',kw:'asset manager reit portfolio esg noi water savings institutional'},
    {title:'MEP Servicers & Installers',path:'/opportunities/mep',cat:'Opportunities',kw:'mep mechanical electrical plumbing installer partner revenue'},
    {title:'ESG & Sustainability Teams',path:'/opportunities/esg',cat:'Opportunities',kw:'esg sustainability gresb cdp scope 2 water performance reporting'},
    {title:'Referral Agents',path:'/opportunities/agents',cat:'Opportunities',kw:'agent referral commission real estate broker consultant'},
    {title:'Careers at WST',path:'/opportunities/careers',cat:'Opportunities',kw:'careers jobs water engineer sales sustainability analyst'},
  ];

  function doSearch(q) {
    var res = document.getElementById('search-results');
    if (!res) return;
    if (!q || q.length < 2) { res.innerHTML = ''; return; }
    var words = q.toLowerCase().split(/\s+/).filter(Boolean);
    var scored = SEARCH_INDEX.map(function(item) {
      var hay = (item.title + ' ' + item.kw + ' ' + item.cat).toLowerCase();
      var score = 0;
      words.forEach(function(w) {
        if (hay.indexOf(w) > -1) score += item.title.toLowerCase().indexOf(w) > -1 ? 3 : 1;
      });
      return { item: item, score: score };
    }).filter(function(x){ return x.score > 0; })
      .sort(function(a,b){ return b.score - a.score; })
      .slice(0, 10);

    if (!scored.length) {
      res.innerHTML = '<div class="search-no-results">No results for &ldquo;' +
        q.replace(/[<>&"]/g,'') + '&rdquo; &mdash; try different keywords.</div>';
      return;
    }
    var seen = {};
    var html = '';
    scored.forEach(function(x) {
      var r = x.item;
      if (!seen[r.cat]) {
        seen[r.cat] = true;
        html += '<div class="search-category">' + r.cat + '</div>';
      }
      var hi = r.title;
      words.forEach(function(w) {
        hi = hi.replace(new RegExp('(' + w.replace(/[.*+?^${}()|[\]\\]/g,'\\$&') + ')', 'gi'), '<em>$1</em>');
      });
      html += '<a class="search-result" href="' + r.path + '">' +
        '<div class="sr-title">' + hi + '</div>' +
        '<div class="sr-path">' + r.path + '</div></a>';
    });
    res.innerHTML = html;
  }

  window.openSearch = function() {
    var o = document.getElementById('search-overlay');
    var inp = document.getElementById('search-input');
    if (!o) return;
    o.classList.add('open');
    document.body.style.overflow = 'hidden';
    if (inp) setTimeout(function(){ inp.focus(); }, 50);
  };

  window.closeSearch = function() {
    var o = document.getElementById('search-overlay');
    var inp = document.getElementById('search-input');
    var res = document.getElementById('search-results');
    if (o) o.classList.remove('open');
    document.body.style.overflow = '';
    if (inp) inp.value = '';
    if (res) res.innerHTML = '';
  };

  var srchBtn = document.getElementById('nav-search-btn');
  if (!srchBtn) srchBtn = document.querySelector('.nav-icon-btn[aria-label="Search"]');
  if (srchBtn && !srchBtn._srchWired) {
    srchBtn._srchWired = true;
    srchBtn.addEventListener('click', window.openSearch);
  }

  var srchClose = document.getElementById('search-close');
  if (srchClose) srchClose.addEventListener('click', window.closeSearch);

  var srchOverlay = document.getElementById('search-overlay');
  if (srchOverlay) {
    srchOverlay.addEventListener('click', function(e) {
      if (e.target === srchOverlay) window.closeSearch();
    });
  }

  var srchInput = document.getElementById('search-input');
  if (srchInput) {
    srchInput.addEventListener('input', function() { doSearch(this.value.trim()); });
  }

  /* ══════════════════════════════════════════
     VIDEO POPUP
  ══════════════════════════════════════════ */
  /* Replace this URL with your actual YouTube embed URL */
  var VIDEO_URL = 'https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=1&rel=0';

  window.openVideo = function() {
    var o = document.getElementById('video-overlay');
    var iframe = document.getElementById('video-iframe');
    if (!o || !iframe) return;
    iframe.src = VIDEO_URL;
    o.classList.add('open');
    document.body.style.overflow = 'hidden';
  };

  window.closeVideo = function() {
    var o = document.getElementById('video-overlay');
    var iframe = document.getElementById('video-iframe');
    if (o) o.classList.remove('open');
    if (iframe) iframe.src = '';
    document.body.style.overflow = '';
  };

  document.querySelectorAll('.hero-strip-item').forEach(function(link) {
    if (link.textContent.indexOf('Take a Glance') > -1 ||
        link.textContent.indexOf('Overview Video') > -1) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        window.openVideo();
      });
    }
  });

  var vcBtn = document.getElementById('video-close');
  if (vcBtn) vcBtn.addEventListener('click', window.closeVideo);

  var vo = document.getElementById('video-overlay');
  if (vo) {
    vo.addEventListener('click', function(e) {
      if (e.target === vo) window.closeVideo();
    });
  }

  /* ══════════════════════════════════════════
     DAILY MODAL (hamburger)
  ══════════════════════════════════════════ */
  var SCRIPTURES = [
    {t:'\u201cFor I know the plans I have for you, declares the Lord, plans to prosper you and not to harm you, plans to give you hope and a future.\u201d', r:'Jeremiah 29:11'},
    {t:'\u201cTrust in the Lord with all your heart and lean not on your own understanding; in all your ways submit to him, and he will make your paths straight.\u201d', r:'Proverbs 3:5\u20136'},
    {t:'\u201cI can do all this through him who gives me strength.\u201d', r:'Philippians 4:13'},
    {t:'\u201cThe Lord is my shepherd, I lack nothing.\u201d', r:'Psalm 23:1'},
    {t:'\u201cBe strong and courageous. Do not be afraid; do not be discouraged, for the Lord your God will be with you wherever you go.\u201d', r:'Joshua 1:9'},
    {t:'\u201cAnd we know that in all things God works for the good of those who love him, who have been called according to his purpose.\u201d', r:'Romans 8:28'},
    {t:'\u201cGive thanks to the Lord, for he is good; his love endures forever.\u201d', r:'Psalm 107:1'},
    {t:'\u201cBut seek first his kingdom and his righteousness, and all these things will be given to you as well.\u201d', r:'Matthew 6:33'},
    {t:'\u201cCast all your anxiety on him because he cares for you.\u201d', r:'1 Peter 5:7'},
    {t:'\u201cThe Lord bless you and keep you; the Lord make his face shine on you and be gracious to you.\u201d', r:'Numbers 6:24\u201325'},
  ];
  var JOKES = [
    'Why do water auditors make great comedians? They always find the best leaks in the performance.',
    'Why did the building manager install smart meters? He wanted to finally get his flow together.',
    'What did the cooling tower say to the water bill? Stop making such a big splash.',
    'My water efficiency report came back excellent. Turns out the only thing overflowing was the savings.',
    'Why do ESG consultants love water projects? Because the ROI really flows.',
    'What is a water auditor\'s favourite movie? Gone with the Flow.',
    'I told my CFO water savings add directly to NOI. He said that\'s the first time a utility bill made him smile.',
    'Why are smart water meters so popular? They finally give buildings a chance to come clean.',
  ];

  function dailyIdx(len) {
    var d = new Date();
    return (d.getFullYear() * 365 + d.getMonth() * 31 + d.getDate()) % len;
  }

  var _dmTick = null;

  window.openDailyModal = function() {
    var o = document.getElementById('dm-overlay');
    if (!o) return;

    var now = new Date();
    var dateEl = document.getElementById('dm-date');
    var timeEl = document.getElementById('dm-time');
    if (dateEl) dateEl.textContent = now.toLocaleDateString('en-US', {weekday:'long',year:'numeric',month:'long',day:'numeric'});
    if (timeEl) timeEl.textContent = now.toLocaleTimeString('en-US', {hour:'2-digit',minute:'2-digit',second:'2-digit',hour12:true});

    var sc = SCRIPTURES[dailyIdx(SCRIPTURES.length)];
    var verseEl = document.getElementById('dm-verse');
    var refEl   = document.getElementById('dm-ref');
    if (verseEl) verseEl.textContent = sc.t;
    if (refEl)   refEl.textContent   = '\u2014 ' + sc.r;

    var jokeEl = document.getElementById('dm-joke');
    if (jokeEl) jokeEl.textContent = JOKES[dailyIdx(JOKES.length)];

    o.classList.add('open');
    document.body.style.overflow = 'hidden';

    clearInterval(_dmTick);
    _dmTick = setInterval(function() {
      if (timeEl) {
        timeEl.textContent = new Date().toLocaleTimeString('en-US', {hour:'2-digit',minute:'2-digit',second:'2-digit',hour12:true});
      }
    }, 1000);
  };

  window.closeDailyModal = function() {
    var o = document.getElementById('dm-overlay');
    if (o) o.classList.remove('open');
    document.body.style.overflow = '';
    clearInterval(_dmTick);
  };

  var dmX = document.getElementById('dm-x');
  if (dmX) dmX.addEventListener('click', function(){ if(window.closeDailyModal) window.closeDailyModal(); });

  var dmOverlay = document.getElementById('dm-overlay');
  if (dmOverlay) {
    dmOverlay.addEventListener('click', function(e) {
      if (e.target === dmOverlay) window.closeDailyModal();
    });
  }

  /* ══════════════════════════════════════════
     SINGLE ESCAPE KEY HANDLER
     Checks which overlay is open in priority order
  ══════════════════════════════════════════ */
  document.addEventListener('keydown', function(e) {
    if (e.key !== 'Escape') return;
    var co = document.getElementById('co');
    var so = document.getElementById('search-overlay');
    var vo = document.getElementById('video-overlay');
    var dm = document.getElementById('dm-overlay');
    if (co && co.classList.contains('open'))         { window.closeConsult();    return; }
    if (so && so.classList.contains('open'))         { window.closeSearch();     return; }
    if (vo && vo.classList.contains('open'))         { window.closeVideo();      return; }
    if (dm && dm.classList.contains('open'))         { window.closeDailyModal(); return; }
  });

  /* Ctrl+K → search */
  document.addEventListener('keydown', function(e) {
    if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
      e.preventDefault();
      window.openSearch();
    }
  });

})();
</script>
</body>


</html>