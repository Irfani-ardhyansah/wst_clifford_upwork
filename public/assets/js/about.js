
    async function fetchLiveStats() {
      const response = await fetch('/api/stats');
      const data = await response.json();
      const options = { duration: 3 };
      const gallons = new countUp.CountUp('gallonsSaved', data.gallonsSaved, options);
      const projects = new countUp.CountUp('projectsDelivered', data.projectsDelivered, options);
      const co2 = new countUp.CountUp('co2Reduced', data.co2Reduced, options);
      const blueChip = new countUp.CountUp('blueChipClients', data.blueChipClients, options);
      if (!gallons.error) gallons.start();
      if (!projects.error) projects.start();
      if (!co2.error) co2.start();
      if (!blueChip.error) blueChip.start();
    }
    fetchLiveStats();

    document.addEventListener("DOMContentLoaded", function() {
      const counters = document.querySelectorAll(".count-up");
      counters.forEach(counter => {
        const target = parseInt(counter.getAttribute("data-target"), 10) || 0;
        const duration = 6000;
        const frameRate = 30;
        const totalFrames = Math.round(duration / (1000 / frameRate));
        let frame = 0;
        const countUp = () => {
          frame++;
          const progress = frame / totalFrames;
          const current = Math.round(target * progress);
          counter.innerText = current.toLocaleString();
          if (frame < totalFrames) {
            requestAnimationFrame(countUp);
          } else {
            counter.innerText = target.toLocaleString();
          }
        };
        requestAnimationFrame(countUp);
      });
    });
