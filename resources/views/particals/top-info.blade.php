<div class="penfolio">
    <div class="penfolio_inner">
        <section class="penfolio_inner__home">
            <div class="header_bg" style="background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/penfolio_bg.png');"></div>
            <header>
                <div class="pen_logo">
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <div class="brand-text brand-big hidden-lg-down"><img src="{{ asset('/images/logo-white.png') }}" alt="Logo" class="img-fluid"></div>
                    </a>
                </div>
                <div class="pen_cta">
                    <a class="p_link" href="#" target="blank"><strong>Follow me on fs-focus</strong></a>
                </div>
            </header>
            <div class="pen_intro">
                <div class="pen_intro__image">
                    <a class="p_link" href="#" target="blank">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/profile/profile-512.jpg?1540230348">
                    </a>
                </div>
                <h2>Jamie Coulter</h2>
                <h3>@jcoulterdesign</h3>
                <h4>3,768 Followers | 17 Following</h4>
                <h5>Build a sweet portfolio in seconds. Simply change the codepen_username variable in the JS and boom! Instant portfolio!</h5>
                <nav>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </section>
        <div class="penfolio_inner__pens">
            <div class="wrap row">
                <div class="col-md-12">
                    <div class="">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills row justify-content-center align-self-center">
                                <li class="nav-item"><a class="nav-link active" href="#recent-articles" data-toggle="tab">Recent Articles</a></li>
                                <li class="nav-item"><a class="nav-link" href="#recent-discussions" data-toggle="tab">{{ lang('Recent Discussions') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="#recent-comments" data-toggle="tab">{{ lang('Recent Comments') }}</a></li>
                            </ul>
                        </div>
                        <!-- /.card-header -->
                        <div class="container card-body">
                            <div class="row">
                                <div class="post col-md-10 offset-md-1">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="recent-articles">
                                            <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-12">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/an-overview-of-key-breakthroughs-in-blockchain-technology-and-why-nakamoto-consensus-is-such-a-big-deal-l3mbr"><h3 class="h4">An overview of key breakthroughs in blockchain technology — and why Nakamoto Consensus is such a big deal</h3></a></header>
                                                            <div class="category"><a href="http://localhost:8000/tag/enim" class="text-blue">
                                                            #enim &nbsp;
                                                        </a> <a href="http://localhost:8000/tag/autem" class="text-blue">
                                                            #autem &nbsp;
                                                        </a></div>
                                                            <p>Distributed systems can be difficult to understand, mainly because the knowledge surrounding them is distributed. But don’t worry, I’m well aware of the irony. While teaching myself distributed comput...</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 2 days ago
                                                                </div>
                                                                <div class="views meta-last"><i class="fas fa-eye"></i> 2</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-8">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/cac-trinh-thong-dich-javascript-va-v8-engine-tim-hieu-va-ung-dung-vao-viec-toi-uu-ma-nguon-kxtny"><h3 class="h4">Các trình thông dịch Javascript và V8 engine: tìm hiểu và ứng dụng vào việc tối ưu mã nguồn.</h3></a></header>
                                                            <div class="category"><a href="http://localhost:8000/tag/enim" class="text-blue">
                                                            #enim &nbsp;
                                                        </a></div>
                                                            <p>Chúng ta đều biết rằng, máy tính vật lý chỉ hiểu được mã máy (machine code), các ngôn ngữ bậc cao khác đều phải có một bộ biên dịch hoặc thông dịch mã nguồn về mã máy. Như C có GCC (GNU complier colle...</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;"> 
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 6 days ago
                                                                </div>
                                                                <div class="comments meta-last"><i class="fas fa-eye"></i> 7</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image col-lg-4 text-right">
                                                    <a href="http://localhost:8000/cac-trinh-thong-dich-javascript-va-v8-engine-tim-hieu-va-ung-dung-vao-viec-toi-uu-ma-nguon-kxtny">
                                                        <img alt="cac-trinh-thong-dich-javascript-va-v8-engine-tim-hieu-va-ung-dung-vao-viec-toi-uu-ma-nguon-kxtny" src="http://localhost:8000/uploads/cover/2018/11/24/5GhoRS0VSDoxh8rLjdUHyVSWdubhAp53vPJZ21ee.png" class="img-fluid" style="margin-right: 15px; margin-top: 10px;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-8">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/quia-maiores-voluptatem-similique-kksya"><h3 class="h4">Quia maiores voluptatem similique.</h3></a></header>
                                                            <p>Nesciunt minus dolorem itaque est.</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 3 weeks ago
                                                                </div>
                                                                <div class="comments meta-last"><i class="fas fa-eye"></i> 0</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image col-lg-4 text-right">
                                                    <a href="http://localhost:8000/quia-maiores-voluptatem-similique-kksya">
                                                        <img alt="quia-maiores-voluptatem-similique-kksya" src="https://lorempixel.com/640/480/?78515" class="img-fluid" style="margin-right: 15px; margin-top: 10px;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-8">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/nemo-eum-neque-vel-nihil-sequi-totam-a23nx"><h3 class="h4">Nemo eum neque vel nihil sequi totam.</h3></a></header>
                                                            <p>Architecto minus ut dolorem occaecati aut.</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 1 month ago
                                                                </div>
                                                                <div class="comments meta-last"><i class="fas fa-eye"></i> 0</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image col-lg-4 text-right">
                                                    <a href="http://localhost:8000/nemo-eum-neque-vel-nihil-sequi-totam-a23nx">
                                                        <img alt="nemo-eum-neque-vel-nihil-sequi-totam-a23nx" src="https://lorempixel.com/640/480/?55930" class="img-fluid" style="margin-right: 15px; margin-top: 10px;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-8">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/recusandae-qui-voluptatem-inventore-magnam-sit-quo-rerum-quia-ipsam-rfchw"><h3 class="h4">Recusandae qui voluptatem inventore magnam sit quo rerum quia ipsam.</h3></a></header>
                                                            <p>Nihil aliquam dolores vitae.</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 1 month ago
                                                                </div>
                                                                <div class="comments meta-last"><i class="fas fa-eye"></i> 0</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image col-lg-4 text-right">
                                                    <a href="http://localhost:8000/recusandae-qui-voluptatem-inventore-magnam-sit-quo-rerum-quia-ipsam-rfchw">
                                                        <img alt="recusandae-qui-voluptatem-inventore-magnam-sit-quo-rerum-quia-ipsam-rfchw" src="https://lorempixel.com/640/480/?47169" class="img-fluid" style="margin-right: 15px; margin-top: 10px;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-8">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/aut-aut-vitae-maxime-iure-sapiente-nemo-quod-quod-aut-viswz"><h3 class="h4">Aut aut vitae maxime iure sapiente nemo quod quod aut.</h3></a></header>
                                                            <p>Aut qui sed et cupiditate modi.</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 1 month ago
                                                                </div>
                                                                <div class="comments meta-last"><i class="fas fa-eye"></i> 0</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image col-lg-4 text-right">
                                                    <a href="http://localhost:8000/aut-aut-vitae-maxime-iure-sapiente-nemo-quod-quod-aut-viswz">
                                                        <img alt="aut-aut-vitae-maxime-iure-sapiente-nemo-quod-quod-aut-viswz" src="https://lorempixel.com/640/480/?11204" class="img-fluid" style="margin-right: 15px; margin-top: 10px;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-8">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/in-asperiores-porro-fk4ih"><h3 class="h4">In asperiores porro.</h3></a></header>
                                                            <p>Beatae corporis eaque vel omnis vitae qui.</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 1 month ago
                                                                </div>
                                                                <div class="comments meta-last"><i class="fas fa-eye"></i> 0</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image col-lg-4 text-right">
                                                    <a href="http://localhost:8000/in-asperiores-porro-fk4ih">
                                                        <img alt="in-asperiores-porro-fk4ih" src="https://lorempixel.com/640/480/?46328" class="img-fluid" style="margin-right: 15px; margin-top: 10px;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane posts-listing" id="recent-discussions">
                                              <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-12">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/an-overview-of-key-breakthroughs-in-blockchain-technology-and-why-nakamoto-consensus-is-such-a-big-deal-l3mbr"><h3 class="h4">An overview of key breakthroughs in blockchain technology — and why Nakamoto Consensus is such a big deal</h3></a></header>
                                                            <div class="category"><a href="http://localhost:8000/tag/enim" class="text-blue">
                                                            #enim &nbsp;
                                                        </a> <a href="http://localhost:8000/tag/autem" class="text-blue">
                                                            #autem &nbsp;
                                                        </a></div>
                                                            <p>Distributed systems can be difficult to understand, mainly because the knowledge surrounding them is distributed. But don’t worry, I’m well aware of the irony. While teaching myself distributed comput...</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 2 days ago
                                                                </div>
                                                                <div class="comments meta-last"><i class="fas fa-eye"></i> 2</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="recent-comments">
                                              <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-12">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/an-overview-of-key-breakthroughs-in-blockchain-technology-and-why-nakamoto-consensus-is-such-a-big-deal-l3mbr"><h3 class="h4">An overview of key breakthroughs in blockchain technology — and why Nakamoto Consensus is such a big deal</h3></a></header>
                                                            <div class="category"><a href="http://localhost:8000/tag/enim" class="text-blue">
                                                            #enim &nbsp;
                                                        </a> <a href="http://localhost:8000/tag/autem" class="text-blue">
                                                            #autem &nbsp;
                                                        </a></div>
                                                            <p>Distributed systems can be difficult to understand, mainly because the knowledge surrounding them is distributed. But don’t worry, I’m well aware of the irony. While teaching myself distributed comput...</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 2 days ago
                                                                </div>
                                                                <div class="comments meta-last"><i class="fas fa-eye"></i> 2</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex align-items-stretch featured-posts post-list">
                                                <div class="text col-lg-12">
                                                    <div class="text-inner d-flex align-items-center">
                                                        <div class="content">
                                                            <header class="post-header"><a href="http://localhost:8000/an-overview-of-key-breakthroughs-in-blockchain-technology-and-why-nakamoto-consensus-is-such-a-big-deal-l3mbr"><h3 class="h4">An overview of key breakthroughs in blockchain technology — and why Nakamoto Consensus is such a big deal</h3></a></header>
                                                            <div class="category"><a href="http://localhost:8000/tag/enim" class="text-blue">
                                                            #enim &nbsp;
                                                        </a> <a href="http://localhost:8000/tag/autem" class="text-blue">
                                                            #autem &nbsp;
                                                        </a></div>
                                                            <p>Distributed systems can be difficult to understand, mainly because the knowledge surrounding them is distributed. But don’t worry, I’m well aware of the irony. While teaching myself distributed comput...</p>
                                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                                <div class="comments"><i class="fa fa-user data-margin" aria-hidden="true"></i>TRANTRONGBINH</div>
                                                                <div class="date"><i class="far fa-clock"></i> 2 days ago
                                                                </div>
                                                                <div class="comments meta-last"><i class="fas fa-eye"></i> 2</div>
                                                            </footer>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="penfolio_inner__contact">
                <div class="pen_intro__image">
                    <a class="p_link" href="#" target="blank">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/profile/profile-512.jpg?1540230348">
                    </a>
                    <span class="slogan">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut sodales est. </p>
                        <h3> -- Jamie Coulter --</h3>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>