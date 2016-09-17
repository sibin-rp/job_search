@extends('layouts.home')
@section('content')
  <div class="about-us-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="about-us">
            <div class="page-header">
              <h1>About Us and Why we are here</h1>
            </div>
            <div class="about-us-content">
              <div class="section-c" id="how-it-works">
                <h3 class="title"># How it Works</h3>
                @include('home.about_us._how_it_works')
              </div>
              <div class="section-c" id="why-do-internships">
                <h3 class="title"># Why do Internships</h3>
                <article>
                  Cras sed sollicitudin nisi. Donec varius vel ex et scelerisque. Quisque consequat nulla lectus, a faucibus dolor vulputate ac. Mauris sed massa non nisl interdum lobortis a non nisi. Quisque sit amet lacus elit. Nunc eu lorem eget augue ullamcorper fringilla et sed sem. Phasellus dictum felis in ligula pretium, sed sodales nisl gravida. Pellentesque id nibh lacus. Nulla metus nulla, dapibus vel consectetur nec, iaculis eu odio. Donec ex risus, posuere eget vestibulum ac, efficitur ut justo. Aliquam tempor hendrerit quam, ut dignissim odio fringilla vitae. Suspendisse id lectus eu urna ultricies dignissim sed in nisl. Etiam tempus ullamcorper vehicula. Integer tincidunt iaculis mauris, et auctor est.
                </article>
              </div>
              <div class="section-c" id="for-students">
                <h3 class="title"># For Students</h3>
                <article>
                  Quisque eu augue pretium, venenatis turpis in, viverra risus. Aliquam venenatis ullamcorper arcu, in pulvinar lectus consequat vitae. Praesent sodales velit id malesuada interdum. Etiam feugiat lectus lectus, non ornare ligula egestas id. Proin viverra porta tortor, sit amet pellentesque felis iaculis a. Donec a lectus interdum, pretium orci non, pulvinar lectus. Fusce in semper sapien. Vivamus ac aliquam risus, quis tristique massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare sapien nec auctor auctor.
                </article>
              </div>
              <div class="section-c" id="for-companies">
                <h3 class="title"># For Companies</h3>
                <article>
                  Donec sit amet nisl elit. Sed cursus pellentesque eros vel sollicitudin. Quisque bibendum risus vitae tincidunt efficitur. Duis ut neque venenatis, malesuada tortor et, dignissim nulla. Nam hendrerit, felis eget vestibulum dictum, erat nibh pharetra ipsum, ut ullamcorper tellus leo sit amet sem. Nunc at fermentum eros. Fusce justo risus, pulvinar non quam sit amet, consectetur faucibus urna. Nam dapibus libero in pellentesque accumsan. Sed pellentesque diam risus. Mauris a tincidunt diam.
                </article>
              </div>
              <div class="section-c" id="faqs">
                <h3 class="title"># FAQs</h3>
                <article>
                  Mauris eget eros felis. Morbi maximus, justo et pellentesque tincidunt, erat nisi viverra mi, eu lobortis diam quam ut neque. Quisque vel blandit ipsum, sed malesuada eros. Vestibulum ut venenatis est, eu vehicula enim. In hac habitasse platea dictumst. Integer viverra accumsan magna in posuere. In auctor porttitor turpis. Praesent hendrerit facilisis risus in dignissim. Ut nisi dolor, porttitor a ligula sed, dapibus placerat ante. Fusce molestie interdum justo, sollicitudin lobortis eros facilisis sit amet. In pellentesque rutrum sem.


                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop