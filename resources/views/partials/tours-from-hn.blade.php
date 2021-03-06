<div id="hcm-tours">
  <h5 class="tours-title">Tour <b>Hà Nội</b> đi <b>Nhật Bản</b></h5>
  <div class="tours-grid row">
    @foreach($tours_hn as $featured_tour)
    <?php
        $featured_item = $featured_tour->getFirstMedia('feature');
    ?>
    <div class="col-md-4">
        <div class="card card-user card-tour normal-tour">
            <div class="image">
              <img class="" src="{!! $featured_item->getFullUrl() !!}" alt="..." />
            </div>
            <div class="tour-meta clearfix">
              <span class="pull-left">{{ $featured_tour->times }}</span>
              <span class="pull-right">{{ number_format($featured_tour->price, 0, ',', '.') . ' VNĐ' }}</span>
            </div>
            <div class="content">
                @if($featured_tour->on_sale === 1)
                <div class="sale-info">
                    <img class="tippy" title="{!! $featured_tour->sale_text !!}" src="{{ asset('image/sale-badge.png') }}" data-theme="light" data-arrow="true" />
                </div>
                @endif
                <div class="description">
                  <a href="{!! route('tourDetails', ['tour' => $featured_tour]) !!}">
                    <h4 class="title">{{ $featured_tour->title }}</h4>
                  </a>
                  <ul class="list-unstyled list-lines">
                      <li>
                          <b>Hành trình:</b> {!! $featured_tour->schedule !!}
                      </li>
                      <li>
                          <b>Khởi hành:</b> {{ $featured_tour->begin_date->format('d/m/Y') }} @if($featured_tour->date_note) ({{ $featured_tour->date_note }}) @endif
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
