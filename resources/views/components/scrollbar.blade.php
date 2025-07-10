
    <section class="py-5">
      <div class="container text-center">
        <h2 class="text-success fw-bolder">Our Services</h2>
        <span class="text-description">Fostering a playful & engaging learning environment</span>

        <section class="rotating">
          <div class="box">
            <span style="--i:1;"><img src="{{ asset('storage/uploads/3D_rotating/database.png')}}" alt=""></span>
            <span style="--i:2;"><img src="{{ asset('storage/uploads/3D_rotating/aws.png') }}" alt=""></span>
            <span style="--i:3;"><img src="{{ asset('storage/uploads/3D_rotating/css.png') }}" alt=""></span>
            <span style="--i:4;"><img src="{{ asset('storage/uploads/3D_rotating/html.png') }}" alt=""></span>
            <span style="--i:5;"><img src="{{ asset('storage/uploads/3D_rotating/nodejs.png') }}" alt=""></span>
            <span style="--i:6;"><img src="{{ asset('storage/uploads/3D_rotating/reatctjs.png') }}" alt=""></span>
            <span style="--i:7;"><img src="{{ asset('storage/uploads/3D_rotating/git.png') }}" alt=""></span>
            <span style="--i:8;"><img src="{{ asset('storage/uploads/3D_rotating/docker.png') }}" alt=""></span>
          </div>
        </section>

        <!-- Popular Courses Style Scrollable Cards -->
        <div class="scroll-courses-container overflow-auto px-2 mt-5 py-3">
          <div class="d-flex flex-row gap-4">
            @php
              $icons = [
                "UX/UI Design" => "bi-palette",
                "HTML" => "bi-filetype-html",
                "CSS" => "bi-filetype-css",
                "JavaScript" => "bi-filetype-js",
                "PHP" => "bi-filetype-php",
                "Laravel" => "bi-layers",
                "React" => "bi-lightning-charge",
                "Node.js" => "bi-node-plus",
                "Python" => "bi-filetype-py",
                "Django" => "bi-diagram-3",
                "Aungular" => "bi-cpu",
                "Vue.js" => "bi-eye",
                "SQL" => "bi-database",
                "MongoDB" => "bi-database-fill",
                "Git" => "bi-git",
                "Docker" => "bi-box-seam",
                "AWS" => "bi-cloud",
                "PostgreSQL" => "bi-database-check",
              ];
            @endphp
            @foreach ($tags as $tag)
              <div class="course-card card border-0 shadow-sm"
                data-tag="{{ $tag->name }}"
                style="min-width: 260px; max-width: 260px; border-radius: 1.5rem; background: #fff;">
                <div class="p-4 d-flex flex-column align-items-start h-100">
                  <div class="mb-3">
                    <i class="bi {{ $icons[$tag->name] ?? 'bi-display' }} fs-2 text-white px-3 py-2 rounded-4" style="background-color: rgba(100, 232, 153, 0.549);"></i>
                  </div>
                  <h5 class="fw-bold mb-2">{{ $tag->name }}</h5>
                  <p class="text-muted d-inline-flex justify-content-start small mb-3" style="min-height: 40px;">
                    {{ $tag->description ?? 'Explore this course to boost your skills.' }}
                  </p>
                  <a href="#" class="btn btn-outline-success btn-sm mt-auto rounded-pill px-3">
                    Learn More <i class="bi bi-arrow-right-short"></i>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <style>
          .scroll-courses-container {
            scrollbar-width: thin;
            scrollbar-color: var(--primary-color);
          }
          .scroll-courses-container::-webkit-scrollbar {
            height: 10px;
          }
          .scroll-courses-container::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 5px;
          }
          .course-card {
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
          }
          .course-card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 8px 24px rgba(25,135,84,0.12);
          }
        </style>
        <script>
        const tagColors = {
          "UX/UI Design": "#f0f8ff",
          "HTML": "#ffe4b5",
          "CSS": "#d1fae5",
          "JavaScript": "#e0f2fe",
          "PHP": "#f3e8ff",
          "Laravel": "#fef2f2",
          "React": "#f0f9ff",
          "Node.js": "#fef3c7",
          "Python": "#f5f3ff",
          "Django": "#fef9c3",
          "Aungular": "#f0fdf4",
          "Vue.js": "#fef2f2",
          "SQL": "#fef9c7",
          "MongoDB": "#f3f4f6",
          "Git": "#fef3c7",
          "Docker": "#fef2f2",
          "AWS": "#f0f9ff",
          "PostgreSQL": "#f3e8ff",
        };
        document.querySelectorAll('.course-card').forEach(card => {
          const tag = card.getAttribute('data-tag');
          if (tagColors[tag]) {
            card.style.backgroundColor = tagColors[tag];
          }
        });
        </script>
