const countdown = document.getElementById('countdown');
const targetDate = new Date('2025-06-07T00:00:00');

function updateCountdown() {
  const now = new Date();
  const diff = targetDate - now;

  if (diff <= 0) {
    countdown.textContent = "The event has started!";
    return;
  }

  const days = Math.floor(diff / (1000 * 60 * 60 * 24));
  const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
  const minutes = Math.floor((diff / (1000 * 60)) % 60);
  const seconds = Math.floor((diff / 1000) % 60);

  countdown.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
}

setInterval(updateCountdown, 1000);
updateCountdown();





document.addEventListener("scroll", () => {
  const scrollTop = window.scrollY;

  // Apply parallax effect to each decorative image
  document.querySelectorAll(".decorative").forEach((image, index) => {
    // Adjust parallax speed for each image
    const speed = (index + 1) * 0.2; // Customize speeds here
    const movement = scrollTop * speed;

    // Apply transform only to X-axis within the 25% boundary
    const positionX = image.classList.contains('flower-1') ||
                      image.classList.contains('flower-3') || 
                      image.classList.contains('flower-5')
                      ? -movement // Move left-side elements left
                      : movement; // Move right-side elements right

    image.style.transform = `translateY(${movement}px) translateX(${positionX}px)`;
  });
});