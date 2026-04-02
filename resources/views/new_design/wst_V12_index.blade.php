<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Water Solutions Technology — Portfolio Water Advisory</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --black:      #0d0d0d;
      --dark:       #111111;
      --dark-2:     #1a1a1a;
      --off-white:  #f4f3f0;
      --white:      #ffffff;
      --gray-1:     #888580;
      --gray-2:     #3a3a3a;
      --gray-3:     #cccac6;
      --border-d:   rgba(255,255,255,0.08);
      --border-l:   rgba(0,0,0,0.09);
      --green:      #1a3a2a;
      --green-lt:   #2d5c42;
      --blue-link:  #3b6fd4;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      background: var(--off-white);
      color: var(--black);
      font-family: 'DM Sans', sans-serif;
      -webkit-font-smoothing: antialiased;
      overflow-x: hidden;
      padding-bottom: 56px;
    }

    /* ─── NAV ─── */
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
    .hero {
      background: var(--black);
      min-height: calc(100vh - 104px);
      display: grid;
      grid-template-rows: 1fr auto;
      position: relative; overflow: hidden;
    }
    .hero::before {
      content: '';
      position: absolute; inset: 0;
      background: radial-gradient(ellipse 60% 50% at 70% 40%, rgba(30,58,42,0.45) 0%, transparent 65%);
      pointer-events: none;
    }

    .hero-main {
      display: grid; grid-template-columns: 1fr 1fr;
      align-items: center; padding: 80px 48px 60px;
      position: relative; z-index: 2;
    }
    .hero-left { padding-right: 48px; }

    .hero-eyebrow {
      display: inline-flex; align-items: center; gap: 10px;
      font-size: 10px; font-weight: 600; letter-spacing: 0.18em;
      text-transform: uppercase; color: var(--green-lt);
      margin-bottom: 28px;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 24px; height: 1px;
      background: var(--green-lt);
    }

    h1.hero-h1 {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(48px, 5.5vw, 76px);
      font-weight: 300; line-height: 1.04;
      letter-spacing: -0.01em; color: var(--white);
      margin-bottom: 28px;
    }
    h1.hero-h1 em { font-style: italic; }

    .hero-body {
      font-size: 15px; line-height: 1.75;
      color: rgba(255,255,255,0.55);
      max-width: 500px; margin-bottom: 16px;
    }
    .hero-body strong { color: rgba(255,255,255,0.8); font-weight: 500; }

    .hero-tagline {
      font-size: 12px; font-weight: 600; letter-spacing: 0.06em;
      color: rgba(255,255,255,0.3); margin-bottom: 44px;
      font-style: italic;
    }

    .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 52px; }
    .btn-hero-primary {
      font-size: 11px; font-weight: 600; letter-spacing: 0.12em;
      text-transform: uppercase; color: var(--black); background: var(--white);
      padding: 15px 28px; text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-primary:hover { background: var(--off-white); }
    .btn-hero-ghost {
      font-size: 11px; font-weight: 600; letter-spacing: 0.12em;
      text-transform: uppercase; color: var(--white);
      border: 1px solid rgba(255,255,255,0.25); padding: 15px 28px;
      text-decoration: none; transition: all 0.2s; display: inline-block;
    }
    .btn-hero-ghost:hover { border-color: var(--white); background: rgba(255,255,255,0.06); }

    .hero-trust {
      display: flex; gap: 28px; align-items: center;
      padding-top: 36px; border-top: 1px solid rgba(255,255,255,0.08);
    }
    .trust-item { }
    .trust-val {
      font-family: 'Cormorant Garamond', serif;
      font-size: 30px; font-weight: 300; color: var(--white);
      line-height: 1; margin-bottom: 4px;
    }
    .trust-lbl {
      font-size: 9px; font-weight: 600; letter-spacing: 0.12em;
      text-transform: uppercase; color: rgba(255,255,255,0.3);
    }
    .trust-sep { width: 1px; height: 32px; background: rgba(255,255,255,0.08); }

    /* Hero right — stats panel */
    .hero-right {
      display: flex; flex-direction: column; gap: 0;
      border-left: 1px solid rgba(255,255,255,0.06);
      padding-left: 48px;
    }
    .hero-stat-grid {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 1px; background: rgba(255,255,255,0.05);
      margin-bottom: 28px;
    }
    .hero-stat {
      background: rgba(255,255,255,0.02); padding: 28px 24px;
    }
    .hero-stat-val {
      font-family: 'Cormorant Garamond', serif;
      font-size: 42px; font-weight: 300; color: var(--white);
      line-height: 1; margin-bottom: 6px;
    }
    .hero-stat-lbl {
      font-size: 10px; font-weight: 600; letter-spacing: 0.10em;
      text-transform: uppercase; color: rgba(255,255,255,0.3);
    }
    .hero-proof {
      border-top: 1px solid rgba(255,255,255,0.06);
      padding-top: 20px;
    }
    .hero-proof-tag {
      font-size: 9px; font-weight: 600; letter-spacing: 0.14em;
      text-transform: uppercase; color: var(--green-lt); margin-bottom: 8px;
    }
    .hero-proof-q {
      font-family: 'Cormorant Garamond', serif;
      font-size: 16px; font-weight: 300; font-style: italic;
      color: rgba(255,255,255,0.5); line-height: 1.6;
    }

    /* Hero bottom strip — 3 CTAs */
    .hero-strip {
      display: grid; grid-template-columns: 1fr 1fr 1fr;
      border-top: 1px solid rgba(255,255,255,0.07);
      position: relative; z-index: 2;
    }
    .hero-strip-item {
      padding: 24px 48px;
      border-right: 1px solid rgba(255,255,255,0.07);
      text-decoration: none; display: flex; align-items: center;
      justify-content: space-between; gap: 16px;
      transition: background 0.2s;
    }
    .hero-strip-item:last-child { border-right: none; }
    .hero-strip-item:hover { background: rgba(255,255,255,0.03); }
    .hero-strip-label {
      font-size: 13px; font-weight: 500; color: rgba(255,255,255,0.65);
    }
    .hero-strip-arrow {
      font-size: 16px; color: rgba(255,255,255,0.2);
      transition: color 0.2s; flex-shrink: 0;
    }
    .hero-strip-item:hover .hero-strip-arrow { color: rgba(255,255,255,0.6); }

    /* ─── SHARED ─── */
    section { padding: 96px 48px; }
    .section-eyebrow {
      font-size: 10px; font-weight: 700; letter-spacing: 0.16em;
      text-transform: uppercase; color: var(--green-lt); margin-bottom: 16px;
    }
    .section-h2 {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(32px, 3.5vw, 48px);
      font-weight: 300; line-height: 1.12;
    }
    .section-h2 em { font-style: italic; }
    .section-sub {
      font-size: 14px; line-height: 1.8; color: var(--gray-1);
      max-width: 520px; margin-top: 14px;
    }

    /* ─── TRENDING INSIGHTS ─── */
    .insights-section { background: var(--off-white); }
    .insights-grid {
      display: grid; grid-template-columns: 280px 1fr 1fr 1fr;
      gap: 20px; align-items: start; margin-top: 48px;
    }
    .insights-intro { padding-top: 8px; }
    .insights-intro-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 28px; font-weight: 400; line-height: 1.2;
      margin-bottom: 12px;
    }
    .insights-intro-body {
      font-size: 13px; line-height: 1.8; color: var(--gray-1);
    }
    .insight-card {
      background: var(--black); padding: 32px 28px;
      display: flex; flex-direction: column; min-height: 240px;
      text-decoration: none;
      transition: background 0.2s;
    }
    .insight-card:hover { background: #1a1a1a; }
    .insight-tag {
      font-size: 9px; font-weight: 700; letter-spacing: 0.14em;
      text-transform: uppercase; color: var(--green-lt); margin-bottom: 16px;
    }
    .insight-title {
      font-size: 15px; font-weight: 600; color: var(--white);
      line-height: 1.4; margin-bottom: 10px; flex: 1;
    }
    .insight-desc {
      font-size: 12px; color: rgba(255,255,255,0.4);
      line-height: 1.65; margin-bottom: 24px;
    }
    .insight-btn {
      display: inline-block; padding: 10px 16px;
      border: 1px solid rgba(255,255,255,0.2);
      font-size: 10px; font-weight: 700; letter-spacing: 0.10em;
      text-transform: uppercase; color: var(--white);
      text-decoration: none; text-align: center;
      transition: all 0.2s; align-self: flex-start;
    }
    .insight-btn:hover { border-color: var(--white); background: rgba(255,255,255,0.06); }
    .insights-footer {
      text-align: right; margin-top: 20px;
    }
    .insights-more {
      font-size: 13px; font-weight: 600; color: var(--blue-link);
      text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
    }
    .insights-more:hover { text-decoration: underline; }

    /* ─── BEFORE / AFTER (PROPERTY VALUE) ─── */
    .value-section {
      background: var(--dark);
      color: var(--white);
    }
    .value-header {
      text-align: center; margin-bottom: 64px;
    }
    .value-header .section-h2 { color: var(--white); }
    .value-header .section-sub { color: rgba(255,255,255,0.4); margin: 14px auto 0; }

    .ba-layout {
      display: grid; grid-template-columns: 1fr auto 1fr;
      gap: 0; align-items: stretch; margin-bottom: 40px;
    }
    .ba-col {
      padding: 40px 36px;
      border: 1px solid rgba(255,255,255,0.06);
    }
    .ba-col.before { background: rgba(255,255,255,0.02); }
    .ba-col.after { background: rgba(45,92,66,0.12); border-color: rgba(45,92,66,0.3); }
    .ba-label {
      font-size: 9px; font-weight: 700; letter-spacing: 0.18em;
      text-transform: uppercase; color: rgba(255,255,255,0.25);
      margin-bottom: 24px;
    }
    .ba-col.after .ba-label { color: var(--green-lt); }
    .ba-row {
      display: flex; align-items: flex-start; gap: 10px;
      font-size: 13px; line-height: 1.55; color: rgba(255,255,255,0.55);
      margin-bottom: 10px;
    }
    .ba-row::before { content: '—'; color: rgba(255,255,255,0.2); flex-shrink: 0; margin-top: 1px; }
    .ba-col.after .ba-row::before { content: '✓'; color: var(--green-lt); }
    .ba-col.after .ba-row { color: rgba(255,255,255,0.75); }
    .ba-consumption {
      margin-top: 24px; padding: 16px 20px;
      background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06);
    }
    .ba-col.after .ba-consumption { background: rgba(45,92,66,0.2); border-color: rgba(45,92,66,0.4); }
    .ba-consumption-label {
      font-size: 10px; font-weight: 600; letter-spacing: 0.10em;
      text-transform: uppercase; color: rgba(255,255,255,0.3); margin-bottom: 6px;
    }
    .ba-consumption-value {
      font-family: 'Cormorant Garamond', serif;
      font-size: 28px; font-weight: 300; color: var(--white); line-height: 1;
    }
    .ba-consumption-unit {
      font-size: 12px; color: rgba(255,255,255,0.3); margin-top: 2px;
    }

    .ba-center {
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      padding: 0 24px; gap: 20px;
    }
    .ba-meter-label {
      font-size: 10px; font-weight: 700; letter-spacing: 0.12em;
      text-transform: uppercase; color: rgba(255,255,255,0.2);
      writing-mode: vertical-rl; text-orientation: mixed;
    }
    .ba-meter-icon {
      width: 48px; height: 72px;
      border: 2px solid rgba(255,255,255,0.12);
      display: flex; flex-direction: column;
      align-items: center; justify-content: center; gap: 4px;
    }
    .ba-meter-dot {
      width: 6px; height: 6px; border-radius: 50%;
      background: rgba(255,255,255,0.15);
    }
    .ba-meter-dot.active { background: var(--green-lt); }
    .ba-arrow {
      font-size: 20px; color: rgba(255,255,255,0.15);
    }

    .ba-process {
      text-align: center; padding-top: 32px;
      border-top: 1px solid rgba(255,255,255,0.06);
    }
    .ba-process-label {
      font-size: 9px; font-weight: 700; letter-spacing: 0.18em;
      text-transform: uppercase; color: rgba(255,255,255,0.2);
      margin-bottom: 16px;
    }
    .ba-process-steps {
      display: flex; align-items: center; justify-content: center;
      gap: 12px;
    }
    .ba-step {
      font-size: 12px; font-weight: 600; letter-spacing: 0.06em;
      color: rgba(255,255,255,0.5);
    }
    .ba-step-arrow { color: rgba(255,255,255,0.2); font-size: 14px; }

    /* ─── WHO WE SERVE (industries) ─── */
    .industries-section { background: var(--off-white); }
    .industries-header {
      display: grid; grid-template-columns: 260px 1fr;
      gap: 48px; align-items: start; margin-bottom: 40px;
    }
    .industries-scroll {
      display: flex; gap: 16px; overflow-x: auto;
      padding-bottom: 8px;
    }
    .industry-card {
      flex-shrink: 0; width: 200px;
      text-decoration: none; color: inherit;
    }
    .industry-img {
      width: 100%; height: 160px; object-fit: cover;
      display: block; margin-bottom: 10px;
      position: relative; overflow: hidden;
    }
    .industry-img img {
      width: 100%; height: 100%; object-fit: cover;
      display: block; filter: grayscale(20%);
      transition: filter 0.3s, transform 0.4s;
    }
    .industry-card:hover .industry-img img {
      filter: grayscale(0%); transform: scale(1.04);
    }
    .industry-name {
      font-size: 13px; font-weight: 600; color: var(--black);
    }
    .industries-more {
      text-align: right; margin-top: 16px;
    }
    .industries-more a {
      font-size: 13px; font-weight: 600; color: var(--blue-link);
      text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
    }
    .industries-more a:hover { text-decoration: underline; }

    /* ─── SERVICES (advisory list) ─── */
    .services-section { background: var(--white); border-top: 1px solid var(--border-l); }
    .services-layout {
      display: grid; grid-template-columns: 320px 1fr;
      gap: 0; border: 1px solid var(--border-l); margin-top: 48px;
    }
    .services-list {
      border-right: 1px solid var(--border-l);
    }
    .service-list-item {
      display: block; padding: 20px 28px;
      font-size: 14px; font-weight: 500; color: var(--gray-1);
      text-decoration: none;
      border-bottom: 1px solid var(--border-l);
      transition: all 0.15s; cursor: pointer;
      background: none; border-left: 3px solid transparent;
      width: 100%; text-align: left;
    }
    .service-list-item:last-child { border-bottom: none; }
    .service-list-item:hover { color: var(--black); background: var(--off-white); }
    .service-list-item.active {
      color: var(--black); font-weight: 600;
      background: var(--off-white);
      border-left-color: var(--black);
    }
    .service-panel {
      padding: 48px; display: none;
    }
    .service-panel.active { display: block; }
    .service-panel-tag {
      font-size: 9px; font-weight: 700; letter-spacing: 0.16em;
      text-transform: uppercase; color: var(--green-lt); margin-bottom: 16px;
    }
    .service-panel-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 34px; font-weight: 300; line-height: 1.2;
      margin-bottom: 16px;
    }
    .service-panel-title em { font-style: italic; }
    .service-panel-body {
      font-size: 14px; line-height: 1.8; color: var(--gray-1);
      margin-bottom: 28px;
    }
    .service-panel-link {
      font-size: 12px; font-weight: 600; letter-spacing: 0.08em;
      text-transform: uppercase; color: var(--blue-link);
      text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
    }
    .service-panel-link:hover { text-decoration: underline; }
    .service-panel-features {
      margin-top: 28px; display: flex; flex-direction: column; gap: 10px;
    }
    .service-panel-feat {
      font-size: 13px; color: var(--black); display: flex; gap: 12px; align-items: flex-start;
    }
    .service-panel-feat::before {
      content: '→'; color: var(--green-lt); font-size: 12px; flex-shrink: 0; margin-top: 2px;
    }

    /* ─── PROOF SECTION (replaces Capabilities) ─── */
    .proof-section {
      background: var(--dark-2); color: var(--white);
    }
    .proof-inner {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 0; align-items: stretch;
    }
    .proof-left {
      padding: 80px 64px 80px 0;
      border-right: 1px solid rgba(255,255,255,0.07);
      display: flex; flex-direction: column; justify-content: center;
    }
    .proof-left-tag {
      font-size: 9px; font-weight: 700; letter-spacing: 0.18em;
      text-transform: uppercase; color: var(--green-lt); margin-bottom: 28px;
      display: flex; align-items: center; gap: 12px;
    }
    .proof-left-tag::before {
      content: ''; display: block; width: 24px; height: 1px; background: var(--green-lt);
    }
    .proof-quote {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(28px, 3vw, 42px);
      font-weight: 300; line-height: 1.25; color: var(--white);
      margin-bottom: 28px;
    }
    .proof-quote em { font-style: italic; }
    .proof-attribution {
      font-size: 12px; color: rgba(255,255,255,0.35); line-height: 1.6;
      border-left: 2px solid var(--green-lt); padding-left: 16px;
    }
    .proof-right {
      padding: 80px 0 80px 64px;
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 1px; background: rgba(255,255,255,0.05);
      align-content: start;
    }
    .proof-metric {
      background: var(--dark-2); padding: 36px 28px;
      display: flex; flex-direction: column; justify-content: flex-end;
    }
    .proof-metric-val {
      font-family: 'Cormorant Garamond', serif;
      font-size: 52px; font-weight: 300; color: var(--white);
      line-height: 1; margin-bottom: 8px;
    }
    .proof-metric-lbl {
      font-size: 10px; font-weight: 600; letter-spacing: 0.10em;
      text-transform: uppercase; color: rgba(255,255,255,0.28);
    }
    .proof-metric-client {
      grid-column: 1/-1; background: rgba(255,255,255,0.03);
      padding: 18px 28px; font-size: 11px; letter-spacing: 0.07em;
      text-transform: uppercase; color: rgba(255,255,255,0.22);
      border-top: 1px solid rgba(255,255,255,0.06);
    }
    .proof-who {
      grid-column: 1/-1;
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 1px; background: rgba(255,255,255,0.05);
      margin-top: 1px;
    }
    .proof-who-item {
      background: var(--dark-2); padding: 24px 28px;
    }
    .proof-who-title {
      font-size: 11px; font-weight: 700; letter-spacing: 0.08em;
      text-transform: uppercase; color: var(--white); margin-bottom: 6px;
    }
    .proof-who-body {
      font-size: 12px; line-height: 1.7; color: rgba(255,255,255,0.35);
    }

    /* ─── CLIENT LOGOS ─── */
    .logos-section { background: #f9f8f6; padding: 64px 48px; border-top: 1px solid var(--border-l); }
    .logos-label {
      font-size: 10px; font-weight: 700; letter-spacing: 0.16em;
      text-transform: uppercase; color: var(--gray-1);
      text-align: center; margin-bottom: 40px;
    }
    .logos-grid {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      gap: 0; border: 1px solid var(--border-l);
    }
    .logo-cell {
      border-right: 1px solid var(--border-l);
      border-bottom: 1px solid var(--border-l);
      padding: 20px 16px;
      display: flex; align-items: center; justify-content: center;
      min-height: 72px; background: #fff;
      transition: background 0.2s;
    }
    .logo-cell:hover { background: var(--off-white); }

    /* ─── PORTFOLIO VISIBILITY MAP SECTION ─── */
    .pvm-section {
      background: var(--black);
      border-top: 1px solid rgba(255,255,255,0.06);
      padding: 0;
    }
    .pvm-wrap {
      display: flex;
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .pvm-map-col {
      flex: 1; min-width: 0; position: relative;
    }
    #pvm-svg { display: block; width: 100%; height: auto; }
    .pvm-dash-col {
      width: 220px; flex-shrink: 0;
      padding: 28px 20px;
      display: flex; flex-direction: column;
      background: rgba(255,255,255,0.02);
      border-left: 1px solid rgba(255,255,255,0.06);
    }
    .pvm-dl {
      font-size: 9px; font-weight: 700; letter-spacing: 0.18em;
      text-transform: uppercase; color: rgba(255,255,255,0.2);
      margin-bottom: 12px;
    }
    .pvm-dm { margin-bottom: 16px; }
    .pvm-dv {
      font-size: 26px; font-weight: 300; line-height: 1;
      letter-spacing: -0.02em; color: var(--white);
    }
    .pvm-dv-green { color: var(--green-lt); }
    .pvm-ds { font-size: 10px; color: rgba(255,255,255,0.25); margin-top: 3px; }
    .pvm-bar-bg {
      height: 2px; background: rgba(255,255,255,0.06);
      border-radius: 1px; margin: 5px 0 3px; overflow: hidden;
    }
    .pvm-bar-fill {
      height: 100%; background: var(--green-lt); border-radius: 1px;
      width: 0; transition: width 1.6s cubic-bezier(0.16,1,0.3,1);
    }
    .pvm-esg { font-size: 9px; color: rgba(255,255,255,0.18); }
    .pvm-insights { margin-top: auto; }
    .pvm-ins {
      padding: 7px 8px; margin-bottom: 4px;
      display: flex; align-items: flex-start; gap: 6px;
      border: 1px solid rgba(255,255,255,0.06);
      background: rgba(255,255,255,0.02);
    }
    .pvm-dot { width: 5px; height: 5px; border-radius: 50%; flex-shrink: 0; margin-top: 3px; }
    .pvm-ins-t { font-size: 10px; color: rgba(255,255,255,0.38); line-height: 1.45; }
    .pvm-ins-t strong { color: rgba(255,255,255,0.8); }
    .pvm-foot {
      display: flex; justify-content: space-between; align-items: flex-end;
      padding: 14px 24px 18px;
      background: rgba(255,255,255,0.02);
    }
    .pvm-hl {
      font-family: 'Cormorant Garamond', serif;
      font-size: 20px; font-weight: 300; color: var(--white);
      letter-spacing: -0.01em;
    }
    .pvm-hl em { font-style: italic; color: var(--green-lt); }
    .pvm-aum-wrap { text-align: right; }
    .pvm-aum {
      font-size: 9px; font-weight: 700; letter-spacing: 0.16em;
      text-transform: uppercase; color: rgba(255,255,255,0.25);
      transition: color 0.12s;
    }
    .pvm-aum.aum-lit { color: #4caf7a; }
    .pvm-aum-sub { font-size: 9px; color: rgba(255,255,255,0.15); margin-top: 2px; }
    .pvm-tt {
      position: absolute; pointer-events: none; opacity: 0;
      transition: opacity 0.12s; z-index: 20;
      min-width: 136px; padding: 8px 12px;
      background: rgba(8,8,8,0.97);
      border: 1px solid rgba(255,255,255,0.10);
      box-shadow: 0 4px 20px rgba(0,0,0,0.55);
    }
    .pvm-tt-name  { font-size: 12px; font-weight: 600; color: #fff; margin-bottom: 2px; }
    .pvm-tt-type  { font-size: 9px; text-transform: uppercase; letter-spacing: 0.10em; color: rgba(255,255,255,0.3); margin-bottom: 3px; }
    .pvm-tt-saved { font-size: 13px; font-weight: 300; color: #4caf7a; }
    @media (max-width: 1100px) {
      .pvm-wrap { flex-direction: column; }
      .pvm-dash-col { width: 100%; border-left: none; border-top: 1px solid rgba(255,255,255,0.06); flex-direction: row; flex-wrap: wrap; gap: 16px; padding: 16px; }
      .pvm-dm { flex: 1; min-width: 100px; margin-bottom: 0; }
      .pvm-insights { width: 100%; }
      .pvm-foot { flex-direction: column; align-items: flex-start; gap: 8px; }
      .pvm-aum-wrap { text-align: left; }
    }

    .logo-sector {
      display:block; font-size:9px; color:var(--gray-1);
      text-transform:uppercase; letter-spacing:0.08em; margin-top:2px;
    }
    .logo-cell { flex-direction:column; }

    .logo-cell:nth-child(6n) { border-right: none; }
    .logo-cell:nth-last-child(-n+6) { border-bottom: none; }
    .logo-cell img {
      max-height: 32px; max-width: 110px;
      width: auto; object-fit: contain;
      filter: grayscale(100%) opacity(0.55);
      transition: filter 0.2s;
    }
    .logo-cell:hover img { filter: grayscale(60%) opacity(0.85); }
    .logo-name {
      font-size: 11px; font-weight: 700; letter-spacing: 0.04em;
      color: #aaa; text-align: center; text-transform: uppercase;
      line-height: 1.3;
    }

    /* ─── CONTACT FORM ─── */
    .contact-section {
      background: var(--dark);
      border-top: none;
    }
    .contact-layout {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 80px; align-items: start;
    }
    .contact-left { padding-top: 8px; }
    .contact-h {
      font-family: 'Cormorant Garamond', serif;
      font-size: 38px; font-weight: 300; line-height: 1.15;
      margin-bottom: 16px; text-transform: uppercase;
      letter-spacing: 0.02em; color: var(--white);
    }
    .contact-sub {
      font-size: 14px; line-height: 1.8;
      color: rgba(255,255,255,0.4); margin-bottom: 32px;
    }
    .btn-speak {
      display: inline-block; padding: 14px 28px;
      border: 1px solid rgba(255,255,255,0.3);
      font-size: 11px; font-weight: 700; letter-spacing: 0.10em;
      text-transform: uppercase; color: var(--white);
      text-decoration: none; transition: all 0.2s;
    }
    .btn-speak:hover { background: var(--white); color: var(--black); }

    .contact-form { display: flex; flex-direction: column; gap: 12px; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .form-field {
      padding: 14px 16px; border: 1px solid var(--border-l);
      background: var(--white); font-family: 'DM Sans', sans-serif;
      font-size: 13px; color: var(--black); outline: none;
      transition: border-color 0.2s; width: 100%;
    }
    .form-field:focus { border-color: var(--black); }
    .form-field::placeholder { color: var(--gray-1); }
    select.form-field { cursor: pointer; }
    textarea.form-field { resize: vertical; min-height: 100px; }
    .form-submit {
      padding: 15px; background: var(--black); color: var(--white);
      border: none; font-family: 'DM Sans', sans-serif;
      font-size: 12px; font-weight: 700; letter-spacing: 0.10em;
      text-transform: uppercase; cursor: pointer; transition: background 0.2s;
    }
    .form-submit:hover { background: var(--green); }

    /* ─── FOOTER ─── */
    footer { background: var(--black); }
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


    /* ─── SCROLL TO TOP ─── */
    .scroll-top {
      position: fixed; bottom: 72px; right: 24px; z-index: 140;
      width: 44px; height: 44px;
      background: var(--black); border: 1px solid rgba(255,255,255,0.15);
      color: var(--white); cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      opacity: 0; pointer-events: none;
      transition: opacity 0.3s, background 0.2s, transform 0.2s;
      box-shadow: 0 4px 16px rgba(0,0,0,0.25);
    }
    .scroll-top.visible { opacity: 1; pointer-events: auto; }
    .scroll-top:hover { background: var(--green-lt); transform: translateY(-2px); }
    .scroll-top svg { width: 16px; height: 16px; }
    @media (max-width: 480px) {
      .scroll-top { bottom: 76px; right: 14px; width: 40px; height: 40px; }
    }


    /* ─── SEARCH OVERLAY ─── */
    .search-overlay {
      position:fixed; inset:0; z-index:600;
      background:rgba(0,0,0,0.85); backdrop-filter:blur(8px);
      display:flex; flex-direction:column; align-items:center;
      padding-top:120px;
      opacity:0; pointer-events:none;
      transition:opacity 0.22s;
    }
    .search-overlay.open { opacity:1; pointer-events:auto; }
    .search-box {
      width:100%; max-width:640px; padding:0 24px;
    }
    .search-input-wrap {
      position:relative; display:flex; align-items:center;
    }
    .search-input {
      width:100%; padding:18px 56px 18px 20px;
      font-family:'DM Sans',sans-serif; font-size:18px;
      background:var(--white); border:none; outline:none;
      color:var(--black);
    }
    .search-input::placeholder { color:var(--gray-1); }
    .search-close {
      position:absolute; right:16px;
      background:none; border:none; cursor:pointer;
      color:var(--gray-1); font-size:22px; line-height:1; padding:4px;
      transition:color 0.15s;
    }
    .search-close:hover { color:var(--black); }
    .search-hint {
      font-size:11px; color:rgba(255,255,255,0.3);
      margin-top:10px; padding:0 4px;
      letter-spacing:0.06em; text-transform:uppercase;
    }
    .search-results {
      width:100%; max-width:640px; margin-top:20px; padding:0 24px;
      max-height:50vh; overflow-y:auto;
    }
    .search-result {
      background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.08);
      padding:14px 18px; margin-bottom:8px; cursor:pointer;
      text-decoration:none; display:block;
      transition:background 0.15s;
    }
    .search-result:hover { background:rgba(255,255,255,0.11); }
    .sr-title { font-size:14px; font-weight:600; color:var(--white); margin-bottom:3px; }
    .sr-path  { font-size:11px; color:rgba(255,255,255,0.35); text-transform:uppercase; letter-spacing:0.06em; }
    .sr-match { font-size:12px; color:rgba(255,255,255,0.45); margin-top:4px; line-height:1.5; }
    .sr-match em { color:var(--green-lt); font-style:normal; font-weight:600; }
    .search-no-results { color:rgba(255,255,255,0.4); font-size:14px; padding:16px 4px; }
    .search-category {
      font-size:9px; font-weight:700; letter-spacing:0.18em; text-transform:uppercase;
      color:rgba(255,255,255,0.2); padding:8px 4px 4px; margin-top:8px;
    }

    /* ─── VIDEO POPUP ─── */
    .video-overlay {
      position:fixed; inset:0; z-index:700;
      background:rgba(0,0,0,0.92); backdrop-filter:blur(6px);
      display:flex; align-items:center; justify-content:center;
      padding:24px;
      opacity:0; pointer-events:none; transition:opacity 0.22s;
    }
    .video-overlay.open { opacity:1; pointer-events:auto; }
    .video-modal {
      width:100%; max-width:900px; position:relative;
      transform:scale(0.96); transition:transform 0.22s;
    }
    .video-overlay.open .video-modal { transform:scale(1); }
    .video-close {
      position:absolute; top:-42px; right:0;
      background:none; border:none; cursor:pointer;
      color:rgba(255,255,255,0.5); font-size:28px; line-height:1;
      transition:color 0.15s; padding:4px;
    }
    .video-close:hover { color:#fff; }
    .video-ratio {
      position:relative; padding-bottom:56.25%; height:0; overflow:hidden;
      background:#000;
    }
    .video-ratio iframe {
      position:absolute; top:0; left:0; width:100%; height:100%;
      border:none;
    }
    .video-caption {
      text-align:center; margin-top:14px;
      font-size:11px; color:rgba(255,255,255,0.3);
      letter-spacing:0.08em; text-transform:uppercase;
    }

        .logo-sector {
      display:block; font-size:9px; color:var(--gray-1);
      text-transform:uppercase; letter-spacing:0.08em; margin-top:2px;
    }
    .logo-cell { flex-direction:column; }

    /* ─── FORM VALIDATION STATES ─── */
    .form-field.field-error { border-color: #c0392b !important; }
    .form-field.field-ok { border-color: var(--green-lt); }
    .field-err-msg {
      font-size: 11px; color: #c0392b;
      margin-top: 3px; display: none;
    }
    .field-err-msg.visible { display: block; }
    .form-success {
      padding: 24px; background: rgba(45,92,66,0.12);
      border: 1px solid var(--green-lt);
      font-size: 14px; color: var(--white); line-height: 1.6;
      display: none;
    }
    .form-success.visible { display: block; }
    .form-submit.submitting { opacity: 0.6; pointer-events: none; }

    /* ─── RESPONSIVE PATCHES ─── */
    @media (max-width: 768px) {
      h1.hero-h1 { font-size: 38px; }
      .hero-actions { flex-direction: column; }
      .btn-hero-primary, .btn-hero-ghost { text-align: center; }
      .proof-inner { grid-template-columns: 1fr; }
      .proof-left { padding: 40px 0; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); }
      .proof-right { padding: 40px 0; }
      .contact-layout { grid-template-columns: 1fr; gap: 40px; }
      .form-row { grid-template-columns: 1fr; }
      .hero-trust { flex-wrap: wrap; gap: 16px; }
      .trust-sep { display: none; }
      .logos-grid { grid-template-columns: repeat(2,1fr); }
      .footer-main { grid-template-columns: 1fr; }
      .pvmap-inner { flex-direction: column; }
      .pvmap-dash { width: 100%; border-left: none; border-top: 1px solid rgba(255,255,255,0.06); }
      .pvmap-foot { flex-direction: column; align-items: flex-start; gap: 8px; }
      .pvmap-aum-wrap { text-align: left; }
      .mandate-strip { flex-direction: column; align-items: flex-start; gap: 16px; padding: 20px 24px; }
      .mandate-label::after { display: none; }
      .mandate-items { flex-wrap: wrap; gap: 12px; }
      .mandate-item { border-right: none; padding: 0; }
    }
    @media (max-width: 480px) {
      section { padding: 48px 16px; }
      nav, .top-bar { padding-left: 16px; padding-right: 16px; }
      .footer-main, .footer-bottom { padding-left: 16px; padding-right: 16px; }
      .sticky-cta { padding: 12px 16px; flex-direction: column; gap: 10px; text-align: center; }
    }


    /* ═══ CONSULTATION POPUP ═══ */
    .co { position:fixed;inset:0;z-index:900;background:rgba(0,0,0,0.65);
          backdrop-filter:blur(6px);display:flex;align-items:center;
          justify-content:center;padding:12px;
          opacity:0;pointer-events:none;transition:opacity .25s; }
    .co.open { opacity:1;pointer-events:auto; }
    .co-box { background:#fff;width:100%;max-width:660px;max-height:96vh;
              overflow-y:auto;transform:translateY(18px);
              transition:transform .25s;
              box-shadow:0 32px 80px rgba(0,0,0,.4); }
    .co.open .co-box { transform:translateY(0); }
    .co-head { padding:32px 36px 0;display:flex;
               justify-content:space-between;align-items:flex-start; }
    .co-title { font-family:'Cormorant Garamond',serif;
                font-size:30px;font-weight:300;color:var(--black);
                line-height:1.1;margin-bottom:8px; }
    .co-sub { font-size:13px;color:var(--gray-1);line-height:1.7;
              max-width:490px; }
    .co-x { background:none;border:none;cursor:pointer;color:var(--gray-1);
             font-size:28px;line-height:1;padding:0 0 0 16px;flex-shrink:0;
             transition:color .15s; }
    .co-x:hover { color:var(--black); }
    .co-strips { display:flex;margin:18px 36px 0;
                 border:1px solid var(--border-l); }
    .co-strip { flex:1;padding:10px 12px;border-right:1px solid var(--border-l); }
    .co-strip:last-child { border-right:none; }
    .co-strip-lbl { font-size:9px;font-weight:700;letter-spacing:.14em;
                    text-transform:uppercase;color:var(--green-lt);
                    margin-bottom:3px; }
    .co-strip-val { font-size:12px;font-weight:600;color:var(--black);
                    line-height:1.4; }
    .co-body { padding:18px 36px 28px; }
    .co-row { display:grid;grid-template-columns:1fr 1fr;gap:14px;
              margin-bottom:14px; }
    .co-row-1 { margin-bottom:14px; }
    .co-fw { display:flex;flex-direction:column; }
    .co-lbl { font-size:9px;font-weight:700;letter-spacing:.14em;
              text-transform:uppercase;color:rgba(0,0,0,.42);
              margin-bottom:5px; }
    .co-req { color:var(--green-lt); }
    .co-inp { padding:11px 0;border:none;
              border-bottom:1.5px solid rgba(0,0,0,.12);
              background:transparent;font-family:'DM Sans',sans-serif;
              font-size:14px;color:var(--black);outline:none;
              transition:border-color .2s;width:100%; }
    .co-inp:focus { border-bottom-color:var(--black); }
    .co-inp::placeholder { color:var(--gray-1); }
    .co-inp.err { border-bottom-color:#c0392b; }
    .co-inp.ok  { border-bottom-color:var(--green-lt); }
    .co-errmsg { font-size:11px;color:#c0392b;margin-top:3px;
                 min-height:16px;display:block; }
    .co-foot { display:flex;align-items:center;justify-content:space-between;
               padding:16px 36px 24px;border-top:1px solid var(--border-l);
               gap:12px; }
    .co-note { font-size:11px;color:var(--gray-1);font-style:italic;
               line-height:1.5; }
    .co-btn { padding:13px 30px;background:var(--black);color:#fff;
              border:none;font-family:'DM Sans',sans-serif;
              font-size:12px;font-weight:700;letter-spacing:.10em;
              text-transform:uppercase;cursor:pointer;
              transition:background .2s;flex-shrink:0;border-radius:3px; }
    .co-btn:hover { background:var(--green-lt); }
    .co-btn:disabled { opacity:.55;pointer-events:none; }
    .co-ok { padding:36px;text-align:center;display:none; }
    .co-ok.show { display:block; }
    .co-ok-icon { width:52px;height:52px;border-radius:50%;
                  background:rgba(45,92,66,.1);
                  display:flex;align-items:center;justify-content:center;
                  margin:0 auto 16px; }
    .co-ok-title { font-family:'Cormorant Garamond',serif;
                   font-size:28px;font-weight:300;color:var(--black);
                   margin-bottom:10px; }
    .co-ok-body { font-size:14px;color:var(--gray-1);line-height:1.75; }
    @media(max-width:620px){
      .co-row{grid-template-columns:1fr;}
      .co-head,.co-body,.co-foot{padding-left:18px;padding-right:18px;}
      .co-strips{margin:14px 18px 0;flex-wrap:wrap;}
      .co-strip{border-right:none;border-bottom:1px solid var(--border-l);}
      .co-strip:last-child{border-bottom:none;}
    }

    /* ═══ HAMBURGER + DAILY MODAL ═══ */
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

  </style> 

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

<!-- ─── HERO ─── -->
<div class="hero">
  <div class="hero-main">
    <div class="hero-left">
      <div class="hero-eyebrow">Portfolio Water Advisory</div>
      <h1 class="hero-h1">
        Total Water Visibility.<br>
        <em>Measurable Property</em><br>
        Value.
      </h1>
      <p class="hero-body">
        We are a <strong>commercial real estate water advisory firm.</strong> We work with real estate portfolios to reduce infrastructure cost exposure — identifying billing errors, eliminating water waste, and converting every improvement into <strong>verified NOI gains and ESG performance data.</strong>
      </p>
      <p class="hero-body" style="margin-top:12px">
        For the first time, portfolios of any size have access to AI-driven utility intelligence, real-time monitoring, and institutional-grade ESG reporting — without millions in capital outlay.
      </p>
      <p class="hero-tagline">Simplifying the Business of Water</p>
      <div class="hero-actions">
        <a href="/contact" class="btn-hero-primary">Schedule Portfolio Assessment</a>
        <a href="/services" class="btn-hero-ghost">Our Services</a>
      </div>
      <div class="hero-trust">
        <div class="trust-item">
          <div class="trust-val">$2.3M</div>
          <div class="trust-lbl">Verified savings</div>
        </div>
        <div class="trust-sep"></div>
        <div class="trust-item">
          <div class="trust-val">500+</div>
          <div class="trust-lbl">Properties served</div>
        </div>
        <div class="trust-sep"></div>
        <div class="trust-item">
          <div class="trust-val">25.3%</div>
          <div class="trust-lbl">Avg. reduction</div>
        </div>
        <div class="trust-sep"></div>
        <div class="trust-item">
          <div class="trust-val">GRESB</div>
          <div class="trust-lbl">Partner</div>
        </div>
      </div>
    </div>

    <div class="hero-right">
      <div class="hero-stat-grid">
        <div class="hero-stat">
          <div class="hero-stat-val">31</div>
          <div class="hero-stat-lbl">Assets — DiamondRock</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-val">100%</div>
          <div class="hero-stat-lbl">GRESB data coverage</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-val">$2.3M</div>
          <div class="hero-stat-lbl">Verified savings</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-val">90 days</div>
          <div class="hero-stat-lbl">To full visibility</div>
        </div>
      </div>
      <div class="hero-proof">
        <div class="hero-proof-tag">Verified — The Westin Fort Lauderdale · DiamondRock Hospitality</div>
        <div class="hero-proof-q">"25.3% water reduction. $2.3M documented savings. 31 assets. Reported to GRESB."</div>
      </div>
    </div>
  </div>

  <!-- 3 CTA strips (updated per your notes) -->
  <div class="hero-strip">
    <a href="/resources/tools" class="hero-strip-item">
      <span class="hero-strip-label">Water Consumption Calculator + Tools</span>
      <span class="hero-strip-arrow">→</span>
    </a>
    <a href="/resources/tools" class="hero-strip-item">
      <span class="hero-strip-label">My ESG | GRESB Peer Comparison</span>
      <span class="hero-strip-arrow">→</span>
    </a>
    <a href="/resources/webinars" class="hero-strip-item">
      <span class="hero-strip-label">Take a Glance — Overview Video</span>
      <span class="hero-strip-arrow">▷</span>
    </a>
  </div>
</div>

<!-- ─── TRENDING INSIGHTS ─── -->
<section class="insights-section">
  <div class="insights-grid">
    <div class="insights-intro">
      <div class="section-eyebrow">Trending Insights</div>
      <div class="insights-intro-title">For Your Portfolio</div>
      <p class="insights-intro-body">The latest on water costs, utility overcharging, and sustainability compliance — critical intelligence for your portfolio.</p>
    </div>
    <a href="/resources/webinars" class="insight-card">
      <div class="insight-tag">Webinar On Demand</div>
      <div class="insight-title">Water Provider Overcharging: Are You Being Overcharged?</div>
      <div class="insight-desc">Find out if your property is losing money due to utility overcharges — and how to recover it.</div>
      <span class="insight-btn">Watch Now</span>
    </a>
    <a href="/resources/webinars" class="insight-card">
      <div class="insight-tag">Webinar On Demand</div>
      <div class="insight-title"><span class="current-year"></span> Water &amp; Sewerage Price Increases</div>
      <div class="insight-desc">Prepare your portfolio strategy before new rate increases hit your operating budget.</div>
      <span class="insight-btn">Watch Now</span>
    </a>
    <a href="/resources/webinars" class="insight-card">
      <div class="insight-tag">Platform Deep Dive</div>
      <div class="insight-title">How Ara AI Assistant is Changing Property Water Management</div>
      <div class="insight-desc">Discover how AI brings transparency, efficiency, and verified savings to your operation.</div>
      <span class="insight-btn">Watch Now</span>
    </a>
  </div>
  <div class="insights-footer">
    <a href="/resources/webinars" class="insights-more">View More Insights →</a>
  </div>
</section>

<!-- ─── PROPERTY VALUE (Before/After) ─── -->
<section class="value-section">
  <div class="value-header">
    <div class="section-eyebrow">Primary Control Asset</div>
    <h2 class="section-h2" style="color:#fff">We Focus on Your Property's<br>Value <em>and</em> Efficiency</h2>
    <p class="section-sub">Evident Reduction. Evident Savings. Enhanced Property Value.</p>
  </div>

  <div class="ba-layout">
    <div class="ba-col before">
      <div class="ba-label">Before</div>
      <div class="ba-row">Portfolio Annual Water Cost: $250,000 per property</div>
      <div class="ba-row">20% Water Data Coverage costing $1,300/day</div>
      <div class="ba-row">Higher Cooling Tower Operating Cost</div>
      <div class="ba-row">Undefined ESG Goals</div>
      <div class="ba-row">Investor Funding Barriers</div>
      <div class="ba-consumption">
        <div class="ba-consumption-label">Annual Consumption</div>
        <div class="ba-consumption-value">10,200,000</div>
        <div class="ba-consumption-unit">gallons per year</div>
      </div>
    </div>

    <div class="ba-center">
      <div class="ba-meter-label">Water Meter</div>
      <div class="ba-meter-icon">
        <div class="ba-meter-dot"></div>
        <div class="ba-meter-dot active"></div>
        <div class="ba-meter-dot"></div>
        <div class="ba-meter-dot active"></div>
      </div>
      <div class="ba-arrow">→</div>
    </div>

    <div class="ba-col after">
      <div class="ba-label">After WST</div>
      <div class="ba-row">30% Cost Reduction → $175,000 per property</div>
      <div class="ba-row">100% Water Data Coverage — GRESB compliant</div>
      <div class="ba-row">20% Cooling Tower Cost Reduction</div>
      <div class="ba-row">Established ESG Framework</div>
      <div class="ba-row">Institutional Funding Ready</div>
      <div class="ba-consumption" style="background:rgba(45,92,66,0.25);border-color:rgba(45,92,66,0.5)">
        <div class="ba-consumption-label" style="color:rgba(255,255,255,0.5)">Annual Consumption</div>
        <div class="ba-consumption-value">7,200,000</div>
        <div class="ba-consumption-unit" style="color:rgba(255,255,255,0.4)">gallons per year</div>
      </div>
    </div>
  </div><!-- /ba-layout -->


  <div class="ba-process">
    <div class="ba-process-label">Primary Control Asset — WST Methodology</div>
    <div class="ba-process-steps">
      <span class="ba-step">Audit</span>
      <span class="ba-step-arrow">→</span>
      <span class="ba-step">Engineer</span>
      <span class="ba-step-arrow">→</span>
      <span class="ba-step">Verify</span>
      <span class="ba-step-arrow">→</span>
      <span class="ba-step">Report</span>
    </div>
  </div>
</section>


<!-- ─── PORTFOLIO WATER VISIBILITY MAP ─── -->
<section class="pvm-section">
  <div class="pvm-wrap">

    <div class="pvm-map-col" id="pvm-map-col">
      <svg id="pvm-svg" viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg">
        <rect width="700" height="420" fill="#0d0d0d"/>
        <g id="pvm-states"></g>
        <g id="pvm-lines"></g>
        <g id="pvm-dots"></g>
      </svg>
      <div class="pvm-tt" id="pvm-tt">
        <div class="pvm-tt-name"  id="pvm-tt-n"></div>
        <div class="pvm-tt-type"  id="pvm-tt-t"></div>
        <div class="pvm-tt-saved" id="pvm-tt-s"></div>
      </div>
    </div>

    <div class="pvm-dash-col">
      <div class="pvm-dl">Your Portfolio</div>
      <div class="pvm-dm">
        <div class="pvm-dv pvm-dv-green" id="pvm-sav">$0</div>
        <div class="pvm-ds">Verified savings delivered</div>
      </div>
      <div class="pvm-dm">
        <div style="display:flex;justify-content:space-between;align-items:baseline;">
          <div class="pvm-dv" id="pvm-cov">0%</div>
          <div class="pvm-esg">ESG</div>
        </div>
        <div class="pvm-bar-bg"><div class="pvm-bar-fill" id="pvm-bar"></div></div>
        <div class="pvm-ds">Portfolio data coverage</div>
      </div>
      <div class="pvm-dm">
        <div class="pvm-dv" id="pvm-cnt">0</div>
        <div class="pvm-ds">Properties monitored</div>
      </div>
      <div class="pvm-insights">
        <div class="pvm-dl">Insights</div>
        <div class="pvm-ins">
          <div class="pvm-dot" style="background:#e8a020;"></div>
          <div class="pvm-ins-t"><strong>More to save.</strong> 6 assets below efficiency benchmark.</div>
        </div>
        <div class="pvm-ins">
          <div class="pvm-dot" style="background:var(--green-lt);"></div>
          <div class="pvm-ins-t"><strong>Proven at scale.</strong> 25.3% avg reduction — hospitality.</div>
        </div>
        <div class="pvm-ins">
          <div class="pvm-dot" style="background:rgba(255,255,255,0.18);"></div>
          <div class="pvm-ins-t"><strong>ESG ready.</strong> Submission window opens Apr 2026.</div>
        </div>
      </div>
    </div>

  </div>

  <div class="pvm-foot">
    <div><h2 class="pvm-hl"><em>Portfolio Water Visibility</em></h2></div>
    <div class="pvm-aum-wrap">
      <div class="pvm-aum" id="pvm-aum">My Assets Under Management</div>
      <div class="pvm-aum-sub">32 properties &bull; 14 states</div>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.2/topojson.min.js"></script>
<script>
(function(){
  var PROPS = [
    {n:'Miami',            t:'Hospitality',    s:'$184K saved',    lat:25.77,  lng:-80.19},
    {n:'Fort Lauderdale',  t:'Hospitality',    s:'$2.3M+ verified',lat:26.12,  lng:-80.14},
    {n:'Fort Myers',       t:'Senior Living',  s:'$67K saved',     lat:26.64,  lng:-81.87},
    {n:'Tampa',            t:'Condominium',    s:'$89K saved',     lat:27.95,  lng:-82.46},
    {n:'Orlando',          t:'Hospitality',    s:'$112K saved',    lat:28.54,  lng:-81.38},
    {n:'Atlanta',          t:'Office',         s:'$98K saved',     lat:33.75,  lng:-84.39},
    {n:'Columbia SC',      t:'Hospitality',    s:'$54K saved',     lat:33.99,  lng:-81.04},
    {n:'New Orleans',      t:'Hospitality',    s:'$76K saved',     lat:29.95,  lng:-90.07},
    {n:'Biloxi MS',        t:'Hospitality',    s:'$51K saved',     lat:30.39,  lng:-88.89},
    {n:'Mobile AL',        t:'Manufacturing',  s:'$43K saved',     lat:30.69,  lng:-88.04},
    {n:'Houston',          t:'Manufacturing',  s:'$143K saved',    lat:29.76,  lng:-95.37},
    {n:'Dallas',           t:'Office',         s:'$88K saved',     lat:32.78,  lng:-96.80},
    {n:'Chicago',          t:'Office',         s:'$156K saved',    lat:41.88,  lng:-87.63},
    {n:'Chicago South Loop',t:'Retail',        s:'$72K saved',     lat:41.73,  lng:-87.68},
    {n:'Cincinnati',       t:'Supermarket',    s:'$44K saved',     lat:39.10,  lng:-84.51},
    {n:'Milwaukee',        t:'Manufacturing',  s:'$61K saved',     lat:43.04,  lng:-87.91},
    {n:'New York',         t:'Office',         s:'$198K saved',    lat:40.71,  lng:-74.01},
    {n:'Newark NJ',        t:'Hospitality',    s:'$83K saved',     lat:40.74,  lng:-74.17},
    {n:'Boston',           t:'Hospitality',    s:'$127K saved',    lat:42.36,  lng:-71.06},
    {n:'Providence RI',    t:'Office',         s:'$56K saved',     lat:41.82,  lng:-71.41},
    {n:'Portland ME',      t:'Senior Living',  s:'$38K saved',     lat:43.66,  lng:-70.26},
    {n:'Washington DC',    t:'Office',         s:'$92K saved',     lat:38.91,  lng:-77.04},
    {n:'Denver',           t:'Golf Course',    s:'$71K saved',     lat:39.74,  lng:-104.98},
    {n:'Aurora CO',        t:'Supermarket',    s:'$48K saved',     lat:39.73,  lng:-104.83},
    {n:'Las Vegas',        t:'Hospitality',    s:'$134K saved',    lat:36.17,  lng:-115.14},
    {n:'Phoenix',          t:'Senior Living',  s:'$59K saved',     lat:33.45,  lng:-112.07},
    {n:'Los Angeles',      t:'Hospitality',    s:'$167K saved',    lat:34.05,  lng:-118.24},
    {n:'San Diego',        t:'Marina & Club',  s:'$43K saved',     lat:32.72,  lng:-117.16},
    {n:'San Francisco',    t:'Office',         s:'$121K saved',    lat:37.77,  lng:-122.42},
    {n:'Sacramento',       t:'Supermarket',    s:'$48K saved',     lat:38.58,  lng:-121.49},
    {n:'Portland OR',      t:'Restaurant',     s:'$37K saved',     lat:45.52,  lng:-122.68},
    {n:'Boise',            t:'Manufacturing',  s:'$52K saved',     lat:43.62,  lng:-116.21}
  ];

  var aumTimer = null;
  function flashAUM() {
    var el = document.getElementById('pvm-aum');
    if (!el) return;
    el.classList.add('aum-lit');
    clearTimeout(aumTimer);
    aumTimer = setTimeout(function(){ el.classList.remove('aum-lit'); }, 380);
  }

  function pvmAnimNum(id, pre, suf, target, dec, dur) {
    var el = document.getElementById(id);
    if (!el) return;
    var s = null;
    (function loop(ts) {
      if (!s) s = ts;
      var p = Math.min((ts - s) / dur, 1);
      var e = 1 - Math.pow(1 - p, 3);
      el.textContent = pre + (dec ? (e * target).toFixed(1) : Math.round(e * target)) + suf;
      if (p < 1) requestAnimationFrame(loop);
    })(performance.now());
  }

  function pvmAnimPct() {
    document.getElementById('pvm-bar').style.width = '97%';
    var el = document.getElementById('pvm-cov');
    if (!el) return;
    var s = null;
    (function loop(ts) {
      if (!s) s = ts;
      var p = Math.min((ts - s) / 1400, 1);
      var e = 1 - Math.pow(1 - p, 3);
      el.textContent = Math.round(e * 97) + '%';
      if (p < 1) requestAnimationFrame(loop);
    })(performance.now());
  }

  d3.json('https://cdn.jsdelivr.net/npm/us-atlas@3/states-10m.json').then(function(us) {
    var proj = d3.geoAlbersUsa().scale(800).translate([348, 208]);
    var path = d3.geoPath(proj);
    var svg  = d3.select('#pvm-svg');

    /* State fills */
    svg.select('#pvm-states')
      .selectAll('path')
      .data(topojson.feature(us, us.objects.states).features)
      .join('path')
      .attr('d', path)
      .attr('fill', 'rgba(255,255,255,0.04)')
      .attr('stroke', 'rgba(255,255,255,0.09)')
      .attr('stroke-width', 0.5);

    /* State mesh inner borders */
    svg.select('#pvm-states').append('path')
      .datum(topojson.mesh(us, us.objects.states, function(a,b){ return a !== b; }))
      .attr('d', path)
      .attr('fill', 'none')
      .attr('stroke', 'rgba(255,255,255,0.05)')
      .attr('stroke-width', 0.3);

    var linesG = svg.select('#pvm-lines');
    var dotsG  = svg.select('#pvm-dots');

    /* Staggered reveal */
    PROPS.forEach(function(p, i) {
      var xy = proj([p.lng, p.lat]);
      if (!xy) return;
      var px = xy[0], py = xy[1];

      /* Dot group */
      var g = dotsG.append('g')
        .attr('id', 'pvmd' + i)
        .attr('opacity', 0)
        .style('cursor', 'pointer');

      /* Outer pulse ring */
      g.append('circle')
        .attr('class', 'pvmr0_' + i)
        .attr('cx', px).attr('cy', py).attr('r', 4)
        .attr('fill', 'rgba(76,175,122,0.2)')
        .attr('opacity', 0);

      /* Inner pulse ring */
      g.append('circle')
        .attr('class', 'pvmr1_' + i)
        .attr('cx', px).attr('cy', py).attr('r', 4)
        .attr('fill', 'rgba(76,175,122,0.1)')
        .attr('opacity', 0);

      /* Core dot — no white ring */
      g.append('circle')
        .attr('cx', px).attr('cy', py).attr('r', 3.6)
        .attr('fill', '#4caf7a');

      /* Invisible hover target */
      g.append('circle')
        .attr('cx', px).attr('cy', py).attr('r', 13)
        .attr('fill', 'transparent')
        .on('mouseenter', function() {
          var svgR  = document.getElementById('pvm-svg').getBoundingClientRect();
          var colR  = document.getElementById('pvm-map-col').getBoundingClientRect();
          var scaleX = svgR.width  / 700;
          var scaleY = svgR.height / 420;
          var tx = px * scaleX + (svgR.left - colR.left) + 10;
          var ty = py * scaleY + (svgR.top  - colR.top)  - 68;
          if (tx + 150 > colR.width) tx -= 162;
          if (ty < 4) ty += 74;
          var tt = document.getElementById('pvm-tt');
          document.getElementById('pvm-tt-n').textContent = p.n;
          document.getElementById('pvm-tt-t').textContent = p.t;
          document.getElementById('pvm-tt-s').textContent = p.s;
          tt.style.left = tx + 'px';
          tt.style.top  = ty + 'px';
          tt.style.opacity = 1;
        })
        .on('mouseleave', function() {
          document.getElementById('pvm-tt').style.opacity = 0;
        });

      /* Staggered fade-in */
      d3.select('#pvmd' + i)
        .transition()
        .duration(300)
        .delay(400 + i * 80)
        .attr('opacity', 1);
    });

    /* Start counters + pulses after reveal finishes */
    var revealEnd = 400 + PROPS.length * 80 + 400;

    setTimeout(function() {
      pvmAnimNum('pvm-sav', '$', 'M+', 2.3, true,  1000);
      pvmAnimNum('pvm-cnt', '',  '',   32,  false,  900);
      pvmAnimPct();
    }, revealEnd);

    setTimeout(function() {
      PROPS.forEach(function(p, i) {
        var xy = proj([p.lng, p.lat]);
        if (!xy) return;

        var speed  = 1700 + Math.random() * 1000;
        var offset = i * 200 + Math.random() * 300;

        /* Outer slow ring — triggers AUM flash on completion */
        function pulse0() {
          d3.select('#pvmd' + i).select('.pvmr0_' + i)
            .attr('r', 4).attr('opacity', 1)
            .transition()
            .duration(speed)
            .ease(d3.easeCubicOut)
            .attr('r', 22).attr('opacity', 0)
            .on('end', function() { flashAUM(); pulse0(); });
        }

        /* Inner fast ring */
        function pulse1() {
          d3.select('#pvmd' + i).select('.pvmr1_' + i)
            .attr('r', 4).attr('opacity', 0.75)
            .transition()
            .duration(speed * 0.6)
            .ease(d3.easeCubicOut)
            .attr('r', 13).attr('opacity', 0)
            .on('end', pulse1);
        }

        setTimeout(pulse0, offset);
        setTimeout(pulse1, offset + 320);
      });

    }, revealEnd);

  }).catch(function(err) {
    console.warn('WST map: topology load failed —', err.message);
    /* Graceful fallback: show text list */
    var col = document.getElementById('pvm-map-col');
    if (col) col.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;min-height:320px;padding:48px;text-align:center;"><div><div style="font-size:9px;font-weight:700;letter-spacing:0.18em;text-transform:uppercase;color:#2d5c42;margin-bottom:16px;">Portfolio Water Visibility</div><div style="font-family:Cormorant Garamond,serif;font-size:32px;font-weight:300;color:#fff;margin-bottom:12px;">32 properties.<br><em>14 states.</em></div><p style="font-size:13px;color:rgba(255,255,255,0.38);line-height:1.75;">Fort Lauderdale &bull; New York &bull; Chicago &bull; Los Angeles &bull; Houston &bull; Boston &bull; Atlanta &bull; Denver &bull; Las Vegas &bull; Washington DC &bull; + 22 more</p></div></div>';
  });

})();
</script>


<!-- ─── WHO WE SERVE (Industries) ─── -->
<section class="industries-section">
  <div class="industries-header">
    <div>
      <h2 class="section-h2">Who We<br>Provide<br>Guidance To</h2>
      <p class="section-sub">Trusted by forward-thinking owners and operators of hotels, multifamily properties, manufacturers, and commercial real estate portfolios.</p>
    </div>
    <div>
      <div class="industries-scroll">
        <a href="/industries/hospitality" class="industry-card">
          <div class="industry-img"><img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80&fit=crop" alt="Hotel Owners" loading="lazy"/></div>
          <div class="industry-name">Hotel Owners</div>
        </a>
        <a href="/industries/condominiums" class="industry-card">
          <div class="industry-img"><img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=400&q=80&fit=crop" alt="Multifamily Operators" loading="lazy"/></div>
          <div class="industry-name">Multifamily Operators</div>
        </a>
        <a href="/industries/manufacturing" class="industry-card">
          <div class="industry-img"><img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=400&q=80&fit=crop" alt="Manufacturers" loading="lazy"/></div>
          <div class="industry-name">Manufacturers</div>
        </a>
        <a href="/industries/office" class="industry-card">
          <div class="industry-img"><img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=400&q=80&fit=crop" alt="Commercial Real Estate" loading="lazy"/></div>
          <div class="industry-name">Commercial Real Estate</div>
        </a>
        <a href="/opportunities/esg" class="industry-card">
          <div class="industry-img"><img src="https://images.unsplash.com/photo-1471922694854-ff1b63b20054?w=400&q=80&fit=crop" alt="Sustainability Teams" loading="lazy"/></div>
          <div class="industry-name">Sustainability Teams</div>
        </a>
      </div>
      <div class="industries-more">
        <a href="/industries">View Similar Operators →</a>
      </div>
    </div>
  </div>
</section>

<!-- ─── SERVICES (advisory list) ─── -->
<section class="services-section">
  <div class="section-eyebrow">Advisory Services</div>
  <h2 class="section-h2">Services that Transform Water Challenges<br><em>into Opportunities</em></h2>

  <div class="services-layout">
    <div class="services-list">
      <button class="service-list-item active" onclick="showService('audits',this)">Strategic Water Audits</button>
      <button class="service-list-item" onclick="showService('portfolio',this)">Portfolio Optimization</button>
      <button class="service-list-item" onclick="showService('gresb',this)">GRESB &amp; ESG Compliance</button>
      <button class="service-list-item" onclick="showService('analytics',this)">Benchmarking &amp; Analytics</button>
      <button class="service-list-item" onclick="showService('capital',this)">Capital Planning</button>
      <button class="service-list-item" onclick="showService('tech',this)">Technology Implementation</button>
    </div>
    <div style="position:relative;">
      <div class="service-panel active" id="svc-audits">
        <div class="service-panel-tag">Water Audits</div>
        <h3 class="service-panel-title">Identify hidden inefficiencies and drive <em>measurable ROI</em> with a portfolio-wide review.</h3>
        <p class="service-panel-body">A comprehensive water audit establishes asset-level baselines, identifies billing errors, unmetered losses, and mechanical inefficiencies — and delivers a prioritized roadmap with quantified ROI and payback periods. Detailed reporting structured for asset owners and investment committees.</p>
        <a href="/services/efficiency-audits" class="service-panel-link">More about our approach →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">Bill validation and on-site physical audit</div>
          <div class="service-panel-feat">Mechanical system assessment: cooling towers, irrigation, boilers</div>
          <div class="service-panel-feat">Billing error identification and recovery documentation</div>
          <div class="service-panel-feat">Prioritized efficiency roadmap with NOI impact projections</div>
        </div>
      </div>
      <div class="service-panel" id="svc-portfolio">
        <div class="service-panel-tag">Portfolio Optimization</div>
        <h3 class="service-panel-title">Portfolio-wide water visibility — from <em>asset level to investment committee.</em></h3>
        <p class="service-panel-body">Ara AI automates utility bill collection across every asset, closing data coverage gaps while IoT monitoring validates consumption in real time. The combined model produces the verified, audit-grade data that institutional portfolios require — without adding headcount.</p>
        <a href="/services/utility-intelligence" class="service-panel-link">Explore Ara AI platform →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">Ara AI automated bill collection — 95%+ portfolio coverage</div>
          <div class="service-panel-feat">Real-time IoT monitoring with anomaly alerts and cost quantification</div>
          <div class="service-panel-feat">Asset-level dashboards at monitor.watersolutech.com</div>
          <div class="service-panel-feat">Quarterly portfolio performance reporting to asset management</div>
        </div>
      </div>
      <div class="service-panel" id="svc-gresb">
        <div class="service-panel-tag">GRESB &amp; ESG Compliance</div>
        <h3 class="service-panel-title">GRESB is peer-relative. <em>Your competitors are already moving.</em></h3>
        <p class="service-panel-body">Star ratings are assigned by quintile position — not against absolute standards. WST manages both the WT1 coverage gap (Ara AI) and the performance gap (verified monitoring data) that determine where your fund ranks. We prepare your GRESB water submission from end to end.</p>
        <a href="/gresb" class="service-panel-link">Explore GRESB advisory →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">WT1 data coverage closure — highest-weight water indicator</div>
          <div class="service-panel-feat">GRESB portal–ready data package across all water indicators</div>
          <div class="service-panel-feat">Peer quintile analysis and competitive positioning</div>
          <div class="service-panel-feat">Annual submission support and IC documentation</div>
        </div>
      </div>
      <div class="service-panel" id="svc-analytics">
        <div class="service-panel-tag">Benchmarking &amp; Analytics</div>
        <h3 class="service-panel-title">Water intensity benchmarked against <em>the right peer group.</em></h3>
        <p class="service-panel-body">Consumption normalized by asset class, gross floor area, and occupancy type — benchmarked against verified peer data. Hospitality benchmarks differently than industrial. WST calibrates the comparison correctly so your investment committee is seeing an accurate picture.</p>
        <a href="/resources/tools" class="service-panel-link">Open benchmarking tools →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">Water intensity calculations per asset class (m³/m²/year)</div>
          <div class="service-panel-feat">3-year trend normalization for weather and occupancy</div>
          <div class="service-panel-feat">Peer group benchmarking across GRESB-relevant asset classes</div>
          <div class="service-panel-feat">Portfolio risk scoring and exposure mapping</div>
        </div>
      </div>
      <div class="service-panel" id="svc-capital">
        <div class="service-panel-tag">Capital Planning</div>
        <h3 class="service-panel-title">Section 179, PACE, and shared savings — <em>structuring the investment correctly.</em></h3>
        <p class="service-panel-body">Self-funded equipment ownership delivers substantially more long-term value than partner-funded models because Section 179 deductions apply only when clients own equipment directly. WST models every financing scenario — tax savings, payback, and NOI impact — before any capital is deployed.</p>
        <a href="/resources/tax-strategy" class="service-panel-link">Explore tax strategy →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">Section 179 / OBBBA deduction modeling by entity type</div>
          <div class="service-panel-feat">PACE financing, equipment leasing, and shared savings options</div>
          <div class="service-panel-feat">Year 1 combined cash flow analysis (tax + water savings)</div>
          <div class="service-panel-feat">Investment committee–ready financial documentation</div>
        </div>
      </div>
      <div class="service-panel" id="svc-tech">
        <div class="service-panel-tag">Technology Implementation</div>
        <h3 class="service-panel-title">High-efficiency equipment installed, commissioned, <em>and verified.</em></h3>
        <p class="service-panel-body">WST coordinates directly with licensed mechanical and plumbing contractors for equipment installation — high-efficiency fixtures, flow management devices, cooling tower upgrades, and IoT sensor networks. Every installation is followed by a verification audit to document actual consumption reductions.</p>
        <a href="/services/smart-monitoring" class="service-panel-link">Explore smart monitoring →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">High-efficiency fixture and flow management installation</div>
          <div class="service-panel-feat">IoT sensor network deployment and commissioning</div>
          <div class="service-panel-feat">Cooling tower optimization and chemical program review</div>
          <div class="service-panel-feat">Post-installation verification audit with documented savings</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── ADVISORY MANDATE ─── -->
<div class="mandate-strip">
  <div class="mandate-label">Our mandate</div>
  <div class="mandate-items">
    <div class="mandate-item">Reduce infrastructure cost exposure<span>Across commercial real estate portfolios</span></div>
    <div class="mandate-item">Convert water data into verified NOI<span>Every saving documented and reported</span></div>
    <div class="mandate-item">Deliver ESG water compliance<span>GRESB WT1, MR3 and RA4 satisfied</span></div>
    <div class="mandate-item">Institutional advisor, not a vendor<span>Outcome-based. No capital outlay required.</span></div>
  </div>
</div>

<!-- ─── PROOF / CASE STUDY ─── -->
<section class="proof-section">
  <div class="proof-inner">
    <div class="proof-left">
      <div class="proof-left-tag">Verified Case Study &mdash; DiamondRock Hospitality</div>
      <div class="proof-quote">
        &ldquo;The outcome was not<br><em>estimated.</em> It was measured,<br>verified, and reported.&rdquo;
      </div>
      <div class="proof-attribution">
        The Westin Fort Lauderdale Beach Resort<br>
        DiamondRock Hospitality Company<br>
        31 assets &middot; GRESB submitted
      </div>
    </div>
    <div class="proof-right">
      <div class="proof-metric">
        <div class="proof-metric-val">25.3%</div>
        <div class="proof-metric-lbl">Water reduction verified</div>
      </div>
      <div class="proof-metric">
        <div class="proof-metric-val">$2.3M</div>
        <div class="proof-metric-lbl">Documented savings</div>
      </div>
      <div class="proof-metric">
        <div class="proof-metric-val">31</div>
        <div class="proof-metric-lbl">Assets in portfolio</div>
      </div>
      <div class="proof-metric">
        <div class="proof-metric-val">$69K</div>
        <div class="proof-metric-lbl">Equipment investment</div>
      </div>
      <div class="proof-metric-client">The Westin Fort Lauderdale Beach Resort &middot; DiamondRock Hospitality</div>
      <div class="proof-who">
        <div class="proof-who-item">
          <div class="proof-who-title">Asset Managers</div>
          <div class="proof-who-body">Improve NOI and portfolio water performance. GRESB-verified data for investment committees and LPs.</div>
        </div>
        <div class="proof-who-item">
          <div class="proof-who-title">Property Managers</div>
          <div class="proof-who-body">Detect costly leaks early &mdash; before they appear on the next utility bill or escalate to a capital event.</div>
        </div>
        <div class="proof-who-item">
          <div class="proof-who-title">Directors of Engineering</div>
          <div class="proof-who-body">Asset-level dashboards, real-time alerts, and verified performance documentation.</div>
        </div>
        <div class="proof-who-item">
          <div class="proof-who-title">Sustainability Teams</div>
          <div class="proof-who-body">Verified water data that satisfies GRESB and institutional ESG disclosure standards.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── CLIENT LOGOS ─── -->
<section class="logos-section">
  <div class="logos-label">Trusted by leading institutional owners and operators</div>
  <div class="logos-grid">
    <div class="logo-cell" data-client="diamondrock" title="DiamondRock Hospitality">
      <!-- Upload: place diamondrock-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/diamondrock-logo.png" alt="DiamondRock Hospitality" loading="lazy"/> -->
      <span class="logo-name">DiamondRock Hospitality</span>
      <span class="logo-sector">Hospitality REIT</span>
    </div>
    <div class="logo-cell" data-client="westin" title="Westin Hotels & Resorts">
      <!-- Upload: place westin-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/westin-logo.png" alt="Westin Hotels & Resorts" loading="lazy"/> -->
      <span class="logo-name">Westin Hotels & Resorts</span>
      <span class="logo-sector">Marriott Portfolio</span>
    </div>
    <div class="logo-cell" data-client="kimpton" title="Kimpton Hotels">
      <!-- Upload: place kimpton-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/kimpton-logo.png" alt="Kimpton Hotels" loading="lazy"/> -->
      <span class="logo-name">Kimpton Hotels</span>
      <span class="logo-sector">IHG Portfolio</span>
    </div>
    <div class="logo-cell" data-client="even" title="Even Hotels">
      <!-- Upload: place even-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/even-logo.png" alt="Even Hotels" loading="lazy"/> -->
      <span class="logo-name">Even Hotels</span>
      <span class="logo-sector">IHG Portfolio</span>
    </div>
    <div class="logo-cell" data-client="slgreen" title="SL Green Realty Corp">
      <!-- Upload: place slgreen-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/slgreen-logo.png" alt="SL Green Realty Corp" loading="lazy"/> -->
      <span class="logo-name">SL Green Realty Corp</span>
      <span class="logo-sector">Office REIT</span>
    </div>
    <div class="logo-cell" data-client="kroger" title="Kroger">
      <!-- Upload: place kroger-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/kroger-logo.png" alt="Kroger" loading="lazy"/> -->
      <span class="logo-name">Kroger</span>
      <span class="logo-sector">Retail</span>
    </div>
    <div class="logo-cell" data-client="sandals" title="Sandals Resorts">
      <!-- Upload: place sandals-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/sandals-logo.png" alt="Sandals Resorts" loading="lazy"/> -->
      <span class="logo-name">Sandals Resorts</span>
      <span class="logo-sector">Hospitality</span>
    </div>
    <div class="logo-cell" data-client="hilton" title="Hilton">
      <!-- Upload: place hilton-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/hilton-logo.png" alt="Hilton" loading="lazy"/> -->
      <span class="logo-name">Hilton</span>
      <span class="logo-sector">Hospitality</span>
    </div>
    <div class="logo-cell" data-client="concours" title="The Concours Club">
      <!-- Upload: place concours-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/concours-logo.png" alt="The Concours Club" loading="lazy"/> -->
      <span class="logo-name">The Concours Club</span>
      <span class="logo-sector">Golf & Recreation</span>
    </div>
    <div class="logo-cell" data-client="hillel" title="Hillel Community School">
      <!-- Upload: place hillel-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/hillel-logo.png" alt="Hillel Community School" loading="lazy"/> -->
      <span class="logo-name">Hillel Community School</span>
      <span class="logo-sector">Education</span>
    </div>
    <div class="logo-cell" data-client="panna" title="Panna Manufacturing">
      <!-- Upload: place panna-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/panna-logo.png" alt="Panna Manufacturing" loading="lazy"/> -->
      <span class="logo-name">Panna Manufacturing</span>
      <span class="logo-sector">Industrial</span>
    </div>
    <div class="logo-cell" data-client="lyc" title="Lauderdale Yacht Club">
      <!-- Upload: place lyc-logo.png in /assets/img/logos/ then uncomment:
      <img src="/assets/img/logos/lyc-logo.png" alt="Lauderdale Yacht Club" loading="lazy"/> -->
      <span class="logo-name">Lauderdale Yacht Club</span>
      <span class="logo-sector">Marina & Club</span>
    </div>
  </div>
</section>

<!-- ─── CONTACT ─── -->
<section class="contact-section" style="padding:0;">
  <div class="cc">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Start Here</div>
      <h2 class="contact-h">Protect Your<br>Asset Performance</h2>
      <p class="contact-sub">Request a confidential water assessment to identify cost exposure, ESG data gaps, and the risk mitigation and financial impact of a structured water programme across your portfolio.</p>
      <div class="cc-btns">
        <button class="cc-btn-primary" id="cc-speak-btn">Speak with an Advisor</button>
        <button class="cc-btn-ghost" id="cc-assess-btn">Schedule Assessment</button>
      </div>
    </div>
    <div class="cc-grid">
      <div class="cc-card">
        <div class="cc-card-lbl">Risk Mitigation</div>
        <div class="cc-card-title">Identify exposure before it compounds</div>
        <div class="cc-card-body">Billing errors, undetected leaks, and ESG data gaps cost institutional portfolios an average of $250K per asset annually.</div>
      </div>
      <div class="cc-card">
        <div class="cc-card-lbl">Financial Impact</div>
        <div class="cc-card-title">Verified NOI improvement</div>
        <div class="cc-card-body">Every WST engagement produces verified savings formatted for investment committee reporting and LP disclosure.</div>
      </div>
      <div class="cc-card">
        <div class="cc-card-lbl">ESG Performance</div>
        <div class="cc-card-title">97% data coverage. WT1 satisfied.</div>
        <div class="cc-card-body">Automated bill acquisition through Ara AI delivers 100% ESG water data coverage within 30 days of deployment.</div>
      </div>
      <div class="cc-card">
        <div class="cc-card-lbl">Our Commitment</div>
        <div class="cc-card-title">No obligation. 90 minutes.</div>
        <div class="cc-card-body">Every advisor is a practitioner. Every submission is reviewed personally. No automated sequences.</div>
      </div>
    </div>
  </div>
</section>

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

<!-- ─── SEARCH OVERLAY ─── -->
<div class="search-overlay" id="search-overlay" role="dialog" aria-label="Site search" aria-modal="true">
  <div class="search-box">
    <div class="search-input-wrap">
      <input type="search" class="search-input" id="search-input"
        placeholder="Search services, resources, industries..."
        autocomplete="off" spellcheck="false" aria-label="Search the site"/>
      <button class="search-close" id="search-close" aria-label="Close search">&times;</button>
    </div>
    <div class="search-hint">Press Esc to close &nbsp;&bull;&nbsp; Enter to go to result</div>
  </div>
  <div class="search-results" id="search-results" role="listbox"></div>
</div>
<!-- ─── VIDEO POPUP ─── -->
<div class="video-overlay" id="video-overlay">
  <div class="video-modal">
    <button class="video-close" id="video-close" aria-label="Close video">&times;</button>
    <div class="video-ratio">
      <!-- Replace the src with your actual YouTube/Vimeo embed URL.
           Format: https://www.youtube.com/embed/VIDEO_ID?autoplay=1&rel=0 -->
      <iframe id="video-iframe" src="" allowfullscreen allow="autoplay; encrypted-media"
        title="Water Solutions Technology — Overview"></iframe>
    </div>
    <div class="video-caption">Water Solutions Technology &mdash; Portfolio Water Advisory Overview</div>
  </div>
</div>
<!-- SCROLL TO TOP -->
<button class="scroll-top" id="scroll-top" aria-label="Return to top" title="Back to top">
  <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
    <path d="M8 12V4M4 7l4-4 4 4"/>
  </svg>
</button>




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