@props(['post'=>$post])
            <div class="timeline-item">

                <h3 class="timeline-header"><a href="{{ route('user.userPost.posts', $post->user) }}">{{ $post->user->first_name. ' '. $post->user->sur_name }}</a> posted &nbsp; &nbsp;
                    <span class="time"><i class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans() }}</span>

                </h3>

                <div class="timeline-body">
                    <p style="margin: 20px; font-weight: 800;">

                        {{ $post->body }}
                    </p>

                    <ul class="list-inline p-5 mb-5" style="margin-bottom: 20px;">
                    <li><a href="#" class="link-info text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    @can('delete', $post)
                        <li>
                            <form action="{{ route('user.userPost.delete', $post) }}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                {{-- <a href="#" class="link-black text-sm text-p"><i class="fa fa-thumbs-o-up margin-r-5"></i> unLike</a> --}}
                                <button type="submit" class="btn btn-danger btn-xs text-blue-500"><i class="fa fa-delete margin-r-5"></i> Delete</button>
                            </form>
                        </li>
                        <li>
                            {{-- <form action="{{ route('user.userPost.delete', $post) }}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE') --}}
                                {{-- <a href="#" class="link-black text-sm text-p"><i class="fa fa-thumbs-o-up margin-r-5"></i> unLike</a> --}}
                                <a href="{{ route('user.userPost.show', $post->id) }}" class="btn btn-primary btn-xs text-blue-500"><i class="fa fa-delete margin-r-5"></i> Edit</a>

                            {{-- </form> --}}
                        </li>
                    @endcan
                    @auth
                        @if (!$post->likedBy(auth()->user()))
                            <li>
                                <form action="{{ route('user.userPost.likes', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                {{-- <a href="#" class="link-black text-sm text-p"><i class="fa fa-thumbs-o-up margin-r-5"></i> unLike</a> --}}
                                <button type="submit" class="btn btn-primary btn-xs text-blue-500"><i class="fa fa-thumbs-up margin-r-5"></i> Like</button>
                                </form>
                            </li>
                        @else

                            <li>
                                <form action="{{ route('user.userPost.like.delete', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <a href="#" class="link-black text-sm text-p"><i class="fa fa-thumbs-o-up margin-r-5"></i> unLike</a> --}}
                                    <button type="submit" class="btn btn-info btn-xs text-blue-500"><i class="fa fa-thumbs-down margin-r-5"></i> unLike</button>
                                </form>
                            </li>
                        @endif

                        @endauth
                        <li class="pull-right">
                            <span href="#" class="link-white text-lg text-primary btn-lg p-5"><i class="fa fa-user margin-r-5"></i>
                                {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}
                            </span>
                        </li>


                    </ul>
                    {{-- @if (!$post->likedBy(auth()->user())) --}}
                    <div class="timeline-body">
                        <div class="box box-default box-solid collapsed-box">
                          <div class="box-header with-border">

                              <span class="pull-left">
                                  <span href="#" class="link-white text-lg text-primary btn-lg p-5"><i class="fa fa-user margin-r-5"></i>
                                      {{-- {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }} --}}
                                        comment count
                                    </span>
                              </span>
                              <div class="box-tools pull-left">
                                  <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                      {{-- <i class="fa fa-plus"></i> --}}
                                    {{-- <span href="#" class="link-white text-lg text-primary btn-lg p-5btn btn-box-tool" data-widget="collapse"> --}}
                                        <h3 class="box-title" style="color:green">
                                            <i class="fa fa-plus"></i>
                                            Write Comment
                                            <i class="fa fa-user margin-r-5"></i>
                                    </h3>
                                    {{-- </span> --}}
                                {{-- write a comment --}}
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body" style="display: none;">

                            <form action="{{ route('user.makeComment.store') }}" method="post">
                                @csrf
                                <div class="timeline-body">

                                    <textarea name="body" style=" padding: 2px; background-color: white;" class="form-control input-sm p-4 m-5 " rows="4" cols="4" placeholder="Type a Comment ...">
                                    </textarea>
                                    @if ($errors->has('body'))
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $errors->first('body') }}
                                        </div>
                                    @endif
                                </div>

                                        {{-- <input class="form-control input-sm" type="text" placeholder="Type a comment"> --}}
                                        <div class="timeline-footer mt-5 mb-5" style="margin: 20px">
                                            <a class="pull-right btn btn-warning btn-flat btn-xs">View comment</a>
                                            {{-- <a class="btn btn-success btn-flat btn-lg">comment</a> --}}
                                            <button type="submit" class="btn btn-primary btn-lg text-blue-500"><i class="fa fa-user margin-r-5"></i> Comment</button>

                                        </div>
                                    </form>
                                </div>

                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>


            {{-- @endif --}}

            </div>

