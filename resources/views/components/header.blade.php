<!-- Start Header Area -->
<header class="rbt-header rbt-header-10">
    <div class="rbt-header-wrapper header-space-betwween header-sticky">
        <div class="container-fluid">
            <div class="mainbar-row rbt-navigation-center align-items-center justify-content-between">
                
                <!-- Logo -->
                <div class="header-left rbt-header-content">
                    <div class="logo logo-dark">
                        <a href="{{ route('mainDemo') }}">
                            <img src="https://lms.sohibdigi.id/wp-content/uploads/2025/08/logosekolahkaya.webp" alt="Education Logo Images" style="height:50px;">
                        </a>
                    </div>
                
                    <div class="logo d-none logo-light">
                        <a href="{{ route('mainDemo') }}">
                            <img src="https://lms.sohibdigi.id/wp-content/uploads/2025/08/logosekolahkaya.webp" alt="Edu-cause"></a>
                    </div>
                </div>

                <!-- Navigation (Desktop Only) -->
                <div class="rbt-main-navigation d-none d-md-block">
                    <nav class="mainmenu-nav">
                        <ul class="nav-menu">
                            <li><a href="{{ route('mainDemo') }}" class="nav-link">Home</a></li>
                            <li><a href="{{ route('courseWithTab') }}" class="nav-link">Courses</a></li>
                            <li>
                                <a href="https://ecourse.sekolahkaya.com/dashboard" class="nav-link mycourses-btn">
                                    My Courses
                                </a>
                            </li>
                            <li><a href="{{ route('aboutus01') }}" class="nav-link">About</a></li>
                            <li><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- Mobile Toggle -->
                <div class="d-block d-md-none">
                    <button id="menuToggle" style="background:none; border:none; font-size:28px; cursor:pointer;">
                        ☰
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Modal Navigation -->
<div id="mobileNavModal" class="mobile-modal">
    <div class="mobile-modal-content">
        <span id="closeModal" class="close-btn">&times;</span>
        <ul class="mobile-nav-menu">
                <div style="position: relative; top: 0px; right: 0px;">
                    <div class="logo logo-dark">
                        <a href="{{ route('mainDemo') }}">
                            <img src="https://lms.sohibdigi.id/wp-content/uploads/2025/08/logosekolahkaya.webp" alt="Education Logo Images" style="height:50px;">
                        </a>
                    </div>
                
                    <div class="logo d-none logo-light">
                        <a href="{{ route('mainDemo') }}">
                            <img src="https://lms.sohibdigi.id/wp-content/uploads/2025/08/logosekolahkaya.webp" alt="Edu-cause"></a>
                    </div>
                </div>
            <li><a href="{{ route('mainDemo') }}">Home</a></li>
            <li><a href="{{ route('courseWithTab') }}">Courses</a></li>
            <li><a href="{{ route('aboutus01') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </div>
</div>

<!-- Inline CSS -->
<style>
    /* Desktop Nav */
    .nav-menu {
        display: flex;
        gap: 30px;
        list-style: none;
        justify-content: center;
        align-items: center;
        margin: 0;
    }

    .nav-link {
        position: relative;
        padding: 6px 8px;
        font-size: 18px;
        font-weight: 600;
        color: #374151;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .nav-link:hover { color: #2563eb; }
    .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -3px;
        width: 0;
        height: 2px;
        background-color: #2563eb;
        transition: width 0.3s ease-in-out;
    }
    .nav-link:hover::after { width: 100%; }

    /* Modal */
    .mobile-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0; top: 0;
        width: 100%; height: 100%;
        background-color: rgba(0,0,0,0.6);
    }

    .mobile-modal-content {
        background: white;
        width: 80%;
        max-width: 300px;
        height: 100%;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
        position: fixed;
        left: 0; top: 0;
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }

    .mobile-modal.show .mobile-modal-content {
        transform: translateX(0);
    }

    .close-btn {
        font-size: 28px;
        cursor: pointer;
        float: right;
    }

    .mobile-nav-menu {
        list-style: none;
        padding: 50px 0 0;
    }
    .mobile-nav-menu li {
        margin: 20px 0;
    }
    .mobile-nav-menu a {
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
        color: #374151;
    }
    .mobile-nav-menu a:hover {
        color: #2563eb;
    }
    .mycourses-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    background: #2563eb;
    color: white !important;
    font-weight: 600;
    border-radius: 25px;
    transition: background 0.3s ease;
}


.mycourses-btn:hover {
    background: #1d4ed8;
    color: #fff;
}

.mycourses-btn::after {
    content: none !important;  /* matikan garis bawah hover */
}


.mycourses-icon {
    font-size: 18px;
}

.mycourses-btn .badge {
    position: absolute;
    top: -6px;
    right: -6px;
    background: #ef4444;
    color: white;
    font-size: 12px;
    font-weight: bold;
    padding: 2px 6px;
    border-radius: 50%;
}

</style>

<!-- Inline JS -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.getElementById("menuToggle");
        const modal = document.getElementById("mobileNavModal");
        const closeModal = document.getElementById("closeModal");

        menuToggle.addEventListener("click", () => {
            modal.style.display = "block";
            setTimeout(() => modal.classList.add("show"), 10);
        });

        closeModal.addEventListener("click", () => {
            modal.classList.remove("show");
            setTimeout(() => modal.style.display = "none", 300);
        });

        window.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.classList.remove("show");
                setTimeout(() => modal.style.display = "none", 300);
            }
        });
    });
</script>
