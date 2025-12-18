@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
<!-- === PAGE CONTENT (placeholder for now) === -->
  <section class="hero-bg min-h-screen text-white pb-16">
    <!-- Hero and sections go here -->
  <!-- =========== HERO SECTION: Premium Black & White =========== -->
<section class="relative min-h-screen flex items-center justify-center bg-black overflow-hidden">
  <!-- Background Image: Your actual hero/engineer image, b&w preferred -->
  <img src="{{ asset('assets/img/about/about.png') }}" alt="Water Audit Engineer" class="absolute inset-0 w-full h-full object-cover object-center opacity-90" />

  <!-- Solid black overlay for darkness -->
  <div class="absolute inset-0 bg-black opacity-60"></div>

  <!-- Content Centered -->
  <div class="relative z-10 flex flex-col items-center text-center w-full px-6">
    <h1 class="font-serif text-white text-4xl md:text-6xl font-semibold mb-6 leading-tight tracking-tight drop-shadow">
      About Water Solutions Technology<br>
    </h1>
    <p class="max-w-xl text-lg md:text-2xl text-gray-200 mb-8 font-light">
      Reimagining Water as a Strategic Asset<br>
    </p>
  
  </div>
</section>

  </section>

  



  <main class="max-w-6xl mx-auto py-16 px-6 text-gray-700 text-[15px] tracking-wide space-y-16">

    

    <section>
      <h2 class="text-2xl font-semibold mb-4 text-gray-900">Our commitment</h2>
      <p>At Water Solutions Technology (WST), our commitment is to empower commercial property leaders to harness the full value of water. Through precision technology, data-driven insights, and turnkey execution, we help organizations reduce waste, lower operating costs, and lead in sustainability performance.</p>
    </section>



<section class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 text-center rounded-lg">
  <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 text-white font-bold text-2xl">
    <div>
      <div id="gallonsSaved" class="count-up" data-target="500000">0</div>
      <p class="text-lg font-light mt-2 text-gray-300">Gallons of Water Saved</p>
    </div>
    <div>
      <div id="projectsDelivered" class="count-up" data-target="250">0</div>
      <p class="text-lg font-light mt-2 text-gray-300">Projects Delivered</p>
    </div>
    <div>
      <div id="blueChipClients" class="count-up" data-target="50">0</div>
      <p class="text-lg font-light mt-2 text-gray-300">Blue-Chip Clients Served</p>
    </div>
    <div>
      <div id="co2Reduced" class="count-up" data-target="1000">0</div>
      <p class="text-lg font-light mt-2 text-gray-300">Tons of CO₂ Avoided</p>
    </div>
  </div>
</section>



    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Who We Serve</h2>
        <p>Commercial Real Estate (CRE & REIT). We support asset managers, property managers, CFOs, engineering directors, and ESG professionals who demand measurable, portfolio-wide results. Our clients span hospitality, healthcare, commercial real estate, schools, and manufacturing — each facing unique water and sustainability challenges.</p>
      </div>
      <img src="/assets/img/about/reit_water_saving_sustianability_built_environment_meter.png" alt="Who We Serve" class="rounded shadow-md" />
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <img src="/assets/img/about/water_meter_water saving.png" alt="What We Do" class="rounded shadow-md" />
      <div>
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">What We Do</h2>
        <p>Innovate to simplifying the business of water. From audits and scope studies to monitoring systems and flow optimization, WST provides the full spectrum of water stewardship tools. We turn complex plumbing systems into opportunities for operational savings, compliance, and carbon reduction, water use reduction — all with zero disruption to your operations.</p>
      </div>
    </section>




<section class="py-20 bg-white text-gray-900">
  <div class="max-w-6xl mx-auto px-6">
    <!-- Header -->
    <div class="mb-12">
      <h2 class="text-3xl md:text-4xl font-semibold tracking-tight">Leading Resources & Network</h2>
      <p class="mt-3 text-gray-600 max-w-3xl">
        We pair deep market intelligence with a high-trust industry network to deliver clarity, access, and measurable results.
      </p>
    </div>

    <!-- Two premium columns (no bullets, no icons) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
      <!-- Column: Resources -->
      <div class="rounded-2xl border border-gray-200 p-8 hover:shadow-xl transition-shadow">
        <h3 class="text-xl font-semibold tracking-tight">Proprietary Resources & Intelligence</h3>

        <div class="mt-6 space-y-6 text-[15px] leading-relaxed text-gray-700">
          <div>
            <div class="text-sm uppercase tracking-wider text-gray-500">Research & Insights</div>
            <p class="mt-1">
              Proprietary research into segmentation, market trends, and competitive dynamics—translating signals into strategies.
            </p>
          </div>

          <div class="border-t border-gray-200 pt-6">
            <div class="text-sm uppercase tracking-wider text-gray-500">Technical Depth</div>
            <p class="mt-1">
              Broad technical, market, and regulatory perspectives that inform design choices and risk management.
            </p>
          </div>

          <div class="border-t border-gray-200 pt-6">
            <div class="text-sm uppercase tracking-wider text-gray-500">Benchmarks & Data</div>
            <p class="mt-1">
              Exclusive 5,000+ company water-performance dataset powering realistic targets and portfolio benchmarking.
            </p>
          </div>

          <div class="border-t border-gray-200 pt-6">
            <div class="text-sm uppercase tracking-wider text-gray-500">Modeling & Economics</div>
            <p class="mt-1">
              Lifecycle modeling, cost analysis, and scenario planning to prioritize projects with the strongest ROI.
            </p>
          </div>
        </div>
      </div>

      <!-- Column: Network -->
      <div class="rounded-2xl border border-gray-200 p-8 hover:shadow-xl transition-shadow">
        <h3 class="text-xl font-semibold tracking-tight">Strategic Network & Access</h3>

        <div class="mt-6 space-y-6 text-[15px] leading-relaxed text-gray-700">
          <div>
            <div class="text-sm uppercase tracking-wider text-gray-500">Executive Access</div>
            <p class="mt-1">
              Direct lines to industry leaders (CEOs, COOs, CTOs, SVPs) for rapid alignment and decision-making.
            </p>
          </div>

          <div class="border-t border-gray-200 pt-6">
            <div class="text-sm uppercase tracking-wider text-gray-500">Global Alliances</div>
            <p class="mt-1">
              Collaboration with international water organizations to share knowledge and accelerate adoption.
            </p>
          </div>

          <div class="border-t border-gray-200 pt-6">
            <div class="text-sm uppercase tracking-wider text-gray-500">Utilities & Founders</div>
            <p class="mt-1">
              Connections with major utilities and founders—unlocking pilots, procurement, and scale.
            </p>
          </div>

          <div class="border-t border-gray-200 pt-6">
            <div class="text-sm uppercase tracking-wider text-gray-500">Capital Partners</div>
            <p class="mt-1">
              Backing from venture capital, private equity, and family offices to fund transformative projects.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional CTA bar (kept minimal/premium) -->
    <div class="mt-12 rounded-xl bg-gray-50 border border-gray-200 p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
      <div>
        <p class="text-sm uppercase tracking-wider text-gray-500">Next Step</p>
        <p class="text-gray-800">Let’s turn intelligence and access into results across your portfolio.</p>
      </div>
      <a href="/contact" class="inline-block px-6 py-3 rounded-lg bg-gray-900 text-white text-sm font-medium hover:bg-gray-700 transition-colors">
        Start a Conversation
      </a>
    </div>
  </div>
</section>



<section x-data="{
  activePerson: null,
  people: [
    {
      name: 'Benjamin Kinster',
      role: 'Senior Auditor | Partner ',
      image: '/assets/img/about/people/tb-ceo.png',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Dr. Clifford Latty is a pioneer in water management, bringing over 30 years of field and executive experience. He’s led groundbreaking projects in smart utility optimization and water sustainability.'
    },
    {
      name: 'Alex Rivera',
      role: 'Director of Engineering',
      image: '/assets/img/about/people/ed.png',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Alex Rivera has a deep background in civil and mechanical engineering. He oversees all technical project execution across our commercial portfolios and turns theory into high-performance water systems.'
    },
    {
      name: 'Naomi Johnson',
      role: 'ESG & Sustainability Lead',
      image: '/assets/img/about/people/mc.png',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Naomi Johnson is an ESG strategist with expertise in environmental reporting, sustainable development, and stakeholder engagement. She ensures our projects align with global sustainability standards.'
    },
    {
      name: 'Jordan Ellis',
      role: 'Operations Strategist',
      image: '/assets/img/about/people/nd.png',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Jordan Ellis bridges fieldwork and business strategy to ensure flawless operational execution. With a logistics background and a sharp eye for process efficiency, he keeps timelines and teams aligned.'
    },
    {
      name: 'Taylor Green',
      role: 'Water Efficiency Analyst',
      image: '/assets/img/about/people/dp.png',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Taylor Green leads our consumption and flow benchmarking division. With a data science background, Taylor finds actionable insights in water use patterns to deliver measurable efficiency gains.'
    },
    {
      name: 'Morgan Lee',
      role: 'Technical Project Manager',
      image: '/assets/img/about/people/cl.png',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Morgan Lee is responsible for orchestrating technical delivery across engineering, installation, and monitoring. Her cross-disciplinary project management background ensures strong outcomes across all departments.'
    },
    {
      name: 'Ranjith Kumar',
      role: 'IT Team Lead',
      image: '/assets/img/about/people/rk.jpeg',
      linkedin: 'https://www.linkedin.com/in/ranjithkumar31',
      url: '#',
      x: '#',
      bio: 'Ranjith leads our IT initiatives, driving innovation, strengthening system security, and ensuring technology aligns with business goals to keep Water Solution Technology ahead in a fast-changing digital landscape.'
    }
  ]
}">
  <h2 class="text-2xl font-semibold mb-4 text-gray-900">Our People</h2>
  <p class="mb-6 text-center">
    Our team combines engineering, sustainability, AI, and field operations. We bring utility expertise and ESG execution to every project.
  </p>

  <ul class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <template x-for="(person, index) in people" :key="index">
      <li class="text-center cursor-pointer" @click="activePerson = person">
        <!-- Enlarged photo -->
        <img
          :src="person.image"
          :alt="person.name"
          class="rounded-full w-72 h-72 mx-auto mb-2 border border-gray-300 object-cover"
        />
        <!-- Name & role -->
        <p class="font-semibold text-gray-900" x-text="person.name"></p>
        <p class="text-sm text-gray-600" x-text="person.role"></p>
        <!-- Icons below the role -->
        <div class="flex justify-center space-x-3 mt-1">
          <a :href="person.linkedin" target="_blank" aria-label="LinkedIn">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAIAAAAlC+aJAAABuklEQVR4nO2YsUsCURzH36lomIUlWQ4WJBRY3WrQIk1NRiT0J9TcUkFjo1BBY0XSXg0FDi6hjU4lUYYJFWjJgVl2pnfX0GKnCe+y9/Pg9xm/93s/fh/u3jt4HFk5I3rGAD3AX0EBaFAAGhSABgWgQQFoUAAaFIAGBaAx0S4QN2Ysph/ac4eJk2SudSPRofs3gALQ6F6Aw2sVYP7lGG1SE/D2L/Aun9vu6rZIsvJQEKOp/PZFJi2UNM1PL6CZ0b7OvSA/NdRTG3qdNq/TtjQ5uHh0dZB41NCWkYDPbd+dn3BYzQ2fmo2G/SCfLZYjty+0nRntgVW/57fpv+E4sjM7ZuA42s5ttIk9Duu0x0G7ip2AopDN+P1I6LxjPcJvxaJ3+foa/3AvbVt2AmuRm+XT61T+vVyVL7PFQDjx/Papqhkf6KJty0ggLZRCsXRt8lGR4hlBVdZ8nzSEkcBxMifJiip8ehVVic1spO3MSCCZK9aHpYqkSugPIVYCBbFaH0pyCzozEpAV9fdDCFEahbS00X9AGygADQpAgwLQ6F4AbyWgQQFoUAAaFIAGBaBBAWhQABoUgAYFoNG9wBfrTHdNRMi0AAAAAABJRU5ErkJggg=="
              alt="LinkedIn"
              class="w-5 h-5"
            />
          </a>
          <a :href="person.url" target="_blank" aria-label="Website">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAzElEQVR4nO3ZwQ6EIAxFUTX+/y/r2gSxBdqHes92Ql/tgHHGZQEAAAAAAADwJ2vjuiOgpiTf22wtuLe2JN/apCe4NUOSvwWHT7/+aQC94b11wvNrAxgV3lovJd9yBD7tbgCjp++tm5a/BwW5mlAq7YCpGgxwuT7uAeoG1BiAugE1BqBuQK00gIzf80qX61M8CFkGnPYscncEonaBtW5aPveAymejvwVvvZT8px0wqonWOuH5liPQ28TU6/lXOKCRV70XAAAAAAAAAH7mBPdTHjEhiY6HAAAAAElFTkSuQmCC"
              alt="Website"
              class="w-5 h-5"
            />
          </a>
          <a :href="person.x" target="_blank" aria-label="X">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABqklEQVR4nO3a204DMRRD0Q3//8/lqRKqyiQ5sZ0RPZYQLyWJ10yZiwKdTqfT6XQ6/yuP2Q9+Owc/lMfL78usAiwNfiCv6xqucwVgefBw/lrP5TpnAUqDB3O1jq+rP5wFuBrkNEK5PKx9Be6IsFUe1v8J3glhuzzULoN3QJCUhxrAaBI3gqw81AFGk7kQpOVhD2A0qRpBXh72AUaTqxAs5UEDMFrELoKtPOgAwINgLQ9aANAi2MuDHgA0CJHy4AGAPYRYefABQA0hWh68ALCGEC8PfgCYQzhS3j74SyqXQvv6EmfAM6tlIgcnCQDzpWJnZhoAxuWSX8sjADv3AfKkARR3gtIkAZTPArKkAKrXeTtCAmCm/DEEN8DKkT+C4ASonPZxBBfAzr19FMEBoHiwiSGoAZRPdREEJYDjkdaOoAJwPs9bERQAiZcZNoRdgOSbHAvCDsCJ11hyhCrAsXd4g/GXEdT7BFMvM2QI1X2C7xJ9kzOYz7JT9E7lZ+aV7hS9Y/mZ+WU7RStPb8mUEXb2Cd6l/DOxg3R6Z+goj18/H5uPLt/pdDqdzmR+ANVMXk7+0qmEAAAAAElFTQSuQmCC"
              alt="X"
              class="w-5 h-5"
            />
          </a>
        </div>
      </li>
    </template>
  </ul>

  <!-- Modal -->
  <div
    x-show="activePerson"
    x-transition
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
  >
    <div
      class="bg-white rounded-lg shadow-xl max-w-3xl w-full p-6 flex flex-col md:flex-row relative animate-fade-in"
    >
      <button
        @click="activePerson = null"
        class="absolute top-2 right-3 p-1"
        aria-label="Close"
      >
        <img
          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABqklEQVR4nO3a204DMRRD0Q3//8/lqRKqyiQ5sZ0RPZYQLyWJ10yZiwKdTqfT6XQ6/yuP2Q9+Owc/lMfL78usAiwNfiCv6xqucwVgefBw/lrP5TpnAUqDB3O1jq+rP5wFuBrkNEK5PKx9Be6IsFUe1v8J3glhuzzULoN3QJCUhxrAaBI3gqw81AFGk7kQpOVhD2A0qRpBXh72AUaTqxAs5UEDMFrELoKtPOgAwINgLQ9aANAi2MuDHgA0CJHy4AGAPYRYefABQA0hWh68ALCGEC8PfgCYQzhS3j74SyqXQvv6EmfAM6tlIgcnCQDzpWJnZhoAxuWSX8sjADv3AfKkARR3gtIkAZTPArKkAKrXeTtCAmCm/DEEN8DKkT+C4ASonPZxBBfAzr19FMEBoHiwiSGoAZRPdREEJYDjkdaOoAJwPs9bERQAiZcZNoRdgOSbHAvCDsCJ11hyhCrAsXd4g/GXEdT7BFMvM2QI1X2C7xJ9kzOYz7JT9E7lZ+aV7hS9Y/mZ+WU7RStPb8mUEXb2Cd6l/DOxg3R6Z+goj18/H5uPLt/pdDqdzmR+ANVMXk7+0qmEAAAAAElFTQSuQmCC"
          alt="Close"
          class="w-5 h-5"
        />
      </button>

      <!-- Photo and social icons -->
      <div class="flex-shrink-0 flex flex-col items-center">
        <img
          :src="activePerson.image"
          :alt="activePerson.name"
          class="w-72 h-72 rounded-full border border-gray-300 object-cover"
        />
        <div class="flex space-x-3 mt-2">
          <a :href="activePerson.linkedin" target="_blank" aria-label="LinkedIn">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAIAAAAlC+aJAAABuklEQVR4nO2YsUsCURzH36lomIUlWQ4WJBRY3WrQIk1NRiT0J9TcUkFjo1BBY0XSXg0FDi6hjU4lUYYJFWjJgVl2pnfX0GKnCe+y9/Pg9xm/93s/fh/u3jt4HFk5I3rGAD3AX0EBaFAAGhSABgWgQQFoUAAaFIAGBaAx0S4QN2Ysph/ac4eJk2SudSPRofs3gALQ6F6Aw2sVYP7lGG1SE/D2L/Aun9vu6rZIsvJQEKOp/PZFJi2UNM1PL6CZ0b7OvSA/NdRTG3qdNq/TtjQ5uHh0dZB41NCWkYDPbd+dn3BYzQ2fmo2G/SCfLZYjty+0nRntgVW/57fpv+E4sjM7ZuA42s5ttIk9Duu0x0G7ip2AopDN+P1I6LxjPcJvxaJ3+foa/3AvbVt2AmuRm+XT61T+vVyVL7PFQDjx/Papqhkf6KJty0ggLZRCsXRt8lGR4hlBVdZ8nzSEkcBxMifJiip8ehVVic1spO3MSCCZK9aHpYqkSugPIVYCBbFaH0pyCzozEpAV9fdDCFEahbS00X9AGygADQpAgwLQ6F4AbyWgQQFoUAAaFIAGBaBBAWhQABoUgAYFoNG9wBfrTHdNRMi0AAAAAABJRU5ErkJggg=="
              alt="LinkedIn"
              class="w-5 h-5"
            />
          </a>
          <a :href="activePerson.url" target="_blank" aria-label="Website">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAzElEQVR4nO3ZwQ6EIAxFUTX+/y/r2gSxBdqHes92Ql/tgHHGZQEAAAAAAADwJ2vjuiOgpiTf22wtuLe2JN/apCe4NUOSvwWHT7/+aQC94b11wvNrAxgV3lovJd9yBD7tbgCjp++tm5a/BwW5mlAq7YCpGgxwuT7uAeoG1BiAugE1BqBuQK00gIzf80qX61M8CFkGnPYscncEonaBtW5aPveAymejvwVvvZT8px0wqonWOuH5liPQ28TU6/lXOKCRV70XAAAAAAAAAH7mBPdTHjEhiY6HAAAAAElFTkSuQmCC"
              alt="Website"
              class="w-5 h-5"
            />
          </a>
          <a :href="activePerson.x" target="_blank" aria-label="X">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABqklEQVR4nO3a204DMRRD0Q3//8/lqRKqyiQ5sZ0RPZYQLyWJ10yZiwKdTqfT6XQ6/yuP2Q9+Owc/lMfL78usAiwNfiCv6xqucwVgefBw/lrP5TpnAUqDB3O1jq+rP5wFuBrkNEK5PKx9Be6IsFUe1v8J3glhuzzULoN3QJCUhxrAaBI3gqw81AFGk7kQpOVhD2A0qRpBXh72AUaTqxAs5UEDMFrELoKtPOgAwINgLQ9aANAi2MuDHgA0CJHy4AGAPYRYefABQA0hWh68ALCGEC8PfgCYQzhS3j74SyqXQvv6EmfAM6tlIgcnCQDzpWJnZhoAxuWSX8sjADv3AfKkARR3gtIkAZTPArKkAKrXeTtCAmCm/DEEN8DKkT+C4ASonPZxBBfAzr19FMEBoHiwiSGoAZRPdREEJYDjkdaOoAJwPs9bERQAiZcZNoRdgOSbHAvCDsCJ11hyhCrAsXd4g/GXEdT7BFMvM2QI1X2C7xJ9kzOYz7JT9E7lZ+aV7hS9Y/mZ+WU7RStPb8mUEXb2Cd6l/DOxg3R6Z+goj18/H5uPLt/pdDqdzmR+ANVMXk7+0qmEAAAAAElFTQSuQmCC"
              alt="X"
              class="w-5 h-5"
            />
          </a>
        </div>
      </div>

      <!-- Divider -->
      <div class="hidden md:block border-l border-gray-300 h-24 mx-6 self-center"></div>

      <!-- Content -->
      <div class="text-gray-800 text-sm leading-relaxed font-extralight">
        <h3 class="text-xl font-semibold text-gray-900" x-text="activePerson.name"></h3>
        <p class="text-gray-600 mb-2 italic" x-text="activePerson.role"></p>
        <p x-text="activePerson.bio"></p>
      </div>
    </div>
  </div>
</section>




<section x-data="{
  activePerson: null,
  people: [
    {
      name: 'Dr. Danuta Leszczynska ',
      role: 'Professor, Jack State University',
      image: '/assets/img/about/people/dl.png',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Dr. Leszczynska is a leading environmental engineer and researcher whose work spans the broad spectrum of water contamination and remediation. Her expertise encompasses the detection and treatment of contaminants in water, stormwater, wastewater, and soil, with a particular focus on the operational challenges posed by secondary contamination. Dr. Leszczynska develops advanced techniques and mechanisms to enhance the removal of organic and metallic pollutants, and they are a pioneer in emerging water and soil treatment technologies such as constructed wetlands, phytoremediation, and photodegradation. Beyond traditional remediation approaches, their research explores the applications of magnetic fields in bioscience and biotechnology, investigates quantum cluster processes involved in degrading explosive compounds on model clay surfaces, and assesses the impact of nanomaterials in drinking water. Through this multifaceted research portfolio, Dr. Leszczynska aims to advance sustainable treatment solutions and safeguard public health and environmental quality.'
    },
    {
      name: 'Alex Rivera',
      role: 'Director of Engineering',
      image: '/assets/img/about/people/ed.png',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Alex Rivera has a deep background in civil and mechanical engineering. He oversees all technical project execution across our commercial portfolios and turns theory into high-performance water systems.'
    },
    {
      name: 'Dr. Oliver Jones',
      role: 'Source Energy Global',
      image: '/assets/img/about/people/dr_o_j.jpg',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Dr. Oliver Jones is at the forefront of innovative energy solutions. His leadership in the development of the SourceEnergy Battery System, featuring graphene/graphite-based carbon nanotubes covered by gold, exemplifies his commitment to sustainable, high-performance energy technologies. This technology promises to revolutionize energy storage, distribution, and management, aligning with global sustainability goals.'
    },
    {
      name: 'Jeff Chalfin',
      role: 'Flow Dyanmics LLC',
      image: '/assets/img/about/people/jc_fd.jpg',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Jordan Ellis bridges fieldwork and business strategy to ensure flawless operational execution. With a logistics background and a sharp eye for process efficiency, he keeps timelines and teams aligned.'
    },
    {
      name: 'Marc Freedman',
      role: 'Expense to Profit',
      image: '/assets/img/about/people/m_f.png',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Marc Freedman leads our consumption and flow benchmarking division. With a data science background, Taylor finds actionable insights in water use patterns to deliver measurable efficiency gains.'
    },
    {
      name: 'Ben Lapscher',
      role: 'Expense Reduction Coaching (ERC)',
      image: '/assets/img/about/people/bl_erc.jpg',
      linkedin: '#',
      url: '#',
      x: '#',
      bio: 'Morgan Lee is responsible for orchestrating technical delivery across engineering, installation, and monitoring. Her cross-disciplinary project management background ensures strong outcomes across all departments.'
    }
  ]
}">
  <h2 class="text-2xl font-semibold mb-4 text-gray-900">Backed by Proven Industry Leaders</h2>
  </p> <span class="text-blue-600 font-semibold">Water Solutions Technology</span> is supported by a distinguished network of 
      <a href="#" class="text-blue-500 underline hover:text-blue-700">strategic advisors</a> who bring decades of hands-on experience 
      in engineering, finance, policy, and innovation. Their contributions help us remain ahead of the curve in delivering smart water and sustainability solutions.
    </p>

  <ul class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <template x-for="(person, index) in people" :key="index">
      <li class="text-center cursor-pointer" @click="activePerson = person">
        <!-- Enlarged photo -->
        <img
          :src="person.image"
          :alt="person.name"
          class="rounded-full w-72 h-72 mx-auto mb-2 border border-gray-300 object-cover"
        />
        <!-- Name & role -->
        <p class="font-semibold text-gray-900" x-text="person.name"></p>
        <p class="text-sm text-gray-600" x-text="person.role"></p>
        <!-- Icons below the role -->
        <div class="flex justify-center space-x-3 mt-1">
          <a :href="person.linkedin" target="_blank" aria-label="LinkedIn">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAIAAAAlC+aJAAABuklEQVR4nO2YsUsCURzH36lomIUlWQ4WJBRY3WrQIk1NRiT0J9TcUkFjo1BBY0XSXg0FDi6hjU4lUYYJFWjJgVl2pnfX0GKnCe+y9/Pg9xm/93s/fh/u3jt4HFk5I3rGAD3AX0EBaFAAGhSABgWgQQFoUAAaFIAGBaAx0S4QN2Ysph/ac4eJk2SudSPRofs3gALQ6F6Aw2sVYP7lGG1SE/D2L/Aun9vu6rZIsvJQEKOp/PZFJi2UNM1PL6CZ0b7OvSA/NdRTG3qdNq/TtjQ5uHh0dZB41NCWkYDPbd+dn3BYzQ2fmo2G/SCfLZYjty+0nRntgVW/57fpv+E4sjM7ZuA42s5ttIk9Duu0x0G7ip2AopDN+P1I6LxjPcJvxaJ3+foa/3AvbVt2AmuRm+XT61T+vVyVL7PFQDjx/Papqhkf6KJty0ggLZRCsXRt8lGR4hlBVdZ8nzSEkcBxMifJiip8ehVVic1spO3MSCCZK9aHpYqkSugPIVYCBbFaH0pyCzozEpAV9fdDCFEahbS00X9AGygADQpAgwLQ6F4AbyWgQQFoUAAaFIAGBaBBAWhQABoUgAYFoNG9wBfrTHdNRMi0AAAAAABJRU5ErkJggg=="
              alt="LinkedIn"
              class="w-5 h-5"
            />
          </a>
          <a :href="person.url" target="_blank" aria-label="Website">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAzElEQVR4nO3ZwQ6EIAxFUTX+/y/r2gSxBdqHes92Ql/tgHHGZQEAAAAAAADwJ2vjuiOgpiTf22wtuLe2JN/apCe4NUOSvwWHT7/+aQC94b11wvNrAxgV3lovJd9yBD7tbgCjp++tm5a/BwW5mlAq7YCpGgxwuT7uAeoG1BiAugE1BqBuQK00gIzf80qX61M8CFkGnPYscncEonaBtW5aPveAymejvwVvvZT8px0wqonWOuH5liPQ28TU6/lXOKCRV70XAAAAAAAAAH7mBPdTHjEhiY6HAAAAAElFTkSuQmCC"
              alt="Website"
              class="w-5 h-5"
            />
          </a>
          <a :href="person.x" target="_blank" aria-label="X">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABqklEQVR4nO3a204DMRRD0Q3//8/lqRKqyiQ5sZ0RPZYQLyWJ10yZiwKdTqfT6XQ6/yuP2Q9+Owc/lMfL78usAiwNfiCv6xqucwVgefBw/lrP5TpnAUqDB3O1jq+rP5wFuBrkNEK5PKx9Be6IsFUe1v8J3glhuzzULoN3QJCUhxrAaBI3gqw81AFGk7kQpOVhD2A0qRpBXh72AUaTqxAs5UEDMFrELoKtPOgAwINgLQ9aANAi2MuDHgA0CJHy4AGAPYRYefABQA0hWh68ALCGEC8PfgCYQzhS3j74SyqXQvv6EmfAM6tlIgcnCQDzpWJnZhoAxuWSX8sjADv3AfKkARR3gtIkAZTPArKkAKrXeTtCAmCm/DEEN8DKkT+C4ASonPZxBBfAzr19FMEBoHiwiSGoAZRPdREEJYDjkdaOoAJwPs9bERQAiZcZNoRdgOSbHAvCDsCJ11hyhCrAsXd4g/GXEdT7BFMvM2QI1X2C7xJ9kzOYz7JT9E7lZ+aV7hS9Y/mZ+WU7RStPb8mUEXb2Cd6l/DOxg3R6Z+goj18/H5uPLt/pdDqdzmR+ANVMXk7+0qmEAAAAAElFTQSuQmCC"
              alt="X"
              class="w-5 h-5"
            />
          </a>
        </div>
      </li>
    </template>
  </ul>

  <!-- Modal -->
  <div
    x-show="activePerson"
    x-transition
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
  >
    <div
      class="bg-white rounded-lg shadow-xl max-w-3xl w-full p-6 flex flex-col md:flex-row relative animate-fade-in"
    >
      <button
        @click="activePerson = null"
        class="absolute top-2 right-3 p-1"
        aria-label="Close"
      >
        <img
          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABqklEQVR4nO3a204DMRRD0Q3//8/lqRKqyiQ5sZ0RPZYQLyWJ10yZiwKdTqfT6XQ6/yuP2Q9+Owc/lMfL78usAiwNfiCv6xqucwVgefBw/lrP5TpnAUqDB3O1jq+rP5wFuBrkNEK5PKx9Be6IsFUe1v8J3glhuzzULoN3QJCUhxrAaBI3gqw81AFGk7kQpOVhD2A0qRpBXh72AUaTqxAs5UEDMFrELoKtPOgAwINgLQ9aANAi2MuDHgA0CJHy4AGAPYRYefABQA0hWh68ALCGEC8PfgCYQzhS3j74SyqXQvv6EmfAM6tlIgcnCQDzpWJnZhoAxuWSX8sjADv3AfKkARR3gtIkAZTPArKkAKrXeTtCAmCm/DEEN8DKkT+C4ASonPZxBBfAzr19FMEBoHiwiSGoAZRPdREEJYDjkdaOoAJwPs9bERQAiZcZNoRdgOSbHAvCDsCJ11hyhCrAsXd4g/GXEdT7BFMvM2QI1X2C7xJ9kzOYz7JT9E7lZ+aV7hS9Y/mZ+WU7RStPb8mUEXb2Cd6l/DOxg3R6Z+goj18/H5uPLt/pdDqdzmR+ANVMXk7+0qmEAAAAAElFTQSuQmCC"
          alt="Close"
          class="w-5 h-5"
        />
      </button>

      <!-- Photo and social icons -->
      <div class="flex-shrink-0 flex flex-col items-center">
        <img
          :src="activePerson.image"
          :alt="activePerson.name"
          class="w-72 h-72 rounded-full border border-gray-300 object-cover"
        />
        <div class="flex space-x-3 mt-2">
          <a :href="activePerson.linkedin" target="_blank" aria-label="LinkedIn">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAIAAAAlC+aJAAABuklEQVR4nO2YsUsCURzH36lomIUlWQ4WJBRY3WrQIk1NRiT0J9TcUkFjo1BBY0XSXg0FDi6hjU4lUYYJFWjJgVl2pnfX0GKnCe+y9/Pg9xm/93s/fh/u3jt4HFk5I3rGAD3AX0EBaFAAGhSABgWgQQFoUAAaFIAGBaAx0S4QN2Ysph/ac4eJk2SudSPRofs3gALQ6F6Aw2sVYP7lGG1SE/D2L/Aun9vu6rZIsvJQEKOp/PZFJi2UNM1PL6CZ0b7OvSA/NdRTG3qdNq/TtjQ5uHh0dZB41NCWkYDPbd+dn3BYzQ2fmo2G/SCfLZYjty+0nRntgVW/57fpv+E4sjM7ZuA42s5ttIk9Duu0x0G7ip2AopDN+P1I6LxjPcJvxaJ3+foa/3AvbVt2AmuRm+XT61T+vVyVL7PFQDjx/Papqhkf6KJty0ggLZRCsXRt8lGR4hlBVdZ8nzSEkcBxMifJiip8ehVVic1spO3MSCCZK9aHpYqkSugPIVYCBbFaH0pyCzozEpAV9fdDCFEahbS00X9AGygADQpAgwLQ6F4AbyWgQQFoUAAaFIAGBaBBAWhQABoUgAYFoNG9wBfrTHdNRMi0AAAAAABJRU5ErkJggg=="
              alt="LinkedIn"
              class="w-5 h-5"
            />
          </a>
          <a :href="activePerson.url" target="_blank" aria-label="Website">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAzElEQVR4nO3ZwQ6EIAxFUTX+/y/r2gSxBdqHes92Ql/tgHHGZQEAAAAAAADwJ2vjuiOgpiTf22wtuLe2JN/apCe4NUOSvwWHT7/+aQC94b11wvNrAxgV3lovJd9yBD7tbgCjp++tm5a/BwW5mlAq7YCpGgxwuT7uAeoG1BiAugE1BqBuQK00gIzf80qX61M8CFkGnPYscncEonaBtW5aPveAymejvwVvvZT8px0wqonWOuH5liPQ28TU6/lXOKCRV70XAAAAAAAAAH7mBPdTHjEhiY6HAAAAAElFTkSuQmCC"
              alt="Website"
              class="w-5 h-5"
            />
          </a>
          <a :href="activePerson.x" target="_blank" aria-label="X">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABqklEQVR4nO3a204DMRRD0Q3//8/lqRKqyiQ5sZ0RPZYQLyWJ10yZiwKdTqfT6XQ6/yuP2Q9+Owc/lMfL78usAiwNfiCv6xqucwVgefBw/lrP5TpnAUqDB3O1jq+rP5wFuBrkNEK5PKx9Be6IsFUe1v8J3glhuzzULoN3QJCUhxrAaBI3gqw81AFGk7kQpOVhD2A0qRpBXh72AUaTqxAs5UEDMFrELoKtPOgAwINgLQ9aANAi2MuDHgA0CJHy4AGAPYRYefABQA0hWh68ALCGEC8PfgCYQzhS3j74SyqXQvv6EmfAM6tlIgcnCQDzpWJnZhoAxuWSX8sjADv3AfKkARR3gtIkAZTPArKkAKrXeTtCAmCm/DEEN8DKkT+C4ASonPZxBBfAzr19FMEBoHiwiSGoAZRPdREEJYDjkdaOoAJwPs9bERQAiZcZNoRdgOSbHAvCDsCJ11hyhCrAsXd4g/GXEdT7BFMvM2QI1X2C7xJ9kzOYz7JT9E7lZ+aV7hS9Y/mZ+WU7RStPb8mUEXb2Cd6l/DOxg3R6Z+goj18/H5uPLt/pdDqdzmR+ANVMXk7+0qmEAAAAAElFTQSuQmCC"
              alt="X"
              class="w-5 h-5"
            />
          </a>
        </div>
      </div>

      <!-- Divider -->
      <div class="hidden md:block border-l border-gray-300 h-24 mx-6 self-center"></div>

      <!-- Content -->
      <div class="text-gray-800 text-sm leading-relaxed font-extralight">
        <h3 class="text-xl font-semibold text-gray-900" x-text="activePerson.name"></h3>
        <p class="text-gray-600 mb-2 italic" x-text="activePerson.role"></p>
        <p x-text="activePerson.bio"></p>
      </div>
    </div>
  </div>
</section>

<section class="bg-white py-20 text-gray-900">
  <div class="max-w-6xl mx-auto px-6">
    <!-- Header -->
    <div class="mb-12">
      <p class="text-xs tracking-[0.2em] text-gray-500 uppercase">Our Values</p>
      <h2 class="mt-2 text-3xl md:text-4xl font-semibold tracking-tight">Some of Our Core Shared Values</h2>
      <p class="mt-4 text-gray-600 max-w-3xl">
        Principles that guide how we build, serve, and lead—inside our teams and with every client we support.
      </p>
    </div>

    <!-- Premium grid (no bullets, no icons) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Card -->
      <article class="group relative rounded-2xl border border-gray-200 p-6 hover:shadow-xl transition-shadow">
        <div class="h-1 w-12 bg-gray-900 rounded-full mb-5"></div>
        <h3 class="text-lg md:text-xl font-semibold tracking-tight">We Believe in YHVH</h3>
        <p class="mt-2 text-[15px] leading-relaxed text-gray-700">
          We believe in the one true Almighty who designed you with purpose—and when you walk in His ways, success follows.
        </p>
      </article>

      <article class="group relative rounded-2xl border border-gray-200 p-6 hover:shadow-xl transition-shadow">
        <div class="h-1 w-12 bg-gray-900 rounded-full mb-5"></div>
        <h3 class="text-lg md:text-xl font-semibold tracking-tight">Remember Others</h3>
        <p class="mt-2 text-[15px] leading-relaxed text-gray-700">
          We thrive best when we show kindness, empathy, and support for others.
        </p>
      </article>

      <article class="group relative rounded-2xl border border-gray-200 p-6 hover:shadow-xl transition-shadow">
        <div class="h-1 w-12 bg-gray-900 rounded-full mb-5"></div>
        <h3 class="text-lg md:text-xl font-semibold tracking-tight">Keep Growing</h3>
        <p class="mt-2 text-[15px] leading-relaxed text-gray-700">
          Be courageous. Make mistakes. Stay curious. Growth is an endless pursuit.
        </p>
      </article>

      <article class="group relative rounded-2xl border border-gray-200 p-6 hover:shadow-xl transition-shadow">
        <div class="h-1 w-12 bg-gray-900 rounded-full mb-5"></div>
        <h3 class="text-lg md:text-xl font-semibold tracking-tight">Speak the Truth</h3>
        <p class="mt-2 text-[15px] leading-relaxed text-gray-700">
          Honesty, candor, and clarity help us improve, trust more, and grow together.
        </p>
      </article>

      <article class="group relative rounded-2xl border border-gray-200 p-6 hover:shadow-xl transition-shadow">
        <div class="h-1 w-12 bg-gray-900 rounded-full mb-5"></div>
        <h3 class="text-lg md:text-xl font-semibold tracking-tight">Be a Team Player</h3>
        <p class="mt-2 text-[15px] leading-relaxed text-gray-700">
          Collaboration brings the most value—learning, solving, and achieving more together.
        </p>
      </article>

      <article class="group relative rounded-2xl border border-gray-200 p-6 hover:shadow-xl transition-shadow">
        <div class="h-1 w-12 bg-gray-900 rounded-full mb-5"></div>
        <h3 class="text-lg md:text-xl font-semibold tracking-tight">Client Priority</h3>
        <p class="mt-2 text-[15px] leading-relaxed text-gray-700">
          Transparency and excellence in service are how we grow alongside our clients.
        </p>
      </article>
    </div>

    <!-- Optional subtle CTA -->
    <div class="mt-12 rounded-xl bg-gray-50 border border-gray-200 p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
      <div>
        <p class="text-xs tracking-[0.2em] text-gray-500 uppercase">How We Show Up</p>
        <p class="text-gray-800 mt-1">These values shape decisions, partnerships, and outcomes across every engagement.</p>
      </div>
      <a href="/about" class="inline-block px-6 py-3 rounded-lg bg-gray-900 text-white text-sm font-medium hover:bg-gray-700 transition-colors">
        Learn More
      </a>
    </div>
  </div>
</section>

  <section class="bg-white py-20">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
    
    <!-- Left Column: Content -->
    <div>
      <h2 class="text-3xl font-light mb-5 text-gray-900 tracking-wide">Why It Matters</h2>
      <p class="text-gray-600 leading-relaxed text-[15px] font-light">
        Water is one of the most undervalued and mismanaged resources in the built environment. 
        With the right strategy, it becomes a key driver of NOI, ESG performance, and operational resilience. 
        That’s why we exist.
      </p>
    </div>

    <!-- Right Column: CTA -->
    <div class="flex md:justify-end justify-center">
      <a href="/contact" 
         class="inline-block bg-gray-900 hover:bg-gray-800 text-white px-8 py-3 rounded-md shadow-sm text-sm font-light tracking-wide transition-all duration-200">
        Start a Conversation
      </a>
    </div>

  </div>
</section>
@endsection 

@push('scripts')
  <script src="/assets/js/about.js"></script>
@endpush