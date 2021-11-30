@include('includes.header')

<!--
        ===================
           Home
        ===================
        -->
<section class="mh-home image-bg home-2-img" id="mh-home">
    <div class="img-foverlay img-color-overlay">
        <div class="container">
            <div class="row section-separator xs-column-reverse vertical-middle-content home-padding">
                <div class="col-sm-6">
                    <div class="mh-header-info">
                        <div class="mh-promo wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                            @if ($user->introduction)
                            <span>{{ $user->introduction }}</span>
                            @else
                            <span>Hello I'm</span>
                            @endif
                        </div>

                        <h2 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $user->name }}</h2>

                        @if($user->job_title)
                        <h4 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">{{ ucfirst($user->job_title) }}</h4>
                        @endif

                        <ul>
                            <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><i class="fa fa-envelope"></i><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></li>
                            @if($user->phone_number)
                            <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s"><i class="fa fa-phone"></i><a href="callto:{{ $user->phone_number }}">{{ $user->phone_number }}</a></li>
                            @endif
                            @if($user->address)
                            <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s"><i class="fa fa-map-marker"></i>
                                <address>{{ $user->address }}</address>
                            </li>
                            @endif
                        </ul>

                        <ul class="social-icon wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">
                            @foreach ($user->networks as $network)
                            @if ($network->pivot->active && $network->pivot->url)

                            <li><a href="https://{{$network->url}}/{{$network->pivot->url}}" target="_blank"><i class="fa fa-{{ $network->name }}"></i></a></li>

                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="hero-img wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
                        <div>
                            @if ($user->image)
                            <img src="{{ $user->get_image }}" alt="{{ $user->name }}" class="img-fluid">
                            @else
                            <img src="{{ asset('assets/images/hero.png') }}" alt="Default user image" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
        ===================
           ABOUT
        ===================
        -->
<section class="mh-about" id="mh-about">
    <div class="container">
        <div class="row section-separator">
            <div class="col-sm-12 col-md-6">
                <div class="mh-about-img shadow-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                    @if ($user->image)
                    <img src="{{ $user->get_about_img }}" alt="About section image added by {{ $user->name }}" class="img-fluid">
                    @else
                    <img src="{{ asset('assets/images/ab-img.png') }}" alt="" class="img-fluid">
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mh-about-inner">

                    <h2 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                        @if($user->about_title)
                        <span>{{ $user->about_title }}</span>
                        @else
                        <span>About Me</span>
                        @endif
                    </h2>

                    <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Hello, I’m {{ $user->name }}
                        @if($user->job_title)
                        <span>, {{ $user->job_title }}</span>
                        @endif
                        .
                    </p>
                    @if($user->excerpt)
                    <p>
                        {{ $user->excerpt }}
                    </p>
                    @endif

                    <div class="mh-about-tag wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <ul>
                            @foreach ($user->skills as $skill)
                            @if ($skill->type == 'technical')
                            <li><span>{{ ucfirst(ucfirst($skill->name)) }}</span></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <a href="#" class="btn btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">Download CV <i class="fa fa-download"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
        ===================
           SERVICE
        ===================
        -->
<section class="mh-service">
    <div class="container">
        <div class="row section-separator">
            <div class="col-sm-12 text-center section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <h2>
                    @if($user->about_subtitle)
                    <span>{{ $user->about_subtitle }}</span>
                    @else
                    <span>What I do</span>
                    @endif
                </h2>
            </div>

            @foreach ($user->activities as $activity)
            <div class="col-sm-4 mb-4">
                <div class="mh-service-item shadow-1 dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                    <i class="fa {{ $icons[rand(0,count($icons)-1)]}} {{ $colors[rand(0,count($colors)-1)]}}"></i>
                    <h3>{{ ucfirst($activity->title) }}</h3>
                    <p>
                        {{ $activity->description }}
                    </p>
                </div>
            </div>
            @endforeach

            @if(!count($user->activities))
            <p class="text-center w-100">Coming soon...</p>
            @endif

        </div>
    </div>
</section>

<!--
        ===================
          FEATURE PROJECTS
        ===================
        -->
<section class="mh-featured-project image-bg featured-img-one">
    <div class="img-color-overlay">
        <div class="container">
            <div class="row section-separator">
                <div class="section-title col-sm-12">
                    <h3>Featured Projects</h3>
                </div>
                <div class="col-sm-12">
                    <div class="mh-single-project-slide-by-side row">
                        <!-- Project Items -->
                        <!-- Limitar a 3 elementos para el correcto funcionamiento del carousel -->
                        @for ($i = 0; $i < 3; $i++) @isset ($user->projects[$i])
                            <div class="col-sm-12 mh-featured-item">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="mh-featured-project-img shadow-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                            <img src="{{ asset('assets/images/p-2.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="mh-featured-project-content">
                                            <h4 class="project-category wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">{{ $user->projects[$i]->category }}</h4>
                                            <h2 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">{{ $user->projects[$i]->title }}</h2>
                                            <span class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">{{ $user->projects[$i]->subtitle }}</span>
                                            <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">{{ $user->projects[$i]->description }}</p>
                                            <a href="#" class="btn btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">View Details</a>
                                            <div class="mh-testimonial mh-project-testimonial wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.9s">

                                                @if (count($user->projects[$i]->testimonials)>2)
                                                <!-- Limitar a 3 elementos para el correcto funcionamiento del carousel -->
                                                @for ($j = 0; $j < 3; $j++) <blockquote>
                                                    <q>{{ $user->projects[$i]->testimonials[$j]->comment }}</q>
                                                    <cite>- {{ $user->projects[$i]->testimonials[$j]->name }}</cite>
                                                    </blockquote>

                                                    @endfor
                                                    @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endisset
                            @endfor
                    </div>

                    @if(!count($user->projects))
                    <p class="text-center w-100">Coming soon...</p>
                    @endif
                </div>
            </div> <!-- End: .row -->
        </div>
    </div>
</section>

<!--
        ===================
           SKILLS
        ===================
        -->
<section class="mh-skills" id="mh-skills">
    <div class="home-v-img">
        <div class="container">
            <div class="row section-separator">
                <div class="section-title text-center col-sm-12">
                    <!--<h2>Skills</h2>-->
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mh-skills-inner">
                        <div class="mh-professional-skill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <h3>Technical Skills</h3>
                            <div class="each-skills">
                                @foreach ($user->skills as $skill)
                                @if ($skill->type == 'technical')
                                <div class="candidatos">
                                    <div class="parcial">
                                        <div class="info">
                                            <div class="nome">{{ ucfirst($skill->name) }}</div>
                                            <div class="percentagem-num">{{ $skill->percent }}%</div>
                                        </div>
                                        <div class="progressBar">
                                            <div class="percentagem" style="width: {{ $skill->percent }}%;"></div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mh-professional-skills wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                        <h3>Professional Skills</h3>
                        <ul class="mh-professional-progress">
                            @foreach ($user->skills as $skill)
                            @if ($skill->type == 'professional')
                            <li>
                                <div class="mh-progress mh-progress-circle" data-progress="{{ $skill->percent }}"></div>
                                <div class="pr-skill-name">{{ ucfirst($skill->name) }}</div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
        ===================
           EXPERIENCES
        ===================
        -->
<section class="mh-experince image-bg featured-img-one" id="mh-experience">
    <div class="img-color-overlay">
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 col-md-6">
                    <div class="mh-education">
                        <h3 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Education</h3>
                        <div class="mh-education-deatils">
                            <!-- Education Institutes-->
                            @foreach ($user->education as $item)
                            <div class="mh-education-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                <h4>{{ $item->degree }} <a href="#">{{ $item->school_name }}</a></h4>
                                <div class="mh-eduyear">{{ $item->start_date }}-{{ $item->finish_date }}</div>
                                <p>{{ $item->description }}</p>
                            </div>
                            @endforeach

                            @if(!count($user->education))
                            <p class="text-center w-100">Coming soon...</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mh-work">
                        <h3>Work Experience</h3>
                        <div class="mh-experience-deatils">
                            <!-- Work Experience-->
                            @foreach ($user->works as $work)
                            <div class="mh-work-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                                <h4>{{ $work->position }} <a href="#">{{ $work->company_name }}</a></h4>
                                <div class="mh-eduyear">{{ $work->start_date }}-{{ $work->finish_date }}</div>
                                <span>Responsibilities :</span>
                                <ul class="work-responsibility">
                                    @foreach ($work->responsibilities as $responsibility)
                                    <li><i class="fa fa-circle"></i>{{ $responsibility->description }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach

                            @if(!count($user->works))
                            <p class="text-center w-100">Coming soon...</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
        ===================
           PORTFOLIO
        ===================
        -->
<section class="mh-portfolio" id="mh-portfolio">
    <div class="container">
        <div class="row section-separator">
            <div class="section-title col-sm-12 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                <h3>Recent Portfolio</h3>
            </div>
            <div class="part col-sm-12">
                <div class="portfolio-nav col-sm-12" id="filter-button">
                    <ul>
                        <li data-filter="*" class="current wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s"> <span>All Categories</span></li>
                        <li data-filter=".user-interface" class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><span>Web Design</span></li>
                        <li data-filter=".branding" class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><span>Branding</span></li>
                        <li data-filter=".mockup" class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><span>Mockups</span></li>
                        <li data-filter=".ui" class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s"><span>Photography</span></li>
                    </ul>
                </div>
                <div class="mh-project-gallery col-sm-12 wow fadeInUp" id="project-gallery" data-wow-duration="0.8s" data-wow-delay="0.5s">
                    <div class="portfolioContainer row">
                        <div class="grid-item col-md-4 col-sm-6 col-xs-12 user-interface">
                            <figure>
                                <img src="{{ asset('assets/images/portfolio/g1.jpg') }}" alt="img04">
                                <figcaption class="fig-caption">
                                    <i class="fa fa-search"></i>
                                    <h5 class="title">Creative Design</h5>
                                    <span class="sub-title">Photograpy</span>
                                    <a data-fancybox data-src="#mh"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item col-md-4 col-sm-6 col-xs-12 ui mockup">
                            <figure>
                                <img src="{{ asset('assets/images/portfolio/g2.png') }}" alt="img04">
                                <figcaption class="fig-caption">
                                    <i class="fa fa-search"></i>
                                    <h5 class="title">Creative Design</h5>
                                    <span class="sub-title">Photograpy</span>
                                    <a href="{{ asset('assets/images/portfolio/g2.png') }}" data-fancybox data-src="#mh"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item col-md-4 col-sm-6 col-xs-12 user-interface">
                            <figure>
                                <img src="{{ asset('assets/images/portfolio/g3.png') }}" alt="img04">
                                <figcaption class="fig-caption">
                                    <i class="fa fa-search"></i>
                                    <h5 class="title">Creative Design</h5>
                                    <span class="sub-title">Photograpy</span>
                                    <a href="{{ asset('assets/images/portfolio/g3.png') }}" data-fancybox data-src="#mh"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item col-md-4 col-sm-6 col-xs-12 branding">
                            <figure>
                                <img src="{{ asset('assets/images/portfolio/g5.png') }}" alt="img04">
                                <figcaption class="fig-caption">
                                    <i class="fa fa-search"></i>
                                    <h5 class="title">Creative Design</h5>
                                    <span class="sub-title">Photograpy</span>
                                    <a href="{{ asset('assets/images/portfolio/g5.png') }}" data-fancybox data-src="#mh"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item col-md-4 col-sm-6 col-xs-12 user-interface">
                            <figure>
                                <img src="{{ asset('assets/images/portfolio/g4.png') }}" alt="img04">
                                <figcaption class="fig-caption">
                                    <i class="fa fa-search"></i>
                                    <h5 class="title">Creative Design</h5>
                                    <span class="sub-title">Photograpy</span>
                                    <a href="{{ asset('assets/images/portfolio/g4.png') }}" data-fancybox data-src="#mh"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item col-md-4 col-sm-6 col-xs-12 branding">
                            <figure>
                                <img src="{{ asset('assets/images/portfolio/g6.png') }}" alt="img04">
                                <figcaption class="fig-caption">
                                    <i class="fa fa-search"></i>
                                    <h5 class="title">Creative Design</h5>
                                    <span class="sub-title">Photograpy</span>
                                    <a href="{{ asset('assets/images/portfolio/g6.png') }}" data-fancybox data-src="#mh"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item col-md-4 col-sm-6 col-xs-12 branding">
                            <figure>
                                <img src="{{ asset('assets/images/portfolio/g8.png') }}" alt="img04">
                                <figcaption class="fig-caption">
                                    <i class="fa fa-search"></i>
                                    <h5 class="title">Creative Design</h5>
                                    <span class="sub-title">Photograpy</span>
                                    <a href="{{ asset('assets/images/portfolio/g8.png') }}" data-fancybox data-src="#mh"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item col-md-4 col-sm-6 col-xs-12 ui">
                            <figure>
                                <img src="{{ asset('assets/images/portfolio/g9.png') }}" alt="img04">
                                <figcaption class="fig-caption">
                                    <i class="fa fa-search"></i>
                                    <h5 class="title">Creative Design</h5>
                                    <span class="sub-title">Photograpy</span>
                                    <a href="{{ asset('assets/images/portfolio/g9.png') }}" data-fancybox data-src="#mh"></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item col-md-4 col-sm-6 col-xs-12 branding">
                            <figure>
                                <img src="{{ asset('assets/images/portfolio/g7.jpg') }}" alt="img04">
                                <figcaption class="fig-caption">
                                    <i class="fa fa-search"></i>
                                    <h5 class="title">Creative Design</h5>
                                    <span class="sub-title">Photograpy</span>
                                    <a href="{{ asset('assets/images/portfolio/g7.jpg') }}" data-fancybox="gallery"></a>
                                </figcaption>
                            </figure>
                        </div>
                    </div> <!-- End: .grid .project-gallery -->
                </div> <!-- End: .grid .project-gallery -->
            </div> <!-- End: .part -->
        </div> <!-- End: .row -->
    </div>
    <div class="mh-portfolio-modal" id="mh">
        <div class="container">
            <div class="row mh-portfolio-modal-inner">
                <div class="col-sm-5">
                    <h2>Wrap - A campanion plugin</h2>
                    <p>Wrap is a clean and elegant Multipurpose Landing Page Template.
                        It will fit perfectly for Startup, Web App or any type of Web Services.
                        It has 4 background styles with 6 homepage styles. 6 pre-defined color scheme.
                        All variations are organized separately so you can use / customize the template very easily.</p>

                    <p>It is a clean and elegant Multipurpose Landing Page Template.
                        It will fit perfectly for Startup, Web App or any type of Web Services.
                        It has 4 background styles with 6 homepage styles. 6 pre-defined color scheme.
                        All variations are organized separately so you can use / customize the template very easily.</p>
                    <div class="mh-about-tag">
                        <ul>
                            <li><span>php</span></li>
                            <li><span>html</span></li>
                            <li><span>css</span></li>
                            <li><span>php</span></li>
                            <li><span>wordpress</span></li>
                            <li><span>React</span></li>
                            <li><span>Javascript</span></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-fill">Live Demo</a>
                </div>
                <div class="col-sm-7">
                    <div class="mh-portfolio-modal-img">
                        <img src="{{ asset('assets/images/pr-0.jif') }}" alt="" class="img-fluid">
                        <p>All variations are organized separately so you can use / customize the template very easily.</p>
                        <img src="{{ asset('assets/images/pr-1.jif') }}" alt="" class="img-fluid">
                        <p>All variations are organized separately so you can use / customize the template very easily.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
        ===================
           QUATES
        ===================
        -->
<section class="mh-quates image-bg home-2-img">
    <div class="img-color-overlay">
        <div class="container">
            <div class="row section-separator">
                <div class="each-quates col-sm-12 col-md-6">
                    <h3 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Interested to Work?</h3>
                    <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Mirum est notare quam littera gothica.
                        quam nunc putamus parum claram,</p>
                    <a href="#mh-contact" class="btn btn-fill wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">Contact</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
        ===================
           PRICING
        ===================
        -->
<section class="mh-pricing" id="mh-pricing">
    <div class="">
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h3>Pricing Table</h3>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="mh-pricing dark-bg shadow-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <i class="fa fa-calendar"></i>
                        <h4>Full-time work</h4>
                        <p>I am available for full time</p>
                        <h5>$1500</h5>
                        <ul>
                            <li>Web Development</li>
                            <li>Advetising</li>
                            <li>Game Development</li>
                            <li>Music Writing</li>
                        </ul>
                        <a href="#" class="btn btn-fill">Hire Me</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="mh-pricing dark-bg shadow-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                        <i class="fa fa-file"></i>
                        <h4>Fixed Price Project</h4>
                        <p>I am available for fixed roles</p>
                        <h5>$500</h5>
                        <ul>
                            <li>Web Development</li>
                            <li>Advetising</li>
                            <li>Game Development</li>
                            <li>Music Writing</li>
                        </ul>
                        <a href="#" class="btn btn-fill">Hire Me</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="mh-pricing dark-bg shadow-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">
                        <i class="fa fa-hourglass"></i>
                        <h4>Hourley work</h4>
                        <p>I am available for Hourley projets</p>
                        <h5>$50</h5>
                        <ul>
                            <li>Web Development</li>
                            <li>Advetising</li>
                            <li>Game Development</li>
                            <li>Music Writing</li>
                        </ul>
                        <a href="#" class="btn btn-fill">Hire Me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
        ===================
           BLOG
        ===================
        -->
<section class="mh-blog image-bg featured-img-two" id="mh-blog">
    <div class="img-color-overlay">
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h3>Featured Posts</h3>
                </div>

                @foreach ($user->posts as $post)
                <div class="col-sm-12 col-md-4">
                    <div class="mh-blog-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <img src="{{ asset('assets/images/').'/'.$featuredImages[rand(0,count($featuredImages)-1)] }}" alt="" class="img-fluid">
                        <div class="blog-inner">
                            <h2><a href="blog-single.html">{{ $post->title }}</a></h2>
                            <div class="mh-blog-post-info">
                                <ul>
                                    <li><strong>Post On</strong><a href="#">{{ $post->date }}</a></li>
                                    <li><strong>By</strong><a href="#">{{ $post->author }}</a></li>
                                </ul>
                            </div>
                            <p>{{ $post->description }}</p>
                            <a href="blog-single.html">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach

                @if(!count($user->posts))
                <p class="text-center w-100">Coming soon...</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!--
        ===================
           Testimonial
        ===================
        -->
<section class="mh-testimonial" id="mh-testimonial">
    <div class="home-v-img">
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h3>Client Reviews</h3>
                </div>
                <div class="col-sm-12 wow fadeInUp" id="mh-client-review" data-wow-duration="0.8s" data-wow-delay="0.3s">
                    <div class="each-client-item">
                        <div class="mh-client-item dark-bg black-shadow-1">
                            <img src="{{ asset('assets/images/c-1.png') }}" alt="" class="img-fluid">
                            <p>Absolute wonderful ! I am completely
                                blown away.The very best.I was amazed
                                at the quality</p>
                            <h4>John Mike</h4>
                            <span>CEO, Author.Inc</span>
                        </div>
                    </div>
                    <div class="each-client-item">
                        <div class="mh-client-item dark-bg black-shadow-1">
                            <img src="{{ asset('assets/images/c-1.png') }}" alt="" class="img-fluid">
                            <p>Absolute wonderful ! I am completely
                                blown away.The very best.I was amazed
                                at the quality</p>
                            <h4>John Mike</h4>
                            <span>CEO, Author.Inc</span>
                        </div>
                    </div>

                    <div class="each-client-item">
                        <div class="mh-client-item dark-bg black-shadow-1">
                            <img src="{{ asset('assets/images/c-1.png') }}" alt="" class="img-fluid">
                            <p>Absolute wonderful ! I am completely
                                blown away.The very best.I was amazed
                                at the quality</p>
                            <h4>John Mike</h4>
                            <span>CEO, Author.Inc</span>
                        </div>
                    </div>
                    <div class="each-client-item">
                        <div class="mh-client-item dark-bg black-shadow-1">
                            <img src="{{ asset('assets/images/c-1.png') }}" alt="" class="img-fluid">
                            <p>Absolute wonderful ! I am completely
                                blown away.The very best.I was amazed
                                at the quality</p>
                            <h4>John Mike</h4>
                            <span>CEO, Author.Inc</span>
                        </div>
                    </div>
                    <div class="each-client-item">
                        <div class="mh-client-item dark-bg black-shadow-1">
                            <img src="{{ asset('assets/images/c-1.png') }}" alt="" class="img-fluid">
                            <p>Absolute wonderful ! I am completely
                                blown away.The very best.I was amazed
                                at the quality</p>
                            <h4>John Mike</h4>
                            <span>CEO, Author.Inc</span>
                        </div>
                    </div>

                    <div class="each-client-item">
                        <div class="mh-client-item dark-bg black-shadow-1">
                            <img src="{{ asset('assets/images/c-1.png') }}" alt="" class="img-fluid">
                            <p>Absolute wonderful ! I am completely
                                blown away.The very best.I was amazed
                                at the quality</p>
                            <h4>John Mike</h4>
                            <span>CEO, Author.Inc</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.footer')