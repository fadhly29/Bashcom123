@extends('pages.layout')
@section('content')
    <section id="cta" class="wow fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <marquee onmouseover="this.stop();" onmouseout="this.start();" scrollamount="10">
                    <h2 style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;"><i>
                    <img src="images/pp.jpg" width="40" height="40" alt="logo">&nbsp;&nbsp;&nbsp;Bekerja Keras, Bergerak Cepat, Bertindak Tepat&nbsp;&nbsp;&nbsp;
                    <img src="images/pp.jpg" width="40" height="40" alt="logo">&nbsp;&nbsp;&nbsp;Bekerja Keras, Bergerak Cepat, Bertindak Tepat&nbsp;&nbsp;&nbsp;
                    <img src="images/pp.jpg" width="40" height="40" alt="logo">&nbsp;&nbsp;&nbsp;Bekerja Keras, Bergerak Cepat, Bertindak Tepat&nbsp;&nbsp;&nbsp;
                    <img src="images/pp.jpg" width="40" height="40" alt="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="images/kaltim.png" width="40" height="40" alt="logo">&nbsp;&nbsp;&nbsp; Ruhui Rahayu&nbsp;&nbsp;&nbsp;
                    <img src="images/kaltim.png" width="40" height="40" alt="logo">&nbsp;&nbsp;&nbsp; Ruhui Rahayu&nbsp;&nbsp;&nbsp;
                    <img src="images/kaltim.png" width="40" height="40" alt="logo">&nbsp;&nbsp;&nbsp; Ruhui Rahayu&nbsp;&nbsp;&nbsp;
                    <img src="images/kaltim.png" width="40" height="40" alt="logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </i></h2>
                </marquee>
            </div>
        </div>
    </section><!--/#cta-->

    <section id="main-slider">
        <div class="owl-carousel">
        @foreach ($banner as $ban)
            <div class="item">
                <div class="slider-inner">
                    <img src="{{ asset( $ban->foto )}}" class="img-responsive">
                </div>
            </div><!--/.item-->
        @endforeach
        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->
    
    

    <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Agenda</h2>
            </div>

            <div class="text-center">
                <ul class="portfolio-filter">
                    <li><a class="active" href="#" data-filter="*">All Works</a></li>
                
                @foreach($agenda as $agen)
                    <!-- <li><a href="#" data-filter=".creative">Creative</a></li>
                    <li><a href="#" data-filter=".corporate">Corporate</a></li>
                    <li><a href="#" data-filter=".portfolio">Portfolio</a></li> -->
                    <li><a href="#" data-filter=".{{ $agen['kategori'] }}">{{ $agen['kategori'] }}</a></li>
                
                @endforeach
                </ul><!--/#portfolio-filter-->
            </div>

            <div class="portfolio-items">
            @foreach ($agenda as $agen)
                <div class="portfolio-item {{ $agen['kategori'] }}">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{ asset($agen->foto) }}" alt="">
                        <div class="portfolio-info">
                            <h3>{{ $agen['kategori']}}</h3>
                            {{ $agen['deskripsi']}}
                            <a class="preview" href="{{ asset( $agen->foto )}}" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->
            @endforeach
            </div>
        </div><!--/.container-->
    </section><!--/#portfolio-->

    <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Tentang Kami</h2>
            </div>

            <div class="row">
            @foreach( $about as $bout)
                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title">Video Intro</h3>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <!-- <iframe src="//player.vimeo.com/video/58093852?title=0&amp;byline=0&amp;portrait=0&amp;color=e79b39" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
                    	<iframe width="854" height="480" src="https://www.youtube.com/embed/{{ $bout['video'] }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">E-Balsam (Pendataan Tanah Elektrik)</h3>
                    <p>{{ $bout['deskripsi'] }}</p>

                </div>
            @endforeach
            </div>
        </div>
    </section><!--/#about-->

    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Lebih dekat dengan Kami</h2>
                <p class="text-center wow fadeInDown">Silahkan isi form dibawah apabila ada Kritik atau Saran <br> dalam konten website ini.</p>
            </div>
        </div>
    </section> <!--/#get-in-touch-->


    <section id="contact">
        <div id="google-map" style="height:650px" data-latitude="-6.267882" data-longitude="106.761798"></div>
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <div class="contact-form">
                            <h3>Kritik dan Saran</h3>

                            <address>
                              <strong>E-Balsam.</strong><br>
                              To Be Design<br>
                              To Be Design<br>
                              <abbr title="Phone">P:</abbr> 000000
                            </address>

                            <form id="main-contact-form" name="contact-form" method="post" action="#">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->

    
@endsection