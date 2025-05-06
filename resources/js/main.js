// Function untuk menangani toggle FAQ
document.addEventListener("DOMContentLoaded", function () {
  const faqItems = document.querySelectorAll(".faq-item");

  faqItems.forEach((item) => {
    const question = item.querySelector(".faq-question");

    question.addEventListener("click", function () {
      // Toggle active class pada item yang diklik
      item.classList.toggle("active");

      // Close semua FAQ lain
      faqItems.forEach((otherItem) => {
        if (otherItem !== item && otherItem.classList.contains("active")) {
          otherItem.classList.remove("active");
        }
      });
    });
  });

  // Tambahkan menu toggle untuk mobile
  const navbar = document.querySelector(".navbar");
  const navLinks = document.querySelector(".nav-links");

  // Buat toggle button
  const toggleBtn = document.createElement("button");
  toggleBtn.classList.add("menu-toggle");
  toggleBtn.innerHTML = '<i class="uil uil-bars"></i>';
  toggleBtn.style.display = "none";

  navbar.insertBefore(toggleBtn, navLinks);

  // Fungsi untuk mengatur tampilan berdasarkan ukuran layar
  function checkScreenSize() {
    if (window.innerWidth <= 768) {
      toggleBtn.style.display = "block";
      navLinks.style.display = "none";
      navLinks.style.marginTop = "1rem";
    } else {
      toggleBtn.style.display = "none";
      navLinks.style.display = "flex";
    }
  }

  // Jalankan saat halaman dimuat
  checkScreenSize();

  // Jalankan ketika ukuran layar berubah
  window.addEventListener("resize", checkScreenSize);

  // Toggle menu saat tombol diklik
  toggleBtn.addEventListener("click", function () {
    if (navLinks.style.display === "none") {
      navLinks.style.display = "flex";
      navLinks.style.flexDirection = "column";
      toggleBtn.innerHTML = '<i class="uil uil-times"></i>';
    } else {
      navLinks.style.display = "none";
      toggleBtn.innerHTML = '<i class="uil uil-bars"></i>';
    }
  });

  // Tambahkan style untuk menu toggle
  const style = document.createElement("style");
  style.textContent = `
      .menu-toggle {
        background: transparent;
        border: none;
        font-size: 24px;
        cursor: pointer;
        display: none;
      }
      
      @media (max-width: 768px) {
        .menu-toggle {
          display: block;
          align-self: flex-end;
        }
      }
    `;
  document.head.appendChild(style);
});

// Animasi sederhana saat scroll
window.addEventListener("scroll", function () {
  const projectBoxes = document.querySelectorAll(".project-box");
  const scrollPosition = window.scrollY + window.innerHeight * 0.8;

  projectBoxes.forEach((box) => {
    const boxTop = box.getBoundingClientRect().top + window.scrollY;

    if (scrollPosition > boxTop) {
      box.style.opacity = "1";
      box.style.transform = "translateY(0)";
    }
  });
});

// Tambahkan animasi awal ke project-box
document.addEventListener("DOMContentLoaded", function () {
  const style = document.createElement("style");
  style.textContent = `
      .project-box {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s, transform 0.5s;
      }
    `;
  document.head.appendChild(style);
});

// Sidebar toggle functionality
document.addEventListener("DOMContentLoaded", function () {
  const toggleSidebar = document.getElementById("toggle-sidebar");
  const closeSidebar = document.getElementById("close-sidebar");
  const sidebar = document.getElementById("sidebar");

  toggleSidebar.addEventListener("click", function () {
    sidebar.classList.toggle("active");
  });

  closeSidebar.addEventListener("click", function () {
    sidebar.classList.remove("active");
  });

  // Close sidebar when clicking outside on mobile
  document.addEventListener("click", function (event) {
    if (window.innerWidth <= 992) {
      const isClickInsideSidebar = sidebar.contains(event.target);
      const isClickOnToggle = toggleSidebar.contains(event.target);

      if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains("active")) {
        sidebar.classList.remove("active");
      }
    }
  });

  // Adjust sidebar visibility on window resize
  window.addEventListener("resize", function () {
    if (window.innerWidth > 992) {
      sidebar.classList.remove("active");
    }
  });
});

// Image preview functionality
function previewImage(input) {
  const preview = document.getElementById("preview");
  const imagePreview = document.getElementById("imagePreview");

  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      preview.src = e.target.result;
      imagePreview.style.display = "block";
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function togglePassword() {
  var passwordField = document.getElementById("password");
  var toggleIcon = document.querySelector(".toggle-password");

  // Cek tipe input, dan ubah menjadi text atau password
  if (passwordField.type === "password") {
    passwordField.type = "text";
    toggleIcon.textContent = "🙈"; // Ganti ikon saat password terlihat
  } else {
    passwordField.type = "password";
    toggleIcon.textContent = "👁️"; // Ganti ikon saat password disembunyikan
  }
}

// Tambahkan kode ini ke file JavaScript Anda (main.js)

// Fungsi untuk menangani menu navigasi aktif
document.addEventListener("DOMContentLoaded", function () {
  // Mendapatkan semua link navigasi
  const navLinks = document.querySelectorAll(".nav-link");

  // Pertama, periksa apakah ada link aktif yang tersimpan di localStorage
  const activeNavLink = localStorage.getItem("activeNavLink");

  // Jika ada, terapkan class active ke link tersebut
  if (activeNavLink) {
    navLinks.forEach((link) => {
      // Menggunakan data-route untuk identifikasi (tambahkan atribut ini ke HTML Anda)
      if (link.getAttribute("data-route") === activeNavLink) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    });
  } else {
    // Jika tidak ada, set Dashboard sebagai default aktif
    if (navLinks.length > 0) {
      navLinks[0].classList.add("active");
      localStorage.setItem("activeNavLink", navLinks[0].getAttribute("data-route"));
    }
  }

  // Menambahkan event listener untuk setiap link navigasi
  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      // Hapus class active dari semua link
      navLinks.forEach((item) => {
        item.classList.remove("active");
      });

      // Tambahkan class active ke link yang diklik
      this.classList.add("active");

      // Simpan status aktif di localStorage
      localStorage.setItem("activeNavLink", this.getAttribute("data-route"));
    });
  });
});
