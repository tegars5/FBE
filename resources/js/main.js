// Kode JavaScript untuk perbaikan tombol toggle mobile
document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk menangani menu mobile
    const setupMobileMenu = function () {
        const navbar = document.querySelector(".navbar");
        const navLinks = document.querySelector(".nav-links");

        // Hapus toggle button yang lama jika ada
        const oldToggleBtn = document.querySelector(".menu-toggle");
        if (oldToggleBtn) {
            oldToggleBtn.remove();
        }

        // Buat toggle button yang baru dengan standar perusahaan
        const toggleBtn = document.createElement("button");
        toggleBtn.classList.add("menu-toggle");
        toggleBtn.innerHTML = '<i class="uil uil-bars"></i>';
        toggleBtn.setAttribute("aria-label", "Toggle Navigation Menu");

        // Sisipkan tombol setelah logo
        const logo = document.querySelector(".logo");
        if (logo && logo.nextSibling) {
            navbar.insertBefore(toggleBtn, logo.nextSibling);
        } else {
            navbar.appendChild(toggleBtn);
        }

        // Fungsi untuk mengatur tampilan berdasarkan ukuran layar
        function checkScreenSize() {
            if (window.innerWidth <= 768) {
                toggleBtn.style.display = "flex";
                if (!navLinks.classList.contains("active")) {
                    navLinks.style.display = "none";
                }
            } else {
                toggleBtn.style.display = "none";
                navLinks.style.display = "flex";
                navLinks.classList.remove("active");
                toggleBtn.classList.remove("active");
                toggleBtn.innerHTML = '<i class="uil uil-bars"></i>';
            }
        }

        // Jalankan saat halaman dimuat
        checkScreenSize();

        // Jalankan ketika ukuran layar berubah
        window.addEventListener("resize", checkScreenSize);

        // Toggle menu saat tombol diklik
        toggleBtn.addEventListener("click", function () {
            navLinks.classList.toggle("active");
            toggleBtn.classList.toggle("active");

            if (navLinks.classList.contains("active")) {
                navLinks.style.display = "flex";
                toggleBtn.innerHTML = '<i class="uil uil-times"></i>';
            } else {
                navLinks.style.display = "none";
                toggleBtn.innerHTML = '<i class="uil uil-bars"></i>';
            }
        });

        // Tutup menu saat link di dalamnya diklik
        const navItems = navLinks.querySelectorAll("a");
        navItems.forEach(function (item) {
            item.addEventListener("click", function () {
                if (window.innerWidth <= 768) {
                    navLinks.classList.remove("active");
                    navLinks.style.display = "none";
                    toggleBtn.classList.remove("active");
                    toggleBtn.innerHTML = '<i class="uil uil-bars"></i>';
                }
            });
        });
    };

    // Panggil setup untuk menu mobile
    setupMobileMenu();

    // Tambahkan event listener untuk resize
    let resizeTimeout;
    window.addEventListener("resize", function () {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function () {
            // Cek kembali jika ukuran layar berubah signifikan
            setupMobileMenu();
        }, 250);
    });
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

document.addEventListener("DOMContentLoaded", function () {
    const toggleSidebar = document.getElementById("toggle-sidebar");
    const closeSidebar = document.getElementById("close-sidebar");
    const sidebar = document.getElementById("sidebar");

    // Pastikan elemen-elemen ditemukan
    if (!toggleSidebar || !closeSidebar || !sidebar) {
        return; // Jika salah satu elemen tidak ditemukan, keluar dari fungsi
    }

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

            if (
                !isClickInsideSidebar &&
                !isClickOnToggle &&
                sidebar.classList.contains("active")
            ) {
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
            localStorage.setItem(
                "activeNavLink",
                navLinks[0].getAttribute("data-route")
            );
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
            localStorage.setItem(
                "activeNavLink",
                this.getAttribute("data-route")
            );
        });
    });
});

// Image preview functionality
function previewImage(input) {
    const file = input.files[0];
    const preview = document.getElementById("preview");
    const previewContainer = document.getElementById("imagePreview");

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            previewContainer.style.display = "block";
        };

        reader.readAsDataURL(file);
    } else {
        previewContainer.style.display = "none";
    }
}

// Updated JavaScript
document.addEventListener("DOMContentLoaded", function () {
    // Hide all extra-detail content when page loads
    document.querySelectorAll(".extra-detail").forEach(function (detail) {
        detail.style.display = "none";
    });

    // Handle click for each learn-more button
    document.querySelectorAll(".learn-more").forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();

            // Find parent box for the clicked button
            const parentBox = this.closest(".project-box");

            // Find the extra-detail element inside this parent box only
            const extraDetail = parentBox.querySelector(".extra-detail");

            if (extraDetail) {
                // Check if extra detail is currently visible
                const isVisible =
                    window.getComputedStyle(extraDetail).display !== "none";

                // Change display based on current status
                extraDetail.style.display = isVisible ? "none" : "inline";

                // Update button text
                this.textContent = isVisible ? "Show more →" : "Show less ←";

                // Remove fixed height when expanded, restore when collapsed
                if (!isVisible) {
                    parentBox.style.height = "auto"; // Auto height when expanded
                } else {
                    parentBox.style.height = "300px"; // Return to fixed height when collapsed
                }
            }
        });
    });
});

// JavaScript untuk menangani tampilan artikel dengan maksimal 10 artikel
document.addEventListener("DOMContentLoaded", function () {
    const allArticles = document.querySelectorAll(
        ".article-card:not(.featured)"
    );
    const viewAllButton = document.querySelector(
        ".articles-section .learn-more"
    );
    const maxArticlesToShow = 10; // Total maksimal artikel yang akan ditampilkan (termasuk featured)

    // Hitung berapa banyak artikel yang tersedia (termasuk featured)
    const featuredArticle = document.querySelector(".article-card.featured");
    const totalArticles = allArticles.length + (featuredArticle ? 1 : 0);

    // Sembunyikan artikel melebihi 5 pertama saat halaman dimuat
    if (allArticles.length > 4) {
        // Mulai dari index 4 (artikel ke-5), sembunyikan sisanya
        for (let i = 4; i < allArticles.length; i++) {
            allArticles[i].classList.add("hidden-article");
        }

        // Tampilkan tombol "View All" jika ada artikel yang disembunyikan
        viewAllButton.style.display = "inline-flex";
    } else {
        // Jika artikelnya kurang dari 5, sembunyikan tombol "View All"
        viewAllButton.style.display = "none";
    }

    // Tambahkan event listener untuk tombol "View All"
    viewAllButton.addEventListener("click", function (e) {
        e.preventDefault();

        if (this.textContent === "View All →") {
            // Jika tombol "View All" diklik
            let shownCount = 0;

            // Tampilkan artikel tambahan hingga maksimal 10 total
            document
                .querySelectorAll(".hidden-article")
                .forEach(function (article) {
                    // Hitung berapa artikel yang sudah tampil (5 artikel awal + featured)
                    const initiallyShown = 5; // 1 featured + 4 artikel biasa

                    // Hanya tampilkan artikel tambahan jika masih di bawah batas maksimal
                    if (initiallyShown + shownCount < maxArticlesToShow) {
                        article.classList.remove("hidden-article");
                        article.classList.add("show-article");
                        shownCount++;
                    }
                });

            // Jika jumlah artikel yang ditampilkan sudah maksimal dan masih ada yang tersembunyi
            if (totalArticles > maxArticlesToShow) {
                this.textContent = "Show Less ←";
            } else {
                // Jika semua artikel sudah ditampilkan (tidak lebih dari maksimal)
                this.textContent = "Show Less ←";
            }
        } else {
            // Jika tombol "Show Less" diklik
            // Sembunyikan kembali artikel, hanya tampilkan 5 artikel pertama
            let hiddenCount = 0;

            document
                .querySelectorAll(".show-article")
                .forEach(function (article) {
                    article.classList.remove("show-article");
                    article.classList.add("hidden-article");
                    hiddenCount++;
                });

            this.textContent = "View All →";
        }
    });

    // Tambahkan informasi di bawah artikel jika jumlah artikel lebih dari maksimal
    if (totalArticles > maxArticlesToShow) {
        const infoElement = document.createElement("p");
        infoElement.classList.add("articles-info");
        // infoElement.textContent = `Menampilkan ${maxArticlesToShow} dari ${totalArticles} artikel.`;

        const articlesGrid = document.querySelector(".articles-grid");
        articlesGrid.parentNode.insertBefore(
            infoElement,
            articlesGrid.nextSibling
        );

        // Atur tampilan awal info
        infoElement.style.display = "none";

        // Update tampilan info saat tombol diklik
        viewAllButton.addEventListener("click", function () {
            if (this.textContent === "Show Less ←") {
                infoElement.style.display = "block";
            } else {
                infoElement.style.display = "none";
            }
        });
    }
});

// Pastikan kode ini dijalankan setelah dokumen selesai dimuat
document.addEventListener("DOMContentLoaded", function () {
    // Animasi saat masuk ke halaman detail artikel
    const articleDetail = document.querySelector(".article-detail-container");
    if (articleDetail) {
        articleDetail.classList.add("animate-fade-in");
    }

    // Fungsi untuk share artikel ke media sosial
    const shareButtons = document.querySelectorAll(".share-button");
    shareButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const url = this.getAttribute("href");
            window.open(url, "_blank", "width=600,height=400");
        });
    });

    // Animasi untuk artikel terkait
    const relatedArticles = document.querySelectorAll(
        ".related-articles .article-card"
    );
    if (relatedArticles.length > 0) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("animate-fade-in");
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.1 }
        );

        relatedArticles.forEach((article) => {
            observer.observe(article);
        });
    }

    // Tambahkan efek hover untuk artikel cards
    const articleCards = document.querySelectorAll(".article-card");
    articleCards.forEach((card) => {
        card.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-5px)";
            this.style.transition = "transform 0.3s ease";
        });
        card.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0)";
        });
    });
});

// Ini adalah kode opsional untuk lazy loading gambar jika diperlukan
function lazyLoadImages() {
    const images = document.querySelectorAll("img[data-src]");

    if ("IntersectionObserver" in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const image = entry.target;
                    image.src = image.dataset.src;
                    image.removeAttribute("data-src");
                    imageObserver.unobserve(image);
                }
            });
        });

        images.forEach((img) => imageObserver.observe(img));
    } else {
        // Fallback untuk browser yang tidak mendukung Intersection Observer
        images.forEach((img) => {
            img.src = img.dataset.src;
            img.removeAttribute("data-src");
        });
    }
}
document.addEventListener("DOMContentLoaded", function () {
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach((item) => {
        const question = item.querySelector(".faq-question");
        const answer = item.querySelector(".faq-answer");

        question.addEventListener("click", function () {
            item.classList.toggle("active");

            // Jika sudah aktif, tutup jawaban lainnya
            faqItems.forEach((otherItem) => {
                if (otherItem !== item) {
                    otherItem.classList.remove("active");
                }
            });
        });
    });
});

window.previewImageku = function (input) {
    const previewContainer = document.getElementById("imagePreviewku");
    const previewImage = document.getElementById("previewku");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImage.src = e.target.result;
            previewContainer.style.display = "block";
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        previewContainer.style.display = "none";
    }
};
