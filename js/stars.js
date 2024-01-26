document.addEventListener("DOMContentLoaded", function () {
  const canvas = document.getElementById("starCanvas");
  const ctx = canvas.getContext("2d");

  let w, h;
  const setCanvasExtents = () => {
    w = document.body.clientWidth;
    h = document.body.clientHeight;
    canvas.width = w;
    canvas.height = h;
  };

  setCanvasExtents();
  window.onresize = setCanvasExtents;

  class Star {
    constructor() {
      this.x = Math.random() * w;
      this.y = Math.random() * h;
      this.radius = Math.random() * 1.5;
      this.color = "white";
      this.vx = (Math.random() - 0.5) * 0.1;
      this.vy = (Math.random() - 0.5) * 0.1;
      this.opacity = 0.5;
      this.opacityChange = 0.005; // Vitesse de changement d'opacité
    }

    draw() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
      ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`; // Utilisation de l'opacité
      ctx.fill();
    }

    update() {
      this.x += this.vx;
      this.y += this.vy;
      if (this.x < 0 || this.x > w) this.vx = -this.vx;
      if (this.y < 0 || this.y > h) this.vy = -this.vy;

      // Mise à jour de l'opacité
      this.opacity += this.opacityChange;
      if (this.opacity <= 0.5 || this.opacity >= 1) {
        this.opacityChange = -this.opacityChange;
      }
    }
  }

  const stars = [];
  for (let i = 0; i < 100; i++) {
    stars.push(new Star());
  }

  function animate() {
    ctx.clearRect(0, 0, w, h);
    stars.forEach((star) => {
      star.draw();
      star.update();
    });
    requestAnimationFrame(animate);
  }

  animate();
});
