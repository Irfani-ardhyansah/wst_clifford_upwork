@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
<section id="careers" class="bg-white py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
    <!-- Text -->
    <div>
      <p class="text-xs tracking-[0.2em] uppercase text-gray-500">Careers</p>
      <h1 class="mt-2 text-4xl md:text-5xl font-semibold tracking-tight text-gray-900">Shape the Future of Water</h1>
      <h2 class="mt-3 text-xl md:text-2xl font-medium text-gray-800">Join our mission to turn water challenges into measurable results.</h2>
      <p class="mt-6 text-[15px] leading-relaxed text-gray-600 font-light">
        At Water Solutions Technology, water is more than a resource—it’s a responsibility. Every drop saved,
        every system optimized, and every solution implemented carries impact for people, businesses, and the planet.
      </p>
      <p class="mt-4 text-[15px] leading-relaxed text-gray-600 font-light">
        We transform water challenges into opportunities through innovation, data-driven insights, and sustainable
        engineering. From commercial systems to future-ready cities, our work is real, measurable, and lasting.
      </p>
      <a href="/careers" class="inline-block mt-8 px-7 py-3 rounded-md bg-gray-900 text-white text-sm font-light tracking-wide hover:bg-gray-800 transition">
        Recent Job Post
      </a>
    </div>
    <!-- Image -->
    <div>
      <img src="/assets/img/career_water_s_tehnology.png" alt="Team discussion" class="w-full rounded-2xl shadow-lg object-cover" />
    </div>
  </div>
</section>

<section id="reasons" class="bg-gray-50 py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-10">
      <p class="text-xs tracking-[0.2em] uppercase text-gray-500">Culture</p>
      <h2 class="mt-2 text-3xl md:text-4xl font-semibold tracking-tight text-gray-900">5 Reasons to Be Part of Our Team</h2>
      <p class="mt-3 text-[15px] leading-relaxed text-gray-600 font-light max-w-3xl">
        The Water Solutions Technology culture values curiosity, collaboration, and craftsmanship.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-start">
      <!-- Image -->
      <div>
        <img src="/assets/img/water_plant_treatement_management_flow.jpg" alt="Water drop ripple" class="w-full rounded-2xl shadow-lg object-cover" />
      </div>

      <!-- Numbered list -->
      <div class="space-y-7">
        <div class="flex items-start gap-4">
          <div class="h-8 w-8 rounded-full bg-gray-900 text-white text-sm flex items-center justify-center">1</div>
          <div>
            <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">Purpose-Driven Work</h3>
            <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
              Make a difference by helping organizations reduce water consumption, lower costs, and meet environmental goals.
            </p>
          </div>
        </div>
        <div class="flex items-start gap-4">
          <div class="h-8 w-8 rounded-full bg-gray-900 text-white text-sm flex items-center justify-center">2</div>
          <div>
            <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">Innovative Environment</h3>
            <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
              Work with cutting-edge technologies in water metering, IoT, data visualization, and smart plumbing systems.
            </p>
          </div>
        </div>
        <div class="flex items-start gap-4">
          <div class="h-8 w-8 rounded-full bg-gray-900 text-white text-sm flex items-center justify-center">3</div>
          <div>
            <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">Sustainability-Focused</h3>
            <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
              Aligned with ESG (GRESB), LEED, and SDG targets to support global water stewardship.
            </p>
          </div>
        </div>
        <div class="flex items-start gap-4">
          <div class="h-8 w-8 rounded-full bg-gray-900 text-white text-sm flex items-center justify-center">4</div>
          <div>
            <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">Collaborative Culture</h3>
            <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
              Join engineers, analysts, designers, and sustainability advocates who thrive on teamwork and learning.
            </p>
          </div>
        </div>
        <div class="flex items-start gap-4">
          <div class="h-8 w-8 rounded-full bg-gray-900 text-white text-sm flex items-center justify-center">5</div>
          <div>
            <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">Growth & Development</h3>
            <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
              Ongoing training, mentorship, and opportunities to lead meaningful projects from day one.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="internships" class="bg-gray-50 py-20">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <p class="text-xs tracking-[0.2em] uppercase text-gray-500">Early Careers</p>
    <h2 class="mt-2 text-3xl md:text-4xl font-semibold tracking-tight text-gray-900">Internships & Early Careers</h2>
    <p class="mt-4 text-[15px] leading-relaxed text-gray-600 font-light">
      We welcome students and emerging professionals eager to apply engineering, environmental science,
      or data analytics to real-world water solutions.
    </p>
  </div>
</section>

<!-- Careers: Explore + Available Posts (Two-Column Combined) -->
<section class="bg-white py-20" x-data="careerModals()" x-cloak>
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16">

    <!-- LEFT: Explore Opportunities -->
    <div>
      <p class="text-xs tracking-[0.2em] uppercase text-gray-500">Open Roles</p>
      <h2 class="mt-2 text-3xl md:text-4xl font-semibold tracking-tight text-gray-900">Explore Opportunities</h2>
      <p class="mt-3 text-[15px] leading-relaxed text-gray-600 font-light max-w-3xl">
        We’re looking for passionate professionals who want to grow with us and help reshape the water landscape.
      </p>

      <div class="mt-10 space-y-8">
        <div class="border-b pb-6">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">Water Efficiency Consultants</h3>
          <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
            Analyze, audit, and improve water performance across industries.
          </p>
        </div>

        <div class="border-b pb-6">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">IoT & Data Engineers</h3>
          <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
            Build smart monitoring platforms, integrate sensors, and deliver real-time insights.
          </p>
        </div>

        <div class="border-b pb-6">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">Sustainability & ESG Analysts</h3>
          <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
            Support regulatory alignment, benchmarking, and innovative solutions.
          </p>
        </div>

        <div class="border-b pb-6">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">Field Technicians & Installers</h3>
          <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
            Install and service advanced water technologies for properties and facilities.
          </p>
        </div>

        <div>
          <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-900">Sales & Business Development</h3>
          <p class="mt-1 text-[15px] leading-relaxed text-gray-600 font-light">
            Build partnerships and programs with CRE, hospitality, and manufacturing clients.
          </p>
        </div>
      </div>
    </div>

    <!-- RIGHT: Available Posts (sticky on desktop) -->
    <div class="lg:sticky lg:top-24 h-max">
      <p class="text-xs tracking-[0.2em] uppercase text-gray-500">Openings</p>
      <h2 class="mt-2 text-3xl md:text-4xl font-semibold tracking-tight text-gray-900">Available Posts</h2>
      <h3 class="mt-1 text-lg font-medium text-gray-700">Accepting applications now</h3>

      <div class="mt-8 space-y-4">
        <template x-for="(job, key) in jobs" :key="key">
          <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="text-base md:text-lg font-medium text-gray-900" x-text="job.title"></div>
            <div class="flex items-center gap-3">
              <button
                @click="openModal(key)"
                class="px-5 py-2 rounded-md bg-gray-900 hover:bg-gray-800 text-white text-sm font-light tracking-wide transition">
                Requirements
              </button>
              <button
                @click="quickApply(key)"
                class="px-5 py-2 rounded-md border border-gray-300 hover:border-gray-400 text-gray-800 text-sm font-light tracking-wide transition">
                Quick Apply
              </button>
            </div>
          </div>
        </template>
      </div>
    </div>
  </div>

  <!-- Modal Backdrop -->
  <div x-show="active" class="fixed inset-0 bg-black/50 z-40" @click="closeModal()"></div>

  <!-- Modal Window -->
  <div x-show="active" class="fixed inset-0 flex items-start justify-center pt-24 z-50 overflow-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full mx-4 border border-gray-200" @keydown.escape.window="closeModal()">
      <div class="flex justify-between items-center border-b px-6 py-4">
        <h3 class="text-xl font-semibold text-gray-900" x-text="modalTitle"></h3>
        <button @click="closeModal()" class="text-gray-500 hover:text-gray-700">✕</button>
      </div>

      <div class="px-6 py-5">
        <!-- Duties & Requirements -->
        <template x-if="!applying">
          <div class="space-y-6">
            <div>
              <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wide">Duties & Responsibilities</h4>
              <ul class="list-disc list-inside mt-2 space-y-1 text-[15px] leading-relaxed text-gray-700 font-light" x-html="modalContent.duties"></ul>
            </div>
            <div>
              <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wide">Requirements</h4>
              <ul class="list-disc list-inside mt-2 space-y-1 text-[15px] leading-relaxed text-gray-700 font-light" x-html="modalContent.requirements"></ul>
            </div>
            <div class="flex justify-end gap-3">
              <button @click="startApply()" class="px-6 py-2 rounded-md bg-gray-900 hover:bg-gray-800 text-white text-sm font-light tracking-wide transition">Quick Apply</button>
              <button @click="closeModal()" class="px-6 py-2 rounded-md border border-gray-300 hover:border-gray-400 text-gray-800 text-sm font-light tracking-wide transition">Close</button>
            </div>
          </div>
        </template>

        <!-- Quick Apply Form -->
        <template x-if="applying">
          <form @submit.prevent="submitApplication()" class="space-y-4">
            <div>
              <label class="block text-sm text-gray-700">Full Name</label>
              <input type="text" x-model="form.name" required class="mt-1 w-full border rounded-md px-3 py-2 text-[15px] font-light" />
            </div>
            <div>
              <label class="block text-sm text-gray-700">Email Address</label>
              <input type="email" x-model="form.email" required class="mt-1 w-full border rounded-md px-3 py-2 text-[15px] font-light" />
            </div>
            <div>
              <label class="block text-sm text-gray-700">LinkedIn Profile URL</label>
              <input type="url" x-model="form.linkedin" placeholder="https://linkedin.com/in/..." class="mt-1 w-full border rounded-md px-3 py-2 text-[15px] font-light" />
            </div>
            <div>
              <label class="block text-sm text-gray-700">Upload Resume (PDF)</label>
              <input type="file" @change="handleFile($event)" accept="application/pdf" required class="mt-1 w-full text-[15px]" />
            </div>
            <div class="flex justify-end gap-3">
              <button type="submit" class="px-6 py-2 rounded-md bg-gray-900 hover:bg-gray-800 text-white text-sm font-light tracking-wide transition">Submit Application</button>
              <button type="button" @click="closeModal()" class="px-6 py-2 rounded-md border border-gray-300 hover:border-gray-400 text-gray-800 text-sm font-light tracking-wide transition">Cancel</button>
            </div>
          </form>
        </template>
      </div>
    </div>
  </div>
</section>

<section id="apply" class="bg-white py-20">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-3xl md:text-4xl font-semibold tracking-tight text-gray-900">Together, Let’s Make Every Drop Count</h2>
    <p class="mt-4 text-[15px] leading-relaxed text-gray-600 font-light">
      At Water Solutions Technology, your work is part of something bigger. If you’re ready to create, innovate,
      and make a measurable difference, let’s build the future of water together.
    </p>

    <h3 class="mt-10 text-2xl font-medium text-gray-900">How to Apply</h3>
    <p class="mt-3 text-[15px] leading-relaxed text-gray-600 font-light">
      Email your resume and a brief introduction to
      <a href="mailto:careers@watersolutech.com" class="text-gray-900 underline decoration-gray-400 hover:decoration-gray-900">careers@watersolutech.com</a>
      or see current openings on our
      <a href="https://www.linkedin.com/company/watersolutech" class="text-gray-900 underline decoration-gray-400 hover:decoration-gray-900">LinkedIn page</a>.
    </p>

    <div class="mt-8">
      <a href="/careers" class="inline-block px-7 py-3 rounded-md bg-gray-900 text-white text-sm font-light tracking-wide hover:bg-gray-800 transition">
        Recent Job Post
      </a>
    </div>
  </div>
</section>
@endsection

@push('scripts')

<script>
  function careerModals() {
    return {
      active: false,
      applying: false,
      modalTitle: '',
      modalContent: {},
      form: { name: '', email: '', linkedin: '', file: null },
      jobs: {
        dataAnalyst: {
          title: 'Part-Time Data Analyst',
          duties: `
            <li>Work with executives to identify improvement opportunities</li>
            <li>Create reports for internal teams & external clients</li>
            <li>Collect, clean, and analyze data with rigor</li>
            <li>Visualize insights with charts and dashboards</li>
            <li>Establish KPIs to measure decisions</li>
          `,
          requirements: `
            <li>Proficient in Excel, SQL, or Python</li>
            <li>Strong analytical & presentation skills</li>
            <li>High attention to detail</li>
            <li>Works well independently & in teams</li>
          `
        },
        draftsman: {
          title: 'Part-Time Draftsman',
          duties: `
            <li>Draft 2D/3D MEP designs in Revit & AutoCAD</li>
            <li>Create SolidWorks drawings for manufacturing</li>
            <li>Prepare presentations with 3D renderings</li>
            <li>Collaborate with engineers and installers</li>
          `,
          requirements: `
            <li>Technical drafting experience</li>
            <li>Proficient in AutoCAD (SolidWorks a plus)</li>
            <li>Knowledge of industry standards</li>
            <li>Clear communication & organization</li>
          `
        },
        salesRep: {
          title: 'Contracted Portfolio Sales-Rep',
          duties: `
            <li>Assist prospects with demonstrations</li>
            <li>Generate leads and manage pipelines</li>
            <li>Meet weekly & monthly sales quotas</li>
            <li>Maintain customer relationships and reports</li>
          `,
          requirements: `
            <li>Proven B2B sales experience</li>
            <li>Strong networking & presentation skills</li>
            <li>Goal-driven, self-motivated</li>
            <li>Familiarity with utility & sustainability sectors</li>
          `
        }
      },
      openModal(key) { this.applying = false; this.modalTitle = this.jobs[key].title; this.modalContent = this.jobs[key]; this.active = true; },
      quickApply(key) { this.openModal(key); this.applying = true; },
      closeModal() { this.active = false; },
      startApply() { this.applying = true; },
      handleFile(e) { this.form.file = e.target.files[0]; },
      submitApplication() {
        // integrate with backend here
        console.log('Apply:', this.modalTitle, this.form);
        alert('Thanks! Your application has been submitted.');
        this.closeModal();
      }
    }
  }
</script>
@endpush