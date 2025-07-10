          {{-- <div class="card mb-4">
            <div class="card-header">Tags</div> --}}
            {{-- <div class="card-body"> --}}
              <div class="row mb-5">
                <div class="col-sm-8 m-auto">
                  <ul class="list-unstyled mb-0 d-flex justify-content-center flex-wrap gap-4">
                    @foreach ($sidebar_tags as $sidebar_tag)
                      <li>
                        <a style="font-weight: 600" class="text-decoration-none text-success" href="{{route('home', ['tag_id'=>$sidebar_tag->id])}}">{{$sidebar_tag->name}}</a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            {{-- </div> --}}
          {{-- </div> --}}