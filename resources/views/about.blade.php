@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - CodeAcademy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="aboutus.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root{
  --main-color: #20B486; 
  --text-light: #ffffff;
  --bg-light: #f8f9fa;
  --hover:rgb(0, 0, 0);
}
@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(100px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.slide-in-right {
  animation: slideInRight 1.5s ease-out forwards;
}

.custom-box {
    background-color: var(--main-color);
    color: var(--text-light);
}
.custom-box1{
    color: var(--main-color);
}
.body {
  background-color: var(--bg-light);
}
.team-section {
  background-color: #fff;
}

.text-main {
  color: var(--main-color);
}
.card {
  border-radius: 1.5rem;
}
.border-main {
  border-color: var(--main-color) !important;
}
.btn-outline {
  width: 35px;
  height: 35px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  color: var(--bg-light);
  background-color: var(--main-color);
}

.hover{
    transition: transform 0.4s ease;
}

.hover:hover{
  transform: scale(1.05);
}


.hover-container {
  overflow: hidden;
}

.hover-image {
  transition: transform 0.4s ease;
}

.hover-container:hover .hover-image {
  transform: scale(1.1); 
}
.counter {
  color: var(--main-color);
  font-size: 2.5rem;
  font-weight: bold;
}

.text-main {
  color: var(--main-color);
}

.flex-row-reverse{
  text-align: end;
}
</style>
</head>

<body>

  <header class="custom-box1 text-center py-5">
    <h1>About Us-CodeAcademy</h1>
    <h4 class="text-description">Who we are and what we do</h4>
  </header>

<section class="container px-5 mx-auto">
  <div class="row align-items-center">
    <!-- Left side: Text content -->
    <div class="col-md-6">
      <div class="mb-4">
        <h3>Our Mission</h3>
        <p class="text-description">At CodeAcademy, our mission is to empower learners in Cambodia
          by teaching practical coding skills that matter in the real world.
          We believe in accessible, hands-on, and effective education.</p>
      </div>

      <div>
        <h3>Our Vision</h3>
        <p class="text-description">To empower the next generation of developers by making world-class
          tech education accessible, practical, and inspiring.</p>
      </div>
      <div class="mb-4">
        <h3>Our Team</h3>
        <p class="text-description">We are a group of junior,  
          and educators dedicated to helping students learn to code through 
          modern web development and data science courses.</p>
      </div>
    </div>

    <div class="col-md-6 text-center">
      <img src="{{ asset('storage/uploads/about_us/About us.svg') }}" alt="CodeAcademy Team" class="img-fluid rounded rounded slide-in-right">
    </div>
  </div>
</section>

  <section class="container my-6 mt-5">
  <div class="text-center mb-5">
    <h3 class="text-main mb-4">Our Values</h3>
    <div class="row g-4">
      <div class="col-md-6 hover">
        <div class="card h-100 shadow-sm p-3">
          <div class="mb-2 fs-1 text-main">💡</div>
          <h5 class="fw-bold">Innovation</h5>
          <p>We stay ahead of trends to give learners the most relevant skills.</p>
        </div>
      </div>
      <div class="col-md-6 hover">
        <div class="card h-100 shadow-sm p-3">
          <div class="mb-2 fs-1 text-main">👥</div>
          <h5 class="fw-bold">Community</h5>
          <p>We grow together, share knowledge, and support each other.</p>
        </div>
      </div>
      <div class="col-md-6 hover">
        <div class="card h-100 shadow-sm p-3">
          <div class="mb-2 fs-1 text-main">🧑‍🤝‍🧑</div>
          <h5 class="fw-bold">Inclusivity</h5>
          <p>We believe coding is for everyone, everywhere.</p>
        </div>
      </div>
      <div class="col-md-6 hover">
        <div class="card h-100 shadow-sm p-3">
          <div class="mb-2 fs-1 text-main">🏆</div>
          <h5 class="fw-bold">Excellence</h5>
          <p>We push for the highest quality in everything we teach and build.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="container my-5 mt-5">
  <div class="d-flex justify-content-center">
    <div class="card shadow rounded-circle-4 p-4 hover" style="max-width: 900px; width: 100%;">
      <div class="row g-4 align-items-center">
        <div class="col-md-4 text-center">
          <div class="position-relative hover-container rounded-circle border border-4 border-main" style="width: 200px; height: 200px;">
            <img src="{{ asset('storage/uploads/about_us/sokneang.png') }}" alt="Team Member" class=" hover-image" style="width: 170px; object-fit: cover;">
          </div>
        </div>

        <!-- Text and Info -->
        <div class="col-md-8">
          <h4 class=" mb-1 fw-bold" style="color: var(--main-color);">Lay Sokneang</h4>
          <p class=" fw-semibold mb-2">Team Leader</p>
          <div class="mb-3" style="height: 5px; width: 65px; background-color: var(--main-color); border-radius: 2px; d-flex; justify-content: flex-end;"></div>
          <p class="text-muted mb-3">
           Sokneang is a great team lead, a full-stack developer, a skillfull, and a hardworking member. 
          </p>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-chat-dots-fill"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-box-arrow-up-right"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-facebook"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-envelope-fill"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-5">
    <div class="card shadow rounded-circle-4 p-4 hover" style="max-width: 900px; width: 100%;">
      <div class="row g-4 align-items-center">
        <div class="col-md-4 text-center">
          <div class="position-relative hover-container rounded-circle border border-4 border-main" style="width: 200px; height: 200px;">
            <img src="{{ asset('storage/uploads/about_us/bomnong.png') }}" alt="Team Member" class=" hover-image" style="width: 170px; object-fit: cover;">
          </div>
        </div>

        <!-- Text and Info -->
        <div class="col-md-8">
          <h4 class=" mb-1 fw-bold" style="color: var(--main-color);">Long Sokbomnong</h4>
          <p class=" fw-semibold mb-2">Member</p>
          <div class="mb-3" style="height: 5px; width: 65px; background-color: var(--main-color); border-radius: 2px; d-flex; justify-content: flex-end;"></div>
          <p class="text-muted mb-3">
           Sokneang is a great team lead, a full-stack developer, a skillfull, and a hardworking member. 
          </p>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-chat-dots-fill"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-box-arrow-up-right"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-facebook"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-envelope-fill"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-5">
    <div class="card shadow rounded-circle-4 p-4 hover" style="max-width: 900px; width: 100%;">
      <div class="row g-4 align-items-center">
        <div class="col-md-4 text-center">
          <div class="position-relative hover-container rounded-circle border border-4 border-main" style="width: 200px; height: 200px;">
            <img src="{{ asset('storage/uploads/about_us/lita.png') }}" alt="Team Member" class=" hover-image" style="width: 170px; object-fit: cover;">
          </div>
        </div>

        <!-- Text and Info -->
        <div class="col-md-8">
          <h4 class=" mb-1 fw-bold" style="color: var(--main-color);">Ouk Alita</h4>
          <p class=" fw-semibold mb-2">Member</p>
          <div class="mb-3" style="height: 5px; width: 65px; background-color: var(--main-color); border-radius: 2px; d-flex; justify-content: flex-end;"></div>
          <p class="text-muted mb-3">
           Sokneang is a great team lead, a full-stack developer, a skillfull, and a hardworking member. 
          </p>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-chat-dots-fill"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-box-arrow-up-right"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-facebook"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-envelope-fill"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-5">
    <div class="card shadow rounded-circle-4 p-4 hover" style="max-width: 900px; width: 100%;">
      <div class="row g-4 align-items-center">
        <div class="col-md-4 text-center">
          <div class="position-relative hover-container rounded-circle border border-4 border-main" style="width: 200px; height: 200px;">
            <img src="{{ asset('storage/uploads/about_us/nakrin.png') }}" alt="Team Member" class=" hover-image" style="width: 170px; object-fit: cover;">
          </div>
        </div>

        <!-- Text and Info -->
        <div class="col-md-8">
          <h4 class=" mb-1 fw-bold" style="color: var(--main-color);">Kroeun Nakren</h4>
          <p class=" fw-semibold mb-2">Member</p>
          <div class="mb-3" style="height: 5px; width: 65px; background-color: var(--main-color); border-radius: 2px; d-flex; justify-content: flex-end;"></div>
          <p class="text-muted mb-3">
           Sokneang is a great team lead, a full-stack developer, a skillfull, and a hardworking member. 
          </p>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-chat-dots-fill"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-box-arrow-up-right"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-facebook"></i></a>
            <a href="#" class="btn btn-outline rounded-circle"><i class="bi fs-6 bi-envelope-fill"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>


  <section class="stats-section py-5 bg-light mt-5">
  <div class="container text-center">
    <h2 class="text-main mb-4">CodeAcademy by the Numbers</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <h3><span class="counter" data-count="505">0</span>+</h3>
        <p>Students Enrolled</p>
      </div>
      <div class="col-md-4">
        <h3><span class="counter" data-count="5">0</span>+</h3>
        <p>Countries Reached</p>
      </div>
      <div class="col-md-4">
        <h3><span class="counter" data-count="10">0</span>+</h3>
        <p>Expert Instructors</p>
      </div>
    </div>
  </div>
</section>

<section class=" py-5">
  <div class="container">
    <h2 class="text-center text-main mb-4">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
            Do I need prior coding experience?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            No! Our courses are beginner-friendly, with hands-on learning from day one.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faqTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
            How long do courses take?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Each course varies, but most can be completed in 2–6 weeks part-time.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faqThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
            Will I get a certificate?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes! Upon completing a course, you'll receive a personalized certificate of achievement.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  let hasAnimated = false;

  function animateCounters() {
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-count');
        const current = +counter.innerText;
        const speed = 50;

        const increment = Math.ceil(target / speed);

        if (current < target) {
          counter.innerText = current + increment;
          setTimeout(updateCount, 20);
        } else {
          counter.innerText = target;
        }
      };

      updateCount();
    });

    hasAnimated = true;
  }

  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return rect.top < window.innerHeight && rect.bottom > 0;
  }

  window.addEventListener('scroll', () => {
    const statsSection = document.querySelector('.stats-section');
    if (!hasAnimated && isInViewport(statsSection)) {
      animateCounters();
    }
  });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    @endsection