<div class="latest-posts">
    <div class="container">
        <a href="#" class="read-next">
            <strong>Related Post <i class="fa fa-angle-right"></i></strong>
        </a>
        <hr>
        <div class="row">
            <div class="post col-md-4">
                <div class="post-thumbnail"><a href="post.html"><img src="img/blog-1.jpg" alt="..."
                                                                     class="img-fluid"></a></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date">20 May | 2016</div>
                        <div class="category"><a href="#">Business</a></div>
                    </div>
                    <a href="post.html">
                        <h3 class="h4">Ways to remember your important ideas</h3>
                    </a>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore.</p>
                    <footer class="post-footer d-flex align-items-center">
                        <a href="#" class="author d-flex align-items-center flex-wrap">
                            <div class="avatar"><img src="{{ $article->user->avatar }}" alt="tran trong binh"
                                                     class="img-fluid"></div>
                            <div class="title"><span>{{ $article->user->name or 'No Name' }}</span></div>
                        </a>
                        <div class="date"><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}
                        </div>
                        <div class="comments meta-last"><i class="far fa-comment-alt"></i>{{ $article->view_count }}
                        </div>
                    </footer>
                </div>
            </div>
            <div class="post col-md-4">
                <div class="post-thumbnail"><a href="post.html"><img src="img/blog-2.jpg" alt="..."
                                                                     class="img-fluid"></a></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date">20 May | 2016</div>
                        <div class="category"><a href="#">Technology</a></div>
                    </div>
                    <a href="post.html">
                        <h3 class="h4">Diversity in Engineering: Effect on Questions</h3>
                    </a>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore.</p>
                    <footer class="post-footer d-flex align-items-center">
                        <a href="#" class="author d-flex align-items-center flex-wrap">
                            <div class="avatar"><img src="{{ $article->user->avatar }}" alt="tran trong binh"
                                                     class="img-fluid"></div>
                            <div class="title"><span>{{ $article->user->name or 'No Name' }}</span></div>
                        </a>
                        <div class="date"><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}
                        </div>
                        <div class="comments meta-last"><i class="far fa-comment-alt"></i>{{ $article->view_count }}
                        </div>
                    </footer>
                </div>
            </div>
            <div class="post col-md-4">
                <div class="post-thumbnail"><a href="post.html"><img src="img/blog-3.jpg" alt="..."
                                                                     class="img-fluid"></a></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date">20 May | 2016</div>
                        <div class="category"><a href="#">Financial</a></div>
                    </div>
                    <a href="post.html">
                        <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                    </a>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore.</p>
                    <footer class="post-footer d-flex align-items-center">
                        <a href="#" class="author d-flex align-items-center flex-wrap">
                            <div class="avatar"><img src="{{ $article->user->avatar }}" alt="tran trong binh"
                                                     class="img-fluid"></div>
                            <div class="title"><span>{{ $article->user->name or 'No Name' }}</span></div>
                        </a>
                        <div class="date"><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}
                        </div>
                        <div class="comments meta-last"><i class="far fa-comment-alt"></i>{{ $article->view_count }}
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>