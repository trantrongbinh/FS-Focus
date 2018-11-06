@extends('layouts.app')

@section('title', $discussion->title)

@section('styles')
    <style>
        body {
            background: #ffffff;
        }

        .latest {
            /* position: fixed;
            right: 0;
            bottom: 0; */
            height: 500px;
            position: -webkit-sticky;
            position: sticky;
            top: 70px;
        }

        .fixed-link {
            /* position: fixed;
            right: 0;
            bottom: 0; */
            height: 500px;
            line-height: 50px;
            margin-top: 170px;
            font-size: 20px;
            position: -webkit-sticky;
            position: sticky;
            top: 250px;
        }

        /* Clap effect */
        /* Keyframes declaration */

        @keyframes clap {
            0% {
                opacity: 0;
            }
            60% {
                opacity: 1;
                transform: translateY(-100px) scale(1);
            }
            80% {
                transform: translateY(-190px) scale(0.6);
            }
            100% {
                opacity: 0;
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0;
            }
            70% {
                box-shadow: 0 0 5px 10px rgba(255, 255, 255, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }

        /*clap button styles */

        .claps_button {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border-radius: 50%;
            background-color: #fff;
            border: 1px solid #02b875;
            width: 50px;
            height: 50px;
            outline: 0;
            cursor: pointer;
            filter: drop-shadow(0 3px 12px rgba(0, 0, 0, 0.05));
            transform: scale(1);
            transition: all .1s ease-in;
            z-index: 1;
            fill: #02B875;
            pointer-events: visible;
        }

        a.claps_button {
            border-color: #02b875;
            color: #00ab6b;
            fill: #00ab6b;
            animation: pulse 3s infinite;
            position: absolute;
            margin-left: -23px;
        }

        a.claps_button:hover {
            width: 55px;
            height: 55px;
            border-color: #02b875;
            color: #00ab6b;
            fill: #00ab6b;
            animation: pulse 2s infinite;
        }
    </style>
@endsection

@section('content')
    <div class="discuss-show container" style="padding: 30px;">
        <div class="row">
            <main class="post blog-post col-lg-12">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-1 link-right fixed-link">
                        <div class="links">
                            <ul class="list-unstyled">
                                <li>
                                    <a class="claps_button btn-tool ">
                                        <svg class="svgIcon-use" width="33" height="33" viewBox="0 0 33 33">
                                            <path d="M28.86 17.342l-3.64-6.402c-.292-.433-.712-.729-1.163-.8a1.124 1.124 0 0 0-.889.213c-.63.488-.742 1.181-.33 2.061l1.222 2.587 1.4 2.46c2.234 4.085 1.511 8.007-2.145 11.663-.26.26-.526.49-.797.707 1.42-.084 2.881-.683 4.292-2.094 3.822-3.823 3.565-7.876 2.05-10.395zm-6.252 11.075c3.352-3.35 3.998-6.775 1.978-10.469l-3.378-5.945c-.292-.432-.712-.728-1.163-.8a1.122 1.122 0 0 0-.89.213c-.63.49-.742 1.182-.33 2.061l1.72 3.638a.502.502 0 0 1-.806.568l-8.91-8.91a1.335 1.335 0 0 0-1.887 1.886l5.292 5.292a.5.5 0 0 1-.707.707l-5.292-5.292-1.492-1.492c-.503-.503-1.382-.505-1.887 0a1.337 1.337 0 0 0 0 1.886l1.493 1.492 5.292 5.292a.499.499 0 0 1-.353.854.5.5 0 0 1-.354-.147L5.642 13.96a1.338 1.338 0 0 0-1.887 0 1.338 1.338 0 0 0 0 1.887l2.23 2.228 3.322 3.324a.499.499 0 0 1-.353.853.502.502 0 0 1-.354-.146l-3.323-3.324a1.333 1.333 0 0 0-1.886 0 1.325 1.325 0 0 0-.39.943c0 .356.138.691.39.943l6.396 6.397c3.528 3.53 8.86 5.313 12.821 1.353zM12.73 9.26l5.68 5.68-.49-1.037c-.518-1.107-.426-2.13.224-2.89l-3.303-3.304a1.337 1.337 0 0 0-1.886 0 1.326 1.326 0 0 0-.39.944c0 .217.067.42.165.607zm14.787 19.184c-1.599 1.6-3.417 2.392-5.353 2.392-.349 0-.7-.03-1.058-.082a7.922 7.922 0 0 1-3.667.887c-3.049 0-6.115-1.626-8.359-3.87l-6.396-6.397A2.315 2.315 0 0 1 2 19.724a2.327 2.327 0 0 1 1.923-2.296l-.875-.875a2.339 2.339 0 0 1 0-3.3 2.33 2.33 0 0 1 1.24-.647l-.139-.139c-.91-.91-.91-2.39 0-3.3.884-.884 2.421-.882 3.301 0l.138.14a2.335 2.335 0 0 1 3.948-1.24l.093.092c.091-.423.291-.828.62-1.157a2.336 2.336 0 0 1 3.3 0l3.384 3.386a2.167 2.167 0 0 1 1.271-.173c.534.086 1.03.354 1.441.765.11-.549.415-1.034.911-1.418a2.12 2.12 0 0 1 1.661-.41c.727.117 1.385.565 1.853 1.262l3.652 6.423c1.704 2.832 2.025 7.377-2.205 11.607zM13.217.484l-1.917.882 2.37 2.837-.454-3.719zm8.487.877l-1.928-.86-.44 3.697 2.368-2.837zM16.5 3.293L15.478-.005h2.044L16.5 3.293z"
                                                  fill-rule="evenodd"></path>
                                        </svg>
                                        <!-- <svg class="svgIcon-use" width="33" height="33" viewBox="0 0 33 33">
                                            <g fill-rule="evenodd">
                                                <path d="M29.58 17.1l-3.854-6.78c-.365-.543-.876-.899-1.431-.989a1.491 1.491 0 0 0-1.16.281c-.42.327-.65.736-.7 1.207v.001l3.623 6.367c2.46 4.498 1.67 8.802-2.333 12.807-.265.265-.536.505-.81.728 1.973-.222 3.474-1.286 4.45-2.263 4.166-4.165 3.875-8.6 2.215-11.36zm-4.831.82l-3.581-6.3c-.296-.439-.725-.742-1.183-.815a1.105 1.105 0 0 0-.89.213c-.647.502-.755 1.188-.33 2.098l1.825 3.858a.601.601 0 0 1-.197.747.596.596 0 0 1-.77-.067L10.178 8.21c-.508-.506-1.393-.506-1.901 0a1.335 1.335 0 0 0-.393.95c0 .36.139.698.393.95v.001l5.61 5.61a.599.599 0 1 1-.848.847l-5.606-5.606c-.001 0-.002 0-.003-.002L5.848 9.375a1.349 1.349 0 0 0-1.902 0 1.348 1.348 0 0 0 0 1.901l1.582 1.582 5.61 5.61a.6.6 0 0 1-.848.848l-5.61-5.61c-.51-.508-1.393-.508-1.9 0a1.332 1.332 0 0 0-.394.95c0 .36.139.697.393.952l2.363 2.362c.002.001.002.002.002.003l3.52 3.52a.6.6 0 0 1-.848.847l-3.522-3.523h-.001a1.336 1.336 0 0 0-.95-.393 1.345 1.345 0 0 0-.949 2.295l6.779 6.78c3.715 3.713 9.327 5.598 13.49 1.434 3.527-3.528 4.21-7.13 2.086-11.015zM11.817 7.727c.06-.328.213-.64.466-.893.64-.64 1.755-.64 2.396 0l3.232 3.232c-.82.783-1.09 1.833-.764 2.992l-5.33-5.33z"></path>
                                                <path d="M13.285.48l-1.916.881 2.37 2.837z"></path>
                                                <path d="M21.719 1.361L19.79.501l-.44 3.697z"></path>
                                                <path d="M16.502 3.298L15.481 0h2.043z"></path>
                                            </g>
                                        </svg> -->
                                    </a>
                                    <br>
                                </li>
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-stack-overflow"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post blog-post col-lg-7">
                        <div class="post-single">
                            <h1 class="h2">{{ $discussion->title }}<a href="javascript:;"><i
                                            class="fa fa-bookmark-o"></i></a></h1>
                            <div class="post-footer d-flex align-items-center flex-column flex-sm-row"
                                 style="font-size: 12px;">
                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{ $discussion->user->avatar }}"
                                                             alt="{{ $discussion->user->name }}" class="img-fluid">
                                    </div>
                                    <div class="title"><span><b>{{ $discussion->user->name or 'No Name' }}</b></span>
                                    </div>
                                </a>
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="date"><i class="far fa-clock"><b></i> {{ lang('Published At') }}
                                        : {{ $discussion->created_at }}</b>&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="comments meta-last"><b><i
                                                    class="far fa-comment-alt"></i>{{ lang('Replies Num') }}
                                            : {{ $discussion->comments->count() }}</b></div>
                                    @if(Auth::check() && Auth::user()->id == $discussion->user->id)
                                        <a href="{{ url("discussion/{$discussion->id}/edit") }}"
                                           class="edit-discuss btn btn-info btn-sm float-right"
                                           style="margin-left: 20px;"> <i class="fas fa-pencil-alt"
                                                                          style="padding: 0; margin-left: 20px;"></i> {{ lang('Edit Problem') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="post-details">
                                <div class="post-body" style="font-size: 17px;">
                                    <parse content="{{ json_decode($discussion->content)->raw }}"></parse>
                                </div>
                                <div class="post-tags">
                                    @if(count($discussion->tags))
                                        @foreach($discussion->tags as $tag)
                                            <a href="{{ url('tag', ['tag' => $tag->tag]) }}"
                                               class="tag">#{{ $tag->tag }}</a>
                                        @endforeach
                                    @endif
                                </div>
                                @if(config('blog.social_share.discussion_share'))
                                    <div class="footing float-right" style="margin-top: -40px;">
                                        <div class="social-share" data-title="{{ $discussion->title }}"
                                             data-description="{{ $discussion->title }}"
                                             {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }} {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }} initialized></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- comment -->
                        @if(Auth::guest())
                            <comment commentable-type="discussions"
                                     commentable-id="{{ $discussion->id }}"
                                     null-text="" comment-number="{{ $discussion->comments_count }}">
                            </comment>
                        @else
                            <comment username="{{ Auth::user()->name }}"
                                     user-avatar="{{ Auth::user()->avatar }}"
                                     commentable-type="discussions"
                                     commentable-id="{{ $discussion->id }}"
                                     null-text="" comment-number="{{ $discussion->comments_count }}"
                                     can-comment>
                            </comment>
                        @endif
                    </div>
                    <!-- Box Left-->
                    <div class="col-lg-3 latest">
                        <div class="widget links" style="border: none;">
                            <header>
                                <h3 class="h6">Related</h3>
                            </header>
                            <ul class="list-unstyled">
                                @forelse($related_discussions as $discussion)
                                <li>
                                    <a href="/discussion/{{ $discussion->id }}">
                                        <i class="fab fa-facebook-square"></i>
                                        {{ $discussion->title }}
                                    </a>
                                </li>
                                @empty
                                <h5 class="text-center">{{ lang('Nothing') }}</h5>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection