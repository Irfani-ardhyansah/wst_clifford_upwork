<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
        padding: 0 48px; height: 68px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
    }
          /* logo kiri — flex: 1 */
      nav > a:first-child {
          flex: 1;
          display: flex;
          align-items: center;
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
        display: flex;
        list-style: none;
        gap: 0;
        /* hapus position, left, transform */
    }
    .nav-portfolio {
      align-items: center;
      justify-content: center;
      min-width: 500px;
      display: flex;
    }
    .nav-portfolio-link {
        font-size: 13px;
        font-weight: 500;
        color: var(--black);
        text-decoration: none;
        padding: 0 16px;
        height: 68px;
        display: flex;
        align-items: center;
        white-space: nowrap;
        transition: color 0.2s;
    }
    .nav-portfolio-link:hover { color: var(--green-lt); }
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

    .nav-right {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 0;
        margin-left: 0;
    }

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
      /* max-width: 500px; */
        margin-bottom: 16px;
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
      max-height: 64px; max-width: 110px;
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

    .open-modal-btn {
        cursor: pointer; display: inline-block; padding: 12px 28px;
    }
  </style> 

 <!-- style modal  -->
  <style>
 .modal {
  background: #ffffff;
  border-radius: 12px;
  border: 0.5px solid rgba(0,0,0,0.15);
  width: 100%;
  max-width: 640px;
  overflow: hidden;
}
.modal-head {
  padding: 20px 24px 16px;
  border-bottom: 0.5px solid rgba(0,0,0,0.15);
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 12px;
}
.modal-head h2 {
  margin: 0;
  font-size: 16px;
  font-weight: 500;
  color: #111111;
  line-height: 1.4;
}
.modal-head p {
  margin: 4px 0 0;
  font-size: 13px;
  color: #666666;
  line-height: 1.5;
}
.close-btn {
  background: none;
  border: none;
  cursor: pointer;
  color: #666666;
  font-size: 18px;
  line-height: 1;
  padding: 2px 4px;
  flex-shrink: 0;
  margin-top: 2px;
}
.close-btn:hover { color: #111111; }
.strips {
  display: flex;
  border-bottom: 0.5px solid rgba(0,0,0,0.15);
}
.strip {
  flex: 1;
  padding: 10px 14px;
  border-right: 0.5px solid rgba(0,0,0,0.15);
}
.strip:last-child { border-right: none; }
.strip-lbl {
  font-size: 11px;
  font-weight: 500;
  color: #888888;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  margin-bottom: 2px;
}
.strip-val {
  font-size: 12px;
  color: #111111;
  line-height: 1.4;
}
.modal-body { padding: 20px 24px; }
.row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
  margin-bottom: 12px;
}
.row-full { margin-bottom: 12px; }
.field label {
  display: block;
  font-size: 12px;
  color: #555555;
  margin-bottom: 4px;
  font-weight: 500;
}
.field label .req { color: #c0392b; }
.field input,
.field select,
.field textarea {
  width: 100%;
  box-sizing: border-box;
  padding: 7px 10px;
  font-size: 13px;
  border: 1px solid rgba(0,0,0,0.2);
  border-radius: 8px;
  background: #ffffff;
  color: #111111;
  outline: none;
  font-family: inherit;
}
.field input:focus,
.field select:focus,
.field textarea:focus {
  border-color: rgba(0,0,0,0.4);
  box-shadow: 0 0 0 2px rgba(0,0,0,0.06);
}
.field textarea {
  resize: vertical;
  min-height: 72px;
  padding-top: 7px;
}
.modal-foot {
  padding: 14px 24px 18px;
  border-top: 0.5px solid rgba(0,0,0,0.15);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
}
.foot-note {
  font-size: 12px;
  color: #666666;
  line-height: 1.4;
  max-width: 320px;
}
.submit-btn {
  background: #111111;
  color: #ffffff;
  border: none;
  border-radius: 8px;
  padding: 9px 20px;
  font-size: 13px;
  font-weight: 500;
  cursor: pointer;
  white-space: nowrap;
  font-family: inherit;
}
.submit-btn:hover { opacity: 0.85; }

@media (max-width: 520px) {
  .row { grid-template-columns: 1fr; }
  .strips { flex-direction: column; }
  .strip { border-right: none; border-bottom: 0.5px solid rgba(0,0,0,0.15); }
  .strip:last-child { border-bottom: none; }
  .modal-foot { flex-direction: column; align-items: stretch; }
  .submit-btn { width: 100%; text-align: center; }
}
</style>
<!-- end style  -->

  @stack('styles')

</head>
<body>

@include('layouts.partials.header')

<main>
    @yield('content')
</main>

@include('layouts.partials.footer')

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

<!-- ═══ Modal CONSULTATION POPUP ═══ -->
<div class="co" id="co" role="dialog" aria-modal="true" aria-labelledby="co-title">
  <div class="modal">
    <div class="modal-head">
      <div>
        <h2 class="co-title" id="co-title">Schedule your ESG water consultation</h2>
        <p>Our advisors will analyse your portfolio — identifying cost exposure, ESG data gaps, and the financial impact of a structured water programme.</p>
      </div>
      <button class="close-btn" id="co-x" aria-label="Close form">&times;</button>
    </div>

    <div class="strips">
      <div class="strip">
        <div class="strip-lbl">Risk mitigation</div>
        <div class="strip-val">Identify hidden cost exposure early</div>
      </div>
      <div class="strip">
        <div class="strip-lbl">Financial impact</div>
        <div class="strip-val">15–30% reduction in annual water spend</div>
      </div>
      <div class="strip">
        <div class="strip-lbl">ESG performance</div>
        <div class="strip-val">Verified data for LP &amp; investor reporting</div>
      </div>
    </div>

    <div class="modal-body">
      <form action="{{ route('member-dashboard.gresb-water.store') }}" method="POST">
        @csrf
        <div style="position:absolute;left:-9999px;height:0;overflow:hidden;" aria-hidden="true">
          <input type="text" name="co_hp" id="co-hp" tabindex="-1" autocomplete="off">
        </div>

        <div class="row">
          <div class="field">
            <label for="co-fn">First name <span class="req">*</span></label>
            <input type="text" id="co-fn" name="first_name" value="{{ old('first_name', auth()->check() ? auth()->user()->name : '') }}" placeholder="First name" maxlength="80" autocomplete="given-name" required>
            <span class="co-errmsg" id="co-fn-e"></span>
            @error('first_name')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
          <div class="field">
            <label for="co-ln">Last name <span class="req">*</span></label>
            <input type="text" id="co-ln" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" maxlength="80" autocomplete="family-name" required>
            <span class="co-errmsg" id="co-ln-e"></span>
            @error('last_name')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
        </div>

        <div class="row">
          <div class="field">
            <label for="co-em">Work email <span class="req">*</span></label>
            <input type="email" id="co-em" name="email" value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}" placeholder="you@company.com" maxlength="200" autocomplete="email" required>
            <span class="co-errmsg" id="co-em-e"></span>
            @error('email')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
          <div class="field">
            <label for="co-co">Company <span class="req">*</span></label>
            <input type="text" id="co-co" name="company" value="{{ old('company', auth()->check() ? auth()->user()->company : '') }}" placeholder="Company name" maxlength="120" autocomplete="organization" required>
            <span class="co-errmsg" id="co-co-e"></span>
            @error('company')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
        </div>

        <div class="row">
          <div class="field">
            <label for="co-ph">Phone number</label>
            <input type="tel" id="co-ph" name="phone" value="{{ old('phone') }}" placeholder="+1 (000) 000-0000" maxlength="30" autocomplete="tel">
            <span class="co-errmsg" id="co-ph-e"></span>
          </div>
          <div class="field">
            <label for="co-ps">Portfolio size (# properties)</label>
            <input type="number" id="co-ps" name="portfolio_size" value="{{ old('portfolio_size') }}" placeholder="e.g. 25" min="1" max="9999">
            @error('portfolio_size')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
        </div>

        <div class="row">
          <div class="field">
            <label for="co-int">Primary interest</label>
            <select id="co-int" name="interest">
              <option value="" disabled selected>Select your goal&hellip;</option>
              <option value="savings" {{ old('interest') == 'savings' ? 'selected' : '' }}>Reduce water infrastructure cost exposure</option>
              <option value="compliance" {{ old('interest') == 'compliance' ? 'selected' : '' }}>ESG water data coverage &amp; reporting</option>
              <option value="gresb" {{ old('interest') == 'gresb' ? 'selected' : '' }}>GRESB WT1 / MR3 / RA4 compliance</option>
              <option value="monitoring" {{ old('interest') == 'monitoring' ? 'selected' : '' }}>Smart monitoring &amp; leak detection</option>
              <option value="cooling" {{ old('interest') == 'cooling' ? 'selected' : '' }}>Cooling tower optimisation</option>
              <option value="audit" {{ old('interest') == 'audit' ? 'selected' : '' }}>Utility bill validation &amp; audit</option>
              <option value="tax" {{ old('interest') == 'tax' ? 'selected' : '' }}>Section 179 tax strategy &amp; financing</option>
              <option value="full_portfolio" {{ old('interest') == 'full_portfolio' ? 'selected' : '' }}>Full portfolio water programme</option>
              <option value="other" {{ old('interest') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('interest')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
          <div class="field">
            <label for="co-mt">Preferred meeting time</label>
            <input type="datetime-local" id="co-mt" name="time_preference" value="{{ old('time_preference', now()->format('Y-m-d\TH:i')) }}">
            @error('time_preference')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
        </div>

        <div class="row-full field">
          <label for="co-nt">Additional notes</label>
          <textarea id="co-nt" name="notes" placeholder="Tell us about your specific challenges&hellip;" maxlength="1000">{{ old('notes') }}</textarea>
          @error('notes')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
        </div>

        <div class="modal-foot">
          <p class="foot-note">We'll follow up within 24 hours to schedule a 30-minute call. Every submission reviewed personally.</p>
          <button type="submit" class="submit-btn" id="co-submit">Submit request</button>
        </div>

      </form>
    </div>


    <div class="co-ok" id="co-ok">
      <div class="co-ok-icon">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="#2d5c42" stroke-width="2.2" stroke-linecap="round"><path d="M4 11l5 5 9-9"/></svg>
      </div>
      <h3 class="co-ok-title">Request received.</h3>
      <p class="co-ok-body">A WST advisor will follow up within 24 hours.<br>Every submission is reviewed personally — no automated sequences.</p>
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

@include('layouts.partials.modal-form-user')

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
      coSubmit.addEventListener('click', function () {

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

          if (!fn || !fn.value.trim()) ok = coSetState('co-fn', 'co-fn-e', 'First name is required.') && ok;
          else coSetState('co-fn', 'co-fn-e', '');

          if (!ln || !ln.value.trim()) ok = coSetState('co-ln', 'co-ln-e', 'Last name is required.') && ok;
          else coSetState('co-ln', 'co-ln-e', '');

          if (!em || !em.value.trim()) {
              ok = coSetState('co-em', 'co-em-e', 'Work email is required.') && ok;
          } else if (!/[^@]+@[^.]+\..+/.test(em.value)) {
              ok = coSetState('co-em', 'co-em-e', 'Please enter a valid email address.') && ok;
          } else if (!isWorkEmail(em.value)) {
              ok = coSetState('co-em', 'co-em-e', 'Please use a work email address.') && ok;
          } else {
              coSetState('co-em', 'co-em-e', '');
          }

          if (!co || !co.value.trim()) ok = coSetState('co-co', 'co-co-e', 'Company name is required.') && ok;
          else coSetState('co-co', 'co-co-e', '');

          if (ph && ph.value.trim()) {
              var digits = ph.value.replace(/\D/g, '');
              if (digits.length < 7 || digits.length > 15) {
                  ok = coSetState('co-ph', 'co-ph-e', 'Please enter a valid phone number.') && ok;
              } else {
                  coSetState('co-ph', 'co-ph-e', '');
              }
          }

          /* Strip HTML/JS injection attempts */
          document.querySelectorAll('.modal .field input, .modal .field select, .modal .field textarea').forEach(function (f) {
              if (f.value && /<[^>]+>|javascript:/i.test(f.value)) f.value = '';
          });

          if (!ok) return;

          coSubmit.disabled = true;
          coSubmit.textContent = 'Sending\u2026';

          /* Send form data to server */
          var form = document.querySelector('.modal form');
          var formData = new FormData(form);

          fetch(form.action, {
              method: 'POST',
              body: formData,
              headers: {
                  'X-Requested-With': 'XMLHttpRequest',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              }
          })
          .then(function (response) {
              if (!response.ok) throw new Error('Server error: ' + response.status);
              return response.json();
          })
          .then(function (data) {
              if (data.success) {
                  var modalBody = document.querySelector('.modal-body');
                  var modalFoot = document.querySelector('.modal-foot');
                  var okDiv = document.getElementById('co-ok');

                  if (modalBody) modalBody.style.display = 'none';
                  if (modalFoot) modalFoot.style.display = 'none';
                  if (okDiv) okDiv.classList.add('show');
              } else {
                  if (data.errors) {
                      Object.keys(data.errors).forEach(function (field) {
                          var errorEl = document.getElementById('co-' + field.replace('_', '-') + '-e');
                          if (errorEl) errorEl.textContent = data.errors[field][0];
                      });
                  }
                  coSubmit.disabled = false;
                  coSubmit.textContent = 'Submit request';
              }
          })
          .catch(function (error) {
              console.error('Error:', error);
              coSubmit.disabled = false;
              coSubmit.textContent = 'Submit request';
          });
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
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

        $(document).ready(function() {

            $('#ajaxUserLoginForm').on('submit', function(e) {
                e.preventDefault(); 

                let form = $(this);
                let btn = $('#btn-submit-auth');
                let originalBtnText = btn.html();
                
                btn.prop('disabled', true).html('<i class="fa-solid fa-circle-notch fa-spin"></i> Processing...');

                $.ajax({
                    url: form.attr('action'),
                    type: "POST",
                    data: form.serialize(),
                    success: function(response) {
                        if(response.status === 'success') {

                            $('#auth-form-container').slideUp(300, function() {
                                $('#auth-success-container').removeClass('hidden').hide().fadeIn(400);
                            });

                            $('#nav-login-link').hide();
                            $('#nav-logout-form').fadeIn(300);

                        } else {
                            alert('Something went wrong.');
                        }
                    },
                    error: function(xhr) {
                        btn.prop('disabled', false).html(originalBtnText);
                        
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = '';
                            $.each(errors, function(key, value) {
                                errorMessage += value[0] + '\n';
                            });
                            alert(errorMessage); 
                        } else {
                            alert('Server error. Please try again later.');
                        }
                    },
                    complete: function() {
                        // Jika sukses, tombol tetap disabled biar gak double submit
                        // Jika error, tombol sudah di-enable di block error
                    }
                });
            });

        });
</script>
@stack('scripts')

</body>
</html>