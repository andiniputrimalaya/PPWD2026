// ========== 0. DARK MODE TOGGLE ==========
const themeToggle = document.getElementById('theme-toggle');
const rootEl = document.documentElement;

function getSavedTheme() {
  try {
    return localStorage.getItem('portfolio-theme');
  } catch (e) {
    return null; // localStorage bisa gagal kalau dibuka langsung dari file:// di beberapa browser
  }
}

function saveTheme(theme) {
  try {
    localStorage.setItem('portfolio-theme', theme);
  } catch (e) {
    // abaikan kalau localStorage tidak tersedia, toggle tetap jalan untuk sesi ini
  }
}

function applyTheme(theme) {
  rootEl.setAttribute('data-theme', theme);
  if (themeToggle) themeToggle.textContent = theme === 'dark' ? '☀️' : '🌙';
  saveTheme(theme);
}

applyTheme(getSavedTheme() || 'light');

if (themeToggle) {
  themeToggle.addEventListener('click', () => {
    const isDark = rootEl.getAttribute('data-theme') === 'dark';
    applyTheme(isDark ? 'light' : 'dark');
  });
}

// ========== 1. TYPING EFFECT ==========
const typingText = document.getElementById('typing-text');

if (typingText) {
  const names = ['Andini Putri Malaya', 'Web Developer', 'Mahasiswa SI'];
  let nameIndex = 0;
  let charIndex = 0;
  let isDeleting = false;

  function typeEffect() {
    const currentName = names[nameIndex];

    if (isDeleting) {
      typingText.textContent = currentName.substring(0, charIndex - 1);
      charIndex--;
    } else {
      typingText.textContent = currentName.substring(0, charIndex + 1);
      charIndex++;
    }

    let delay = isDeleting ? 50 : 100;

    if (!isDeleting && charIndex === currentName.length) {
      delay = 2000; // Jeda saat teks selesai diketik
      isDeleting = true;
    } else if (isDeleting && charIndex === 0) {
      isDeleting = false;
      nameIndex = (nameIndex + 1) % names.length;
      delay = 500; // Jeda sebelum mengetik kata baru
    }

    setTimeout(typeEffect, delay);
  }

  typeEffect(); // Mulai efek
}

// ========== 2. GENERATE PROJECT CARDS ==========
const projectGrid = document.getElementById('project-grid');

if (projectGrid) {
  const projects = [
    {
      title: 'Website Profil',
      desc: 'Website profil pribadi dengan HTML & CSS',
      image: 'images/layaimut.jpeg',
      color: 'linear-gradient(135deg, #f472b6, #ec4899)',
      link: 'profil-saya.html'
    },
    {
      title: 'Kalkulator JS',
      desc: 'Kalkulator sederhana dengan JavaScript',
      image: 'images/kalkulator.jpg',
      color: 'linear-gradient(135deg, #60a5fa, #3b82f6)',
      link: 'kalkulator.html'
    },
    {
      title: 'Form Interaktif',
      desc: 'Form kontak dengan validasi JavaScript',
      image: 'images/form.jpg',
      color: 'linear-gradient(135deg, #f9a8d4, #ec4899)',
      link: 'contact.html'
    }
  ];

  projects.forEach(project => {
    const card = document.createElement('div');
    card.className = 'project-card';
    card.innerHTML = `
      <div class="project-thumb" style="background:${project.color}">
        <img src="${project.image}" alt="${project.title}">
      </div>
      <h3>${project.title}</h3>
      <p>${project.desc}</p>
    `;
    card.addEventListener('click', () => {
      window.location.href = project.link;
    });
    projectGrid.appendChild(card);
  });
}

// ========== 3. CONTACT FORM VALIDATION ==========
const contactForm = document.getElementById('contact-form');

if (contactForm) {
  const fields = {
    name: { el: document.getElementById('name'), error: document.getElementById('name-error') },
    email: { el: document.getElementById('email'), error: document.getElementById('email-error') },
    message: { el: document.getElementById('message'), error: document.getElementById('message-error') }
  };
  const successBox = document.getElementById('form-success');

  function setError(field, message) {
    field.el.closest('.form-group').classList.add('error');
    field.error.textContent = message;
  }

  function clearError(field) {
    field.el.closest('.form-group').classList.remove('error');
    field.error.textContent = '';
  }

  function validateName() {
    const value = fields.name.el.value.trim();
    if (value.length < 3) {
      setError(fields.name, 'Nama minimal 3 karakter.');
      return false;
    }
    clearError(fields.name);
    return true;
  }

  function validateEmail() {
    const value = fields.email.el.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(value)) {
      setError(fields.email, 'Format email tidak valid.');
      return false;
    }
    clearError(fields.email);
    return true;
  }

  function validateMessage() {
    const value = fields.message.el.value.trim();
    if (value.length < 10) {
      setError(fields.message, 'Pesan minimal 10 karakter.');
      return false;
    }
    clearError(fields.message);
    return true;
  }

  fields.name.el.addEventListener('input', validateName);
  fields.email.el.addEventListener('input', validateEmail);
  fields.message.el.addEventListener('input', validateMessage);

  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    successBox.classList.remove('show');

    const isNameValid = validateName();
    const isEmailValid = validateEmail();
    const isMessageValid = validateMessage();

    if (isNameValid && isEmailValid && isMessageValid) {
      successBox.textContent = `Terima kasih, ${fields.name.el.value.trim()}! Pesan kamu sudah terkirim.`;
      successBox.classList.add('show');
      contactForm.reset();
    }
  });
}