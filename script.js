const menuButton = document.querySelector('.menu-button');
const nav = document.querySelector('nav');
menuButton?.addEventListener('click', () => {
  const open = menuButton.getAttribute('aria-expanded') === 'true';
  menuButton.setAttribute('aria-expanded', String(!open));
  nav.classList.toggle('open', !open);
});

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => { if (entry.isIntersecting) entry.target.classList.add('visible'); });
}, { threshold: 0.12 });
document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));

const slides = document.querySelectorAll('.hero-slide');
const slideLabel = document.querySelector('.current-slide');
let currentSlide = 0;
if (slides.length) {
  setInterval(() => {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('active');
    if (slideLabel) slideLabel.textContent = String(currentSlide + 1).padStart(2, '0');
  }, 5000);
}

const eventSelect = document.getElementById('event-select');
const registrationForm = document.querySelector('[data-registration-form]');
const formStatus = document.querySelector('[data-form-status]');

const eventDetails = {
  'box-cricket': { name: 'ARISE INDOOR BOX CRICKET TOURNAMENT', price: '₹4,500', date: '26/07/2026' },
  'football': { name: 'ARISE FOOTBALL CHAMPIONSHIP (5-A-SIDE)', price: '₹2,999', date: '09/08/2026' },
  'showdown': { name: '1V1 SHOWDOWN', price: '₹99', date: '09/08/2026' }
};

// Neon/PG endpoint (set this to your deployed server URL, e.g. https://your-api-domain.com)
// This repo defaults to the local server URL.
const NEON_API_BASE_URL = 'http://localhost:3000';


const setStatus = (message, type = '') => {
  if (!formStatus) return;
  formStatus.textContent = message;
  formStatus.className = `form-status${type ? ` ${type}` : ''}`;
};

if (registrationForm) {
  registrationForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(registrationForm);
    const name = formData.get('name')?.toString().trim() || 'Unknown';
    const email = formData.get('email')?.toString().trim() || '';
    const team = formData.get('team')?.toString().trim() || 'Unknown';
    const captain = formData.get('captain')?.toString().trim() || 'Unknown';
    const instagram = formData.get('instagram')?.toString().trim() || '';
    const selectedEvent = eventDetails[eventSelect?.value] || { name: 'Not selected', price: 'TBD', date: 'TBD' };
    const captainPhoto = formData.get('captain_photo')?.name || 'No file selected';
    const paymentScreenshot = formData.get('payment_screenshot')?.name || 'No file selected';

    const payload = {
      timestamp: new Date().toISOString(),
      name,
      email,
      team,
      captain,
      instagram,
      event: selectedEvent.name,
      eventDate: selectedEvent.date,
      fee: selectedEvent.price,
      captainPhoto,
      paymentScreenshot
    };

    const subject = encodeURIComponent(`New team registration - ${selectedEvent.name}`);
    const body = encodeURIComponent(
      `Name: ${name}\nEmail: ${email}\nTeam Name: ${team}\nCaptain: ${captain}\nInstagram: ${instagram}\nEvent: ${selectedEvent.name}\nDate: ${selectedEvent.date}\nFee: ${selectedEvent.price || 'TBD'}`
    );

    try {
      const endpoint = `${NEON_API_BASE_URL}/api/registrations`;
      await fetch(endpoint, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });
      setStatus('Registration saved successfully. We will contact you shortly.', 'success');
    } catch (error) {
      setStatus('The registration could not be saved automatically. Please check the connection.', 'error');
    } finally {
      window.location.href = `mailto:arisesportsbtg@gmail.com?subject=${subject}&body=${body}`;
    }
  });
}
