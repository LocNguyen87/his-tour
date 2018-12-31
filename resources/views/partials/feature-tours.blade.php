<div id="featured-tours">
  <h5 class="tours-title">Tour <b>nổi bật</b></h5>
  <div class="tours-grid row">
    @foreach($featured_tours as $featured_tour)
    <?php
        $featured_item = $featured_tour->getFirstMedia('feature');
    ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card card-user card-tour">
            <div class="image image-plain"></div>
            <div class="content">
                <div class="author tour-card-title">
                @if($featured_tour->on_sale === 1)
                <div class="sale-info">
                  <img class="tippy" title="{!! $featured_tour->sale_text !!}" src="{{ asset('image/sale-badge.png') }}" data-theme="light" data-arrow="true" />
                </div>
                @endif
                    <a href="{!! route('tourDetails', ['tour' => $featured_tour]) !!}">
                    <img class="avatar" src="{!! $featured_item->getFullUrl() !!}" alt="..." />

                    <h4 class="title">{{ $featured_tour->title }}</h4>
                    <div class="tour-meta clearfix">
                      <span class="pull-left">{{ $featured_tour->times }}</span>
                      <span class="pull-right">{{ number_format($featured_tour->price, 0, ',', '.') . ' VNĐ' }}</span>
                    </div>
                    </a>
                </div>
                <div class="description">
                  <ul class="list-unstyled list-lines">
                      <li>
                          <b>Hành trình:</b> {!! $featured_tour->schedule !!}
                      </li>
                      <li>
                          <b>Khởi hành:</b> {{ $featured_tour->begin_date->format('d/m/Y') }}
                      </li>
                      <li>
                          <b>Hãng bay:</b> {{ $featured_tour->flight }}
                      </li>
                  </ul>
                  <div class="row">
                      <div class="col-xs-6">
                          <a class="btn btn-warning btn-fill btn-block" href="{!! route('tourDetails', ['tour' => $featured_tour]) !!}">Đăng ký tour</a>
                      </div>
                      <div class="col-xs-6">
                          <a class="btn btn-primary btn-fill btn-block" href="{!! route('tourDetails', ['tour' => $featured_tour]) !!}">Chi tiết</a>
                      </div>
                  </div>
                </div>
            </div>
        </div> <!-- end card -->
    </div>
    @endforeach
  </div>
</div>
