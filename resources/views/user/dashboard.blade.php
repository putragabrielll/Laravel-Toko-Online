<!-- Untuk Header -->
@include('user/templates_user/header')

<!-- Untuk Sidebar -->
@include('user/templates_user/sidebar')
@include('layouts.app')
  <div class="container-fluid">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{url('sbadmin2/img/ikanpedia.png')}}" class="d-block w-100" alt="..." width="100" height="380">
        </div>
        <div class="carousel-item">
          <img src="{{url('sbadmin2/img/slider1.jpg')}}" class="d-block w-100" alt="..." width="100" height="380">
        </div>
        <div class="carousel-item">
          <img src="{{url('sbadmin2/img/slider2.jpg')}}" class="d-block w-100" alt="..." width="100" height="380">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    <div class="row text-center mt-4">

      @foreach($barangs as $brg)
        <div class="card ml-2 mt-2" style="width: 13rem;">
          <img src="{{url('uploads')}}/{{$brg->gambar}}"class="card-img-top rounded mx-auto d-block" alt="..." width="50" height="170">
          <div class="card-body">

            <h5 class="card-title mb-1">
              {{ $brg -> nama_brg }}
            </h5>
            <small>
              {{ $brg -> keterangan }}
            </small><br />
            <strong>Harga :</strong>
            <span class="badge badge-pill badge-secondary mb-3">
              Rp.&nbsp;{{ number_format($brg->harga)}}&nbsp;/Kg
            </span><br />
            <strong>Stok :</strong>
            <span class="badge badge-pill badge-warning mb-3">
              {{$brg->stok}}&nbsp;kg
            </span>
            <hr class="sidebar-divider my-0"><br />

            
            <a href="{{ url('pesan') }}/{{ $brg->id }}" class="btn btn-sm btn-primary "><i class="fa fa-shopping-cart">&nbsp;&nbsp;Pesan</i></a>
            <a href="{{ url('detail') }}/{{ $brg->id }}" class="btn btn-sm btn-success">Detail</a>
          </div>
        </div>
      @endforeach

    </div>

  </div>

<!-- Untuk Footer -->
@include('user/templates_user/footer')




<div class="mt-5" style="background-color: rgb(42, 42, 49)">
      <div class="container">
          <div class="row col-md-12">

              <div class="col-md-2" style="color: rgb(255, 255, 255)">
                  <h6>
                      OUR WEBSITE
                  </h6>
                  <ul style="color: rgb(180, 180, 180)">
                      <li>
                          <a href="#" style="color: rgb(255, 255, 255)">
                              Privacy Policy
                          </a>
                      </li>
                      <li>
                          <a href="#" style="color: rgb(255, 255, 255)">
                              Scam Alert
                          </a>
                      </li>
                  </ul>
              </div>

              <div class="col-md-2" style="color: rgb(255, 255, 255)">
                  <h6>
                      TOOLS
                  </h6>
                  <ul style="color: rgb(180, 180, 180)">
                      <li>
                          <a href="#" style="color: rgb(255, 255, 255)">
                              ikanpedia Whistleblowing System
                          </a>
                      </li>
                  </ul>
              </div>

              <div class="col-md-2" style="color: rgb(255, 255, 255)">
                  <h6>
                      ANNOUNCEMENT
                  </h6>
                  <ul style="color: rgb(180, 180, 180)">
                      <li>
                          <a href="#" style="color: rgb(255, 255, 255)">
                              General Procurement
                          </a>
                      </li>
                      <li>
                          <a href="#" style="color: rgb(255, 255, 255)">
                              Annoucement
                          </a>
                      </li>
                      <li>
                          <a href="#" style="color: rgb(255, 255, 255)">
                              E-Procurement
                          </a>
                      </li>
                  </ul>
              </div>

              <div class="col-md-2" style="color: rgb(255, 255, 255)">
                  <h6>
                      NETWORK
                  </h6>
                  <ul style="color: rgb(180, 180, 180)">
                      <li>
                          <a href="#" style="color: rgb(255, 255, 255)">
                              Subsidiaries
                          </a>
                      </li>
                      <li>
                          <a href="#" style="color: rgb(255, 255, 255)">
                              Office Address
                          </a>
                      </li>
                  </ul>
              </div>

              <div class="col-md-4" style="color: rgb(255, 255, 255)">
                  <div class="text-center">
                          CONTACT US
                          <h3>1 500 000</h3>
                          
                  </div>
                  <div class="text-center">
                    Unai AE..
                    <br />
                    Email: admin@gmai.com
                  </div>
              </div>

          </div>
      </div>
  </div>

  <div style="background-color: rgb(34, 34, 46)">
      <div class="container">
          <div class="row col-md-12">
              <div style="color: rgb(255, 255, 255)">
                  <p>
                      © PT ikanpedia.Tbk 2075. All Rights Reserved.
                  </p>     
              </div>
          </div>
      </div>
  </div>